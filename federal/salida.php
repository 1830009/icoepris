<?php 
    require '../acciones/salidas.php';
    salida_SQL('proyecto_federal','id_federal','federal');
    require '../Reporte/Salida/index.php';
    pdfSalida('proyecto_federal','id_federal');
?>