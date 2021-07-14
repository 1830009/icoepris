<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('admin');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="ventana.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="../bd/filtrar.js" language="javascript" type="text/javascript"></script>
    <script src="../admin/confirmar.js" language="javascript" type="text/javascript"></script>
    <script src="../bd/ordenar.js" language="javascript" type="text/javascript"></script>
    <script src="../bd/agregar.js" language="javascript" type="text/javascript"></script>
    <script src="../bd/salida.js" language="javascript" type="text/javascript"></script>
    <script src="../acciones/popup.js" language="javascript" type="text/javascript"></script>
    <title>Vales Pendientes</title>
    <?php
            include ('../header/header.blade.php');
    ?>
</header>

<body>
    <h1 class="titulo_federal">Vales pendientes <?php echo $_GET['x']?></h1>
    <div class="input-group"> 
        <span class="input-group-addon">Buscar: </span>
        <input id="entradafilter" type="text" class="form-control">
    </div>
    <br>
    <div class="contenedor">
        <div class="tabla">
            <table class="tabla_federal" id="myTable">
            <thead>
            <tr>
                    <th onclick="sortTable(0, 'str')" id="0">Estado</th>
                    <th onclick="sortTable(1, 'str')" id="1">Folio</th>
                    <th onclick="sortTable(2, 'str')" id="2">Fecha</th>
                    <th onclick="sortTable(3, 'str')" id="3">Cargo a</th>
                    <th onclick="sortTable(4, 'str')" id="4">Pedido de</th>
                    <th onclick="sortTable(5, 'int')" id="5">Programa</th>
                    <th onclick="sortTable(6, 'str')" id="6">Acción</th>
            </tr>
            </thead>

            <tbody class="contenidobusqueda">    
                <?php 
                    $conexion=ConectarBD();
                    if(!$conexion){
                        print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php');
                        }
                        else{
                            $query= 'SELECT folio,fecha,cargo,partida,programa,estado FROM vale_entrada WHERE tabla="'.$_GET['x'].'" ORDER BY estado';
                            $res = mysqli_query($conexion,$query) or 
                            die(print_mensaje('SQL[01] Ha ocurrido un error al\nintentar conectar con la base de datos...','index.php'));

                            if($res->num_rows>0){
                                while($fila=$res->fetch_assoc()){
                                echo '<tr>';
                                $state= $fila['estado'];
                                if($state==1){ 
                                    $state='Autorizado';
                                    echo '<td id="verde">'.$state.' </td>';
                                }
                                else{
                                    $state= 'Pendiente';
                                    echo '<td id="rojo">'.$state.' </td>';
                                }
                                 
                                    echo '<td>'.$fila['folio'].' </td>';
                                    echo '<td>'.$fila['fecha'].' </td>';
                                    echo '<td>'.$fila['cargo'].' </td>';
                                    echo '<td>'.$fila['partida'].' </td>';
                                    echo '<td>'.$fila['programa'].' </td>';
                                    echo '<td><button class="editar"><a href="ver_vale.php?x='.$_GET['x'].'&y='.$_GET['y'].'&f='.$fila['folio'].'">Ver completo</a></button>';
                                    
                                    /*if($state)
                                    echo '<td><button class="editar"><a href="ver_vale.php?x='.$_GET['x'].'&y='.$_GET['y'].'&f='.$fila['folio'].'">Ver completo</a></button>';*/
                                echo '</tr>';
                                }
                            }       
                        }
                ?>
                </tbody>
            </table>  
        </div>  
    </div>      
</body>
<footer><?php include ('../footer/footer.blade.php');?></footer>
</html>