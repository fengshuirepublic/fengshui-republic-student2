<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\FsChar;
use frontend\models\FsPersonalDirection;
use frontend\models\AccessQimen;
use frontend\models\AccessBazi;
use frontend\models\AccessBaziReport;
use frontend\models\LogToolsNaming;
use frontend\models\LogToolsBazi;
use frontend\models\LogToolsQimen;
use frontend\models\LogToolsEightMansion;
use frontend\models\LogToolsFlyingStar;

use frontend\fs_tools\naming_analysis\components\KangXi;
use frontend\pdf\NamingSingle;

class ToolsController extends Controller
{
	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			'access' => [
				'class' => AccessControl::className(),
				'only' => [
					'name-analysis',
					'bazi-analysis',
					'qimen',
					// 'qimengeju',
					// 'qimen-access',
					'flying-star',
					'eight-mansion',
					'personal-direction',
				],
				'rules' => [
				// 	[
				// 		'allow' => true,
				// 		'actions' => ['bazi-analysis'],
				// 		'roles' => ['?'],
				// 	],
					[
						'allow' => true,
						'roles' => ['@'],
					],
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'bazi-analysis' => ['post'],
					'name-analysis' => ['post'],
				],
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function actions()
	{
		return [
			'error' => [
				'class' => 'yii\web\ErrorAction',
			],
		];
	}

	public function actionNameAnalysis()
	{
		$cname = Yii::$app->request->post('chinese_name');
		if (mb_strlen($cname,'UTF-8')<2 || mb_strlen($cname,'UTF-8')>4) {
			// throw new \Exception('Error.', 2);
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Please enter 2 to 4 chinese word'));
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}
		if (preg_match("/\w/i", $cname)) {
			// throw new \Exception('Error.', 1);
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Please enter chinese name'));
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}

		if (!isset($cname))
			throw new \Exception("No input found.");

		$log              = new LogToolsNaming();
		$log->user_id     = Yii::$app->user->identity->user_id;
		$log->ip          = Yii::$app->getRequest()->getUserIP();
		$log->name        = $cname;
		$log->create_date = date("Y-m-d H:i:s");
		$log->save();

		$kx = new KangXi;
		$kx->setName($cname)->analyze();
		$result     = $kx->getResult();
		$fullname   = array();
		$na_yin     = array();

		foreach ($result["name_translate"] as $key => $value) {
			$fullname[$key] = $value['character'];
			foreach ($fullname as $key => $value) {
				$fg_char = FsChar::find()
					->select('na_yin_wu_xing')
					->where(['character' => $value, 'status' => 'act'])
					->asArray()
					->one();
				$na_yin[$key] = $fg_char['na_yin_wu_xing'];
			}
		}

		$total = count($fullname);
		$pdf = new NamingSingle();
		$pdf->generate($total, $result, $na_yin);
		$pdf->Output("Name_Analysis_Report.pdf");
	}

	public function actionBaziAnalysis()
	{
		$post = Yii::$app->request->post('bazi');

		$cname = $post['chinese_name'];
		$ename = $post['english_name'];

		if (mb_strlen($cname,'UTF-8')<2 || mb_strlen($cname,'UTF-8')>4) {
			// throw new \Exception('Error.', 2);
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Please enter 2 to 4 chinese word'));
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}
		if (preg_match("/\w/i", $cname)) {
			// throw new \Exception('Error.', 1);
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Please enter chinese name'));
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}
		// if (!preg_match("/^[a-zA-Z]+/", $ename)) {
		// 	// throw new \Exception('Error.', 1);
		// 	Yii::$app->session->setFlash('alert', Yii::t('app', 'Please enter english name'));
		// 	return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		// }

		$sex      = $post['gender'];
		$calendar = $post['calendar'];
		if ($calendar == 0) {
			$year   = $post['cn']['year'];
			$month  = $post['cn']['month'];
			$day    = $post['cn']['day'];
			$hour   = $post['cn']['hour'];
			$minute = 0;
			$smonth = empty($post['cn']['s_month']) ? 0 : 1;
		} else {
			$year   = $post['en']['year'];
			$month  = $post['en']['month'];
			$day    = $post['en']['day'];
			$hour   = $post['en']['hour'];
			$minute = $post['en']['minute'];
			$smonth = 0;
		}

		$log              = new LogToolsBazi();
		$log->user_id     = Yii::$app->user->identity->user_id;
		$log->ip          = Yii::$app->getRequest()->getUserIP();
		$log->cname       = $cname;
		$log->ename       = $ename ? : '-';
		$log->gender      = $sex;
		$log->calendar    = $calendar;
		$log->year        = $year;
		$log->month       = $month;
		$log->day         = $day;
		$log->hour        = $hour;
		$log->minute      = $minute;
		$log->s_month     = $smonth;
		$log->create_date = date("Y-m-d H:i:s");
		$log->save();

		$baseUrl = "http://www.ncc.com.tw/net/fate.php?";
		$uid     = 12;
		$item    = '龍巖風水八字命盤';
		// $item    = '龍巖風水八字命盤.普通版';
		// $item    = '龍巖風水八字命盤.無用神';
		// $item    = '龍巖風水八字命盤.無用神能量';
		$userip  = Yii::$app->request->getUserIP();

		$url = $baseUrl."uid=$uid&lng=utf-8&userip=".$userip."&type=bir&bir=".rawurlencode("$cname").rawurlencode("__$ename,$sex,$calendar,$year,$month,$day,$hour,$minute,$smonth,1")."&tzwork=0&item=".rawurlencode($item);
		$map=file($url);
		// $map='<script type="text/javascript">window.print();</script><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><div style="width:auto;">'.join('',$map).'</div>';
		$map='<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><div style="width:auto;">'.join('',$map).'</div>';
		echo $map;
		exit;
	}

	public function actionQimen()
	{
		$is_visible = AccessQimen::find()
			->select('is_visible')
			->asArray()
			->one();
		if ($is_visible['is_visible'] == 0) {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Follow us on facebook for Qi Men Dun Jia accessible period'));
			return $this->redirect(Yii::$app->homeUrl);
		}

		$post = Yii::$app->request->post();
		if (isset($post['Qimen'])) {
			$s='
			03,龍巖風水奇門盤.年.無格局
			04,龍巖風水奇門盤.月.無格局
			05,龍巖風水奇門盤.日.無格局
			06,龍巖風水奇門盤.時.無格局
			11,龍巖風水奇門盤.命.無格局
			13,龍巖風水奇門盤.道家.無格局
			';

			// $uid=15; // 測試
			$uid=12; // 正式
			$fateurl='www.ncc.com.tw';
			$userip  = Yii::$app->request->getUserIP();

			$items=explode("\n",$s);
			foreach($items as $v){
				if(trim($v)){
					$tmp=explode(',',$v);
					$tmp[0]=trim($tmp[0]);
					$item[$tmp[0]]=trim($tmp[1]);
				}
			}

			$qimen         = $post['Qimen'];
			$qimen_type    = $qimen['type'];
			$calendar_type = $qimen['calendar'];

			// 1=阳历
			// 0=阴历
			if ($calendar_type == '1') {
				$qimen_dt     = implode(",",$qimen['en']);
				$calendar     = 1;
				$leap_month   = 0;
				$qimen_dt_arr = $qimen['en'];
			} else {
				$qimen_dt     = implode(",",$qimen['cn']);
				$calendar     = 0;
				$leap_month   = empty($qimen['s_month']) ? 0 : 1;
				$qimen_type   = $qimen['type'];
				$qimen_dt_arr = $qimen['cn'];
			}

			$log              = new LogToolsQimen();
			$log->user_id     = Yii::$app->user->identity->user_id;
			$log->ip          = Yii::$app->getRequest()->getUserIP();
			$log->calendar    = $calendar_type;
			$log->type        = $qimen_type;
			$log->year        = $qimen_dt_arr['year'];
			$log->month       = $qimen_dt_arr['month'];
			$log->day         = $qimen_dt_arr['day'];
			$log->hour        = $qimen_dt_arr['hour'];
			$log->minute      = $qimen_dt_arr['minute'];
			$log->s_month     = $leap_month;
			$log->create_date = date("Y-m-d H:i:s");
			$log->save();

			// echo "<h4>qimen_type: $qimen_type</h4>";
			// echo "<h4>qimen_dt: $qimen_dt</h4>";
			// echo "<h4>calendar_type: $calendar_type, $calendar</h4>";
			// echo "<h4>leap_month: $leap_month</h4>";exit;

			// $bir = rawurlencode("龍巖風水,1,1,".date('Y,m,d,h,i',time()-(86400+rand(0,8640000))).",0,1");
			$bir = rawurlencode("龍巖風水,1,$calendar,$qimen_dt,$leap_month,1");
			$url="http://$fateurl/net/fate.php?uid=$uid&lng=utf-8&userip=".$userip."&type=bir&bir=$bir&tzwork=0&item=".rawurlencode($item[$qimen_type]);
			// $url="http://$fateurl/net/fate.php?uid=$uid&lng=utf-8&userip=".$_SERVER['REMOTE_ADDR']."&type=bir&bir=".rawurlencode("劉錦昌__Lau Kim Chang,1,1,".date('Y,m,d,h,i',time()-(86400+rand(0,8640000))).",0,1")."&tzwork=0&item=".rawurlencode($item[$x]);
			// print_r($url);exit;

			$map=file($url);
			// echo '<h3>結果</h3><p style="page-break-after:always">&nbsp;</p>';
			// $map='<script type="text/javascript">window.print();</script><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><div style="width:auto;">'.join('',$map).'</div>';
			$map='<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><div style="width:auto;">'.join('',$map).'</div>';
			echo $map;
			exit;
		}
		return $this->render('pg_qimen');
	}

	public function actionQimengeju()
	{
		$qimengeju = AccessQimen::find()
			->select('is_visible, access')
			->asArray()
			->one();
		if ($qimengeju['is_visible'] == 0) {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Follow us on facebook for Qimendunjia accessible period'));
			return $this->redirect(Yii::$app->homeUrl);
		}

		$session = Yii::$app->session;
		if ($session->has('qimen_access_code')) {
			if ($qimengeju['access'] != $session->get('qimen_access_code')) {
				return $this->redirect(['qimen-access/']);
			}
		} else {
			return $this->redirect(['qimen-access/']);
		}

		$post = Yii::$app->request->post();
		if (isset($post['Qimen'])) {
			$s='
			01,龍巖風水八字命盤
			02,龍巖風水八字命盤.奇門
			03,龍巖風水奇門盤.年.無格局
			04,龍巖風水奇門盤.月.無格局
			05,龍巖風水奇門盤.日.無格局
			06,龍巖風水奇門盤.時.無格局
			07,龍巖風水奇門盤.年.有格局
			08,龍巖風水奇門盤.月.有格局
			09,龍巖風水奇門盤.日.有格局
			10,龍巖風水奇門盤.時.有格局
			11,龍巖風水奇門盤.命.無格局
			12,龍巖風水奇門盤.命.有格局
			13,龍巖風水奇門盤.道家.無格局
			14,龍巖風水奇門盤.道家.有格局
			';

			// $uid=15; // 測試
			$uid=12; // 正式
			$fateurl='www.ncc.com.tw';
			$userip  = Yii::$app->request->getUserIP();

			$items=explode("\n",$s);
			foreach($items as $v){
				if(trim($v)){
					$tmp=explode(',',$v);
					$tmp[0]=trim($tmp[0]);
					$item[$tmp[0]]=trim($tmp[1]);
				}
			}

			$qimen         = $post['Qimen'];
			$qimen_type    = $qimen['type'];
			$calendar_type = $qimen['calendar'];

			// 1=阳历
			// 0=阴历
			if ($calendar_type == '1') {
				$qimen_dt   = implode(",",$qimen['en']);
				$calendar   = 1;
				$leap_month = 0;
			} else {
				$qimen_dt   = implode(",",$qimen['cn']);
				$calendar   = 0;
				$leap_month = empty($qimen['s_month']) ? 0 : 1;
				$qimen_type = $qimen['type'];
			}

			// echo "<h4>qimen_type: $qimen_type</h4>";
			// echo "<h4>qimen_dt: $qimen_dt</h4>";
			// echo "<h4>calendar_type: $calendar_type, $calendar</h4>";
			// echo "<h4>leap_month: $leap_month</h4>";exit;

			// $bir = rawurlencode("龍巖風水,1,1,".date('Y,m,d,h,i',time()-(86400+rand(0,8640000))).",0,1");
			$bir = rawurlencode("龍巖風水,1,$calendar,$qimen_dt,$leap_month,1");
			$url="http://$fateurl/net/fate.php?uid=$uid&lng=utf-8&userip=".$userip."&type=bir&bir=$bir&tzwork=0&item=".rawurlencode($item[$qimen_type]);
			// $url="http://$fateurl/net/fate.php?uid=$uid&lng=utf-8&userip=".$_SERVER['REMOTE_ADDR']."&type=bir&bir=".rawurlencode("劉錦昌__Lau Kim Chang,1,1,".date('Y,m,d,h,i',time()-(86400+rand(0,8640000))).",0,1")."&tzwork=0&item=".rawurlencode($item[$x]);
			// print_r($url);exit;

			$map=file($url);
			// echo '<h3>結果</h3><p style="page-break-after:always">&nbsp;</p>';
			// $map='<script type="text/javascript">window.print();</script><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><div style="width:auto;">'.join('',$map).'</div>';
			$map='<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><div style="width:auto;">'.join('',$map).'</div>';
			echo $map;
			exit;
		}
		return $this->render('pg_qimen_geju');
	}

	public function actionQimenAccess()
	{
		$post = Yii::$app->request->post();
		if (isset($post['Geju'])) {
			$access = $post['Geju']['access'];
			if ($access) {
				$result = AccessQimen::find()->where(['access' => md5($access)])->one();
				if ($result) {
					$session = Yii::$app->session;
					$session->set('qimen_access_code', md5($access));
					return $this->redirect(['qimengeju/']);
				} else {
					Yii::$app->session->setFlash('alert', Yii::t('app', 'Access Code Error'));
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				}
			} else {
				Yii::$app->session->setFlash('alert', Yii::t('app', 'Access Code Empty'));
				return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			}
		}
		return $this->render('pg_qimen_access');
	}

	public function actionQimenreset()
	{
		// fsgw
		// fsgwqimen138
		// print_r(md5('1331'));exit;
		$post = Yii::$app->request->post();
		if (isset($post['Geju'])) {
			$username   = $post['Geju']['username'];
			$password   = $post['Geju']['password'];
			$is_visible = $post['Geju']['is_visible'];
			$access     = $post['Geju']['access'];
			if ($username && $password && $access) {
				$result = AccessQimen::find()
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
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					} else {
						Yii::$app->session->setFlash('alert', 'Error.');
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					}
				} else {
					Yii::$app->session->setFlash('alert', 'Error.');
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				}
			} else {
				Yii::$app->session->setFlash('alert', 'Error.');
				return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			}
		}
		$is_visible = AccessQimen::find()
			->select('is_visible')
			->asArray()
			->one();
		return $this->render('pg_qimen_reset',[
			'is_visible' => $is_visible['is_visible'],
		]);
	}

	public function actionFlyingStar()
	{
		$facing = '';
		$period = '';
		$post = Yii::$app->request->post();
		if (isset($post['FS'])) {
			$facing = $post['FS']['facing'];
			$period = $post['FS']['period'];

			$log              = new LogToolsFlyingStar();
			$log->user_id     = Yii::$app->user->identity->user_id;
			$log->ip          = Yii::$app->getRequest()->getUserIP();
			$log->facing      = $facing;
			$log->period      = $period;
			$log->create_date = date("Y-m-d H:i:s");
			$log->save();
		}
		return $this->render('pg_flying_star', [
			'facing' => $facing,
			'period' => $period,
		]);
	}

	public function actionEightMansion()
	{
		$facing = '';
		$post = Yii::$app->request->post();
		if (isset($post['EM'])) {
			$facing = $post['EM']['facing'];

			$log              = new LogToolsEightMansion();
			$log->user_id     = Yii::$app->user->identity->user_id;
			$log->ip          = Yii::$app->getRequest()->getUserIP();
			$log->facing      = $facing;
			$log->create_date = date("Y-m-d H:i:s");
			$log->save();
		}
		return $this->render('pg_eight_mansion', [
			'facing' => $facing,
		]);
	}

	public function actionPersonalDirection()
	{
		$post = Yii::$app->request->post();
		if (isset($post['PD'])) {
			$year   = $post['PD']['year'];
			$month  = $post['PD']['month'];
			$day    = $post['PD']['day'];
			$gender = $post['PD']['gender'];
		} else {
			$year   = date("Y");
			$month  = date("m");
			$day    = date("d");
			$gender = 0;
		}

		$input   = $year.'-'.$month.'-'.$day;
		$compare = $year."-02-04";
		if (strtotime($input) > strtotime($compare)) {
			$date_start = $year."-02-04";
			$date_end   = ($year+1)."-02-03";
		} else {
			$date_start = ($year-1)."-02-04";
			$date_end   = $year."-02-03";
		}

		$result = FsPersonalDirection::find()
			->where([
				'date_start' => $date_start,
				'date_end'   => $date_end,
			])
			->one();

		if ($gender == 0) {
			$gua    = $result->male;
			$animal = $result->animal_en;
			$sex    = 'male';
		}
		if ($gender == 1) {
			$gua    = $result->female;
			$animal = $result->animal_en;
			$sex    = 'female';
		}

		return $this->render('pg_personal_direction', [
			'gua'    => $gua,
			'animal' => $animal,
			'year'   => $year,
			'month'  => $month,
			'day'    => $day,
			'sex'    => $sex,
		]);
	}

	public function actionGenerateData__()
	{
		/* idle method */
		$animal_arr = array(
			0 => array(
				0 => 'monkey',
				1 => '猴'
			),
			1 => array(
				0 => 'rooster',
				1 => '鸡'
			),
			2 => array(
				0 => 'dog',
				1 => '狗'
			),
			3 => array(
				0 => 'boar',
				1 => '猪'
			),
			4 => array(
				0 => 'rat',
				1 => '鼠'
			),
			5 => array(
				0 => 'ox',
				1 => '牛'
			),
			6 => array(
				0 => 'tiger',
				1 => '虎'
			),
			7 => array(
				0 => 'rabbit',
				1 => '兔'
			),
			8 => array(
				0 => 'dragon',
				1 => '龙'
			),
			9 => array(
				0 => 'snake',
				1 => '蛇'
			),
			10 => array(
				0 => 'horse',
				1 => '马'
			),
			11 => array(
				0 => 'goat',
				1 => '羊'
			),
		);

		for ($i=1911; $i<=2025 ; $i++) {
			$animal     = $i%12;
			$animal_en  = $animal_arr[$animal][0];
			$animal_cn  = $animal_arr[$animal][1];
			$date_start = $i."-02-04";
			$date_end   = ($i+1)."-02-03";
			// print($date_from.' : '.$date_to.' : '.$animal_en.' : '.$animal_cn);
			// print_r('<br>');

			$new_data = new FsPersonalDirection();
			$new_data->date_start = $date_start;
			$new_data->date_end   = $date_end;
			$new_data->animal_en  = $animal_en;
			$new_data->animal_cn  = $animal_cn;
			$new_data->save(false);
		}
		exit;
	}

	public function actionBaziliunian()
	{
		$baziliunian = AccessBazi::find()
			->select('is_visible, access')
			->asArray()
			->one();
		if ($baziliunian['is_visible'] == 0) {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Follow us on facebook for Ba Zi Liu Nian accessible period'));
			return $this->redirect(Yii::$app->homeUrl);
		}

		$session = Yii::$app->session;
		if ($session->has('liunian_access_code')) {
			if ($baziliunian['access'] != $session->get('liunian_access_code')) {
				return $this->redirect(['bazi-access/']);
			}
		} else {
			return $this->redirect(['bazi-access/']);
		}

		$post = Yii::$app->request->post();
		if (isset($post['bazi'])) {

			// $uid=15; // 測試
			$uid     = 12; // 正式
			$fateurl = 'www.ncc.com.tw';
			// $item    = '龍巖風水八字命盤.流年';
			// $item    = '龍巖風水八字命盤.無用神';
			$item    = '龍巖風水八字命盤.奇門.流年1頁';
			$userip  = Yii::$app->request->getUserIP();

			$bazi          = $post['bazi'];
			$cname         = $bazi['chinese_name'];
			$ename         = $bazi['english_name'];
			$sex           = $bazi['gender'];
			$calendar_type = $bazi['calendar'];

			// 1=阳历
			// 0=阴历
			if ($calendar_type == '1') {
				$bazi_dt   = implode(",",$bazi['en']);
				$calendar   = 1;
				$leap_month = 0;
			} else {
				$bazi_dt   = implode(",",$bazi['cn']);
				$calendar   = 0;
				$leap_month = empty($bazi['s_month']) ? 0 : 1;
			}

			$bir = rawurlencode("$cname").rawurlencode("__$ename,$sex,$calendar,$bazi_dt,$leap_month,1");
			$url = "http://$fateurl/net/fate.php?uid=$uid&lng=utf-8&userip=".$userip."&type=bir&bir=$bir&tzwork=0&item=".rawurlencode($item);

			$map = file($url);
			$map = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><div style="width:auto;">'.join('',$map).'</div>';
			echo $map;
			exit;
		}
		return $this->render('pg_liunian_bazi');
	}
	
	public function actionBaziAccess()
	{
		$post = Yii::$app->request->post();
		if (isset($post['Liunian'])) {
			$access = $post['Liunian']['access'];
			if ($access) {
				$result = AccessBazi::find()->where(['access' => md5($access)])->one();
				if ($result) {
					$session = Yii::$app->session;
					$session->set('liunian_access_code', md5($access));
					return $this->redirect(['baziliunian']);
				} else {
					Yii::$app->session->setFlash('alert', Yii::t('app', 'Access Code Error'));
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				}
			} else {
				Yii::$app->session->setFlash('alert', Yii::t('app', 'Access Code Empty'));
				return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			}
		}
		return $this->render('pg_liunian_access');
	}

	public function actionBazireset()
	{
		// fsgw
		// fsgwbazi138
		// print_r(md5('fsgwbazi138'));exit;
		$post = Yii::$app->request->post();
		if (isset($post['Liunian'])) {
			$username   = $post['Liunian']['username'];
			$password   = $post['Liunian']['password'];
			$is_visible = $post['Liunian']['is_visible'];
			$access     = $post['Liunian']['access'];
			if ($username && $password && $access) {
				$result = AccessBazi::find()
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
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					} else {
						Yii::$app->session->setFlash('alert', 'Error.');
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					}
				} else {
					Yii::$app->session->setFlash('alert', 'Error.');
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				}
			} else {
				Yii::$app->session->setFlash('alert', 'Error.');
				return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			}
		}
		$is_visible = AccessBazi::find()
			->select('is_visible')
			->asArray()
			->one();
		return $this->render('pg_liunian_reset',[
			'is_visible' => $is_visible['is_visible'],
		]);
	}
	
	public function actionBazireport()
	{
		$bazireport = AccessBaziReport::find()
			->select('is_visible')
			->asArray()
			->one();
		if ($bazireport['is_visible'] == 0) {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Follow us on facebook for Ba Zi Report accessible period'));
			return $this->redirect(Yii::$app->homeUrl);
		}

		$post = Yii::$app->request->post();
		if (isset($post['bazi'])) {

			// $uid=15; // 測試
			$uid     = 12; // 正式
			$fateurl = 'www.ncc.com.tw';
			$item    = '龍巖風水八字命盤.無用神能量.天干解說';
			$userip  = Yii::$app->request->getUserIP();

			$bazi          = $post['bazi'];
			$cname         = $bazi['chinese_name'];
			$ename         = $bazi['english_name'];
			$sex           = $bazi['gender'];
			$calendar_type = $bazi['calendar'];

			// 1=阳历
			// 0=阴历
			if ($calendar_type == '1') {
				$bazi_dt   = implode(",",$bazi['en']);
				$calendar   = 1;
				$leap_month = 0;
			} else {
				$bazi_dt   = implode(",",$bazi['cn']);
				$calendar   = 0;
				$leap_month = empty($bazi['s_month']) ? 0 : 1;
			}

			$bir = rawurlencode("$cname").rawurlencode("__$ename,$sex,$calendar,$bazi_dt,$leap_month,1");
			$url = "http://$fateurl/net/fate.php?uid=$uid&lng=utf-8&userip=".$userip."&type=bir&bir=$bir&tzwork=0&item=".rawurlencode($item);

			$map = file($url);
			$map = '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"><div style="width:auto;">'.join('',$map).'</div>';
			echo $map;
			exit;
		}
		return $this->render('pg_bazi_report');
	}

	public function actionBazireportreset()
	{
		// fsgw
		// fsgwbazireport138
		// print_r(md5('fsgwbazireport138'));exit;
		$post = Yii::$app->request->post();
		if (isset($post['Bazireport'])) {
			$username   = $post['Bazireport']['username'];
			$password   = $post['Bazireport']['password'];
			$is_visible = $post['Bazireport']['is_visible'];
			if ($username && $password) {
				$result = AccessBaziReport::find()
					->where([
						'username' => $username,
						'password' => md5($password),
					])
					->one();
				if ($result) {
					$result->is_visible = $is_visible;
					$result->update_at  = date("Y-m-d H:i:s");
					if ($result->update() !== false) {
						Yii::$app->session->setFlash('alert', 'Success.');
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					} else {
						Yii::$app->session->setFlash('alert', 'Error.');
						return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
					}
				} else {
					Yii::$app->session->setFlash('alert', 'Error.');
					return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
				}
			} else {
				Yii::$app->session->setFlash('alert', 'Error.');
				return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
			}
		}
		$is_visible = AccessBaziReport::find()
			->select('is_visible')
			->asArray()
			->one();
		return $this->render('pg_bazi_reset',[
			'is_visible' => $is_visible['is_visible'],
		]);
	}
}


