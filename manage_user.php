<?php
include("sql_connect.php"); 
include("encode_decode.php");       
?>

<!DOCTYPE html>
<html>
<head>
    <title>Demo Dilitrust</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
    <table id="users">
        <thead>
            <tr>
                <th style="text-align:center">Nom</th>
                <th style="text-align:center">email</th>
                <th style="text-align:center">password</th>
                <th style="text-align:center">Role</th>
                <th style="text-align:center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $req = $PDO->prepare("SELECT A.id, A.display_name, A.email, A.pass, A.profil_id, B.label from test.dilitrust_user as A inner join test.dilitrust_role as B on A.profil_id=B.profil;");       
                $req->execute();
                if($req->rowCount()){
                    while($result = $req->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr><td align='center'>".$result["display_name"]."</td><td align='center'>".$result["email"]."</td><td align='center'>".$result["pass"]."</td><td align='center'>".$result["label"]."</td><td align='center'><a href='edit_user.php?id=".encode_user($result["id"])."'>Delete</a></td></tr>";
                    }
                }
                else{
                    echo "<tr><td align='center'>Empty</td><td align='center'>Empty</td><td align='center'>Empty</td><td align='center'>Empty</td><td align='center'>No action</td></tr>";
                }
                

            ?>
        </tbody>
    </table>

    <br>
    <hr>
    <button onclick="window.location.href='/accueil.php'">Back home</button>
    <br><br>
    <hr>
    <p><b>Disconnect</b></p>
    <button onclick="window.location.href='/disconnect.php'">Disconnect</button>

</body>
</html>