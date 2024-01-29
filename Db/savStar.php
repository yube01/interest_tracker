<?php

include "dbConnect.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $bank = mysqli_real_escape_string($conn, $_POST['bank']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $interest = mysqli_real_escape_string($conn, $_POST['interest']);
    $userId = mysqli_real_escape_string($conn, $_POST['user']);

    echo $userId;
    $check = "Select stdSav,isStar from star where stdSav = '$id' and userId = '$userId'";
    $query  =   mysqli_query($conn, $check);
    $result = mysqli_fetch_assoc($query);


    if( $result > 0 ){
        
        $insertQuery = "update star set isStar = '1' where stdSav = '$id' and userId = '$userId'";
        mysqli_query($conn, $insertQuery);
        echo 'Again Updated';
        exit();
    }else{
        $insertQuery = "INSERT INTO star (isStar,stdSav,userId,bank,types,interests) VALUES ('1','$id','$userId','$bank','$type','$interest')";
        mysqli_query($conn, $insertQuery);
        echo 'Bank name saved successfully';
        exit();

     }

    
} 

// for saving and fixed table star
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sf'])) {
    $id = mysqli_real_escape_string($conn, $_POST['sf']);
    $bank = mysqli_real_escape_string($conn, $_POST['name']);
    $interest = mysqli_real_escape_string($conn, $_POST['interest']);
    $userId = mysqli_real_escape_string($conn, $_POST['user']);

    $check = "Select sf,isStar from star where sf = '$id' and userId = '$userId'";
    $query  =   mysqli_query($conn, $check);
    $result = mysqli_fetch_assoc($query);


    if( $result > 0 ){
        
        $insertQuery = "update star set isStar = '1' where sf = '$id' and userId = '$userId'";
        mysqli_query($conn, $insertQuery);
        echo 'Again Updated';
        exit();
    }else{
        $insertQuery = "INSERT INTO star (isStar,sf,userId,bank,types,interests) VALUES ('1','$id','$userId','$bank','Fixed Deposit','$interest')";
        mysqli_query($conn, $insertQuery);
        echo 'Bank name saved successfully';
        exit();

     }

    
} 

//for personal loan table
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pdid'])) {
    $id = mysqli_real_escape_string($conn, $_POST['pdid']);
    $bank = mysqli_real_escape_string($conn, $_POST['name']);
    $interest = mysqli_real_escape_string($conn, $_POST['interest']);
    $check = "Select pdid,isStar from star where pdid = '$id' and userId = '$userId'";
    $query  =   mysqli_query($conn, $check);
    $result = mysqli_fetch_assoc($query);
    $userId = mysqli_real_escape_string($conn, $_POST['user']);


    if( $result > 0 ){
        
        $insertQuery = "update star set isStar = '1' where pdid = '$id' and userId = '$userId'";
        mysqli_query($conn, $insertQuery);
        echo 'Again Updated';
        exit();
    }else{
        $insertQuery = "INSERT INTO star (isStar,pdid,userId,bank,types,interests) VALUES ('1','$id','$userId','$bank','Personal Loan','$interest')";
        mysqli_query($conn, $insertQuery);
        echo 'Bank name saved successfully';
        exit();

     }

    
} 

//for education loan
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edid'])) {
    $id = mysqli_real_escape_string($conn, $_POST['edid']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $interest = mysqli_real_escape_string($conn, $_POST['interest']);
    $userId = mysqli_real_escape_string($conn, $_POST['user']);

    $check = "Select edid,isStar from star where edid = '$id' and userId = '$userId'";
    $query  = mysqli_query($conn, $check);
    $result = mysqli_fetch_assoc($query);


    if( $result > 0 ){
        
        $insertQuery = "update star set isStar = '1' where edid = '$id' and userId = '$userId'";
        mysqli_query($conn, $insertQuery);
        echo 'Again Updated';
        exit();
    }else{
        $insertQuery = "INSERT INTO star (isStar,edid,userId,bank,types,interests) VALUES ('1','$id','$userId','$name','Student Loan','$interest')";
        mysqli_query($conn, $insertQuery);
        echo 'Bank name saved successfully';
        exit();

     }

    
} 

?>
