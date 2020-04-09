<?php
include("sql_connect.php");

if(!empty($_POST) && isset($_POST["username"])){
    //contre mesure vulnérabilité à XSS
    $data =array();
    $email = htmlspecialchars($_POST["username"]);
    $pass_wd = htmlspecialchars($_POST["passwd"]);

    //contre mesure vulnérabilité à SQLi (sql injection)


    $req = $PDO->prepare("SELECT A.id, A.display_name, A.email, A.pass, A.profil_id, B.label from test.dilitrust_user as A inner join test.dilitrust_role as B on A.profil_id=B.profil where A.email LIKE :email;");
    $req->execute(array('email'=>$email));

    if($req->rowCount()){
        
        while($result = $req->fetch(PDO::FETCH_ASSOC)){
            $data = $result;
            $pass_hash = $result["pass"];
        }
        if(!password_verify($pass_wd, $pass_hash)){
            $success = 'no_account';
            header("location: /accueil.php?success=".$success);
        }
        else{
            session_start();
            $_SESSION["id"]= $data["id"];
            $_SESSION["name"]= $data["display_name"];
            include("accueil.php");
        }
        
    }
    else{
        $success = 'no_account';
        header("location: /accueil.php?success=".$success);
    }

    // closing connection
    $PDO = null;
    //echo 'username = '.$_GET["username"].' et password = '.$_GET["passwd"];
}
else{
    header("location: /accueil.php");
}
?>


