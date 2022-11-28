<?php

/**
 * Exercise 4 : Jeu du pendu
 */

// Remplir un tableau de _ de la longueur du mot
function initMotVide(string $motADeviner): array {
    $tableauMot = [];
    
    for ($i = 0; $i < strlen($motADeviner); $i++) {
        $tableauMot[$i] = '_';
    }
    
    return $tableauMot;
}

// Transformer le mot en tableau
function initMot(string $motADeviner): array {
    $tableauMot = [];
    
    for ($i = 0; $i < strlen($motADeviner); $i++) {
        $tableauMot[$i] = $motADeviner[$i];
    }
    
    return $tableauMot;
}

function afficherMot(array $tableauMot): string {
    $mot = '';
    for ($i = 0; $i < count($tableauMot); $i++) {
        $mot .= $tableauMot[$i];
    }
    return $mot;
}

function afficherInfos(int $tentatives, array $mot): void {
    echo "\n";
    echo "Tentatives restante : " . $tentatives . "\n";
    echo "Mot à deviner : " . afficherMot($mot) . "\n";
}

function sautDeLigne(): void {
    echo "---------------------------";
}

// Saisie de la lettre par l'utilisateur
function saisie(): string {
    echo "Saisir une lettre : ";
    $lettre = readline();
    return $lettre;
}

// Controller la saisie
function controlerLettre(array $motADeviner, string $lettre): array {
    $positions = [];

    for ($i = 0; $i < count($motADeviner); $i++) {
        if ($motADeviner[$i] == $lettre) {
            $positions[$i] = $lettre;
        }
    }

    return $positions;
}

// Compléter le mot
function completeMot(array $motADeviner, array $positionsLettres): array {
    foreach($positionsLettres as $key => $value) {
        $motADeviner[$key] = $value;
    }
    return $motADeviner;
}

function verifierSiGagne(array $motADeviner, array $motTableau): bool {
    $count = 0;
    for ($i = 0; $i < count($motADeviner); $i++) {
        if ($motADeviner[$i] == $motTableau[$i]) {
            $count++;
        }
    }
    if ($count == count($motADeviner)) {
        return true;
    }
    return false;
}

function jeu() {
    global $dessins;

    $tentatives = 10;
    $loop = true;
    $lettre = '';

    $mot = 'developpeur';
    $motADeviner = initMotVide($mot);
    $motTableau = initMot($mot);

    do {
        afficherInfos($tentatives, $motADeviner);
        $lettre = saisie();
        sautDeLigne();

        $positions = controlerLettre($motTableau, $lettre);

        // La lettre existe
        if (count($positions) > 0) {
            $motADeviner = completeMot($motADeviner, $positions);
        } else {
            $tentatives--;
        }

        $gagner = verifierSiGagne($motADeviner, $motTableau);

        if ($gagner) {
            echo "\nYou have won\n";            
            $loop = false;
        }
        if ($tentatives < 1) {
            echo "\nYou lost\n";  
            $loop = false;
        }
    } while ($loop);
}

jeu();