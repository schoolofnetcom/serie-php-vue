<?php

$pdo = require __DIR__ . '/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $response = require __DIR__ . '/src/save_user.php';
} else if ($_SERVER['REQUEST_METHOD'] === 'GET' and isset($_GET['id'])) {
    $response = require __DIR__ . '/src/get_user.php';
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $response = require __DIR__ . '/src/list_users.php';
}

header('Content-Type: application-json');

echo json_encode($response);
