<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('activos');
    if(isset($_POST['nombre'])){    
        $conexion=ConectarBD();
        if(!$conexion){
            print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
            }
                $query= 'INSERT INTO `activos`(`codigo`, `folio`, `proveedor`, `nombre`,`n_serie`, `cantidad`, `unidad`, `marca`, `color`, `observacion`)
                 values("'.$_POST['codigo'].'","'.$_POST['folio'].'","'.$_POST['proveedor'].'","'.$_POST['nombre'].'",
                 "'.$_POST['n_serie'].'",0,"'.$_POST['unidad'].'","'.$_POST['marca'].'","'.$_POST['color'].'",
                 "'.$_POST['observacion'].'")' ;
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
    <title>Agregar</title>

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
                    <input type="text" name="codigo" placeholder="Ingrese el código" required>
                    <br><br>
                    <label for="">Folio:</label>
                    <br><br>
                    <input type="text" name="folio" placeholder="No. de Folio" required>
                    <br><br>
                    <label for="">Número de serie:</label>
                    <br><br>
                    <input type="text" name="n_serie" placeholder="No. de serie" required>
                    <br><br>
                    <label for="">Nombre:</label>
                    <br><br>
                    <input type="text" name="nombre" required placeholder="Ingrese el nombre">
                    <br><br>
                </div>
    
                <div class="contenido2">
                    <label for="">Proveedor:</label>
                    <br><br>
                    <input type="text" name="proveedor" required placeholder="Ingrese el proveedor">               
                    <br><br>
                    <label for="">Marca:</label>
                    <br><br>
                    <input type="text" name="marca" placeholder="Ingrese la marca">
                    <br><br>
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
                    <label for="">Color:</label>
                    <br><br>
                    <input type="text" name="color" placeholder="Ingrese el color">
                    <br><br><br>
                </div>
            </div>        
        <label for="">Observación:</label>
        <br><br>
        <input class="text_area" type="text" name="observacion" mas="250">
        <br><br><br><br>
        <input type="submit" value="Agregar prodcuto" class="agregar_usuario">
        </form>
        <a href="index.php"><input type="submit" value="Cancelar" class="cancelar_usuario"></a>  
    </div>
</body>
<footer> <?php include ('../footer/footer.blade.php');?></footer>
</html>
