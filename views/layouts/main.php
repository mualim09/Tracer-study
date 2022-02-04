<?php

use hscstudio\mimin\components\Mimin;
use yii\helpers\Url;
use yii\helpers\Html;
use dmstr\widgets\Alert;
use app\assets\MaterialPluginAsset;

if (Yii::$app->controller->action->id === 'login') {
    /**
     * Do not use this code in your template. Remove it.
     * Instead, use the code  $this->layout = '//main-login'; in your controller.
     */
    echo $this->render(
            'main-login',
            ['content' => $content]
        );
} else {
    $menuItems =
        [
                     [
                        'visible' => !Yii::$app->user->isGuest,
                        'label' => 'User / Group',
                        'icon' => 'user-o',
                        'url' => '#',
                        'items' => [
                    ['label' => 'App. Route', 'icon' => 'user-o', 'url' => ['/mimin/route/'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Role', 'icon' => 'users', 'url' => ['/mimin/role/'], 'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'User', 'icon' => 'user-o', 'url' => ['/mimin/user/'], 'visible' => !Yii::$app->user->isGuest],
                   ], ],
                   [  'visible' => !Yii::$app->user->isGuest,
                   'label' => 'Tracer Study',
                   'icon' => 'book',
                   'url' => ['/tracer-study/index']],
               [  'visible' => !Yii::$app->user->isGuest,
                   'label' => 'Survei Kepuasan Pengguna Layanan',
                   'icon' => 'book',
                   'url' => ['/tracer-study/index-survey']],

                   [  'visible' => !Yii::$app->user->isGuest,
                   'label' => 'Pertanyaan',
                   'icon' => 'question',
                   'url' => ['/pertanyaan/index']],
      
                   
                   [
                    'visible' => !Yii::$app->user->isGuest,
                    'label' => 'Laporan',
                    'icon' => 'user-o',
                    'url' => '#',
                    'items' => [
         [  'visible' => !Yii::$app->user->isGuest,
                   'label' => 'Laporan  Hasil Tracer Study',
                   'icon' => 'book',
                   'url' => ['/report/index']],
                    
                   [  'visible' => !Yii::$app->user->isGuest,
                   'label' => 'Laporan Waktu Tunggu',
                   'icon' => 'clock-o',
                   'url' => ['/laporan-lulus/waktu-tunggu']],

                   [  'visible' => !Yii::$app->user->isGuest,
                   'label' => 'Laporan Kesesuaian Pekerjaan',
                   'icon' => 'check-square-o',
                   'url' => ['/laporan-lulus/kesesuaian']],
                   [  'visible' => !Yii::$app->user->isGuest,
                   'label' => 'Laporan Tingkat Pekerjaan',
                   'icon' => 'bar-chart-o',
                   'url' => ['/laporan-lulus/tingkat-pekerjaan']],
                   
             
                   [  'visible' => !Yii::$app->user->isGuest,
                   'label' => 'Laporan Survey Pengguna Lulusan',
                   'icon' => 'user-o', 
                   'url' => ['/laporan-lulus/survey-kepuasan']],
                   [  'visible' => !Yii::$app->user->isGuest,
                   'label' => 'Hasil Survey Pengguna Lulusan',
                   'icon' => 'star', 
                   'url' => ['/survey-kepuasan']],
                   
                   ]

                   ]
                
                                  
                ];

    if (!Yii::$app->user->isGuest) {
        if (Yii::$app->user->identity->username !== 'admin') {
            $menuItems = Mimin::filterMenu($menuItems);
        }
    }
    /*
     * @var string
     * @var \yii\web\View $this
     */
    $this->title = 'Tracer Study Alumni UIN Sunan Ampel';
  

    $bundle = yiister\gentelella\assets\Asset::register($this); ?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language; ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta charset="<?= Yii::$app->charset; ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
      <link rel="icon" type="image/png" href="<?= Url::to('@web/uin.png'); ?>">
       
    <?= Html::csrfMetaTags(); ?>
    <title><?= Html::encode($this->title); ?></title>
    <?php $this->head(); ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags(); ?>
    <title><?= Html::encode($this->title); ?></title>
  
    <?php $this->head(); ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="nav-<?= !empty($_COOKIE['menuIsCollapsed']) && $_COOKIE['menuIsCollapsed'] == 'true' ? 'sm' : 'md'; ?>" >
<?php $this->beginBody(); ?>
<div class="container body">

    <div class="main_container">

        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">

                <div class="navbar nav_title" style="border: 0;">
                    <a href='#' class="site_title"><i class="fa fa-list-alt"></i> <span>Tracer Study</span></a>
                </div>
                <div class="clearfix"></div>


                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                    <div class="menu_section">
                        <?=
                        \yiister\gentelella\widgets\Menu::widget(
                            [
                                'options' => ['class' => 'sidebar-menu'],
                                'items' => $menuItems,
                            ]
                        ); ?>
                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">

                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

            <div class="nav_menu">
                <nav class="" role="navigation">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                  <?php if(!Yii::$app->user->isGuest) { ?>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <?=Yii::$app->user->identity->username?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li>
                                <?=Html::a(
                                    '<i class="fa fa-sign-out pull-right"></i> Log Out',
                                    ['/site/logout'],
                                    ['data-method' => 'post']
                                ); ?>
                                </li>
                            </ul>
                        </li>

                    </ul>
                   <?php } ?>
                </nav>
            </div>

        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
            <?php if (isset($this->params['h1'])): ?>
                <div class="page-title">
                    <div class="title_left">
                        <h1><?= $this->params['h1']; ?></h1>
                    </div>
                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">Go!</button>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="clearfix"></div>

            <?=Alert::widget()?>

            <?= $content; ?>
        </div>
        <!-- /page content -->
        <!-- footer content -->
        <footer>
            <div class="pull-left">
             PUSTIPD Uinsa &copy; <?=date('Y'); ?>
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>

</div>

<div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
</div>
<!-- /footer content -->
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>
                            <?php
}?>