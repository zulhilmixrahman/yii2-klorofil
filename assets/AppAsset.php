<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'web/css/vendor/icon-sets.css',
        'web/css/main.min.css',
        'web/css/demo.css'
    ];
    public $js = [
        'web/js/plugins/jquery-slimscroll/jquery.slimscroll.min.js',
        'web/js/plugins/jquery-easypiechart/jquery.easypiechart.min.js',
        'web/js/plugins/chartist/chartist.min.js',
        'web/js/klorofil.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
