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
                $query = 'INSERT INTO '.$_POST['tabla'].' (nombre, cantidad, unidad, marca, descripcion) 
                VALUES("'.$_POST['nombre'].'",0,"'.$_POST['unidad'].'","'.$_POST['marca'].'","'.$_POST['descripcion'].'")';
                echo $query;
                $res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
                
                if($res){
                    avisoGuardadoExito();
                }
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

<header>

    <?php
            include ('../header/header.blade.php');
    ?>

</header>

<body>
    <h2 class="titulo_usuarios">Entrada de productos</h2>
    <div class="contenido_federal">
    
        <form action="Agr_Producto.php" method="POST" accept-charset="utf-8">
        
        <div  class="flex">
                <div class="contenido1">
                    <label for="">Departamento:</label>
                    <br><br>
                    <select name="tabla">
                        <option value="proyecto_federal">Recurso Federal</option>
                        <option value="recurso_estado">Recurso Estatal</option>
                        <option value="activos">Activos</option>
                        <option value="donacion">Donado</option>
                        <option value="limpieza">Limpieza</option>
                        <option value="papeleria">Papeleria</option>
                    </select>
                    <br><br>
                    <label for="">Nombre:</label>
                    <br><br>
                    <input type="text" name="nombre" placeholder="Ingresa el Nombre del Producto" required>
                    <br><br>
                        
                </div>
                <div class="contenido2">    
                    <label for="">Unidad:</label>
                    <br><br>
                    <select name="unidad">
                        <option value="Pz.">Piezas</option>
                        <option value="kgs.">Kilogramos</option>
                        <option value="Mts.">Metros</option>
                        <option value="m2.">Metros Cuadrados</option>
                        <option value="Lts.">Litros</option>
                    </select>
                    <br><br>
                    <label for="">Marca:</label>
                    <br><br>
                    <input type="text" name="marca" placeholder="Marca del Producto" required >
                    <br><br>
                </div>
        </div>
        
        
        
        <label for="">Descripción:</label>
        <br><br>
        <textarea name="descripcion"  cols="10" rows="20"> Añade una descripción del producto</textarea>
        <br>
        <input type="submit" value="Agregar Producto" class="agregar_prodcuto">
        </form>
        <a href="federal_admin.php"><input type="submit" value="Cancelar" class="cancelar_usuario"></a>
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