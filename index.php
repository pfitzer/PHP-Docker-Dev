<?php

require_once "vendor/autoload.php";

echo "Hello world (php)!\n";

$link = mysqli_connect('mysql', getenv("MYSQL_USER"), getenv('MYSQL_PASSWORD'), getenv("MYSQL_DATABASE"), getenv("MYSQL_PORT"));

if (!$link) {
    die('Could not connect!');
}

echo 'Connected successfully to the database!';

var_dump($link);

mysqli_close($link);
