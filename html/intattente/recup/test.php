<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
</head>
<body>

<?php
  $host = 'localhost';
  $dbname = 'Connexion';
  $username = 'mael';
  $password = 'admin';
    
  $dsn = "mysql:host=$host;dbname=$dbname"; 
  // récupérer tous les utilisateurs
  $sql = "SELECT * FROM Utilisateurs";
   
  try{
   $pdo = new PDO($dsn, $username, $password);
   $stmt = $pdo->query($sql);
   
   if($stmt === false){
    die("Erreur");
   }
   
  }catch (PDOException $e){
    echo $e->getMessage();
  }
?>

     <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
     <tr>
     <form class="box" action="conectrecup.php" method="post" name="login">
					
			<?php echo htmlspecialchars($row['identifiant']); ?>
			<input type="checkbox" class="box-input" name="identifiant" value='<?php echo htmlspecialchars($row['identifiant']); ?>'>
			<input type="password" class="box-input" name="password" placeholder="Nouveau mot de passe">
			<input type="password" class="box-input" name="repeatpassword" placeholder="Répéter le ouveau mot de passe">
			<input type="submit" value="Entrez " name="submit" class="box-button">
   </form>
     </tr>
     <?php endwhile; ?>
</body>
</html>
<!--$data["id"] ." ". $data["identifiant"] ." ". $data["password"]-->