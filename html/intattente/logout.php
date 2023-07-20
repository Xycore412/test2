<?php
session_start();
require_once 'config2.php';
	if(isset($_POST['deco']))
	{
session_destroy();
header('Location: ../index.php');
}
?>