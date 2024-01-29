<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<?php

include "../Db/dbConnect.php";


$query = "SELECT bank,types,interests,starid from star where userId = '$userId' and isStar = '1'";
$result = mysqli_query($conn, $query);
$nums = mysqli_num_rows($result);

   if($nums > 0){
    while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['bank'] ?></td>
            <td style="text-align:center;padding:1rem"><?php echo $row['types'] ?></td>
            <td style="text-align:center"><?php echo $row['interests'] ?></td>
            
            <td style="text-align:center"><img onclick="deleteStar('<?php echo $row['starid']?>',
            '<?php echo $row['bank']?>')" 
            src="../assets/icon/bin.png" style="height:1.6rem;width:1.6rem;cursor:pointer" alt=""></td>
        </tr>


        <?php

    }
   }else{
    ?>
    <tr>
       <td colspan=4 style="text-align:center;font-weight:bold">Empty</td>
    </tr>


    <?php
   }
            

?>

<script>
    function deleteStar(id,bank) {
            $.ajax({
                type: 'POST',
                url: '../Db/starred/deleteStar.php', // Specify the server-side script to handle the data
                data: { id:id,
                        bank:bank 
                    },
                success: function(response) {
                    console.log(response)
                    setTimeout(() => {
                        
                        location.reload()
                    }, 2000); // Log the server's response (you can handle it accordingly)
                }
            });
            }
</script>