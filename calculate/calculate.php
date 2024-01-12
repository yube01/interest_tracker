<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>Calculate</title>
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
        <div class="insert">
            <div class="inputValue">
                <div class="in">
                <label>Loan Amount (In Rupees)</label>
                <input type="number" placeholder="Eg: 200000" >
                </div>

                <div class="in">
                <label>Interest Rate (per annum)</label>
                <input type="number" placeholder="Eg: 5%" >
                </div>

                <div class="in">
                <label>Loan Tenure</label>
                <input type="number" placeholder="Eg: 3 years" >
                </div>
                <input type="submit" value="Calculate">
            </div>
            <div class="display">
            <div>
                <label>Monthly EMI</label>
                <span>45000</span>
            </div>
            <div>
                <label>Principle</label>
                <span>4500000</span>
            </div>
            <div>
                <label>Interest Payable</label>
                <span>4500</span>
            </div>
            <div>
                <label>Total Payment</label>
                <span>4560009</span>
            </div>
            </div>
            

        
        </div>
        <div>
            <button>Save this data</button>
        </div>
    </div>
</body>
</html>