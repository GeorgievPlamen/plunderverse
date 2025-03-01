<?php

require_once("models/character.class.php");

$view_bag = [
  'title' => 'Character Selection',
  'view' => 'index'
];

// Load players
$characters = loadCharacters();

require_once("./views/layout.view.php");



function loadCharacters()
{
  $db = connect();

  if ($db == null) {
    return [];
  }

  $query = $db->query("SELECT * FROM characters");

  $data = $query->fetchAll(PDO::FETCH_CLASS, 'Character');

  for ($i = 0; $i < count($data); $i++) {
    echo $data[$i]->print();
  }

  return $data;
}

function connect()
{
  try {
    return new PDO("mysql:dbname=plunderverse;host=localhost;port=8889", "root", "root");
  } catch (PDOException $e) {
    echo $e;
  }
}
