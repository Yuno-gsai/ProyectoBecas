<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/Database/DatabaseConnection.php';

try {
    $database = new DatabaseConnection();
    echo "<h1>Conexión exitosa</h1>";
} catch (Exception $e) {
    echo "<h1>Error de conexión:</h1>";
    echo "<pre>" . $e->getMessage() . "</pre>";
}
?>
