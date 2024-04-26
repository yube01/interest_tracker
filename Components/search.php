<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../Components/style/search.css">
    <title>Search</title>
</head>
<body>
    <nav>

        <div class="banks">
            <a href="../home/home.php?type=saving">
            <div class="firsts">
                Saving and Fixed
            </div>
            </a>
            <a href="../page/studentSaving.php?type=studentSav">
            <div class="firsts">
                Student Saving
            </div>
            </a>
            <a href="../loan/loan.php?type=loan">
            <div class="firsts">
                Personal Loan
            </div>
            </a>
            <a href="../page/studentLoan.php?type=studentloan">
            <div class="firsts">
                Student Loan
            </div>
            </a>
        </div>

        <?php
        if(isset($_GET['type'])){
            $type = $_GET['type'];
        }
                    if ($bank !== "none") {
                        ?>

                    
                        <?php
                        
                    }else{
                        if($type == 'saving'){
                            ?>
                            <form class="search" action="../home/home.php">
                                <input type="text" placeholder="Search" name="search" required>
                                <input type="hidden" name="type" value="<?php echo $type?>">
                                <button type="submit">
                                <img src="../assets/icon/search.png" alt="">
                                </button>
                    
                            </form>
                                            <?php
                        }
                        if($type == 'studentSav'){
                            ?>
                            <form class="search" action="../page/studentSaving.php">
                                <input type="text" placeholder="Search" name="search" required>
                                <input type="hidden" name="type" value="<?php echo $type?>">
                                <button type="submit">
                                <img src="../assets/icon/search.png" alt="">
                                </button>
                    
                            </form>
                                            <?php
                        }
                        if($type == 'loan'){
                            ?>
                            <form class="search" action="../loan/loan.php">
                                <input type="text" placeholder="Search" name="search" required>
                                <input type="hidden" name="type" value="<?php echo $type?>">
                                <button type="submit">
                                <img src="../assets/icon/search.png" alt="">
                                </button>
                    
                            </form>
                                            <?php
                        }
                        if($type == 'studentloan'){
                            ?>
                            <form class="search" action="../page/studentLoan.php">
                                <input type="text" placeholder="Search" name="search" required>
                                <input type="hidden" name="type" value="<?php echo $type?>">
                                <button type="submit">
                                <img src="../assets/icon/search.png" alt="">
                                </button>
                    
                            </form>
                                            <?php
                        }
                      
                    }?>


    
    </nav>
    
</body>
</html>