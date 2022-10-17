<?php

namespace frontend\controllers;
use Yii;
use frontend\components\MyBehavior;
use frontend\models\EmployeeForm;

class DataTwoController extends \yii\web\Controller
{
    public function behaviors()
    {
        return[
          //  MyBehavior::className(), //anonymos behavior-1

        //   [
        //     'class'=>MyBehavior::className(),
        //     'prop1'=>'test',
        //     'prop2'=>'test2'
        //   ], //anonymos behavior-2

         // 'behavior1'=>MyBehavior::className() // name behavior-3

          'behavior2'=>[
            'class'=>MyBehavior::className(),
            'prop1'=>'mediam',
            'prop2'=>'low'
          ]

        ];
    }
    public function actionIndex(){
        echo "data two";
        //return $this->render('index');
    }
   
}
?>