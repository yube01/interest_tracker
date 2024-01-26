<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Personal Loan Interest</title>
    <link rel="stylesheet" href="./style/edit.css">
</head>
<body>
<?php
    include "../../Db/dbConnect.php";
     if(isset($_GET['id'])){
        $id =  $_GET['id'];

        $sql = "Select * from personal_loan where pid = $id";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
    }
   
    ?>
    <form class="container">
        <div class="editValue">
        <div class="ed">
            <label>Bank/Finance Name</label>
            <input type="text" value="<?php echo $data['name']?>">
        </div>
        <div class="ed">
            <label>Personal Loan Interest Rate</label>
            <input type="number" value="<?php echo $data['interest']?>">
        </div>
        
           
        </div>

        
        </div>
        <div class="editBtn">
        <input type="submit" class="submit" value="Edit" name="" id="">
        <a href="../../loan/loan.php">
        <button class="submit">Cancel</button>
        </a>
        </div>

        

</form>

</body>
</html>