<?php 
$ESTADO=1;
require '../bd/conectar.php';
require '../login/sesion.php';
validarUsuario('admin');
date_default_timezone_set('America/Monterrey');

if(isset($_POST['folio'])){

    $conexion=ConectarBD();
    if(!$conexion){
        print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
        }
        else{
        $sel=array();
        $sol=array();
        $rec=array();
        $sur=array();
        $i=$x=$y=$z=$f=0;
        foreach($_POST as $var=> $valor){                
            if($valor==0){
                print_mensaje('Debes seleccionar un elemento...','index.php');
                return;
            }
            if(substr($var,0,4)=='n-in'){
                $sel[$i]= $valor;
                $i++;
            }
            if(substr($var,0,6)=='sol-in'){
                $sol[$x]=$valor;
                $x++;
            }
            if(substr($var,0,6)=='rec-in'){
                $rec[$y]=$valor;
                $y++;
            }
            if(substr($var,0,6)=='sur-in'){
                $sur[$z]=$valor;
                $z++;
            }
            
            if(substr($var,0,3)=='obs'){
                $obs[$f]=$valor;
                $f++;
            }
                 
        }
        $query='UPDATE `vale_entrada` SET `fecha`="'.$_POST['fecha'].'",`tabla`="'.$_GET['x'].
        '",`cargo`="'.$_POST['cargo'].'",`partida`="'.$_POST['pedido'].'",`programa`="'.$_POST['programa'].
        '",`pedido`="'.$_POST['pedido'].'",`proveedor`="'.$_POST['proveedor'].'",`fondo`="'.$_POST['fondo'].
        '",`factura`="'.$_POST['factura'].'",`entrada`="'.$_POST['entrada'].'",`solicitado`="'.$_POST['solicitado'].
        '",`director`="'.$_POST['director'].'",`autorizado`="'.$_POST['autorizado'].'",`estado`='.$_POST['sel-guardar'].' WHERE `folio`="'.$_POST['folio'].'"';

        $res = mysqli_query($conexion,$query) or
        //die (mysqli_error($conexion)); 
        die(print_mensaje('SQL[02] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));
        $pag='index.php';
            switch($_GET['x']){
                case 'proyecto_federal': $pag='../federal/';break;
                case 'recurso_estatado': $pag='../estatal/';break;
                case 'donacion': $pag='../donado/';break;
                default: $pag='../'.$_GET['x'].'/';
            }

        if($_POST['sel-guardar']=='true'){
            for ($cont=0;$cont<$i;$cont++){
                $query= 'UPDATE '.$_GET['x'].' SET `cantidad`= (cantidad +'.$rec[$cont].') 
                WHERE '.$_GET['y'].'="'.$sel[$cont].'"';
                $res = mysqli_query($conexion,$query) or 
                die(print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));
                
                //INICIO Sincronizar con tabla Donación
                if($_POST['tipo-in']=='donado'){

                    for ($cont=0;$cont<$i;$cont++){
                        $query='SELECT codigo FROM donacion';
                        $existe=0;
                        $ide=(int)$sel[$cont];
                        $res = mysqli_query($conexion,$query) or 
                        die(print_mensaje('SQL[05] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));
                        if($res->num_rows>0){
                            while($f=$res->fetch_assoc()){
                                if($f['codigo']==$ide){
                                $query= 'UPDATE donacion SET `cantidad`= (cantidad +'.$rec[$cont].') 
                                WHERE codigo="'.$sel[$cont].'"';
                                mysqli_query($conexion,$query) or 
                                die(print_mensaje('SQL[06] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));        
                                $existe=1;
                                break;        
                            }
                            }
                        }
                            if($existe==0){
                                $query='INSERT INTO donacion(`codigo`, `cantidad`, `tabla`) 
                                VALUES('.$sel[$cont].','.$rec[$cont].',"'.$_GET['x'].'")';
                                mysqli_query($conexion,$query) or 
                                //die(mysqli_error($conexion));
                                die(print_mensaje('SQL[07] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));        
                            }
                      }
                }
                //FIN Sincronizar con tabla Donación

            }
    print_mensaje('El registro de entrada\nSe ha actualizado con exito!',$pag);
     
    }
    print_mensaje('El registro se ha actualizado con exito!\nRecuerde autorizar el vale en el apartado de [Vales Pendientes]',$pag); 
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="ventana.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="../bd/agregar.js" language="javascript" type="text/javascript"></script>
    <script src="../bd/salida.js" language="javascript" type="text/javascript"></script>
    <script src="../acciones/popup.js" language="javascript" type="text/javascript"></script>
    <title>Vale de Entrada</title>
    <?php
            include ('../header/header.blade.php');
    ?>
</header>
<body>
    
<div class="overlay" id="overlay">
	
        <div class="popup" id="popup">
                <div class="form-entrada">
                
                    <h2>Editar vale de entrada</h2>
                    <br><br>
                    <form  action="ver_vale.php?x=<?php echo $_GET['x'].'&y='.$_GET['y'].'&f='.$_GET['f']?>" method="POST" accept-charset="utf-8" onsubmit="">
                    <div class="form_vale">
                    <div class="vale1">
                    <?php 
                        $conexion=ConectarBD();
                        if(!$conexion){
                            print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
                            }
                        else{
                            $query= 'SELECT * FROM vale_entrada WHERE tabla="'.$_GET['x'].'" AND folio="'.$_GET['f'].'"';
                            $res = mysqli_query($conexion,$query) or 
                            die(print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));

                            if($res->num_rows>0){
                                while($f=$res->fetch_assoc()){
                    ?>
                    <label >Folio</label><br><br>
                    <input  disabled name="fol" value="<?php echo $f['folio']?>" type="text" required>
                    <input  name="folio" value="<?php echo $f['folio']?>" type="hidden" required>
                    <br><br>
                    <label >Fecha:</label><br><br>
                    <input name="fecha" type="date" value="<?php echo $f['fecha']; ?>" required>
                    <br><br>
                    <label >Cargo a:</label><br><br>
                    <input name="cargo" type="text" value="<?php echo $f['cargo']; ?>" placeholder="Nombre completo"  required>
                    <br><br>
                    <label >Programa</label><br><br>
                    <input name="programa" value="<?php echo $f['programa']; ?>" type="text" required>
                    <br><br>
                    <label >Proveedor:</label><br><br>
                    <input name="proveedor" value="<?php echo $f['proveedor']; ?>" type="text" required>
                    <br><br>
                    <label >Factura:</label><br><br>
                    <input name="factura" type="text" value="<?php echo $f['factura']; ?>" required>
                    <br><br>
                    <label >Tipo de entrada:</label><br><br>
                    <select name="tipo-in" > 
                    <?php 
                    switch($f['tipo']){
                        case 'vale': 
                            echo '<option value="vale">Vale de entrada</option>';
                            echo '<option value="donado">Donado</option>';
                            echo '<option value="fondo">Fondo</option>';
                            break;
                        case 'donado': 
                            echo '<option value="donado">Donado</option>';
                            echo '<option value="vale">Vale de entrada</option>';
                            echo '<option value="fondo">Fondo</option>';
                            break;
                        case 'fondo': 
                            echo '<option value="fondo">Fondo</option>';
                            echo '<option value="vale">Vale de entrada</option>';
                            echo '<option value="donado">Donado</option>';
                            break;
                    }
                    ?>
                    </select><br><br><br>
                    </div>

                    <div class="vale2">                    
                    <label >Partida/Pedido de:</label><br><br>
                    <input name="pedido" type="text" value="<?php echo $f['pedido']; ?>" required>
                    <br><br>
                    <label >Fondo:</label><br><br>
                    <input name="fondo" type="text" value="<?php echo $f['fondo']; ?>" required>
                    <br><br>
                    <label >Entrada:</label><br><br>
                    <input name="entrada" value="<?php echo $f['entrada']; ?>" type="text" required>
                    <br><br>
                    <label >Solicitado por:</label><br><br>
                    <input name="solicitado" value="<?php echo $f['solicitado']; ?>" type="text" required>
                    <br><br>
                    <label >Director Administrativo:</label><br><br>
                    <input name="director" value="<?php echo $f['director']; ?>" type="text" required>
                    <br><br>
                    <label >Autorizado por:</label><br><br>
                    <input name="autorizado" type="text" value="<?php echo $f['autorizado']; ?>" required>
                    <br><br>
                    <label >Estado:</label><br><br>
                    <select <?php $ESTADO=$f['estado']; if($ESTADO==1){echo ' disabled ';}?> name="sel-guardar" id="">
                    <?php 
                    //$state=$f['estado'] ? 'Autorizado':'Pendiente';
                    
                    if($f['estado']==1){
                    echo '<option value="true">Autorizado</option>';
                    echo '<option value="false">Pendiente</option>';
                    }else{
                        echo '<option value="false">Pendiente</option>';
                        echo '<option value="true">Autorizado</option>';
                    }
                    echo $state; ?>
                                    
                    </select>
                    <br><br><br>
                   
                    </div>
                    </div>
                    <?php 
                            }
                        }
                    }
                    ?>
                        <div class="flex2" id="cuerpo">
                        <br><br>
                        <h3>Productos:</h3>
                            <input type="hidden" name="tabla" value="<?php echo $_GET['x']; ?>" >
                            <input type="hidden" name="id_name" value="<?php echo $_GET['y']; ?>" >
                            <br><br>
                            <?php 
                            $conexion=ConectarBD();
                            if(!$conexion){
                                print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
                                }
                                else{
                                    $tbl="";
                                    switch($_GET['x']){
                                        case 'proyecto_federal': $tbl='in_federal';break;
                                        case 'recurso_estado':   $tbl='in_estado';break;
                                        case 'papeleria':        $tbl='in_papeleria';break;
                                        case 'limpieza':        $tbl='in_limpieza';break;
                                    }
                                    $query= 'SELECT p.'.$_GET['y'].', CONCAT(p.codigo," ",p.nombre," ",p.marca," ",p.color) nombre, e.cantidad_solicitada sol,e.cant_surtida sur,e.cant_recibida rec, e.observacion obs 
                                    FROM '.$tbl.' e JOIN '.$_GET['x'].' p ON e.id_producto=p.'.$_GET['y'].'  WHERE folio="'.$_GET['f'].'"';                                    
                                    $res = mysqli_query($conexion,$query) or 
                                    die(print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));
        
                                    if($res->num_rows>0){
                                    //while($f=$res->fetch_assoc()){
                                        $v=0;
                                        while($f=mysqli_fetch_array($res)){
                                            //echo '<p>'.$query.'</p>';
                            echo '<label for="">Producto:</label>';
                            
                            //echo '<input type="text" value="'.$f['nombre'].'">';
                            echo '<select name="n-in'.$v.'" id="sel'.$v.'"  onchange="" class="producto">';
                            echo '<option value="'.$f[$_GET['y']].'">'.$f['nombre'].'</option>';
                            $prod= $f[$_GET['y']];
                            $conexion=ConectarBD();
                                    if(!$conexion){
                                        echo 'error';
                                        //errorConexion();
                                        }
                                        else{
                                            $query= 'SELECT '.$_GET['y'].',nombre,codigo,color,marca FROM '.$_GET['x'];
                                            $resu = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');

                                            if($resu->num_rows>0){
                                                while($fila=$resu->fetch_assoc()){
                                                    $producto=$fila['codigo'].' '.$fila['nombre'].' '.$fila['marca'].' '.$fila['color'];
                                                    if($fila[$_GET['y']]==$prod){
                                                        echo '';
                                                    }else{
                                                    echo '<option name="'.$fila['nombre'].'" value="'.$fila[$_GET['y']].'">'.$producto.'</option>';
                                                    }
                                                }
                                            }       
                                        }
                                
                            echo '</select>';
                            echo '<label> C Solicitada:</label>';
                            echo '<input type="number" value="'.$f['sol'].'" name="sol-in'.$v.'" id="sol-inp'.$v.'" min="1" class="cantidad">'; 
                            echo '<label>C Surtida:</label>';
                            echo '<input type="number" value="'.$f['sur'].'" name="sur-in'.$v.'" id="sur-inp'.$v.'" min="0" class="cantidad">';
                            echo '<label>C Recibida:</label>';
                            echo '<input type="number" value="'.$f['rec'].'" name="rec-in'.$v.'" id="rec-inp'.$v.'" min="0" class="cantidad"> <br>';
                            echo '<label>Observación:</label>';
                            echo '<input type="text" value="'.$f['obs'].'" placeholder="Observación" max="255" name="obs'.$v.'" id="obs" class="observ">';
                            echo '<br><br>';
                            $v++;
                                }
                            }
                        }
                            ?>
                            
                            
                            
                        </div>
                        <div style="display:flex;">
                            <input <?php if($ESTADO==1){echo ' disabled ';}?>  id="btn-Entrada" type="submit" value="Actualizar"  class="agr_entrada" >
                            <a  class="agr_producto" id="btn-agr-mas" onclick="Agregar('cuerpo','sel0','sol-inp0','vale')">+ Agregar otro producto</a>                   
                        </div>
                    </form>         
                </div>
			</div>
    <button></button>
	</div>
    </body>
    <footer> <?php include ('../footer/footer.blade.php');?> </footer>
</html>