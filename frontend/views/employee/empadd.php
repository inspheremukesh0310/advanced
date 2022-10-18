<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Stateslist;
use frontend\models\StatesDistricList;
?>
<div class="empadd">
    <?php $form = ActiveForm::begin(['options' => [ 'enctype' => 'multipart/form-data','autocomplete' => 'off']]); ?>
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
                        <?= $form->field($model, 'name')->textInput(['autofocus' => true ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'dob')
                        ->widget(\yii\jui\DatePicker::classname(), [
                            //'language' => 'ru',
                            'dateFormat' => 'yyyy-MM-dd',
                            'class'=>'form-control',
                            'options' => ['class' => 'form-control'],
                        ]) ?>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <?= $form->field($model, 'email')->textInput(['type'=>'email']) ?>
                    </div>
                    <div class="col-md-6">
                        <?=$form->field($model, 'phone')->textInput(['autofocus'=>true]) ?>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <?=$form->field($model, 'gender')->dropDownList ( ['Select Gender','Male','Female','Other'], $options = [0,1,2,3] ) ?>
                    </div>
                    <div class="col-md-6">
                        <?=$form->field($model, 'maritalstatus')->dropDownList ( ['Select Marrital Status','Married','Unmarried'], $options = [0,1,2] ) ?>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <?=$form->field($model, 'address')->textarea(['rows' => 2]) ?>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-4">
                        <?= $form->field($model, 'state')->dropDownList (ArrayHelper::map(Stateslist::find()->all(),'id','states_name'),
                        [
                            'prompt'=>'Select State',
                            'onchange'=>'
                            $.post("districlist?id='.'"+$(this).val(),function(data){
                                $("select#employees-distric").html(data);
                            });'
                        ]); ?>
                    </div>
                    <div class="col-md-4">
                        <?= $form->field($model, 'distric')->dropDownList (ArrayHelper::map(StatesDistricList::find()->where(['id'=>0])->all(),'id','distric_name'),
                        [
                            'prompt'=>'Select Distric',
                            // 'onchange'=>'
                            // $.post("districlist?id='.'"+$(this).val(),function(data){
                            //     $("select#models-contant").html(data);
                            // });'
                        ]); ?>
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
                    <center>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </center>
                </div>
            </div>
            <div class="card-footer text-muted">Form Footer</div>
        </div>
    <?php ActiveForm::end(); ?>
</div><!-- empadd -->
