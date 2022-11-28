<?php

/**
 * Exercise 1 : Min / Max
 */

// Declare an array of numbers to extract a value from it
$numbers = [12, 1, 4, 9, 29, 2];

/**
 * Get the smallest value in an array
 * 
 * @param array $numbers An array of numbers 
 * @return int The smallest value
 */
function getTheSmallestValue(array $numbers): int {
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
 * Get the greatest value in an array
 * 
 * @param array $numbers An array of numbers 
 * @return int The greatest value
 */
function getTheGreatestValue(array $numbers): int {
	// No values to compare, take temporary the first element of the array
	$greatestValue = $numbers[0];
    
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