<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\bootstrap\ActiveForm;
use backend\models\FormStaffInfo;
use backend\models\BoUser;
use backend\models\BoUserInfo;

class StaffController extends Controller
{
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' => true,
						'roles' => ['level_3'],
					],
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
			'captcha' => [
				'class' => 'yii\captcha\CaptchaAction',
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	public function actionList()
	{
		$resetPass = new BoUser();
		if ($resetPass->load(Yii::$app->request->post())) {
			$post = Yii::$app->request->post('BoUser');

			$query = BoUser::find();
			$query->where([
				'and',
				['user_id' => $post['user_id']],
				['<>', 'bo_user.status', 0],
				['<>', 'bo_user.role', 'level_1'],
				['<>', 'bo_user.role', 'level_2'],
			]);

			$user = $query->one();

			if ($user) {
				$user->password = md5('fsgw'.$post['password']);

				if ($user->update() !== false) {
					Yii::$app->session->setFlash('success', "Success reset password.");
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				} else {
					Yii::$app->session->setFlash('fail', "Error. Fail to reset password.");
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				}
			} else {
				Yii::$app->session->setFlash('fail', "Error.");
				return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			}
		}

		$userInfoForm = new FormStaffInfo();
		if (Yii::$app->request->isAjax && $userInfoForm->load(Yii::$app->request->post())) {
			Yii::$app->response->format = Response::FORMAT_JSON;
			return ActiveForm::validate($userInfoForm);
		}
		if ($userInfoForm->load(Yii::$app->request->post())) {
			$post = Yii::$app->request->post('FormStaffInfo');

			if (isset($post['user_id'])) {
				$query = BoUser::find();
				$query->where([
					'and',
					['user_id' => $post['user_id']],
					['<>', 'bo_user.status', 0],
					['<>', 'bo_user.role', 'level_1'],
					['<>', 'bo_user.role', 'level_2'],
				]);
				// if (Yii::$app->user->identity->role == 'level_4') {
				// 	$query->andWhere([
				// 		'bo_user.role' => 'level_6'
				// 	]);
				// }
				// if (Yii::$app->user->identity->role == 'level_2') {
				// 	$query->andWhere([
				// 		'or',
				// 		['=', 'bo_user.role', 'level_4'],
				// 		['=', 'bo_user.role', 'level_6'],
				// 	]);
				// }
				$user = $query->one();

				$info = BoUserInfo::find()->where(['user_id' => $post['user_id']])->one();

				if ($user && $info) {
					$user->status       = $post['status'];
					$user->role         = $post['role_name'];
					$user->role_name    = $post['role_name'];
					$info->chinese_name = $post['chinese_name'];
					$info->english_name = strtoupper($post['english_name']);
					$info->gender       = $post['gender'];
					$info->ic           = $post['ic'];
					$info->position     = $post['position'];
					$info->branch       = $post['branch'];
					$info->join_date    = $post['join_date'];
					$info->resign_date  = $post['resign_date'] ? $post['resign_date'] : '0000-00-00';
					$info->update_date  = date("Y-m-d H:i:s");
					$info->update_by    = Yii::$app->user->identity->user_id;

					if ($user->update() !== false && $info->update() !== false) {
						$authManager = Yii::$app->authManager;
						$roleName    = $post['role_name'];
						$role        = $authManager->getRole($roleName);
						$authManager->revokeAll($user->user_id);
						$authManager->assign($role, $user->user_id);

						Yii::$app->session->setFlash('success', "Success update user.");
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					} else {
						Yii::$app->session->setFlash('fail', "Error. Fail to update user.");
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					}
				}
			} else {
				// if ($userInfoForm->validate()) {
				// } else {
				// 	print_r($userInfoForm->getErrors());exit;
				// }

				$exists = BoUser::find()->where(['username' => $post['username']])->exists();
				if ($exists) {
					Yii::$app->session->setFlash('fail', "Error. Username exist.");
					return $this->redirect(['staff/list']);
				} else {
					$user = new BoUser();
					$user->role        = $post['role_name'];
					$user->role_name   = $post['role_name'];
					$user->username    = strtolower($post['username']);
					$user->password    = md5('fsgw138999');
					$user->create_date = date("Y-m-d H:i:s");
					$user->create_by   = Yii::$app->user->identity->user_id;

					if ($userInfoForm->validate()) {
						if ($user->save()) {
							$authManager = Yii::$app->authManager;
							$roleName    = $post['role_name'];
							$role        = $authManager->getRole($roleName);
							$authManager->revokeAll($user->user_id);
							$authManager->assign($role, $user->user_id);

							$userInfo = new BoUserInfo();
							$userInfo->user_id      = $user->user_id;
							$userInfo->chinese_name = $post['chinese_name'];
							$userInfo->english_name = strtoupper($post['english_name']);
							$userInfo->gender       = $post['gender'];
							$userInfo->ic           = $post['ic'];
							$userInfo->position     = $post['position'];
							$userInfo->branch       = $post['branch'];
							$userInfo->join_date    = $post['join_date'];
							$userInfo->resign_date  = $post['resign_date'] ? $post['resign_date'] : '0000-00-00';
							if ($userInfo->save()) {
								Yii::$app->session->setFlash('success', "Success add user.");
								return $this->redirect(['staff/list']);
							} else {
								// print_r($userInfo->getErrors());exit;
								Yii::$app->session->setFlash('fail', "Error. Fail to add user.");
								return $this->redirect(['staff/list']);
							}
						}
					}
				}
			}
		}

		$query = BoUser::find();
		$query->leftJoin('bo_user_info info', 'info.user_id = bo_user.user_id');
		$query->where([
			'and',
			['<>', 'bo_user.status', 0],
			['<>', 'bo_user.role', 'level_1'],
			['<>', 'bo_user.role', 'level_2'],
		]);

		// if (Yii::$app->user->identity->role == 'level_4') {
		// 	$query->andWhere([
		// 		'bo_user.role' => 'level_6'
		// 	]);
		// }

		// if (Yii::$app->user->identity->role == 'level_2') {
		// 	$query->andWhere([
		// 		'or',
		// 		['=', 'bo_user.role', 'level_4'],
		// 		['=', 'bo_user.role', 'level_6'],
		// 	]);
		// }

		$users = new ActiveDataProvider([
			'query' => $query,
			'pagination' => false,
			'sort' => [
				'defaultOrder' => [
					'user_id' => SORT_DESC,
				],
				'attributes' => [
					'user_id',
					'username',
					'status',
					'info.last_login',
					'info.position',
					// 'role_name',
					// 'info.chinese_name',
					// 'info.english_name',
					// 'info.join_date',
					// 'info.resign_date',
				],
			],
		]);

		return $this->render('pg_staff_list',[
			'userInfoForm' => $userInfoForm,
			'resetPass'    => $resetPass,
			'users'        => $users,
		]);
	}

	public function actionDetail($id)
	{
		$query = BoUser::find();
		$query->with('info');
		$query->where([
			'and',
			['user_id' => $id],
			['<>', 'bo_user.status', 0],
			['<>', 'bo_user.role', 'level_1'],
		]);
		if (Yii::$app->user->identity->role == 'level_4') {
			$query->andWhere([
				'bo_user.role' => 'level_6'
			]);
		}
		if (Yii::$app->user->identity->role == 'level_2') {
			$query->andWhere([
				'or',
				['=', 'bo_user.role', 'level_4'],
				['=', 'bo_user.role', 'level_6'],
			]);
		}
		$user = $query->asArray()->one();

		if ($user) {
			$result['error'] = 0;
			$result['user']  = $user;
		} else {
			$result['error'] = 1;
		}
		return json_encode($result);
	}

	public function actionDelete($id)
	{
		$query = BoUser::find();
		$query->where([
			'and',
			['user_id' => $id],
			['<>', 'bo_user.status', 0],
			['<>', 'bo_user.role', 'level_1'],
		]);
		if (Yii::$app->user->identity->role == 'level_4') {
			$query->andWhere([
				'bo_user.role' => 'level_6'
			]);
		}
		if (Yii::$app->user->identity->role == 'level_2') {
			$query->andWhere([
				'or',
				['=', 'bo_user.role', 'level_4'],
				['=', 'bo_user.role', 'level_6'],
			]);
		}
		$user = $query->one();

		$user->status = 0;
		if ($user->update() !== false) {
			Yii::$app->session->setFlash('success', "Success delete user.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		} else {
			Yii::$app->session->setFlash('fail', "Error. Fail to delete user.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}
	}
}


