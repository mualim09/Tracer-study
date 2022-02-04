<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use app\models\Prodi;

use yii\helpers\ArrayHelper;

use kartik\grid\GridView;
use yii\widgets\Pjax;

$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
                  'nim',
            'nama',
            'alamat:ntext',
              'tahun_lulus',
            // 'email:email',
       
              ['attribute' => 'nama_fakultas',
               'filter' => ( ArrayHelper::map(
   Prodi::find()->select(['idunit', 'namaunit'])->where(['levelunit' => '2'])->asArray()->all(),
   'idunit',
   'namaunit'
))
              
              ],
              
            'prodi.namaunit',
       'email:email',
             'no_telepon',
            '1',
             '2',
             '3',
             '4',
             '5',
             '8',
             '9',
             '10',
             '15',
            '23',
             '24',

   ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\ReportSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Laporan Tracer Study');
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

    <?php Pjax::end(); ?>
</div>
