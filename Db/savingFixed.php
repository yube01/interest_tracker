<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php

include "dbConnect.php";


$query = "SELECT * FROM `saving_fixed` LEFT JOIN star on saving_fixed.sid = star.sf and star.userId = '$userId' ORDER BY saving_fixed.sid ASC";
$result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['name'] ?></td>
            <td style="text-align:center;padding:1rem"><?php echo $row['saving_rate'] ?></td>
            <td style="text-align:center"><?php echo $row['fixed_rate'] ?></td>
            <?php
                if($isAdmin == 0){
                    ?>

            <td id="imageCell" style="text-align:center">
            <img onclick="changeImage(this,'<?php echo $row['sid']; ?>',
            '<?php echo $row['name']; ?>',
            '<?php echo $row['fixed_rate']?>' )" src="<?php
             if($row['isStar'] == 1){
                echo "http://localhost/interest_tracker/assets/icon/star1.png";
             }else{
                echo "http://localhost/interest_tracker/assets/icon/star.png";
             }
             
             
             
             ?>" style="height:1.6rem;width:1.6rem;cursor:pointer" alt="">
            </td>
            <td style="text-align:center">
            <a href="../calculate/depositCalculator.php?srate=<?php echo $row['saving_rate']?>&frate=<?php echo $row['fixed_rate']?>">
            <img src="../assets/icon/calculate.png" style="height:1.6rem;width:1.6rem" alt="">
            </a>
            </td>

                    <?php
                }else{
                    ?>
                    <td style="text-align:center"><img onclick="editInterest()" 
            src="../assets/icon/edit.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></td>
                    <td style="text-align:center"><img onclick="confirmDel('<?php echo $row['sid']; ?>','<?php echo $row['name']; ?>')" 
            src="../assets/icon/bin.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></td>
                    <?php
                }
            ?>
        </tr>


        <?php

    }
            

?>

<script>
    function changeImage(imgElement,sf,name,interest) {

        
        
        var newImageSrc = 'http://localhost/interest_tracker/assets/icon/star1.png';
        var previousImageSrc = 'http://localhost/interest_tracker/assets/icon/star.png';
     
      

        if (imgElement.src === previousImageSrc) {
           
            imgElement.src = newImageSrc;
            $.ajax({
                type: 'POST',
                url: '../Db/savStar.php', // Specify the server-side script to handle the data
                data: { sf:sf ,
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
                data: { sf: sf },
                success: function(response) {
                    console.log(response); // Log the server's response (you can handle it accordingly)
                }
            });
        }
    }
    const confirmDel = (sid,bank)=>{

// Display a confirmation dialog
const isConfirmed = confirm(`Are you sure you want to delete ${bank}?`);

// If the user clicks OK, proceed with the deletion
if (isConfirmed) {
deleteInterest(sid);
}

}


const deleteInterest = (sidf)=>{
console.log(sidf)
$.ajax({
       type: 'POST',
       url: '../Db/admin/delete/deleteBank.php', // Specify the server-sidfe script to handle the data
       data: { sidf: sidf},
       success: function(response) {
           console.log(response); // Log the server's response (you can handle it accordingly)
           location.reload()
       }
   });
}
</script>