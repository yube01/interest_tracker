<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php

include "dbConnect.php";



if($bank != "none"){
 
    $personal = "select * from saving_fixed where name = '$bank' and status = 0 ";
    $perRes = mysqli_query($conn,$personal);

    $num = mysqli_num_rows($perRes);
    
    if($num <= 0){
        ?>
        <tr>
        <td style="text-align:center;padding:1rem" colspan=4>Empty</td>
        </tr>
        <?php
    }else{
        
         while ($row = mysqli_fetch_assoc($perRes)) {
            ?>
            <tr>
            <td><?php echo $row['name'] ?></td>
            <td style="text-align:center;padding:1rem"><?php echo $row['saving_rate'] ?></td>
            <td style="text-align:center"><?php echo $row['fixed_rate'] ?></td>
            <td style="text-align:center"><a href="../Components/admin/editSavFix.php?id=<?php echo $row['sid']?>"><img onclick="editInterest()" 
            src="../assets/icon/edit.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></a></td>
                <?php
    
        }
    }


}
else{
    if(isset($_GET['search'])){
        $searchName = $_GET['search'];
        $query = "select * from saving_fixed as sfi LEFT JOIN star on sfi.sid = star.sf and star.userId = '$userId' where sfi.name LIKE '%$searchName%' and sfi.status = 0 ORDER BY sfi.sid ASC ";
    }else{
        
    $query = "SELECT * FROM `saving_fixed` as sfi LEFT JOIN star on sfi.sid = star.sf and star.userId = '$userId' where sfi.status = 0 ORDER BY sfi.sid ASC";

    }
    $result = mysqli_query($conn, $query);

    $num = mysqli_num_rows($result);
    
    if($num <= 0){
        ?>
        <tr>
        <td style="text-align:center;padding:1rem" colspan=5>Empty</td>
        </tr>
        <?php
    }else{



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
                    '<?php echo $row['fixed_rate']?>','<?php echo $userId;?>' )" src="<?php
                     if($row['isStar'] == 1){
                        echo "http://localhost/interest_tracker/assets/icon/star1.png";
                     }else{
                        echo "http://localhost/interest_tracker/assets/icon/star.png";
                     }
                     
                     
                     
                     ?>" style="height:1.6rem;width:1.6rem;cursor:pointer" alt="">

            </td>
            <td style="text-align:center">
  
             

                        <a href="../calculate/simpleCalculate.php?rate=<?php echo $row['saving_rate']?>&bank=<?php echo $row['name']?>&type=Saving Account&userId=<?php echo $userId?>" 
                        style="text-decoration:none;color:inherit;">
            Saving Account
            </a>
            <br>
            <br>
            <a href="../calculate/depositCalculator.php?rate=<?php echo $row['fixed_rate']?>&bank=<?php echo $row['name']?>&type=Fixed Account&userId=<?php echo $userId?>" 
            style="text-decoration:none;color:inherit;">
            Fixed Account
            </a>
                        

                    <?php
                }else{
                    ?>
                    <td style="text-align:center"><a href="../Components/admin/editSavFix.php?id=<?php echo $row['sid']?>"><img src="../assets/icon/edit.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></a></td>
                    <?php
            if($bank == "none"){
                ?>
<td style="text-align:center"><img onclick="confirmDel('<?php echo $row['sid']; ?>','<?php echo $row['name']; ?>')" 
            src="../assets/icon/bin.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></td>
                <?php
            }
            ?>
                    <?php
                }
            ?>
        </tr>


        <?php

    }

}}


            

?>
        

<script>

    

    function changeImage(imgElement,sf,name,interest,user) {

        
        
        var newImageSrc = 'http://localhost/interest_tracker/assets/icon/star1.png';
        var previousImageSrc = 'http://localhost/interest_tracker/assets/icon/star.png';
     
      

        if (imgElement.src === previousImageSrc) {
           
            imgElement.src = newImageSrc;
            $.ajax({
                type: 'POST',
                url: '../Db/savStar.php', // Specify the server-side script to handle the data
                data: { sf:sf ,
                        name:name,
                        interest:interest,
                        user:user
                        
                },
                success: function(response) {
                    console.log(response); // Log the server's response (you can handle it accordingly)
                    var messageDiv = $('<div>').text(response).addClass('toast2');
                    $('body').append(messageDiv);
                    setTimeout(function() {
                    messageDiv.remove();
                    }, 2000); // Remove after 4 seconds
                }
            });
        } else {
            
            imgElement.src = previousImageSrc;
            $.ajax({
                type: 'POST',
                url: '../Db/update.php', // Specify the server-side script to handle the data
                data: { sf: sf,name:name },
                success: function(response) {
                    console.log(response); // Log the server's response (you can handle it accordingly)
                    var messageDiv = $('<div>').text(response).addClass('toast1');
                    $('body').append(messageDiv);
                    setTimeout(function() {
                    messageDiv.remove();
                    }, 2000); // Remove after 4 seconds
                }
            });
        }
    }
    const confirmDel = (sid,bank)=>{

// Display a confirmation dialog
const isConfirmed = confirm(`Are you sure you want to delete ${bank}?`);

// If the user clicks OK, proceed with the deletion
if (isConfirmed) {
deleteInterest(sid,bank);
}

}


const deleteInterest = (sidf,name)=>{
console.log(sidf)
$.ajax({
       type: 'POST',
       url: '../Db/admin/delete/deleteBank.php', // Specify the server-sidfe script to handle the data
       data: { sidf: sidf,name:name},
       success: function(response) {
           console.log(response); // Log the server's response (you can handle it accordingly)
           window.location.href = `http://localhost/interest_tracker/home/home.php?msg2=${name} detail deleted`;
       }
   });
}
</script>