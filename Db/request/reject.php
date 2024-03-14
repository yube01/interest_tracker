<?php


include "../../Db/dbConnect.php";

//for saving and fixed interest rate

if(isset($_POST['savFix'])){
    $bank = mysqli_real_escape_string($conn, $_POST['savFix']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);
    $update = "UPDATE saving_fixed SET status = 3
    WHERE name = '$bank' and code = '$code'";
    $result = mysqli_query($conn, $update);
    if($result){
        echo "Updated";
        header("Location: ../../home/home.php?msg=updated");
        
    }else{
        echo "Error";
    }
}

//for personal loan interest rate

if(isset($_POST['personal'])){
    $bank = mysqli_real_escape_string($conn, $_POST['personal']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);

    $update = "UPDATE personal_loan SET status = 3
    WHERE name = '$bank' and code = '$code'";
    $result = mysqli_query($conn, $update);
    if($result){
        echo "Updated";
        header("Location: ../../loan/loan.php?msg=updated");
    }else{
        echo "Error";
    }
}

// for student loan interest rate
if(isset($_POST['studentLoan'])){
    $bank = mysqli_real_escape_string($conn, $_POST['studentLoan']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);

    $update = "UPDATE education_loan SET status = 3
    WHERE name = '$bank' and code = '$code'";
    $result = mysqli_query($conn, $update);
    if($result){
        echo "Updated";
        header("Location: ../../page/studentLoan.php?msg=updated");
    }else{
        echo "Error";
    }
}

//for student saving interest rate

if(isset($_POST['studentSav'])){
    $bank = mysqli_real_escape_string($conn, $_POST['studentSav']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);

    $update = "UPDATE student_saving SET status = 3
    WHERE bank_name = '$bank' and code = '$code'";
    $result = mysqli_query($conn, $update);
    if($result){
        echo "Updated";
        header("Location: ../../page/studentSaving.php?msg=updated");
    }else{
        echo "Error";
    }
}



?>

