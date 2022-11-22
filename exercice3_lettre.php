<?php

// Exercice 3 : Recherche lettre
$tableauMot = [];

// Demander la saisie d’un mot
echo "Saisir un mot : ";
$mot = readline();

// Stocker le texte dans un tableau, lettre par lettre
for ($i = 0; $i < strlen($mot); $i++) {
    $tableauMot[$i] = $mot[$i];
}

// Demander la saisie d’une lettre
echo "Saisir une lettre : ";
$lettre = readline();


function rechercherLettre(array $mot, string $lettre): int {
    $count = 0;
    
    // Chercher le nombre d'occurence de la lettre
    for ($i = 0; $i < count($mot); $i++) {
        if ($mot[$i] == $lettre) {
            $count++;
        }
    }

    return $count;
}

echo 'La lettre ' . $lettre . ' apparait ' . rechercherLettre($tableauMot, $lettre) . ' fois';