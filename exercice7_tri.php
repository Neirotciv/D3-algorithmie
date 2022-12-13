<?php

/**
 * Exercise 7 : Tri de note
 */

/**
 * Sort an array of values, negative or not, in ascending order
 *
 * @param array $numbers The array of numbers to sort
 * @return array The sorted array
 */
function sortAscending(array $numbers): array {
    for ($i = 0; $i < count($numbers); $i++) {
        if ($i > 0) {
            // As long as the array is not sorted
            while ($numbers[$i] < $numbers[$i-1]) {
                // Compare which of the 2 numbers is greater
                if ($numbers[$i] < $numbers[$i-1]) {
                    // If so, swap the 2 numbers with temp variable
                    $min = $numbers[$i];
                    $numbers[$i] = $numbers[$i-1];
                    $numbers[$i-1] = $min;
                }
                // Check the table again by returning the index to 1
                $i = 1;
            }
        }
    }
    return $numbers;
}

$numbers = [12, 1, -2, 4, 9, 2, 29, -7];
print_r(sortAscending($numbers));
// Result [-7, -2, 1, 2, 4, 9, 12, 29]