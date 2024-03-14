<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/home.css">
    <link rel="stylesheet" href="./style/style.css">
    <title>EMI Calculator</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="./validate.js"></script>
    <script src="./saveData.js"></script>
</head>
<body>

 
    <?php
    $userId = 0;
    $banks = $_GET['bank'];
     if(isset($_GET['bank']) && isset($_GET['rate'])){
        $rate =  $_GET['rate'];
        $bank = $_GET['bank'];
        $type = $_GET['type'];
        $userId = $_GET['userId'];

    }else{
        $userId = 0;
    }

    ?>
    <div class="container">
        <div class="side">
        <?php
             include "../Components/sidebar.php"
        ?>
        </div>
        <div class="calculate">
        <?php
                if($banks == "none"){
                    ?>
        <div class="sbtn1">
                <?php include "../Components/calculateNav.php" ?>
            </div>
            <?php
                }
                ?>
        <h1>EMI Calculator</h1>

  
            <div class="insert">
            
                <form class="first" method="POST">
                <?php
                if($banks != "none"){
                    ?>
                        <h1><?php echo $bank = $_GET['bank'];?></h1>
                    <?php
                }
                ?>
                <div class="inputValue">
                <div class="in">
                <label>Loan Amount (In Rupees)</label>
                <input type="number" oninput="validatePrinciple()" placeholder="Eg: 200000" name="amount" required>
                </div>

                <div class="in">
                <label>Interest Rate (per annum)</label>
                <input type="number" oninput="validateInterestRate()" name="rate" value="<?php echo $rate?>" placeholder="Eg: 5%" step="any" required>
                </div>

                <div class="in">
                <label>Loan Tenure (In year)</label>
                <input type="number" oninput="validateTime()" name="time" placeholder="Eg: 3 years" required >
                </div>
                
                </div>
                <input class="submit" name="submit" type="submit" value="Calculate">

                </form>
            <?php
            
                $year = 0;
                $emi = 0;
                $amount = 0;
                $payable = 0;
                $total = 0;
                if(isset($_POST['submit'])){
                    $amount = $_POST['amount'];
                    $rates = $_POST['rate'];
                    $rate = $_POST['rate']/12/100;
                    $year = $_POST['time'];
                    $time = $_POST['time']*12;
                    
                    $emi = $amount * $rate * ((pow(1 + $rate, $time)) / (pow(1 + $rate, $time) - 1));

                    $total = $emi * $time;

                    $payable = $total - $amount;
                    
                }
            ?>
            <div class="display">
            <div>
                <label>Monthly EMI : Rs.</label>
                <span><?php echo number_format($emi, 0, '', ',') ?></span>
            </div>
            <div>
                <label>Principle : Rs. </label>
                <span><?php echo number_format($amount, 0, '', ',');?></span>
            </div>
            <div>
                <label>Tenure : </label>
                <span><?php if ($year < 2) {
                    echo $year . " year";} else {
                    echo $year . " years";
                    }?>
                </span>
            </div>
            <div>
                <label>Interest Payable : Rs. </label>
                <span><?php echo number_format($payable, 0, '', ',')?></span>
            </div>
            <div>
                <label>Total Payment : Rs. </label>
                <span><?php echo number_format($total, 0, '', ',');?></span>
            </div>
            <?php
            if($bank != "none" && $amount > 0){
                ?>
        <div class="saveBtn">
            <button onclick="loanData('<?php echo $amount?>','<?php echo $time?>','<?php echo $rates?>',
            '<?php echo $emi?>','<?php echo $total?>','<?php echo $bank?>',
            '<?php echo $type?>','<?php echo $userId?>')">Save this data</button>
        </div>
                <?php
            }
        ?>
            </div>
            

        
        </div>

    </div>
    <script>

    </script>
</body>
</html>