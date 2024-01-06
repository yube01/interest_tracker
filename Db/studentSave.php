<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php

include "dbConnect.php";
include "../session/session.php";

$query = "SELECT * FROM `student_saving` LEFT JOIN star on student_saving.stid = star.stdSav and star.userId = '$userId' ORDER BY student_saving.stid ASC";
$result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['bank_name'] ?></td>
            <td style="text-align:center;padding:1rem"><?php echo $row['type'] ?></td>
            <td style="text-align:center"><?php echo $row['interest'] ?></td>
            <td style="text-align:center"><?php echo $row['minBalance'] ?></td>

            <td id="imageCell" style="text-align:center">
            <img onclick="changeImage(this,'<?php echo $row['stid']; ?>','<?php echo $row['bank_name']; ?>',
            '<?php echo $row['type']; ?>','<?php echo $row['interest']; ?>'
            )" src="<?php
             if($row['isStar'] == 1){
                echo "http://localhost/interest_tracker/assets/icon/star1.png";
             }else{
                echo "http://localhost/interest_tracker/assets/icon/star.png";
             }
             
             
             
             ?>" style="height:1.6rem;width:1.6rem;cursor:pointer" alt="">
            </td>

            <td style="text-align:center">
            <a href="../calculate/calculate.php?rate=<?php echo $row['interest']?>&minBal=<?php echo $row['minBalance']?>"><img src="../assets/icon/calculate.png" style="height:1.6rem;width:1.6rem" alt=""></a>
            </td>
        </tr>


        <?php

    }
            

?>
<script>
    function changeImage(imgElement,id,bank,type,interest) {

        
        
        var newImageSrc = 'http://localhost/interest_tracker/assets/icon/star1.png';
        var previousImageSrc = 'http://localhost/interest_tracker/assets/icon/star.png';
        
      

        if (imgElement.src === previousImageSrc) {
           
            imgElement.src = newImageSrc;
            $.ajax({
                type: 'POST',
                url: '../Db/savStar.php', // Specify the server-side script to handle the data
                data: { id: id,
                    bank:bank,
                    type:type,
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
                data: { id: id},
                success: function(response) {
                    console.log(response); // Log the server's response (you can handle it accordingly)
                }
            });
        }
    }
</script>
    


