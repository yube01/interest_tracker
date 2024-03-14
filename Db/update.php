<?php

include "dbConnect.php";
include "../session/session.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $bank = mysqli_real_escape_string($conn, $_POST['bank']);
    
        $insertQuery = "update star set isStar = '0' where stdSav = '$id' and userId = '$userId'";
        mysqli_query($conn, $insertQuery);
        echo $bank.' removed from starred';
} 


// for savind and fixed table
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sf'])) {
    $id = mysqli_real_escape_string($conn, $_POST['sf']);
    $bank = mysqli_real_escape_string($conn, $_POST['name']);
        $insertQuery = "update star set isStar = '0' where sf = '$id' and userId = '$userId'";
        mysqli_query($conn, $insertQuery);
        echo $bank.' removed from starred';
} 

//for personal loan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pdid'])) {
    $id = mysqli_real_escape_string($conn, $_POST['pdid']);
    $bank = mysqli_real_escape_string($conn, $_POST['name']);
        $insertQuery = "update star set isStar = '0' where pdid = '$id' and userId = '$userId'";
        mysqli_query($conn, $insertQuery);
        echo $bank.' removed from starred';
} 


//for education loan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edid'])) {
    $id = mysqli_real_escape_string($conn, $_POST['edid']);
    $bank = mysqli_real_escape_string($conn, $_POST['name']);
        $insertQuery = "update star set isStar = '0' where edid = '$id' and userId = '$userId'";
        mysqli_query($conn, $insertQuery);
        echo $bank.' removed from starred';
} 

?>
