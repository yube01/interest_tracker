<?php
include "../Db/dbConnect.php";
if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
   

    $checkUser = "select * from saving_fixed where name = '$username'";
    $sqls = mysqli_query($conn, $checkUser);
    $num = mysqli_fetch_assoc($sqls);
    if ($num == 0) {
        echo "Bank name does not exist";
        header("Location: ../auth/bankLogin.php?msg=Bank name doesnot exist");
        exit();
    } 



            $query = "select * from saving_fixed where name = '$username' and code = '$password' ";
            $sql = mysqli_query($conn, $query);
            $result = mysqli_fetch_assoc($sql);

            if ($result > 0) {

                echo "Bank user logged";
                session_start();
                $_SESSION['id'] = "none";
                $_SESSION['isAdmin'] = "none";
                $_SESSION['name'] = $result['name'];
             

                header("Location: ../home/home.php?msg=Login Sucess");
                exit();
            } else {
                echo "password incorrect";
                header("Location: ../auth/bankLogin.php?msg=Password Incorrect");
            }

}

?>