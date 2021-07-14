<?php
    if(isset($_POST['usuario'])){
        if(isset($_POST['pass'])){
            $user=$_POST['usuario'];
            $pass=$_POST['pass'];

            if($user== 'neto' && $pass=='1234'){
                header('index.php');
                
            }
            else{
                echo 'Error contra no valida';
            }
        }
    }
    echo 'Error';

?>