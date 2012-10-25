<?php
/**
 * MIT License
 * ===========
 *
 * Copyright (c) 2012 Pablo Gomez popigg@gmail.com
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the
 * "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish,
 * distribute, sublicense, and/or sell copies of the Software, and to
 * permit persons to whom the Software is furnished to do so, subject to
 * the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
 * MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY
 * CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE
 * SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @category   [ Category ]
 * @package    [ Package ]
 * @subpackage [ Subpackage ]
 * @author     Pablo Gomez popigg@gmail.com
 * @copyright  2012 Pablo Gomez.
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 * @version    [ Version ]
 * @link       http://[ Your website ]
 */
	require_once('PrimeFactors.class.php');

	class PrimeFactorsTest extends PHPUnit_Framework_TestCase
	{
		protected $prime_factor;
	    public function setUp()
	    {
	        $this->prime_factor = new PrimeFactors();
	    }
	
	    public function tearDown()
	    {
	        // your code here
	    }

	    protected function assertEqualsArrays($expected, $actual, $message) {
    		$this->assertTrue(count($expected) == count(array_intersect($expected, $actual)), $message);
		}

	    public function testOne() {
	    	$this->assertEqualsArrays(array(), $this->prime_factor->generate(1), 'Equals array TRUE');
	    }
	}

?>