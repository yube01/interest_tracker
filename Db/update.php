<?php

include "dbConnect.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    echo $id;

    // $check = "Select stid from star where stid = '$id'";
    // $query  =   mysqli_query($conn, $check);
    // $result = mysqli_fetch_assoc($query);
    // if($result > 0){
    //     echo "already";
    //     exit();
    // }else{
        $insertQuery = "update star set isStar = '0' where stid = '$id'";
        mysqli_query($conn, $insertQuery);
        echo 'Updated';

    // }

    
} else{
    echo 'Invalid request';
}

?>
