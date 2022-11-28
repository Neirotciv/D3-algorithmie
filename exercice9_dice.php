<?php

/**
 * Exercise 9 : Jeu de dés Yam’s
 */

function checkEquality(array $dices): bool {
    $firstDice = $dices[0];
    for ($i = 0; $i < count($dices); $i++) {
        if ($firstDice != $dices[$i]) {
            return false;
        } 
    }
    return true;
}

function rollTheDice(bool $cheat = false): void {
    echo "Roll the dices\n";
    $totalDices = 5;
    $dices = [];

    for ($i = 0; $i < $totalDices; $i++) {
        $dice = rand(1, 6);
        if ($cheat == true) { $dice = 6; }
        echo $dice . ' ';
        $dices[] = $dice;
    }

    if (checkEquality($dices)) {
        echo "YAM'S";
    }
}

$cheating = false;

do {
    rollTheDice($cheating);
    echo "\nRejouer ? (y/n)\n";

    $play = readline();

    if ($play == 'c') { 
        $cheating = true; 
        $play = readline(); 
    }
} while($play != 'n');