<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('admin');
    
    if(isset($_GET['y'])){
        $conexion=ConectarBD();
        if(!$conexion){
            echo 'error';
            //errorConexion();
            }
            else{
                $query= 'DELETE FROM login WHERE id_empleado='.$_GET['y'];
                mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
                $_SESSION = array();
	            session_destroy();
                header('location: /icoepris/login/login.php');
                exit;
    }
}
    if(isset($_GET['x'])){
        
        $conexion=ConectarBD();
        if(!$conexion){
            echo 'error';
            //errorConexion();
            }
            else{
                
                $id_log=$_GET['x'];
                if($_SESSION['id']==$id_log){
                    ?>
                    <html>
                    <script>
                    window.alert('!!ALERTA!!\n Estas intentando ELIMINAR tu propia CUENTA!');
                    if(window.confirm('¿Está seguro de que desea elminar Su cuenta? \nPresione [Aceptar] para Confirmar')){
                        window.location.href='Usuarios.php?y='+<?php echo $_SESSION['id']?>;
                        }
                            else{
                            window.location.href='Usuarios.php';
                            }
                </script>
                    
                    </html>
                    <?php 
                }
                else{

                    $query= 'DELETE FROM login WHERE id_empleado='.$id_log;
                    mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
                }
        }
    }
    
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
    <title>AdminUsuarios</title>
    <link rel="icon" href="https://www.tamaulipas.gob.mx/wp-content/uploads/2016/10/cropped-logotam-1-32x32.png" sizes="32x32">
    <script src="confirmar.js" language="javascript" type="text/javascript"></script>

</head>

<header>

    <?php
            include ('../header/header.blade.php');
    ?>

</header>

<body>
    <h1 class="titulo_usuarios">Administración de usuarios</h1>
    <br><br>
    <button class="Agregar_usuarios"><a class="a_usuarios" href="AgregarUsuario.php">+ Agregar nuevo usuario</a></button>
    <table class="tabla_usuarios">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Ap. Paterno</th>
        <th>Ap. Materno</th>
        <th>RFC</th>
        <th>E-mail</th>
        <th>Teléfono</th>
        <th>Usuario</th>
        <th>Tipo</th>
        <th colspan="2">Acción</th>
    </tr>
    <?php 

        $conexion=ConectarBD();
        if(!$conexion){
            echo 'error';
            //errorConexion();
            }
            else{
                $query= 'SELECT e.id_empleado id,e.nombre nombre,e.apellido_pat apat,e.apellido_mat amat,
                        e.rfc rfc,e.email email,e.telefono tel,l.usuario usuario,l.tipo tipo 
                        FROM empleado e JOIN login l ON e.id_empleado = l.id_empleado
                        ORDER BY l.tipo';
                $res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');

                if($res->num_rows>0){
                    while($fila=$res->fetch_assoc()){
                        if(!($fila['nombre']=='root')){
                        echo '<tr>';
                        echo '<td>'.$fila['id'].' </td>';
                        echo '<td>'.$fila['nombre'].' </td>';
                        echo '<td>'.$fila['apat'].' </td>';
                        echo '<td>'.$fila['amat'].' </td>';
                        echo '<td>'.$fila['rfc'].' </td>';
                        echo '<td>'.$fila['email'].' </td>';
                        echo '<td>'.$fila['tel'].' </td>';
                        echo '<td>'.$fila['usuario'].' </td>';
                        echo '<td>'.$fila['tipo'].' </td>';
                        echo '<td><button class="editar"><a href="EditarUsuario.php?x='.$fila['id'].'">Editar</a></button></td>';
                        echo '<td><button onclick="eliminar('.$fila['id'].',\''.$fila['nombre'].'\',\'Usuarios.php\')" class="eliminar">Eliminar</button></td>';
                        echo '</tr>';
                        
                    }
                }
                }
        }
    ?>
    </table>
</body>
<footer>
    
    <?php
        include ('../footer/footer.blade.php');
    ?>

</footer>

</html>