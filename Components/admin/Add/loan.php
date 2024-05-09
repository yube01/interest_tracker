<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Personal Loan Interest</title>
    <link rel="stylesheet" href="../style/edit.css">
    <script src="./onCancel.js"></script>
    <script src="./validate.js"></script>
</head>
<body>

    <div class="container">
        <form class="containers" method="POST">
            <div class="editValue">
            <div class="ed">
                <label>Bank/Finance Name</label>
                <input type="text" name="bank" required>
            </div>

            <div class="ed">
                <label>Code</label>
                <input type="text" name="code" required>
            </div>
    
            <div class="ed">
                <label>Personal Interest Rate</label>
                <input type="number" oninput="validateInterestRate()" step="0.0001" name="rate" required>
            </div>
            </div>
            <div class="editBtn">
            <input type="submit" name="personal" class="submit" value="Add">
            
            </div>
        </form>

        <?php include "../../../Db/admin/add/addBank.php" ?>
       
        <div class="cancel">
            <a onclick="onCancel('personal')">
                <img src="../../../assets/icon/multiply.png" alt="">
            </a>
        </div>
    </div>


</body>
</html>