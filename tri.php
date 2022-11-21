<?php

// RETROUVER LA PLUS PETITE VALEUR DANS UN TABLEAU D'ENTIERS POSITIFS

// Déclaration d'un tableau de nombres à trier
$nombres = [12, 1, 4, 9, 2, 29];

function plusPetiteValeur($nombres) {
	//  N'ayant pas de valeurs à comparer, on choisi le premier élément du tableau
	$plusPetitevaleur = $nombres[0];
	// Parcourir tout le tableau
	for ($i = 0; $i < count($nombres); $i++) {
		// Et comparer avec la plus petite valeur
		if ($nombres[$i] < $plusPetitevaleur) {
			// La plus petite valeur est remplacé par celle inférieur
			$plusPetitevaleur = $nombres[$i];
		}
	}
	// Le tableau est parcouru, et la plus petite valeur à été gardée en mémoire
	return $plusPetitevaleur;
}


// TRIER UN TABLEAU DE VALEURS POSITIVES
$nombres = [12, 1, 4, 9, 2, 29];
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


// TOUR DE HANOI
// Chaque 
$towers = [
    [1, 2, 3, 4],
    [],
    []
];

function towerOfHanoi() {

}

towerOfHanoi();