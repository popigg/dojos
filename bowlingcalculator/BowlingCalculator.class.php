<?php
	/**
	*  Class to calculate the score of n bowling frames
	*/
	class BowlingCalculator {
		
		function bowling_score_calculator ($score)
		{
			$result = 0;
			$i = 0;

			while ($i < strlen($score)) { 				
				if ($i > 0 && ($score[$i-1] + $score[$i] == 10)) {					
					$score[$i+1] = 2 * $score[$i+1];					
				}
				$result += $score[$i];						
				$i++;				
			}
			return $result;
		}
	}
?>