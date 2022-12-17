<?php

/**
 * Jeu des bâtonnets
 */

$sticks = 20;

// The player must start first
do {
    echo "\nBatons restants " . $sticks . "\n";
    
    // Player takes sticks between 1 and 3
    echo "Joueur ";
    $playerPickedUp = readline();
    $sticks -= $playerPickedUp;
    
    // For the computer to win, the sum of the sticks picked 
    // up in a round must be equal to 4
    $botPickedUp = 4 - $playerPickedUp;
    echo "Ordinateur " . $botPickedUp . "\n";
    $sticks -= $botPickedUp;

} while($sticks != 0);
echo "L'ordinateur a gagné";