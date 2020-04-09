<?php
include("sql_connect.php");
// Contre mesure vulnérabilité XSS
$nom = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$pass_wd = htmlspecialchars($_POST["passwd"]);
$profil = htmlspecialchars($_POST["profile"]);
$passwd_h = password_hash($pass_wd, PASSWORD_DEFAULT);

//vulnérabilités controle sur les champs
$nom = filter_var($nom, FILTER_SANITIZE_STRING);
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$test =true;
$error=[];

if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
    $test=false;
    $error[] = "email";
}
    

if($test){
    $req = $PDO->prepare("SELECT * from test.dilitrust_user where email LIKE :email;");
    $req->execute(array('email'=>$email));
    
    if($req->rowCount()){
        $success = 'exist_mail';
        $PDO=null;
        header("location: /register.php?success=".$success);
    }
    else{
        //contre mesure vulnérabilités SQLi (sql injection)
        $req = $PDO->prepare("INSERT INTO test.dilitrust_user (display_name, email, pass, profil_id) values (:nom,:email,:pass,:profil_id);");
        $req->execute(array('nom'=>$nom, 'email'=>$email, 'pass'=>$passwd_h,'profil_id'=>$profil));
    
        $success = 'created';
        $PDO=null;
        header("location: /accueil.php?success=".$success);
    }
}
else{
    $PDO=null;
    $error = implode(', ', $error);
    header("location: /register.php?error=".$error);
}




die();
?>