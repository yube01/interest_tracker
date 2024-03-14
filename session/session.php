<?php
    session_start();

    if (isset($_SESSION['id'])) {

        $userId =  $_SESSION['id'];
        $isAdmin = $_SESSION['isAdmin'];
        $bank = $_SESSION['name'];
    } else {
        header("location:../auth/login.php");
    }

?>