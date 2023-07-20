<html>
<head> <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
 </head>
<body>


<?php
	$pdo_option[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$bdd = new PDO('mysql:host=localhost;dbname=resevac','admin','admin',$pdo_option);


	if(isset($_POST['submit']))
	{
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$DDN = $_POST['DDN'];
		$num_passeport = $_POST['num_passeport'];

		if (!empty($_POST['nom']) AND
			!empty($_POST['prenom']) AND
			!empty($_POST['DDN']) AND
			!empty($_POST['num_passeport'])) 
		{
		
		$req = $bdd ->prepare("INSERT INTO ressortissant (nom, prenom, DDN, num_passeport) VALUES (?, ?, ?, ?)");

		$req ->execute(array($_POST['nom'],$_POST['prenom'],$_POST['DDN'],$_POST['num_passeport']));
		 echo($erreur= " Votre compte a bien été créé");
		 header("refresh:2");
		 header("Location: Inscription_ressortissant.php");

	    }
	      else{
		        echo ($erreur = "Les champs doivent être entièrement remplis !");
				header("Refresh: 2; url=Inscription_ressortissant.php");
	          }
    }
?>
</body>
</html>