<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;

use app\models\Prodi;
use yii\helpers\ArrayHelper;

use kartik\grid\GridView;
use yii\widgets\Pjax;

use yii\bootstrap\Modal;
use yii\helpers\Url;

$this->registerCss('
/* Important part */
.modal-dialog{
    overflow-y: initial !important
}
.modal-body{
    height: 500px;
    overflow-y: auto;
}');

$js = <<<JS
$('#modal').insertAfter($('body'));
  $("#modal").on("shown.bs.modal",function(event){
       var button = $(event.relatedTarget);
       var href = button.attr("href");
       $.pjax.reload("#pjax-modal",{
                 "timeout" : false,
                 "url" :href,
                 "replace" :false,
       });
  });
JS;
$this->registerJs($js);




$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
            'nim',
            'nama',
            'alamat:ntext',
            'no_telepon',
              
              'tahun_lulus',
              'tgl_tracer:date',
            // 'email:email',
              ['attribute' => 'nama_fakultas',
               'filter' => ( ArrayHelper::map(
   Prodi::find()->select(['idunit', 'namaunit'])->where(['levelunit' => '2'])->asArray()->all(),
   'idunit',
   'namaunit'
))
              
              ],
            'nama_prodi',

           ['class' => 'yii\grid\ActionColumn', 'options' => [
            'width' => '120px',
        ],
        'contentOptions' => ['class' => 'td-actions text-right'],
        'headerOptions' => ['class' => 'text-right'],
           'template' => Mimin::filterActionColumn([
              'update', 'delete', 'view', ],$this->context->route)],    ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\TracerStudySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Tracer Study');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tracer-study-index">

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body text-left">
              <!--  <?=                     Html::a(
                        Yii::t('app', '<i class="fa fa-upload" aria-hidden="true"></i> Upload '),
                        Url::to(['upload-tracer-study']),
                        ['data-toggle' => 'modal', 'data-target' => '#modal', 'class' => 'popupModal', 'id' => 'href',
                        'title' => 'Upload', 'class' => 'btn btn-info btn-round',
                        ]
                    );?> -->
                       </div>
        </div>
    </div>
     <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-rose card-header-icon">
             
                <h4 class="card-title"><?= $this->title ?> </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">






    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumns,
         'tableOptions' => ['class' => 'table  table-bordered table-hover'],
        'striped' => false,
        'pjax' => true,
        'bordered' => true,
        'striped' => false,
        'condensed' => false,
        'panel' => [
            'type' => GridView::TYPE_SUCCESS,
    
        ],
            'toolbar' => [
           '{export}',
        '{toggleData}',
            ],
         'resizableColumns' => true,
    ]);
 ?>

</div>
            </div>
        </div>
    </div>
</div>

</div>

<?php

Modal::begin([
    'id' => 'modal',
       'header' => '<h4>Upload Tracer Study</h4>',
       'size' => 'modal-lg',
]);

Pjax::begin(
    [
    'id' => 'pjax-modal', 'timeout' => 'false',
    'enablePushState' => 'false',
    'enableReplaceState' => 'false',
    ]
);
Pjax::end();
?>
    <?php Modal::end(); ?>