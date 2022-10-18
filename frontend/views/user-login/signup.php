<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var frontend\models\UserLogin $model */
/** @var ActiveForm $form */
?>
<div class="user-login-signup">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'value'=>""]) ?>
        
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary','name'=>'signupbtn']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-login-signup -->
