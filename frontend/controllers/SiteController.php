<?php
namespace frontend\controllers;

use Yii;
use Mandrill;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\ContactUs;
use frontend\models\Enquiry;
use frontend\models\FormLogin;
use frontend\models\User;
use frontend\models\SettingSlider;
use frontend\models\SettingShortcut;
use frontend\lib\mail\GetResponse;
use frontend\lib\mail\PHPMailer;

class SiteController extends Controller
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
					'logout',
				],
				'rules' => [
					[
						'allow' => true,
						'roles' => ['@'],
					]
				],
			],
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'contact-us' => ['post'],
					'register'   => ['post'],
					'login'      => ['post'],
					'resend'     => ['post'],
					'enquiry'    => ['post'],
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
				'layout' => 'plain',
			],
			'captcha' => [
				'class' => 'common\actions\CaptchaAction',
				'backColor' => 0xe2e2e2,
				'foreColor' => 0x300000,
				'maxLength' => 5,
				'minLength' => 5,
				'offset'    => 3,
				'height'    => 50,
				'testLimit' => 2,
				'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
			],
		];
	}

	public function actionLang($lang)
	{
		Yii::$app->session->set("lang", $lang);
		return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
	}

	public function actionIndex()
	{
		$slides = SettingSlider::find()
			->where(['status' => 1])
			->orderBy(['sequence' => SORT_ASC])
			->all();

		$shortcuts = SettingShortcut::find()
			->where(['status' => 1])
			->orderBy(['sequence' => SORT_ASC])
			->all();

		return $this->render('pg_index', [
			'slides' => $slides,
			'shortcuts' => $shortcuts,
		]);
	}

	public function actionContactUs()
	{
		$service = array(
			1 => array(
				'name'   => 'Residential Fengshui | 居家风水',
				'email'  => 'john@fengshui-republic.com',
				'person' => 'John',
			),
			2 => array(
				'name'   => 'Commercial Fengshui | 商宅风水',
				'email'  => 'john@fengshui-republic.com',
				'person' => 'John',
			),
			3 => array(
				'name'   => 'Graveyard Fengshui | 阴宅风水',
				'email'  => 'john@fengshui-republic.com',
				'person' => 'John',
			),
			4 => array(
				'name'   => 'Property Development | 屋业发展',
				'email'  => 'john@fengshui-republic.com',
				'person' => 'John',
			),
			5 => array(
				'name'   => 'Baby Naming | 婴儿取名',
				'email'  => 'steve@fengshui-republic.com',
				'person' => 'Steve',
			),
			6 => array(
				'name'   => 'Adult Renaming | 成人改名',
				'email'  => 'steve@fengshui-republic.com',
				'person' => 'Steve',
			),
			7 => array(
				'name'   => 'Date Selection for Moving | 搬家择日',
				'email'  => 'jerrick@fengshui-republic.com',
				'person' => 'Jerrick',
			),
			8 => array(
				'name'   => 'Date Selection for Wedding | 婚嫁择日',
				'email'  => 'jerrick@fengshui-republic.com',
				'person' => 'Jerrick',
			),
			9 => array(
				'name'   => 'Date Selection for Baby | 择日剖腹',
				'email'  => 'jerrick@fengshui-republic.com',
				'person' => 'Jerrick',
			),
			10 => array(
				'name'   => 'Bazi Analysis | 八字批命',
				'email'  => 'chris@fengshui-republic.com',
				'person' => 'Chris',
			),
			11 => array(
				'name'   => 'Corporate Talk Engagement | 风水讲座',
				'email'  => 'steve@fengshui-republic.com',
				'person' => 'Steve',
			),
			12 => array(
				'name'   => 'Courses | 课程',
				'email'  => 'chris@fengshui-republic.com',
				'person' => 'Chris',
			),
		);

		$contact_us = new ContactUs();
		$contact_us->load(Yii::$app->request->post());
		$contact_us->create_date = date("Y-m-d H:i:s");
		if ($contact_us->save()) {
			$getresponse 			= new GetResponse(
				Yii::$app->params['getresponse.apiKey'],
				Yii::$app->params['getresponse.domain'],
				Yii::$app->params['getresponse.tagId']
			);
			$phpmailer        = new PHPMailer(
				Yii::$app->params['smtp.host'],
				Yii::$app->params['smtp.username'],
				Yii::$app->params['smtp.password'],
				Yii::$app->params['smtp.port']
			);
			$template_name    = "republic-contact-us-form";
			$template_content = [
				[
					'name'    => 'service',
					'content' => $service[$contact_us->service]['name'],
				],
				[
					'name'    => 'name',
					'content' => $contact_us->name,
				],
				[
					'name'    => 'email',
					'content' => $contact_us->email,
				],
				[
					'name'    => 'contact',
					'content' => $contact_us->contact,
				],
				[
					'name'    => 'address',
					'content' => '-',
				],
				[
					'name'    => 'message',
					'content' => $contact_us->message,
				]
			];
			$message_customer = [
				'from_field_id'=> 'yp8RL',
				'track_opens'  => true,
				'track_clicks' => true,
				'auto_text'    => true,
				'subject'      => $service[$contact_us->service]['name'],
				'to'           => [
					[
						'email' => $contact_us->email,
						'name'  => $contact_us->name,
						'type'  => 'to',
					],
				],
			];
			$getresponse->sendTemplate($template_name, $template_content, $message_customer);

			$message_internal = [
				'from_email'   => $contact_us->email,
				'from_name'    => $contact_us->name,
				'track_opens'  => true,
				'track_clicks' => true,
				'auto_text'    => true,
				'subject'      => $service[$contact_us->service]['name'],
				'to'           => [
					[
						'email' => 'customercare@fengshui-republic.com',
						'name'  => 'Customer Care',
						'type'  => 'to',
					],
				],
			];
			$phpmailer->sendTemplate($template_name, $template_content, $message_internal);

			Yii::$app->session->setFlash('alert', Yii::t('app', 'Email has been sent'));
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		} else {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Error. Email cannot be sent'));
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}
	}

	public function actionValidateCname__($cname)
	{
		/* idle method */
		Yii::$app->response->format = Response::FORMAT_JSON;

		if (mb_strlen($cname,'UTF-8')<2 || mb_strlen($cname,'UTF-8')>4) {
			$result['error'] = 2;
		} elseif (preg_match("/\w/i", $cname)) {
			$result['error'] = 1;
		} else {
			$result['error'] = 0;
		}
		return $result;
	}

	public function actionMember()
	{
		if (!Yii::$app->user->isGuest) {
			return $this->redirect(Yii::$app->homeUrl);
		}
		return $this->render('pg_member');
	}

	public function actionRegister()
	{
		$post = Yii::$app->request->post();
		if (isset($post['Register'])) {
			$name    = $post['Register']['name'];
			$email   = strtolower($post['Register']['email']);
			$contact = $post['Register']['contact'];
			if ($name && $email && $contact) {
				$result = User::find()
					->where([
						'email' => $email,
					])
					->one();
				if ($result) {
					Yii::$app->session->setFlash('alert', Yii::t('app', 'Email registered'));
					return $this->redirect(['member/']);
				} else {
					$code = '';
					$keyspace = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$max = mb_strlen($keyspace, '8bit') - 1;
					for ($i = 0; $i < 5; ++$i) {
						$code .= $keyspace[random_int(0, $max)];
					}
					$user = new User();
					$user->email     = $email;
					$user->contact   = $contact;
					$user->name      = $name;
					$user->code      = $code;
					$user->update_at = date("Y-m-d H:i:s");
					if ($user->save()) {
						$hash = md5($user->email.$user->code);
						$link = "http://fengshui-republic.com/activate?email=".$user->email."&code=".$hash;


						$getresponse 			= new GetResponse(
							Yii::$app->params['getresponse.apiKey'],
							Yii::$app->params['getresponse.domain'],
							Yii::$app->params['getresponse.tagId']
						);
						$template_name    = "republic-register";
						$template_content = [
							[
								'name'    => 'name',
								'content' => $user->name,
							],
							[
								'name' => 'link',
								'content' => $link,
							],
						];
						$message = [
							'from_field_id'=> 'yp8Rf', // 'no-reply@fengshui-republic.com'
							// 'from_email'   => 'no-reply@fengshui-republic.com',
							// 'from_name'    => "Fengshui Republic",
							'track_opens'  => true,
							'track_clicks' => true,
							'auto_text'    => true,
							'merge'        => true,
							'subject'      => 'Welcome to Fengshui Republic',
							'to'           => [
								[
									'email' => $user->email,
									'name'  => $user->name,
									'type'  => 'to',
								],
							],
						];
						$getresponse->sendTemplate($template_name, $template_content, $message);
						Yii::$app->session->setFlash('alert', Yii::t('app', 'Verification email has been sent'));
						return $this->redirect(Yii::$app->homeUrl);
					}
				}
			}
		}
	}

	public function actionResend()
	{
		$post = Yii::$app->request->post();
		if (isset($post['Resend'])) {
			$email = strtolower($post['Resend']['email']);
			if ($email) {
				$user = User::find()
					->where([
						'email' => $email,
					])
					->one();
				if ($user) {
					if ($user->status == 2) {
						$code = '';
						$keyspace = '123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
						$max = mb_strlen($keyspace, '8bit') - 1;
						for ($i = 0; $i < 5; ++$i) {
							$code .= $keyspace[random_int(0, $max)];
						}
						$user->code      = $code;
						$user->update_at = date("Y-m-d H:i:s");
						if ($user->update() !== false) {
							$hash = md5($user->email.$user->code);
							$link = "http://fengshui-republic.com/activate?email=".$user->email."&code=".$hash;


							$getresponse 			= new GetResponse(
								Yii::$app->params['getresponse.apiKey'],
								Yii::$app->params['getresponse.domain'],
								Yii::$app->params['getresponse.tagId']
							);
							$template_name    = "republic-register";
							$template_content = [
								[
									'name'    => 'name',
									'content' => $user->name,
								],
								[
									'name' => 'link',
									'content' => $link,
								],
							];
							$message = [
								'from_field_id'=> 'yp8Rf', // 'no-reply@fengshui-republic.com'
								// 'from_email'   => 'no-reply@fengshui-republic.com',
								// 'from_name'    => "Fengshui Republic",
								'track_opens'  => true,
								'track_clicks' => true,
								'auto_text'    => true,
								'merge'        => true,
								'subject'      => 'Welcome to Fengshui Republic',
								'to'           => [
									[
										'email' => $user->email,
										'name'  => $user->name,
										'type'  => 'to',
									],
								],
							];
							$getresponse->sendTemplate($template_name, $template_content, $message);
							Yii::$app->session->setFlash('alert', Yii::t('app', 'Verification email has been sent'));
							return $this->redirect(Yii::$app->homeUrl);
						} else {
							Yii::$app->session->setFlash('alert', Yii::t('app', 'Error. Activate failed'));
							return $this->redirect(Yii::$app->homeUrl);
						}
					} else {
						Yii::$app->session->setFlash('alert', Yii::t('app', 'Error. Activate failed'));
						return $this->redirect(Yii::$app->homeUrl);
					}
				} else {
					Yii::$app->session->setFlash('alert', Yii::t('app', 'Error. Activate failed'));
					return $this->redirect(Yii::$app->homeUrl);
				}
			}
		}
	}

	public function actionActivate($email, $code)
	{
		$result = User::find()->where(['email' => strtolower($email)])->one();
		if ($result->status == 2) {
			$hash1 = md5($result->email.$result->code);
			if ($hash1 == $code) {
				$result->status = 1;
				$result->update_at = date("Y-m-d H:i:s");
				if ($result->update() !== false) {
					Yii::$app->user->login($result);
					Yii::$app->session->setFlash('alert', Yii::t('app', 'Success login'));
					return $this->redirect(Yii::$app->homeUrl);
				} else {
					Yii::$app->session->setFlash('alert', Yii::t('app', 'Error. Activate failed'));
					return $this->redirect(Yii::$app->homeUrl);
				}
			} else {
				Yii::$app->session->setFlash('alert', Yii::t('app', 'Error. Activate failed'));
				return $this->redirect(Yii::$app->homeUrl);
			}
		} elseif ($result->status == 1) {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Error. Email registered'));
			return $this->redirect(['member/']);
		} else {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Error. Activate failed'));
			return $this->redirect(Yii::$app->homeUrl);
		}
	}

	public function actionLogin()
	{
		$model = new FormLogin();
		if ($model->load(Yii::$app->request->post())) {
			$model->email = strtolower(Yii::$app->request->post()['FormLogin']['email']);
			if ($model->login()) {
				User::updateAll([
					'amount_login' => (Yii::$app->user->identity->amount_login+1),
					'last_login' => date("Y-m-d H:i:s")
				], 'user_id = '.Yii::$app->user->identity->user_id);
				Yii::$app->session->setFlash('alert', Yii::t('app', 'Success login'));
			} else {
				Yii::$app->session->setFlash('alert', Yii::t('app', 'Error. Login failed'));
			}
		} else {
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Error. Login failed'));
		}
		return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
	}

	public function actionLogout()
	{
		Yii::$app->user->logout();
		return $this->redirect(Yii::$app->homeUrl);
	}

	public function actionEnquiry()
	{
		$enquiry = new Enquiry();
		$enquiry->load(Yii::$app->request->post());
		$enquiry->ip = Yii::$app->getRequest()->getUserIP();
		$enquiry->create_date = date("Y-m-d H:i:s");

		$post = Yii::$app->request->post();
		$info = $post['Enquiry']['info'];

		$textInfo = '';
		foreach ($info as $key => $value) {
			switch ($key) {
				case 'family':
					foreach ($value as $k => $v) {
						foreach ($v as $i => $j) {
							$textInfo .= "Family ".$k." ".$i.": ".$j."<br><br>";
						}
					}
					break;
				case 'father':
					$textInfo .= "Father DOB : ".$value['year']."-".sprintf('%02d',$value['month'])."-".sprintf('%02d',$value['day'])."<br>";
					break;
				case 'mother':
					$textInfo .= "Mother DOB : ".$value['year']."-".sprintf('%02d',$value['month'])."-".sprintf('%02d',$value['day'])."<br>";
					break;
				case 'bridegroom':
					$textInfo .= "Bridegroom DOB : ".$value['year']."-".sprintf('%02d',$value['month'])."-".sprintf('%02d',$value['day'])."<br>";
					break;
				case 'bride':
					$textInfo .= "Bride DOB : ".$value['year']."-".sprintf('%02d',$value['month'])."-".sprintf('%02d',$value['day'])."<br>";
					break;
				default:
					if ($value) {
						$textInfo .= ucfirst($key).": ".$value."<br>";
					}
					break;
			}
		}
		if (empty($textInfo)) {
			$textInfo = 'None';
		}
		$enquiry->info = $textInfo;

		if ($enquiry->save()) {
			$getresponse 	  = new GetResponse(
				Yii::$app->params['getresponse.apiKey'],
				Yii::$app->params['getresponse.domain'],
				Yii::$app->params['getresponse.tagId']
			);
			$phpmailer        = new PHPMailer(
				Yii::$app->params['smtp.host'],
				Yii::$app->params['smtp.username'],
				Yii::$app->params['smtp.password'],
				Yii::$app->params['smtp.port']
			);
			$template_name    = "republic-enquiry-simple";
			$template_content = [
				[
					'name'    => 'service',
					'content' => $enquiry->service,
				],
				[
					'name'    => 'title',
					'content' => $enquiry->title,
				],
				[
					'name'    => 'name_cn',
					'content' => $enquiry->name_cn,
				],
				[
					'name'    => 'name_en',
					'content' => $enquiry->name_en,
				],
				[
					'name'    => 'contact',
					'content' => $enquiry->contact,
				],
				[
					'name'    => 'email',
					'content' => $enquiry->email,
				],
				[
					'name'    => 'info',
					'content' => $enquiry->info,
				]
			];
			$message_customer = [
				'from_field_id'=> 'yp8RZ',
				'track_opens'  => true,
				'track_clicks' => true,
				'auto_text'    => true,
				'subject'      => $enquiry->service,
				'to'           => [
					[
						'email' => $enquiry->email,
						'name'  => $enquiry->name_cn,
						'type'  => 'to',
					],
				],
			];
			$getresponse->sendTemplate($template_name, $template_content, $message_customer);

			$message_internal = [
				'from_email'   => $enquiry->email,
				'from_name'    => $enquiry->name_cn,
				'track_opens'  => true,
				'track_clicks' => true,
				'auto_text'    => true,
				'subject'      => $enquiry->service,
				'to'           => [
					[
						'email' => 'customercare@fengshui-republic.com',
						'name'  => 'Customer Enquiry',
						'type'  => 'to',
					],
				],
			];
			$phpmailer->sendTemplate($template_name, $template_content, $message_internal);

			Yii::$app->session->setFlash('alert', Yii::t('app', 'Email has been sent'));
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		} else {
			// print_r($enquiry->getErrors());exit;
			Yii::$app->session->setFlash('alert', Yii::t('app', 'Error. Email cannot be sent'));
			return $this->redirect(Yii::$app->request->referrer ?: Yii::$app->homeUrl);
		}
	}

	// public function actionCallback()
	// {
	// 	$fields = array(
	// 		'client_id'     => 'd76c49418f634bbe841eb4b39a40527d',
	// 		'client_secret' => 'a7c342fc0de64305a06e54dbff385993',
	// 		'grant_type'    => 'authorization_code',
	// 		'redirect_uri'  => 'http://www.fengshui-republic.com/callback',
	// 		'code'          => $_GET['code']
	// 	);
	// 	$url = 'https://api.instagram.com/oauth/access_token';
	// 	$ch = curl_init();
	// 	curl_setopt($ch, CURLOPT_URL, $url);
	// 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	// 	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	// 	curl_setopt($ch,CURLOPT_POST,true);
	// 	curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
	// 	$result = curl_exec($ch);
	// 	curl_close($ch);
	// 	$result = json_decode($result);
	// 	print_r($result);exit;
	// }

	public function actionTermsConditions()
	{
		return $this->render('pg_terms_conditions');
	}

	public function actionPrivacyNotice()
	{
		return $this->render('pg_privacy');
	}

	public function actionDisclaimerClause()
	{
		return $this->render('pg_disclaimer');
	}
}


