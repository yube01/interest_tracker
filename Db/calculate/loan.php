<?php

include "../../Db/dbConnect.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['emi'])) {
    $userId = mysqli_real_escape_string($conn, $_POST['userId']);
    $bank = mysqli_real_escape_string($conn, $_POST['bank']);
    $princ = mysqli_real_escape_string($conn, $_POST['princ']);
    $time = mysqli_real_escape_string($conn, $_POST['time']);
    $rate = mysqli_real_escape_string($conn, $_POST['rate']);
    $emi = mysqli_real_escape_string($conn, $_POST['emi']);
    $total = mysqli_real_escape_string($conn, $_POST['total']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);

    $times = $time/12;

    $totals =  number_format($total, 0, '', ',');
    $emis = number_format($emi, 0, '', ',');

    $result = "INSERT INTO history (userId,bank,type,principle,time,rate,result,total) values ('$userId','$bank','$type','$princ','$times','$rate','$emis','$totals')";

    $sql = mysqli_query($conn,$result);
    if($sql){
        header("location: ../history/loan.php?msg=$bank data saved");
    }


    
} 

?>