<?php

require('../bd/conectar.php');

	if(isset($_POST['user'])){
	if(isset($_POST['pass'])){
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		
		$conexion=ConectarBD();
		
		if(!$conexion){
			errorConexion();
		}
		else{
			//$query = 'SELECT 1 AS users FROM login WHERE usuario="'.$user.'" AND pass= "'.password_hash($pass,PASSWORD_BCRYPT).'"';
			$query = 'SELECT e.id_empleado id,CONCAT(e.nombre," ",e.apellido_pat," ",e.apellido_mat) nombre, l.pass,l.tipo 
					FROM login l JOIN empleado e ON e.id_empleado= l.id_empleado WHERE l.usuario="'.$user.'" LIMIT 1';
			$res = mysqli_query($conexion,$query) or die(mysqli_error($conexion));
			$passwordHASH='';
			
			if ($res->num_rows==1) {
				//Ligamos los datos desde la BD.
				$contra=$res->fetch_assoc();
			if(password_verify($pass,$contra['pass'])){
				session_start();
				$valido=true;
				$_SESSION['usuario']=$contra['nombre'];
				$_SESSION['id']=$contra['id'];
				$_SESSION['tipo']=$contra['tipo'];
				$url= '';
        		if($_SESSION['tipo']=='admin' || $_SESSION['tipo']=='root')
					$url= 'menu/';
		
        		$tablas=['federal','estatal','activos','archivo','donado','limpieza','papeleria'];
        		foreach($tablas as $n=>$tabla){
        			if($_SESSION['tipo']==$tabla){
            			$url=$tabla.'/';
            			break;    
        			}
        		}
				header('location: ../'.$url);				
			}
			else{
				?>
		<html>
			<script>
			window.alert('Lo sentimos, la constraseña ingresada No es la correcta\n Intente de nuevo...');
			window.location.href='login.php';
			</script>
		</html>
		<?php
			}
		}
			else{
				?>
		<html>
			<script>
			window.alert('Lo sentimos, el usuario No existe');
			window.location.href='login.php';
			</script>
		</html>
		<?php
			}
			
		}
	
	}
}


 ?>