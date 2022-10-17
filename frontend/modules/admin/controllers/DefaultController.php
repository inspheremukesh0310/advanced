<?php

namespace frontend\modules\admin\controllers;

use yii\web\Controller;

use frontend\modules\admin\models\Student;

/**
 * Default controller for the `admin` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $data= Student::find()->asArray()->all();
        echo "<pre>"; print_r($data);die;
       // return $this->render('index');
    }
}
