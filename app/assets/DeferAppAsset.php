<?php

namespace app\assets;

use yii\web\AssetBundle;

class DeferAppAsset  extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@frontend';
    
    public $js = [
        'fonts/fontawesome-all.js',
    ];
    
    public $jsOptions = [
        'defer' => '',
        'position' => \yii\web\View::POS_END,
    ];
}