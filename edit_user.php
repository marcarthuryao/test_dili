<?php
include("sql_connect.php"); 
include("encode_decode.php");
$user_id = decode_user($_GET["id"]);       

$req = $PDO->prepare("DELETE from test.dilitrust_user where id=:id;");       
$req->execute(array('id'=>$user_id));
header("location: /manage_user.php");

?>