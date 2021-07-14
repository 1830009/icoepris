<?php 
	session_start();

	if(!isset($_SESSION['usuario'])){
		header('location: /icoepris/login/login.php');
		exit;
	}
	else{
		if(($_SESSION['usuario']=='')){
			header('location: /icoepris/login/login.php');
			exit;
		}
	}

	function validarUsuario($user){
		
		if($_SESSION['tipo']=='admin' || $_SESSION['tipo']=='root' || $_SESSION['tipo']==$user){
			return true;
		}
		else{
			header('location: /icoepris/');
		}
	}


 ?>

