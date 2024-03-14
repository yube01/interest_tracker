<?php
include "../Db/dbConnect.php";
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password != $cpassword){
        echo "Password not matched";
        header("Location: ../auth/register.php?msg=Password not matched");
        exit();
    }


    $checkEmail = "select * from users where username='$username'";
    $sqls = mysqli_query($conn, $checkEmail);
    $num = mysqli_fetch_assoc($sqls);
    if ($num > 0) {
        echo "username is already used";
        header("Location: ../auth/register.php?msg=Username already used");
        exit();
    }

            $checkEmail = "select * from users where email='$email'";
            $sqls = mysqli_query($conn, $checkEmail);
            $num = mysqli_fetch_assoc($sqls);
            if ($num > 0) {
                echo "Email is already used";
                header("Location: ../auth/register.php?msg=Email already used");
                exit();
            }



            $query = "insert into users (username,email,password,isAdmin) values('$username','$email','$password',0)";
            $sql = mysqli_query($conn, $query);

            if ($sql) {

                echo "user created";
                header("Location: ../auth/login.php?msg=User Created");
                
            } else {
                echo "not inserted";
                header("Location: ../auth/regitser.php?msg=SQL Error");
            }

}



?>