<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;

use yii\grid\GridView;


$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
         'nama_fakultas',
         'nama_prodi',
         
            'pertanyaan',
            'j4:decimal',
            'j3:decimal',
            'j2:decimal',
             'j1:decimal',
             
    ];


/* @var $this yii\web\View */
/* @var $searchModel app\models\SurveyKepuasanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Daftar Survey Kepuasan');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="survey-kepuasan-index">

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body text-left">
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
//        'filterModel' => $searchModel,
        'columns' => $gridColumns,
        
    ]);
 ?>

</div>
            </div>
        </div>
    </div>
