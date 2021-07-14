<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('admin');
    if(isset($_POST['nombre'])){
        
        $conexion=ConectarBD();
        if(!$conexion){
            echo 'error';
            //errorConexion();
            }
            else{
                $query= 'INSERT INTO empleado VALUES("","'.$_POST['nombre'].'","'.$_POST['apat'].'","'.$_POST['amat'].'",
                "'.$_POST['rfc'].'","'.$_POST['email'].'","'.$_POST['tel'].'")';
                mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
                
                $idEmpleado= $conexion->insert_id;
                $pass= password_hash($_POST['pass'],PASSWORD_BCRYPT);
                $query= 'INSERT INTO login VALUES("","'.$_POST['usuario'].'","'.$pass.'","'.$_POST['tipo'].'",
                "'.$idEmpleado.'")';
                mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
                InsertUsers();
        }
    }
    else{
    
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../header/style.css">
    <link rel="stylesheet" href="../footer/style.css">
    <link rel="stylesheet" href="style.css">
    <!--<link rel="icon" type="image/x-icon" href="img/logotam.png">-->
    <link rel="icon" href="https://www.tamaulipas.gob.mx/wp-content/uploads/2016/10/cropped-logotam-1-32x32.png" sizes="32x32">
    <title>Entrada</title>
</head>

<?php
        include ('../header/header.blade.php');
?>
<body>

    <div class="contenido_formulario">
        
        <form action="AgregarUsuario.php" method="POST" accept-charset="utf-8">
        
            <h1 class="titulo_usuario">Datos del usuario:</h1>

            <div class="flex">
                <div class="contenido1">
                    <label for="">Nombre:</label>
                    <br><br>
                    <input type="text" name="nombre" placeholder="Nombre del empleado" required>
                    <br><br>
                    <label for="">Apellido Paterno</label>
                    <br><br>
                    <input type="text" name="apat" placeholder="Apellido paterno del empleado" required>
                    <br><br>
                    <label for="">Apellido Materno:</label>
                    <br><br>
                    <input type="text" name="amat" placeholder="Apellido materno del empleado" required>
                    <br><br>
                </div>
                <div class="contenido2">
                    <label for="">RFC:</label>
                    <br><br>
                    <input type="text" name="rfc" placeholder="RFC"  required>
                    <br><br>
                    <label for="">Correo Electronico:</label>
                    <br><br>
                    <input type="text" name="email" placeholder="ejemplo@example.com" required>
                    <br><br>
                    <label for="">Telefono:</label>
                    <br><br>
                    <input type="number" name="tel" placeholder="Teléfono del empleado">
                    <br><br><br><br><br>
                </div>
            </div>
            
            <h1 class="titulo_usuario">Cuenta del usuario:</h1>
            
            <div  class="flex">
                <div class="contenido1">
                    <label for="">Usuario:</label>
                    <br><br>
                    <input type="text" name="usuario" placeholder="Ingresa un nombre de usuario" required>
                    <br><br>
                    
                </div>
                <div class="contenido2">
                    <label for="">Contraseña</label>
                    <br><br>
                    <input type="password" name="pass" placeholder="Ingrese una contraseña para el usuario" required>
                    <br><br><br><br>
                </div>
            </div>
            
            
            <div class="select_usuario">
                    <label for="">Tipo de Usuario:</label>
                    <br><br>
                    <select name="tipo">
                        <option value="admin">Administrador</option>
                        <option value="federal">Recursos federales</option>
                        <option value="federal">Recursos estatales</option>
                        <option value="activos">Activos</option>
                        <option value="archivos">Archivos</option>
                        <option value="donacion">Donacion</option>
                        <option value="limpieza">Limpieza</option>
                        <option value="papaleria">Papeleria</option>
                    </select>
                    <br><br><br><br><br>
            </div> 
            <input type="submit" value="Agregar Usuario" class="agregar_usuario">
        </form>
        <a href="Usuarios.php"><input type="submit" value="Cancelar" class="cancelar_usuario"></a>
    </div>
    
</body>
<footer>
    <?php
        include ('../footer/footer.blade.php');
    ?>

</footer>
</html>
<?php 
}

?>