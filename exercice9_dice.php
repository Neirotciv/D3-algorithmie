<?php

/**
 * Exercise 9 : Jeu de dés Yam’s
 */

 /**
  * Checks if all values ​​in an array are equal
  *
  * @param array $dices A table where each value represents a dice
  * @return boolean Return true if all values are equals
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

/**
 * Writes 5 random digits representing the 
 * value of dices in a table and checks if they are equal
 *
 * @param boolean $cheat True if you want to cheat
 * @return void
 */
function rollTheDice(bool $cheat = false): void {
    echo "Roll the dices\n";
    $totalDices = 5;
    $dices = [];

    for ($i = 0; $i < $totalDices; $i++) {
        // Random value between 1 and 6
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

// Game loop, n for quit, c for cheating
do {
    rollTheDice($cheating);
    echo "\nRejouer ? (y/n)\n";
    
    $cheating = false;
    $play = readline();

    if ($play == 'c') { 
        $cheating = true; 
    }
} while($play != 'n');