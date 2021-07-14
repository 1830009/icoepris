<?php 
    require '../acciones/salidas.php';
    salida_SQL('papeleria','id_papeleria','papeleria');

    require '../Reporte/Salida/index.php';
    pdfSalida('papeleria','id_papeleria');
?>