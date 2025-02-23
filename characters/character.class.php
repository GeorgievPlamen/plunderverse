<?php
class Character
{
    public $id;
    public $name;
    public $vitality;
    public $strength;
    public $charisma;
    public $credits;
    public $hp;

    public function __construct($name, $vitality, $strength, $charisma)
    {
        $this->name = $name;
        $this->vitality = $vitality;
        $this->strength = $strength;
        $this->charisma = $charisma;
        $this->credits = 500 + ($charisma * 50);
        $this->hp = 10 + (2 * $vitality);
    }

    public function saveToDatabase($conn)
    {
        $stmt = $conn->prepare("INSERT INTO characters (name, vitality, strength, charisma, credits, hp) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siiiii", $this->name, $this->vitality, $this->strength, $this->charisma, $this->credits, $this->hp);
        $stmt->execute();
    }
}
