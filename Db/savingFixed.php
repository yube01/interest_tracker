<?php

include "dbConnect.php";

$query = "SELECT * from saving_fixed";
$result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['name'] ?></td>
            <td style="text-align:center;padding:1rem"><?php echo $row['saving_rate'] ?></td>
            <td style="text-align:center"><?php echo $row['fixed_rate'] ?></td>
            <td style="text-align:center"><img src="../assets/icon/star.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></td>
            <td style="text-align:center"><img src="../assets/icon/calculate.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></td>
        </tr>


        <?php

    }
            

?>