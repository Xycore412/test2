<html>
<head> 
<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8"> 

  <link rel="stylesheet" href="style.css" />

</head>
<body>
       <form action="../intattente/logout.php" method="post" name="logout">
      <input style="float: right;" type="submit" value="Deconnexion" name="deco" class="box-button">
   </form>

   <form action="zozo.php" method="post" name="supprimer">
   <input type="submit"  name="supp" value="Suppression ressortissant">
</form>


<?php 


session_start();

$pdo = new PDO('mysql:host=localhost;dbname=resevac','admin','admin');

  if (isset($_POST['supp'])) {

    $delete = $pdo->prepare('DELETE FROM `ressortissant` WHERE 1');
    $delete->execute();
    $data = $delete->fetch();
    header('Location: index.php?Supression_avec_succès_!');
  }

 ?>

<?php 

echo "<br>";
echo "<br>";
$pdo = new PDO('mysql:host=localhost;dbname=resevac','admin','admin');
 
// Comptage du nombre de ressortissant validé a l'accueil
$count_accueil = $pdo->query("SELECT COUNT(*) FROM ressortissant WHERE index_PR = 1")->fetchColumn();


// Comptage du nombre de ressortissant validé a l'accueil
$count_attente = $pdo->query("SELECT COUNT(*) FROM ressortissant WHERE index_PR = 2")->fetchColumn();

// Comptage du nombre de ressortissant validé a l'accueil
$count_embarquement = $pdo->query("SELECT COUNT(*) FROM ressortissant WHERE index_PR = 3")->fetchColumn();

// Comptage du nombre de ressortissant validé a l'accueil
$count_pes = $pdo->query("SELECT COUNT(*) FROM ressortissant WHERE index_PR = 4")->fetchColumn();

// // Comptage du nombre de ressortissant validé a l'accueil
$count_prevu = $pdo->query("SELECT COUNT(*) FROM ressortissant WHERE index_PR = 0")->fetchColumn();

//Comptage du nombre de ressortissant validé a l'accueil
// $count_total = $pdo->query("SELECT COUNT(*) FROM ressortissant")->fetchColumn();





// echo "<br>";
// echo "<br>";

echo "<html><body><center><table>\n\n"; 
    echo "<tr> " ;
    echo "<th class='gray'>";
    // echo "<td> Nombre de ressortissant ";
    //  echo "<img src='img.png' height='25px' width='25px'>";
      
      echo "<th> Prévu";
      echo "<th> Acceuil";
      echo "<th> Attente";
      echo "<th> Embarquement";
      echo "<th> PES";
      // echo "<th> Total";
    echo "</tr> \n";

    echo "<tr> " ;
      echo "<td> Nombre de ressortissant ";
      echo "<img src='img.png' height='25px' width='25px'>";
      echo "<td>" . $count_prevu . "</td>";
      echo "<td>" . $count_accueil . "</td>";
      echo "<td>" . $count_attente . "</td>";
      echo "<td>" . $count_embarquement . "</td>";
      echo "<td>" . $count_pes . "</td>";
      // echo "<td>" . $count_total . "</td>";
    echo "</tr> \n";

echo "\n</table></center></body></html> "; 

header("Refresh: 320;");

// echo "<br>";
// echo "<br>";
// echo "<br>";
// echo "<br>";
?> 





<?php 

session_start();
require_once 'config2.php';

if(isset($_SESSION['user']))
{

  $session = $_SESSION['user'];
  
  $verif = $bdd->prepare("SELECT poste FROM utilisateurs WHERE identifiant = ?");
  $verif->execute(array($session));
  $test = $verif->fetch();
  $grp =  $test[0];

  // echo $grp;

}else header('Location : /inscription/connexionpage.php');


?>






<br><br><br>



						<!-- Menu déroulant -->
<div class="dropdown" style="padding-left: 42%;">
  <button class="dropbtn">Visualisation des opération</button>
  <div class="dropdown-content">
    <a href="Inscription_ressortissant.php" target="iframe_a">Inscription d'un ressortissant manuel</a>
    <a href="formulaire_navette.html" target="iframe_a">Ajout de navette</a>
    <a href="test.php" target="iframe_a">Inscription des ressortissant script</a>
    <a href="../em/index.php" target="iframe_a">Visu des navettes</a>


  
  </div>
</div>




<style>


table, td, tr, th{

    padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
}

.gray{
  background-color: gray;
}

img{
  padding-left: 5px;
  padding-top: auto;
}
</style>


<br><br><br>

 						<!-- Iframe -->
<iframe name="iframe_a" width="100%" height="900px" frameborder="1"></iframe>

</body>
	
</html>



