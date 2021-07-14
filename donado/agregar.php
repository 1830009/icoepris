 <?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('donado');
    
    if(isset($_POST['nombre'])){    
        $conexion=ConectarBD();
        if(!$conexion){
            print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
            }
                $query= 'INSERT INTO `donacion`(`codigo`, `folio`, `proveedor`, `nombre`, `cantidad`, `unidad`, `marca`, `material`, `color`, `observacion`)
                 values("'.$_POST['codigo'].'","'.$_POST['folio'].'","'.$_POST['proveedor'].'","'.$_POST['nombre'].'",
                 0,"'.$_POST['unidad'].'","'.$_POST['marca'].'","'.$_POST['material'].'","'.$_POST['color'].'",
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
                    <label for="">Proveedor:</label>
                    <br><br>
                    <input type="text" name="proveedor" required placeholder="Ingrese el proveedor">
                    <br><br>
                    <label for="">Folio:</label>
                    <br><br>
                    <input type="number" name="folio" placeholder="No. de Folio" required>
                    <br><br>
                    <label for="">Nombre:</label>
                    <br><br>
                    <input type="text" name="nombre" required placeholder="Ingrese el nombre">
                    <br><br>
                    <label for="">Marca:</label>
                    <br><br>
                    <input type="text" name="marca" placeholder="Ingrese la marca">
                    <br><br>
                </div>
    
                <div class="contenido2">
                <label for="">Código:</label>
                <br><br>
                <input type="text" name="codigo" placeholder="Ingrese el código" required>
                    <br><br>
                    <label for="">Unidad</label>
                    <br><br>
                    <select class="select_usuario" name="unidad">
                        <option value="pz">Piezas</option>
                        <option value="kg">Kilogramos</option>
                        <option value="m">Metros</option>
                        <option value="m2">Mts. Cuadrados</option>
                        <option value="lt">Litros</option>
                    </select>
                    <br><br>
                    <label for="">Color:</label>
                    <br><br>
                    <input type="text" name="color" placeholder="Ingrese el color">
                    <br><br>
                    <label for="">Material:</label>
                    <br><br>
                    <input type="text" name="material" placeholder="Ingrese el material">                    
                    <br><br><br>
                </div>
            </div>
        <label for="">Observación:</label>
        <br><br>
        <input class="text_area" type="text" name="observacion">
        <br><br><br><br>
        <input type="submit" value="Agregar prodcuto" class="agregar_usuario">
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
