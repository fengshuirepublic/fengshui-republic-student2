<?php
namespace frontend\fs_tools\naming_analysis\components;

use Yii;

class big2gb
{
	function chg_utfcode($str,$charset='big5')
	{
		if ($charset=='big5')
		{
			$fd = fopen(Yii::getAlias('@frontend')."/fs_tools/naming_analysis/unihan/gb2big.map",'r');
			$str1 = fread($fd,filesize(Yii::getAlias('@frontend')."/fs_tools/naming_analysis/unihan/gb2big.map"));
		}

		fclose($fd);

		// convert to unicode and map code
		$chg_utf = array();
		for ($i=0;$i<strlen($str1);$i=$i+4)
		{
			$ch1=ord(substr($str1,$i,1))*256;
			$ch2=ord(substr($str1,$i+1,1));
			$ch1=$ch1+$ch2;
			$ch3=ord(substr($str1,$i+2,1))*256;
			$ch4=ord(substr($str1,$i+3,1));
			$ch3=$ch3+$ch4;
			$chg_utf[$ch1]=$ch3;
		}

		// convert to UTF-8
		$outstr='';
		$out = array();
		for ($k=0;$k<strlen($str);$k++)
		{
			$ch=ord(substr($str,$k,1));
			if ($ch<0x80)
			{
				$outstr.=substr($str,$k,1);
			}
			else
			{
				if ($ch>0xBF && $ch<0xFE)
				{
					if ($ch<0xE0) {
						$i=1;
						$uni_code=$ch-0xC0;
					} elseif ($ch<0xF0)	{
						$i=2;
						$uni_code=$ch-0xE0;
					} elseif ($ch<0xF8)	{
						$i=3;
						$uni_code=$ch-0xF0;
					} elseif ($ch<0xFC)	{
						$i=4;
						$uni_code=$ch-0xF8;
					} else {
						$i=5;
						$uni_code=$ch-0xFC;
					}
				}

				$ch1=substr($str,$k,1);
				for ($j=0;$j<$i;$j++)
				{
					$ch1 .= substr($str,$k+$j+1,1);
					$ch=ord(substr($str,$k+$j+1,1))-0x80;
					$uni_code=$uni_code*64+$ch;
				}

				//from simple to tradisional
				if (!isset($chg_utf[$uni_code]))
				{
					$outstr.=$ch1;
					$hex_code = dechex($uni_code);
					$ch_info = array(
						'hex'=>$hex_code,
						'character'=>$ch1,
					);
				}
				else
				{
					$ch_info = $this->uni2utf($chg_utf[$uni_code]);
				}
				$k += $i;

				$out[] = $ch_info;
			}
		}

		foreach ($out as $key => $ch_info) {
			if ($key==0 && $out[0]['hex']=='7bc4') {
				$out[0]['character'] = '范';
				// $out[0]['strokecount'] = $this->search(8303);
				$out[0]['strokecount'] = 30.5;
				$out[0]['hanyupinyin'] = $this->hanyupinyin(8303);
			}
			else{
				$out[$key]['strokecount'] = $this->search($ch_info['hex']);
				$out[$key]['hanyupinyin'] = $this->hanyupinyin($ch_info['hex']);
			}
		}

		return $out;
	}

	// Return utf-8 character
	function uni2utf($uni_code)
	{
		if ($uni_code<0x80) return chr($uni_code);
		$i=0;
		$outstr='';
		$result = array();
		// print("*".$uni_code."*"); // tradisional character unicode
		// print(dechex($uni_code));

		$count = dechex($uni_code);
		$result['hex'] = $count;

		while ($uni_code>63) // 2^6=64
		{
			$outstr=chr($uni_code%64+0x80).$outstr;
			$uni_code=floor($uni_code/64);
			$i++;
		}

		switch($i)
		{
			case 1:
				$outstr=chr($uni_code+0xC0).$outstr;break;
			case 2:
				$outstr=chr($uni_code+0xE0).$outstr;break;
			case 3:
				$outstr=chr($uni_code+0xF0).$outstr;break;
			case 4:
				$outstr=chr($uni_code+0xF8).$outstr;break;
			case 5:
				$outstr=chr($uni_code+0xFC).$outstr;break;
			default:
				echo "unicode error!!";exit;
		}

		$result['character'] = $outstr;

		return $result;
	}

	function search($hex){
		$file = 'Unihan_RadicalStrokeCounts.txt';
		$searchfor = 'U+'.$hex.'	kRSKangXi';

		// the following line prevents the browser from parsing this as HTML.
		// header('Content-Type: text/plain');

		// get the file contents, assuming the file to be readable (and exist)
		$contents = file_get_contents(Yii::getAlias('@frontend')."/fs_tools/naming_analysis/unihan/".$file);

		// escape special characters in the query
		$pattern = preg_quote($searchfor, '/');

		// finalise the regular expression, matching the whole line
		$pattern = "/^.*$pattern.*\$/mi";

		// search, and store all matching occurences in $matches
		if(preg_match($pattern, $contents, $matches)){
			$whole_result = (explode("\t", $matches[0])); // split into 3 part by tab
			$result = $whole_result[2];
			return $result;
		}
		// else{
		// 	echo "No matches found";
		// }
	}

	function hanyupinyin($hex){
		$file = 'Unihan_Readings.txt';
		$searchfor = 'U+'.$hex.'	kMandarin';

		// the following line prevents the browser from parsing this as HTML.
		// header('Content-Type: text/plain');

		// get the file contents, assuming the file to be readable (and exist)
		$contents = file_get_contents(Yii::getAlias('@frontend')."/fs_tools/naming_analysis/unihan/".$file);

		// escape special characters in the query
		$pattern = preg_quote($searchfor, '/');

		// finalise the regular expression, matching the whole line
		$pattern = "/^.*$pattern.*\$/mi";

		// search, and store all matching occurences in $matches
		if(preg_match($pattern, $contents, $matches)){
			$whole_result = (explode("\t", $matches[0])); // split into 3 part by tab
			$result = $whole_result[2];
			return $result;
		}
		// else{
		// 	echo "No matches found";
		// }
	}
}
