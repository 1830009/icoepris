<?php function menu_acciones($tabla,$id){ ?>
<div class="botones">
            <h3>Acciones</h3>
            
                <?php

                    if($tabla=='archivo'){
                        echo '<button class="Agregar_usuarios"><a class="a_usuarios" href="agregar.php">Ingreso</a></button>';
                        echo '<button class="Agregar_usuarios"><a class="a_usuarios" href="fondo.php">Fondo</a></button>';
                        echo '<button class="Agregar_usuarios"><a class="a_usuarios" href="admin.php">Administración</a></button>';
                    }
                else{
                    if($_SESSION['tipo']=='admin' || $_SESSION['tipo']=='root'){
                        echo '<button class="Agregar_usuarios"><a class="a_usuarios" href="agregar.php">+ Agregar recurso</a></button>';
                    }
                }
                ?>
                
            <?php
            if($tabla!="archivo"){
            if ($tabla=="proyecto_federal" || $tabla=="papeleria" || $tabla=='recurso_estado' || $tabla='limpieza'){
                ?>
                <a href="../acciones/vale_entrada.php?x=<?php echo $tabla.'&y='. $id?>"><button id="btn-abrir-popup" class="entrada_federal">+ Entrada</button></a>
                <a href="../acciones/pendiente.php?x=<?php echo $tabla.'&y='. $id?>"><button id="btn-abrir-popup" class="entrada_federal">Vales pendientes</button></a>
                <?php
            }else{
            ?>
            <button id="btn-abrir-popup" class="entrada_federal" onclick="abrir_entrada()">+ Entrada</a></button>
            <?php 
                }   
            
            ?>
            <button id="btn-salida-popup" class="salida_federal" onclick="abrir_salida()">- Salida</a></button>
                <?php }
                ?>
            <h3>Generar reportes (PDF)</h3>
            
            <button class="reporte_federal">
                <a target="_blank" href="/icoepris/Reporte/Inventario/index.php?x=<?php echo $tabla?>" class="hiper">Existencia en el inventario</a>
            </button>  
            <button class="reporte_federal" id="btn-producto-popup" onclick="abrir_pdf()"> Producto en el Inventario</button>
            <!--<button class="reporte_federal">
                <a target="_blank" href="/icoepris/reporte/vale_mercancia/" class="hiper">Vale de Mercancia</a>
            </button> -->
        </div>
<?php }
function btn_accion($id_name,$nombre){
    if($_SESSION['tipo']=='admin' || $_SESSION['tipo']=='root'){
        
        echo '<td>';
        echo '<button class="editar"><a href="editar.php?x='.$id_name.'">Editar</a></button><br>
        <button onclick="eliminar('.$id_name.',\''.$nombre.'\',\'index.php\')" class="eliminar">Eliminar</button></td>';

    }
}

function b_accion($id_name,$nombre,$tipo){
    if($_SESSION['tipo']=='admin' || $_SESSION['tipo']=='root'){
        switch($tipo){
            case "INGRESO": $e="editar"; break;
            case "FONDO": $e="efondo"; break;
            case "ADMINISTRATIVO": $e="eadmin"; break;
        }
        echo '<td>';
        echo '<button class="editar"><a href="'.$e.'.php?x='.$id_name.'">Editar</a></button><br>
        <button onclick="eliminar('.$id_name.',\''.$nombre.'\',\'index.php\')" class="eliminar">Eliminar</button></td>';

    }
}
?>