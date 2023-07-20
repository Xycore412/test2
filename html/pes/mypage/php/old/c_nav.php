<?php
    foreach ( $rowAll as $row )
    {
?>
            <option value="<?php echo $row['index_nava'];?>">   
                 
                 <?php echo $row['numero']; ?> 
                    
            </option>

            <?php
    } // fin foreach
            ?>
