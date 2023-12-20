

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../home/style/home.css">
    <title>Starred</title>
</head>
<body>
  <!-- <button>
    <a href="../logout/logout.php">logout</a>
  </button> -->
    <div class="container">
        <div class="side">
        <?php
             include "../Components/sidebar.php"
        ?>
        </div>
        <div class="deposit">
            <div class="sbtn">
                <?php include "../Components/search.php" ?>
            </div>
            <div class="first">
            
                <?php include "../Components/starred/starTable.php" ?>
            </div>
        </div>

        
       
        
    </div>
    
</body>
</html>