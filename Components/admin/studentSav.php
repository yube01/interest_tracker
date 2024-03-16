<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Saving Interest</title>
    <link rel="stylesheet" href="./style/edit.css">
    <script src="./onEditCancel.js"></script>
    <script src="./Add/validate.js"></script>
</head>
<body>
<?php
    include "../../Db/dbConnect.php";
    include "../../session/session.php";
     if(isset($_GET['id'])){
        $id =  $_GET['id'];

        $sql = "Select * from student_saving where stid = $id";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
    }
   
    ?>
<div class="container">
        <form class="containers" method="POST">
            <div class="editValue">
            <?php
                if($bank == "none"){
                    ?>
            <div class="ed">
                <label>Bank/Finance Name</label>
                <input type="text" name="bank" value="<?php echo $data['bank_name']?>" required>
            </div>
                    <?php
                }
            ?>

            <div class="ed">
                <label>Type</label>
                <input type="text" name="type" value="<?php echo $data['type']?>" required>
            </div>
    
            <div class="ed">
                <label>Minimum Balance</label>
                <input type="number" oninput="validateMinBalance()" step="0.0001" name="min" value="<?php echo $data['minBalance']?>" required>
            </div>
    
            <div class="ed">
                <label>Interest Rate</label>
                <input type="number" oninput="validateInterestRate()" step="0.0001" name="rate" value="<?php echo $data['interest']?>" required>
            </div>
            </div>
            <div class="editBtn">
            <?php
                if($bank == "none"){
                    ?>
                    <input type="submit" name="studentSav" class="submit" value="Edit">
                    <?php
                }else{
                    ?>
                    <input type="submit" name="rstudentSav" class="submit" value="Request Edit">
                    <?php
                }
            ?>
            
            </div>
        </form>
        <?php include "../../Db/admin/edit/editBank.php" ?>
        <?php include "../../Db/admin/edit/requestEdit.php" ?>
        <div class="cancel">
            <a onclick="onEditCancel('student')">
                <img src="../../assets/icon/multiply.png" alt="">
            </a>
        </div>
    </div>


</body>
</html>