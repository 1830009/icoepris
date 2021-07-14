<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('papeleria');
    $conexion=ConectarBD();
        if(!$conexion){
            print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
            }
            else{
            if(isset($_POST['nombre'])){
                $query= 'UPDATE `papeleria` SET `codigo`="'.$_POST['codigo'].'",`nombre`="'.$_POST['nombre'].'",`unidad`="'.$_POST['unidad'].'",`marca`="'.$_POST['marca'].'",
                `color`="'.$_POST['color'].'" WHERE id_papeleria='.$_POST['id'];
                if(mysqli_query($conexion,$query)){
                    print_mensaje('El producto ha sido actualizado con éxito!','index.php');
                }else{
                    print_mensaje('SQL[03] Ha ocurrido un error al\nRealizar la operación...\nPor favor intente de nuevo','#');
                }
            }

        if(isset($_GET['x'])){    
            $query= 'SELECT * FROM papeleria WHERE id_papeleria ='.$_GET['x'];
            $res=mysqli_query($conexion,$query);
                if($res->num_rows>0){
                    $fila=$res->fetch_assoc();
                
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
    <title>Actualizar</title>
</head>

<header>

    <?php
            include ('../header/header.blade.php');
    ?>

</header>

<body>
    <div class="contenido_formulario">

        <form action="editar.php" method="POST" accept-charset="utf-8">
        <h1 class="titulo_usuario">Actualizar producto:</h1>
            <div class="flex">
    
                <div class="contenido1">
                    <input type="hidden" name="id" value="<?php echo $fila['id_papeleria']?>">
                    <label for="">Código:</label>
                    <br><br>
                    <input type="text" name="codigo" value="<?php echo $fila['codigo']?>" required>
                    <br><br>
                    <label for="">Nombre:</label>
                    <br><br>
                    <input type="text" name="nombre" value="<?php echo $fila['nombre']?>" required>
                    <br><br>
                </div>
    
                <div class="contenido2">
                    <label for="">Unidad</label>
                    <br><br>
                    <select class="select_usuario" name="unidad">
                    <?php 
                    $unidad=['PIEZA','PAQUETE','CAJA','METRO','METRO CUADRADO','LITRO','DOSIS'];
                    $und=['PZA','PAQ','CJ','M','M2','LT','DOSIS'];

                    for($x=0;$x<5;$x++){
                        if($und[$x]==$fila['unidad'])
                        break;
                    }
                    $valor= $und[$x];
                    echo '<option value="'.$fila['unidad'].'">'.$valor.'</option>';
                    for ($i=0;$i<5;$i++){
                        if($fila['unidad']!=$und[$i]){
                            echo '<option value="'.$und[$i].'">'.$unidad[$i].'</option>';
                        }
                    }
                    ?>
                    </select>
                    <br><br>
                    <label for="">Color:</label>
                    <br><br>
                    <input type="text" name="color" value="<?php echo $fila['color']?>">
                    <br><br>
                    <label for="">Marca:</label>
                    <br><br>
                    <input type="text" name="marca" value="<?php echo $fila['marca']?>" required>
                    
                    <br><br><br>
                </div>
            </div>

        <input type="submit" value="Actualizar" class="agregar_usuario">
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
<?php 
}
    }else{
        print_mensaje('SQL[01] Ha ocurrido un error al\nRealizar la operación...\nPor favor intente de nuevo','index.php');
    }
}

?>