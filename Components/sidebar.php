
    <?php include "../session/session.php"; ?>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../Components/style/sidebar.css">

    <div class="sidebar">
        <div class="sidelogo">
            <a href="../home/home.php">
                <img src="../assets/weblogo.png" alt="">
            </a>
           
        </div>
        <div class="options">
            <a href="../home/home.php?type=saving">
                <div class="ologo">
                    <img src="../assets/icon/deposit.png" alt="">
                    <p>Deposit</p>
                </div>
            </a>
            <a href="../loan/loan.php?type=loan">
                <div class="ologo">
                    <img src="../assets/icon/loans.png" alt="">
                    <p>Loan</p>
                </div>
            </a>
            <?php
                if ($isAdmin == 0 ) {
                        ?>
                     <a href="../calculate/calculate.php?bank=none">
                <div class="ologo">
                    <img src="../assets/icon/calculate.png" alt="">
                    <p>Calculate</p>
                </div>
            </a>
            <a href="../starred/starred.php">
                <div class="ologo">
                    <img src="../assets/icon/star.png" alt="">
                    <p>Starred</p>
                </div>
            </a>
            <a href="../history/saving.php">
                <div class="ologo">
                    <img src="../assets/icon/history.png" alt="">
                    <p>History</p>
                </div>
            </a>
                        <?php
                }
            ?>

            <?php
                if ($bank != "none" || $isAdmin == 1 ) {
                    ?>
            <a href="../request/savingFixed.php?type=savingFix">
                <div class="ologo">
                    <img src="../assets/icon/interview.png" alt="">
                    <p>Request</p>
                </div>
            </a>

                    <?php
                }
            ?>
                        <?php
                if($isAdmin == 1){
                    ?>
                                    <a href="../request/savingFixed.php?type=savingFix&option=history">
                <div class="ologo">
                    <img src="../assets/icon/history.png" alt="">
                    <p>History</p>
                </div>
            </a>
                    <?php
                }
            ?>
            <div class="ologo" onclick="onCancel()" style="cursor:pointer" >
            <img src="../assets/icon/turn-off.png" alt="">    
            <p>Logout</p>
            </div>
           
        </div>
    </div>
    <script>
        const onCancel = ()=>{
            const isConfirmed = confirm(`Are you sure you want to Logout`);
        if(isConfirmed){
            window.location.href = "../logout/logout.php";
        }
        }
    </script>
