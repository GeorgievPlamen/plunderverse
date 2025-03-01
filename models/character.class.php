<?php

class Character
{
    public $id;
    public $name;
    public $ship;
    public $bio;
    public $stats;
    public $credits;
    public $currentXp;
    public $XpToLevel;
    public $Level;
    public $lastUpdated;

    public function print()
    {
        echo $this->id;
        echo $this->name;
        echo $this->ship;
        echo $this->bio;
        echo $this->stats;
        echo $this->credits;
        echo $this->currentXp;
        echo $this->XpToLevel;
        echo $this->Level;
        echo $this->lastUpdated;
    }
}
