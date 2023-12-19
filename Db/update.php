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

//for personal loan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pdid'])) {
    $id = mysqli_real_escape_string($conn, $_POST['pdid']);
    
        $insertQuery = "update star set isStar = '0' where pdid = '$id' and userId = '$userId'";
        mysqli_query($conn, $insertQuery);
        echo 'Updated';
} 


//for education loan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edid'])) {
    $id = mysqli_real_escape_string($conn, $_POST['edid']);
    
        $insertQuery = "update star set isStar = '0' where edid = '$id' and userId = '$userId'";
        mysqli_query($conn, $insertQuery);
        echo 'Updated';
} 

?>
