<?php
        if(isset($_GET['msg'])){
            ?>
    <div class="toast" id="toast">
        <?php
            
            $msg =  $_GET['msg'];
            echo $msg;
            ?>
                </div>
                <?php
        }
    ?>