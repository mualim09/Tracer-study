<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Prodi;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $model app\models\TracerStudy */
/* @var $form yii\widgets\ActiveForm */

$fakultas = ArrayHelper::map(
   Prodi::find()->select(['kodeunit', 'namaunit'])->where(['level' => '1'])->asArray()->all(),
   'kodeunit',
   'namaunit'
);



?>

<div class="tracer-study-form">

   <?php $form = ActiveForm::begin(); ?>
   <?= $form->errorSummary($model) ?>
   <!-- ADDED HERE -->

   <div class="row">
      <label class="col-md-3 col-form-label"><?= $model->getAttributeLabel('nim') ?></label>
      <div class="col-md-6"><?= $form->field($model, 'nim')->textInput(['maxlength' => true])->label(false) ?></div>
   </div>

   <div class="row">
      <label class="col-md-3 col-form-label"><?= $model->getAttributeLabel('nama') ?></label>
      <div class="col-md-6"><?= $form->field($model, 'nama')->textInput(['maxlength' => true])->label(false) ?></div>
   </div>



   <div class="row">
      <label class="col-md-3 col-form-label"><?= $model->getAttributeLabel('Alamat') ?></label>
      <div class="col-md-6"><?= $form->field($model, 'alamat')->textarea(['rows' => '6'])->label(false) ?></div>
   </div>


   <div class="row">
      <label class="col-md-3 col-form-label"><?= $model->getAttributeLabel('no_telepon') ?></label>
      <div class="col-md-6"><?= $form->field($model, 'no_telepon')->textInput(['maxlength' => true])->label(false) ?></div>
   </div>

   <div class="row">
      <label class="col-md-3 col-form-label"><?= $model->getAttributeLabel('email') ?></label>
      <div class="col-md-6"><?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(false) ?></div>
   </div>

   <div class="row">
      <label class="col-md-3 col-form-label"><?= $model->getAttributeLabel('fakultas') ?></label>
      <div class="col-md-6"><?= $form->field($model, 'fakultas')->widget(Select2::className(), ['data' => $fakultas, 'options' => ['placeholder' => 'Pilih Fakultas ...']])->label(false) ?></div>
   </div>

   <div class="row">
      <label class="col-md-3 col-form-label"><?= $model->getAttributeLabel('jurusan') ?></label>
      <div class="col-md-6"><?= $form->field($model, 'jurusan')-> widget(DepDrop::classname(), [
                                 'type' => DepDrop::TYPE_SELECT2,
                                 'data' => [$model->jurusan => $model->nama_prodi],
                                 'options' => ['placeholder' => 'Pilih Jurusan ...'],
                                 'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                 'pluginOptions' => [
                                    'depends' => ['tracerstudy-fakultas'],
                                    'url' => Url::to(['/tracer-study/jurusan']),
                                    'placeholder' => 'Pilih Jurusan ...',
                                    'initialize' => true,
                                 ],
                              ])->label(false); ?></div>
   </div>

   <div class="form-group">
      <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
   </div>

   <?php ActiveForm::end(); ?>

</div>