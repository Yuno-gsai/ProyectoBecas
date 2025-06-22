<?php
session_start();
//agregar sesion
if(!isset($_SESSION['userID'])){
    $_SESSION['userID'] = 1;
    header("Location: /index.php");
    exit();
}
?>

<h1>this is de register page</h1>
