<?php

  $query2 = "SELECT nom,prenom,DDN FROM ressortissant";
  try {
    $pdo_select = $pdo->prepare($query2);
    $pdo_select->execute();
    $NbreData1 = $pdo_select->rowCount(); // nombre d'enregistrements (lignes)
    $rowAll = $pdo_select->fetchAll();
  } catch (PDOException $e){ echo 'Erreur SQL : '. $e->getMessage().'<br/>'; die(); }

  if ($NbreData1 != 0)
  ?>