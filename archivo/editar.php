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
                $query= 'UPDATE `checklist` SET `boleta`="'.$check[1].'",`cotejo`="'.$check[2].'",`sistema`="'.$check[3].'",`archivado`="'.$check[4].'",`disco`="'.$check[5].
                '",`folio`="'.$check[6].'",`relacionado`="'.$check[7].'" WHERE `id_check`='.$_POST['id_check'];
                mysqli_query($conexion,$query) or die(print_mensaje('Lo sentimos ha ocurrio un error al agregar','index.php'));
                
                $query= 'UPDATE `archivo` SET `nombre`="'.$_POST['nombre'].'",`fecha`="'.$_POST['fecha'].'",`tipo`="INGRESO",`observacion`="'.$_POST['observacion'].
                '",`aclaracion`="'.$_POST['aclaracion'].'",`checklist`="'.$_POST['id_check'].'" WHERE `id_archivo`='.$_GET['x'];
                
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

        <form action="<?php echo 'editar.php?x='.$_GET['x'];?>" method="POST" accept-charset="utf-8">
        <h1 class="titulo_usuario">Editar Archivo:</h1>
                <?php 
                    $conexion=ConectarBD();
                    $query= 'SELECT * FROM archivo WHERE id_archivo="'.$_GET['x'].'"';
                    $res=mysqli_query($conexion,$query) or die(print_mensaje('Lo sentimos ha ocurrio un error al agregar','index.php'));
                    if($res->num_rows>0){
                        while($f=$res->fetch_assoc()){
                    
                ?>
        <br>
            <div class="flex">
                    
                <div class="contenido1">
                    <label for="">Nombre:</label>
                    <br><br>
                    <input type="text" name="nombre" value="<?php echo $f['nombre'];?>" required>
                    <br><br>
                    <label for="">Fecha:</label>
                    <br><br>
                    <input type="date" name="fecha" min="1950-01-01" value="<?php echo $f['fecha'];?>" required>
                    <br><br>                    
                    <br><br>
                </div>
    
                <div class="contenido2">
                <label for="">Aclaración:</label>
                <br><br>
                <input type="number" value="<?php echo $f['aclaracion'];?>" min="0" name="aclaracion" required>
                <br><br>
                    <label for="">observación:</label>
                    <br><br>
                    <input type="text" name="observacion" value="<?php echo $f['observacion'];?>" max="299">
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
                
                    $quer= 'SELECT * FROM checklist WHERE id_check="'.$f['checklist'].'"';
                    echo '<input type="hidden" name="id_check" value="'.$f['checklist'].'">';
                    $re=mysqli_query($conexion,$quer) or die(print_mensaje('Lo sentimos ha ocurrio un error al agregar','index.php'));
                    if($re->num_rows>0){
                        while($c=$re->fetch_assoc()){
                            //$bol=$c['boleta']!=0?explode(',',$c['boleta']):['0','0','0','0','0','0','0','0','0','0','0','0','0','0'];
                            $bol=array();
                            $bol[0]=explode(',',$c['boleta']);
                            $bol[1]=explode(',',$c['cotejo']);
                            $bol[2]=explode(',',$c['sistema']);
                            $bol[3]=explode(',',$c['archivado']);
                            $bol[4]=explode(',',$c['disco']);
                            $bol[5]=explode(',',$c['folio']);
                            $bol[6]=explode(',',$c['relacionado']);

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
                            $flag=0;
                            $num= (string) $j;
                            for($e=0;$e<$cor;$e++){
                                if(isset($bol[$i-1][$e])){
                                    if($bol[$i-1][$e]==$num){
                                        echo '<td><input id="'.$coo[$i].$j.'" type="checkbox" checked name="'.$coo[$i].$j.'"> </td>';
                                        $flag=1;
                                        break;
                                    }
                                }
                            }
                            
                            if($flag==0){
                                echo '<td><input id="'.$coo[$i].$j.'" type="checkbox" name="'.$coo[$i].$j.'"> </td>';
                                }
                            }
                            
                        }
                        }
                    echo '</tr>';
                    }
                ?>
            </table>
            </div>
        
        <input type="submit" value="Actualizar Caja" class="agregar_usuario">
        </form>
        <button class="reporte"><a target="_blank" href="<?php echo '../Reporte/vale_Caja/index.php?x='.$_GET['x']; ?>">Imprimir</a></button>
        <a href="index.php"><input type="submit" value="Cancelar" class="cancelar_usuario"></a>  
    
    </div>
</body>
<footer>
   
   <?php
                        
        include ('../footer/footer.blade.php');
                }
            }
        }
    ?>

</footer>
</html>
