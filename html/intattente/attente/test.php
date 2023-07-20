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

}else header('Location : ../inscription/connexionpage.php');

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
<link rel="stylesheet" href="style3.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>

<form action="../logout.php" method="post" name="logout">
      <input style="float: right;" type="submit" value="Deconnexion" name="deco" class="box-button">
   </form>

<br><center><h1>Interface Attente</h1></center>

<!-- infos pour connexion bdd -->
<?php
  $host = 'localhost';
  $dbname = 'resevac';
  $username = 'admin';
  $password = 'admin';   
  $dsn = "mysql:host=$host;dbname=$dbname"; 

  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM ressortissant WHERE index_PR = '1'";

  // récupérer id navette
  $sql2 = "SELECT * FROM navette WHERE index_posnav = '1'";

  $sql3 = "SELECT numero, place, index_nav FROM navette WHERE index_posnav='1'";

  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>

<!-- la requête permet de sélectionner et compter toutes les lignes possédant un id -->
<?php
try {
$pdo_select = $pdo->prepare($sql2);
$pdo_select->execute();
$nbdata = $pdo_select->rowCount();
$rowAll = $pdo_select->fetchAll();
}catch (PDOException $e){ echo 'Erreur SQL :' . $e->getMessage().'<br/>'; die();}?>


<?php
try {
$pdo_select1 = $pdo->prepare($sql3);
$pdo_select1->execute();
$nbdata1 = $pdo_select1->rowCount();
$rowAll1 = $pdo_select1->fetchAll();
}catch (PDOException $e){ echo 'Erreur SQL :' . $e->getMessage().'<br/>'; die();}?>

 <center><?php
    foreach($rowAll1 as $row2)
    {
    ?>
  
      <?php 
      $rowreq = $row2['index_nav'];
      $requp = "SELECT COUNT(*) as prises FROM ressortissant WHERE index_nav='$rowreq'";

      try {
      $pdo_select3 = $pdo->query($requp);
      $rowAll3 = $pdo_select3->fetch();
      }catch (PDOException $e){ echo 'Erreur SQL :' . $e->getMessage().'<br/>'; die();}
      ?>

<!--<?php $prises = $rowAll3['prises'];
      $place = $row2['place'];
      print_r($prises)
    ?>-->
 
 <br>Il y a 
      <?php echo $rowAll3['prises'];?> places prises sur <?php echo $row2['place'];?> sur la navette 
      <?php echo $row2['numero'];?>.
      <?php
  }
       ?></br></center>


     <br><?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <center><tr>
     <form class="" action="nb.php" method="post" name="login">
			
			<?php echo htmlspecialchars($row['nom']); ?>
			<?php echo htmlspecialchars($row['prenom']); ?>
			<input type="checkbox" class="box-input" name="identifiant" value='<?php echo htmlspecialchars($row['index_ressortissant']); ?>'>

<!-- on demande d'afficher les différents ids pourque l'on puisse choisir -->
	<select name="num" >
    <option value="">Numéro de navette</option>
    <?php
    foreach($rowAll as $row1)
    {
    ?>
    <option value="<?php echo $row1['index_nav'];?>"><?php echo $row1['numero'];?></option>
    <?php
    }
    ?>
    </select>
 		<input type="submit" value="Entrez " name="submit" class="box-button">
   </form>
     </tr>
          <?php endwhile; ?>

 </center>

</body>
</html>

<!--$data["id"] ." ". $data["identifiant"] ." ". $data["password"]
