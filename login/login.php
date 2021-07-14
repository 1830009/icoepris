<?php
    session_reset();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <link rel="icon" href="https://www.tamaulipas.gob.mx/wp-content/uploads/2016/10/cropped-logotam-1-32x32.png" sizes="32x32">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="contenedor_login">
        <div class="contenido_login">
            <img src="img/logo-coepris.png" class="logo_login">
            <h1 class="titulo_login">Iniciar sesión</h1>
            <br>
            <form action="validar.php" method="POST" accept-charset="utf-8">
			<label>Usuario:</label>
            <br><br>
            <input type="text" name="user" placeholder="Ingrese usuario" required>
            <br><br>
            <label>Contraseña:</label>
            <br><br>
            <input type="password" name="pass" placeholder="Ingrese contraseña"  minlength="4" required>
            <br>
            <input type="submit" value="Ingresar" class="boton_login">
			</form>
            <br>
            <!--<div class="recuperar">
            <label ><a href="recuperar_pass.php">Recuperar Contraseña</a></label>
            </div>-->
        </div>
        <div class="imagen_login">
            <img src="img/coepris_fondo.PNG" class="img_coepris">
        </div>
    </div>
</body>
</html>