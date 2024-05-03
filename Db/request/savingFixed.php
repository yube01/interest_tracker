<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php

include "../Db/dbConnect.php";
$option = 0;
if(isset($_GET['type']) && isset($_GET['option'])){
    $type = $_GET['type'];
    $option=1;
}

if($bank != "none" || $option == 1){
 
    if($option == 1){
        $personal = "select * from saving_fixed where status in (1,2,3) ";
    }else{
        $personal = "select * from saving_fixed where name = '$bank' and status in (1,2,3) ";
    }

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
            <td style="text-align:center;color:white;font-weight:700;font-size:1.2rem; <?php
            if($row['status'] == 1){
                echo "background-color: orange;";
            }
            if($row['status'] == 2){
                echo "background-color: green;";
            }
            if($row['status'] == 3){
                echo "background-color: red;";
            }
            ?>">
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
    $personal = "select * from saving_fixed where status = 1 ";
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
            <td style="text-align:center">
                <button onclick="accept('<?php echo $row['name']?>','<?php echo $row['saving_rate']?>','<?php echo $row['fixed_rate']?>','<?php echo $row['code']?>')" style="background-color:#11a111;padding:0.5rem;border:none;border-radius:0.9rem;cursor:pointer;color:white;
                font-weight:bold">
                Accept</button>
                <button onclick="reject('<?php echo $row['name']?>','<?php echo $row['code']?>')"  style="background-color:#e12828fc;padding:0.5rem;border:none;border-radius:0.9rem;cursor:pointer;color:white;
                font-weight:bold">Reject</button>
            </td>
                <?php
    
        }
    } 
}

?>
<script>
const accept = (savFix,saving,fixed,code)=>{
console.log(code)
$.ajax({
       type: 'POST',
       url: '../Db/request/accept.php', // Specify the server-sidfe script to handle the data
       data: { savFix: savFix,
                saving:saving,
                fixed:fixed,
                code:code
            },
       success: function(response) {
           console.log(response); // Log the server's response (you can handle it accordingly)
           location.reload()
       }
   });
}

const reject = (savFix,code)=>{
console.log(savFix)
$.ajax({
       type: 'POST',
       url: '../Db/request/reject.php', // Specify the server-sidfe script to handle the data
       data: { savFix: savFix,
               code:code    
            },
       success: function(response) {
           console.log(response); // Log the server's response (you can handle it accordingly)
           location.reload()
       }
   });
}
</script>
        
