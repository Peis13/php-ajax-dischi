<?php
// Richiamo il database che poi andrò a convertire in json
include __DIR__ . '/database.php';

$database_json = json_encode($database);
header('Content-Type: application/json');
echo $database_json;
?>
