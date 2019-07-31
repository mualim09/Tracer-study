<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pertanyaan */

$this->title = Yii::t('app', 'Pertanyaan  Baru');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Daftar Pertanyaan'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pertanyaan-create">
<div class="row">
    <div class="col-md-12">
        <div class="x_panel ">
            <div class="x_title">
             
                <h4 class="card-title"><?= $this->title ?></h4>
            </div>
            <div class="x_content">

                <?=
                $this->render('_form', [
                    'model' => $model,

                ]);
                ?>

            </div>
        </div>
    </div>
</div>
</div>

</div>

