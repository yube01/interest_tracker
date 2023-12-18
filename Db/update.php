<?php

include "dbConnect.php";
include "../session/session.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    
        $insertQuery = "update star set isStar = '0' where stdSav = '$id' and userId = '$userId'";
        mysqli_query($conn, $insertQuery);
        echo 'Updated';
} 


// for savind and fixed table
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sf'])) {
    $id = mysqli_real_escape_string($conn, $_POST['sf']);
    
        $insertQuery = "update star set isStar = '0' where sf = '$id' and userId = '$userId'";
        mysqli_query($conn, $insertQuery);
        echo 'Updated';
} 

?>
