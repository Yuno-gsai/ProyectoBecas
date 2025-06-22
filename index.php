<?php
session_start();

if (!isset($_SESSION['userID'])) {
    header("Location: /auth/login.php");
    exit();
}

require_once 'Views/dashboard.php';
