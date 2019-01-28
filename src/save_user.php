<?php


$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email');

if (!$name) {
    http_response_code(422);
    return [
        'msg' => 'Nome é obrigatório'
    ];
}

if (!$email) {
    http_response_code(422);
    return [
        'msg' => 'Email é obrigatório'
    ];
}

$query = 'INSERT INTO users (name, email) VALUES (?, ?);';

$stmt = $pdo->prepare($query);
$stmt->execute([
    $name,
    $email
]);

return [
    'msg' => 'Criando registro',
    'data' => [
        'id' => $pdo->lastInsertId()
    ]
];