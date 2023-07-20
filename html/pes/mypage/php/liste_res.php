<?php
    // pour chaque ligne (chaque enregistrement)
    foreach ( $data as $row )
    {
        // DONNEES A AFFICHER dans chaque cellule de la ligne
?>
        <tr>
            <td><?php echo $row['nom']; ?></td>
            <td><?php echo $row['prenom']; ?></td>
            <td><?php echo $row['DDN']; ?></td>
            <td><input type="checkbox" class = "box-input" name="num_passeport" placeholder="Validation" value='<?php include("php/test.php")?>'><input type="submit" value="Validation" name="submit" class="box-button"></td>
        </tr>
        
<?php
    } // fin foreach
?>

    </tbody>
    </table>
    
<?php
if($_POST['submite']){
    $result = "UPDATE ressortissant SET index_PR= 4 WHERE index_nav = $nav_list;UPDATE navette SET index_posnav = 3 WHERE index_nava = $nav_list";
    $query3 = $pdo->prepare($result);
    $query3->execute(array($submit));
    $data = $query2->fetchAll();

echo "Position changé";
}

?>