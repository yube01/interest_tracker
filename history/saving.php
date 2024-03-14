

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <title>Saving Calculate History</title>
</head>
<body>

    <div class="container">
        <div class="side">
        <?php
             include "../Components/sidebar.php"
        ?>
        </div>
        <?php
        if(isset($_GET['msg'])){
            ?>
    <div class="toast" id="toast">
        <?php
            
            $msg =  $_GET['msg'];
            echo $msg;
            ?>
                </div>
                <?php
        }
    ?>
        <div class="deposit">
            <div class="sbtn">
                <?php include "../Components/homenav.php" ?>
            </div>
            <div class="first">
            
                <?php include "../Components/history/saving.php" ?>
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