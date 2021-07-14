<?php 
    require '../acciones/entradas.php';
    entrada_SQL('recurso_estado','id_estado','estatal');
    require '../Reporte/Entrada/index.php';
    pdfEntrada('recurso_estado','id_estado');
?>