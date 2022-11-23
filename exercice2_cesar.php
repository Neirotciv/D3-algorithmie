<?php

// Chiffrement avec le code César

$alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
$textArray = [];

// Chiffrement par le code César, en appliquant un décalage de +2 par rapport à l'alphabet
function encryption(array $text, array $alphabet, bool $decrypt = false): array {
    $encrypted = [];
    $offset = $decrypt ? -2 : 2;

    // - 1 pour correspondre à l'index d'un tableau partant de 0
    $alphabetLength = count($alphabet) - 1;
    // Parcourir le tableau de char
    for ($i = 0; $i < count($text); $i++) {
        // Pour chaque char, rechercher la correspondance dans l'alphabet
        for ($j = 0; $j < count($alphabet); $j++) {
            
            // Quand valeurs égales, rajouter pu retirer 2 char
            if ($text[$i] == $alphabet[$j]) {

                $position = $j + $offset;
                // Position du tableau + 2 > 25
                if ($position > $alphabetLength) {
                    $position -= $alphabetLength;
                    // recommencer à partir de 0
                    $position -= 1;
                }

                $encrypted[$i] = $alphabet[$position];
            }
        }
    }
    return $encrypted;
}

/**
 * arrayToString Get string from array, concatenate array elements
 *
 * @param  array $array
 * @return string
 */
function arrayToString(array $array): string {
    $string = '';
    for ($i = 0; $i < count($array); $i++) {
        $string .= $array[$i];
    }
    return $string;
}

// Demander de saisir un texte
echo "Saisir un texte : ";
$text = readline();

// Stocker le texte dans un tableau, lettre par lettre
for ($i = 0; $i < strlen($texte); $i++) {
    $textArray[$i] = $text[$i];
}

$encryptedText = encryption($textArray, $alphabet);
echo "Texte chiffré : " . arrayToString($encryptedText);
echo "\n";
$decryptedText = encryption($encryptedText, $alphabet, true);
echo "Texte déchiffré : " . arrayToString($decryptedText);
echo "\n";