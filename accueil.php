<?php
include("encode_decode.php");
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Demo Dilitrust</title>
</head>
<body>
    <?php if(!$_SESSION["id"]){ ?>
    <h1>Welcome to my application demo</h1>
        <form action="/index.php" method="post">
            <div style="margin-left:25px">
                <h2><center>Are you a user ?</center></h2>
                <?php if(isset($_GET["success"]) && $_GET["success"]=="created"){
                    echo "<span style='color:green'>User created</span>";
                } else if(isset($_GET["success"]) && $_GET["success"]=="no_account"){
                    echo "<span style='color:red'>User doesn't exist or bad email/password</span>";
                } ?>
                <div>
                    <label for="username">Login (email) : </label>
                    <input type="text" id="username" name="username" value="" required>
                </div>
                <br>
                <div>
                    <label for="passwd">Password : </label>
                    <input type="password" id="passwd" name="passwd" value="" required>
                </div>
                <br>
                <div>
                    <input type="submit" value="Connect">
                </div>
            </div>
        </form>
        <br><hr>
        <form action="/index.php" method="post">
            <div style="margin-left:25px">
                <h2><center>Or an administrator ?</center></h2>
                <div>
                    <label for="username">Login (email) : </label>
                    <input type="text" id="username" name="username" value="" required>
                </div>
                <br>
                <div>
                    <label for="passwd_ad">Password : </label>
                    <input type="password" id="passwd_ad" name="passwd_ad" value="" required>
                </div>
                <br>
                <div>
                    <input type="submit" value="Connect">
                </div>
            </div>
        </form>
        <hr>
        <br>
        <div>
            <p>No account yet? Please register here!</p>
            <button onclick="window.location.href='/register.php'">Register</button>
        </div>
    <?php }
    else{ ?>
        <form action="/profile.php" method="post">
            <div style="margin-left:25px">
                <h2><center>Welcome <?php echo $data["display_name"]; ?></center></h2>
                <div>
                    <label for="">Registered as : </label>
                    <span><?php echo $data["label"]; ?></span>
                </div>
                <br>
                <div>
                    <input type="hidden" name="user_id" value="<?php echo encode_user($data["id"]); ?>">
                    <input type="submit" value="Profile">
                </div>
            </div>
        </form>
        <br><br>
        <hr>
        <p><b>Disconnect</b></p>
        <button onclick="window.location.href='/disconnect.php'">Disconnect</button>
    <?php }
    ?>
</body>
</html>
