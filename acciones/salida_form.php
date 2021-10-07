<?php function formulario_Salida($tabla,$id_name,$nombre_tbl){ ?>
<div class="overlay" id="overlay1">
        <div class="popup" id="popup1">
            <a href="index.php" onclick="cerrar_salida()" id="btn-cerrar-popup1" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
            <div class="form-entrada">
                <h2>Salida de <?php echo $nombre_tbl?></h2>
                <br><br>
                <form action="salida.php" target="_blank" method="POST" accept-charset="utf-8" onsubmit="return ValidarSalida()">
                    <div class="flex2" id="cuerpo1">                         
                        <label for="">Nombre:</label>  
                        <input type="hidden" name="tabla" value="<?php echo $tabla; ?>" >
                        <input type="hidden" name="id_name" value="<?php echo $id_name; ?>" >
                        <input type="text" name="recibe" placeholder="Del proveedor" required>
                        <br>
                        <label for="">Área</label>
                        <input type="text" name="area" placeholder="A la que corresponde" required>
                        <br><br>
                        <label for="">Producto:</label>
                        <select name="n-sld0" id="selSalida0" onchange="maxSalida('selSalida0','inpSalida0')" required class="producto">
                            <option value="0" id="invalido">Selecciona...</option>
                            <?php 
                                $conexion=ConectarBD();
                                if(!$conexion){
                                    echo 'error';
                                    //errorConexion();
                                    }
                                    else{
                                        $query= 'SELECT '.$id_name.',nombre,color,marca,cantidad,oculto FROM '.$tabla;
                                        $res = mysqli_query($conexion,$query) or die('Ha ocurrido un Error al Ejecutar la Consulta');

                                        if($res->num_rows>0){
                                            while($fila=$res->fetch_assoc()){
                                                if($fila['oculto']==0){
                                            echo '<option id="s'.$fila[$id_name].'" name="'.$fila['cantidad'].'" value="'.$fila[$id_name].'">'.$fila['nombre'].' '.$fila['marca'].' '.$fila['color'].'</option>';
                                            }
                                            }
                                        }       
                                    }
                            ?>
                        </select>
                        <label for="">Cantidad:</label>                        
                        <input type="number" name="c-sld0" id="inpSalida0" min="1" required class="cantidad">
                    </div>
                    <div style="display:flex;">                
                        <input id="btnSalida" type="submit" value="Confirmar retiro" class="btn_retiro" onclick="resetContS()" disabled>
                        <a class="agr_producto" id="btn-agr-mas" onclick="AgregarSld('cuerpo1','selSalida0','inpSalida0')">+ Agregar otro producto</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php }?>