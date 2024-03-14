<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="../Components/style/savingFixed.css">
    <title>Student Loan Interest</title>
</head>
<body>
    <div clas="savingFd">
       
        <center>
        <table border="0">
           <thead>
                <tr>
                    <th>Bank/Finance</th>
                    <th>Student Loan</th>
                    <?php
                    if ($isAdmin == 1 || $bank !== "none" ) {
                        ?>
                        <th>Edit</th>
                        <?php
                        if($isAdmin == 1){
                            ?>
                            <th>Delete</th>
                                <?php
                        }
                        ?>
                        <?php
                        
                    }else{
                        ?>
                        <th>Favorite</th>
                        <th>Calculate</th>
                        <?php
                    }?>
                </tr>
           </thead>
            <?php include "../Db/studentLoan.php" ?>
        </table>
        </center>
    </div>
</body>
</html>