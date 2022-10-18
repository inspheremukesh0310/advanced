<?php
    namespace frontend\components;
    
    use yii\base\Behavior;

    class EmployeeModuleBehavior extends Behavior{

        public $username;
        public $userid;
        public function events(){
          // echo $this->username."[".$this->userid."]";
            return [

            ];
        }
    }

?>