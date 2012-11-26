<?php
	/**
	*  Class to calculate the score of n bowling frames
	*/
	class BowlingCalculator {

		private $score;
		private $rolls = array();
		private $current_roll = 0;

		function roll($pins) 
		{
			$this->score += $pins;
			$this->rolls[$this->current_roll++] = $pins;
		}

		function is_spare($frame_index)
		{
			return $this->rolls[$frame_index] + $this->rolls[$frame_index+1] == 10;
		}
		
		function score()
		{			
			$this->score = 0;	
			$frame_index = 0; 
			for ($frame=0; $frame < 10; $frame++) { 
				if ($this->rolls[$frame_index] == 10) // strike
				{
					$this->score += 10 + $this->rolls[$frame_index+1] + $this->rolls[$frame_index+2];
					$frame_index++;
				}	
				else if ($this->is_spare($frame_index)) // spare 
				{
					$this->score += 10 + $this->rolls[$frame_index+2];					
					$frame_index+= 2;
				} 
				else 
				{
					$this->score += $this->rolls[$frame_index] + $this->rolls[$frame_index+1];						
					$frame_index+= 2;
				}
			}			
			return $this->score;
		}
	}
?>