<?php
    foreach ( $rowAll as $row )
    {
        
?>
        <tr>
            <td><?php echo $row['index_nav']; ?></td>
            <td><?php echo $row['numero']; ?></td>
            <td><?php echo $row['place']; ?></td>
            <td><?php echo $row['position_navette']?></td>
        </tr>
<?php
    } // fin foreach
?>