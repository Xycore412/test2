

<html>

<head> 

	<meta charset="utf-8"> 

	<link rel="stylesheet" href="style4.css" />

</head>

	<body>
    			
			<form class="box" action="Apres_inscription2.php" method="post" name="login">
			
		<h1 class="box-logo box-title"><img src="img-02.png"
		
			widht="350"
			height="350">Opération Resevac</a></h1>
			
		<h1 class="box-title">Inscription</h1>

			<select name="poste" >
    		<option value="">Poste utilisateur</option>
    		<option value="admin">Admin</option>
    		<option value="accueil">Accueil</option>
    		<option value="embarquement">Embarquement</option>
    		<option value="pes">PES</option>
    		<option value="attente">Attente</option>
    		<option value="commandement">Commandement</option>
    		</select>
		
			<input type="text" class="box-input" name="identifiant" placeholder="Identifiant">
			
			<input type="password" class="box-input" name="password" placeholder="Mot de passe">
			
			<input type="password" class="box-input" name="repeatpassword" placeholder="Répétez le mot de passe">
			
			<input type="submit" value="Entrez " name="submit" class="box-button">
	
	<!--<p class="box-register">Déjà inscrit ? <a href="connexionpage.php">Connectez-vous !</a></p>-->

</form>
			
	</body>
	
</html>