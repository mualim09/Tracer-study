<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model app\models\TracerStudy */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Tracer Study'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tracer-study-view">


    <p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nim',
            'nama',
            'alamat:ntext',
            'no_telepon',
            'email:email',
            
        ],
    ]) ?>
  <?=Html::a(
                                    '<span class ="text-center btn btn-info"> Keluar </span>',
                                    ['/site/logout'],
                                    ['data-method' => 'post']
                                ); ?>
</div>
