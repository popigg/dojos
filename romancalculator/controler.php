<?php 

	define('I', 1);
	define('V', 5);
	define('X', 10);
	define('L', 50);
	define('C', 100);
	define('D', 500);
	define('M', 1000);


	$a = $_POST['A'];
	$b = $_POST['B'];

	function romanToInt($string) {
		$i = strlen($string)-1;
		$int = 0;
		$int_i = 0;
		$int_j = 0;
		while ($i >= 0) {
			switch (strtoupper($string[$i])) {
				case 'I':
					$int_i = I;
					break;
				case 'V':
					$int_i = V;
					break;
				case 'X':
					$int_i = X;
					break;
				case 'L':
					$int_i = L;
					break;
				case 'C':
					$int_i = C;
					break;
				case 'D':
					$int_i = D;
					break;
				case 'M':
					$int_i = M;
					break;
			}		
			$j = $i - 1;
			if (isset($string[$j]) && ($j >= 0)) {
				switch (strtoupper($string[$j])) {
					case 'I':
						$int_j = I;
						break;
					case 'V':
						$int_j = V;
						break;
					case 'X':
						$int_j = X;
						break;
					case 'L':
						$int_j = L;
						break;
					case 'C':
						$int_j = C;
						break;
					case 'D':
						$int_j = D;
						break;
					case 'M':
						$int_j = M;
						break;
				}
			}
			if ($int_j < $int_i) {
				$int_i = $int_i - $int_j;
				$i--;
			}
			$int = $int + $int_i;
			$int_i = 0;
			$int_j = 0;			
			$i--;
		}

		return $int;
	}

	function intToRoman($int) {	
		$roman_numbers = array( array('M', 1000),
								array('D',500),
								array('C',100),
								array('L',50),
								array('X',10),
								array('V',5),
								array('I',1));
		$res = '';
		foreach ($roman_numbers as $key => $value) {			
			if ($int > $value[1]) {
				$times = $int / $value[1];
				$int = $int % $value[1];
				//echo $times . '<br />';
				$times = intval($times);
				echo $times . '<br />';
				if ($times > 3 && ($value[0] == 'I' || $value[0] == 'X' || $value[0] == 'C')) {
					$res .= $value[0]; 
				} else {
					for ($i=0 ; $i < $times; $i++) { 
				 		$res .= $value[0];
				 	} 		
			 	}
			}
		}
		$string = $res;
		return $string;
	}


	/*$first = romanToInt($a);
	$second = romanToInt($b);
	$total = $first + $second;
	echo $total .'<br />';*/

	echo intToRoman($a);

?>