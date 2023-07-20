<?php
if(isset($_POST["nav_list"])){
    $nav_list = $_POST['nav_list'];

   $nav_list_id = $nav_list ;
    $req = "SELECT * FROM ressortissant INNER JOIN navette ON ressortissant.index_nav = navette.index_nava WHERE index_nava =  $nav_list  AND index_posnav =  3 ";
    $query2 = $pdo->prepare($req);
    $query2->execute(array($nav_list));
    $data = $query2->fetchAll();
}
?>