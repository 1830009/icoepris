<?php 
    session_start();
	//require'login/sesion.php';
    $url= 'login/login.php';
    if(isset($_SESSION['usuario'])){
        $url= 'login/login.php';
        if($_SESSION['tipo']=='admin' || $_SESSION['tipo']=='root')
					$url= 'menu/';
		
        $tablas=['federal','estatal','activos','archivo','donado','limpieza','papeleria'];
        foreach($tablas as $n=>$tabla){
        if($_SESSION['tipo']==$tabla){
            $url=$tabla.'/';
            break;    
        }
        }
    }
    header('location: '.$url);
    ?>