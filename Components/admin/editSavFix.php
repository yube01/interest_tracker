<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Saving and Fixed Interest</title>
    <link rel="stylesheet" href="./style/edit.css">
</head>
<body>
<?php
    include "../../Db/dbConnect.php";
     if(isset($_GET['id'])){
        $id =  $_GET['id'];

        $sql = "Select * from saving_fixed where sid = $id";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
    }
   
    ?>
    <form class="container">
        <div class="editValue">
        <div class="ed">
            <label>Bank/Finance Name</label>
            <input type="text" name="bank" value="<?php echo $data['name']?>">
        </div>

        <div class="ed">
            <label>Saving Interest Rate</label>
            <input type="number" name="sRate" value="<?php echo $data['saving_rate']?>">
        </div>

        <div class="ed">
            <label>Fixed Interest Rate</label>
            <input type="text" name="fRate" value="<?php echo $data['fixed_rate']?>">
        </div>
        </div>
        <div class="editBtn">
        <input type="submit" class="submit" value="Edit">
        <a href="../../home/home.php">
        <button class="submit">Cancel</button>
        </a>
        </div>

        <?php
         if(isset($_GET['bank'])){
            $id =  $_GET['bank'];
    
          echo $id;
        }

        ?>


        

</form>

</body>
</html>