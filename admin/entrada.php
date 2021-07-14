<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('admin');
    $i=0;
    if(isset($_POST['n-in'.$i])){
        
        $conexion=ConectarBD();
        if(!$conexion){
            echo 'error';
            //errorConexion();
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
                $query= 'UPDATE `proyecto_federal` SET `cantidad`= (cantidad +'.$cant[$cont].') 
                WHERE id_federal="'.$sel[$cont].'"';
                $res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
                
                $query= 'INSERT INTO `fecha_entrada`(`cantidad`, `tabla`, `id_producto`, `id_empleado`)
                        VALUES ("'.$cant[$cont].'","proyecto_federal",'.$sel[$cont].','.$_SESSION['id'].')';
                $res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
                //regEntrada();
                }
                print_mensaje('El registro de entrada\nSe ha guardado con exito!','index.php');
                
        }
    }
    else{
        print_mensaje('[ERR-01]Lo sentimos, ocurrio un error inesperado\nIntente de nuevo','index.php');
    }
    ?>