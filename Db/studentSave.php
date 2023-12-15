<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php

include "dbConnect.php";

$query = "SELECT * from student_saving  ";
$result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['bank_name'] ?></td>
            <td style="text-align:center;padding:1rem"><?php echo $row['type'] ?></td>
            <td style="text-align:center"><?php echo $row['interest'] ?></td>
            <td style="text-align:center"><?php echo $row['minBalance'] ?></td>

            <td id="imageCell" style="text-align:center">
            <img onclick="changeImage(this,'<?php echo $row['stid']; ?>')" src="../assets/icon/star.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt="">
            </td>

            <td style="text-align:center"><img src="../assets/icon/calculate.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></td>
        </tr>


        <?php

    }
            

?>
<script>
    function changeImage(imgElement,id) {
        
        var newImageSrc = '../assets/icon/star1.png';
        var previousImageSrc = 'http://localhost/interest_tracker/assets/icon/star.png';
        console.log(id)
      

        if (imgElement.src === previousImageSrc) {
           
            imgElement.src = newImageSrc;
            $.ajax({
                type: 'POST',
                url: '../Db/savStar.php', // Specify the server-side script to handle the data
                data: { id: id },
                success: function(response) {
                    console.log(response); // Log the server's response (you can handle it accordingly)
                }
            });
        } else {
            
            imgElement.src = previousImageSrc;
            $.ajax({
                type: 'POST',
                url: '../Db/update.php', // Specify the server-side script to handle the data
                data: { id: id },
                success: function(response) {
                    console.log(response); // Log the server's response (you can handle it accordingly)
                }
            });
        }
    }
</script>
    


