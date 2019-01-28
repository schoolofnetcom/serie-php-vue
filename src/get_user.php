<?php

$query = 'SELECT * FROM users WHERE id=?;';

$stmt = $pdo->prepare($query);
$stmt->execute([
    filter_input(INPUT_GET, 'id')
]);

return [
    'msg' => 'Um registro',
    'data' => $stmt->fetch(\PDO::FETCH_ASSOC),
];