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

	    function testSimple() {
	    	$this->assertEquals(63, $this->bowlingCalculator->bowling_score_calculator('31415390107133238009'),
	    	'Not equal variables');
	    }

	    function testSpare() {
	    	$this->assertEquals(73, $this->bowlingCalculator->bowling_score_calculator('91415390107133238009'), 
			'Not equal variables');
	    }

	    function testStrikes() {
	    	
	    }
	}
	

?>