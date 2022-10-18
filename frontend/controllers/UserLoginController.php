<?php

namespace frontend\controllers;
use Yii;
use frontend\models\Userlogin;
use yii\web\UploadedFile;
use yii\helpers\Url;


class UserLoginController extends \yii\web\Controller
{
    
    public $secretKey = 'WHATEVER_SECRET_YOU_CHOOSE';
    public function actionIndex()
    {
        if (isset($_SESSION['user_id']) && $_SESSION['user_id']!=null) {
            return $this->redirect(Yii::$app->homeUrl.'/site');
        }else {
            $model = new UserLogin();
            $post=Yii::$app->request->post();
           // echo "<pre>";print_r(Yii::$app->request->post());die;
            if (isset($post['loginbtn'])) {
                //echo 1;die;
                $password=Yii::$app->request->post('Userlogin')['password'];
                $username=Yii::$app->request->post('Userlogin')['username'];
                if (isset($password) && isset($username) && $username!='' && $password!='') {
                  $finduser=UserLogin::findOne(['username' => $username, 'status' => 1]);
                 
                    if (Yii::$app->getSecurity()->validatePassword($password, $finduser->password)) {
                       $queryuser=UserLogin::findone(['username'=>$username ,'password'=>$finduser->password]);
                       
                       //echo "<pre>";print_r($queryuser);die;
                        if (!empty($queryuser)) {
                            $session = Yii::$app->session;
                            $session->set('user_id', $queryuser->id);
                            $session->set('user_name', $queryuser->username);
                            Yii::$app->session->setFlash('success', 'Login Successfuly');
                            return $this->redirect(Yii::$app->homeUrl.'/employee');
                        }
                    }else {
                        Yii::$app->session->setFlash('error', 'Please Enter a valid user name or password');
                    }
                }else {
                    Yii::$app->session->setFlash('error', 'User Name or Password can not be blank');
                }
            }
            return $this->render('index', [
                'model' => $model,
            ]);
        }
    }

    public function actionSignup()
{
    $model = new UserLogin();
    //$model->load(Yii::$app->request->post());
    $post=Yii::$app->request->post();
    if (isset($post['signupbtn'])) {
        $password=Yii::$app->request->post('Userlogin')['password'];
        $username=Yii::$app->request->post('Userlogin')['username'];
        if (isset($password) && isset($username) && $username!='' && $password!='') {
           // echo "<pre>";print_r(Yii::$app->request->post());die;
           $hash = Yii::$app->getSecurity()->generatePasswordHash($password);
           if ($hash!='') {
                //echo "1";die;
                //$add= new UserLogin();
                $model->username=$username;
                $model->password=$hash;
               // echo "<pre>";print_r($add);die;
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'User Signup Successfuly');
                    return $this->actionIndex();
                }
                else {
                    Yii::$app->session->setFlash('error', 'User Signup failed');
                }
            }
        }else {
            Yii::$app->session->setFlash('error', 'User Name or Password can not be blank');
           }
        
    }

    return $this->render('signup', [
        'model' => $model,
    ]);
}

public function actionLogout(){
    $session = Yii::$app->session;
    //$session->remove('user_id');
    //OR
    //unset($session['user_id']);
    //OR
    unset($_SESSION['user_id']);
    return $this->redirect(Yii::$app->homeUrl.'/site');
}

}
