<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
	<title>PES</title>
</head>
<body>

    <form action="../../intattente/logout.php" method="post" name="logout">
      <input style="float: right;" type="submit" value="Deconnexion" name="deco" class="box-button">
   </form>

<?php
include("php/conf.php");
include("php/query1.php");
?>





<!-- En tete du tableau navette  -->
<table border="1">
    <th>Numéro de navette</th>
    <th>Nom de la navette</th>
    <th>Place</th>
    <th>Position</th>

<!-- Affichage du contenu du tableau navette  -->
<?php //include("php/contenu_nav.php") ?>
 -->


<!-- Barre deroulante "choisir la navette"  -->
<!-- <div id='choixnav'>-->
<form class="box" method="post"  name="login">
    <select name="nav_list" id="slct" onchange="">
        <optgroup label="Navette">
            <option >Choisir la navette</option>

<!-- contenu de la barre deroulante -->
<?php include("php/barre_d.php") ?>

<!-- Valider le choix de la navette -->
    </select>
       <input type="submit" value="valider" name="submit" class="box-button">

</form>
<!-- </div> -->



<!-- <p>Ressortissant dans la navette:  --><?php print_r($nav_list) ?><!-- </p> -->



<!-- En tête du tableau -->
<form method="post">
<?php include("php/nav_list.php") ?>

<!-- Contenu du tableau -->
 <table border="1">
    <th>Nom</th>
    <th>Prénom</th>
    <th>Date de naissance</th>
    <th>Validation</th>
<!-- Afficher les ressortissants dans la navette -->
    <?php include("php/liste_res.php") ?>




<input type="submit" value="valider l'ensemble" name="submit" class="box-button">


















<iframe id="inlineFrameExample"
    title="Inline Frame Example"
    width="300"
    height="200"
    src="php/tab_navette.php">
</iframe>



</body>
</html>