<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\components\CommonComponent;



/* @var $this yii\web\View */
/* @var $model frontend\models\employees */
/* @var $form ActiveForm */
?>
<div class="empadd">

    <?php $form = ActiveForm::begin(['options' => [ 'enctype' => 'multipart/form-data']]); ?>
        <?php //echo $form->field($model, 'id')->hiddenInput() ?>
        <?php //echo $form->field($model, 'name')->textInput(['autofocus' => true ]) ?>
        <?php //echo $form->field($model, 'email') ?>
        <?php //echo $form->field($model, 'phone')->textInput(['autofocus'=>true]) ?>
        <?php //echo $form->field($model, 'gender')-> radioList ( ['Male','Female','Other'], $options = [1,2,3] ) ?>
        <?php //echo $form->field($model, 'maritalstatus')->dropDownList ( ['Select Marrital Status','Married','Unmarried'], $options = [0,1,2] ) ?>
        <?php //echo $form->field($model, 'dob') ?>
        <?php //echo $form->field($model, 'address')->textarea(['rows' => 4]) ?>
        <div class="card mt-3">
            <div class="card-header bg-info">
                <div class="row">
                    <div class="col-md-11"><label for="">Add Employee</label></div> 
                    <div class="col-md-1">
                        <a href="<?=Yii::$app->request->baseUrl.'/employee'?>" class="btn btn-danger">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
            <div class="row mt-2">
            <div class="col-md-6">
                <label for="name"><strong>Name</strong></label>
                <input type="text" name="Employees[name]" class="form-control">
            </div>
            <div class="col-md-6">
                <!-- <label for="dob"><strong>Date of Birth</strong></label>
                <input type="date" name="Employees[dob]" class="form-control"> -->
                <?= $form->field($model, 'dob')->widget(\yii\jui\DatePicker::classname(), [
                        //'language' => 'ru',
                        'dateFormat' => 'yyyy-MM-dd',
                        'class'=>'form-control',
                        'options' => ['class' => 'form-control'],
                    ]) ?>
                
               
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="email"><strong>Email</strong></label>
                <input type="email" name="Employees[email]" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="phone"><strong>Mobile Number</strong></label>
                <input type="text" name="Employees[phone]" class="form-control">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="gender"><strong>Gender</strong></label>
                <select name="Employees[gender]" id="gender" class="form-control">
                    <option value="0">Select Gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Other</option>
                </select>
            </div>
            <div class="col-md-6">
            <label for="maritalstatus"><strong>Marital Status</strong></label>
                <select name="Employees[maritalstatus]" id="maritalstatus" class="form-control">
                    <option value="0">Select Marital Status</option>
                    <option value="1">Maried</option>
                    <option value="2">Unmaried</option>
                    <option value="3">Other</option>
                </select>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <label for="address"><strong>Address</strong></label>
                <textarea name="Employees[address]" id="address" cols="30" rows="3" class="form-control"></textarea>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-4">
                <label for="address"><strong>State</strong></label>
                <select name="" id="" class="form-control">
                    <option value="">Select State</option>
                    <?php
                        foreach ($stateslist as $states) {
                            ?>
                                <option value="<?=$states->id?>"><?=$states->states_name?></option>
                            <?php
                        }
                    ?>
                </select>
                
            </div>
            <div class="col-md-4">
                <label for="address"><strong>Distric</strong></label>
                <select name="" id="" class="form-control">
                    <option value="">Select Distric</option>
                </select>
               
            </div>
            <div class="col-md-4">
                <label for="address"><strong>Pin Code</strong></label>
                <select name="" id="" class="form-control">
                    <option value="">Select Pin Code</option>
                </select>
               
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label for="address"><strong>Employee Image</strong></label>
                <input type="file" name="Employees[empimg]" id="empimg" class="form-control">
            </div>
            <div class="col-md-6 alert alert-info">
            <strong>Upload Image Instructions</strong>
            <p>Except Only jpg,jpge & png only!!!<br>File size mimimum 100kb and maxmimum 200kb.</p>
            
            </div>
        </div>
        <div class="row mt-3">
            <center><div class="col-md-3">
                <button type="submit" class="btn btn-success">Submit</button>
            </div></center>
        </div>
            </div>
            <div class="card-footer text-muted">Form Footer</div>
        </div>
        
    <?php ActiveForm::end(); ?>

</div><!-- empadd -->
