<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php

include "dbConnect.php";
include "../session/session.php";

$query = "SELECT * FROM `education_loan` LEFT JOIN star on education_loan.eid = star.edid and star.userId = '$userId' ORDER BY education_loan.eid ASC";
$result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['name'] ?></td>
            <td style="text-align:center"><?php echo $row['interest'] ?></td>

            <?php
                    if (isset($_SESSION['isAdmin']) == 0 ) {
                        ?>
                        <td>Edit</td>
                        <td>Delete</td>
                        <?php
                        
                    }else{
                        ?>
                         <td id="imageCell" style="text-align:center">
            <img onclick="changeImage(this,'<?php echo $row['eid']; ?>',
            '<?php echo $row['name']; ?>',
            '<?php echo $row['interest']; ?>'
            )" src="<?php
             if($row['isStar'] == 1){
                echo "http://localhost/interest_tracker/assets/icon/star1.png";
             }else{
                echo "http://localhost/interest_tracker/assets/icon/star.png";
             }
             
             
             
             ?>" style="height:1.6rem;width:1.6rem;cursor:pointer" alt="">
            </td>

            <td style="text-align:center">
            <a href="../calculate/calculate.php?rate=<?php echo $row['interest']?>">
            <img src="../assets/icon/calculate.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt="">
            </a>
        </td>
                        <?php
                    }?>
           
        </tr>


        <?php

    }
            

?>
<script>
    function changeImage(imgElement,edid,name,interest) {

        
        
        var newImageSrc = 'http://localhost/interest_tracker/assets/icon/star1.png';
        var previousImageSrc = 'http://localhost/interest_tracker/assets/icon/star.png';
        
      

        if (imgElement.src === previousImageSrc) {
           
            imgElement.src = newImageSrc;
            $.ajax({
                type: 'POST',
                url: '../Db/savStar.php', // Specify the server-side script to handle the data
                data: { edid: edid,
                        name:name,
                        interest:interest
                },
                success: function(response) {
                    console.log(response); // Log the server's response (you can handle it accordingly)
                }
            });
        } else {
            
            imgElement.src = previousImageSrc;
            $.ajax({
                type: 'POST',
                url: '../Db/update.php', // Specify the server-side script to handle the data
                data: { edid: edid },
                success: function(response) {
                    console.log(response); // Log the server's response (you can handle it accordingly)
                }
            });
        }
    }
</script>
    


