<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use frontend\assets\LoginAsset;
LoginAsset::register($this);

/** @var yii\web\View $this */
/** @var frontend\models\UserLogin $model */
/** @var ActiveForm $form */
?>
<div class="user-login-index">
    <?php $form = ActiveForm::begin(); ?>
    <div class="container">
        <div class="imgcontainer">
            <img src="img_avatar2.png" alt="Avatar" class="avatar">
        </div>
        <div class="container">
            <?= $form->field($model, 'username')->textInput(['placeholder'=>'Enter Username']) ?>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true,'value'=>"",'placeholder'=>'Enter Password']) ?>
            <?= Html::submitButton('Submit', ['name'=>'loginbtn']) ?>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>
        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div><!-- user-login-signup -->
