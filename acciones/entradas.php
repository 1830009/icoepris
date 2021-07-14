<?php 
function entrada_SQL($tabla,$id_name,$tipo){
    require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario($tipo);
    $i=0;
    if(isset($_POST['n-in'.$i])){
        
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
                if(substr($var,0,4)=='n-in'){
                    $sel[$i]= $valor;
                    $i++;
                }
                if(substr($var,0,4)=='c-in'){
                    $cant[$x]=$valor;
                    $x++;
                }
                     
            }
            
            for ($cont=0;$cont<$i;$cont++){
                $query= 'UPDATE '.$tabla.' SET `cantidad`= (cantidad +'.$cant[$cont].') 
                WHERE '.$id_name.'="'.$sel[$cont].'"';
                $res = mysqli_query($conexion,$query) or 
                die(print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));
                
                $query= 'INSERT INTO `fecha_entrada`(`cantidad`, `tabla`, `id_producto`, `id_empleado`)
                        VALUES ("'.$cant[$cont].'","'.$tabla.'",'.$sel[$cont].','.$_SESSION['id'].')';
                $res = mysqli_query($conexion,$query) or
                 die(print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));
                }
                
                //print_mensaje('El registro de entrada\nSe ha guardado con exito!','index.php');
        }
    }
    else{
        print_mensaje('[ERR-01]Lo sentimos, ocurrio un error inesperado\nIntente de nuevo','index.php');
    }
}
    ?>