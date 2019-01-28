<?php

$query = 'SELECT * FROM users;';

$stmt = $pdo->prepare($query);
$stmt->execute();

return [
    'msg' => 'Todos os registros',
    'data' => $stmt->fetchAll(\PDO::FETCH_ASSOC),
];