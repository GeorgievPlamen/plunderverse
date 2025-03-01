<?php

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

if (isPost()) {
  $id = $_POST["id"];

  if (!isset($id)) {
    return;
  }

  $db = connect();

  if ($db == null) {
    return;
  }

  $smt = $db->prepare("DELETE FROM characters WHERE id=:id");

  $smt->execute([
    ':id' => $id
  ]);

  redirect("index.php");
}

require_once("./views/layout.view.php");
