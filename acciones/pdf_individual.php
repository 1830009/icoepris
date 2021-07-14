<?php function formulario_Pdf($tabla,$id_name,$nombre_tbl){ ?>
<div class="overlay" id="overlay2">
        <div class="popup" id="popup2">
            <a href="#"  onclick="cerrar_pdf()" id="btn-cerrar-popup2" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
            <div class="form-entrada">
                <h2>Elige el producto para el reporte</h2>
                <br><br>
                <form target="_blank" action="../Reporte/Inv_individual/" method="POST" accept-charset="utf-8" onsubmit="return ValidarPDF()">
                    <div class="flex2" id="div-pdf0">
                        <label for="">Producto:</label>
                        <input type="hidden" name="nombre" value="<?php echo $nombre_tbl;?>">
                        <input type="hidden" name="tabla" value="<?php echo $tabla;?>">
                        <input type="hidden" name="id_tbl" value="<?php echo $id_name;?>">
                        <select name="n-pdf0" id="sel-pdf0" onchange="salidaPDF('sel-pdf0','btn-Pdf')" required>
                            <option value="0" id="invalido">Selecciona...</option>
                            <?php 
                                $conexion=ConectarBD();
                                if(!$conexion){
                                    echo 'error';
                                    //errorConexion();
                                    }
                                    else{
                                        $query= 'SELECT '.$id_name.',nombre FROM '.$tabla;
                                        $res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');

                                        if($res->num_rows>0){
                                            while($fila=$res->fetch_assoc()){
                                                echo '<option value="'.$fila[$id_name].'">'.$fila['nombre'].'</option>';
                                            }
                                        }       
                                    }
                            ?>
                        </select>
                    </div>
                    <div style="display:flex;">
                        <input  id="btn-Pdf" type="submit" value="Generar reporte" target="_blank" class="agr_entrada" disabled>        
                        <a class="agr_producto" id="btn-agr-mas" onclick="AgregarPDF('sel-pdf0')">+ Agregar otro producto</a>                    
                    </div>
                </form>   
            </div> 
        </div>
    </div>
<?php }?>