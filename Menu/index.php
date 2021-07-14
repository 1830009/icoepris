<?php 

    require '../login/sesion.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" href="https://www.tamaulipas.gob.mx/wp-content/uploads/2016/10/cropped-logotam-1-32x32.png" sizes="32x32">
<img src="../img/logo-coepris.png" alt="" class="logo_header">
    <link rel="stylesheet" href="style.css">
    <title>PACID</title>
    <?php
        include ('../header/header.blade.php');
    ?>
</header>
<body>
    <main class="menu">
        <table>

            <tr>
          
                <td><a href="../federal/">
                    <div class="opcion_menu">
                        <img src="img/plano.png" alt=""> 
                        <h2>PROYECTOS FEDERALES</h1>
                    </div>
                    </a></td>
          
                <td><a href="../estatal/">
                        <div class="opcion_menu">
                            <img src="img/valores.png" alt=""> 
                            <h2>RECURSOS DEL ESTADO</h1>
                        </div>
                    </a>
                </td>

                <td><a href="../papeleria/">
                    <div class="opcion_menu">
                        <img src="img/papeleria.png" alt=""> 
                        <h2>MATERIAL DE PAPELERIA</h1>
                    </div>
                </a>
            </td>
          
            </tr>
          
            <tr>
          
              <td><a href="../limpieza/">
                <div class="opcion_menu">
                    <img src="img/limpieza.png" alt=""> 
                    <h2>MATERIAL DE LIMPIEZA</h1>
                </div>
            </a></td>
          
              <td><a href="../donado/">
                <div class="opcion_menu">
                     <img src="img/cajas.png" alt="" style="width:50%;"> 
                     <h2>MATERIAL DONADO</h1>
                 </div> 
             </a></td>
             <td><a href="../archivo/">
                <div class="opcion_menu">
                     <img src="img/documentos.png" alt="" style="width:50%;"> 
                     <h2>ALMACÉN DE ARCHIVOS</h1>
                 </div> 
             </a></td>
            </tr>
            <tr>
          
                <td><a href="../bd/respaldo.php">
                  <div class="opcion_menu">
                      <img src="img/bd_back.png" alt=""> 
                      <h2>RESPALDAR DATOS</h1>
                  </div>
              </a></td>
            
                <td><a href="../Reporte/">
                  <div class="opcion_menu">
                       <img src="img/editar.png" alt="" style="width:50%;"> 
                       <h2>EDITAR FORMATOS</h1>
                   </div> 
               </a></td>
               <td><a href="../admin/Usuarios.php">
                    <div class="opcion_menu">
                        <img src="img/usuario.png" alt=""> 
                        <h2>ADMINISTAR USUARIOS</h1>
                    </div>
                </a>
            </td>
        </tr>
          </table>

    </main>
    

</body>
<footer>
    <?php
        include ('../footer/footer.blade.php');
    ?>

</footer>
</html>