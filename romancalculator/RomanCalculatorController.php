<?php
	require_once 'RomanCalculator.php';
	$total = RomanCalculator::complexRomansToInt($_POST['A']) + 
				RomanCalculator::complexRomansToInt($_POST['B']);
				
	echo RomanCalculator::complexIntToRoman((int)$total);
