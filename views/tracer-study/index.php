<?php


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;

use yii\grid\GridView;


$gridColumns=[['class' => 'yii\grid\SerialColumn'], 
            'nim',
            'nama',
            'alamat:ntext',
            'no_telepon',
            // 'email:email',
            // 'fakultas',
            // 'jurusan',

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
              <?= Html::a( Yii::t('app', 'Tracer Study Baru'), ['create'], ['class' => 'btn btn-success']) ?>            </div>
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
        
    ]);
 ?>

</div>
            </div>
        </div>
    </div>
</div>

</div>
