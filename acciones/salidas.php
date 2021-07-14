<?php 
function salida_SQL($tabla,$id_name,$tipo){
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario($tipo);
    $i=$x=0;
    if(isset($_POST['n-sld'.$i])){
        
        $conexion=ConectarBD();
        if(!$conexion){
            print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
            }
            else{
            $sel=array();
            $cant=array();
            $i=$x=0;
            foreach($_POST as $var=> $valor){                
                if($valor==0){
                    print_mensaje('Debes seleccionar un elemento...','index.php');
                    return;
                }
                if(substr($var,0,5)=='n-sld'){
                    $sel[$i]= $valor;
                    $i++;
                }
                if(substr($var,0,5)=='c-sld'){
                    $cant[$x]=$valor;
                    $x++;
                }
                     
            }
            
            for ($cont=0;$cont<$i;$cont++){
                
                    $query='SELECT cantidad FROM  '.$tabla.' WHERE '.$id_name.'="'.$sel[$cont].'"';
                    $res = mysqli_query($conexion,$query) or 
                    die(print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));
                if($res->num_rows>0){
                    $fila=$res->fetch_assoc();
                    $cantActual= $fila['cantidad'];
                    $cantRestar= $cant[$cont];
                    
                    if($cantActual>= $cantRestar){
                        $query= 'UPDATE '.$tabla.' SET `cantidad`= (cantidad -'.$cantRestar.') 
                            WHERE '.$id_name.'="'.$sel[$cont].'"';
                        $res = mysqli_query($conexion,$query) or 
                        die(print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));
                        $query= 'INSERT INTO `fecha_salida`(`cantidad`, `tabla`, `id_producto`, `id_empleado`)
                        VALUES ("'.$cantRestar.'","'.$tabla.'",'.$sel[$cont].','.$_SESSION['id'].')';
                        $res = mysqli_query($conexion,$query) or 
                        die(print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));
                    }
                    else{
                        print_mensaje('No es posible retirar esa cantidad. \nCantidad en el inventario: '.$cantActual,'index.php');
                    }
                }
            }
               // regSalida();
                
        }
    }
    else{
        print_mensaje('[ERR-01]Lo sentimos, ocurrio un error inesperado\nIntente de nuevo','index.php');
    }
}
    ?>