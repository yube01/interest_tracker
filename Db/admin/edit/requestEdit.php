<?php


include "../../Db/dbConnect.php";

//for saving and fixed interest rate

if(isset($_POST['rsavFix'])){
    $sinterest = $_POST['sRate'];
    $finterest = $_POST['fRate'];
    $code = uniqid();
    $request = "INSERT into saving_fixed (name,code,saving_rate,fixed_rate,status) values ('$bank','$code','$sinterest', '$finterest',1)";
    $result = mysqli_query($conn, $request);
    if($result){
        echo "requested";
        header("Location: ../../home/home.php?msg=$bank detail requested to admin");
    }else{
        echo "Error";
    }
}

//for personal loan interest rate

if(isset($_POST['rpersonal'])){
   
    $interest = $_POST['sRate'];
    $code = uniqid();
    $request = "INSERT into personal_loan (name,code,interest,status) values ('$bank','$code','$interest',1)";

    $result = mysqli_query($conn, $request);
    if($result){
        echo "requested";
        header("Location: ../../loan/loan.php?msg=$bank detail requested to admin");
    }else{
        echo "Error";
    }
}

// for student loan interest rate
if(isset($_POST['rstudentLoan'])){
    
    $interest = $_POST['sRate'];
    $code = uniqid();
    $request = "INSERT into education_loan (name,code,interest,status) values ('$bank','$code','$interest',1)";

    $result = mysqli_query($conn, $request);
    if($result){
        echo "Requested";
        header("Location: ../../page/studentLoan.php?msg=$bank detail requested to admin");
    }else{
        echo "Error";
    }
}

//for student saving interest rate

if(isset($_POST['rstudentSav'])){

    $type = $_POST['type'];
    $min = $_POST['min'];
    $code = uniqid();
    $interest = $_POST['rate'];

    $request = "INSERT into student_saving (bank_name,code,type,minBalance,interest,status) values ('$bank','$code','$type','$min','$interest',1)";

    $result = mysqli_query($conn, $request);
    if($result){
        echo "Requested";
        header("Location: ../../page/studentSaving.php?msg=$bank detail requested to admin");
    }else{
        echo "Error";
    }
}



?>

