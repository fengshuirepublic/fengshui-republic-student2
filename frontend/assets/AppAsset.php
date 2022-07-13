<?php

namespace frontend\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
	public $basePath = '@webroot';
	public $baseUrl = '@web';
	public $css = [
		'core/bootstrap.min.css',
		'core/font-awesome-4.7.0/font-awesome.min.css',
		'css/custom.css?0001',
	];
	public $js = [
		// 'core/jquery.min.js',
		'core/popper.min.js',
		'core/bootstrap.min.js',
	];
	public $depends = [
		'yii\web\YiiAsset',
		// 'yii\bootstrap\BootstrapAsset',
	];
}
