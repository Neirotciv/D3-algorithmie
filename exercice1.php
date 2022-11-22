<?php
// RETROUVER LA PLUS PETITE VALEUR DANS UN TABLEAU

// Déclaration d'un tableau de nombres à trier
$nombres = [12, 1, 4, 9, 2, 29];

function plusPetiteValeur($nombres) {
	// N'ayant pas de valeurs à comparer, on choisi le premier élément du tableau
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

// RETROUVER LA PLUS GRANDE VALEUR DANS UN TABLEAU

function plusGrandeValeur($nombres) {
	// N'ayant pas de valeurs à comparer, on choisi le premier élément du tableau
	$plusGrandevaleur = $nombres[0];
    
	// Parcourir tout le tableau
	for ($i = 0; $i < count($nombres); $i++) {
		// Et comparer avec la plus petite valeur
		if ($nombres[$i] > $plusGrandevaleur) {
			// La plus petite valeur est remplacé par celle inférieur
			$plusGrandevaleur = $nombres[$i];
		}
	}
	// Le tableau est parcouru, et la plus petite valeur à été gardée en mémoire
	return $plusGrandevaleur;
}

echo plusGrandeValeur($nombres);