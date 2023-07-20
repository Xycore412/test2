<?php 
session_start();
require_once 'config.php';

$zozo = $bdd->prepare("SELECT * FROM utilisateurs WHERE identifiant = 'tser'");
$zozo->execute();
$data = $zozo->fetch();

print_r($data['password']);

$password = SHA1($_POST['password']);
print_r($password);

?>