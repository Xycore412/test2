<?php 
    try 
    {
        $bdd = new PDO("mysql:host=localhost;dbname=resevac;charset=utf8", "admin", "admin");
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }