<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php

include "dbConnect.php";


$query = "SELECT * FROM `student_saving` LEFT JOIN star on student_saving.stid = star.stdSav and star.userId = '$userId' ORDER BY student_saving.stid ASC";
$result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['bank_name'] ?></td>
            <td style="text-align:center;padding:1rem"><?php echo $row['type'] ?></td>
            <td style="text-align:center"><?php echo $row['interest'] ?></td>
            <td style="text-align:center"><?php echo $row['minBalance'] ?></td>

            <?php
                if($isAdmin == 0){
                    ?>

            <td id="imageCell" style="text-align:center">
            <img onclick="changeImage(this,'<?php echo $row['stid']; ?>','<?php echo $row['bank_name']; ?>',
            '<?php echo $row['type']; ?>','<?php echo $row['interest']; ?>','<?php echo $userId;?>' 
            )" src="<?php
             if($row['isStar'] == 1){
                echo "http://localhost/interest_tracker/assets/icon/star1.png";
             }else{
                echo "http://localhost/interest_tracker/assets/icon/star.png";
             }
             
             
             
             ?>" style="height:1.6rem;width:1.6rem;cursor:pointer" alt="">
            </td>

            <td style="text-align:center">
            <a href="../calculate/depositCalculator.php?rate=<?php echo $row['interest']?>&minBal=<?php echo $row['minBalance']?>"><img src="../assets/icon/calculate.png" style="height:1.6rem;width:1.6rem" alt=""></a>
            </td>
                    <?php
                }else{
                    ?>
                    <td style="text-align:center">
                        <a href="../Components/admin/studentSav.php?id=<?php echo $row['stid']?>">
                        <img onclick="editInterest()" 
            src="../assets/icon/edit.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt="">
                        </a>
                    </td>
                    <td style="text-align:center"><img onclick="confirmDel('<?php echo $row['stid']; ?>','<?php echo $row['bank_name']; ?>')" 
            src="../assets/icon/bin.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></td>
                    <?php
                }
            ?>


        </tr>


        <?php

    }
            

?>
<script>
    function changeImage(imgElement,id,bank,type,interest,user) {

        
        
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
                    interest:interest,
                    user:user
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

    const confirmDel = (id,bank)=>{

         // Display a confirmation dialog
        const isConfirmed = confirm(`Are you sure you want to delete ${bank}?`);

        // If the user clicks OK, proceed with the deletion
        if (isConfirmed) {
        deleteInterest(id);
    }
        
    }
    

    const deleteInterest = (id)=>{
        console.log(id)
        $.ajax({
                type: 'POST',
                url: '../Db/admin/delete/deleteBank.php', // Specify the server-side script to handle the data
                data: { id: id},
                success: function(response) {
                    console.log(response); // Log the server's response (you can handle it accordingly)
                    location.reload()
                }
            });
    }

</script>
    


