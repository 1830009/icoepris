<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('activos');
    $conexion=ConectarBD();
        if(!$conexion){
            print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
            }
            else{
            if(isset($_POST['nombre'])){
                $query= 'UPDATE `activos` SET `codigo`="'.$_POST['codigo'].'",`folio`="'.$_POST['folio'].'",
                `proveedor`="'.$_POST['proveedor'].'",`nombre`="'.$_POST['nombre'].'",`n_serie`="'.$_POST['n_serie'].'",`unidad`="'.$_POST['unidad'].'",`marca`="'.$_POST['marca'].'",
                `color`="'.$_POST['color'].'",`observacion`="'.$_POST['observacion'].'" WHERE id_activos='.$_POST['id'];
                if(mysqli_query($conexion,$query)){
                    print_mensaje('El producto ha sido actualizado con exito!','index.php');
                }else{
                    print_mensaje('SQL[03] Ha ocurrido un error al\nRealizar la operación...\nPor favor intente de nuevo','#');
                }
            }

        if(isset($_GET['x'])){    
            $query= 'SELECT * FROM activos WHERE id_activos='.$_GET['x'];
            $res=mysqli_query($conexion,$query);
                if($res->num_rows>0){
                    $fila=$res->fetch_assoc();
                
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../admin/style.css">
    <title>Actualizar</title>
    <?php include ('../header/header.blade.php'); ?>
</header>
<body>

    <div class="contenido_formulario">

        <form action="editar.php" method="POST" accept-charset="utf-8">
        <h1 class="titulo_usuario">Actualizar producto:</h1>
            <div class="flex">
    
                <div class="contenido1">
                    <input type="hidden" name="id" value="<?php echo $fila['id_activos']?>">
                    <label for="">Código:</label>
                    <br><br>
                    <input type="text" name="codigo" value="<?php echo $fila['codigo']?>" required>
                    <br><br>
                    <label for="">Folio:</label>
                    <br><br>
                    <input type="text" name="folio" value="<?php echo $fila['folio']?>" required>
                    <br><br>
                    <label for="">Nombre:</label>
                    <br><br>
                    <input type="text" name="nombre" value="<?php echo $fila['nombre']?>" required>
                    <br><br>
                    <label for="">Número de serie:</label>
                    <br><br>
                    <input type="text" name="n_serie" value="<?php echo $fila['n_serie']?>" required>
                    
                </div>
    
                <div class="contenido2">
                <label for="">Proveedor:</label>
                    <br><br>
                    <input type="text" name="proveedor" value="<?php echo $fila['proveedor']?>" required>
                    <br><br>
                    <label for="">Marca:</label>
                    <br><br>
                    <input type="text" name="marca" value="<?php echo $fila['marca']?>" required>
                    <br><br>
                    <label for="">Unidad</label>
                    <br><br>
                    <select class="select_usuario" name="unidad">
                    <?php 
                    $unidad=['Piezas','Kilogramos','Metros','Mts. Cuadrados','Litros','Caja','Dosis'];
                    $und=['PZA','KG','M','M2','LTS','CJ','DOSIS'];

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
                    
                    <br><br>
                </div>
            </div>
            <label for="">Observación:</label>
            <br><br>
            <input class="text_area" type="text" name="observacion" value="<?php echo $fila['observacion']?>">
        <br><br>
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