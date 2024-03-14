<?php

include "../../Db/dbConnect.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tax'])) {
    $userId = mysqli_real_escape_string($conn, $_POST['userId']);
    $bank = mysqli_real_escape_string($conn, $_POST['bank']);
    $princ = mysqli_real_escape_string($conn, $_POST['princ']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $rate = mysqli_real_escape_string($conn, $_POST['rate']);
    $tax = mysqli_real_escape_string($conn, $_POST['tax']);
    $total = mysqli_real_escape_string($conn, $_POST['total']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);


    $totals =  number_format($total, 0, '', ',');
    $taxs = number_format($tax, 0, '', ',');

    $result = "INSERT INTO history (userId,bank,type,principle,time,rate,result,total) values ('$userId','$bank','$type','$princ','$time','$rate','$taxs','$totals')";

    $sql = mysqli_query($conn,$result);
    if($sql){
        header("location: ../history/saving.php?msg=$bank data saved");
    }else{
        echo "error";
    }

    
} 

?>