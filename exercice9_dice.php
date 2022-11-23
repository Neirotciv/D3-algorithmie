<?php

function checkEquality(array $dices): bool {
    $firstDice = $dices[0];
    for ($i = 0; $i < count($dices); $i++) {
        if ($firstDice != $dices[$i]) {
            return false;
        } 
    }
    return true;
}

function rollTheDice(): void {
    echo "Lancer les dés\n";
    $totalDices = 5;
    $dices = [];

    for ($i = 0; $i < $totalDices; $i++) {
        $dice = rand(1, 2);
        echo $dice . ' ';
        $dices[] = $dice;
    }

    if (checkEquality($dices)) {
        echo "YAM'S";
    }
}

do {
    rollTheDice();
    echo "\nRejouer ? (y/n)\n";
    $play = readline();
} while($play != 'n');