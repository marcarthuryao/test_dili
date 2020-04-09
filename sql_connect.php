<?php
//$PDO = new PDO('mysql:host=localhost','root','504633');

try{
    $PDO = new PDO('mysql:host=172.17.0.2','root','504633');
    $PDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
}catch(PDOException $e){
    echo 'Connexion impossible';
}
/*
$servername = "localhost";
$username = "pma";
$password = "504633";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
*/
