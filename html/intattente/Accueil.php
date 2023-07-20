<!DOCTYPE html>
<html>
<head>
	<title>Interface Admin Resevac</title>
     <meta charset="utf-8">
    <link rel="stylesheet" href="style2.css"></head>

<body onload="myfunction()">

    <?php 

session_start();
require_once 'config2.php';

if(isset($_SESSION['user']))
{

    $session = $_SESSION['user'];
    
    $verif = $bdd->prepare("SELECT poste FROM utilisateurs WHERE identifiant = ?");
    $verif->execute(array($session));
    $test = $verif->fetch();
    $grp =  $test[0];

    // echo $grp;

}else header('Location : /inscription/connexionpage.php');

?>

<center><h1>Bienvenue Administrateur !</h1>
	<form action="logout.php" method="post" name="logout">
            <input type="submit" value="Deconnexion" name="deco" class="box-button">
   </form>
</center> 
	<!-- <iframe id="attente"
    width="400"
    height="200"
    src="attente/test.php"></iframe> -->

    <br><div id=cacher><center><iframe
    src="inscription/Inscription2.php"
    width="600"
    height="1000"
    ></iframe>

    <iframe
    src="recup/connexionpage2.php"
    width="600"
    height="1000"
    ></iframe></center></div></br>

    <center><iframe
    src="inscription/supressionpage.php"
    width="600"
    height="800"
    ></iframe></center></div></br>

    <script>



function myfunction()
{

    var cacher = <?php echo json_encode($grp); ?>;

    // alert(cacher);
        
if (cacher == "admin")
{

document.getElementById('cacher').style.visibility = 'visible';

}

    }
</script>

</body>
</html>