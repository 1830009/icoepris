<?php function formulario_Entrada($tabla,$id_name,$nombre_tbl){ ?>
<div class="overlay" id="overlay">
	
        <div class="popup" id="popup">

				<a href="index.php" onclick="cerrar_entrada()" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times" ></i></a>
                <div class="form-entrada">
                
                    <h2>Entrada de <?php echo $nombre_tbl?></h2>
                    <br><br>
                    <form  action="entrada.php" target="_blank" method="POST" accept-charset="utf-8" onsubmit="return ValidarEntrada()">
                    
                        <div class="flex1" id="cuerpo">
                            <label for="">Nombre:</label>
                            <input type="hidden" name="tabla" value="<?php echo $tabla; ?>" >
                            <input type="hidden" name="id_name" value="<?php echo $id_name; ?>" >
                            <input type="text" name="recibe" placeholder="Del proveedor" required>
                            <br>
                            <br>
                            <label for="">Producto:</label>
                            
                            <select name="n-in0" id="sel0"  onchange="habilitar('sel0','inp0','producto')" class="producto">
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
                                                    echo '<option name="'.$fila['nombre'].'" value="'.$fila[$id_name].'">'.$fila['nombre'].'</option>';
                                                }
                                            }       
                                        }
                                ?>
                            </select>
                            
                            <label>Cantidad:</label>
                            <input type="number" name="c-in0" id="inp0" min="1" class="cantidad">   
                                        
                        </div>
                        <div style="display:flex;">
                            <input id="btn-Entrada" type="submit" value="Agregar entrada"  class="agr_entrada" >
                            <a  class="agr_producto" id="btn-agr-mas" onclick="Agregar('cuerpo','sel0','inp0')">+ Agregar otro producto</a>                   
                        </div>
                    </form>         
                </div>
			</div>
	</div>
    
<?php }?>