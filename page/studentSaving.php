<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../home/style/home.css">
    <title>Student Saving Interest</title>
</head>
<body>
    <div class="container">
        <div class="side">
        <?php
             include "../Components/sidebar.php"
        ?>
        </div>

<?php include "../msgStatus/msg.php" ?> 
<?php include "../msgStatus/msg1.php" ?> 
<?php include "../msgStatus/msg2.php" ?> 

        <div class="deposit">
            <div class="sbtn">
                <?php include "../Components/search.php" ?>
            </div>


           
            <div class="first">
            <?php
                if ($isAdmin == 1 ) {
                    ?>
                   <a href="../Components/admin/Add/student.php">
                    <button>Add Bank</button>
                   </a>
                    <?php
                    
                }
            ?>
           
                <?php include "../Components/studentSaving.php" ?>
            </div>
        </div>
        
       
        
    </div>

    <script>
    setTimeout(function(){
        document.getElementById('toast').style.display = 'none';
    }, 5000); // 4000 milliseconds = 4 seconds
</script>
    
</body>
</html>