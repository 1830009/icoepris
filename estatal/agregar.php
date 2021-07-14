<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('papeleria');
    if(isset($_POST['nombre'])){    
        $conexion=ConectarBD();
        if(!$conexion){
            print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
            }
                $query= 'INSERT INTO `recurso_estado`(`codigo`, `nombre`, `cantidad`, `unidad`, `marca`, `color`)
                 values("'.$_POST['codigo'].'","'.$_POST['nombre'].'",'.$_POST['cantidad'].',"'.$_POST['unidad'].'","'.$_POST['marca'].'","'.$_POST['color'].'")' ;
                if(mysqli_query($conexion,$query)){
                    print_mensaje('El producto ha sido agregado con exito!','index.php');
                }else{
                    print_mensaje('SQL[03] Ha ocurrido un error al\nRealizar la operación...\nPor favor intente de nuevo','#');
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
    <link rel="stylesheet" href="../admin/style.css">
    <link rel="icon" href="https://www.tamaulipas.gob.mx/wp-content/uploads/2016/10/cropped-logotam-1-32x32.png" sizes="32x32">
    <title>Agregar</title>
</head>

<header>

    <?php
            include ('../header/header.blade.php');
    ?>

</header>

<body>    
    <div class="contenido_formulario">

        <form action="agregar.php" method="POST" accept-charset="utf-8">
        <h1 class="titulo_usuario">Agregar producto:</h1>
            <div class="flex">
    
                <div class="contenido1">
                    <label for="">Código:</label>
                    <br><br>
                    <input type="text" name="codigo" placeholder="Identificador del producto" required>
                    <br><br>
                    <label for="">Nombre:</label>
                    <br><br>
                    <input type="text" name="nombre" required placeholder="Nombre principal del producto">
                    <br><br>
                    <label for="">Cantidad:</label>
                    <br><br>
                    <input type="number" name="cantidad" min="0" placeholder="¿Cuántos hay actualmente?" required>
                    <br><br>
                </div>
    
                <div class="contenido2">
                    <label for="">Unidad</label>
                    <br><br>
                    <select class="select_usuario" name="unidad">
                    <option value="PAQ">Paquete</option>
                        <option value="PZA">Pieza</option>
                        <option value="CJ">Caja</option>
                        <option value="M">Metros</option>
                        <option value="M2">Mts. Cuadrados</option>
                        <option value="LT">Litros</option>
                        <option value="DOSIS">Dosis</option>
                    </select>
                    <br><br>
                    <label for="">Marca:</label>
                    <br><br>
                    <input type="text" name="marca" placeholder="¿Qué marca es el producto?">
                    <br><br>
                    <label for="">Color:</label>
                    <br><br>
                    <input type="text" name="color" placeholder="¿Qué color es?">
                    <br><br><br>
                </div>
            </div>
        <input type="submit" value="Agregar producto" class="agregar_usuario">
        </form>
        <a href="index.php"><input type="submit" value="Cancelar" class="cancelar_usuario"></a>  
    </div>
</body>
<footer>
   
   <?php
   
        include ('../footer/footer.blade.php');
    
    ?>

</footer>
</html>
