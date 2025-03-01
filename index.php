<?php

require_once("models/character.class.php");
require_once("app/app.php");

$view_bag = [
  'title' => 'Character Selection',
  'view' => 'index',
  'script' => 'js/selectCharacter.js'
];

// Load characters
$characters = loadCharacters();

function loadCharacters()
{
  $db = connect();

  if ($db == null) {
    return [];
  }

  $query = $db->query("SELECT * FROM characters");

  $data = $query->fetchAll(PDO::FETCH_CLASS, 'Character');

  $db = null;

  return $data;
}

require_once("./views/layout.view.php");
