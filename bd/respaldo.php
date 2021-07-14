<?php 
use Dotenv\Dotenv;
require "conectar.php";
require('../vendor/autoload.php');
	$dotenv= Dotenv::createImmutable('../');
	$dotenv->load();

    $BDserver= $_ENV['BD_SERVER'];
    $BDuser=$_ENV['BD_USUARIO'];
    $BDpass=$_ENV['BD_PASS'];
    $BDnombre=$_ENV['BD_DATABASE'];
    date_default_timezone_set('America/Monterrey');

$fecha = date("dmY-His"); //Obtenemos la fecha y hora para identificar el respaldo

// Construimos el nombre de archivo SQL Ejemplo: mibase_20170101-081120.sql
$salida_sql = $BDnombre.'_'.$fecha.'.sql'; 
//Comando para genera respaldo de MySQL, enviamos las variales de conexion y el destino
if($BDpass==''){
    $dump = "C:/xampp\mysql\bin\mysqldump -h $BDserver -u $BDuser $BDnombre > $salida_sql";
}
else{
$dump = "C:/xampp\mysql\bin\mysqldump -h $BDserver -u $BDuser -p$BDpass $BDnombre > $salida_sql";
}
system($dump, $output); //Ejecutamos el comando para respaldo

$zip = new ZipArchive(); //Objeto de Libreria ZipArchive

//Construimos el nombre del archivo ZIP Ejemplo: mibase_20160101-081120.zip
$salida_zip = 'back/'.$BDnombre.'_'.$fecha.'.zip';

if($zip->open($salida_zip,ZIPARCHIVE::CREATE)===true) { //Creamos y abrimos el archivo ZIP
    $zip->addFile($salida_sql); //Agregamos el archivo SQL a ZIP
    $zip->close(); //Cerramos el ZIP
    unlink($salida_sql); //Eliminamos el archivo temporal SQL
    //header ("Location: $salida_zip");
    //unlink($salida_zip); // Redireccionamos para descargar el Arcivo ZIP
    print_mensaje('Se Ha Realizado un respaldo de la Base de datos\n Archivo: bd/'.$salida_zip,'/icoepris');
    } else {
        print_mensaje('Ocurrio un error al intentar realizar el respaldo\nIntente de nuevo','/icoepris');
}


?>