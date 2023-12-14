<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/home.css">
    <title>Loan</title>
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
            <div class="first">
            <a href="../page/studentSaving.php" class="stlink">
                <button class="checkStudent">Check Student Saving Interest</button>
            </a>
                <?php include "../Components/personalLoan.php" ?>
            </div>
        </div>
        
       
        
    </div>
    
</body>
</html>