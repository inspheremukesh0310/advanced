<?php
    namespace frontend\components;
    
    use yii\base\Behavior;

    class MyBehavior extends Behavior{

        public $prop1;
        public $prop2;
        public function events(){
            echo "yes-".$this->prop1.'-'.$this->prop2.'-';
            return [];
        }
    }

?>