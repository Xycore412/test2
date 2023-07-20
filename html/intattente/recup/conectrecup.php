    <?php
	
	    session_start();
		require_once 'config2.php';
	
	if(isset($_POST['identifiant']) && isset($_POST['password']) && isset($_POST['repeatpassword']))
    {
        $identifiant = $_POST['identifiant'];
        $password = SHA1($_POST['password']);
		$repeatpassword = SHA1($_POST['repeatpassword']);


        $check = $bdd->prepare("SELECT identifiant FROM utilisateurs WHERE identifiant = ?");
        $check->execute(array($identifiant));
        $data = $check->fetch();
		
		
            if($data)
            {
				
					
					if($password === $repeatpassword)
					{

                    $req = $bdd ->prepare("UPDATE utilisateurs SET password='$password' WHERE identifiant='$identifiant'");
					$req ->execute(array(
					$password,
					));
                    header('Location: connexionpage2.php?Mot_de_passe_changé_avec_succès_!');
                    
					
					}else header('Location: ../Inscription/Inscription2.php?Les_deux_mots_de_passe_ne_sont_pas_identiques_!');
				
            }else header('Location:  test.php?Problème_identifiant_!');
        
    }else header('Location:  ../Inscription/Inscription2.php?Remplissez_tous_les_champs_!');
	