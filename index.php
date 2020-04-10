<?php
include("sql_connect.php");
session_start();

if(!empty($_POST) && isset($_POST["username"])){
    //contre mesure vulnérabilité à XSS
    $data =array();
    $email = htmlspecialchars($_POST["username"]);
    //identify error
    $flag=0;
    
    //contre mesure vulnérabilité à SQLi (sql injection)
    if(isset($_POST["passwd"])){
        $pass_wd = htmlspecialchars($_POST["passwd"]);
        $req = $PDO->prepare("SELECT A.id, A.display_name, A.email, A.pass, A.profil_id, B.label from test.dilitrust_user as A inner join test.dilitrust_role as B on A.profil_id=B.profil where (A.email LIKE :email and A.profil_id!=:profil);");
        $req->execute(array('email'=>$email,'profil'=>'3'));
        $flag=1;
    }
        
    if(isset($_POST["passwd_ad"])){
        $pass_wd = htmlspecialchars($_POST["passwd_ad"]);
        $req = $PDO->prepare("SELECT A.id, A.display_name, A.email, A.pass, A.profil_id, B.label from test.dilitrust_user as A inner join test.dilitrust_role as B on A.profil_id=B.profil where (A.email LIKE :email and A.profil_id=:profil);");
        $req->execute(array('email'=>$email,'profil'=>'3'));
        $flag=2;
    }
    

    if($req->rowCount()){
        
        while($result = $req->fetch(PDO::FETCH_ASSOC)){
            $data = $result;
            $pass_hash = $result["pass"];
        }
        if(!password_verify($pass_wd, $pass_hash)){
            if($flag==1)
                $success = 'no_account_user';
            if($flag==2)
            $success = 'no_account_admin';
            header("location: /accueil.php?success=".$success);
        }
        else{
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
else if (isset($_SESSION["id"])){
    $req = $PDO->prepare("SELECT A.id, A.display_name, A.email, A.pass, A.profil_id, B.label from test.dilitrust_user as A inner join test.dilitrust_role as B on A.profil_id=B.profil where (A.id =:id);");
    $req->execute(array('id'=>$_SESSION["id"]));
    while($result = $req->fetch(PDO::FETCH_ASSOC)){
        $data = $result;
    }
    include("accueil.php");
}
else{
    header("location: /accueil.php");
}
?>


