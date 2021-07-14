<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('activos');
    
    if(isset($_GET['x'])){
        $conexion=ConectarBD();
        if(!$conexion){
            print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
            }
            else{
                $query= 'DELETE FROM activos WHERE id_activos='.$_GET['x'];
                mysqli_query($conexion,$query) or 
                die(print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));
                print_mensaje('El elemento ha sido eliminado con exito!','index.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ventana.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="../bd/filtrar.js" language="javascript" type="text/javascript"></script>
    <script src="../admin/confirmar.js" language="javascript" type="text/javascript"></script>
    <script src="../bd/ordenar.js" language="javascript" type="text/javascript"></script>
    <script src="../bd/agregar.js" language="javascript" type="text/javascript"></script>
    <script src="../bd/salida.js" language="javascript" type="text/javascript"></script>
    <script src="../acciones/popup.js" language="javascript" type="text/javascript"></script>
    <title>Almacén de activos</title>
    <?php
            include ('../header/header.blade.php');
    ?>
</header>

<body>
    <h1 class="titulo_federal">Almacén de activos </h1>
    <div class="input-group"> 
        <span class="input-group-addon">Buscar: </span>
        <input id="entradafilter" type="text" class="form-control">
    </div>
    <br>
    <div class="contenedor">
        <?php require '../acciones/menu.php'; 
            menu_acciones('activos','id_activos');
        ?>
   
        <div class="tabla">
            <table class="tabla_federal" id="myTable">
            <thead>
            <tr>
                    <th onclick="sortTable(0, 'str')" id="0">Código</th>
                    <th onclick="sortTable(1, 'str')" id="1">Folio</th>
                    <th onclick="sortTable(2, 'str')" id="2">Proveedor</th>
                    <th onclick="sortTable(3, 'str')" id="3">Nombre</th>
                    <th onclick="sortTable(4, 'str')" id="4">Número de serie</th>
                    <th onclick="sortTable(5, 'int')" id="5">Cantidad</th>
                    <th onclick="sortTable(6, 'str')" id="6">Unidad</th>
                    <th onclick="sortTable(7, 'str')" id="7">Marca</th>
                    <th onclick="sortTable(8, 'str')" id="8">Color</th>
                    <th onclick="sortTable(9, 'str')" id="9">Observación</th>
                    <?php 
                    
                    if($_SESSION['tipo']=='admin' || $_SESSION['tipo']=='root'){
                        echo  '<th>Acción</th>';
                    }
                ?>
            </tr>
            </thead>

            <tbody class="contenidobusqueda">    
                <?php 
                    $conexion=ConectarBD();
                    if(!$conexion){
                        print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
                        }
                        else{
                            $query= 'SELECT * FROM activos';
                            if(isset($_GET['orden'])){
                                $query='SELECT * FROM activos  ORDER BY '.$_GET['orden'];
                            }
                            $res = mysqli_query($conexion,$query) or 
                            die(print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));

                            if($res->num_rows>0){
                                while($fila=$res->fetch_assoc()){
                                    echo '<tr>';
                                    echo '<td>'.$fila['codigo'].' </td>';
                                    echo '<td>'.$fila['folio'].' </td>';
                                    echo '<td>'.$fila['proveedor'].' </td>';
                                    echo '<td>'.$fila['nombre'].' </td>';
                                    echo '<td>'.$fila['n_serie'].' </td>';
                                    echo '<td>'.$fila['cantidad'].' </td>';
                                    echo '<td>'.$fila['unidad'].' </td>';
                                    echo '<td>'.$fila['marca'].' </td>';
                                    echo '<td>'.$fila['color'].' </td>';
                                    echo '<td>'.$fila['observacion'].' </td>';
                                    if($_SESSION['tipo']=='admin' || $_SESSION['tipo']=='root'){
                                        echo '<td><button class="editar"><a href="editar.php?x='.$fila['id_activos'].'">Editar</a></button><br><br>
                                        <button onclick="eliminar('.$fila['id_activos'].',\''.$fila['nombre'].'\',\'index.php\')" class="eliminar">Eliminar</button></td>';
                                    }
                                    echo '</tr>';
                                }
                            }       
                        }
                ?>
                </tbody>
            </table>  
        </div>  
    </div>      
   
    <?php
        $tabla='activos';
        $id='id_activos';
        $nombre='Activos';
        require '../acciones/entrada_form.php';
        formulario_Entrada($tabla,$id,$nombre);
        require '../acciones/salida_form.php';
        formulario_Salida($tabla,$id,$nombre);
        require '../acciones/pdf_individual.php';
        formulario_Pdf($tabla,$id,$nombre);
            ?>
</body>

<footer><?php include ('../footer/footer.blade.php');?></footer>
</html>