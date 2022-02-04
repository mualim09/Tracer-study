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
   Prodi::find()->select(['idunit', 'namaunit'])->where(['levelunit' => '2'])->asArray()->all(),
   'idunit',
   'namaunit'
);



?>

<div class="tracer-study-form">

   <div class="x_panel ">
      <div class="x_title">

         <h4>Biodata</h4>
         <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

         </ul>
         <div class="clearfix"></div>
      </div>

      <div class="x_content">

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
            <label class="col-md-3 col-form-label"><?= $model->getAttributeLabel('tahun_lulus') ?></label>
            <div class="col-md-6"><?= $form->field($model, 'tahun_lulus')->textInput(['maxlength' => true])->label(false) ?></div>
         </div>


         <div class="row">
            <label class="col-md-3 col-form-label"><?= $model->getAttributeLabel('fakultas') ?></label>
            <div class="col-md-6"><?= $form->field($model, 'fakultas')->widget(Select2::className(), ['data' => $fakultas, 'options' => ['placeholder' => 'Pilih Fakultas ...']])->label(false) ?></div>
         </div>

         <div class="row">
            <label class="col-md-3 col-form-label"><?= $model->getAttributeLabel('jurusan') ?></label>
            <div class="col-md-6"><?= $form->field($model, 'jurusan')->widget(DepDrop::classname(), [
                                       'type' => DepDrop::TYPE_SELECT2,
                                       'data' => [$model->jurusan => $model->nama_prodi],
                                       'options' => ['placeholder' => 'Pilih Program Studi ...'],
                                       'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                       'pluginOptions' => [
                                          'depends' => ['tracerstudy-fakultas'],
                                          'url' => Url::to(['/tracer-study/jurusan']),
                                          'placeholder' => 'Pilih Program Studi ...',
                                          'initialize' => true,
                                       ],
                                    ])->label(false); ?></div>
         </div>

      </div>
   </div>
   <br>
   <br>
   <br>
   <br>


   <div class="x_panel ">
      <div class="x_title">

         <h4>Pertanyaan</h4>
         <ul class="nav navbar-right panel_toolbox">
            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
            </li>

         </ul>
         <div class="clearfix"></div>
      </div>

      <div class="x_content">

         <?php
         $i = 1;
         foreach ($model->detTracerStudy as $detail) {

            ?>
            <div class="row">
               <?= $form->field($detail, "[$i]id_pertanyaan")->hiddenInput()->label(false); ?>

               <label class="col-md-3 col-form-label"> <?= $detail->pertanyaan->pertanyaan ?> </label>
               <div class="col-md-6">
                  <?php
                  if ($detail->pertanyaan->jenis == 1) {

                     ?>
                     <?= $form->field($detail, "[$i]jawaban")->label(false); ?>

                  <?php
                  } else {
                     $jawab = ArrayHelper::map($detail->pertanyaan->jawabans, 'nilai', 'jawaban');

                     ?>

                     <?= $form->field($detail, "[$i]jawaban")->radioList($jawab, ['separator' => '<br/>'])->label(false); ?>


                  <?php

                  }

                  ?>

               </div>
            </div>


            <?php
            $i++;
         }

         ?>

         <br>
         <br>

         <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Simpan'), ['class' => 'btn btn-success']) ?>
         </div>

         <?php ActiveForm::end(); ?>

      </div>

   </div>
</div>

</div>