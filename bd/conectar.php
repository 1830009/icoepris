<?php 
use Dotenv\Dotenv;

require('../vendor/autoload.php');
	$dotenv= Dotenv::createImmutable('../');
	$dotenv->load();

function ConectarBD(){
    $BDserver= $_ENV['BD_SERVER'];
    $BDuser=$_ENV['BD_USUARIO'];
    $BDpass=$_ENV['BD_PASS'];
    $BDnombre=$_ENV['BD_DATABASE'];

return mysqli_connect($BDserver,$BDuser,$BDpass,$BDnombre);
}

function print_mensaje($mensaje,$pag){
    ?>
    <html>
        <script>
        window.alert('<?php echo $mensaje;?>');
        window.location.href='<?php echo $pag;?>';
        </script>
    </html>
    <?php
}

function alerta($mensaje){
    ?>
    <html>
        <script>
        window.alert('<?php echo $mensaje;?>');
        </script>
    </html>
    <?php
}
function errorConexion(){
    $_SESSION['usuario']='';
     ?>
    <html>
        <script>
        window.alert('Lo sentimos, Ha ocurrido un error al acceder al servidor!');
        window.location.href='login.php';
        </script>
    </html>
    <?php
    }

    function avisoGuardadoExito(){
         ?>
        <html>
            <script>
            window.alert('El producto ha sido\n Guardado Con Exito!');
            window.location.href='Agr_producto.php';
            </script>
        </html>
        <?php
        }
        
        function UpdateUsersExito(){
            
             ?>
            <html>
                <script>
                window.alert('El usuario ha sido actualizado\ncon éxito!');
                window.location.href='Usuarios.php';
                </script>
            </html>
            <?php
        }

        function InsertUsers(){
        
            ?>
            <html>
                <script>
                window.alert('El usuario ha sido agregado\ncon éxito!');
                window.location.href='Usuarios.php';
                </script>
            </html>
            <?php
            }  
        
            function regEntrada(){
        
                ?>
                <html>
                    <script>
                    window.alert('El usuario ha sido agregado\ncon éxito!');
                    window.location.href='index.php';
                    </script>
                </html>
                <?php
  
            }
    function regSalida(){
        
    ?>
    <html>
        <script>
        window.alert('El registro de salida\nHa sido realizado con exito!');
        window.location.href='index.php';
        </script>
    </html>
    <?php
    }    
?>