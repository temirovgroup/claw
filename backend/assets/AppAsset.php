<?php

namespace backend\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'http://fonts.googleapis.com/css?family=Open+Sans',

        'lte/css/bootstrap.css',
        'lte/css/font-awesome.css',
        'lte/css/custom-styles.css',
    ];
    public $js = [
        'lte/js/bootstrap.min.js',
        'lte/js/jquery.metisMenu.js',
        'lte/js/jquery.dataTables.js',
        'lte/js/custom-scripts.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        JqueryAsset::class,
    ];
}
