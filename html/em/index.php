<!DOCTYPE html>
<html>
<header>
	<meta charset="utf-8">
	<title>Embarquement</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</header>
<body>
<?php
include("php/conf.php");
include("php/query1.php");
?>
    <table id="tableau">
    <thead>
        <tr>
            <th>Numéro de navette</th>
            <th>Nom de la navette</th>
            <th>Place</th>
            <th>Position</th>

        </tr>
    </thead>
    <tbody>
<?php
    // pour chaque ligne (chaque enregistrement)
    foreach ( $rowAll as $row )
    {
        // DONNEES A AFFICHER dans chaque cellule de la ligne
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
    </tbody>
    </table>



        <div id='choixnav'>
<form class="box" method="post"  id="seletc">
          <select name="nav_list" id="slct" onchange="">
            <optgroup label="Navette">
            <option label="--Choisir la navette--"></option>*
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
        </select>
       <input type="submit" value="Entrer" name="submit" class="box-button" id="boutton">
    </form>

    
</div>
<form method="post" id="nav_list">
<?php
include("php/nav_list.php")

?>
       <p>navette sélect : <?php echo($nav_list)?></p>
    <table id="tableau" >
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
        </tr>
    </thead>
    <tbody>
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

        </tr>
<?php
    } // fin foreach
?>

    </tbody>
    </table>
    
<?php
if($_POST['submitt']){
    $result = "UPDATE ressortissant SET index_PR= 3 WHERE index_nav = $nav_list";
    $query3 = $pdo->prepare($result);
    $query3->execute(array($submit));
    $data = $query3->fetchAll();

    // $result2 = "UPDATE navette SET index_posnav = 2 WHERE index_nava = $nav_list";
    // $query4 = $pdo->prepare($result2);
    // $query4->execute(array($submite));
    // $data = $query4->fetchAll();

echo "Position changé";
}

?>



    <input type="submit" name="submitt" value="Envoyer" id="boutton">
</form>


</body>
</html>