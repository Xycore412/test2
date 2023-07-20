<?php
  $host = 'localhost';
  $dbname = 'resevac';
  $username = 'admin';
  $password = 'admin';   
  $dsn = "mysql:host=$host;dbname=$dbname"; 


  $pdo = new PDO($dsn, $username, $password);
  ?>


	<?php if(isset($_POST['identifiant']) && isset($_POST['num']))
    {
        $identifiant = $_POST['identifiant'];
        $num = $_POST['num'];

        $check = $pdo->prepare("SELECT * FROM ressortissant WHERE index_ressortissant = ?");
        $check->execute(array($identifiant));
        $data = $check->fetch();
		
            if($data)
            {            	 

              $place= $pdo->prepare("SELECT place FROM navette WHERE index_nav = '$num'");
              $place->execute(array($num));
              $data2 = $place->fetch();
              // print_r($data2['place']);


              $prises = "SELECT COUNT(*) as prises2 FROM ressortissant WHERE index_nav='$num'";
              try {
              $pdo_select4 = $pdo->query($prises);
              $rowAll4 = $pdo_select4->fetch();
              }catch (PDOException $e){ echo 'Erreur SQL :' . $e->getMessage().'<br/>'; die();}

            	if($rowAll4['prises2'] < $data2['place'])
            	{

					         $req = $pdo ->prepare("UPDATE ressortissant SET index_PR='2', index_nav='$num' WHERE index_ressortissant='$identifiant'");
					         $req ->execute(array($identifiant));

                    header('Location: test.php');

              }else header('Location:  test.php?Navette_pleine_!');
				
            }else header('Location:  test.php?Problème_identifiant_!');
        
    }else header('Location:  test.php?Remplissez_tous_les_champs_!');

    ?>