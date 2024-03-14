<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php

include "../Db/dbConnect.php";

if($bank != "none"){
     
    $personal = "select * from personal_loan where name = '$bank' and status in (1,2,3)";
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
                <td style="text-align:center">
                <?php
                    if($row['status'] == 1){
                        echo "Pending";
                    }
                    if($row['status'] == 2){
                        echo "Approved";
                    }
                    if($row['status'] == 3){
                        echo "Rejected";
                    }

                ?>
            </td>
                <?php
    
        }
    }
}else{
     
    $personal = "select * from personal_loan where status = 1 ";
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
                <td style="text-align:center">
                <button onclick="accept('<?php echo $row['name']?>','<?php echo $row['interest']?>','<?php echo $row['code']?>')" 
                style="background-color:#11a111;padding:0.5rem;border:none;border-radius:0.9rem;cursor:pointer;color:white;
                font-weight:bold">
                Accept</button>
                <button onclick="reject('<?php echo $row['name']?>','<?php echo $row['code']?>')"  
                style="background-color:#e12828fc;padding:0.5rem;border:none;border-radius:0.9rem;cursor:pointer;color:white;
                font-weight:bold">Reject</button>
                </td>
                <?php
    
        }
    }
}

?>

<script>
const accept = (personal,interest,code)=>{
console.log(code)
$.ajax({
       type: 'POST',
       url: '../Db/request/accept.php', // Specify the server-sidfe script to handle the data
       data: {  personal: personal,
                interest:interest,
                code:code
            },
       success: function(response) {
           console.log(response); // Log the server's response (you can handle it accordingly)
           location.reload()
       }
   });
}

const reject = (personal,code)=>{

$.ajax({
       type: 'POST',
       url: '../Db/request/reject.php', // Specify the server-sidfe script to handle the data
       data: { personal: personal,
               code:code    
            },
       success: function(response) {
           console.log(response); // Log the server's response (you can handle it accordingly)
           location.reload()
       }
   });
}
</script>

    


