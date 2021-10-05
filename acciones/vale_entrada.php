<?php 
require '../bd/conectar.php';
require '../login/sesion.php';
validarUsuario('admin');
date_default_timezone_set('America/Monterrey');

if(isset($_POST['folio'])){

    $conexion=ConectarBD();
    if(!$conexion){
        print_mensaje('SQL[98] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
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
        
        $query= 'INSERT INTO `vale_entrada`(`folio`, `fecha`, `tabla`, `cargo`, `partida`, `programa`, `pedido`, `proveedor`, `fondo`, `factura`, `entrada`, `solicitado`, `director`, `autorizado`,`tipo`,`estado`) 
        VALUES ("'.$_POST['folio'].'","'.$_POST['fecha'].'","'.$_GET['x'].'","'.$_POST['cargo'].'","'.$_POST['pedido'].'","'.$_POST['programa'].'"
        ,"'.$_POST['pedido'].'","'.$_POST['proveedor'].'","'.$_POST['fondo'].'","'.$_POST['factura'].'","'.$_POST['entrada'].'","'.$_POST['solicitado'].'",
        "'.$_POST['director'].'","'.$_POST['autorizado'].'","'.$_POST['tipo-in'].'",'.$_POST['sel-guardar'].')';
        $res = mysqli_query($conexion,$query) or
        //die (mysqli_error($conexion)); 
        die(print_mensaje('SQL[99] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));
        $pag='index.php';
            switch($_GET['x']){
                case 'proyecto_federal': $pag='../federal/';break;
                case 'recurso_estatado': $pag='../estatal/';break;
                case 'donacion': $pag='../donado/';break;
                case 'limpieza': $pag='../limpieza/';break;
                default: $pag='../'.$_GET['x'].'/';
            }
        
            for ($cont=0;$cont<$i;$cont++){
                $query='INSERT INTO ';
                switch($_GET['x']){
                    case 'proyecto_federal': $query.='`in_federal` ';break;
                    case 'recurso_estado':   $query.='`in_estado` ';break;
                    case 'papeleria':        $query.='`in_papeleria` ';break;
                    case 'limpieza':        $query.='`in_limpieza` ';break;
                }
                
                $query.= '(`folio`, `id_producto`, `cantidad_solicitada`, `cant_surtida`, `cant_recibida`, `id_empleado`, `observacion`) 
                    VALUES("'.$_POST['folio'].'","'.$sel[$cont].'",'.$sol[$cont].','.$sur[$cont].','.$rec[$cont].',"'.$_SESSION['id'].'"
                        ,"'.$obs[$cont].'")';
                $res = mysqli_query($conexion,$query) or
                //die (mysqli_error($conexion)); 
                die(print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));
                
            }
            if($_POST['sel-guardar']=='true'){
                for ($cont=0;$cont<$i;$cont++){
                    $query= 'UPDATE '.$_GET['x'].' SET `cantidad`= (cantidad +'.$rec[$cont].') 
                    WHERE '.$_GET['y'].'="'.$sel[$cont].'"';
                    $res = mysqli_query($conexion,$query) or 
                    die(print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));
                }
                
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
                                die(mysqli_error($conexion));
                                //die(print_mensaje('SQL[07] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));        
                            }
                      }
                }
                print_mensaje('El registro de entrada\nSe ha guardado con exito!',$pag);
            }
            print_mensaje('El registro ha sido guardado con exito!\nRecuerde autorizar el vale en el apartado de [Vales Pendientes]',$pag);
            
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
                
                <h3>Entrada de productos:</h3>
                    <br><br>
                    <form  action="vale_entrada.php?x=<?php echo $_GET['x'].'&y='.$_GET['y']?>" method="POST" accept-charset="utf-8" onsubmit="">
                    <div class="form_vale">
                    <div class="vale1">
                        <label >Folio: </label><br><br>
                        <input name="folio" type="text" placeholder="99999" max="10" required>
                        <br><br>
                        <label >Fecha: </label><br><br>
                        <input name="fecha" type="date" value="<?php echo date('Y-m-d'); ?>" required>
                        <br><br>
                        <label >Cargo a: </label><br><br>
                        <input name="cargo" type="text" placeholder="Nombre completo"  required>
                        <br><br>
                        <label >Programa: </label><br><br>
                        <input name="programa" type="text" required>
                        <br><br>
                        <label >Proveedor: </label><br><br>
                        <input name="proveedor" type="text" required>
                        <br><br>
                        <label >Factura: </label><br><br>
                        <input name="factura" type="text" required>
                        
                    </div>

                    <div class="vale2">                    
                        <label >Partida/Pedido de: </label><br><br>
                        <input name="pedido" type="text" required>
                        <br><br>
                        <label >Fondo: </label><br><br>
                        <input name="fondo" type="text" required>
                        <br><br>
                        <label >Entrada: </label><br><br>
                        <input name="entrada" type="text" required>
                        <br><br>
                        <label >Solicitado por: </label><br><br>
                        <input name="solicitado" type="text" required>
                        <br><br>
                        <label >Director Administrativo: </label<br><br><br>
                        <input name="director" type="text" required>
                        <br><br>
                        <label >Autorizado por: </label><br><br>
                        <input name="autorizado" type="text" required>
                        
                        
                        </div>
                    </div>
                    <br><br>
                    <label >Guardad como: </label><br><br>
                        <select name="sel-guardar" >
                        <option value="false">Pendiente</option>
                        <option value="true">Autorizado</option>
                        </select><br><br>
                        <label >Tipo de entrada:</label><br><br>
                    <select name="tipo-in" > 
                    <option value="donado">Donado</option>
                    <option value="vale">Vale de entrada</option>
                    <option value="fondo">Fondo</option>
                    </select>
                    <br><br>
                    <h3>Productos:</h3>
                        <div class="flex2" id="cuerpo">
                            <input type="hidden" name="tabla" value="<?php echo $tabla; ?>" >
                            <input type="hidden" name="id_name" value="<?php echo $id_name; ?>" >
                            <br>
                            <br>
                            <label for="">Producto:</label>
                            
                            <select name="n-in0" id="sel0"  onchange="" class="producto">
                            <option value="0" id="invalido">Selecciona...</option>
                                <?php 
                                    $conexion=ConectarBD();
                                    if(!$conexion){
                                        echo 'error';
                                        //errorConexion();
                                        }
                                        else{
                                            $query= 'SELECT '.$_GET['y'].',nombre,codigo,color,marca,oculto FROM '.$_GET['x'];
                                            $res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');

                                            if($res->num_rows>0){
                                                while($fila=$res->fetch_assoc()){
                                                    if($fila['oculto']==0){
                                                        $producto=$fila['codigo'].' '.$fila['nombre'].' '.$fila['marca'].' '.$fila['color'];
                                                        echo '<option name="'.$fila['nombre'].'" value="'.$fila[$_GET['y']].'">'.$producto.'</option>';
                                                    }
                                                }
                                            }       
                                        }
                                ?>
                            </select>
                            
                            &nbsp; <label>C Solicitada:</label>
                            <input type="number" name="sol-in0" id="sol-inp0" min="1" class="cantidad" required>   
                            <label>C Surtida:</label>
                            <input type="number" name="sur-in0" id="sur-inp0" min="0" class="cantidad"required>   
                            <label>C Recibida:</label>
                            <input type="number" name="rec-in0" id="rec-inp0" min="0" class="cantidad"required>
                            &nbsp;
                            <input type="text" placeholder="Observación" max="255" name="obs0" id="obs" class="observ">  
                            <br><br>
                        </div>
                        <div style="display:flex;">
                            <input id="btn-Entrada" type="submit" value="+Agregar entrada"  class="agr_entrada" >
                            <a  class="agr_producto" id="   btn-agr-mas" onclick="Agregar('cuerpo','sel0','sol-inp0','vale')">+ Agregar otro producto</a>                   
                        </div>
                    </form>         
                </div>
			</div>
	</div>
    </body>
    <footer> <?php include ('../footer/footer.blade.php');?> </footer>
</html>