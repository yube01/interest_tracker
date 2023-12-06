<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="./style/landing.css">
    <link rel="stylesheet" href="./style/register.css">
    <title>Register</title>
</head>
<body>
    <nav>
        <div class="logo">
            <a href="landing.php"><img src="../assets/weblogo.png" alt="" ></a>
        </div>
        <div class="auth">
            <a href="login.php"><span>Login</span></a>
            <a href="register.php"><span>Register</span></a>
        </div>
    </nav>
    <div class="container1">
        <div class="register">
            <h1>Register</h1>
        <form method="POST">
            <div class="inputs">
                <img src="../assets/user.png" alt="">
                <input required type="text" name="username" placeholder="Username">
            </div>
            <div class="inputs">
            <img src="../assets/email.png" alt="">
                <input required type="email" name="email" placeholder="Email">
            </div>
            <div class="inputs">
            <img src="../assets/password.png" alt="">
                <input required type="password" name="password" placeholder="Password">
            </div>
            <div class="inputs">
            <img src="../assets/password.png" alt="">
                <input required type="password" name="cpassword" placeholder="Confirm Password">
            </div>
            <input type="submit" name="submit" class="button" >
        
        </form>
        </div>
        <div class="registers">
            <img src="../assets/logo4.jpg" alt="">
        </div>
    </div>
</body>
</html>