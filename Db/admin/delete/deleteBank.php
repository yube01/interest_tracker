<?php

include "../../dbConnect.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id']))  {
    $id = mysqli_real_escape_string($conn, $_POST['id']);

    echo $id;

    $del = "DELETE FROM student_saving WHERE stid = '$id'";
    $query  =   mysqli_query($conn, $del);
   
    if( $query){
        echo 'Bank name deleted successfully';
        exit();

     }

    
} 

?>