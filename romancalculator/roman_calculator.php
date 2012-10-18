<?php

$romans = array(
		'M' => 1000,
		'D' => 500,
		'C' => 100,
		'L' => 50,
		'X' => 10,
		'V' => 5,
		'I' => 1,
		);

$a = $_POST['A'];
$b = $_POST['B'];


	function romanToInt($str, $romans) {
		$i = strlen($str)-1;
		$int = 0;
		while ($i >= 0) {
			if (isset($str[$i-1]) && $romans[$str[$i]] > $romans[$str[$i-1]]) {
				$int += $romans[$str[$i]] - $romans[$str[$i-1]];
				$i--;
			} 
			else {
				$int += $romans[$str[$i]];
			}
			$i--;
		}
		return $int;
	}

	function intToRoman ($int, $romans) {
		$str = '';
		
		foreach ($romans as $key => $value) {
			if ($int > $value) {
				$times = $int / $value;
				$int = $int % $value;
				$times = intval($times);
				// I, X, C  No more than 3 in a row
				if ($times > 3 && ($key == 'I' || $key == 'X' || $key == 'C')) {
					while(key($romans) !== $key) next($romans);
					$prev_val = prev($romans);
					$prev_key = key($romans);
					$str .= $key . $prev_key; 
				} 
				else {
					for ($i=0 ; $i < $times; $i++) { 
				 		$str .= $key;
				 	} 		
			 	} 
			} elseif ($int == $value) {
			 			$int = $key;
			} else {
				// need to see this case
			}
		}

		return $str;
	}

/* TEST CASES */
	echo romanToInt($a,$romans);
	echo '<br/>';
	echo intToRoman(romanToInt($a,$romans), $romans);



/* FINAL RESULT */

	//echo intToRoman(romanToInt($a,$romans)+romanToInt($a,$romans), $romans);	
?>