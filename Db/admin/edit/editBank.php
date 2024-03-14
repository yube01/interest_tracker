<?php


include "../../Db/dbConnect.php";

//for saving and fixed interest rate

if(isset($_POST['savFix'])){
    $name = $_POST['bank'];
    $sinterest = $_POST['sRate'];
    $finterest = $_POST['fRate'];

    $update = "UPDATE saving_fixed SET name = '$name', 
    saving_rate = '$sinterest', fixed_rate = '$finterest'
    WHERE sid = $id";
    $result = mysqli_query($conn, $update);
    if($result){
        echo "Updated";
        header("Location: ../../home/home.php?msg=$name bank detail updated");
    }else{
        echo "Error";
    }
}

//for personal loan interest rate

if(isset($_POST['personal'])){
    $name = $_POST['bank'];
    $interest = $_POST['sRate'];

    $update = "UPDATE personal_loan SET name = '$name', 
    interest = '$interest'
    WHERE pid = $id";
    $result = mysqli_query($conn, $update);
    if($result){
        echo "Updated";
        header("Location: ../../loan/loan.php?msg=$name bank detail updated");
    }else{
        echo "Error";
    }
}

// for student loan interest rate
if(isset($_POST['studentLoan'])){
    $name = $_POST['bank'];
    $interest = $_POST['sRate'];

    $update = "UPDATE education_loan SET name = '$name', 
    interest = '$interest'
    WHERE eid = $id";
    $result = mysqli_query($conn, $update);
    if($result){
        echo "Updated";
        header("Location: ../../page/studentLoan.php?msg=$name bank detail updated");
    }else{
        echo "Error";
    }
}

//for student saving interest rate

if(isset($_POST['studentSav'])){
    $name = $_POST['bank'];
    $type = $_POST['type'];
    $min = $_POST['min'];
    $interest = $_POST['rate'];

    $update = "UPDATE student_saving SET bank_name = '$name', type = '$type',
    minBalance = '$min',interest = '$interest'
    WHERE stid = $id";
    $result = mysqli_query($conn, $update);
    if($result){
        echo "Updated";
        header("Location: ../../page/studentSaving.php?msg=$name bank detail updated");
    }else{
        echo "Error";
    }
}



?>

