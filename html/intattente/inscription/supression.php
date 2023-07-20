<?php
if(session_start())
{
require_once 'config.php';

if(isset($_POST['submit']))
{
		$identifiant = $_POST['identifiant'];

	if($identifiant)
	{

		$verif = $bdd->prepare("SELECT identifiant FROM utilisateurs WHERE identifiant=?");
		$verif->execute(array($_POST['identifiant'],));
		$user = $verif->fetch();

			
			if($user)
			{
					$req = $bdd ->prepare("DELETE FROM utilisateurs WHERE identifiant ='$identifiant'");
					$req ->execute(array(
					$identifiant,));
					header('Location: ../../index.php');
									
			}else header('Location: supressionpage.php?Identifiant_inexistant_!');
	
	}else header('Location: supressionpage.php?Remplissez_tous_les_champs_!');

}else header('Location: supressionpage.php?Vous_devez_cliquez_!');

}else header('Location: ../../index.php?Connectez-vous_!');

?>