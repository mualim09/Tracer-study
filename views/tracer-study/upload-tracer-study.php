<?php
  use yii\widgets\ActiveForm;

  use app\models\Prodi;
use yii\helpers\ArrayHelper;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
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

<h3>Upload Hasil Tracer Study</h3>


<?php $form = ActiveForm::begin(
    [
        'options' => ['enctype' => 'multipart/form-data'],
        'action' => ['upload-tracer-study'],
        'method' => 'post',
    ]

); ?>
        <?= $form->errorSummary($model); ?> <!-- ADDED HERE -->

        <?= $form->field($model, 'file')->fileInput() ?>

        
        <div class="row">
            <label class="col-md-3 col-form-label"><?= $model->getAttributeLabel('fakultas') ?></label>
            <div class="col-md-6"><?= $form->field($model, 'fakultas')->widget(Select2::className(), ['data' => $fakultas, 'options' => ['placeholder' => 'Pilih Fakultas ...']])->label(false) ?></div>
         </div>

         <div class="row">
            <label class="col-md-3 col-form-label"><?= $model->getAttributeLabel('prodi') ?></label>
            <div class="col-md-6"><?= $form->field($model, 'prodi')->widget(DepDrop::classname(), [
                                       'type' => DepDrop::TYPE_SELECT2,
                                       'options' => ['placeholder' => 'Pilih Program Studi ...'],
                                       'select2Options' => ['pluginOptions' => ['allowClear' => true]],
                                       'pluginOptions' => [
                                          'depends' => ['dynamicmodel-fakultas'],
                                          'url' => Url::to(['/tracer-study/jurusan']),
                                          'placeholder' => 'Pilih Program Studi ...',
                                          'initialize' => true,
                                       ],
                                    ])->label(false); ?></div>
         </div>





        <?php ActiveForm::end() ?>