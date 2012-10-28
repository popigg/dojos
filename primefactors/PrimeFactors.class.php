<?php
/**
 * MIT License
 * ===========
 *
 * Copyright (c) 2012 Pablo Gomez <[Your email]>
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
 * @author     Pablo Gomez <[Your email]>
 * @copyright  2012 Pablo Gomez.
 * @license    http://www.opensource.org/licenses/mit-license.php  MIT License
 * @version    [ Version ]
 * @link       http://[ Your website ]
 */

	class PrimeFactors {

		function generate($int) {
			$primes = array();
			if ($int > 1) {
				if ($int%2 == 0) {
				array_push($primes, 2);
				$int = $int/2;
			}
			if ($int > 1) {
				array_push($primes, $int);
			}
			}
			return $primes;
		}

	}
?>