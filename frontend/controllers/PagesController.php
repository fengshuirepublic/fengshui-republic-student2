<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\FsSchedules;

class PagesController extends Controller
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

	public function actionAboutUs()
	{
		return $this->render('about-us/pg_about_us');
	}

	public function actionHouseholdFengshui() /* 1 */
	{
		return $this->render('household-fengshui/pg_household_fengshui');
	}

	public function actionCommercialFengshui() /* 2 */
	{
		return $this->render('commercial-fengshui/pg_commercial_fengshui');
	}

	public function actionTombFengshui() /* 3 */
	{
		return $this->render('tomb-fengshui/pg_tomb_fengshui');
	}

	public function actionBaziAnalysis() /* 4 */
	{
		return $this->render('bazi-analysis/pg_bazi_analysis');
	}

	public function actionHouseMovingDate() /* 5 */
	{
		return $this->render('house-moving/pg_house_moving');
	}

	public function actionChildBirthDate() /* 6 */
	{
		return $this->render('child-birth/pg_child_birth');
	}

	public function actionWeddingDate() /* 7 */
	{
		return $this->render('wedding-date/pg_wedding_date');
	}

	public function actionPropertyDevelopment() /* 8 */
	{
		return $this->render('property-development/pg_property_development');
	}

	public function actionTalksEvents() /* 9 */
	{
		return $this->render('talks-events/pg_talks_events');
	}

	public function actionBabyNaming() /* 10 */
	{
		return $this->render('baby-naming/pg_baby_naming');
	}

	public function actionAdultRenaming() /* 11 */
	{
		return $this->render('adult-renaming/pg_adult_renaming');
	}

	public function actionAllServices() /* 12 */
	{
		return $this->render('all-services/pg_all_services');
	}

	public function actionAllCourses()
	{
		return $this->render('course-all/pg_all_courses');
	}

	public function actionAllSchedules()
	{
		$groups = FsSchedules::find()
		->select(['type, name_en, name_cn, location, COUNT(*) AS cnt'])
		->where(['and', ['<>', 'status', 0]])
		->groupBy(['type', 'name_en', 'location'])
		->orderBy(['date' => SORT_ASC])
		// ->asArray()
		->all();
		// print_r($groups);exit;

		$schedules = FsSchedules::find()->where([
			'and',
			['<>', 'status', 0],
		])
		->orderBy(['name_en' => SORT_ASC, 'date' => SORT_ASC])
		// ->asArray()
		->all();
		// print_r($schedules);exit;

		return $this->render('course-schedule/pg_schedule',[
			'groups' => $groups,
			'schedules' => $schedules,
		]);
	}

	public function actionBazi()
	{
		$groups = FsSchedules::find()
		->select(['name_en, name_cn, location, COUNT(*) AS cnt'])
		->where(['and', ['type' => 'Bazi'], ['<>', 'status', 0]])
		->groupBy(['name_en', 'location'])
		->orderBy(['date' => SORT_ASC])
		// ->asArray()
		->all();
		// print_r($groups);exit;

		$schedules = FsSchedules::find()->where([
			'and',
			['type' => 'Bazi'],
			['<>', 'status', 0],
		])
		->orderBy(['name_en' => SORT_ASC, 'date' => SORT_ASC])
		// ->asArray()
		->all();
		// print_r($schedules);exit;

		return $this->render('course-bazi/pg_bazi',[
			'groups' => $groups,
			'schedules' => $schedules,
		]);
	}

	public function actionQimen()
	{
		$groups = FsSchedules::find()
		->select(['name_en, name_cn, location, COUNT(*) AS cnt'])
		->where(['and', ['type' => 'Qimen'], ['<>', 'status', 0]])
		->groupBy(['name_en', 'location'])
		->orderBy(['date' => SORT_ASC])
		->all();

		$schedules = FsSchedules::find()->where([
			'and',
			['type' => 'Qimen'],
			['<>', 'status', 0],
		])
		->orderBy(['name_en' => SORT_ASC, 'date' => SORT_ASC])
		->all();

		return $this->render('course-qimen/pg_qimen',[
			'groups' => $groups,
			'schedules' => $schedules,
		]);
	}

	public function actionMianxiang()
	{
		$groups = FsSchedules::find()
		->select(['name_en, name_cn, location, COUNT(*) AS cnt'])
		->where(['and', ['type' => 'Mianxiang'], ['<>', 'status', 0]])
		->groupBy(['name_en', 'location'])
		->orderBy(['date' => SORT_ASC])
		->all();

		$schedules = FsSchedules::find()->where([
			'and',
			['type' => 'Mianxiang'],
			['<>', 'status', 0],
		])
		->orderBy(['name_en' => SORT_ASC, 'date' => SORT_ASC])
		->all();

		return $this->render('course-mianxiang/pg_mianxiang',[
			'groups' => $groups,
			'schedules' => $schedules,
		]);
	}

	public function actionYijing()
	{
		$groups = FsSchedules::find()
		->select(['name_en, name_cn, location, COUNT(*) AS cnt'])
		->where(['and', ['type' => 'Yijing'], ['<>', 'status', 0]])
		->groupBy(['name_en', 'location'])
		->orderBy(['date' => SORT_ASC])
		->all();

		$schedules = FsSchedules::find()->where([
			'and',
			['type' => 'Yijing'],
			['<>', 'status', 0],
		])
		->orderBy(['name_en' => SORT_ASC, 'date' => SORT_ASC])
		->all();

		return $this->render('course-yijing/pg_yijing',[
			'groups' => $groups,
			'schedules' => $schedules,
		]);
	}

	public function actionFengshui()
	{
		$groups = FsSchedules::find()
		->select(['name_en, name_cn, location, COUNT(*) AS cnt'])
		->where(['and', ['type' => 'Fengshui'], ['<>', 'status', 0]])
		->groupBy(['name_en', 'location'])
		->orderBy(['date' => SORT_ASC])
		->all();

		$schedules = FsSchedules::find()->where([
			'and',
			['type' => 'Fengshui'],
			['<>', 'status', 0],
		])
		->orderBy(['name_en' => SORT_ASC, 'date' => SORT_ASC])
		->all();

		return $this->render('course-fengshui/pg_fengshui',[
			'groups' => $groups,
			'schedules' => $schedules,
		]);
	}

	public function actionYiyanduan()
	{
		$groups = FsSchedules::find()
		->select(['name_en, name_cn, location, COUNT(*) AS cnt'])
		->where(['and', ['type' => 'Yiyanduan'], ['<>', 'status', 0]])
		->groupBy(['name_en', 'location'])
		->orderBy(['date' => SORT_ASC])
		->all();

		$schedules = FsSchedules::find()->where([
			'and',
			['type' => 'Yiyanduan'],
			['<>', 'status', 0],
		])
		->orderBy(['name_en' => SORT_ASC, 'date' => SORT_ASC])
		->all();

		return $this->render('course-yiyanduan/pg_yiyanduan',[
			'groups' => $groups,
			'schedules' => $schedules,
		]);
	}

	public function actionHighlights()
	{
		// $fields = array(
		// 	'client_id'     => 'd76c49418f634bbe841eb4b39a40527d',
		// 	'client_secret' => 'a7c342fc0de64305a06e54dbff385993',
		// 	'grant_type'    => 'authorization_code',
		// 	'redirect_uri'  => 'http://www.fengshui-republic.com/callback',
		// 	'code'          => 'CODE'
		// );
		// $url = 'https://api.instagram.com/oauth/access_token';
		// $ch = curl_init();
		// curl_setopt($ch, CURLOPT_URL, $url);
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		// curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		// curl_setopt($ch,CURLOPT_POST,true);
		// curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
		// $result = curl_exec($ch);
		// curl_close($ch);
		// $result = json_decode($result);
		// print_r($result);exit;
		// return $result->access_token; //your token

		// $url = "http://graph.facebook.com/FengShuiLouisLoh/feed?limit=3";
		// $url.= '&access_token=YOUR_TOKEN|YOUR_ACCESS_SECRET';// *
		// $c = curl_init($url);
		// curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		// $page = json_decode(curl_exec($c));
		// curl_close($c);
		// print_r($page->data);exit;
		// return $page->data;

		return $this->render('highlights/pg_highlight');
	}

	public function actionTestimonials()
	{
		$testimonials = array(
			'1' => array (
				'url'      => 'angie-ng',
				'en_name'  => 'Angie Ng',
				'en_title' => 'I Found Out Master Loh’s Services Are High Quality,High Standard And Trustworthy',
				'cn_title' => '龙岩三高：高品质，高水准和高诚信！',
			),
			'2' => array (
				'url'      => 'paula-lin',
				'en_name'  => 'Paula Lin',
				'en_title' => 'After Conducting The Fengshui Survey, The Team Provided Me A Copy Of Our Very Own Fengshui Report And Explained To Us Everything In Details',
				'cn_title' => '大师与团队的专业，让我们佩服！',
			),
			'3' => array (
				'url'      => 'yin-lee',
				'en_name'  => 'Yin Lee',
				'en_title' => 'It Is In This House After Conducting The Fengshui Survey Our Child Grew Up Healthily And Happily, And That Our Family Lives Harmoniously.',
				'cn_title' => '如果你相信风水，龙岩风水绝对是你可以参考的选择！',
			),
			'4' => array (
				'url'      => 'louis-lai',
				'en_name'  => 'Louis Lai',
				'en_title' => 'After Master Loh’s Fengshui Arrangement, My Business, Family And Wealth See Great Improvement.',
				'cn_title' => '经过罗师傅布局后我的生意、家庭及财运都有很大的進展！',
			),
			'5' => array (
				'url'      => 'ong-bee-yun',
				'en_name'  => 'Ong Bee Yun',
				'en_title' => 'To Give A Child A Good Name Is Better Than Giving Him Or Her A Thousand Gold.',
				'cn_title' => '送子千金不如赐子一名！',
			),
			'6' => array (
				'url'      => 'hong-pik-yee',
				'en_name'  => 'Hong Pik Yee',
				'en_title' => 'After Moved To New House Selected By Master Loh, We Live Peacefully And Harmoniously Ever Since.',
				'cn_title' => '一家大小平平安安过每一天！',
			),
			'7' => array (
				'url'      => 'shim-woon-choon',
				'en_name'  => 'Shim Woon Choon',
				'en_title' => 'Master Loh And His Team Are Very Professional.',
				'cn_title' => '配合了风水布局迎吉避凶，稳健成长！',
			),
			'8' => array (
				'url'      => 'jeremy-kee',
				'en_name'  => 'Jeremy Kee',
				'en_title' => 'The Company’s Energy Flow Did Become Better; Its Business Development And The Debt Collection Became Much More Efficient, And The Staff Turnover Also Became More Stabilized.',
				'cn_title' => '堪察风水更动后公司气场变的更好了！',
			),
			'9' => array (
				'url'      => 'sun-low',
				'en_name'  => 'Sun Low',
				'en_title' => 'My Company Expand So Rapidly, And I Am Able To Enjoy A Comfortable House And Working Place Too!',
				'cn_title' => '感恩有你们，让我们公司可以扩展地这么快也让我们有个舒适的办公环境和温馨的家！',
			),
			'10' => array (
				'url'      => 'adam-ang',
				'en_name'  => 'Adam Ang',
				'en_title' => 'Fengshui Republic Is A Trustworthy Choice; Its Professionalism And Positive Attitude Has Provided Us Truly One-Stop, Comprehensive Fengshui Services.',
				'cn_title' => '龙岩风水服务绝对是一个可以让你信服及信赖的选择！',
			),
			'11' => array (
				'url'      => 'liang-hill',
				'en_name'  => 'Liang Hill',
				'en_title' => 'I Hoped To Get Some Advices From Some Pragmatic, Scientific-Minded New Generation Of Fengshui Master.',
				'cn_title' => '一家大小都平安开心！',
			),
			'12' => array (
				'url'      => 'erny-looi-chee-en',
				'en_name'  => 'Erny Looi Chee En',
				'en_title' => 'Having Good Fengshui Helps My Family’s Luck And Career！',
				'cn_title' => '好的风水，家庭和谐跟事业更上一层楼！',
			),
			'13' => array (
				'url'      => 'kelvin-beh',
				'en_name'  => 'Kelvin Beh',
				'en_title' => 'I Have Learned Genuine Fengshui And Applied It In My Daily Life And In My Business; It Is No Wonder That I Am Satisfied With My Life Now.',
				'cn_title' => '将学到的正统风水知识运用到自己的住家及生意当中，得到良好的感应让我安居乐业到现在！',
			),
			'14' => array (
				'url'      => 'yu-mico',
				'en_name'  => 'Yu Mico',
				'en_title' => 'My Sales Has Increased 70%, It Is Benefited From Physiognomy Practical Apply.',
				'cn_title' => '学会风水，让我通过这方面的知识，懂得趋吉避凶，及有助于提高自己的成功机率！',
			),
			'15' => array (
				'url'      => 'jimmy-khoo',
				'en_name'  => 'Jimmy Khoo',
				'en_title' => 'Professional And Impressive.',
				'cn_title' => '罗老师深入浅出的教学方式，让我获益良多！',
			),
			'16' => array (
				'url'      => 'ellson-tan',
				'en_name'  => 'Ellson Tan',
				'en_title' => 'I Have Learned What Is Genuine Fengshui.',
				'cn_title' => '我自身体验羅老师的教学方式，深入浅出，让大家更容易学习到什么是真正的風水学问！',
			),
			'17' => array (
				'url'      => 'lim',
				'en_name'  => '林柏宏',
				'en_title' => 'Learning Fengshui Will Allow Us To Welcome What Is Auspicious And Avoid What Is Inauspicious, Thus Increasing Our Chances Of Success.',
				'cn_title' => '学会风水，让我通过这方面的知识，懂得趋吉避凶,及有助于提高自己的成功机率！',
			),
			'18' => array (
				'url'      => 'tan',
				'en_name'  => '陈乙辉',
				'en_title' => 'Fengshui Republic’s Life-Long Learning System Allows Me To Revise All Fengshui And Bazi Courses Without Paying Anything Extra.',
				'cn_title' => '龙岩风水终生复习机制让我在不需要另外付学费下复习了所有风水和八字课程，不会学到会！',
			),
			'19' => array (
				'url'      => 'yap',
				'en_name'  => '叶礼安',
				'en_title' => 'I Had Made Some Fengshui Arrangement For My Own House As Well; It Would Not Take Long For Me To Feel Its Effects.',
				'cn_title' => '在罗老師的教导下，我学到了太多的无价之宝！',
			),
			'20' => array (
				'url'      => 'jeearda-welnis-lim',
				'en_name'  => 'Jeearda Welnis Lim',
				'en_title' => 'To My Surprise, The Class Was Conducted In Fun And Interesting Way.',
				'cn_title' => '罗老师讲课非常生动，上课的过程十分愉快及有趣！',
			),
			'21' => array (
				'url'      => 'simon-kong',
				'en_name'  => 'Simon Kong',
				'en_title' => 'The Basic, Beginner Level Fengshui Course Taught By Master Loh Is At The Same Level As That Fengshui Master’s Knowledge.',
				'cn_title' => '没想到在罗师傅那里学到的最基本的课程，就可以和那些所谓的风水师所使用的方式媲美！',
			),
		);

		return $this->render('testimonials/pg_testimonials', [
			'testimonials' => $testimonials,
		]);
	}

	public function actionTestimonial($name)
	{
		$testimonials = array(
			'1' => array (
				'url'      => 'angie-ng',
				'en_name'  => 'Angie Ng',
				'en_title' => 'I Found Out Master Loh’s Services Are High Quality,High Standard And Trustworthy',
				'cn_title' => '龙岩三高：高品质，高水准和高诚信！',
			),
			'2' => array (
				'url'      => 'paula-lin',
				'en_name'  => 'Paula Lin',
				'en_title' => 'After Conducting The Fengshui Survey, The Team Provided Me A Copy Of Our Very Own Fengshui Report And Explained To Us Everything In Details',
				'cn_title' => '大师与团队的专业，让我们佩服！',
			),
			'3' => array (
				'url'      => 'yin-lee',
				'en_name'  => 'Yin Lee',
				'en_title' => 'It Is In This House After Conducting The Fengshui Survey Our Child Grew Up Healthily And Happily, And That Our Family Lives Harmoniously.',
				'cn_title' => '如果你相信风水，龙岩风水绝对是你可以参考的选择！',
			),
			'4' => array (
				'url'      => 'louis-lai',
				'en_name'  => 'Louis Lai',
				'en_title' => 'After Master Loh’s Fengshui Arrangement, My Business, Family And Wealth See Great Improvement.',
				'cn_title' => '经过罗师傅布局后我的生意、家庭及财运都有很大的進展！',
			),
			'5' => array (
				'url'      => 'ong-bee-yun',
				'en_name'  => 'Ong Bee Yun',
				'en_title' => 'To Give A Child A Good Name Is Better Than Giving Him Or Her A Thousand Gold.',
				'cn_title' => '送子千金不如赐子一名！',
			),
			'6' => array (
				'url'      => 'hong-pik-yee',
				'en_name'  => 'Hong Pik Yee',
				'en_title' => 'After Moved To New House Selected By Master Loh, We Live Peacefully And Harmoniously Ever Since.',
				'cn_title' => '一家大小平平安安过每一天！',
			),
			'7' => array (
				'url'      => 'shim-woon-choon',
				'en_name'  => 'Shim Woon Choon',
				'en_title' => 'Master Loh And His Team Are Very Professional.',
				'cn_title' => '配合了风水布局迎吉避凶，稳健成长！',
			),
			'8' => array (
				'url'      => 'jeremy-kee',
				'en_name'  => 'Jeremy Kee',
				'en_title' => 'The Company’s Energy Flow Did Become Better; Its Business Development And The Debt Collection Became Much More Efficient, And The Staff Turnover Also Became More Stabilized.',
				'cn_title' => '堪察风水更动后公司气场变的更好了！',
			),
			'9' => array (
				'url'      => 'sun-low',
				'en_name'  => 'Sun Low',
				'en_title' => 'My Company Expand So Rapidly, And I Am Able To Enjoy A Comfortable House And Working Place Too!',
				'cn_title' => '感恩有你们，让我们公司可以扩展地这么快也让我们有个舒适的办公环境和温馨的家！',
			),
			'10' => array (
				'url'      => 'adam-ang',
				'en_name'  => 'Adam Ang',
				'en_title' => 'Fengshui Republic Is A Trustworthy Choice; Its Professionalism And Positive Attitude Has Provided Us Truly One-Stop, Comprehensive Fengshui Services.',
				'cn_title' => '龙岩风水服务绝对是一个可以让你信服及信赖的选择！',
			),
			'11' => array (
				'url'      => 'liang-hill',
				'en_name'  => 'Liang Hill',
				'en_title' => 'I Hoped To Get Some Advices From Some Pragmatic, Scientific-Minded New Generation Of Fengshui Master.',
				'cn_title' => '一家大小都平安开心！',
			),
			'12' => array (
				'url'      => 'erny-looi-chee-en',
				'en_name'  => 'Erny Looi Chee En',
				'en_title' => 'Having Good Fengshui Helps My Family’s Luck And Career！',
				'cn_title' => '好的风水，家庭和谐跟事业更上一层楼！',
			),
			'13' => array (
				'url'      => 'kelvin-beh',
				'en_name'  => 'Kelvin Beh',
				'en_title' => 'I Have Learned Genuine Fengshui And Applied It In My Daily Life And In My Business; It Is No Wonder That I Am Satisfied With My Life Now.',
				'cn_title' => '将学到的正统风水知识运用到自己的住家及生意当中，得到良好的感应让我安居乐业到现在！',
			),
			'14' => array (
				'url'      => 'yu-mico',
				'en_name'  => 'Yu Mico',
				'en_title' => 'My Sales Has Increased 70%, It Is Benefited From Physiognomy Practical Apply.',
				'cn_title' => '学会风水，让我通过这方面的知识，懂得趋吉避凶，及有助于提高自己的成功机率！',
			),
			'15' => array (
				'url'      => 'jimmy-khoo',
				'en_name'  => 'Jimmy Khoo',
				'en_title' => 'Professional And Impressive.',
				'cn_title' => '罗老师深入浅出的教学方式，让我获益良多！',
			),
			'16' => array (
				'url'      => 'ellson-tan',
				'en_name'  => 'Ellson Tan',
				'en_title' => 'I Have Learned What Is Genuine Fengshui.',
				'cn_title' => '我自身体验羅老师的教学方式，深入浅出，让大家更容易学习到什么是真正的風水学问！',
			),
			'17' => array (
				'url'      => 'lim',
				'en_name'  => '林柏宏',
				'en_title' => 'Learning Fengshui Will Allow Us To Welcome What Is Auspicious And Avoid What Is Inauspicious, Thus Increasing Our Chances Of Success.',
				'cn_title' => '学会风水，让我通过这方面的知识，懂得趋吉避凶,及有助于提高自己的成功机率！',
			),
			'18' => array (
				'url'      => 'tan',
				'en_name'  => '陈乙辉',
				'en_title' => 'Fengshui Republic’s Life-Long Learning System Allows Me To Revise All Fengshui And Bazi Courses Without Paying Anything Extra.',
				'cn_title' => '龙岩风水终生复习机制让我在不需要另外付学费下复习了所有风水和八字课程，不会学到会！',
			),
			'19' => array (
				'url'      => 'yap',
				'en_name'  => '叶礼安',
				'en_title' => 'I Had Made Some Fengshui Arrangement For My Own House As Well; It Would Not Take Long For Me To Feel Its Effects.',
				'cn_title' => '在罗老師的教导下，我学到了太多的无价之宝！',
			),
			'20' => array (
				'url'      => 'jeearda-welnis-lim',
				'en_name'  => 'Jeearda Welnis Lim',
				'en_title' => 'To My Surprise, The Class Was Conducted In Fun And Interesting Way.',
				'cn_title' => '罗老师讲课非常生动，上课的过程十分愉快及有趣！',
			),
			'21' => array (
				'url'      => 'simon-kong',
				'en_name'  => 'Simon Kong',
				'en_title' => 'The Basic, Beginner Level Fengshui Course Taught By Master Loh Is At The Same Level As That Fengshui Master’s Knowledge.',
				'cn_title' => '没想到在罗师傅那里学到的最基本的课程，就可以和那些所谓的风水师所使用的方式媲美！',
			),
		);

		$exist = false;
		foreach ($testimonials as $key => $value) {
			if ($value['url'] == $name) {
				if ($key == 1) {
					$previous = $testimonials[21]['url'];
					$previous_key = 21;

					$next = $testimonials[$key+1]['url'];
					$next_key = $key+1;
				} elseif ($key == 21) {
					$previous = $testimonials[$key-1]['url'];
					$previous_key = $key-1;

					$next = $testimonials[1]['url'];
					$next_key = 1;
				} else {
					$previous = $testimonials[$key-1]['url'];
					$previous_key = $key-1;

					$next = $testimonials[$key+1]['url'];
					$next_key = $key+1;
				}
				$en_name = $value['en_name'];
				$exist = true;
			}
		}

		if (!$exist) {
			return $this->redirect(['testimonials/']);
		}

		// print_r($previous);exit;
		// echo $previous.' :: '.$next;exit;
		// return $this->render('testimonials/pg_customer_'.$name, [

		return $this->render('testimonials/pg_customer', [
			'testimonials' => $testimonials,
			'previous'     => $previous,
			'previous_key' => $previous_key,
			'next'         => $next,
			'next_key'     => $next_key,
			'en_name'      => $en_name,
			'name'         => $name,
		]);
	}
}


