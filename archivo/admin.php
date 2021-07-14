<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('archivo');
    
    if(isset($_POST['nombre'])){    
        $conexion=ConectarBD();
        if(!$conexion){
            print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
            }
            
                $query= 'INSERT INTO `archivo`(`nombre`,`fecha`,`tipo`, `observacion`,`coordinacion`,`categoria`) 
                VALUES ("'.$_POST['nombre'].'","'.$_POST['fecha'].'","ADMINISTRATIVO","'.$_POST['observacion'].'","'.
                $_POST['coor'].'","'.$_POST['cat'].'")' ;
                mysqli_query($conexion,$query) or die(print_mensaje('Lo sentimos ha ocurrido un error al agregar','index.php'));
                print_mensaje('El registro ha sido Agregado con exito!','index.php');
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
    <script src="../admin/confirmar.js" language="javascript" type="text/javascript"></script>
    <link rel="icon" href="https://www.tamaulipas.gob.mx/wp-content/uploads/2016/10/cropped-logotam-1-32x32.png" sizes="32x32">
    <title>Agregar</title>
</head>

<header>

    <?php include ('../header/header.blade.php');?>
</header>

<body>
<h2 class="titulo_usuarios">Agregar Administrativo</h2>
    
    <div class="contenido_formulario">

        <form action="admin.php" method="POST" accept-charset="utf-8">
        <h1 class="titulo_usuario">Agregar Administrativo:</h1>
            <div class="flex">
                <div class="contenido1">
                    <label for="">Nombre:</label>
                    <br>
                    <input type="text" name="nombre" required>
                    <br><br>
                    <label for="">Fecha:</label>
                    <br>
                    <input type="date" name="fecha" min="1950-01-01" value="<?php echo date("Y-m-d",time());?>" required>
                    <br><br>
                    <label for="">Coordinación:</label><br>
                    <select name="coor" id="">
                <?php 
                $coord=["TODAS","CD VICTORIA","TAMPICO","MATAMOROS","REYNOSA","NUEVO LAREDO","MANTE","SAN FERNANDO",
                "JAUMAVE","MIGUEL ALEMAN","VALLE HERMOSO","PADILLA","ALTAMIRA","SANIDAD INTERNA"]; 

                foreach($coord as $val=>$v){
                    echo '<option value="'.$v.'">'.$v.'</option>';
                }
                ?>
                </select>
                    <br><br>
                </div>
    
                <div class="contenido2">
                <label for="">Categoría:</label><br>
                <select name="cat" id="">
                <option value="CARPETA">CARPETA</option>
                <option value="LEGAJO">LEGAJO</option>
                <option value="LIBRO">LIBRO</option>
                <option value="DOCUMENTO">DOCUMENTO</option>
                </select>
                <br><br>
                <label for="">Cantidad:</label>
                <br>
                <input type="number" value="0" min="0" name="aclaracion" required>
                <br><br>
                    <label for="">observación:</label>
                    <br>
                    <input type="text" name="observacion" max="299">
                    <br><br><br><br>
                </div>
            </div>
            <input type="submit" value="Agregar Caja" class="agregar_usuario">
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
