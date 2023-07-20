
    <?php
    session_start();
        require_once 'config2.php';


        
if (isset($_POST['submit']))
{
	// if (empty($_POST['num_passeport']))

	// {


		$num_passeport = $_POST['num_passeport'];
		$sql = $bdd->prepare("SELECT * FROM ressortissant WHERE num_passeport = '$num_passeport'");
		$sql->execute(array($_POST['num_passeport']));
		$data = $sql->fetch(); 

			if ($data)
			 {
			   $sql2 = $bdd->prepare( "UPDATE ressortissant SET index_PR  = '1' WHERE num_passeport ='$num_passeport'");
			   $sql2->execute(array($num_passeport));
			   header('Location:affichagetableauphp.php');

			 }else header('Location:affichagetableauphp.php?Erreur_!');

	// }else header('Location:affichagetableauphp.php?Cochez_case_!');

}else header('Location:affichagetableauphp.php');

 ?>

