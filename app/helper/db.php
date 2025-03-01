<?php

function connect()
{
    try {
        return new PDO("mysql:dbname=plunderverse;host=localhost;port=8889", "root", "root");
    } catch (PDOException $e) {
        echo $e;
    }
}
