<?php

/**
 * Exercise 2 : Chiffrement César
 */

/**
 * Encrypt a text with an offset of +2 characters in the alphabet, can be decrypt
 * with the $decrypt arg to true
 * 
 * @param array     $text       The text to encrypt or decrypt
 * @param boolean   $decrypt    False by default, true for decrypt the text
 * @return array The encrypted text 
 */
function encryption($text, $decrypt = false): array {
    $alphabet = [' ', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
    $alphabetLength = count($alphabet) - 1; // - 1 to match the index of an array starting from 0
    $outputText = [];
    $offset = 2;
    
    if ($decrypt == true) { $offset = -2; }             // Change the offset to -2 if we want to decrypt

    // Read characters from the text
    for ($i = 0; $i < count($text); $i++) {
        // For each char, find the match in the alphabet
        for ($j = 0; $j < count($alphabet); $j++) {

            if ($text[$i] == $alphabet[$j]) {           // When values ​​are equal, add or remove 2 char
                $position = $j + $offset;               // Position in array + 2 or -2
                if ($position > $alphabetLength) {      // If we exceed the length of the alphabet
                    $position -= $alphabetLength;
                    $position -= 1;                     // Back to index 0
                }
                $outputText[$i] = $alphabet[$position]; // Get the char with offset
            }
        }
    }
    return $outputText;
}

/**
 * Get string from array, concatenate array elements
 *
 * @param array $array
 * @return string
 */
function arrayCharToString(array $array): string {
    $string = '';
    for ($i = 0; $i < count($array); $i++) {
        $string .= $array[$i];
    }
    return $string;
}

/**
 * Store text in an array, letter by letter
 *
 * @param string $text The text to turn into an array
 * @return array An array of characters
 */
function textToArrayChar(string $text): array {
    $array = [];
    for ($i = 0; $i < strlen($text); $i++) {
        $array[$i] = $text[$i];
    }
    return $array;
}

echo "Enter text : ";
$text = readline();

// The text must be in an array
$textArray = textToArrayChar($text);

$encryptedText = encryption($textArray);
echo "Encrypted text : " . arrayCharToString($encryptedText);
echo "\n";

$decryptedText = encryption($encryptedText, true);
echo "Decrypted text : " . arrayCharToString($decryptedText);
echo "\n";