<?php

require_once("models/character.class.php");
require_once("app/app.php");

$view_bag = [
  'title' => 'Character Selection',
  'view' => 'index'
];

// Load characters
$characters = loadCharacters();

require_once("./views/layout.view.php");

function loadCharacters()
{
  $db = connect();

  if ($db == null) {
    return [];
  }

  $query = $db->query("SELECT * FROM characters");

  return $query->fetchAll(PDO::FETCH_CLASS, 'Character');
}
