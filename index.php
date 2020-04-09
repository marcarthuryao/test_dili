<!DOCTYPE html>
<html>
<body>
    <form action="/control_bd.php" method="post">
        <div style="margin-left:25px">
            <h2><center>Welcome to our session test</center></h2>
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
    <br>
    <hr>
    <br>
    <div style="margin-left:25px">
        <p>No account yet? Please register here!</p>
        <button onclick="window.location.href='/register.php'">Register Student</button>
    </div>

</body>
</html>
