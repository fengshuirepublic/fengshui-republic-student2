<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use backend\models\FormLogin;
use backend\models\FormChangePass;
use backend\models\BoUser;
use backend\models\BoUserInfo;
use backend\models\ContactUs;
use backend\models\Enquiry;
use backend\models\FsSchedules;
use backend\models\User;
use backend\models\FormSearchContactUs;
use backend\models\FormSearchEnquiry;
use backend\models\FormSearchSchedule;
use backend\models\FormSearchUser;
use backend\excel\ContactUsList;
use backend\excel\EnquiryList;
use backend\models\LogToolsNaming;
use backend\models\LogToolsBazi;
use backend\models\LogToolsQimen;

class SiteController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => [
					'index',
					'logout',
					'changepass',
					'contact-us',
					'delete-contact-us',
					'export-contact-us',
					'enquiry',
					'delete-enquiry',
					'export-enquiry',
					'schedule',
					'schedule-detail',
					'delete-schedule',
					'user',
					'user-act-inc',
					'user-bazi',
					'user-naming',
					'user-qimen',
				],
				'rules' => [
					[
						'actions' => [
							'index',
							'logout',
							'changepass',
							'contact-us',
							'delete-contact-us',
							'export-contact-us',
							'enquiry',
							'delete-enquiry',
							'export-enquiry',
							'schedule',
							'schedule-detail',
							'delete-schedule',
							'user',
							'user-act-inc',
							'user-bazi',
							'user-naming',
							'user-qimen',
						],
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'logout' => ['GET'],
				],
			],
		];
	}

	public function beforeAction($action)
	{
		if (parent::beforeAction($action)) {
			if ($action->id == 'error')
				$this->layout = 'master_error';
			return true;
		} else {
			return false;
		}
	}

	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	public function actionIndex()
	{
		// return $this->render('pg_landing');
		// return $this->redirect(['sales/online']);
		return $this->redirect(['sales/product-order']);
	}

	public function actionLogin()
	{
		$this->layout = 'plain';

		if (!Yii::$app->user->isGuest) {
			return $this->redirect(['site/']);
		}

		$model = new FormLogin();
		if ($model->load(Yii::$app->request->post()) && $model->login()) {
			BoUserInfo::updateAll(['last_login' => date("Y-m-d H:i:s")], 'user_id = '.Yii::$app->user->identity->user_id);
			return $this->goBack();
		}

		return $this->render('pg_login', [
			'model' => $model,
		]);
	}

	public function actionLogout()
	{
		Yii::$app->user->logout();

		return $this->goHome();
	}

	public function actionChangepass()
	{
		$model = new FormChangePass();
		$model->user_id = $user_id = Yii::$app->user->identity->user_id;

		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$post = Yii::$app->request->post('FormChangePass');
			$user = BoUser::findOne(['user_id' => $user_id]);
			$user->password = md5('fsgw'.$post['new_password']);
			if ($user->update() !== false) {
				Yii::$app->session->setFlash('success', "Success change password.");
				return $this->redirect(['site/changepass']);
			} else {
				// print_r($user->getErrors());exit;
				Yii::$app->session->setFlash('fail', "Error. Unable to change password.");
				return $this->redirect(['site/changepass']);
			}
		}

		return $this->render('pg_changePass',[
			'model' => $model,
		]);
	}

	public function actionContactUs()
	{
		$model = new FormSearchContactUs();
		$model->load(Yii::$app->request->get());

		return $this->render('pg_contact_us', [
			'model'         => $model,
			'listContactUs' => $model->search(),
		]);
	}

	public function actionDeleteContactUs($id)
	{
		if (ContactUs::updateAll(['status' => 0], [
			'and',
			['id' => $id],
		]) !== false) {
			Yii::$app->session->setFlash('success', "Success delete");
			return $this->redirect(Yii::$app->request->referrer ?: 'site/contact-us');
		} else {
			Yii::$app->session->setFlash('fail', "Error. Fail to delete");
			return $this->redirect(Yii::$app->request->referrer ?: 'site/contact-us');
		}
	}

	public function actionExportContactUs()
	{
		$model = new FormSearchContactUs();
		$model->load(Yii::$app->request->post());
		$contactUs = $model->excel();

		$excel = new ContactUsList();
		$excel->generate($contactUs);
		exit;
	}

	public function actionEnquiry()
	{
		$model = new FormSearchEnquiry();
		$model->load(Yii::$app->request->get());

		return $this->render('pg_enquiry', [
			'model'       => $model,
			'listEnquiry' => $model->search(),
		]);
	}

	public function actionDeleteEnquiry($id)
	{
		if (Enquiry::updateAll(['status' => 0], [
			'and',
			['id' => $id],
		]) !== false) {
			Yii::$app->session->setFlash('success', "Success delete");
			return $this->redirect(Yii::$app->request->referrer ?: 'site/enquiry');
		} else {
			Yii::$app->session->setFlash('fail', "Error. Fail to delete");
			return $this->redirect(Yii::$app->request->referrer ?: 'site/enquiry');
		}
	}

	public function actionExportEnquiry()
	{
		$model = new FormSearchEnquiry();
		$model->load(Yii::$app->request->post());
		$enquiryList = $model->excel();

		$excel = new EnquiryList();
		$excel->generate($enquiryList);
		exit;
	}

	public function actionSchedule()
	{
		$fsSchedules = new FsSchedules();
		if ($fsSchedules->load(Yii::$app->request->post())) {
			$post = Yii::$app->request->post('FsSchedules');

			if (isset($post['id'])) {
				$query = FsSchedules::find();
				$query->where([
					'and',
					['id' => $post['id']],
					['<>', 'status', 0],
				]);
				$schedule = $query->one();

				if ($schedule) {
					$schedule->load($post, "");
					if ($schedule->update() !== false) {
						Yii::$app->session->setFlash('success', "Success update schedule.");
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					} else {
						Yii::$app->session->setFlash('fail', "Error. Fail to update schedule.");
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					}
				} else {
					Yii::$app->session->setFlash('fail', "Error. Schedule not found.");
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				}
			} else {
				$add_schedule = new FsSchedules();
				$add_schedule->load($post, "");
				$add_schedule->create_date = date("Y-m-d H:i:s");
				if ($add_schedule->validate() && $add_schedule->save()) {
					Yii::$app->session->setFlash('success', "Success add schedule.");
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				} else {
					print_r($add_schedule->getErrors());exit;
					Yii::$app->session->setFlash('fail', "Error. Fail to add schedule.");
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				}
			}
		}

		$model = new FormSearchSchedule();
		$model->load(Yii::$app->request->get());

		// $schedules = new ActiveDataProvider([
		// 	'query' => FsSchedules::find()
		// 		->where([
		// 			'and',
		// 			['<>','status', 0],
		// 		]),
		// 	'pagination' => false,
		// 	'sort' => [
		// 		'defaultOrder' => [
		// 			'type' => SORT_ASC,
		// 		],
		// 		'attributes' => [
		// 			'type',
		// 			'name_en',
		// 			'name_cn',
		// 			'date',
		// 			'location',
		// 		],
		// 	],
		// ]);

		return $this->render('pg_schedule', [
			'model'       => $model,
			'schedules'   => $model->search(),
			'fsSchedules' => $fsSchedules,
		]);
	}

	public function actionScheduleDetail($id)
	{
		$schedule = FsSchedules::find()
			->where([
				'and',
				['id' => $id],
				['<>', 'status', 0],
			])
			->asArray()
			->one();

		if ($schedule) {
			$result['error'] = 0;
			$result['schedule']  = $schedule;
		} else {
			$result['error'] = 1;
		}
		return json_encode($result);
	}

	public function actionDeleteSchedule($id)
	{
		if (FsSchedules::updateAll(['status' => 0], [
			'and',
			['id' => $id],
			['<>', 'status', 0],
		]) !== false) {
			Yii::$app->session->setFlash('success', "Success delete course.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		} else {
			Yii::$app->session->setFlash('fail', "Error. Fail to delete course.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}
	}

	public function actionUser()
	{
		$model = new FormSearchUser();
		$model->load(Yii::$app->request->get());

		return $this->render('pg_user', [
			'model' => $model,
			'users' => $model->search(),
		]);
	}

	public function actionUserActInc($id, $status)
	{
		$change = array(
			1 => 2,
			2 => 1,
		);

		$user = User::find()
			->where([
				'and',
				['user_id' => $id],
				['<>', 'status', 0],
			])
			->one();

		if ($user) {
			$user->status = $change[$status];
			if ($user->update() !== false) {
				Yii::$app->session->setFlash('success', "Success update user.");
				return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			}
		} else {
			Yii::$app->session->setFlash('fail', "Error. Fail to update user.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}

		if (User::updateAll(['status' => 0], [
			'and',
			['id' => $id],
			['<>', 'status', 0],
		]) !== false) {
			Yii::$app->session->setFlash('success', "Success delete course.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		} else {
			Yii::$app->session->setFlash('fail', "Error. Fail to delete course.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}
		print_r('aaa');exit;
	}

	public function actionUserBazi($id)
	{
		$user  = User::findOne(['user_id' => $id]);
		$bazis = new ActiveDataProvider([
			'query' => LogToolsBazi::find()
				->where([
					'user_id' => $id,
				]),
			'sort' => [
				'defaultOrder' => [
					'create_date' => SORT_DESC,
				],
				'attributes' => [
					'cname',
					'ename',
					'gender',
					'calendar',
					'create_date',
				],
			],
		]);

		return $this->render('pg_user_bazi', [
			'user'  => $user,
			'bazis' => $bazis,
		]);
	}

	public function actionUserNaming($id)
	{
		$user  = User::findOne(['user_id' => $id]);
		$names = new ActiveDataProvider([
			'query' => LogToolsNaming::find()
				->where([
					'user_id' => $id,
				]),
			'sort' => [
				'defaultOrder' => [
					'create_date' => SORT_DESC,
				],
				'attributes' => [
					'name',
					'create_date',
				],
			],
		]);

		return $this->render('pg_user_naming', [
			'user'  => $user,
			'names' => $names,
		]);
	}

	public function actionUserQimen($id)
	{
		$user  = User::findOne(['user_id' => $id]);
		$qimens = new ActiveDataProvider([
			'query' => LogToolsQimen::find()
				->where([
					'user_id' => $id,
				]),
			'sort' => [
				'defaultOrder' => [
					'create_date' => SORT_DESC,
				],
				'attributes' => [
					'type',
					'calendar',
					'create_date',
				],
			],
		]);

		return $this->render('pg_user_qimen', [
			'user'   => $user,
			'qimens' => $qimens,
		]);
	}
}


