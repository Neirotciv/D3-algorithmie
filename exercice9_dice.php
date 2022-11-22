<?php

function rollTheDice() {
    echo "Lancer les dés\n";
    $yams = 0;

    for ($i = 0; $i < 5; $i++) {
        $result = rand(1, 5);
        if ($result == 5) {
            $yams++;
        }
        echo $result . ' ';
    }

    if($yams == 5) {
        echo "YAM'S !!!";
    }
}

do {
    rollTheDice();
    echo "\nRejouer ? (y/n)\n";
    $play = readline();
} while($play != 'n');