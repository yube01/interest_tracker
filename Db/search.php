<?php

include "dbConnect.php";



    $searchName = $_POST['search'];

 
    $personal = "select * from saving_fixed where name LIKE '%$searchName%' and status = 0 ";
    $perRes = mysqli_query($conn,$personal);

    $num = mysqli_num_rows($perRes);

    if($num <= 0){
        ?>
        <tr>
        <td style="text-align:center;padding:1rem" colspan=3>Not Found</td>
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
?>