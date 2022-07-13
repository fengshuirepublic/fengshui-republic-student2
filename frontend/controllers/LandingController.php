<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\FsBazi;
use frontend\models\AccessYijing;
use frontend\models\AccessPd;
use frontend\models\FsPersonalDirection;
use frontend\pdf\PersonalDirection;
use frontend\pdf\YijingForecast;

class LandingController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow'   => true,
						// 'roles'   => ['?'],
					]
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [],
			],
		];
	}

	public function actionPersonalDirection()
	{
		$this->layout = 'plain';

		$personaldirection = AccessPd::find()
			->select('is_visible, access')
			->asArray()
			->one();
		if ($personaldirection['is_visible'] == 0) {
			return $this->redirect('http://gerenjifang.fengshui-republic.com/access');
		}

		$session = Yii::$app->session;
		if ($session->has('pd_access_code')) {
			if ($personaldirection['access'] != $session->get('pd_access_code')) {
				// return $this->redirect(['landing/pd-access/']);
				return $this->redirect('http://gerenjifang.fengshui-republic.com/access');
			}
		} else {
			// return $this->redirect(['landing/pd-access/']);
			return $this->redirect('http://gerenjifang.fengshui-republic.com/access');
		}

		$post = Yii::$app->request->post();
		if (isset($post['pd'])) {
			// male = 1, female = 0
			// calendar en = 1, calendar cn = 0
			$gender = array('1' => '男', '0' => '女');
			$pd = $post['pd'];
			// print_r($pd);exit;
			$minute = 0;
			if ($pd['calendar'] == 1) {
				$minute = $pd['en']['minute'];
				$bazi = FsBazi::find()->where([
					'e_y' => $pd['en']['year'],
					'e_m' => $pd['en']['month'],
					'e_d' => $pd['en']['day'],
					'e_h' => $pd['en']['hour'],
				])->one();
			}
			if ($pd['calendar'] == 0) {
				if (isset($pd['cn']['s_month'])) {
					$leap_month = array(
						'正月' => '閏正',
						'二月' => '閏二',
						'三月' => '閏三',
						'四月' => '閏四',
						'五月' => '閏五',
						'六月' => '閏六',
						'七月' => '閏七',
						'八月' => '閏八',
						'九月' => '閏九',
						'十月' => '閏十',
						'十一' => '閏十一',
						'十二' => '閏十二',
					);
					$c_m = $leap_month[$pd['cn']['month']];
				} else {
					$c_m = $pd['cn']['month'];
				}
				$bazi = FsBazi::find()->where([
					'c_y' => $pd['cn']['year'],
					'c_m' => $c_m,
					'c_d' => $pd['cn']['day'],
					'e_h' => $pd['cn']['hour'],
				])->one();
			}
			if ($bazi) {

				$gua_datetime = $bazi->e_y.'-'.sprintf('%02d',$bazi->e_m).'-'.sprintf('%02d',$bazi->e_d).' '.sprintf('%02d',$bazi->e_h).':'.sprintf('%02d',$minute).':00';
				$gua_data = FsPersonalDirection::find()
					->where([
						'and',
						['<=', 'gua_datetime', $gua_datetime],
					])
					->orderBy(['id' => SORT_DESC])
					->one();

				if ($pd['gender'] == 1) {
					$pd_gua = $gua_data->male;
				} else {
					$pd_gua = $gua_data->female;
				}

				$pdf = new PersonalDirection();
				$pdf->generate($bazi, $gender[$pd['gender']], $minute, $pd_gua);
				$pdf->Output("Personal_Direction_Report.pdf", "I");
				exit;
			}
		}

		return $this->render('personal-direction/pg_index');
	}

	public function actionPdAccess()
	{
		$this->layout = 'plain';

		$personaldirection = AccessPd::find()
			->select('is_visible, access')
			->asArray()
			->one();

		$session = Yii::$app->session;
		if ($session->has('pd_access_code')) {
			if ($personaldirection['is_visible'] == 0) {
				Yii::$app->session->setFlash('alert', Yii::t('app', 'Follow us on facebook for Personal Direction accessible period'));
			} else {
				if ($personaldirection['access'] == $session->get('pd_access_code')) {
					// return $this->redirect(['landing/personal-direction/']);
					return $this->redirect('http://gerenjifang.fengshui-republic.com');
				}
			}
		}

		$post = Yii::$app->request->post();
		if (isset($post['Pd'])) {
			$access = $post['Pd']['access'];
			if ($access) {
				$result = AccessPd::find()->where(['access' => md5($access)])->one();
				if ($result) {
					$session = Yii::$app->session;
					$session->set('pd_access_code', md5($access));
					// return $this->redirect(['landing/personal-direction/']);
					return $this->redirect('http://gerenjifang.fengshui-republic.com');
				} else {
					Yii::$app->session->setFlash('alert', Yii::t('app', 'Access Code Error'));
					// return $this->redirect(['landing/personal-direction/']);
					return $this->redirect('http://gerenjifang.fengshui-republic.com/access');
				}
			} else {
				Yii::$app->session->setFlash('alert', Yii::t('app', 'Access Code Empty'));
				// return $this->redirect(['landing/personal-direction/']);
				return $this->redirect('http://gerenjifang.fengshui-republic.com/access');
			}
		}

		return $this->render('personal-direction/pg_pd_access');
	}

	public function actionPdreset()
	{
		$this->layout = 'plain';

		$post = Yii::$app->request->post();
		if (isset($post['Pd'])) {
			$username   = $post['Pd']['username'];
			$password   = $post['Pd']['password'];
			$is_visible = $post['Pd']['is_visible'];
			$access     = $post['Pd']['access'];
			if ($username && $password && $access) {
				$result = AccessPd::find()
					->where([
						'username' => $username,
						'password' => md5($password),
					])
					->one();
				if ($result) {
					$result->is_visible = $is_visible;
					$result->access     = md5($access);
					$result->update_at  = date("Y-m-d H:i:s");
					if ($result->update() !== false) {
						Yii::$app->session->setFlash('alert', 'Success.');
						// return $this->redirect(['landing/pdreset/']);
						return $this->redirect('http://jifangreset.fengshui-republic.com');
					} else {
						Yii::$app->session->setFlash('alert', 'Error.');
						// return $this->redirect(['landing/pdreset/']);
						return $this->redirect('http://jifangreset.fengshui-republic.com');
					}
				} else {
					Yii::$app->session->setFlash('alert', 'Error.');
					// return $this->redirect(['landing/pdreset/']);
					return $this->redirect('http://jifangreset.fengshui-republic.com');
				}
			} else {
				Yii::$app->session->setFlash('alert', 'Error.');
				// return $this->redirect(['landing/pdreset/']);
				return $this->redirect('http://jifangreset.fengshui-republic.com');
			}
		}
		$is_visible = AccessPd::find()
			->select('is_visible')
			->asArray()
			->one();
		return $this->render('personal-direction/pg_pd_reset',[
			'is_visible' => $is_visible['is_visible'],
		]);
	}

	public function actionYijingForecast()
	{
		$this->layout = 'plain';

		$yijingforecast = AccessYijing::find()
			->select('is_visible, access')
			->asArray()
			->one();
		if ($yijingforecast['is_visible'] == 0) {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Follow us on facebook for Yijing accessible period'));
			// return $this->redirect(Yii::$app->homeUrl);
			// $url='http://google.com?'.http_build_query(['param' => 12]);

			// return $this->redirect(['landing/yijing-access/']);
			return $this->redirect('http://yijingforecast.fengshui-republic.com/access');
		}

		$session = Yii::$app->session;
		if ($session->has('yijing_access_code')) {
			if ($yijingforecast['access'] != $session->get('yijing_access_code')) {
				// return $this->redirect(['landing/yijing-access/']);
				return $this->redirect('http://yijingforecast.fengshui-republic.com/access');
			}
		} else {
			// return $this->redirect(['landing/yijing-access/']);
			return $this->redirect('http://yijingforecast.fengshui-republic.com/access');
		}

		// 虛線 = 1 陰
		// 實線 = 2 陽
		// from bottom to top 0 to 5
		// 乾,兌,離,震,巽,坎,艮,坤

		$post = Yii::$app->request->post();
		if (isset($post['Yijing'])) {
			if (isset($post['Yijing']['1'])) {
				$method = 1;
				$year   = $post['Yijing']['1']['year'];
				$month  = $post['Yijing']['1']['month'];
				$day    = $post['Yijing']['1']['day'];
				$hour   = $post['Yijing']['1']['hour'];
				$minute = $post['Yijing']['1']['minute'];

				$hour_arr   = str_split($hour);
				$minute_arr = str_split($minute);

				$gua_up_total   = 0;
				$gua_down_total = 0;

				foreach ($hour_arr as $key => $value) {
					if ($value == 0) {
						$gua_up_total += 8;
					} else {
						$gua_up_total += $value;
					}
				}
				$gua_up = $gua_up_total%8;
				if ($gua_up == 0) {
					$gua_up = 8;
				}

				foreach ($minute_arr as $key => $value) {
					if ($value == 0) {
						$gua_down_total += 8;
					} else {
						$gua_down_total += $value;
					}
				}
				$gua_down = $gua_down_total%8;
				if ($gua_down == 0) {
					$gua_down = 8;
				}

				// $gua_up = 2;
				// $gua_down = 7;

				$yao_number = ($gua_up_total + $gua_down_total)%6;
				if ($yao_number == 0) {
					$yao_number = 6;
				}

				// print_r($year."-".$month."-".$day.",".$hour.":".$minute."<br>");
				// print_r("本卦上：".$gua_up."，本卦下：".$gua_down."，動爻：".$yao_number."<br><br>");

				$dt = FsBazi::find()->where([
					'e_y' => $year,
					'e_m' => $month,
					'e_d' => $day,
					'e_h' => $hour,
				])->one();
				// print_r($date);exit;

				$pdf = new YijingForecast();
				$pdf->generate($gua_up, $gua_down, $yao_number, $method, $dt, $minute ,$phone=0);
				$pdf->Output("Yi_Jing_Forecast.pdf", "I");
				exit;
			} elseif (isset($post['Yijing']['2'])) {
				$method   = 2;
				$number_1 = $post['Yijing']['2']['number_1'];
				$number_2 = $post['Yijing']['2']['number_2'];
				$phone    = $number_1." 和 ".$number_2;

				$number_1_arr = str_split(ltrim($number_1, '0'));
				$number_2_arr = str_split(ltrim($number_2, '0'));

				$gua_up_total   = 0;
				$gua_down_total = 0;

				foreach ($number_1_arr as $key => $value) {
					if ($value == 0) {
						$gua_up_total += 8;
					} else {
						$gua_up_total += $value;
					}
				}
				$gua_up = $gua_up_total%8;
				if ($gua_up == 0) {
					$gua_up = 8;
				}

				foreach ($number_2_arr as $key => $value) {
					if ($value == 0) {
						$gua_down_total += 8;
					} else {
						$gua_down_total += $value;
					}
				}
				$gua_down = $gua_down_total%8;
				if ($gua_down == 0) {
					$gua_down = 8;
				}

				$yao_number = ($gua_up_total + $gua_down_total)%6;
				if ($yao_number == 0) {
					$yao_number = 6;
				}

				$dt = FsBazi::find()->where([
					'e_y' => date('Y'),
					'e_m' => date('n'),
					'e_d' => date('j'),
					'e_h' => date('G'),
				])->one();
				$minute = date('i');

				$pdf = new YijingForecast();
				$pdf->generate($gua_up, $gua_down, $yao_number, $method, $dt, $minute ,$phone);
				$pdf->Output("Yi_Jing_Forecast.pdf", "I");
				exit;
			} elseif (isset($post['Yijing']['3'])) {
				$method     = 3;
				$gua_up     = $post['Yijing']['3']['gua_up'];
				$gua_down   = $post['Yijing']['3']['gua_down'];
				$yao_number = $post['Yijing']['3']['yao_number'];

				$dt = FsBazi::find()->where([
					'e_y' => date('Y'),
					'e_m' => date('n'),
					'e_d' => date('j'),
					'e_h' => date('G'),
				])->one();
				$minute = date('i');

				$pdf = new YijingForecast();
				$pdf->generate($gua_up, $gua_down, $yao_number, $method, $dt, $minute ,$phone=0);
				$pdf->Output("Yi_Jing_Forecast.pdf", "I");
				exit;
			} elseif (isset($post['Yijing']['4'])) {
				$method = 4;
				$phone  = $post['Yijing']['4']['phone'];

				$number = str_split($phone);
				$count  = count($number);
				if ($count > 14) {
					throw new \Exception('Error.', 1);
				}

				$gua_up_total   = 0;
				$gua_down_total = 0;

				$mid = floor($count/2);
				for ($i=0; $i<$mid; $i++) {
					if ($number[$i] == 0) {
						$gua_up_total += 8;
					} else {
						$gua_up_total += $number[$i];
					}
					// print_r($number[$i]);
				}
				$remainder = $count%2;

				for ($i=$mid; $i<($count); $i++) {
					if ($number[$i] == 0) {
						$gua_down_total += 8;
					} else {
						$gua_down_total += $number[$i];
					}
					// print_r($number[$i]);
				}

				// print_r('<br>');
				// print_r('<br>');
				// print_r($mid);
				// print_r('<br>');
				// print_r($count);
				// print_r('<br>');
				// print_r($phone);
				// print_r('<br>');
				// print_r($remainder);
				// print_r('<br>');
				// print_r($gua_up);
				// print_r('<br>');
				// print_r($gua_down);
				// print_r('<br>');
				// exit;

				$gua_up = $gua_up_total%8;
				if ($gua_up == 0) {
					$gua_up = 8;
				}

				$gua_down = $gua_down_total%8;
				if ($gua_down == 0) {
					$gua_down = 8;
				}

				$yao_number = ($gua_up_total + $gua_down_total)%6;
				if ($yao_number == 0) {
					$yao_number = 6;
				}

				$dt = FsBazi::find()->where([
					'e_y' => date('Y'),
					'e_m' => date('n'),
					'e_d' => date('j'),
					'e_h' => date('G'),
				])->one();
				$minute = date('i');

				$pdf = new YijingForecast();
				$pdf->generate($gua_up, $gua_down, $yao_number, $method, $dt, $minute ,$phone);
				$pdf->Output("Yi_Jing_Forecast.pdf", "I");
				exit;
			} else {
				throw new \Exception('Error.', 1);
			}
		}

		return $this->render('yijing-forecast/pg_index');
	}

	public function actionYijingAccess()
	{
		$this->layout = 'plain';

		$yijingforecast = AccessYijing::find()
			->select('is_visible, access')
			->asArray()
			->one();

		$session = Yii::$app->session;
		if ($session->has('yijing_access_code')) {
			if ($yijingforecast['access'] == $session->get('yijing_access_code')) {
				// return $this->redirect(['landing/yijing-forecast/']);
				return $this->redirect('https://yijingforecast.fengshui-republic.com');
			}
		}

		$post = Yii::$app->request->post();
		if (isset($post['Yijing'])) {
			$access = $post['Yijing']['access'];
			if ($access) {
				$result = AccessYijing::find()->where(['access' => md5($access)])->one();
				if ($result) {
					$session = Yii::$app->session;
					$session->set('yijing_access_code', md5($access));
					// return $this->redirect(['landing/yijing-forecast/']);
					return $this->redirect('https://yijingforecast.fengshui-republic.com');
				} else {
					Yii::$app->session->setFlash('alert', Yii::t('app', 'Access Code Error'));
					// return $this->redirect(['landing/yijing-access/']);
					return $this->redirect('https://yijingforecast.fengshui-republic.com/access');
				}
			} else {
				Yii::$app->session->setFlash('alert', Yii::t('app', 'Access Code Empty'));
				// return $this->redirect(['landing/yijing-access/']);
				return $this->redirect('https://yijingforecast.fengshui-republic.com/access');
			}
		}

		return $this->render('yijing-forecast/pg_yijing_access');
	}

	public function actionYijingreset()
	{
		$this->layout = 'plain';

		$post = Yii::$app->request->post();
		if (isset($post['Yijing'])) {
			$username   = $post['Yijing']['username'];
			$password   = $post['Yijing']['password'];
			// $is_visible = $post['Yijing']['is_visible'];
			$access     = $post['Yijing']['access'];
			if ($username && $password && $access) {
				$result = AccessYijing::find()
					->where([
						'username' => $username,
						'password' => md5($password),
					])
					->one();
				if ($result) {
					// $result->is_visible = $is_visible;
					$result->access     = md5($access);
					$result->update_at  = date("Y-m-d H:i:s");
					if ($result->update() !== false) {
						Yii::$app->session->setFlash('alert', 'Success.');
						// return $this->redirect(['landing/yijingreset/']);
						return $this->redirect('https://yijingreset.fengshui-republic.com');
					} else {
						Yii::$app->session->setFlash('alert', 'Error.');
						// return $this->redirect(['landing/yijingreset/']);
						return $this->redirect('https://yijingreset.fengshui-republic.com');
					}
				} else {
					Yii::$app->session->setFlash('alert', 'Error.');
					// return $this->redirect(['landing/yijingreset/']);
					return $this->redirect('https://yijingreset.fengshui-republic.com');
				}
			} else {
				Yii::$app->session->setFlash('alert', 'Error.');
				// return $this->redirect(['landing/yijingreset/']);
				return $this->redirect('https://yijingreset.fengshui-republic.com');
			}
		}
		// $is_visible = AccessYijing::find()
		// 	->select('is_visible')
		// 	->asArray()
		// 	->one();
		return $this->render('yijing-forecast/pg_yijing_reset',[
			// 'is_visible' => $is_visible['is_visible'],
		]);
	}
}


