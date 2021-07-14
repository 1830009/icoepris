<?php 
    require '../acciones/entradas.php';
    entrada_SQL('activos','id_activos','activos');
    require '../Reporte/Entrada/index.php';
    pdfEntrada('activos','id_activos');
?>