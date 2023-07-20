<?php

if( !function_exists('my_pdo_connexxion') )
{
    function my_pdo_connexxion()
    {
        // ---------
        $hostname   = 'localhost';      // voir hébergeur ou "localhost" en local
        $database   = 'resevac';   // nom de la BdD
        $username   = 'admin'; 
        $password   = 'admin'; 
        // ---------
        // connexion à la Base de Données
        try {
            // chaine de connexion (DSN)
            $strConn    = 'mysql:host='.$hostname.';dbname='.$database.';charset=utf8; port=3306';  // UTF-8
            $extraParam = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,      
                PDO::ATTR_PERSISTENT => true,               
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,   
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                 
                );
            // Instancie la connexion
            $pdo = new PDO($strConn, $username, $password, $extraParam);
            return $pdo;
        }
        // ---------
        catch(PDOException $e){
            echo 'Échec de la connexion : ' . $e->getMessage();
        }
    }
}
// --------------------------------
$pdo    = my_pdo_connexxion();

?>
