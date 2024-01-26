<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Loan Interest</title>
    <link rel="stylesheet" href="./style/edit.css">
</head>
<body>
<?php
    include "../../Db/dbConnect.php";
     if(isset($_GET['id'])){
        $id =  $_GET['id'];

        $sql = "Select * from education_loan where eid = $id";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
    }
   
    ?>
    <form class="container" method="POST">
        <div class="editValue">
        <div class="ed">
            <label>Bank/Finance Name</label>
            <input type="text" value="<?php echo $data['name']?>">
        </div>

        
        <div class="ed">
        <label>Student Loan Interest Rate</label>
            <input type="number" value="<?php echo $data['interest']?>">
        </div>

        
           
        </div>

        
        </div>
        <div class="editBtn">
        <input type="submit" class="submit" value="Edit" name="" id="">
        <button class="submit" onclick="redirect()">
            Cancel
        </button>
        </div>


        

</form>

<script>
    const redirect = ()=>{
        window.location.href = "../../home/home.php";
    }
</script>

</body>
</html>