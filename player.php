<?php
class Player
{
    private $level;

    public function __construct($level)
    {
        $this->setLevel($level);
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel($level)
    {
        if ($level < 0) {
            trigger_error('Le niveau doit être positif.', E_USER_ERROR);
        }
        $this->level = $level;
    }
}
