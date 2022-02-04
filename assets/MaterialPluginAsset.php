<?php

namespace app\assets;

use yii\web\AssetBundle;

class MaterialPluginAsset extends AssetBundle
{
    //public $sourcePath = '@vendor/ramosisw/assets';
    public $js = [
        'datatables/dataTables.bootstrap.min.js',
        // more plugin Js here
    ];
    public $css = [
        'datatables/dataTables.bootstrap.css',
        // more plugin CSS here
    ];
    public $depends = [
        'rmrevin\yii\fontawesome\AssetBundle',

        'ramosisw\CImaterial\web\MaterialAsset',
    ];
}
