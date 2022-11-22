<?php

// TRIER UN TABLEAU DE VALEURS POSITIVES
$nombres = [12, 1, -2, 4, 9, 2, 29, -7];
// Résultat à obtenir [1, 2, 4, 9, 12, 29]

function triCroissant($nombres) {
    for ($i = 1; $i < count($nombres); $i++) {
        // Tant que le tableau n'est pas trié
        while ($nombres[$i] < $nombres[$i-1]) {
            // Comparer lequel des 2 nombres est le plus grand
            if ($nombres[$i] < $nombres[$i-1]) {
                // Si c'est le cas, intervertir les 2 nombres
                $min = $nombres[$i];
                $nombres[$i] = $nombres[$i-1];
                $nombres[$i-1] = $min;
            }
            // On contrôle de nouveau le tableau
            $i = 1;
        }
    }
    return $nombres;
}

print_r(triCroissant($nombres));