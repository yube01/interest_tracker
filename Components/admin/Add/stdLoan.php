<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Loan Interest</title>
    <link rel="stylesheet" href="../style/edit.css">
    <script src="./onCancel.js"></script>
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
                <label>Student Interest Rate</label>
                <input type="number" step="0.0001" name="sRate" required>
            </div>
            </div>
            <div class="editBtn">
            <input type="submit" name="studentLoan" class="submit" value="Add">
            
            </div>
        </form>
        <?php include "../../../Db/admin/add/addBank.php" ?>
        <div class="cancel">
            <a onclick="onCancel('stloan')">
                <img src="../../../assets/icon/multiply.png" alt="">
            </a>
        </div>
    </div>

</body>
</html>