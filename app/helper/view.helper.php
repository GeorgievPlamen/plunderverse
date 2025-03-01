<?php

function isPost()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function isGet()
{
    return $_SERVER['REQUEST_METHOD'] === 'GET';
}


function printError($msg)
{
    echo '<p style="color: red">' . $msg . '</p>';
}

function redirect($url)
{
    header("Location: $url");
}
