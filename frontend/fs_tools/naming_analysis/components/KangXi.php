<?php
namespace frontend\fs_tools\naming_analysis\components;

use Yii;
use frontend\fs_tools\naming_analysis\components\big2gb;

class KangXi
{
	const GE_TIAN = 0;
	const GE_REN = 1;
	const GE_DI = 2;
	const GE_WAI = 3;
	const GE_ZONG = 4;

	private $word;
	private $element;
	private $name_container;
	private $description;
	private $marks_calculate;

	public function __construct()
	{
		// initialize 5 elements count all to 1
		$this->element = array_fill(0, 5, array('count'=>0, 'element'=>NULL, 'description'=>'', 'value'=>''));

		// initialize name container all to 1
		$this->name_container = array_fill(0, 4, array('character'=>null, 'strokecount'=>1));

		// initialize description
		$this->description = array('Name has not been analyzed');

		// initialize marks
		$this->marks_calculate = '';
	}

	/**
	 * Set the name and calculate the Kang Xi stroke count.
	 * @param $name String name to be analyzed
	 *
	 * @return KangXi this object
	 */
	public function setName($name)
	{
		$big = new big2gb;
		$this->word = $big->chg_utfcode($name);

		// re-calculate stroke count and hide hex info
		foreach ($this->word as $index => $c)
		{
			list($bu_shou, $remaining) = explode(".", $c['strokecount']);
			$this->word[$index]['strokecount'] = $this->radical_stroke_count($bu_shou) + $remaining;

			// remove hex info
			unset($this->word[$index]['hex']);
		}

		return $this;
	}

	/**
	 * Analyze the given name
	 */
	public function analyze()
	{
		$this->initializeNameContainer();
		$this->initializeElement();
		$this->insertElementDescription();
		$this->analyzeLuckyFierce();
		$this->analyzeElement();
		$this->markCalculation();
	}

	public function getResult()
	{
		return array(
			'name_translate' 	=> $this->word,
			'element_result' 	=> $this->element,
			'description' 		=> $this->description,
			'marks'		  		=> $this->marks_calculate,
			);
	}

	private function insertElementDescription()
	{
		$config = require(Yii::getAlias('@frontend').'/fs_tools/naming_analysis/config/gedesc.php');
		$type = array(
			KangXi::GE_TIAN => '天格',
			KangXi::GE_REN => '人格',
			KangXi::GE_DI => '地格',
			KangXi::GE_WAI => '外格',
			KangXi::GE_ZONG => '总格',
			);

		foreach ($this->element as $key => $e) {
			if (isset($config[$type[$key]][$e['count']]))
				$this->element[$key]['detail'] = $config[$type[$key]][$e['count']];
		}
	}

	/**
	 * Analayze the meaning of the name withe the rules given in `naming_config.php` and
	 * explanations in `naming_explanation.php`.
	 */
	private function analyzeElement()
	{
		$config = require(Yii::getAlias('@frontend').'/fs_tools/naming_analysis/config/naming_config.php');
		$config_special = require(Yii::getAlias('@frontend').'/fs_tools/naming_analysis/config/naming_config_special.php');

		$explanation = require(Yii::getAlias('@frontend').'/fs_tools/naming_analysis/config/naming_explanation.php');
		$explanation_luckyfierce = require(Yii::getAlias('@frontend').'/fs_tools/naming_analysis/config/naming_explanation_luckyfierce.php');

		$search_type = array(
			'人天' => array(
				'index'=>'parents',
				'relation'=>$this->element[KangXi::GE_REN]['element'].$this->element[KangXi::GE_TIAN]['element'],
				'etype'=>$this->element[KangXi::GE_REN]['element_type'].$this->element[KangXi::GE_TIAN]['element_type'],
				),
			'人地' => array(
				'index'=>'children',
				'relation'=>$this->element[KangXi::GE_REN]['element'].$this->element[KangXi::GE_DI]['element'],
				'etype'=>$this->element[KangXi::GE_REN]['element_type'].$this->element[KangXi::GE_DI]['element_type'],
				),
			'天人地' => array(
				'index'=>'both',
				'relation'=>$this->element[KangXi::GE_TIAN]['element'].$this->element[KangXi::GE_REN]['element'].$this->element[KangXi::GE_DI]['element'],
				'etype'=>'nill',
				),
			);

		$this->description = array();

		// normal situation
		foreach ($config as $type => $rel_array) {
			foreach ($rel_array as $rel_name => $condition) {
				if (in_array($search_type[$type]['relation'], $condition))
					$this->description['relation'][$search_type[$type]['index']] = array(
						'title'=>$rel_name,
						'value'=>$explanation[$type][$rel_name],
						);
			}
		}

		// special condition. TODO: Remove all previous description and replace with this new description
		foreach ($config_special as $type => $rel_array) {
			foreach ($rel_array as $rel_name => $condition) {
				if (in_array($search_type[$type]['relation'], $condition))
					$this->description['relation']['both'] = array(
						'title'=>$rel_name,
						'value'=>"(特别格局) {$explanation[$type][$rel_name]}",
						);
			}
		}

		// for lucky and fierce
		foreach ($explanation_luckyfierce as $type => $data) {
			$relation = $search_type[$type]['relation'];
			if ($search_type[$type]['etype'] === '凶凶' && array_key_exists($relation, $explanation_luckyfierce[$type])) {
				$this->description['relation'][$search_type[$type]['index']]['value'] = "(特别格局) {$data[$relation]}";
			}
		}
	}

	/**
	 * Initialize the 5 elements to obtain the `count` of each element.
	 * Refer back to the documentation on how the `count` of the 5 elements are calculated.
	 */
	private function initializeElement()
	{
		$w = $this->name_container;

		// set element count
		$this->element[KangXi::GE_TIAN]['count'] = $w[0]['strokecount'] + $w[1]['strokecount'];
		$this->element[KangXi::GE_REN]['count'] = $w[1]['strokecount'] + $w[2]['strokecount'];
		$this->element[KangXi::GE_DI]['count'] = $w[2]['strokecount'] + $w[3]['strokecount'];
		$this->element[KangXi::GE_WAI]['count'] = $w[0]['strokecount'] + $w[3]['strokecount'];

		foreach ($this->name_container as $name)
			if (!is_null($name['character']))
				$this->element[KangXi::GE_ZONG]['count'] += $name['strokecount'];

		// set the description of each element
		$this->element[KangXi::GE_TIAN]['description'] = '天格';
		$this->element[KangXi::GE_REN]['description'] = '人格';
		$this->element[KangXi::GE_DI]['description'] = '地格';
		$this->element[KangXi::GE_WAI]['description'] = '外格';
		$this->element[KangXi::GE_ZONG]['description'] = '总格';

		// analyze the element for Tian - Di
		$element = array('木', '火', '土', '金', '水');
		for ($i = KangXi::GE_TIAN; $i <= KangXi::GE_ZONG; ++$i)
		{
			$last_value = intval(substr("{$this->element[$i]['count']}", -1));

			// special case when last_value is 0
			if ($last_value == 0)
				$last_value = 10;

			// make an odd value even
			if ($last_value%2 == 1)
				++$last_value;

			$this->element[$i]['element'] = $element[$last_value / 2 - 1];
		}
	}

	/**
	 * Analyze the ge element name
	 */
	private function analyzeLuckyFierce()
	{
		$config = require(Yii::getAlias('@frontend').'/fs_tools/naming_analysis/config/lucky_fierce.php');

		foreach ($this->element as $type => $e) {
			$this->element[$type]['element_type'] = '凶';
			if (in_array($e['count'], $config['吉']))
				$this->element[$type]['element_type'] = '吉';
		}
	}

	/**
	 * Initialize the name and put it into `name_container` of length 4.
	 * The first element of the array must be left blank, unless the length of name is 4. Then the
	 * first character of the name is placed in the first element of the array.
	 * Otherwise, the first character must be placed in the 2nd array element.
	 */
	private function initializeNameContainer()
	{
		list($count, $cursor) = array(count($this->word), 0);
		if ($count < 2 || $count > 4)
			throw new Exception("Length of the name must be ranging from 2 to 4 characters.");

		if ($count === 4)
			$this->name_container[0] = $this->word[$cursor++];

		for ($i = 1; $i < 4; ++$i)
			if (isset($this->word[$cursor]))
				$this->name_container[$i] = $this->word[$cursor++];
	}

	/**
	 * Find the radical stroke count
	 * @param $radical_no int each chinese character has a special radical number.
	 *
	 * @return int stroke count
	 */
	private function radical_stroke_count($radical_no)
	{
		$radical_config = require(Yii::getAlias('@frontend').'/fs_tools/naming_analysis/config/radical_config.php');

		foreach ($radical_config as $case)
			if ($case['from'] <= $radical_no && $radical_no <= $case['to'])
				return $case['value'];

		throw new Exception("Invalid radical number.");
	}

	/**
	 * Calculate marks for name
	 */
	private function markCalculation()
	{
		$mark = array(
			KangXi::GE_TIAN => 9,
			KangXi::GE_REN => 16,
			KangXi::GE_DI => 14,
			KangXi::GE_WAI => 13,
			KangXi::GE_ZONG => 19,
			);
		$total = 0;

		foreach ($this->element as $type => $e)
		{
			if ($this->element[$type]['element_type'] == '吉')
				$total += $mark[$type];
		}

		if (isset($this->description['relation']['both']['title'])) {
			if ($this->description['relation']['both']['title'] == '天格地格相生')
				$total += 25;
		} else {
			if (in_array($this->description['relation']['parents']['title'], array('人格生天格', '天格生人格', '人格天格相生')))
				$total += 12;
			if (in_array($this->description['relation']['children']['title'], array('人格生地格', '地格生人格', '人格地格相生')))
				$total += 13;
		}

		$this->marks_calculate = $total;
	}
}
