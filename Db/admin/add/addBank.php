<?php


include "../../../Db/dbConnect.php";

//for saving and fixed interest rate

if(isset($_POST['savFix'])){
    $name = $_POST['bank'];
    $code = $_POST['code'];
    $sinterest = $_POST['sRate'];
    $finterest = $_POST['fRate'];

    

    $add = "INSERT INTO saving_fixed (name,code,saving_rate,fixed_rate) VALUES ('$name','$code','$sinterest','$finterest')";
    $result = mysqli_query($conn, $add);
    if($result){
        echo "Added";
        header("Location: ../../../home/home.php?msg1=$name bank detail added&type=saving");
    }else{
        echo "Error";
    }
}

//for personal loan interest rate

if(isset($_POST['personal'])){
    $name = $_POST['bank'];
    $code = $_POST['code'];
    $interest = $_POST['rate'];

    $add = "INSERT INTO personal_loan (name,code,interest) VALUES ('$name','$code','$interest')";
    $result = mysqli_query($conn, $add);
    if($result){
        echo "Added";
        header("Location: ../../../loan/loan.php?msg1=$name bank detail added&type=loan");
    }else{
        echo "Error";
    }
}

// for student loan interest rate
if(isset($_POST['studentLoan'])){
    $name = $_POST['bank'];
    $code = $_POST['code'];
    $interest = $_POST['rate'];

    $add = "INSERT INTO education_loan (name,code,interest) VALUES ('$name','$code','$interest')";
    $result = mysqli_query($conn, $add);
    if($result){
        echo "Added";
        header("Location: ../../../page/studentLoan.php?msg1=$name bank detail added&type=studentloan");
    }else{
        echo "Error";
    }
}

//for student saving interest rate

if(isset($_POST['studentSav'])){
    $name = $_POST['bank'];
    $code = $_POST['code'];
    $type = $_POST['type'];
    $min = $_POST['min'];
    $interest = $_POST['rate'];

    $add = "INSERT INTO student_saving (bank_name,code,type,interest,minBalance) 
    VALUES ('$name','$code','$type','$interest','$min')";
    $result = mysqli_query($conn, $add);
    if($result){
        echo "Added";
        header("Location: ../../../page/studentSaving.php?msg1=$name bank detail added&type=studentSav");
    }else{
        echo "Error";
    }
}



?>

