<?php
echo "Hello world (php)!<br>";

$dbh = new PDO('mysql:host=phpdd.local;dbname=phpdd', 'phpdd', 'phpdd', array(
    PDO::ATTR_PERSISTENT => true
));

if (!$dbh) {
    die('Could not connect!');
}

echo 'Connected successfully to the database!';

var_dump($dbh);
