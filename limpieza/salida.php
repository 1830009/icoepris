<?php 
    require '../acciones/salidas.php';
    salida_SQL('limpieza','id_limpieza','limpieza');
    require '../Reporte/Salida/index.php';
    pdfSalida('limpieza','id_limpieza');
?>