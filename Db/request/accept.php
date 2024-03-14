<?php


include "../../Db/dbConnect.php";

//for saving and fixed interest rate

if(isset($_POST['savFix'])){
    $bank = mysqli_real_escape_string($conn, $_POST['savFix']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);
    $saving = mysqli_real_escape_string($conn, $_POST['saving']);
    $fixed = mysqli_real_escape_string($conn, $_POST['fixed']);



    $update = "UPDATE saving_fixed SET 
    saving_rate = '$saving', fixed_rate = '$fixed'
    WHERE name = '$bank' and status = 0";
    $result = mysqli_query($conn, $update);
    if($result){
        $update1 = "UPDATE saving_fixed SET status = 2
    WHERE name = '$bank' and code = '$code'";
    $result1 = mysqli_query($conn, $update1);
        if($result1){
            echo "Updated";
        header("Location: ../../home/home.php?msg=updated");
        }
    }else{
        echo "Error";
    }
}

//for personal loan interest rate

if(isset($_POST['personal'])){
    $bank = mysqli_real_escape_string($conn, $_POST['personal']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);
    $interest = mysqli_real_escape_string($conn,$_POST['interest']);

    $update = "UPDATE personal_loan SET interest = '$interest' 
    WHERE name = '$bank' and status = 0";

    $result = mysqli_query($conn, $update);
    if($result){
        $update1 = "UPDATE personal_loan SET status = 2
        WHERE name = '$bank' and code = '$code'";
        $result1 = mysqli_query($conn, $update1);
            if($result1){
                echo "Updated";
                header("Location: ../../loan/loan.php?msg=updated");
            }

    }else{
        echo "Error";
    }
}

// for student loan interest rate
if(isset($_POST['studentLoan'])){
    $bank = mysqli_real_escape_string($conn, $_POST['studentLoan']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);
    $interest = mysqli_real_escape_string($conn,$_POST['interest']);


    $update = "UPDATE education_loan SET  interest = '$interest'
    WHERE name = '$bank' and status = 0";
    $result = mysqli_query($conn, $update);
    if($result){
        $update1 = "UPDATE education_loan SET status = 2
        WHERE name = '$bank' and code = '$code'";
        $result1 = mysqli_query($conn, $update1);
            if($result1){
                echo "Updated";
                header("Location: ../../page/studentLoan.php?msg=updated");
            }

    }else{
        echo "Error";
    }
}

//for student saving interest rate

if(isset($_POST['studentSav'])){
    $bank = mysqli_real_escape_string($conn, $_POST['studentSav']);
    $code = mysqli_real_escape_string($conn, $_POST['code']);
    $interest = mysqli_real_escape_string($conn,$_POST['interest']);
    $type = mysqli_real_escape_string($conn,$_POST['type']);
    $minBal = mysqli_real_escape_string($conn,$_POST['minBal']);

    $update = "UPDATE student_saving SET type = '$type',
    minBalance = '$minBal',interest = '$interest'
    WHERE bank_name = '$bank' and status = 0";
    $result = mysqli_query($conn, $update);
    if($result){
        $update1 = "UPDATE student_saving SET status = 2
        WHERE bank_name = '$bank' and code = '$code'";
        $result1 = mysqli_query($conn, $update1);
            if($result1){
                echo "Updated";
                header("Location: ../../page/studentSaving.php?msg=updated");
            }

    }else{
        echo "Error";
    }
}



?>

