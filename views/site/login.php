<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Masuk';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-user form-control-feedback'></span>",
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>",
];
?>


<div class="login-box">
    <div class="login-logo">
        <img src="<?= Url::to(["/img/logo.png"]) ?>" alt="UIN Sunan Ampel Surabaya">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Tracer Study UIN Sunan Ampel</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form->errorSummary($model); ?>
        <!-- ADDED HERE -->
        <?= $form
            ->field($model, 'nim', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => 'NIM']); ?>

    


    
        <?= Html::submitButton('Masuk', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']); ?>




        <?php ActiveForm::end(); ?>


    </div>
    <!-- /.login-box-body -->


</div><!-- /.login-box -->