<?php

	function match($patern ,$string)
	{
		if (empty($patern) && empty($string))
		{
			return true;
		} else {
			if (strlen($patern) != strlen($string) && strpos($patern, '*') == 0){
				return false;
			}
			$i = 0;	
			$j = 0;		
			while ($i < strlen($patern)){												
				if ($patern[$i] == '*') {					
					if (empty($string[$j])) {
						return true;
					}
					while (!empty($string[$j]) && ($string[$j] == $patern[$i-1])) {
						$j++;
					}						
					if (empty($patern[$i+1]) && !empty($string[$j]) && ($string[$j] != $patern[$i-1])) {
						return false;
					}					
					$j--;					
				} else if (!empty($string[$j]) && $patern[$i] !== $string[$j] && $patern[$i] != '.') {
					return false;
				}

				$i++;
				$j++;
			} 
			return true;
		}
	}