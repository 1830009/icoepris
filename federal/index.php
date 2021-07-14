<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('federal');
    
    if(isset($_GET['x'])){
        $conexion=ConectarBD();
        if(!$conexion){
            print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
            }
            else{
                $query= 'DELETE FROM proyecto_federal WHERE id_federal='.$_GET['x'];
                mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');
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
    <title>Proyectos federales</title>
    <?php
            include ('../header/header.blade.php');
    ?>

</header>

<body>
    <h1 class="titulo_federal">Proyectos federales</h1>
    <div class="input-group"> 
        <span class="input-group-addon">Buscar: </span>
        <input id="entradafilter" type="text" class="form-control">
    </div>
    <br>
    <div class="contenedor">
        <?php require '../acciones/menu.php'; 
                menu_acciones('proyecto_federal','id_federal');
        ?>
   
        <div class="tabla">
            <table class="tabla_federal" id="myTable">
            <thead>
            <tr>
                <th onclick="sortTable(0, 'str')" id="0">Código</th>
                <th onclick="sortTable(3, 'str')" id="3">Nombre</th>
                <th onclick="sortTable(4, 'int')" id="4">Cantidad</th>
                <th onclick="sortTable(5, 'str')" id="5">Unidad</th>
                <th onclick="sortTable(6, 'str')" id="6">Marca</th>
                <th onclick="sortTable(7, 'str')" id="7">Color</th>
                <?php  if($_SESSION['tipo']=='admin' || $_SESSION['tipo']=='root'){
                        echo  '<th colspan="2">Acción</th>';
                }?>
            </tr>
            </thead>

            <tbody class="contenidobusqueda">    
                <?php 
                    $conexion=ConectarBD();
                    if(!$conexion){
                        print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
                        }
                    else{
                        $query= 'SELECT * FROM proyecto_federal';
                        if(isset($_GET['orden'])){
                            $query='SELECT * FROM proyecto_federal ORDER BY '.$_GET['orden'];
                        }
                        $res = mysqli_query($conexion,$query) or
                        die(print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));

                        if($res->num_rows>0){
                            while($fila=$res->fetch_assoc()){
                                echo '<tr>';
                                echo '<td>'.$fila['codigo'].' </td>';
                                echo '<td>'.$fila['nombre'].' </td>';
                                echo '<td>'.$fila['cantidad'].' </td>';
                                echo '<td>'.$fila['unidad'].' </td>';
                                echo '<td>'.$fila['marca'].' </td>';
                                echo '<td>'.$fila['color'].' </td>';
                                btn_accion($fila['id_federal'],$fila['nombre']);
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
        require '../acciones/entrada_form.php';
        formulario_Entrada('proyecto_federal','id_federal','recursos federales');                
        require '../acciones/salida_form.php';
        formulario_Salida('proyecto_federal','id_federal','recursos federales');                
        require '../acciones/pdf_individual.php';
        formulario_Pdf('proyecto_federal','id_federal','recursos federales');                
    ?>
</body>
<footer> <?php include ('../footer/footer.blade.php');?> </footer>
</html>