<?php
require_once 'player.php';
require_once 'encounter.php';

$greg = new Player(400);
$jade = new Player(800);

echo sprintf(
    'Greg a %.2f%% chance de gagner face à Jade' . PHP_EOL,
    Encounter::probabilityAgainst($greg->getLevel(), $jade->getLevel()) * 100
);

$gregLevel = $greg->getLevel();
$jadeLevel = $jade->getLevel();

Encounter::setNewLevel($gregLevel, $jadeLevel, Encounter::RESULT_WINNER);
Encounter::setNewLevel($jadeLevel, $gregLevel, Encounter::RESULT_LOSER);

$greg->setLevel($gregLevel);
$jade->setLevel($jadeLevel);

echo sprintf(
    'Les niveaux des joueurs ont évolué vers %s pour Greg et %s pour Jade' . PHP_EOL,
    $greg->getLevel(),
    $jade->getLevel()
);
