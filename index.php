<?php
require_once 'player.php';
require_once 'encounter.php';

$greg = new Player(400);
$jade = new Player(800);

echo sprintf(
    'Greg a %.2f%% chance de gagner face à Jade',
    Encounter::probabilityAgainst($greg->level, $jade->level) * 100
) . PHP_EOL;

Encounter::setNewLevel($greg->level, $jade->level, Encounter::RESULT_WINNER);
Encounter::setNewLevel($jade->level, $greg->level, Encounter::RESULT_LOSER);

echo sprintf(
    'Les niveaux des joueurs ont évolué vers %s pour Greg et %s pour Jade',
    $greg->level,
    $jade->level
);

exit(0);
