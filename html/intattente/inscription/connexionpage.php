<html>

<head> <meta charset="utf-8"> 

<link rel="stylesheet" href="style4.css" />


</head>

	<body>

<?php 
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert alert-danger">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
            

<form class="box" action="connexion.php" method="post" name="login">
			
		<h1 class="box-logo box-title"><img src="img-02.png"
		
			widht="350"
			height="350">Opération Resevac</a></h1>
			
		<h1 class="box-title">Connexion</h1>
		
			<input type="text" class="box-input" name="identifiant" placeholder="Votre identifiant">
			
			<input type="password" class="box-input" name="password" placeholder="Mot de passe">
			
			<input type="submit" value="Entrez " name="submit" class="box-button">
	
	<!--<p class="box-register">Vous n'avez pas de compte ? <a href="Inscription2.php">Inscrivez-vous !</a></p>-->

</form>


			
			<!--<script src="cacher.js">

</script>-->
			
	</body>
	
</html>