<?php

namespace app\assets;

use yii\web\AssetBundle;

class BulmaAsset extends AssetBundle
{
    public $sourcePath = '@bower/bulma';
    public $js = [

        // more plugin Js here
    ];
    public $css = [
        'css/bulma.css',
        // more plugin CSS here
    ];
    public $depends = [
        'rmrevin\yii\fontawesome\AssetBundle',

 //       'ramosisw\CImaterial\web\MaterialAsset',
    ];
}
