<?php
include "dbConnect.php";
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
   

    $checkEmail = "select * from users where username = '$username' or email = '$username' ";
    $sqls = mysqli_query($conn, $checkEmail);
    $num = mysqli_fetch_assoc($sqls);
    if ($num == 0) {
        echo "Username or Email does not exist";
        exit();
    } 



            $query = "select * from users where '$username' IN (username,email) AND password = '$password' ";
            $sql = mysqli_query($conn, $query);
            $result = mysqli_fetch_assoc($sql);

            if ($result > 0) {

                echo "user logged";
                session_start();
                

                // header("Location: ../home/home.php?msg=Login_Sucess");
                exit();
            } else {
                echo "password incorrect";
            }

}

?>