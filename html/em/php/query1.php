<?php
// --------------------------------
// La requete (exemple) : tous les "objet", classés par "id".

$query1 = "SELECT * FROM navette INNER JOIN position_navette ON navette.index_posnav = position_navette.index_posnav" ;
  try {
    $pdo_select = $pdo->prepare($query1);
    $pdo_select->execute();
    $NbreData = $pdo_select->rowCount(); // nombre d'enregistrements (lignes)
    $rowAll = $pdo_select->fetchAll();
  } catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }

// --------------------------------
// affichage
if ($NbreData != 0)

?>