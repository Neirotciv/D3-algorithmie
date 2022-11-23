<?php

// TOUR DE HANOI
// Chaque 
$towers = [
    [1, 2, 3, 4],   // 0 - Départ
    [0, 0, 0, 0],   // 1 - Intermédiaire
    [0, 0, 0, 0]    // 2 - Arrivée
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
        if ($tower[$i] != 0) {
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

function isTowerOk(array $tower): bool {
    return true;
}


print_r($towers);
$count = 0;
do {
    echo "TOUR " . $count . "\n";
    
    for ($i = 0; $i < 2; $i++) {

        $topDisk = getTopDisk($towers[$i]);

        for ($j = 0; $j < 2; $j++) {

            $isEmpty = checkTower($towers[$j]);

            if ($isEmpty) {
                $towers = moveDisk($towers, $i, $j, $topDisk);
            }
        }
    }

    $count++;
    print_r($towers);
} while ($count < 5);