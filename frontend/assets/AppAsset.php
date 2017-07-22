<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/jquery-ui.min.css',
        'css/site.css',
    ];
    public $js = [
        //'js/jquery-3.1.1.min.js',
        'js/jquery-ui.min.js',
        'js/custom.js',
    ];
    /*public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];*/
    public $depends = [
        'yii\web\JqueryAsset',
        /*'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',*/
    ];
}
