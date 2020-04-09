<?php
include("sql_connect.php");
include("encode_decode.php");
$user_id = decode_user($_POST["user_id"]);

$req = $PDO->prepare("SELECT A.id, A.display_name, A.email, A.pass, A.profil_id, B.label from test.dilitrust_user as A inner join test.dilitrust_role as B on A.profil_id=B.profil where A.id=:id;");
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
            <label for="">Profile : </label>
            <span><?php echo $data["label"]; ?></span>
        </div>
        <br>
        <div>
            <label for="">Nom : </label>
            <span><?php echo $data["display_name"]; ?></span>
        </div>
        <br>
        <div>
            <label for="">email : </label>
            <span><?php echo $data["email"]; ?></span>
        </div>
        <br>
        <hr>
        <button onclick="window.location.href='/accueil.php'">Back home</button>
        <br><br>
        <hr>
        <p><b>Disconnect</b></p>
        <button onclick="window.location.href='/disconnect.php'">Disconnect</button>
    </div>


</body>
</html>