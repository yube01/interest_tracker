<?php
    session_start();

    if (isset($_SESSION['id'])) {

        $userId =  $_SESSION['id'];
        $isAdmin = $_SESSION['isAdmin'];
    } else {
        header("location:../auth/login.php");
    }

?>