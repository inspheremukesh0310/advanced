<?php

    namespace frontend\components;
    //use yii\base\Component;
    use Yii;
    class CommonComponent extends \yii\base\Component
        {
            public function getToken(){
                return rand(9999,9999999999);
            }

            public function getuserdata(){
                $data= Yii::$app->db->createCommand('select * from user')->queryAll();
                return $data;
            }

            
        }
?>