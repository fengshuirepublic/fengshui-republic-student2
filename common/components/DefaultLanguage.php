<?php 

namespace common\components;

use Yii;
use yii\base\Application;
use yii\base\Behavior;

class DefaultLanguage extends Behavior
{
	public function attach($owner)
	{
		Yii::$app->on(Application::EVENT_BEFORE_ACTION, function ($event) {
			$app = Yii::$app;
			if ($app instanceof \yii\web\Application) {
				$session = $app->session;
				// Yii::$app->language = $session->get("lang", $app->sourceLanguage);
				Yii::$app->language = $session->get("lang", $app->language);
			}
		});
	}
}
