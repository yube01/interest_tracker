<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php

include "dbConnect.php";

if($bank != "none"){
 
    $personal = "select * from education_loan where name = '$bank' and status = 0 ";
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
                <td style="text-align:center"><?php echo $row['interest'] ?></td>
                <td style="text-align:center"><a href="../Components/admin/studentLoan.php?id=<?php echo $row['eid']?>"><img onclick="editInterest()" 
                src="../assets/icon/edit.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></a></td>
                <?php
    
        }
    }


  

}else{
    if(isset($_GET['search'])){
        $searchName = $_GET['search'];
        $query = "select * from `education_loan` as el LEFT JOIN star on el.eid = star.edid and star.userId = '$userId' where el.name LIKE '%$searchName%' and el.status = 0 ORDER BY el.eid ASC ";
    }else{
        $query = "SELECT * FROM `education_loan` as el LEFT JOIN star on el.eid = star.edid and star.userId = '$userId' where el.status = 0 ORDER BY el.eid ASC";
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
            <td style="text-align:center"><?php echo $row['interest'] ?></td>

            <?php
                     if($isAdmin == 1 || $bank !== "none"){
                        ?>
                        <td style="text-align:center">
                            <a href="../Components/admin/studentLoan.php?id=<?php echo $row['eid']?>">
                            <img onclick="editInterest()" 
            src="../assets/icon/edit.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt="">
                            </a>
                        </td>
                        <?php
            if($bank == "none"){
                ?>
<td style="text-align:center"><img onclick="confirmDel('<?php echo $row['eid']; ?>','<?php echo $row['name']; ?>')" 
            src="../assets/icon/bin.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></td>
                <?php
            }
            ?>
                        <?php
                        
                    }else{
                        ?>
                         <td id="imageCell" style="text-align:center">
            <img onclick="changeImage(this,'<?php echo $row['eid']; ?>',
            '<?php echo $row['name']; ?>',
            '<?php echo $row['interest']; ?>','<?php echo $userId;?>' 
            )" src="<?php
             if($row['isStar'] == 1){
                echo "http://localhost/interest_tracker/assets/icon/star1.png";
             }else{
                echo "http://localhost/interest_tracker/assets/icon/star.png";
             }
             
             
             
             ?>" style="height:1.6rem;width:1.6rem;cursor:pointer" alt="">
            </td>

            <td style="text-align:center">
            <a href="../calculate/calculate.php?rate=<?php echo $row['interest']?>&bank=<?php echo $row['name']?>&type=Student Loan&userId=<?php echo $userId?>">
            <img src="../assets/icon/calculate.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt="">
            </a>
        </td>
                        <?php
                    }?>
           
        </tr>


        <?php

    }
}
}


            

?>
<script>
    function changeImage(imgElement,edid,name,interest,user) {

        
        
        var newImageSrc = 'http://localhost/interest_tracker/assets/icon/star1.png';
        var previousImageSrc = 'http://localhost/interest_tracker/assets/icon/star.png';
        
      

        if (imgElement.src === previousImageSrc) {
           
            imgElement.src = newImageSrc;
            $.ajax({
                type: 'POST',
                url: '../Db/savStar.php', // Specify the server-side script to handle the data
                data: { edid: edid,
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
                data: { edid: edid,name:name },
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

    const confirmDel = (eid,bank)=>{

// Display a confirmation dialog
const isConfirmed = confirm(`Are you sure you want to delete ${bank}?`);

// If the user clicks OK, proceed with the deletion
if (isConfirmed) {
deleteInterest(eid,bank);
}

}


const deleteInterest = (eid,name)=>{
console.log(eid)
$.ajax({
       type: 'POST',
       url: '../Db/admin/delete/deleteBank.php', // Specify the server-side script to handle the data
       data: { eid: eid,name:name},
       success: function(response) {
           console.log(response); // Log the server's response (you can handle it accordingly)
           window.location.href = `http://localhost/interest_tracker/page/studentLoan.php?msg2=${name} detail deleted`;
       }
   });
}

</script>
    


