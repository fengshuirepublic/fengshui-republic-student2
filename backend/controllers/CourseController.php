<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use yii\bootstrap\ActiveForm;

use backend\models\Services;
use backend\models\FormSearchCourse;

class CourseController extends Controller
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

	public function actionList()
	{
		$courseForm       = new Services();
		$courseForm->year = date('Y');

		$listCategory = array(
			'course-bz' => 'Course - Bazi',
			'course-qm' => 'Course - Qi Men',
			'course-mx' => 'Course - Mian Xiang',
			'course-yj' => 'Course - Yi Jing',
			'course-fs' => 'Course - Fengshui',
			'course-yyd' => 'Course - Yi Yan Duan',
		);

		if ($courseForm->load(Yii::$app->request->post())) {
			$post = Yii::$app->request->post('Services');

			if (isset($post['service_id'])) {
				$result = Services::find()
					->where([
						'and',
						['service_id' => $post['service_id']],
						['=', 'category', 'course'],
						['<>', 'status', 0],
					])
					->one();

				if ($result) {
					$result->load($post, "");
					$result->type_en     = trim($post['type_en']);
					$result->type_cn     = trim($post['type_cn']);
					$result->price_refer = trim($post['price_refer']);
					$result->year        = trim($post['year']);
					$result->update_date = date("Y-m-d H:i:s");
					$result->update_by   = Yii::$app->user->identity->user_id;

					if ($result->update() !== false) {
						Yii::$app->session->setFlash('success', "Success update course.");
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					} else {
						Yii::$app->session->setFlash('fail', "Error. Fail to update course.");
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					}
				}
			} else {
				$new_service = new Services();
				$new_service->load($post, "");
				$new_service->category      = 'course';
				$new_service->category_code = 'L';
				$new_service->type_en       = trim($post['type_en']);
				$new_service->type_cn       = trim($post['type_cn']);
				$new_service->price_refer   = trim($post['price_refer']);
				$new_service->year          = trim($post['year']);
				$new_service->create_date   = date("Y-m-d H:i:s");
				$new_service->create_by     = Yii::$app->user->identity->user_id;

				if ($new_service->validate() && $new_service->save()) {
					Yii::$app->session->setFlash('success', "Success add course.");
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				} else {
					Yii::$app->session->setFlash('fail', "Error. Fail to add course.");
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				}
			}
		}

		$model = new FormSearchCourse();
		$model->load(Yii::$app->request->get());

		return $this->render('pg_course_list', [
			'model'        => $model,
			'courses'      => $model->search(),
			'courseForm'   => $courseForm,
			'listCategory' => $listCategory,
		]);
	}

	public function actionDetail($id)
	{
		$course = Services::find()
			->where([
				'and',
				['service_id' => $id],
				['=', 'category', 'course'],
				['<>', 'status', 0],
			])
			->asArray()
			->one();

		if ($course) {
			$result['error'] = 0;
			$result['course']  = $course;
		} else {
			$result['error'] = 1;
		}
		return json_encode($result);
	}

	public function actionDelete($id)
	{
		if (Services::updateAll([
			'status'      => 0,
			'update_date' => date("Y-m-d H:i:s"),
			'update_by'   => Yii::$app->user->identity->user_id,
		], "service_id = '$id'") !== false) {
			Yii::$app->session->setFlash('success', "Success delete service.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		} else {
			Yii::$app->session->setFlash('fail', "Error. Fail to delete service.");
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}
	}
}


