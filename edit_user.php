<?php
include("sql_connect.php"); 
include("encode_decode.php");
$admin_id = $_GET["ad_dili"];
$user_id = decode_user($_GET["id"]);       

$req = $PDO->prepare("DELETE from test.dilitrust_user where id=:id;");       
$req->execute(array('id'=>$user_id));

if($admin_id==$user_id)
    header("location: /disconnect.php");
else
    header("location: /manage_user.php");

?>