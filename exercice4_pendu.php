<?php

/**
 * Exercise 4 : Jeu du pendu
 */

function game() {
    $char = '';
    $word = 'developpeur';
    $attempt = 10;
    $loop = true;

    // The word that the player will have to complete in the form of _ _ _ _
    $userWord = wordToArray(wordToUnderscore($word)); 
    $wordToGuess = wordToArray($word);
    
    do {
        echo "\n";
        echo "Tentatives restante : " . $attempt . "\n";
        echo "Mot à deviner : " . arrayToString($userWord) . "\n";

        $char = userCharInput();
        $matchingCharacters = getPositionsOfCharInWord($wordToGuess, $char);

        if (count($matchingCharacters) > 0) {
            // If the letter has already been found, too bad for the player
            if (isCharExistInWord($userWord, $char)) {
                $attempt--;
            } else {
                $userWord = completeTheWord($userWord, $matchingCharacters);
            }
        } else {
            $attempt--;
        }

        if (isWordsEquals($wordToGuess, $userWord)) {
            echo "\nLe mot était bien " . $word;
            echo "\nVous avez gagné !\n";
            $loop = false;
        }

        if ($attempt < 0) {
            echo "\nLe mot à deviner était " . $word;
            echo "\nVous avez perdu :(\n";
            $loop = false;
        }
    } while ($loop);
}

/**
 * Return the word convert with a '_' instead of the chars
 *
 * @param string $word
 * @return string The word with _
 */
function wordToUnderscore(string $word): string {
    $convertedWord = '';
    for ($i = 0; $i < strlen($word); $i++) {
        $convertedWord .= '_';
    }
    return $convertedWord;
}

/**
 * The word is stored char by char in an array
 *
 * @param string $word
 * @return array 
 */
function wordToArray(string $word): array {
    $arrayWord = [];
    for ($i = 0; $i < strlen($word); $i++) {
        $arrayWord[$i] = $word[$i];
    }
    return $arrayWord;
}

/**
 * Concatenate array values ​​to get a string word
 *
 * @param array $charsArray An array containing characters
 * @return string 
 */
function arrayToString(array $charsArray): string {
    $word = '';
    for ($i = 0; $i < count($charsArray); $i++) {
        $word .= $charsArray[$i];
    }
    return $word;
}

/**
 * Returns the char entered by the user
 *
 * @return string
 */
function userCharInput(): string {
    echo "Saisir une lettre : ";
    $char = readline();
    return $char;
}

/**
 * Compare two words, the words must be the same length
 *
 * @param array $firstWord
 * @param array $secondWord
 * @return boolean true if matching
 */
function isWordsEquals(array $firstWord, array $secondWord): bool {
    for ($i = 0; $i < count($firstWord); $i++) {
        if ($firstWord[$i] == $secondWord[$i]) {
            continue;
        }
        return false;
    }
    return true;
}

/**
 * Check if a char exist in a word
 *
 * @param array $word
 * @param string $char
 * @return boolean
 */
function isCharExistInWord(array $word, string $char): bool {
    $array = getPositionsOfCharInWord($word, $char);
    if (count($array) != 0) {
        return true;
    }
    return false;
}

/**
 * Returns an array of char positions in a word
 *
 * @param array $word
 * @param string $char The char to look for in the word
 * @return array
 */
function getPositionsOfCharInWord(array $word, string $char): array {
    $positions = [];
    for ($i = 0; $i < count($word); $i++) {
        if ($word[$i] == $char) {
            $positions[$i] = $char;
        }
    }
    return $positions;
}

/**
 * Complete the empty word from the char positions
 *
 * @param array $emptyWord
 * @param array $positions
 * @return array The word with the new char
 */
function completeTheWord(array $emptyWord, array $positions): array {
    foreach($positions as $key => $value) {
        $emptyWord[$key] = $value;
    }
    return $emptyWord;
}

game();