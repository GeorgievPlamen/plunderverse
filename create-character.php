<?php
require_once("app/app.php");

$view_bag = [
    'title' => 'Character creation',
    'view' => 'create-character'
];

require_once("./views/layout.view.php");

if (isPost()) {
    $name = trim($_POST['name']);
    $ship = trim($_POST['ship']);
    $bio = trim($_POST['bio']);
    $vit = $_POST['vitality'];
    $str = $_POST['strength'];
    $cha = $_POST['charisma'];

    if ($vit + $str + $cha > 5) {
        printError("You can have a maximum of 5 total attributes!");
        return;
    }

    $stats = json_encode([
        'vitality' => $vit,
        'strength' => $str,
        'charisma' => $cha
    ]);

    $credits = 1000 + (500 * $cha);

    $db = connect();

    $smt = $db->prepare("INSERT INTO characters (name, ship, bio, stats, credits, lastUpdated) VALUES (:name, :ship, :bio, :stats, :credits, :lastUpdated)");

    $smt->execute([
        ':name' => $name,
        ':ship' => $ship,
        ':bio' => $bio,
        ':stats' => $stats,
        ':credits' => $credits,
        ':lastUpdated' => date("Y/m/d")
    ]);

    $smt = null;
    $db = null;

    redirect("index.php");
}
