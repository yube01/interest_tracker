<?php

include "dbConnect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    $check = "Select stid,isStar from star where stid = '$id'";
    $query  =   mysqli_query($conn, $check);
    $result = mysqli_fetch_assoc($query);
   
    if( $result > 0 ){
        
        $insertQuery = "update star set isStar = '1' where stid = '$id'";
        mysqli_query($conn, $insertQuery);
        echo 'Again Updated';
        exit();
    }else{
        $insertQuery = "INSERT INTO star (isStar,stid) VALUES ('1','$id')";
        mysqli_query($conn, $insertQuery);
        echo 'Bank name saved successfully';

     }

    
} else{
    echo 'Invalid request';
}

?>
