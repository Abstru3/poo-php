<?php
declare(strict_types=1);

define('RESULT_WINNER', 1);
define('RESULT_LOSER', -1);
define('RESULT_DRAW', 0);
define('RESULT_POSSIBILITIES', [RESULT_WINNER, RESULT_LOSER, RESULT_DRAW]);

class Encounter
{
    public static function probabilityAgainst(int $levelPlayerOne, int $againstLevelPlayerTwo): float
    {
        return 1 / (1 + (10 ** (($againstLevelPlayerTwo - $levelPlayerOne) / 400)));
    }

    public static function setNewLevel(int &$levelPlayerOne, int $againstLevelPlayerTwo, int $playerOneResult)
    {
        if (!in_array($playerOneResult, RESULT_POSSIBILITIES)) {
            trigger_error(sprintf('Invalid result. Expected %s', implode(' or ', RESULT_POSSIBILITIES)));
        }

        $levelPlayerOne += (int)(32 * ($playerOneResult - self::probabilityAgainst($levelPlayerOne, $againstLevelPlayerTwo)));

    }
}
