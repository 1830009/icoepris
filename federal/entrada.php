<?php 
    require '../acciones/entradas.php';
    entrada_SQL('proyecto_federal','id_federal','federal');
    require '../Reporte/Entrada/index.php';
    pdfEntrada('proyecto_federal','id_federal');
?>