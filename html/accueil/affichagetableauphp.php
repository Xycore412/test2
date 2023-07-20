<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
</head>
<body>

<form action="../intattente/logout.php" method="post" name="logout">
      <input style="float: right;" type="submit" value="Deconnexion" name="deco" class="box-button">
   </form>
    

<form method="post">
    <input type="text" name="q" placeholder="recherche..." />
    <input type="submit" name="valider" />
</form>


 <?php
    session_start();
    require_once 'config2.php';
?>
<?php  
if(isset($_POST['valider']))
{
    $q = $_POST['q'];
    // echo $q;
    $toto = $bdd->prepare("SELECT * FROM ressortissant WHERE num_passeport = '$q'" );
    $toto->execute(array());
    $data = $toto->fetch();?>


     <tr>
          
            <td><?php echo $data['nom']; ?></td>
            <td><?php echo $data['prenom']; ?></td>
            <td><?php echo $data['DDN']; ?></td>
            <td><?php echo $data['num_passeport']; ?></td>
            <form class = "box" action="test.php" method="post">
              <!--<td><input type="checkbox" value="Validation"></td>-->
           <td><input type="checkbox" class = "box-input" name="num_passeport" placeholder="Validation" value='<?php echo $data['num_passeport']; ?>'>
           <input type="submit" value="Validation" name="submit" class="box-button"></td>
          </form>
         

        </tr>


<?php
}
?>






<center>
<h1>tableau ressortissant</h1>
<!-- <button type="button" onclick="alert('ok')">validation!</button>-->
</center>
<table style="width:100%">
    <thead>
      <!--   <tr>
             Rechercher un ressortissant : <input type="text" name="recherche">
     <input type="SUBMIT" value="valider!"> -->
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th>Numéro de passeport</th>
            <th>Validation</th>
           
        </tr>
    </thead>


<?php

// Connection à la Base de Données

if( !function_exists('my_pdo_connexxion') )
{
    function my_pdo_connexxion()
    {
        
        $hostname   = 'localhost';      // voir hébergeur ou "localhost" en local
        $database   = 'resevac';   // nom de la BdD
        $username   = 'admin';           // identifiant "root" 
        $password   = 'admin';               // mot de passe "root"
        // connexion à la Base de Données
        try {
            // chaine de connexion
            $strConn    = 'mysql:host='.$hostname.';dbname='.$database.';charset=utf8; port=3306';  // UTF-8
            $extraParam = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,      
                PDO::ATTR_PERSISTENT => true,               
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                 
                );
            //  connexion
            $pdo = new PDO($strConn, $username, $password, $extraParam);
            return $pdo;
        }
        
        catch(PDOException $e){
            echo 'Échec de la connexion : ' . $e->getMessage();
        }
        
    }
}

$pdo    = my_pdo_connexxion();




// requete des donnée
$query = "SELECT * FROM ressortissant WHERE index_PR != '1'";
  try {
    $pdo_select = $pdo->prepare($query);
    $pdo_select->execute();
    $NbreData = $pdo_select->rowCount(); // nombre d'enregistrements (lignes)
    $rowAll = $pdo_select->fetchAll();
  } catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }

// affichage
if ($NbreData != 0)
{
?>
    
    <tbody>
<?php
    // pour chaque ligne (chaque enregistrement)
    foreach ( $rowAll as $row )
    {
        // DONNEES A AFFICHER dans chaque cellule de la ligne
?>
       
        <tr>
          
            <td><?php echo $row['nom']; ?></td>
            <td><?php echo $row['prenom']; ?></td>
            <td><?php echo $row['DDN']; ?></td>
            <td><?php echo $row['num_passeport']; ?></td>
            <form class = "box" action="test.php" method="post">
              <!--<td><input type="checkbox" value="Validation"></td>-->
           <td><input type="checkbox" class = "box-input" name="num_passeport" placeholder="Validation" value='<?php echo $row['num_passeport']; ?>'>
           <input type="submit" value="Validation" name="submit" class="box-button"></td>
          </form>
         

        </tr>
        <?php
        
        ?>
<?php
    } // fin foreach
?>
    </tbody>
    </table>
<?php
} else { ?>
    
<?php
}
?>
     
</body>
</html>
