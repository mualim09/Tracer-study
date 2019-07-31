<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mdm\widgets\TabularInput;
/* @var $this yii\web\View */
/* @var $model app\models\Pertanyaan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pertanyaan-form">



    <?php $form = ActiveForm::begin(); ?>
        <?= $form->errorSummary($model) ?> <!-- ADDED HERE -->

     <div class="row">
        <label class="col-md-3 col-form-label"><?=$model->getAttributeLabel('pertanyaan') ?></label>
        <div class="col-md-6"><?=$form->field($model, 'pertanyaan')->textInput(['maxlength' => true])->label(false)?></div></div> 
    <div class="row">
        <label class="col-md-3 col-form-label"><?=$model->getAttributeLabel('jenis') ?></label>
        <div class="col-md-6"><?=$form->field($model, 'jenis')->dropDownList(["1" => 'Isian','2' => "Multiple Choise" ],[
            
          
        ])->label(false)?></div></div> 


        <div class="x_title" id="div-jawaban">
             
             <h4 class="card-title">Jawaban</h4>
         </div>

         <table class="table">
    <thead>
        <tr>
           
            <th width="80%">Jawaban</th>
           

            <th><a id="btn-add2" href="#"><span class="glyphicon glyphicon-plus"></span></a></th>
        </tr>
    </thead>
    <?= \mdm\widgets\TabularInput::widget([
        'id' => 'detail-grid',
        'allModels' => $model->jawabans,
        'model' => \app\models\Jawaban::className(),
        'tag' => 'tbody',
        'form' => $form,
        'itemOptions' => ['tag' => 'tr'],
        'itemView' => '_item',
        'clientOptions' => [
            'btnAddSelector' => '#btn-add2',
        ]
    ]);
    ?>

    </table>
        </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>


</div>
