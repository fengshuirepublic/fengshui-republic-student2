<?php

namespace backend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'core/fontawesome-free/css/all.min.css',
        // 'core/datatables/dataTables.bootstrap4.css',
        'css/sb-admin.css',
        'core/bootstrap-datepicker/bootstrap-datepicker.css',
        'css/custom.css?2020-01-01-0000',
    ];
    public $js = [
        // 'core/bootstrap.bundle.min.js',
        'core/jquery.easing.min.js',
        // 'core/chart.js/Chart.min.js',
        // 'core/datatables/jquery.dataTables.js',
        // 'core/datatables/dataTables.bootstrap4.js',
        'js/sb-admin.min.js',
        'core/bootstrap-datepicker/bootstrap-datepicker.min.js',
        'core/lodash/lodash.min.js',
        'core/angularjs/angular-1.6.6.min.js',
        'js/custom.js',
        'js/ng-app.js',
        // 'js/demo/datatables-demo.js',
        // 'js/demo/chart-area-demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapPluginAsset',
    ];
}
