<?php
use yii\helpers\Html;
use app\assets\MaterialPluginAsset;
use yii\helpers\Url;
use dmstr\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */
$this->title = 'Tracer Study UIN Sunan Ampel';
dmstr\web\AdminLteAsset::register($this);


?>
<?php $this->beginPage(); ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
<head>
      <link rel="icon" type="image/png" href="<?= Url::to('@web/uin.png'); ?>">
       
    <meta charset="<?= Yii::$app->charset; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags(); ?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head(); ?>
</head>
<body class="login-page">

<?php $this->beginBody(); ?>
             <?=Alert::widget()?>

    <?= $content; ?>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
