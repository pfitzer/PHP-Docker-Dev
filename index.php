<?php
  echo "Hello world (php)!\n";

$link = mysqli_connect('phpdd.local', 'phpdd', 'phpdd', 'phpdd', 3306);

if (!$link) {
  die('Could not connect!');
}

echo 'Connected successfully to the database!';

var_dump($link);

mysqli_close($link);
