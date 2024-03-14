
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


            
            <div class="first">
            <?php
                if ($isAdmin == 1 ) {
                    ?>
                   <a href="../Components/admin/Add/stdLoan.php">
                    <button>Add Bank</button>
                   </a>
                    <?php
                    
                }
            ?>
           
                <?php include "../Components/studentLoan.php" ?>
            </div>
        </div>
        
       
        
    </div>
    
</body>
</html>