<?php

include "../../dbConnect.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']))  {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    echo $id;

    $del = "DELETE FROM student_saving WHERE stid = '$id'";
    $query  =   mysqli_query($conn, $del);
   
    if( $query){
        echo 'detail deleted successfully';
        exit();

     }

    
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eid']))  {
    $id = mysqli_real_escape_string($conn, $_POST['eid']);

    echo $id;

    $del = "DELETE FROM education_loan WHERE eid = '$id'";
    $query  =   mysqli_query($conn, $del);
   
    if( $query){
        echo 'detail deleted successfully';
        exit();

     }

    
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['sidf']))  {
    $id = mysqli_real_escape_string($conn, $_POST['sidf']);

    echo $id;

    $del = "DELETE FROM saving_fixed WHERE saving_fixed.sid = '$id'";
    $query  =   mysqli_query($conn, $del);
   
    if( $query){
        echo 'detail deleted successfully';
        exit();

     }

    
} 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pid']))  {
    $id = mysqli_real_escape_string($conn, $_POST['pid']);
    $bank = mysqli_real_escape_string($conn, $_POST['name']);


    $del = "DELETE FROM personal_loan WHERE pid = '$id'";
    $query  =   mysqli_query($conn, $del);
   
    if( $query){
        echo "$bank detail deleted successfully";
        exit();

     }

    
} 

?>