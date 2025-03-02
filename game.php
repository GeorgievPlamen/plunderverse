<?php

require_once("app/app.php");

$view_bag = [
    'title' => '',
    'view' => 'game'
];

if (!isset($_GET["id"])) {
    printError("You must select a character, please go back to the selection screen.");
    $view_bag['view'] = 'error';
}

$playerId = $_GET["id"];

$character = loadCharacter($playerId);

$scene = loadStory($character->id);

require_once("./views/layout.view.php");

if (isPost()) {
    $response = file_get_contents(APP_PATH . 'docs/contentResponse.json');

    $actionKey = $_POST["action_key"];
    echo $actionKey;
    echo $response;
}

function loadStory($characterId)
{
    $db = connect();

    if ($db == null) {
        return [];
    }

    $query = $db->query("SELECT * FROM story WHERE characterId=$characterId");

    $data = $query->fetchAll(PDO::FETCH_CLASS, 'Story');

    if ($data == null) {
        $smt = $db->prepare("INSERT INTO story (characterId) VALUES (:characterId)");

        $smt->execute([
            'characterId' => $characterId
        ]);

        $smt = null;
    }

    $db = null;

    if (!isset($data[0]->story)) {
        return loadStartingScene();
    }

    return $data[0];
}


function loadCharacter($id)
{
    $db = connect();

    if ($db == null) {
        return [];
    }

    $query = $db->query("SELECT * FROM characters WHERE id=$id");

    $data = $query->fetchAll(PDO::FETCH_CLASS, 'Character');

    $db = null;

    return $data[0];
}

function loadStartingScene()
{
    $randomNumber = rand(1, 100);
    $scene = 1;

    if ($randomNumber > 25 && $randomNumber <= 50) {
        $scene = 2;
    }

    if ($randomNumber > 50 && $randomNumber <= 75) {
        $scene = 3;
    }

    if ($randomNumber > 75) {
        $scene = 4;
    }

    $db = connect();

    if ($db == null) {
        return [];
    }

    $query = $db->query("SELECT * FROM startingOptions WHERE id=$scene");

    $data = $query->fetchAll(PDO::FETCH_CLASS, 'Scene');

    $db = null;

    return $data[0];
}
