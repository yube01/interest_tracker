<?php

include "../Db/dbConnect.php";

$personal = "select * from history where userId = '$userId' and type not in ('Student Loan','Personal Loan') order by hid desc";
$perRes = mysqli_query($conn,$personal);

$num = mysqli_num_rows($perRes);

if($num <= 0){
    ?>
    <tr>
    <td style="text-align:center;padding:1rem" colspan=7>Empty</td>
    </tr>
    <?php
}else{
    
     while ($row = mysqli_fetch_assoc($perRes)) {
        ?>
        <tr>
        <td><?php echo $row['bank'] ?></td>
        <td style="text-align:center;padding:1rem"><?php echo $row['type'] ?></td>
        <td style="text-align:center"><?php echo $row['principle'] ?></td>
        <td style="text-align:center"><?php echo $row['time'] ?></td>
        <td style="text-align:center"><?php echo $row['rate'] ?></td>
        <td style="text-align:center"><?php echo $row['result'] ?></td>
        <td style="text-align:center"><?php echo $row['total'] ?></td>
            <?php

    }
}

?>