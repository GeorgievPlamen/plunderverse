<?php
require_once("app/app.php");

$view_bag = [
    'title' => 'Character creation',
    'view' => 'create-character'
];

require_once("./views/layout.view.php");

if (isPost()) {
    echo $_POST['name'];
    echo $_POST['ship'];
    echo $_POST['bio'];
    $vit = $_POST['vitality'];
    $str = $_POST['strength'];
    $cha = $_POST['charisma'];

    $stats = $vit + $str + $cha;

    echo $stats;

    if ($stats > 5) {
        printError("You can have a maximum of 5 total attributes!");
    }
}
