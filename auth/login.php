<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="./style/landing.css">
    <link rel="stylesheet" href="./style/register.css">
    <script src="./hideToast.js"></script>
    <title>Login</title>
</head>
<body>
<?php include "../Components/navbar.php" ?>
    <div class="container1">

         <div class="logins">
            <img src="../assets/logo5.jpg" alt="">
        </div>

        <div class="register">
            <h1>User Login</h1>
        <form method="POST">
            <div class="inputs">
                <img src="../assets/user.png" alt="">
                <input required type="text" name="username" placeholder="Username or Email">
            </div>
            
            <div class="inputs">
            <img src="../assets/password.png" alt="">
                <input required type="password" name="password" placeholder="Password">
            </div>
            
            <input type="submit" name="submit" class="button" >
        
        </form>
        </div>
        
    </div>

    <?php
        if(isset($_GET['msg'])){
            ?>
    <div class="toast" id="toast">
        <?php
            
            $msg =  $_GET['msg'];
            echo $msg;
            ?>
                </div>
                <?php
        }
    ?>
    <?php 
    include "../Db/auth/dbLogin.php";
    ?>
    <script>

</body>
</html>