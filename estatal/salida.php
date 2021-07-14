<?php 
    require '../acciones/salidas.php';
    salida_SQL('recurso_estado','id_estado','estatal');
    require '../Reporte/Salida/index.php';
    pdfSalida('recurso_estado','id_estado');
?>