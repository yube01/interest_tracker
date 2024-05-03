<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="../Components/style/savingFixed.css">
    <title>Saving and Fixed Interest</title>
</head>
<body>
    <?php
        if(isset($_GET['type'])){
            $type =  $_GET['type'];
        }
        $option = 0;
if(isset($_GET['type']) && isset($_GET['option'])){
    $type = $_GET['type'];
    $option=1;
}
    ?>
    <div clas="savingFd">
       
        <center>
        <table border="0">
           <thead>
                <tr>
                    <th>Bank/Finance</th>
                    <?php
                        if($type == "savingFix"){
                            ?>
                                <th>Saving Account</th>
                                <th>Fixed Account</th>
                            <?php
                        }
                    ?>
                    <?php
                        if($type == "studentSave"){
                            ?>
                                <th>Type</th>
                                <th>Interest</th>
                                <th>Minimum Balance</th>
                            <?php
                        }
                    ?>
                    <?php
                        if($type == "personalLoan"){
                            ?>
                                <th>Personal Loan</th>
                            <?php
                        }
                    ?>
                    <?php
                        if($type == "studentLoan"){
                            ?>
                                <th>Student Loan</th>
                            <?php
                        }
                    ?>

                    <?php
                        if($isAdmin == 1){
                            if($option == 1){
                                ?>
                                    <th>Status</th>
                                <?php
                            }else{
                                ?>

<th>Requests</th>
<?php
                            }
                        }else{
                            ?>
                                 <th>Status</th>
                            <?php
                        }
                    ?>

                    
                   
                       
                    
                </tr>
           </thead>
           <?php
                        if($type == "savingFix"){include "../Db/request/savingFixed.php";}
                        else if($type == "studentSave"){include "../Db/request/studentSav.php";}
                        else if($type == "personalLoan"){include "../Db/request/personalLoan.php";}
                        else if($type == "studentLoan"){include "../Db/request/studentLoan.php";}
                    ?>
        </table>
        </center>
        
    </div>
    
</body>
</html>