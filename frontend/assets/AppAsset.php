<?php

namespace frontend\assets;

use yii\web\AssetBundle;
use yii\widgets\MaskedInputAsset;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'front/css/plugins/pe-icon-7-stroke.css',
        'front/css/plugins/animate.min.css',
        'front/css/plugins/swiper-bundle.min.css',
        'front/css/style.css',
    ];
    public $js = [
        'front/js/vendor/modernizr-3.11.2.min.js',
        'front/js/plugins/swiper-bundle.min.js',
        'front/js/plugins/jquery.zoom.min.js',
        'front/js/main.js',
        'front/js/jscript.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapPluginAsset',
    ];
}
