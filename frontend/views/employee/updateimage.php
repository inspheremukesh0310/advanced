<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model frontend\models\employees */
/* @var $form ActiveForm */
?>
<div class="empadd"> 

    <?php $form = ActiveForm::begin(); ?>
        <?php //echo $form->field($model, 'id')->hiddenInput() ?>
        
        
        <?php //echo $form->field($model, 'phone')->textInput(['autofocus'=>true]) ?>
        <?php //echo $form->field($model, 'gender')-> radioList ( ['Male','Female','Other'], $options = [1,2,3] ) ?>
        <?php //echo $form->field($model, 'maritalstatus')->dropDownList ( ['Select Marrital Status','Married','Unmarried'], $options = [0,1,2] ) ?>
        <?php //echo $form->field($model, 'dob') ?>
        
        <div class="card mt-1">
            <div class="card-header bg-info">Update Employee Image</div>
            <div class="card-body">
                <?php echo $form->field($employeedata, 'id')->hiddenInput()->label(false)?>
                
                <div class="row mt-2">
                    <div class="col-md-6">
                       <h4><?='Name-:'.$employeedata->name?></h4>
                       <?= $form->field($employeedata, 'empimg')->fileInput(['multiple' => false,'class'=>'form-control','accept' => 'image/*']) ?>
                    </div>
                </div>
                
                <div class="row mt-3">
                    <center>
                        <div class="col-md-3">
                            <a href="<?=Yii::$app->request->baseUrl.'/employee'?>" class="btn btn-danger">Back</a>
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-success','name'=>'updateimagebtn','value'=> $employeedata->id]) ?>
                        </div>
                    </center>
                </div>
            </div>
            <div class="card-footer text-muted">Form Footer</div>
        </div>
        
    <?php ActiveForm::end(); ?>

    

</div><!-- empadd -->
