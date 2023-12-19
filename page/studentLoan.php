<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../home/style/home.css">
    <title>Student Loan Interest</title>
</head>
<body>
    <div class="container">
        <div class="side">
        <?php
             include "../Components/sidebar.php"
        ?>
        </div>
        <div class="deposit">
            <div class="sbtn">
                <?php include "../Components/search.php" ?>
            </div>
            <a href="../loan/loan.php" class="stlink">
                <button style="margin-left:-5rem" class="checkStudent">Home</button>
            </a>
            <div class="first">
           
                <?php include "../Components/studentLoan.php" ?>
            </div>
        </div>
        
       
        
    </div>
    
</body>
</html>