<?php
session_start();
if(!isset($_SESSION['userID'])){
    $_SESSION['userID'] = 1;
    header("Location: /index.php");
    exit();
}
?>

<h1>this is de register page</h1>
