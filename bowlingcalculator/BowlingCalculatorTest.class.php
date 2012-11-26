<?php

	require_once('BowlingCalculator.class.php');

	class BowlingCalculatorTest extends PHPUnit_Framework_TestCase
	{
		protected $bowlingCalculator;

	    public function setUp() 
	    {
	        $this->bowlingCalculator = new BowlingCalculator();
	    }

	    public function tearDown() 
	    {
	        // your code here
	    }

	    private function roll_many($counter, $pins)
	    {
	    	for ($i=0; $i < $counter; $i++) { 
	    		$this->bowlingCalculator->roll($pins);	    			
	    	}
	    }

	    private function roll_spare()
	    {
	    	$this->bowlingCalculator->roll(5);
	    	$this->bowlingCalculator->roll(5);
	    }

	    function testZero() 
	    {
	    	$this->roll_many(20, 0);	
	    	$this->assertEquals(0, $this->bowlingCalculator->score(), 'Error in Zeros');
	    }

	    function testAllOnes()
	    {	    	
	    	$this->roll_many(20, 1);
	    	$this->assertEquals(20, $this->bowlingCalculator->score(), 'Error in All Ones');
	    }

	    function testSpare()
	    {
	    	$this->roll_spare();
	    	$this->bowlingCalculator->roll(3);
	    	$this->roll_many(17, 0);
	    	$this->assertEquals(16, $this->bowlingCalculator->score(), 'Error in Spare');

	    }

	    function testStrike()
	    {
	    	$this->bowlingCalculator->roll(10); // Strike
	    	$this->bowlingCalculator->roll(3);
	    	$this->bowlingCalculator->roll(4);
	    	$this->roll_many(17, 0);
	    	$this->assertEquals(24, $this->bowlingCalculator->score(), 'Error in Strike');
	    }
	}
	

?>