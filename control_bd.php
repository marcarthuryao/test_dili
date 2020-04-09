<?php
include("sql_connect.php");

//contre mesure vulnérabilité à XSS
$data =array();
$email = htmlspecialchars($_POST["username"]);
$pass_wd = htmlspecialchars($_POST["passwd"]);

//contre mesure vulnérabilité à SQLi (sql injection)


$req = $PDO->prepare("SELECT * from test.dilitrust_user where email LIKE :email;");
$req->execute(array('email'=>$email));

if($req->rowCount()){
    
    while($result = $req->fetch(PDO::FETCH_ASSOC)){
        $data = $result;
        $pass_hash = $result["pass"];
    }
    if(!password_verify($pass_wd, $pass_hash)){
        $success = 'no_account';
        header("location: /index.php?success=".$success);
    }
    
}
else{
    $success = 'no_account';
    header("location: /index.php?success=".$success);
}


// closing connection
$PDO = null;
//echo 'username = '.$_GET["username"].' et password = '.$_GET["passwd"];
?>

<!DOCTYPE html>
<html>
<body>
        <div style="margin-left:25px">
            <h2><center>Profil :  </center></h2>
            <br><br>
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
            <br>
            <div>
                <label for="">Diplôme en cours : </label>
                <span><?php echo $data["diplome"]; ?></span>
            </div>
            <br><br>
            <hr>
            <p><b>Disconnect</b></p>
            <button onclick="window.location.href='/index.php'">Disconnect</button>
        </div>


</body>
</html>
