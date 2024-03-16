<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php

include "dbConnect.php";


if($bank != "none"){
 
    $personal = "select * from student_saving where bank_name = '$bank' and status = 0 ";
    $perRes = mysqli_query($conn,$personal);

    $num = mysqli_num_rows($perRes);
    if($num > 0){
        while ($row = mysqli_fetch_assoc($perRes)) {
            ?>
            <tr>
                <td><?php echo $row['bank_name'] ?></td>
                <td style="text-align:center;padding:1rem"><?php echo $row['type'] ?></td>
                <td style="text-align:center"><?php echo $row['interest'] ?></td>
                <td style="text-align:center"><?php echo $row['minBalance'] ?></td>
                <td style="text-align:center"><a href="../Components/admin/studentSav.php?id=<?php echo $row['stid']?>"><img onclick="editInterest()" 
                src="../assets/icon/edit.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></a></td>
                <?php
    
        }
    }else{
        ?>
        <tr>
        <td style="text-align:center;padding:1rem" colspan=5>Empty</td>
        </tr>
        <?php
    }
    

    

}else{

    $query = "SELECT * FROM `student_saving` as ss LEFT JOIN star on ss.stid = star.stdSav and star.userId = '$userId' where ss.status = 0 ORDER BY ss.stid ASC";
 
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
            <a href="../calculate/simpleCalculate.php?rate=<?php echo $row['interest']?>&minBal=<?php echo $row['minBalance']?>&bank=<?php echo $row['bank_name']?>&type=<?php echo $row['type']?>&userId=<?php echo $userId?>"><img src="../assets/icon/calculate.png" style="height:1.6rem;width:1.6rem" alt=""></a>
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
                    <?php
            if($bank == "none"){
                ?>
<td style="text-align:center"><img onclick="confirmDel('<?php echo $row['stid']; ?>','<?php echo $row['bank_name']; ?>')" 
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
                data: { id: id,bank:bank},
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

    const confirmDel = (id,bank)=>{

         // Display a confirmation dialog
        const isConfirmed = confirm(`Are you sure you want to delete ${bank}?`);

        // If the user clicks OK, proceed with the deletion
        if (isConfirmed) {
        deleteInterest(id,bank);
    }
        
    }
    

    const deleteInterest = (id,name)=>{
        console.log(id)
        $.ajax({
                type: 'POST',
                url: '../Db/admin/delete/deleteBank.php', // Specify the server-side script to handle the data
                data: { id: id,name:name},
                success: function(response) {
                    console.log(response); // Log the server's response (you can handle it accordingly)
                    window.location.href = `http://localhost/interest_tracker/page/studentSaving.php?msg2=${name} detail deleted`;
                }
            });
    }

</script>
    


