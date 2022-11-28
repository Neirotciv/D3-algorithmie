<?php

/**
 * Exercise 3 : Recherche d'une lettre
 */

 /**
 * Store the word in an array, letter by letter
 *
 * @param string $word The word to turn into an array
 * @return array An array of characters
 */
function wordToArrayChar(string $word): array {
    $array = [];
    for ($i = 0; $i < strlen($word); $i++) {
        $array[$i] = $word[$i];
    }
    return $array;
}

/**
 * Find and count a letter in a word
 *
 * @param array $word       The word to analyse
 * @param string $letter    The letter to find
 * @return integer
 */
function getNumberOfLetterInWord(array $word, string $letter): int {
    $count = 0;
    for ($i = 0; $i < count($word); $i++) {
        if ($word[$i] == $letter) {     // If the letter match
            $count++;
        }
    }
    return $count;
}

echo "Enter a word : ";
$word = readline();
// The word must be in an array
$wordArray = wordToArrayChar($word);

echo "Enter a letter : ";
$letter = readline();

echo 'The letter ' . $letter . ' match ' . getNumberOfLetterInWord($wordArray, $letter) . ' time(s)';