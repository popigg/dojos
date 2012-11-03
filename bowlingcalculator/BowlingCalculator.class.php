<?php
	/**
	*  Class to calculate the score of n bowling frames
	*/
	class BowlingCalculator {
		
		function bowling_score_calculator ($score)
		{
			$result = 0;

			for ($i=0; $i < strlen($score); $i++) { 
				$result += $score[$i];
			}
			return $result;
		}
	}
?>