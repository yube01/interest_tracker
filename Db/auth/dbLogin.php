<?php
include "../Db/dbConnect.php";
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = md5($_POST['password']);
   

    $checkEmail = "select * from users where username = '$username' or email = '$username' ";
    $sqls = mysqli_query($conn, $checkEmail);
    $num = mysqli_fetch_assoc($sqls);
    if ($num == 0) {
        echo "Username or Email does not exist";
        header("Location: ../auth/login.php?msg=Username or Email doesnot exist");
        exit();
    } 



            $query = "select * from users where '$username' IN (username,email) AND password = '$password' ";
            $sql = mysqli_query($conn, $query);
            $result = mysqli_fetch_assoc($sql);

            if ($result > 0) {

                echo "user logged";
                session_start();
                $_SESSION['id'] = $result['id'];
                $_SESSION['isAdmin'] = $result['isAdmin'];
                $_SESSION['name'] = "none";
             

                header("Location: ../home/home.php?msg=Login Sucess");
                exit();
            } else {
                echo "Password incorrect";
                header("Location: ../auth/login.php?msg=Password Incorrect");
            }

}

?>