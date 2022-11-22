<?php

// Chiffrement avec le code César
$alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
$tableauTexte = [];

// Chiffrement par le code César, en appliquant un décalage de +2 par rapport à l'alphabet
function chiffrement(array $texte, array $alphabet): array {
    $tableauChiffree = [];
    
    // - 1 pour correspondre à l'index d'un tableau partant de 0
    $longueurAlphabet = count($alphabet) - 1;
    // Parcourir le tableau de char
    for ($i = 0; $i < count($texte); $i++) {
        // Pour chaque char, rechercher la correspondance dans l'alphabet
        for ($j = 0; $j < count($alphabet); $j++) {
            
            // Quand valeurs égales, rajouter + 2 char
            if ($texte[$i] == $alphabet[$j]) {

                $position = $j + 2;
                // Position du tableau + 2 > 25
                if ($position > $longueurAlphabet) {
                    $position -= $longueurAlphabet;
                    // recommencer à partir de 0
                    $position -= 1;
                }

                $tableauChiffree[$i] = $alphabet[$position];
            }
        }
    }
    return $tableauChiffree;
}

function dechiffrement(array $texte, array $alphabet): array {
    $tableauDechiffree = [];
    
    // - 1 pour correspondre à l'index d'un tableau partant de 0
    $longueurAlphabet = count($alphabet) - 1;
    // Parcourir le tableau de char
    for ($i = 0; $i < count($texte); $i++) {
        // Pour chaque char, rechercher la correspondance dans l'alphabet
        for ($j = 0; $j < count($alphabet); $j++) {
            
            // Quand valeurs égales, enlever 2 char
            if ($texte[$i] == $alphabet[$j]) {

                $position = $j - 2;
                // Position du tableau - 2 < 0
                if ($position < 0) {
                    // Décompte depuis la longueur de l'alphabet
                    $position += $longueurAlphabet;
                    $position -= 1;
                }

                $tableauDechiffree[$i] = $alphabet[$position];
            }
        }
    }
    return $tableauDechiffree;
}

function recupererTexte(array $tableau): string {
    $texte = '';
    for ($i = 0; $i < count($tableau); $i++) {
        $texte .= $tableau[$i];
    }
    return $texte;
}

// Demander de saisir un texte
echo "Saisir un texte : ";
$texte = readline();

// Stocker le texte dans un tableau, lettre par lettre
for ($i = 0; $i < strlen($texte); $i++) {
    $tableauTexte[$i] = $texte[$i];
}

$texteChiffree = chiffrement($tableauTexte, $alphabet);
echo "Texte chiffré : " . recupererTexte($texteChiffree);
echo "\n";
$texteDechiffree = dechiffrement($texteChiffree, $alphabet);
echo "Texte déchiffré : " . recupererTexte($texteDechiffree);