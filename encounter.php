<?php
// Pas de déclaration de type strict pour PHP 7.0.3
class Encounter
{
    // Déclaration des constantes de classe
    const RESULT_WINNER = 1;
    const RESULT_LOSER = -1;
    const RESULT_DRAW = 0;
    const RESULT_POSSIBILITIES = [self::RESULT_WINNER, self::RESULT_LOSER, self::RESULT_DRAW];

    // Méthode statique pour calculer la probabilité
    public static function probabilityAgainst($levelPlayerOne, $againstLevelPlayerTwo)
    {
        return 1 / (1 + (10 ** (($againstLevelPlayerTwo - $levelPlayerOne) / 400)));
    }

    // Méthode statique pour mettre à jour le niveau du joueur
    public static function setNewLevel(&$levelPlayerOne, $againstLevelPlayerTwo, $playerOneResult)
    {
        if (!in_array($playerOneResult, self::RESULT_POSSIBILITIES)) {
            trigger_error(sprintf('Résultat invalide. Attendu %s', implode(' ou ', self::RESULT_POSSIBILITIES)), E_USER_ERROR);
        }

        $levelPlayerOne += (int)(32 * ($playerOneResult - self::probabilityAgainst($levelPlayerOne, $againstLevelPlayerTwo)));
    }
}
