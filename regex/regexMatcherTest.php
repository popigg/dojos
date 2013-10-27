<?php

require_once('regexMatcher.php');

class regexMatcherTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @dataProvider provider
	 */
	function test($match, $patern, $string)
	{
		if ($match) {
			$this->assertTrue(match($patern, $string));
		} else {
			$this->assertFalse(match($patern, $string));
		}
	}

	function provider() {
		return array(
				array(true, '', ''),
				array(true, 'a', 'a'),
				array(false, 'a', 'b'),
				array(false, 'a', 'ab'),
				array(true, '.', 'a'),
				array(true, '.a', 'ba'),
				array(true, 'a.c', 'abc'),
				array(true, 'a*', ''),
				array(true, 'a*', 'a'),
				array(false, 'a*', 'b'),
				array(false, 'a*', 'ab'),				
				array(true, 'a*', 'aaaa'),
				array(true, 'a*b', 'aaaab'),
				array(true, 'ba*', 'baaa'),
				array(false, 'a*bc', 'aaab'), // fail
				array(true,'ab*c', 'abc'),
				array(true, 'ab*c', 'abbbbbbc'),
				array(true, 'a*b', 'b'), // fail
				array(true, 'ba*', 'b'),
				array(false, 'ba*', 'bc'),
				array(true, '.*', ''),
				array(true, '.*', 'aaaa'), // fail
				array(false, '.*.', ''), // fail
			);
	}
}