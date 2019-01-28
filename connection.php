<?php

$pdo = new PDO('mysql:dbname=php_vue;host=localhost', 'root', '', [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);

return $pdo;
