<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('archivo');
    
    if(isset($_POST['nombre'])){    
        $conexion=ConectarBD();
        if(!$conexion){
            print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
            }else{
            
                $query= 'INSERT INTO `archivo`(`nombre`,`fecha`,`tipo`, `observacion`, `aclaracion`,`checklist`,`coordinacion`,`categoria`) 
                VALUES ("'.$_POST['nombre'].'","'.$_POST['fecha'].'","FONDO","'.$_POST['observacion'].'",'.$_POST['aclaracion'].',0,"'.$_POST['coor'].'","FONDO")' ;
                mysqli_query($conexion,$query) or die(print_mensaje('Lo sentimos ha ocurrido un error al agregar','index.php'));
                print_mensaje('El registro ha sido Agregado con exito!','index.php');
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
    <script src="../admin/confirmar.js" language="javascript" type="text/javascript"></script>
    <link rel="icon" href="https://www.tamaulipas.gob.mx/wp-content/uploads/2016/10/cropped-logotam-1-32x32.png" sizes="32x32">
    <title>Agregar</title>
</head>

<header>

    <?php include ('../header/header.blade.php');?>
</header>

<body>
<h2 class="titulo_usuarios">Agregar Fondo</h2>
    
    <div class="contenido_formulario">

        <form action="fondo.php" method="POST" accept-charset="utf-8">
        <h1 class="titulo_usuario">Agregar Fondo:</h1>
            <div class="flex">
                <div class="contenido1">
                    <label for="">Factura:</label>
                    <br><br>
                    <input type="text" name="nombre" required>
                    <br><br>
                    <label for="">Fecha de factura:</label>
                    <br><br>
                    <input type="date" name="fecha" min="1950-01-01" value="<?php echo date("Y-m-d",time());?>" required>
                    <br><br>
                          
                    <br><br>
                </div>
    
                <div class="contenido2">
                <label for="">Aclaración:</label>
                <br><br>
                <input type="number" value="0" min="0" name="aclaracion" required>
                <br><br>
                    <label for="">observación:</label>
                    <br><br>
                    <input type="text" name="observacion" max="299">
                    <br><br>
                    <label for="">Coordinación:</label>
                    <br><select name="coor" id="">
                <?php 
                $coord=["TODAS","CD VICTORIA","TAMPICO","MATAMOROS","REYNOSA","NUEVO LAREDO","MANTE","SAN FERNANDO",
                "JAUMAVE","MIGUEL ALEMAN","VALLE HERMOSO","PADILLA","ALTAMIRA","SANIDAD INTERNA"]; 

                foreach($coord as $val=>$v){
                    echo '<option value="'.$v.'">'.$v.'</option>';
                }
                ?>
                </select>
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
