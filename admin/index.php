<?php 
    require '../login/sesion.php';
    require '../bd/conectar.php';
    if(validarUsuario('admin'))
        header('location: ../menu/');
?>