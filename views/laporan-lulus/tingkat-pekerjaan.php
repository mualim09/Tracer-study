<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use app\models\Prodi;

use yii\helpers\ArrayHelper;

use kartik\grid\GridView;
use yii\widgets\Pjax;

$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
         'tahun',
         'prodi.namaunit',
         'jmllulus',
         ['label' =>   'Jml Lulusan Terlacak',

            'value' => function($model){
                return $model->tingkat_pekerjaan_lokal + $model->tingkat_pekerjaan_nasional + $model->tingkat_pekerjaan_internasional;
            }

],
         'tingkat_pekerjaan_lokal',
            'tingkat_pekerjaan_nasional',
            'tingkat_pekerjaan_internasional',
 
        

   ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Laporan Tingkat Pekerjaan Lulusan');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="report-index">

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body text-left">
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






    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel ,'action' =>'tingkat-pekerjaan']); ?>
   <?= GridView::widget([
        'dataProvider' => $dataProvider,
      //  'filterModel' => $searchModel,
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

    <?php Pjax::end(); ?>
</div>
