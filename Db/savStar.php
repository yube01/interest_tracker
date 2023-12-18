<?php

include "dbConnect.php";
include "../session/session.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $check = "Select stdSav,isStar from star where stdSav = '$id' and userId = '$userId'";
    $query  =   mysqli_query($conn, $check);
    $result = mysqli_fetch_assoc($query);


    if( $result > 0 ){
        
        $insertQuery = "update star set isStar = '1' where stdSav = '$id' and userId = '$userId'";
        mysqli_query($conn, $insertQuery);
        echo 'Again Updated';
        exit();
    }else{
        $insertQuery = "INSERT INTO star (isStar,stdSav,userId) VALUES ('1','$id','$userId')";
        mysqli_query($conn, $insertQuery);
        echo 'Bank name saved successfully';
        exit();

     }

    
} 

// for saving and fixed table star
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sf'])) {
    $id = mysqli_real_escape_string($conn, $_POST['sf']);

    $check = "Select sf,isStar from star where sf = '$id' and userId = '$userId'";
    $query  =   mysqli_query($conn, $check);
    $result = mysqli_fetch_assoc($query);


    if( $result > 0 ){
        
        $insertQuery = "update star set isStar = '1' where sf = '$id' and userId = '$userId'";
        mysqli_query($conn, $insertQuery);
        echo 'Again Updated';
        exit();
    }else{
        $insertQuery = "INSERT INTO star (isStar,sf,userId) VALUES ('1','$id','$userId')";
        mysqli_query($conn, $insertQuery);
        echo 'Bank name saved successfully';
        exit();

     }

    
} 

?>
