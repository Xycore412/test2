<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<?php 
$pdo = new PDO('mysql:host=localhost;dbname=resevac','admin','admin');
 
// Comptage du nombre de ressortissant validé a l'accueil
$count_accueil = $pdo->query("SELECT COUNT(*) FROM ressortissant WHERE index_PR = 1")->fetchColumn();


// Comptage du nombre de ressortissant validé a l'accueil
$count_attente = $pdo->query("SELECT COUNT(*) FROM ressortissant WHERE index_PR = 2")->fetchColumn();

// Comptage du nombre de ressortissant validé a l'accueil
$count_embarquement = $pdo->query("SELECT COUNT(*) FROM ressortissant WHERE index_PR = 3")->fetchColumn();

// Comptage du nombre de ressortissant validé a l'accueil
$count_pes = $pdo->query("SELECT COUNT(*) FROM ressortissant WHERE index_PR = 4")->fetchColumn();

// // Comptage du nombre de ressortissant validé a l'accueil
$count_prevu = $pdo->query("SELECT COUNT(*) FROM ressortissant WHERE index_PR = 0")->fetchColumn();

//Comptage du nombre de ressortissant validé a l'accueil
// $count_total = $pdo->query("SELECT COUNT(*) FROM ressortissant")->fetchColumn();


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

echo "<html><body><center><table>\n\n"; 
		echo "<tr> " ;
		echo "<th class='gray'>";
		// echo "<td> Nombre de ressortissant ";
		// 	echo "<img src='img.png' height='25px' width='25px'>";
			
			echo "<th> Prévu";
			echo "<th> Acceuil";
			echo "<th> Attente";
			echo "<th> Embarquement";
			echo "<th> PES";
			// echo "<th> Total";
		echo "</tr> \n";

		echo "<tr> " ;
			echo "<td> Nombre de ressortissant ";
			echo "<img src='img.png' height='25px' width='25px'>";
			echo "<td>" . $count_prevu . "</td>";
			echo "<td>" . $count_accueil . "</td>";
			echo "<td>" . $count_attente . "</td>";
			echo "<td>" . $count_embarquement . "</td>";
			echo "<td>" . $count_pes . "</td>";
			// echo "<td>" . $count_total . "</td>";
		echo "</tr> \n";

echo "\n</table></center></body></html> "; 

header("Refresh: 3; url=Accueil.php");
?> 


<style>


table, td, tr, th{

	  padding: 10px;
        border: 1px solid black;
        border-collapse: collapse;
        text-align: center;
}

.gray{
	background-color: gray;
}

img{
	padding-left: 5px;
	padding-top: auto;
}
</style>



</body>
</html>