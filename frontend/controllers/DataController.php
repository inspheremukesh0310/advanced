<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Student;
use frontend\components\MyBehavior;

class DataController extends \yii\web\Controller
{
    public function behaviors()
    {
        return[
            MyBehavior::className()
        ];
    }
    public function actionQuery()
    {
        // $data= Student::find()->all();
       
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        //return $this->render('index');
       

        ///////////Insert/////////

        // $add= new Student();
        // $add->user_name='Raj';
        // $add->contact_number ='9845478952';
        // $add->password='Raj@123';
        // $add->save();

        ///////////Update/////////


        // $add = Student::findone(6);
        // $add->user_name='Raj Singh';
        // $add->contact_number ='9845478952';
        // $add->password='Raj@123';
        // $add->save();

        ////Delete/////
 
        // $delete = Student::findone(6);
        // $delete->delete();

        /////select////

        // $select=Student::findAll(['id'=>5]); 

        // foreach ($select as $value) {
        //     echo $value->user_name;
        // }

        /// condition////
       // $data=Student::find()->where(['id'=>4]);

        //check query//
       // echo $data->createCommand()->getRawSql();die;

       
        
       // echo "Data Controler";
    }

    public function actionIndex(){
       // Yii::$app->session->setFlash('message','Welcome To Index Page');
        return $this->render('index');
    }

    public function actionSetFlashsession(){
        Yii::$app->session->setFlash('message','Welcome To Index Page');
        echo "flash massege";
        
    }

    public function actionQueryBuilder(){
        $data=new Student();
        $data->getData();
        //echo "mukesh";
    }

    public function actionComponent(){
        echo Yii::$app->common->getToken();
        echo "nxyz";
    }

    public function actionComponent2(){
        $data= Yii::$app->common->getuserdata();
        echo "<pre>";print_r($data);echo "</pre>";
        //echo "nxyz";
    }

    public function actionSetSession(){
        Yii::$app->session->set('UserName','Mukesh Upadhyay');
        Yii::$app->session->set('Email-Id','mukesh@gmail.com');
        echo " set-sesstion";
    }

    public function actionGetSession(){
       echo Yii::$app->session->get('UserName').'=='.Yii::$app->session->get('Email-Id');
        echo " get-sesstion";
    }


    public function actionUnsetSession(){
      // unset(Yii::$app->session['UserName']); // first method for unset session
      // Yii::$app->session->remove('Email-Id'); // second method for unset session
       Yii::$app->session->destroy(); // all session destroy
         echo " unset-sesstion";
     }

}
