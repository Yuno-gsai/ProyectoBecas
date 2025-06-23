<?php
session_start();
$_SESSION = [];
session_destroy();

// Redirigimos a la página de login.
header('Location: /auth/login.php');
exit();
?>