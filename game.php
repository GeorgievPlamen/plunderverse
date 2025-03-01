<?php

require_once("app/app.php");

$view_bag = [
    'title' => '',
    'view' => 'game'
];



if (isGet()) {
    echo $_GET["id"];
}

require_once("./views/layout.view.php");
