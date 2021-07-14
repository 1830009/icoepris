<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('archivo');
    
    if(isset($_POST['nombre'])){    
        $conexion=ConectarBD();
        if(!$conexion){
            print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
            }
            $check=['','','','','','','','','','','','',''];
            $coo=["COO","BOL","COT","SIS","ARC","DIS","FOL","REL"];
            foreach($_POST as $var=> $valor){
                             
                foreach($coo as $val=> $v){   
                    if(substr($var,0,3)==$v){
                        if($check[$val]!=''){
                            $check[$val].=',';   
                        }
                        if(substr($var,3,strlen($var))!='0'){
                            $check[$val].=substr($var,3,strlen($var));
                            }
                        break;
                    }
                }
            }
            foreach($check as $i => $x){
                if($x==''){
                    $check[$i]='0';
                }
            }
                $query= 'INSERT INTO `checklist`( `boleta`, `cotejo`, `sistema`, `archivado`, `disco`, `folio`, `relacionado`) 
                VALUES ("'.$check[1].'","'.$check[2].'","'.$check[3].'","'.$check[4].'","'.$check[5].'","'.$check[6].'","'.$check[7].'")';
                mysqli_query($conexion,$query) or die(print_mensaje('Lo sentimos ha ocurrio un error al agregar','index.php'));
                $idcheck= $conexion->insert_id;
                $query= 'INSERT INTO `archivo`(`nombre`,`fecha`,`tipo`, `observacion`, `aclaracion`,`checklist`) 
                VALUES ("'.$_POST['nombre'].'","'.$_POST['fecha'].'","INGRESO","'.$_POST['observacion'].'",'.$_POST['aclaracion'].','.$idcheck.')' ;
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
<h2 class="titulo_usuarios">Agregar Archivo</h2>
    
    <div class="contenido_formulario">

        <form action="agregar.php" method="POST" accept-charset="utf-8">
        <h1 class="titulo_usuario">Agregar Archivo:</h1>
            <div class="flex">
                    
                <div class="contenido1">
                    <label for="">Nombre:</label>
                    <br><br>
                    <input type="text" name="nombre" required>
                    <br><br>
                    <label for="">Fecha:</label>
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
                    <br><br><br><br>
                </div>
            </div>
            <div class="cont2">
            <table>
            <?php
                $coord=["<b>SEL. TODO</b>","CD VICTORIA","TAMPICO","MATAMOROS","REYNOSA","NUEVO LAREDO","MANTE","SAN FERNANDO",
                "JAUMAVE","MIGUEL ALEMAN","VALLE HERMOSO","PADILLA","ALTAMIRA","SANIDAD INTERNA"];     
                
                $cor= count($coord);
 
                $coordi=["COORDINACIÓN","BOLETAS","COTEJO","S/SISTEMA","ARCHIVADO","DISCO/R","FOLIOS/DOC",
                "RELACIONADO"];

                $titulo= count($coordi);
                $coo=["COO","BOL","COT","SIS","ARC","DIS","FOL","REL"];

                echo '<tr>';
                foreach($coordi as $val=> $v){
                    echo '<td><b>'.$v.'</b></td>';
                }
                echo '</tr>';
                for($j=0;$j<$cor;$j++){
                    echo '<tr>';
                    echo '<td>'.$coord[$j].'</td>';
                    for($i=1;$i<$titulo;$i++){
                        if($j==0){
                            echo '<td><input type="checkbox" id="'.$coo[$i].$j.'" onChange="sel_todo(\''.$coo[$i].'\',\''.$j.'\')" name="'.$coo[$i].$j.'"> </td>';
                        }else{
                            echo '<td><input id="'.$coo[$i].$j.'" type="checkbox" name="'.$coo[$i].$j.'"> </td>';
                        }
                        }
                    echo '</tr>';
                    }
                ?>
            </table>
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
