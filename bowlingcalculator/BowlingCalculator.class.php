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

		private function is_spare($frame_index)
		{
			return $this->rolls[$frame_index] + $this->rolls[$frame_index+1] == 10;
		}

		private function is_strike($frame_index)
		{
			return $this->rolls[$frame_index] == 10;
		}

		private function sum_balls_frame($frame_index)
		{
			return $this->rolls[$frame_index] + $this->rolls[$frame_index+1];
		}

		private function spare_bonus($frame_index)
		{
			return 10 + $this->rolls[$frame_index+2];
		}

		private function strike_bonus($frame_index)
		{
			return 10 + $this->rolls[$frame_index+1] + $this->rolls[$frame_index+2];
		}
		
		function score()
		{			
			$this->score = 0;	
			$frame_index = 0; 
			for ($frame=0; $frame < 10; $frame++) { 
				if ($this->is_strike($frame_index)) // strike
				{
					$this->score += $this->strike_bonus($frame_index);
					$frame_index++;
				}	
				else if ($this->is_spare($frame_index)) // spare 
				{
					$this->score += $this->spare_bonus($frame_index);					
					$frame_index+= 2;
				} 
				else 
				{
					$this->score += $this->sum_balls_frame($frame_index);						
					$frame_index+= 2;
				}
			}			
			return $this->score;
		}
	}
?>