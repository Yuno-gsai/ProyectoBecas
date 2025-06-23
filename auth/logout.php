<?php
session_start();
$_SESSION = [];
session_destroy();

// Redirigimos a la página de login.
header('Location: __DIR__ . /../auth/login.php');
exit();
?>