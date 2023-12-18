<?php
include "dbConnect.php";
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);

    if($password != $cpassword){
        echo "Password not matched";
        exit();
    }


    $checkEmail = "select * from users where username='$username'";
    $sqls = mysqli_query($conn, $checkEmail);
    $num = mysqli_fetch_assoc($sqls);
    if ($num > 0) {
        echo "username is already used";
        exit();
    }

            $checkEmail = "select * from users where email='$email'";
            $sqls = mysqli_query($conn, $checkEmail);
            $num = mysqli_fetch_assoc($sqls);
            if ($num > 0) {
                echo "Email is already used";
                exit();
            }



            $query = "insert into users (username,email,password) values('$username','$email','$password')";
            $sql = mysqli_query($conn, $query);

            if ($sql) {

                echo "user created";
                header("Location: ../auth/login.php?msg=Register_Sucess");
                
            } else {
                echo "not inserted";
            }

}



?>