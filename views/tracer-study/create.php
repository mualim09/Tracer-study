<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TracerStudy */

$this->title = Yii::t('app', 'Tracer Study');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Tracer Study'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tracer-study-create">
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel ">
                <div class="x_title">

                    <h3><?= Html::encode($this->title) ?></h3>

                </div>
                <div class="x_content">


                    <?= $this->render('_form', [
                        'model' => $model,


                    ]) ?>

                </div>
            </div>
        </div>
    </div>

</div>