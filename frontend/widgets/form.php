<?php
 namespace frontend\widgets;
 use yii\base\Widget;


    class Form extends Widget{
        public $pageTitle;
        public $records;
        
        public function run()
        {
          return $html=$this->pageTitle.'<form>
           <div class="container">
             <div class="row">
                <div class="col-md-5">
                    <label for="name"><b>Name</b></label>
                    <input type="text" class="form-control" placeholder="Enter Name" name="name" id="name" required>
                </div>
                <div class="col-md-5">
                <label for="email"><b>Email</b></label>
                <input type="text" class="form-control" placeholder="Enter Email" name="email" id="email" required>
                </div>
             </div>
             
             <div class="row mt-3">
                <div class="col-md-5">
                    <label for="psw"><b>Password</b></label>
                    <input type="password" class="form-control" placeholder="Enter Password" name="psw" id="psw" required>
                </div>
                <div class="col-md-5">
                    <label for="psw-repeat"><b>Repeat Password</b></label>
                    <input type="password" class="form-control" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
                    
                </div>
                <div class="row">
                   <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                </div>
                
             </div>
             <div class="row">
                <div class="col-md-5">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
             </div>
             
           </div>
           
           <div class="container signin">
             <p>Already have an account? <a href="#">Sign in</a>.</p>
           </div>
         </form>';
        }
    }
?>