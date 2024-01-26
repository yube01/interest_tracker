<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Saving Interest</title>
    <link rel="stylesheet" href="./style/edit.css">
</head>
<body>
<?php
    include "../../Db/dbConnect.php";
     if(isset($_GET['id'])){
        $id =  $_GET['id'];

        $sql = "Select * from student_saving where stid = $id";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
    }
   
    ?>
    <form class="container" method="POST">
        <div class="editValue">
        <div class="ed">
            <label>Bank/Finance Name</label>
            <input type="text" value="<?php echo $data['bank_name']?>">
        </div>

        <div class="ed">
            <label>Type</label>
            <input type="text" value="<?php echo $data['type']?>">
        </div>

        <div class="ed">
            <label>Saving Interest Rate</label>
            <input type="number" value="<?php echo $data['interest']?>">
        </div>

        <div class="ed">
            <label>Minimum Balance</label>
            <input type="text" value="<?php echo $data['minBalance']?>">
        </div>
        </div>
        <div class="editBtn">
        <input type="submit" class="submit" value="Edit" name="" id="">
        
        </div>

        

</form>
<a href="../../page/studentSaving.php">
        <button class="submit">Cancel</button>
        </a>

</body>
</html>