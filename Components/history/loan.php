<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="../Components/style/savingFixed.css">
    <title>Loan Calculate History</title>
</head>
<body>
    <div clas="savingFd">
       
        <center>
        <table border="0">
           <thead>
                <tr>
                    <th>Bank/Finance</th>
                    <th>Type</th>
                    <th>Principle</th>
                    <th>Time</th>
                    <th>Rate</th>
                    <th>EMI Amount</th>
                    <th>Maturity Amount</th>

                </tr>
           </thead>
            <?php include "../Db/history/loan.php" ?>
        </table>
        </center>
        
    </div>
    
</body>
</html>