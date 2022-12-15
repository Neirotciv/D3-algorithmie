<?php

// TOUR DE HANOI

$towers = [
    [0, 0, 0, 0],   // 1 - Intermédiaire/Arrivée
    [1, 2, 3, 4],   // 0 - Départ
    [0, 0, 0, 0]    // 2 - Intermédiaire/Arrivée
];


/**
 * checkTower Controler que la tour est vide si le tableau
 * ne contient que des 0
 *
 * @param  mixed $tower Index du tableau towers
 * @return bool
 */
function checkTower(array $tower): bool {
    for ($i = 0; $i < count($tower); $i++) {
        if ($i != 0 && $tower[$i] > $tower[$i-1]) {
            return false;
        }
    }
    return true;
}

/**
 * checkTopDisk Parcours le tableau de la fin au début
 * et cherche la première valeur qui n'est pas 0.
 *      
 *
 * @param  array $tower 
 * @return int
 */
function getTopDisk(array $tower): int {
    for ($i = count($tower) - 1; $i >= 0; $i--) {
        if ($tower[$i] != 0) {
            return $tower[$i];
        }
    }
    return 0;
}

/**
 * moveDisk Déplacer la valeur du disque d'un tableau à un autre
 *
 * @param  mixed $start tableau de départ
 * @param  mixed $end tableau d'arrivée
 * @param  mixed $disk valeur du disque dans le tableau (top disk)
 * @return void
 */
function moveDisk(array $towers, int $start, int $end, int $disk): array {
    for ($i = 0; $i < count($towers[$start]); $i++) {
        if ($towers[$start][$i] == $disk) {
            $towers[$start][$i] = 0;
        }
    }

    for ($j = 0; $j < count($towers[$end]); $j++) {
        if ($towers[$end][$j] == 0) {
            $towers[$end][$j] = $disk;
            break;
        }
    }
    return $towers;
}

/**
 * Vérifier si la valeur est plus petite
 * si = 0, positionnement possible
 */
function checkIfMovable($tower, $disk) {
    // Partir de la fin
    for ($i = 0; count($tower); $i++) {
        if ($i == 0) {
            
        } 
    }
}

print_r($towers);

$towers = moveDisk($towers, 0, 2, 4);

print_r($towers);