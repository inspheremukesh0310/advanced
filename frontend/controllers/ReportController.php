<?php

namespace frontend\controllers;
use yii\base\Event;

class ReportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
