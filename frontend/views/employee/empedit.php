<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\employees */
/* @var $form ActiveForm */
?>
<div class="empadd"> 

    <?php $form = ActiveForm::begin(['options' => ['autocomplete' => 'off']]); ?>
        <?php //echo $form->field($model, 'id')->hiddenInput() ?>
        
        
        <?php //echo $form->field($model, 'phone')->textInput(['autofocus'=>true]) ?>
        <?php //echo $form->field($model, 'gender')-> radioList ( ['Male','Female','Other'], $options = [1,2,3] ) ?>
        <?php //echo $form->field($model, 'maritalstatus')->dropDownList ( ['Select Marrital Status','Married','Unmarried'], $options = [0,1,2] ) ?>
        <?php //echo $form->field($model, 'dob') ?>
        
        <div class="card mt-1">
            <div class="card-header bg-info">Edit Employee Records</div>
            <div class="card-body">
                <?php echo $form->field($employeedata, 'id')->hiddenInput()->label(false)?>
                <input type="hidden" name="empid" value="<?=isset($employeedata->id) && $employeedata->id!=''?$employeedata->id:''?>">
                <div class="row mt-2">
                    <div class="col-md-6">
                       <?php echo $form->field($employeedata, 'name')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($employeedata, 'dob')->widget(\yii\jui\DatePicker::classname(), [
                        //'language' => 'ru',
                        
                        'dateFormat' => 'yyyy-MM-dd',
                        'options' => ['class' => 'form-control'],
                    ]) ?>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6"> 
                        
                        <?php echo $form->field($employeedata, 'email')->textInput(['autofocus' => true,'type'=>'email','value'=>'']) ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->field($employeedata, 'phone')->textInput(['autofocus' => true])?>
                    </div>
                </div>
                
                <div class="row mt-2"> 
                    <div class="col-md-12">
                       <?php echo $form->field($employeedata, 'address')->textarea(['rows' => 4]) ?>
                    </div>
                </div>
                <div class="row mt-3">
                    <center>
                        <div class="col-md-3">
                            <a href="<?=Yii::$app->request->baseUrl.'/employee'?>" class="btn btn-danger">Back</a>
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-success','name'=>'updatebtn','value'=>'Update']) ?>
                        </div>
                    </center>
                </div>
            </div>
            <div class="card-footer text-muted">Form Footer</div>
        </div>
        
    <?php ActiveForm::end(); ?>

    

</div><!-- empadd -->
