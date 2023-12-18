<?php
    session_start();

    if (isset($_SESSION['id'])) {

        $userId =  $_SESSION['id'];
        
    } else {
        header("location:../auth/login.php");
    }

?>