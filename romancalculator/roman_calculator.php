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
			 			$str .= $key;
			 			$int = $int - $value;
			} else {
				// need to see this case
				if ($key == 'M' || $key == 'C' || $key == 'X') {
					$keys = array_keys($romans);
					foreach ($keys as $k => $v) {
						if ($v == $key) {
							$j = $k;
						}
					}
					//evaluate from the 2 next values;
					$j = $j + 2;					
					for ($i=$j; $i < sizeof($keys); $i++) {
						if ($value-$romans[$keys[$i]] <= $int) {
							$int = $int - ($value-$romans[$keys[$i]]);
							$str .= $keys[$i] . $key;							
						}	
					}				
				} elseif ($key == 'D' || $key == 'L' || $key == 'V') {
					$keys = array_keys($romans);
					foreach ($keys as $k => $v) {
						if ($v == $key) {
							$j = $k;
						}
					}
					//evaluate from the 2 next values;
					$j = $j + 1;					
					for ($i=$j; $i < sizeof($keys); $i++) {
						if ($value-$romans[$keys[$i]] <= $int) {
							$int = $int -	 ($value-$romans[$keys[$i]]);
							$str .= $keys[$i] . $key;							
						}	
					}		
				}
			}
		}

		return $str;
	}

/* TEST CASES */
	//echo romanToInt($a,$romans);
	//echo '<br/>';
	//echo intToRoman(romanToInt($a,$romans), $romans);



/* FINAL RESULT */

	$total = romanToInt($a,$romans)+romanToInt($b,$romans);
	echo $total . '<br />';
	echo intToRoman($total, $romans);	
?>















