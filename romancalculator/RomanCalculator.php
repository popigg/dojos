<?php

class RomanCalculator
{
	const FIVE = 5;
	const TEN  = 10;
	static $romanNumberSeries = array(
		 	array ('int'=>1000, 'roman' => 'M'),
		 	array ('int'=>500,  'roman' => 'D'),
		 	array ('int'=>100,  'roman' => 'C'),
		 	array ('int'=>50,   'roman' => 'L'),
		 	array ('int'=>10,   'roman' => 'X'),
		 	array ('int'=>5,    'roman' => 'V'),
		 	array ('int'=>1,    'roman' => 'I'),
		);	
	public function simpleRomanToInt ($romanNumber)
	{
		foreach (self::$romanNumberSeries as $key => $value) {
			if ($value['roman'] == $romanNumber) {
				return self::$romanNumberSeries[$key]['int'];
			}
		}
	}

	public function complexRomansToInt($romanNumber) 
	{	
		$roman = 0;
		for ($i=0; $i < strlen($romanNumber); $i++) {
			if (isset($romanNumber[$i+1]) 
				&& self::simpleRomanToInt($romanNumber[$i+1]) > 
					self::simpleRomanToInt($romanNumber[$i])) {				
				$roman += self::simpleRomanToInt($romanNumber[$i+1]) - 
							self::simpleRomanToInt($romanNumber[$i]);
				$i++;				
			} else {
				$roman += self::simpleRomanToInt($romanNumber[$i]);
			}  
		}
		return $roman;
	}

	public function simpleIntToRoman($int)
	{
		foreach (self::$romanNumberSeries as $key => $value) {
			if ($value['int'] == $int) {
				return self::$romanNumberSeries[$key]['roman'];
			}
		}
	}

	private function _isRuleOfThree($roman, $times)
	{
		if (($roman == 'I' || $roman == 'X' || $roman == 'C') && $times > 3) {
			return true;
		}
		return false;
	}

	private function _composeNormalRoman($value, $times)
	{
		$roman = '';
		for ($i=0; $i < $times; $i++) { 
			$roman .= $value;
		}
		return $roman;
	}

	private function _getCocient($int, $key)
	{
		$cocient = $int / $key;
		return (int)$cocient;
	}

	private function _getRest($int, $value)
	{		
		return $int % $value;
	}

	private function _ruleOfThreeComposition(&$roman, &$int, $prev, $current)
	{
		$roman .= $current['roman'] . $prev['roman'];
		$int = $int - ($prev['int'] - $current['int']); 	
	}

	private function _researchSubstraction(&$roman, &$int, $current) 
	{
		$romSeries = self::$romanNumberSeries;
		foreach ($romSeries as $value => $key) {
			if ($current['int'] > $key['int'] 
				&& $current['int'] - $key['int'] == $int
				&& $int != self::FIVE ) { // it cannot be X - V = V
				$roman .= $key['roman'] .  $current['roman'];
				$int = $int - ($current['int'] - $key['int']);
			}
		}
	}

	public function complexIntToRoman($int)
	{
		$roman = '';
		reset(self::$romanNumberSeries);		
		while ($int > 0) {
			$current = current(self::$romanNumberSeries);
			if ($int >= $current['int']) {
				$times  = self::_getCocient($int, $current['int']);
				if (self::_isRuleOfThree($current['roman'], $times)) {
					$prev = prev(self::$romanNumberSeries);
					self::_ruleOfThreeComposition($roman, $int, $prev, $current);
					next(self::$romanNumberSeries);
				} else {
					$roman .= self::_composeNormalRoman($current['roman'], $times);
					$int    = self::_getRest($int, $current['int']);					
				}
			} else {
				self::_researchSubstraction($roman, $int, $current);
				$next = next(self::$romanNumberSeries);				
			}			
		}
		reset(self::$romanNumberSeries);
		return $roman;
	}
}
