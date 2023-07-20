 <!DOCTYPE html>
 <html>
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title></title>
 </head>
 <body>
 
 
   <form action="zozo.php" method="post" name="supprimer">
   <input type="submit"  name="supp" value="Suppression ressortissant">
</form>


<?php 


session_start();

$pdo = new PDO('mysql:host=localhost;dbname=resevac','admin','admin');

  if (isset($_POST['supp'])) {

    $delete = $pdo->prepare('DELETE FROM `ressortissant` WHERE 1');
    $delete->execute();
    $data = $delete->fetch();
    header('Location: index.php?Supression_avec_succès_!');
  }

 ?>

 </body>
 </html> 