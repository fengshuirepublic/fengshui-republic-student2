<?php
$params = array_merge(
	require __DIR__ . '/../../common/config/params.php',
	require __DIR__ . '/../../common/config/params-local.php',
	require __DIR__ . '/params.php',
	require __DIR__ . '/params-local.php'
);

return [
	'id' => 'app-backend',
	'basePath' => dirname(__DIR__),
	'controllerNamespace' => 'backend\controllers',
	'timeZone' => 'Asia/Kuala_Lumpur',
	'bootstrap' => ['log'],
	'layout' => 'master_layout',
	'homeUrl' => ['site/'],
	'modules' => [],
	'components' => [
		'request' => [
			'csrfParam' => '_csrf-backend',
			'cookieValidationKey' => 'CKlv5Cvhd1pYZX99fFvb2iLqD8j1EdXg',
			'parsers' => [
				'application/json' => 'yii\web\JsonParser',
			],
		],
		'authManager' => 'yii\rbac\DbManager',
		'user' => [
			'identityClass' => 'backend\models\BoUser',
			'enableAutoLogin' => false,
			'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
			'authTimeout' => 3600,
			'loginUrl' => ['site/login'],
		],
		'session' => [
			// this is the name of the session cookie used for login on the backend
			'name' => 'advanced-backend',
		],
		'log' => [
			'traceLevel' => YII_DEBUG ? 3 : 0,
			'targets' => [
				[
					'class' => 'yii\log\FileTarget',
					'levels' => ['error', 'warning'],
				],
			],
		],
		'errorHandler' => [
			'errorAction' => 'site/error',
		],
		'urlManager' => [
			'enablePrettyUrl' => true,
			'showScriptName' => false,
		],
		'db' => [
			'class' => 'yii\db\Connection',
			'dsn' => 'mysql:host=fengshui.c9cvydu3ijcj.ap-southeast-1.rds.amazonaws.com;dbname=fsr_student',
			'username' => 'fsr_student',
			'password' => '(f&rkn6Yw@k-',
			'charset' => 'utf8',
		],
	],
	'params' => $params,
];
