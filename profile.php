<?php
include("sql_connect.php");
include("encode_decode.php");
$user_id = decode_user($_POST["user_id"]);

$req = $PDO->prepare("SELECT * from test.dilitrust_user where id=:id;");
$req->execute(array('id'=>$user_id));        
while($result = $req->fetch(PDO::FETCH_ASSOC)){
    $data = $result;
}        

?>

<!DOCTYPE html>
<html>
<body>
    <h2><center>Profile :  </center></h2>
    <br><br>
    <div style="margin-left:25px">
        <hr>
        <h3>Welcome <?php echo $data["display_name"]; ?></h3>
        <br><br>
        <div>
            <label for="">Nom : </label>
            <span><?php echo $data["display_name"]; ?></span>
        </div>
        <br>
        <div>
            <label for="">email : </label>
            <span><?php echo $data["email"]; ?></span>
        </div>
        <br><br>
        <hr>
        <p><b>Disconnect</b></p>
        <button onclick="window.location.href='/disconnect.php'">Disconnect</button>
    </div>


</body>
</html>