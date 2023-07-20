<html>
<head> <meta charset="utf-8">
<link rel="stylesheet" href="style2.css"></head>

<body onload="myfunction()">


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

	
	<center><h1>Bienvenue !</h1></center>

	<ul>
		<li><a href="../intattente/attente/test.php">Interface Attente</a></li>
		<li><a href="../Commandant/index.php">Interface Commandant</a></li>
		<div id=cacher><li><a href="../intattente/Accueil.php">Interface Administrateur</a></li></div>
	</ul>
		

		 <form action="logout.php" method="post" name="logout">
		 	<input type="submit" value="Deconnexion" name="deco" class="box-button">
   </form>


<script>



function myfunction()
{

	var cacher = <?php echo json_encode($grp); ?>;

	// alert(cacher);
		
if (cacher == "admin")
{

document.getElementById('cacher').style.visibility = 'visible';

}

	}
</script>
	


</body>
</html>