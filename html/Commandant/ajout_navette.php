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
		$numero = $_POST['numero'];
		$place = $_POST['place'];

		if (!empty($_POST['numero']) AND
			!empty($_POST['place'])) 
		{
		
		$req = $bdd ->prepare("INSERT INTO navette (numero, place) VALUES (?, ?)");

		$req ->execute(array($_POST['numero'],$_POST['place']));
		 echo($erreur= " Votre navette a bien été créé");
		 header("refresh:2");
		 header("Location: formulaire_navette.html");

	    }
	      else{
		        echo ($erreur = "Les champs doivent être entièrement remplis !");
				header("Refresh: 2; url=formulaire_navette.html");
	          }
    }



        $nava = $bdd->prepare("SELECT index_nav FROM navette WHERE numero = '$numero'");
    $nava->execute(array($numero));
    $data = $nava->fetch();

    $ind = $data['index_nav'];

    $req2 = $bdd ->prepare("UPDATE navette SET index_nava = '$ind' WHERE index_nav = '$ind'");
    $req2->execute(array($ind));


?>
</body>
</html>