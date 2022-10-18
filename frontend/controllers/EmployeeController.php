<?php

namespace frontend\controllers;
use frontend\models\Employee_search;
use frontend\models\Employees;
use frontend\models\Stateslist;
use yii\web\UploadedFile;
use yii\helpers\Url;
use frontend\components\EmployeeModuleBehavior;
use frontend\models\StatesDistricList;

use Yii;


class EmployeeController extends \yii\web\Controller
{
    public function behaviors()
    {
        $session = Yii::$app->session;
       
        return [
            'empmodulbehavior'=>[
                'class'=>EmployeeModuleBehavior::className(),
                'username'=>(isset($_SESSION['user_name']) && $_SESSION['user_name']!='')?$_SESSION['user_name']:'',
                'userid'=>(isset($_SESSION['user_id']) && $_SESSION['user_id']!='')?$_SESSION['user_id']:'',
            ]
        ];
      
    }
    public function actionIndex()
    {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id']!=null) {
            $employeedata=Employees::find()->All();
            $stetes=Stateslist::find()->All();
            return $this->render('index', ['employeedata' => $employeedata,]);
        }else {
            return $this->redirect(Yii::$app->homeUrl.'/site');
        }
    }
    public function actionDeleteEmployee($id)
    {
        $findemployee= Employees::findone($id);
        if (isset($findemployee) && !empty($findemployee)) {
            Employees::findone($id)->delete();
            Yii::$app->session->setFlash('success', 'Employee Removed Successfully');
        }else{
            Yii::$app->session->setFlash('error', 'Wrong Action Perform');
        }
        return $this->actionIndex();
        // $delete->delete()
    }
    public function actionUpdateImage($id){
        echo $id;
        $previousfile='';
        $employeedata=Employees::findone($id);
        if (!empty($employeedata)) {
            $previousfile=$employeedata->empimg;
            $post=Yii::$app->request->post();
            if (isset($post['updateimagebtn']) && $post['updateimagebtn']==$id) {
                $model = new \frontend\models\employees();
                $model->empimg= UploadedFile::getInstance($model,'empimg');
                echo $filename= (!empty($model->empimg))?time().'.'.$model->empimg->extension:'';
                $filesize=$model->empimg->size;
                $fileextension=array('jpg','gif');
                if ($filesize<=1048576 && in_array($model->empimg->extension,$fileextension)) {
                    echo "file size-:".$filesize;
                    //$filename= (!empty($model->empimg))?time().'.'.$model->empimg->extension:'';
                    $employeedata->empimg=$filename;
                    $employeedata->save();
                    $model->empimg->saveAs('uploads/employeeImages/'.$filename);
                    if ($previousfile!='') {
                        unlink(Yii::$app->basePath."/web/uploads/employeeImages/".$previousfile);
                    }
                    Yii::$app->session->setFlash('success', 'Employee Image Update Successfuly');
                    return $this->redirect(Yii::$app->homeUrl.'/employee');
                }else {
                    Yii::$app->session->setFlash('error', 'File Type and size are not valied');
                }
            }
        }else {
            Yii::$app->session->setFlash('error', 'Employee Details Mismach');
        }
        return $this->render('updateimage', ['employeedata' => $employeedata]);
    }
    public function actionEditEmployee($id){
        //echo "reched edit function";
        $post=Yii::$app->request->post();
        if (isset($post['updatebtn'])) {
            if (isset($post['empid']) && $post['empid']==$id) {
               $update=Employees::findone($id);
               $update->name=Yii::$app->request->post('Employees')['name'];
               $update->email=Yii::$app->request->post('Employees')['email'];
               $update->phone=Yii::$app->request->post('Employees')['phone'];
               $update->address=Yii::$app->request->post('Employees')['address'];
               $update->dob=Yii::$app->request->post('Employees')['dob'];
               $update->save();
               Yii::$app->session->setFlash('success', 'Employee Update Successfully');
                //echo "<pre>"; print_r(Yii::$app->request->post('Employees')['name']);die;
               // return $this->actionIndex();
              
            }else {
                Yii::$app->session->setFlash('error', 'Wrong Action');
            }
            return $this->redirect(Yii::$app->homeUrl.'/employee');
             
        }
        $employeedata=Employees::findone($id);
        return $this->render('empedit', ['employeedata' => $employeedata]);
    }
    public function actionRemoveImage($id){
       
           
               $employee=Employees::findone($id);
              // echo "<pre>";print_r($employee);echo "</pre>";die;
               if (!empty($employee)) {
               
               // echo $employee->empimg;die;
                unlink(Yii::$app->basePath."/web/uploads/employeeImages/".$employee->empimg);
                $employee->empimg='';
                $employee->save();
                Yii::$app->session->setFlash('success', 'Employee Image Remove Successfully');
               }else {
                Yii::$app->session->setFlash('error', 'Employee image not Removed');
               }
                
            
            return $this->actionIndex();
         
    }
   

    

    public function actionEmpadd()
    {
        $model = new \frontend\models\employees();
        $stetes=Stateslist::find()->All();
        $post=Yii::$app->request->post();
        if (!empty($post) && $model->load($post)) {
         
          // echo "<pre>";print_r(Yii::$app->request->post()); echo "</pre>";die;
           
            if ($model->validate()) {
                $model->empimg= UploadedFile::getInstance($model,'empimg');
                $filename= (!empty($model->empimg))?time().'.'.$model->empimg->extension:'';
                ($filename!='')?$model->empimg->saveAs('uploads/employeeImages/'.$filename):'';
                $model->empimg=$filename;
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Employee Add Successfully');
                    return $this->refresh();
                }else{
                    //echo "data not saved";
                    unlink(Yii::$app->basePath . 'uploads/employeeImages/' . $filename);
                    Yii::$app->session->setFlash('error', 'Data Not Inserted');
                }
            }else {
                Yii::$app->session->setFlash('error', 'Data Not Valiated');
            }
        }
        return $this->render('empadd', ['model' => $model,'stateslist'=> $stetes]);
    }

    public function actionDistriclist($id){
       $countdistric=StatesDistricList::find()->where(['parent_id'=>$id])->count();
        if ($countdistric > 0) {
            $districs=StatesDistricList::find()->where(['parent_id'=>$id])->all();
            foreach ($districs as $distric) {
                echo "<option value='".$distric->id."'>".$distric->distric_name."</option>";
            }
        }else {
            echo "<option></option>";
        }

    }

}
