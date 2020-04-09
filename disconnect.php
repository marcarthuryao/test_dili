<?php
include("sql_connect.php");
session_start();
session_destroy();
$PDO = null;
header("location: /accueil.php");
?>