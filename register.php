<!DOCTYPE html>
<html>
<body>
    <form action="/register_data.php" method="post">
        <div style="margin-left:25px">
            <h2><center>Time to register !</center></h2>
            <?php if(isset($_GET["success"]) && $_GET["success"]=="exist_mail"){
                echo "<span style='color:red'>This email already exists.<br>Please try another email address<br></span>";
            }
            if(isset($_GET["error"])){
                echo "<span style='color:red'>Field ".$_GET["error"]." are ncorrectly filled.<br></span>";
            }?>
            <div>
                <label for="nom">owner * : </label>
                <input type="text" id="name" name="name" value="" required>
            </div>
            <br>
            <div>
                <label for="email">email * : </label>
                <input type="text" id="email" name="email" value="" required>
            </div>
            <br>
            <div>
                <label for="passwd">Password * : </label>
                <input type="password" id="passwd" name="passwd" value="" required>
            </div>
            <br>
            <input type="submit" value="Finish">
        </div>
    </form>

</body>
</html>
