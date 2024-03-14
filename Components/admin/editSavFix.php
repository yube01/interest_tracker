<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Saving and Fixed Interest</title>
    <link rel="stylesheet" href="./style/edit.css">
    <script src="./onEditCancel.js"></script>
</head>
<body>
<?php
    include "../../Db/dbConnect.php";
    include "../../session/session.php";
     if(isset($_GET['id'])){
        $id =  $_GET['id'];

        $sql = "Select * from saving_fixed where sid = $id";
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
                <input type="text" name="bank" value="<?php echo $data['name']?>" required>
            </div>
                    <?php
                }
            ?>
    
            <div class="ed">
                <label>Saving Interest Rate</label>
                <input type="number" step="0.0001" name="sRate" value="<?php echo $data['saving_rate']?>" required>
            </div>
    
            <div class="ed">
                <label>Fixed Interest Rate</label>
                <input type="number" step="0.0001" name="fRate" value="<?php echo $data['fixed_rate']?>" required>
            </div>
            </div>
            <div class="editBtn">
            <?php
                if($bank == "none"){
                    ?>
                    <input type="submit" name="savFix" class="submit" value="Edit">
                    <?php
                }else{
                    ?>
                    <input type="submit" name="rsavFix" class="submit" value="Request Edit">
                    <?php
                }
            ?>
            </div>
            
        </form>
        
        <?php include "../../Db/admin/edit/editBank.php" ?>
        <?php include "../../Db/admin/edit/requestEdit.php" ?>
        <div class="cancel" >
            <a onclick="onEditCancel('saving')">
                <img src="../../assets/icon/multiply.png" alt="">
            </a>
        </div>
    </div>

</body>
</html>