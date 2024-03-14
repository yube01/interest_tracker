<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../Components/style/search.css">
    <title>Search</title>
</head>
<body>
    <nav>

        <div class="banks">
            <a href="../home/home.php">
            <div class="firsts">
                Saving and Fixed
            </div>
            </a>
            <a href="../page/studentSaving.php">
            <div class="firsts">
                Student Saving
            </div>
            </a>
            <a href="../loan/loan.php">
            <div class="firsts">
                Personal Loan
            </div>
            </a>
            <a href="../page/studentLoan.php">
            <div class="firsts">
                Student Loan
            </div>
            </a>
        </div>

        <?php
                    if ($bank !== "none") {
                        ?>

                    
                        <?php
                        
                    }else{
                        ?>
        <div class="search">
            <input type="text" placeholder="Search">
            <img src="../assets/icon/search.png" alt="">

        </div>
                        <?php
                    }?>


    
    </nav>
    
</body>
</html>