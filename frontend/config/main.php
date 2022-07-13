<?php
$params = array_merge(
	require __DIR__ . '/../../common/config/params.php',
	require __DIR__ . '/../../common/config/params-local.php',
	require __DIR__ . '/params.php',
	require __DIR__ . '/params-local.php'
);

$rules = require(__DIR__ . '/rules.php');

return [
	'id' => 'app-frontend',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'controllerNamespace' => 'frontend\controllers',
	'timeZone' => 'Asia/Kuala_Lumpur',
	'components' => [
		'request' => [
			'csrfParam' => '_csrf-frontend',
			// 'enableCsrfValidation' => false,
		],
		'user' => [
			'identityClass' => 'frontend\models\User',
			'enableAutoLogin' => false,
			'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
			'authTimeout' => 7200,
			'loginUrl' => ['/member'],
		],
		'session' => [
			// use db session
			'class' => 'yii\web\DbSession',
			// this is the name of the session cookie used for login on the frontend
			'name' => 'advanced-frontend',
	],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['info'],
					'categories' => ['paypal-notify'],
					'logFile' => '@app/runtime/logs/paypal/notify.log',
					'maxFileSize' => 1024 * 2,
					'maxLogFiles' => 50,
				],
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['info'],
					'categories' => ['kiple-notify'],
					'logFile' => '@app/runtime/logs/kiple/notify.log',
					'maxFileSize' => 1024 * 2,
					'maxLogFiles' => 50,
				],
			],
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
			'enableStrictParsing' => true,
			'rules' => $rules
		],
		'db' => [
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=fengshui.c9cvydu3ijcj.ap-southeast-1.rds.amazonaws.com;dbname=fsr_student',
			'username' => 'fsr_student',
			'password' => '(f&rkn6Yw@k-',
			'charset' => 'utf8',
		],
	],
	'language' => 'zh-CN',
	'as defaultLanguage' => 'common\components\DefaultLanguage',
	'params' => $params,
];


