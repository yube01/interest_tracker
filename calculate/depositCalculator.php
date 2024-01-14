<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>EMI Calculator</title>
</head>
<body>
    <div class="container">
        <div class="side">
        <?php
             include "../Components/sidebar.php"
        ?>
        </div>
        <div class="calculate">
        <h1>EMI Calculator</h1>
            <div class="insert" method="POST">
                <div class="first" >
                <div class="inputValue">
                <div class="in">
                <label>Loan Amount (In Rupees)</label>
                <input type="number" placeholder="Eg: 200000" name="amount" >
                </div>

                <div class="in">
                <label>Interest Rate (per annum)</label>
                <input type="number" placeholder="Eg: 5" name="rate" >
                </div>

                <div class="in">
                <label>Loan Tenure</label>
                <input type="number" placeholder="Eg: 3 years" name="time">
                </div>
                
                </div>
                <input class="submit" type="submit" value="Calculate">
                
            </div>
            <?php
                if(isset($_POST['submit'])){
                    $amount = $_POST['amount'];
                    $rate = $_POST['rate'];
                    $time = $_POST['time'];

                    echo $rate;

                }
            ?>
            <div class="display">
            <div>
                <label>Monthly EMI : </label>
                <span>45000</span>
            </div>
            <div>
                <label>Principle : </label>
                <span>4500000</span>
            </div>
            <div>
                <label>Interest Payable : </label>
                <span>4500</span>
            </div>
            <div>
                <label>Total Payment : </label>
                <span>4560009</span>
            </div>
            </div>
            

        
        </div>
        <div class="saveBtn">
            <button>Save this data</button>
        </div>
    </div>
</body>
</html>