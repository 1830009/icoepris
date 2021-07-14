<?php
     require '../login/sesion.php';
     require '../bd/conectar.php';
     validarUsuario('admin');
       
    if(isset($_POST['jefe'])){
        $conexion=ConectarBD();
        if(!$conexion){
            print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
            }
        $jefe = $_POST['jefe'];
        $comisionado = $_POST['comisionado'];
        $saved='UPDATE formato SET';
        
        if($_FILES['img_header']['name']!=''){
            print_mensaje($_FILES['img_header'],'#');
            $imgHeader=$_FILES['img_header'];
            $label='img/'.$imgHeader['name'];
            
            if(move_uploaded_file($imgHeader['tmp_name'],'img/'.$imgHeader['name'])){
                chmod('img/'.$imgHeader['name'],0777);
                $saved.=' logo_header = "'.$label.'",';
            }
            else{
                print_mensaje('IMG[01] Ha ocurrido un error al\nintentar guardar la imagen','index.php');
            }
        }
        if($_FILES['img_footer']['name']!=''){
            $imgFooter=$_FILES['img_footer'];
            $lab='img/'.$imgFooter['name'];
            if(move_uploaded_file($imgFooter['tmp_name'],'img/'.$imgFooter['name'])){
                chmod('img/'.$imgFooter['name'],0777);
                $saved.=' logo_footer = "'.$lab.'",';
            }
            else{
                print_mensaje('IMG[01] Ha ocurrido un error al\nintentar guardar la imagen','index.php');
            }
        }

        $color = trim($_POST['color']);
        $rgb=""; 
        $hex = str_replace('#','', $color);
        $rgb = hexdec(substr($hex,0,2));
        $rgb =$rgb.','.hexdec(substr($hex,2,2));
        $rgb =$rgb.','.hexdec(substr($hex,4,2));       
        $saved .= "  color='$rgb', autorizo='$jefe', vobo = '$comisionado' WHERE id_formato = '0'";
    
        if(mysqli_query($conexion, $saved)){
            print_mensaje('Los elementos han sido\nGuardado con exito!','index.php');
        }
        else{
            echo $saved;
           print_mensaje('Lo sentimos ha ocurrido un error','#');
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>

    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://www.tamaulipas.gob.mx/wp-content/uploads/2016/10/cropped-logotam-1-32x32.png" sizes="32x32">
    <title>Editar</title>

    <?php
            include ('../header/header.blade.php');
    ?>

</header>
<body>
<h1 class="titulo_usuarios">Editar Reportes PDF</h1>    
    <div class="contenido_formulario">
        <form action="index.php" method="POST" enctype="multipart/form-data">   
            <div class="contenido1">
                <br><br>
                <strong>Valores actuales:</strong>
                <br><br>
                <table border="1">
                <?php
                
                $conexion=ConectarBD();
                if(!$conexion){
                    print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
                    }
                $saved = "SELECT * FROM formato WHERE id_formato= 0";
                $res=mysqli_query($conexion, $saved);
                if($res->num_rows>0){
                    $fila=$res->fetch_assoc();
                    $color= $fila['color'];
                    if (preg_match("/^[0-9]+(,| |.)+[0-9]+(,| |.)+[0-9]+$/i", $color)){ 
                        $rgbstr = str_replace(array(',',' ','.'), ':', $color); 
                        $rgbarr = explode(":", $rgbstr);
                        $result = '#';
                        $result .= str_pad(dechex($rgbarr[0]), 2, "0", STR_PAD_LEFT);
                        $result .= str_pad(dechex($rgbarr[1]), 2, "0", STR_PAD_LEFT);
                        $result .= str_pad(dechex($rgbarr[2]), 2, "0", STR_PAD_LEFT);
                        $result = strtoupper($result); 
                    }

                    echo '<tr>';
                    echo '<th>Nombre de Autorización:</th>';
                    echo '<td><input type="text" name="jefe" value="'.$fila['autorizo'].'" autofocus></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th>Nombre de Vo.Bo.:</th>';
                    echo '<td><input type="text" name="comisionado" value="'.$fila['vobo'].'" autofocus></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th>Color:</th>';
                    echo '<td> <p>Oprima para eligir un color: </p><input name="color" type="color" value="'.$result.'" class="input_colores"></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th>Imagen encabezado:</th>';
                    echo '<td> <img src="'.$fila['logo_header'].'" class="img_logo"><br>
                            <input type="file" name="img_header"  accept="image/png,.jpeg,.jpg" class="input_img"></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<th>Imagen pie de pagina:</th>';
                    echo '<td> <img src="'.$fila['logo_footer'].'" class="img_logo"><br>
                            <input type="file" name="img_footer"  accept="image/png,.jpeg,.jpg" class="input_img"></td>';
                    echo '</tr>';
                    }
                ?>
                </table>
                
            </div>
           
            <br><br><br><br>
            <input type="submit" class="guardar" name="guardar" value="Guardar">
        </form>
        <a href="ejemplo/" target="_blank"><button class="vista" >Vista Previa</button></a>
    </div>
</body>
</html>

<footer>
    
    <?php
        include ('../footer/footer.blade.php');
    ?>

</footer>