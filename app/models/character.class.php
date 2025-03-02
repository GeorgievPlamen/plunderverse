<?php

class Character
{
    public $id;
    public $name;
    public $ship;
    public $bio;
    public $stats;
    public $credits;
    public $hp;
    public $xp;
    public $level;
    public $lastUpdated;

    public function print()
    {
        echo $this->id;
        echo $this->name;
        echo $this->ship;
        echo $this->bio;
        echo $this->stats;
        echo $this->credits;
        echo $this->hp;
        echo $this->xp;
        echo $this->level;
        echo $this->lastUpdated;
    }
}
