<?php 
	
	require 'sesion.php';
	$_SESSION = array();
	session_destroy();
	header('location: /icoepris/login/login.php');
 ?>

 