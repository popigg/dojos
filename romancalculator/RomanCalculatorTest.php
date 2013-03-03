<?php
require_once __DIR__ . '/RomanCalculator.php';

class RomanCalculatorTest extends PHPUnit_Framework_TestCase
{	
	public function providerSimpleRomansToInt()
	{
		return array(
			array(1,    'I'),
			array(5,    'V'),
			array(10,   'X'),
			array(50,   'L'),
			array(100,  'C'),
			array(500,  'D'),
			array(1000, 'M'),
			);
	}

	/**
	 * @dataProvider providerSimpleRomansToInt
	 */
	public function testSimpleRomansToInt ($expected, $given)
	{
		$this->assertEquals($expected ,RomanCalculator::simpleRomanToInt($given), 'Error in simpleRomanToInt');
	}

	public function providerComplexRomansToInt()
	{
		return array(
			array(2,  'II'),
			array(3,  'III'),
			array(4,  'IV'),
			array(6,  'VI'),
			array(9,  'IX'),
			array(16, 'XVI'),
			array(55,  'LV'),
			array(40, 'XL'),
			array(70, 'LXX'),
			array(92, 'XCII'),
			array(900, 'CM'),
			);
	}

	/**
	 * @dataProvider providerComplexRomansToInt
	 */
	public function testComplexRomansToInt($expected, $given) 
	{
		$this->assertEquals($expected ,RomanCalculator::complexRomansToInt($given), 'Error in combinedRomansToInt');
	}

	public function providerSimpleIntToRoman()
	{
		return array(
			array('I', 1),
			array('V', 5),
			array('X', 10),
			array('L', 50),
			array('C', 100),
			array('D', 500),
			array('M', 1000),
			);
	}

	/**
	 * @dataProvider providerSimpleIntToRoman
	 */
	public function testSimpleIntToRoman($expected, $given)
	{
		$this->assertEquals($expected ,RomanCalculator::simpleIntToRoman($given), 'Error in simpleIntToRoman');
	}

	public function providerComplexIntToRoman()
	{
		return array(
			array('II',      2),
			array('III',     3),
			array('IV',      4),
			array('VI',      6),
			array('VIII',    8),
			array('IX',      9),
			array('XV',    	15),
			array('XIV',    14),
			array('XVII',   17),
			array('XVIII',  18),
			array('XIX',    19),
			array('XX',    	20),
			array('XXI',    21),
			array('XL',     40),
			array('VL',     45),
			array('XLVI',   46),
			array('LXVI',   66),
			array('LXXIX',  79),
			array('LXXXVI', 86),
			array('XC',     90),
			);
	}

	/**
	 * @dataProvider providerComplexIntToRoman
	 */
	public function testComplexIntToRoman($expected, $given)
	{
		$this->assertEquals($expected ,RomanCalculator::complexIntToRoman($given), 'Error in complexIntToRoman');
	}
} 
