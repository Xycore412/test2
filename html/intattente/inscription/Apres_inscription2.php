<?php
if(session_start())
{
require_once 'config.php';

if(isset($_POST['submit']))
{
		$identifiant = $_POST['identifiant'];
		$password = SHA1($_POST['password']);
		$repeatpassword = SHA1($_POST['repeatpassword']);
		$poste = $_POST['poste'];

	if($identifiant&&$password&&$repeatpassword&&$poste)
	{

		$verif = $bdd->prepare("SELECT identifiant FROM utilisateurs WHERE identifiant=?");
		$verif->execute(array($_POST['identifiant'],));
		$user = $verif->fetch();

		if ($user) {
			header('Location: Inscription2.php?Identifiant_déjà_existant_!');
		}
		else {
			
			if($password===$repeatpassword)
			{
					$req = $bdd ->prepare("INSERT INTO `utilisateurs`(`identifiant`, `password`, `poste`) VALUES ('$identifiant', '$password', '$poste')");
					$req ->execute(array(
					$identifiant, $password,));
					header('Location: Inscription2.php?Nouvel_utilisateur_créer_avec_succès_!');
									
			}else header('Location: Inscription2.php?Les_deux_mots_de_passe_ne_sont_pas_identiques_!');
		}
	
	}else header('Location: Inscription2.php?Remplissez_tous_les_champs_!');

}else header('Location: Inscription2.php?Vous_devez_cliquez_!');
}
?>
			

<!-- '".$_POST['identifiant']."', '".$_POST['password']."' -->