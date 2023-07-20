<meta charset="utf-8">

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
	$toto = $bdd->prepare("SELECT * FROM ressortissant WHERE nom = '$q'" );
	$toto->execute(array());
	$data = $toto->fetch();?>

	<br><?php echo $data['nom'];?>
	<br><?php echo $data['prenom'];?>
	<br><?php echo $data['num_passeport'];?>
<?php
}
?>