<?php

include "../../Db/dbConnect.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $bank = mysqli_real_escape_string($conn, $_POST['bank']);
    
    $check = "delete from star where starid = '$id'";
    $query  =   mysqli_query($conn, $check);
   

    if($query){
        
        echo "deleted '$bank'";
    }else{
        echo "error";
    }

    
} 

?>