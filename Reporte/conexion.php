<?php 
use Dotenv\Dotenv;

require('../../vendor/autoload.php');
	$dotenv= Dotenv::createImmutable('../../');
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

function fecha(){
    date_default_timezone_set('America/Monterrey');
    $dianum=date("d",time());
    $mes=date("m",time());
    settype($mes,"int");
    $year= date("Y",time());
    $meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
    return $dianum."_".$meses[$mes-1]."_".$year;
}
?>