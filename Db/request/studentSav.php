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
        $personal = "select * from student_saving where status in (1,2,3) order by stid desc ";
    }else{
        $personal = "select * from student_saving where bank_name = '$bank' and status in (1,2,3) order by stid desc";
    }

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
    }else{
        ?>
        <tr>
        <td style="text-align:center;padding:1rem" colspan=5>Empty</td>
        </tr>
        <?php
    }
}else{
    
    $personal = "select * from student_saving where status = 1 ";
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
                <td style="text-align:center">
                <button onclick="accept('<?php echo $row['bank_name']?>','<?php echo $row['type']?>','<?php echo $row['interest']?>',
                '<?php echo $row['minBalance']?>','<?php echo $row['code']?>')" 
                style="background-color:#11a111;padding:0.5rem;border:none;border-radius:0.9rem;cursor:pointer;color:white;
                font-weight:bold">
                Accept</button>
                <button onclick="reject('<?php echo $row['bank_name']?>','<?php echo $row['code']?>')"  
                style="background-color:#e12828fc;padding:0.5rem;border:none;border-radius:0.9rem;cursor:pointer;color:white;
                font-weight:bold">Reject</button>
                </td>
                <?php
    
        }
    }else{
        ?>
        <tr>
        <td style="text-align:center;padding:1rem" colspan=5>Empty</td>
        </tr>
        <?php
    }
}

?>

<script>
const accept = (studentSav,type,interest,minBal,code)=>{
console.log(code)
$.ajax({
       type: 'POST',
       url: '../Db/request/accept.php', // Specify the server-sidfe script to handle the data
       data: { studentSav: studentSav,
               type:type,
               interest:interest,
               minBal:minBal,
               code:code
            },
       success: function(response) {
           console.log(response); // Log the server's response (you can handle it accordingly)
           location.reload()
       }
   });
}

const reject = (studentSav,code)=>{
console.log(studentSav)
$.ajax({
       type: 'POST',
       url: '../Db/request/reject.php', // Specify the server-sidfe script to handle the data
       data: { studentSav: studentSav,
               code:code    
            },
       success: function(response) {
           console.log(response); // Log the server's response (you can handle it accordingly)
           location.reload()
       }
   });
}
</script>
