<?php
require_once __DIR__ . '/Database/DatabaseConnection.php';
$database = new DatabaseConnection();
echo $database->getConnection();
?>

<h1>Hola</h1>