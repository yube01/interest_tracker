<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/styles.css">
    <title>Student Loan Interest</title>
</head>
<body>
<?php
$option = 0;
if(isset($_GET['type']) && isset($_GET['option'])){
    $type = $_GET['type'];
    $option=1;
}
    ?>
    <div class="container">
        <div class="side">
        <?php
             include "../Components/sidebar.php"
        ?>
        </div>
        <div class="deposit">
            <div class="sbtn">
            <?php 
                    if($option == 0){
                        include "../Components/requestnav.php" ;
                    }else{
                        include "../Components/historyNav.php" ;
                    }
                ?>
            </div>

            <div class="first">
           
            <?php include "../Components/request/savingFixed.php" ?>
            </div>
        </div>
        
       
        
    </div>
    
</body>
</html>