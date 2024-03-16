<?php
        if(isset($_GET['msg1'])){
            ?>
    <div class="toast2" id="toast">
        <?php
            
            $msg =  $_GET['msg1'];
            echo $msg;
            ?>
                </div>
                <?php
        }
    ?>