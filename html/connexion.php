<?php 
    session_start();
    require_once 'config.php';

    if(isset($_POST['submit']))
    {
        $identifiant = $_POST['identifiant'];
        $password = SHA1($_POST['password']);

        $check = $bdd->prepare("SELECT identifiant, password, poste FROM utilisateurs WHERE identifiant = '".$_POST['identifiant']."'");
        $check->execute(array($identifiant,
        $password,));
        $data = $check->fetch();

        if($identifiant&&$password)
        {
            if($data['identifiant'] === $identifiant)
                {
                    if($data['password'] === $password)
                    {
                        if($data['poste'] === 'admin')
                        {

                        session_start();
                        $_SESSION['user'] = $data['identifiant'];
                        header('Location: intattente/menu.php');
                        die();

                        }else

                        {

                              if($data['poste'] === 'attente')
                              {

                                session_start();
                                $_SESSION['user'] = $data['identifiant'];
                                header('Location: intattente/attente/test.php');
                                die();

                              }else {

                                        if($data['poste'] === 'commandant')
                                            {
                                                session_start();
                                                $_SESSION['user'] = $data['identifiant'];
                                                header('Location: Commandant/index.php');
                                                die();
                                            }else {
                                                    if($data['poste'] === 'accueil')
                                                    {
                                                        session_start();
                                                        $_SESSION['user'] = $data['identifiant'];
                                                        header('Location: accueil/affichagetableauphp.php');
                                                        die();
                                                    }else  require_once 'zozo.php';
                                                        
                                                }
                                    }

                        }

                    }else header('Location: index.php?Mauvais_mot_de_passe');

                }else header('Location: index.php?Mauvais_identifiant');

        }else header('Location: index.php?Rémplissez_tous_les_champs_!');

    }else header('Location: index.php?Erreur_vueillez_réessayer');