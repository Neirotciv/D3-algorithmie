<?php

/**
 * Exercise 1 : Min / Max
 * GET THE SMALLEST VALUE IN AN ARRAY
 */

// Declare an array of numbers to extract a value from it
$numbers = [12, 1, 4, 9, 29, 2];

function getTheSmallestValue($numbers) {
	// No values to compare, take temporary the first element of the array
	$smallestValue = $numbers[0];
												
	for ($i = 0; $i < count($numbers); $i++) { 	// For all values in the array
		if ($numbers[$i] < $smallestValue) { 	// Compare with the smallest value
			$smallestValue = $numbers[$i]; 		// The smallest value is replaced by the lower one
		}
	}
	// For loop is done, the smallest value can be returned
	return $smallestValue;
}

/**
 * Exercise 1 : Min / Max
 * GET TTHE GREATEST VALUE IN AN ARRAY
 */

function getTheGreatestValue($numbers) {
	// No values to compare, take temporary the first element of the array
	$greatestValue = $numbers[0];
    
	// Parcourir tout le tableau
	for ($i = 0; $i < count($numbers); $i++) {	// For all values in the array
		if ($numbers[$i] > $greatestValue) {	// Compare with the greatest value
			$greatestValue = $numbers[$i];		// The greatest value is replaced by the greatest
		}
	}
	// For loop is done, the greatest value can be returned
	return $greatestValue;
}

echo 'smallest value : ' . getTheSmallestValue($numbers);
echo "\n";
echo 'greatest value : ' . getTheGreatestValue($numbers);