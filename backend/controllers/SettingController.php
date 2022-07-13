<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\data\ActiveDataProvider;
use backend\models\SettingSlider;
use backend\models\SettingShortcut;
use backend\models\FormAddSlide;
use backend\models\FormAddShortcut;

class SettingController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
				],
			],
		];
	}

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	public function actionSlider()
	{
		$slides = SettingSlider::find()
			->where(['status' => 1])
			->orderBy(['sequence' => SORT_ASC])
			->all();
		$total = count($slides);

		$addSlide = new FormAddSlide();
		if ($addSlide->load(Yii::$app->request->post())) {
			$count = SettingSlider::find()->where(['status' => 1])->count();

			if($count >= 8) {
				Yii::$app->session->setFlash('fail', "Error. Maximun number of slide is 8.");
				return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			}

			do {
				$file = '';
				$keyspace = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$max = mb_strlen($keyspace, '8bit') - 1;
				for ($i = 0; $i < 5; ++$i) {
					$file .= $keyspace[random_int(0, $max)];
				}
				$find_repeat = SettingSlider::findOne(['file' => $file]);
			} while ($find_repeat);

			$post = Yii::$app->request->post('FormAddSlide');

			$new_slide = new FormAddSlide();

			$imgDesktop = UploadedFile::getInstance($new_slide, 'imgDesktop');
			$imgMobile  = UploadedFile::getInstance($new_slide, 'imgMobile');

			$new_slide->load($post, "");
			$new_slide->sequence    = $count+1;
			$new_slide->file        = $file;
			$new_slide->create_date = date("Y-m-d H:i:s");
			$new_slide->create_by   = Yii::$app->user->identity->user_id;
			$new_slide->imgDesktop = $imgDesktop;
			$new_slide->imgMobile  = $imgMobile;

			if ($new_slide->validate() && $new_slide->save()) {
				$path = Yii::getAlias('@frontend')."/web/setting/slider";
				FileHelper::createDirectory($path);

				if ($new_slide->uploadDesktopImage($new_slide->file) && $new_slide->uploadMobileImage($new_slide->file)) {
					Yii::$app->session->setFlash('success', "Success add slide.");
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				} else {
					print_r($new_slide->getErrors());exit;
					Yii::$app->session->setFlash('fail', "Error. Fail to add slide.");
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				}
			} else {
				print_r($new_slide->getErrors());exit;
				Yii::$app->session->setFlash('fail', "Error. Fail to add slide.");
				return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			}
		}

		return $this->render('pg_slider', [
			'slides'   => $slides,
			'total'    => $total,
			'addSlide' => $addSlide,
		]);
	}

	public function actionSliderDelete($id)
	{
		if (SettingSlider::updateAll([
			'status'      => 0,
		], "id = '$id'") !== false) {
			Yii::$app->session->setFlash('success', "Success delete slide.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		} else {
			Yii::$app->session->setFlash('fail', "Error. Fail to delete slide.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}
	}

	public function actionSliderOrder()
	{
		Yii::$app->response->format = Response::FORMAT_JSON;
		$items_str = Yii::$app->request->post('items');
		$items_arr = explode("&", $items_str);

		$sequence = 1;
		foreach ($items_arr as $key => $value) {
			// item[]=
			$id = substr($value, 7);
			// $result['error']['data'][] = $sub;
			$slide = SettingSlider::find()->where([
				'id' => $id,
				'status' => 1,
			])->one();
			if ($slide) {
				$slide->sequence = $sequence;
				$slide->update();
				// if ($slide->update() == false) {
				// 	$result['error']['status'] = 1;
				// 	$result['error']['msg']    = $slide->getErrors();
				// 	return $result;
				// }
				$sequence++;
			}
		}
		$result['error']['status'] = 0;
		return $result;
	}

	public function actionShortcut()
	{
		$shortcuts = SettingShortcut::find()
			->where(['status' => 1])
			->orderBy(['sequence' => SORT_ASC])
			->all();
		$total = count($shortcuts);

		$addShortcut = new FormAddShortcut();
		if ($addShortcut->load(Yii::$app->request->post())) {
			$count = SettingShortcut::find()->where(['status' => 1])->count();

			if($count >= 6) {
				Yii::$app->session->setFlash('fail', "Error. Maximun number of shortcut is 6.");
				return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			}

			do {
				$file = '';
				$keyspace = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$max = mb_strlen($keyspace, '8bit') - 1;
				for ($i = 0; $i < 5; ++$i) {
					$file .= $keyspace[random_int(0, $max)];
				}
				$find_repeat = SettingShortcut::findOne(['file' => $file]);
			} while ($find_repeat);

			$post = Yii::$app->request->post('FormAddShortcut');

			$new_shortcut = new FormAddShortcut();

			$img = UploadedFile::getInstance($new_shortcut, 'img');

			$new_shortcut->load($post, "");
			$new_shortcut->sequence    = $count+1;
			$new_shortcut->file        = $file;
			$new_shortcut->create_date = date("Y-m-d H:i:s");
			$new_shortcut->create_by   = Yii::$app->user->identity->user_id;
			$new_shortcut->img         = $img;

			if ($new_shortcut->validate() && $new_shortcut->save()) {
				$path = Yii::getAlias('@frontend')."/web/setting/shortcut";
				FileHelper::createDirectory($path);

				if ($new_shortcut->uploadImage($new_shortcut->file)) {
					Yii::$app->session->setFlash('success', "Success add shortcut.");
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				} else {
					print_r($new_shortcut->getErrors());exit;
					Yii::$app->session->setFlash('fail', "Error. Fail to add shortcut.");
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				}
			} else {
				print_r($new_shortcut->getErrors());exit;
				Yii::$app->session->setFlash('fail', "Error. Fail to add shortcut.");
				return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			}
		}

		return $this->render('pg_shortcut', [
			'shortcuts'   => $shortcuts,
			'total'       => $total,
			'addShortcut' => $addShortcut,
		]);
	}

	public function actionShortcutDelete($id)
	{
		if (SettingShortcut::updateAll([
			'status'      => 0,
		], "id = '$id'") !== false) {
			Yii::$app->session->setFlash('success', "Success delete shortcut.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		} else {
			Yii::$app->session->setFlash('fail', "Error. Fail to delete shortcut.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}
	}

	public function actionShortcutOrder()
	{
		Yii::$app->response->format = Response::FORMAT_JSON;
		$items_str = Yii::$app->request->post('items');
		$items_arr = explode("&", $items_str);

		$sequence = 1;
		foreach ($items_arr as $key => $value) {
			$id = substr($value, 7);
			$shortcut = SettingShortcut::find()->where([
				'id' => $id,
				'status' => 1,
			])->one();
			if ($shortcut) {
				$shortcut->sequence = $sequence;
				$shortcut->update();
				$sequence++;
			}
		}
		$result['error']['status'] = 0;
		return $result;
	}
}


