<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php

include "dbConnect.php";

if($bank != "none"){
 
    $personal = "select * from personal_loan where name = '$bank' and status = 0 ";
    $perRes = mysqli_query($conn,$personal);

    $num = mysqli_num_rows($perRes);

    if($num <= 0){
        ?>
        <tr>
        <td style="text-align:center;padding:1rem" colspan=3>Empty</td>
        </tr>
        <?php
    }else{
        while ($row = mysqli_fetch_assoc($perRes)) {
            ?>
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td style="text-align:center"><?php echo $row['interest'] ?></td>
                <td style="text-align:center"><a href="../Components/admin/personal.php?id=<?php echo $row['pid']?>"><img onclick="editInterest()" 
                src="../assets/icon/edit.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></a></td>
                <?php
    
        }
    }



}else{
    $query = "SELECT * FROM `personal_loan` as pl LEFT JOIN star on pl.pid = star.pdid and star.userId = '$userId' where pl.status = 0 ORDER BY pl.pid ASC";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['name'] ?></td>
            <td style="text-align:center"><?php echo $row['interest'] ?></td>

            <?php
                if($isAdmin == 0){
                    ?>

            <td id="imageCell" style="text-align:center">
            <img onclick="changeImage(this,'<?php echo $row['pid']; ?>',
            '<?php echo $row['name']; ?>',
            '<?php echo $row['interest']?>','<?php echo $userId;?>' 
            )" src="<?php
             if($row['isStar'] == 1){
                echo "http://localhost/interest_tracker/assets/icon/star1.png";
             }else{
                echo "http://localhost/interest_tracker/assets/icon/star.png";
             }
            ?>" style="height:1.6rem;width:1.6rem;cursor:pointer" alt="">
            </td>

            
            <td style="text-align:center">
            <a href="../calculate/calculate.php?rate=<?php echo $row['interest']?>&bank=<?php echo $row['name']?>&type=Personal Loan&userId=<?php echo $userId?>">
            <img src="../assets/icon/calculate.png" style="height:1.6rem;width:1.6rem" alt="">
            </a>
            </td>

                    <?php
                }else{
                    ?>
                    <td style="text-align:center"><a href="../Components/admin/personal.php?id=<?php echo $row['pid']?>"><img onclick="editInterest()" 
            src="../assets/icon/edit.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></a></td>
            
            <?php
            if($bank == "none"){
                ?>
<td style="text-align:center"><img onclick="confirmDel('<?php echo $row['pid']; ?>','<?php echo $row['name']; ?>')" 
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
}


            

?>
<script>
    function changeImage(imgElement,pdid,name,interest,user) {

        
        
        var newImageSrc = 'http://localhost/interest_tracker/assets/icon/star1.png';
        var previousImageSrc = 'http://localhost/interest_tracker/assets/icon/star.png';
        
      

        if (imgElement.src === previousImageSrc) {
           
            imgElement.src = newImageSrc;
            $.ajax({
                type: 'POST',
                url: '../Db/savStar.php', // Specify the server-side script to handle the data
                data: { pdid: pdid,
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
                data: { pdid: pdid,
                        name:name        
                },
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

    const confirmDel = (pid,bank)=>{

// Display a confirmation dialog
const isConfirmed = confirm(`Are you sure you want to delete ${bank}?`);

// If the user clicks OK, proceed with the deletion
if (isConfirmed) {
deleteInterest(pid);
}

}


const deleteInterest = (pid)=>{
console.log(pid)
$.ajax({
       type: 'POST',
       url: '../Db/admin/delete/deleteBank.php', // Specify the server-side script to handle the data
       data: { pid: pid,
        name:name},
       success: function(response) {
           console.log(response); // Log the server's response (you can handle it accordingly)
           var messageDiv = $('<div>').text(response).addClass('toast1');
                    $('body').append(messageDiv);
                    setTimeout(function() {
                    messageDiv.remove();
                    }, 2000); // Remove after 4 seconds
           location.reload()
       }
   });
}
</script>
    


