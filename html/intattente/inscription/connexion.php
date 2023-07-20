<?php 
    session_start();
    require_once 'config.php';

    if(isset($_POST['submit']))
    {
        $identifiant = $_POST['identifiant'];
        $password = $_POST['password'];


        $check = $bdd->prepare("SELECT identifiant, password FROM utilisateurs WHERE identifiant = '".$_POST['identifiant']."'");
        $check->execute(array($identifiant));
        $data = $check->fetch();

        if($identifiant&&$password)
        {
            if($data['identifiant'] === $identifiant)
                {
                    if($data['password'] === $password)
                    {
                        session_start();
                        $_SESSION['user'] = $data['identifiant'];
                        header('Location: ../menu.php');
                        die();

                    }else header('Location: connexionpage.php?Mauvais_mot_de_passe');

                }else header('Location: connexionpage.php?Mauvais_identifiant');

        }else header('Location: connexionpage.php?Rémplissez_tous_les_champs_!');

    }else header('Location: connexionpage.php?Erreur_vueillez_réessayer');
	