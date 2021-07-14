<!DOCTYPE html>

<?php 
	require '../login/sesion.php';
    require '../bd/conectar.php';
    validarUsuario('admin');
    
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <link rel="stylesheet" href="ventana.css">    
    <link rel="stylesheet" href="../css/style.css">
    <script src="script.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="../bd/filtrar.js" language="javascript" type="text/javascript"></script>
    <script src="../admin/confirmar.js" language="javascript" type="text/javascript"></script>
    <script src="../bd/ordenar.js" language="javascript" type="text/javascript"></script>
    <script src="../bd/agregar.js" language="javascript" type="text/javascript"></script>
    <script src="../bd/salida.js" language="javascript" type="text/javascript"></script>
    <script src="../acciones/popup.js" language="javascript" type="text/javascript"></script>
    <title>Ayuda</title>
    <?php
            include ('../header/header.blade.php');
    ?>

</header>


<body>

<h1 class="titulo">¿Cómo podemos ayudarle?</h1>
    <div class="contenedor_principal">
        
        <div class="contenedor_opciones">
        
            <div class="contenedor_admin">
                <h1 class="sub">OPCIONES</h1>
                <button id="btn_menu" onclick="Menu()">Menú principal</button>
                <button id="btn_menu" onclick="ENC()">Menú del encabezado</button>
                <button id="btn_usuarios" onclick="Usuarios()">Usuarios</button>
                <button id="btn_pe" onclick="BTNPF()">Proyectos federales</button>
                <button id="btn_re" onclick="BTNRE()">Recursos del estado</button>
                <button id="btn_mp" onclick="BTNMP()">Material de papelería</button>
                <button id="btn_ml" onclick="BTNML()">Material de limpieza</button>
                <button id="btn_md" onclick="BTNMD()">Material donado</button>
                <button id="btn_aa" onclick="BTNAC()">Almacén de archvios</button>
                <button id="btn_er" onclick="BTNER()">Editar reportes</button>
            </div>
        
            
        </div>
        
        <div class="contenedor_ayudas">
            <div class="ayudas" style="display:block;" id="cont_menu">
                <h1 class="tsm">Menú principal</h1>
                <br>
                <p class="psm">Para poder navegar por toda la aplicación web, este cuenta con un menú de opciones el cual nos 
                mostrará todas las acciones que puede realizar la aplicación web. Para poder navegar entre estas 
                opciones, solo se tendrá que hacer click en la opción el cual esté interesado en ingresar.</p>
                <br>
                <img class="ism" src="img/MPC.PNG" >
                <br><br>
                <p class="psm">En la imagen anterior podemos ver las opciones con las que cuenta el menú, solo deberá hacer click 
                en una de las opciones para poder entrar a ella.  </p>
            </div>
            
            <div class="ayudas" id="cont_usuarios">
                <h1 class="tsm">Usuarios</h1>
                <br><br>
                <div class="preguntas">
                    <h2>Preguntas</h2>
                    <a href="#AGUS">¿Cómo agregar usuarios?</a><br>
                    <a href="#EDUS">¿Cómo editar usuarios?</a><br>
                    <a href="#ELUS">¿Cómo eliminar usuarios?</a><br>
                </div>
                <br><br>
                <p class="psm">El administrador tiene el rol de poder registrar usuarios y asignarles un departamento. 
                Para esto, se deberá de dirigir a la opción administrar usuarios, la cual se encuentra en el menú de 
                opciones y es representada por el siguiente icono. </p>
                <br><br>
                <img class="ism" src="img/OAUM.PNG" style="width:20%;">
                <br><br>
                <p class="psm">Una vez que se meta a la opción de administrar usuarios, veremos la siguiente pantalla, 
                en la cual podemos observar los usuarios que se han registrado en el sistema, además tendremos la opción 
                de poder agregar más usuarios al sistema. Otra opción es poder editar y eliminar los usuarios que se han 
                registrado en el sistema.   </p>
                <br><br>
                <img class="ism" src="img/OUC.PNG">
                <br><br>
                <h1 class="tsm" id="AGUS">Agregar usuarios</h1>
                <br><br>
                <p class="psm">Para poder agregar usuarios, tendremos que hacer click en el botón verde de agregar nuevo 
                usuario. Cuando se haya hecho click, podemos observar los datos que tenemos que ingresar para poder 
                registrar al usuario. Se debe de llenar todos los campos que se nos muestra para poder agregar el 
                usuario</p>
                <br><br>
                <img class="ism" src="img/CAGU.PNG">
                <br><br>
                <p class="psm">La primera entrada de datos se deben de registrar los datos generales del usuario que se registrara.
                </p><br><br>
                <img class="ism" src="img/PEDD.PNG">
                <br><br>
                <p class="psm"> La segunda entrada de datos, tendremos que registrar el nombre del usuario, este nombre 
                de usuario será con el que se ingresará al sistema, además se tendrá que ingresar una contraseña, la cual
                 el usuario tendrá que ingresar para poder entrar al sistema, además tendremos que asignarle el
                  departamento al que pertenece el usuario, por ejemplo recursos federales, papelería, limpieza, etc.
                </p>
                <br><br>
                <img class="ism" src="img/SEDD.PNG">
                <br><br>
                <p class="psm">También se puede asignar el rol de administrador al usuario registrado, para esto solo 
                se tendrá que elegir el rol de administrador en el tipo de usuario. Una vez que se haya llenado todos los 
                datos del usuario, solo tendrá que dar click en el botón guardar. Para cancelar el registro de usuario
                solo de click en el botón cancelar. 
                </p><br><br>
                <h1 class="tsm" id="EDUS">Editar usuarios</h1>
                <br><br>
                <p class="psm">Para editar usuarios tenemos dos botones en cada uno de los usuarios registrados 
                en el sistema. Para editar usuarios haremos click en el botón amarillo de editar, el cual nos abrira una 
                ventana el cual nos mostrara todos los campos de registro del usuario y nos cargara todos los datos que el 
                usuario tenga registrado.
                </p>
                <br><br>
                <img class="ism" src="img/EDUM.PNG">
                <br><br>
                <p class="psm">Para editar, solo tendremos que cambiar la información que queramos modificar en su 
                respectivo campo, por ejemplo, si deseamos cambiar el nombre del usuario, solo tendremos que identificar 
                el campo del nombre del usuario, y cambiarlo por el nuevo nombre que se quiere registrar.   
                Esto mismo pasa con otros campos, solo tendremos que identificar el dato que se requiera modificar,
                 y se cambia por el nuevo dato. 
                </p>
                <br><br>
                <img class="ism" src="img/BTNGU.PNG" style="width:20%;">
                <br><br>
                <p class="psm">Para el campo de la contraseña, si no se requiere cambiar la contraseña, se tendrá que 
                dejar el campo en blanco, en dado caso de que se requiera cambiar, solo se pondrá la nueva contraseña 
                en el campo de contraseña.  Una vez hechos los cambios necesarios solo se tendrá que hacer click en el 
                botón verde de agregar entrada.  
                </p>
                <br><br>
                <h1 class="tsm">Eliminar usuarios</h1>
                <br><br>
                <p class="psm" id="ELUS">Para eliminar un usuario, solo tendremos que identificar el usuario que se desea eliminar,
                 en la parte derecha aparecerán dos botones, le tendremos que dar click en el botón rojo de eliminar. 
                 Cuando le hagamos click nos aparecerá una ventana la cual requiere que se confirme que se quiere 
                 eliminar el usuario. En esta  aparecerá el nombre del usuario que escogimos para eliminar. 
                 Para confirmar la eliminación solo tendremos que dar click en el botón aceptar para confirmar la 
                 eliminación del usuario.  
                </p>
                <br><br>
                <img class="ism" src="img/CBEU.PNG" style="width:50%;">
                
            </div>
            



            <div class="ayudas" id="cont_pf">
                <h1  class="tsm">Proyectos federales</h1>
                <br><br>
                <div class="preguntas">
                    <h2>Preguntas</h2>
                    <a href="#AGPF">¿Cómo agregar recursos?</a><br>
                    <a href="#EDPF">¿Cómo editar recursos?</a><br>
                    <a href="#ELPF">¿Cómo eliminar recursos?</a><br>
                    <a href="#HVPF">¿Cómo hacer vales de entrada?</a><br>
                    <a href="#VVPF">¿Cómo ver los vales de entrada?</a><br>
                    <a href="#SIPF">¿Cómo hacer salidas del invetario?</a><br>
                    <a href="#REPF">¿Cómo hacer un reporte de existencia de inventario?</a><br>
                    <a href="#RPPF">¿Cómo hacer un reporte de productos de inventario?</a><br>
                </div>
                <br><br>
                <p class="psm">Para acceder al departamento de recursos federales, tendremos que dirigirnos al menú de 
                opciones, y seleccionar la opción con el siguiente icono.  </p>
                <br><br>
                <img class="ism" src="img/IPF.PNG" style="width:20%;">
                <br><br>
                <p class="psm">En el departamento de proyectos federales podemos observar una tabla con todos los 
                recursos que han sido registrados en el departamento, además, se puede observar un menú de acciones en el 
                que se encuentran todas las opciones que se pueden hacer en este departamento.    </p>
                <br><br>
                <img class="ism" src="img/OPF.jpeg">
                <br><br><br><br><br>
                <h1 class="tsm" id="AGPF">Agregar recursos</h1>
                <br><br>
                <p class="psm">Para poder agregar un recurso, tendremos que dar click en el botón verde de agregar 
                recurso, este botón se encuentra en el menú de acciones de la parte izquierda de la pantalla. Esta opción 
                nos abrirá una ventana que nos permite agregar un recurso al departamento de proyectos federales. 
                Se podrán observar  los campos necesarios para poder registrar el recurso. Estos campos deben de llenarse 
                con la información correspondiente. Los campos de proveedor, folio, nombre, marca y código deben de 
                llenarse obligatoriamente. Los campos de color, material y osbervación se pueden registrar vacíos.</p>
                <br><br>
                <img class="ism" src="img/AGRPF.PNG">
                <br><br>
                <p class="psm">Una vez que hayamos llenado los campos correspondientes, solo tendremos que hacer click en 
                el botón verde de agregar producto. Si queremos cancelar la acción, solo debemos hacer click en el botón 
                rojo de cancelar. </p>
                <br><br>
                <img class="ism" src="img/BTNAGRPF.jpg" style="width:20%;">
                <br><br>
                <br><br><br><br><br>
                <h1 class="tsm" id="EDPF">Editar</h1>
                <br><br>
                <p class="psm">Para editar productos tenemos dos botones en cada uno de los productos registrados 
                en el sistema. Para editarlos, haremos click en el botón amarillo de editar, el cual nos abrira una 
                ventana que nos mostrara todos los campos de registro del producto y nos cargara todos los datos que el 
                producto tenga registrado.
                </p>
                <br><br>
                <p class="psm">Para editar, solo tendremos que cambiar la información que queramos modificar en su 
                respectivo campo. Una vez se hayan realizado todos los cambios, solo tendrá que hacer click en el 
                botón verde de actualizar. 
                </p>
                <br><br>
                <img class="ism" src="img/BTNGU.PNG" style="width:20%;">
                <br><br>
                <h1 class="tsm" id="ELPF">Eliminar</h1>
                <br><br>
                <p class="psm" id="ELUS">Para eliminar un prodcuto, solo tendremos que identificar el producto que se desea eliminar,
                 en la parte derecha aparecerán dos botones, le tendremos que dar click en el botón rojo de eliminar. 
                 Cuando le hagamos click nos aparecerá una ventana la cual requiere que se confirme que se quiere 
                 eliminar el producto. En esta  aparecerá el nombre del producto que escogimos para eliminar. 
                 Para confirmar la eliminación solo tendremos que dar click en el botón aceptar.
                </p>
                <br><br>
                <img class="ism" src="img/ELPF.PNG" style="width:50%;">
                <br><br><br><br>
                <h1 class="tsm" id="HVPF">Entrada</h1>
                <br><br>
                <p class="psm">Si se requiere realizar un vale de entrada, nos dirigiremos al botón verde de entrada del 
                menú de acciones. Al hacer click en esta opción, nos abrirá una ventana en donde podemos agregar los 
                datos del vale de entrada.</p>
                <br><br>
                <img class="ism" src="img/ENPF.PNG">
                <br><br>
                <p class="psm">Una vez que ingresemos los datos correspondientes, tendremos que marcar en las siguientes 
                casillas si el vale ya lo han autorizado o si aún está pendiente la autorización. Además se debe de 
                marcar que tipo de entrada, si es un vale de material donado, si es solo de entrada, o si es de factura.</p>
                <br><br>
                <img class="ism" src="img/TIVPF.PNG" style="width:40%;">
                <br><br>
                <p class="psm">Ya que hayamos puesto los datos del vale, el tipo y si está autorizado o no, se debe de 
                poner los productos que estarán en el vale que quiera generar. Para esto, se encuentra una casilla con 
                todos los productos que han sido registrados en el departamento, solo debe de seleccionar el producto que 
                desea ingresar al vale, además puede ingresar la cantidad solicitada, recibida o surtida del producto, además 
                de si existe una observación para el vale que quiere registrar. Se pueden agregar varios productos al vale, 
                para esto, solo debe de hacer click en el botón azul de agregar otro producto, una vez que lo oprima solo debe 
                de llenar los campos mencionados anteriormente. Cuando haya terminado de agregar los productos y quiera guardar 
                el vale, solo debe de hacer click en el botón verde de agregar entrada.</p>
                <br><br>
                <img class="ism" src="img/PVPF.PNG" style="width:90%;">
                <br><br><br><br><br>
                <h1 class="tsm" id="VVPF">Vales pendientes</h1>
                <br><br>
                <p class="psm">Cuando se requiere visualizar o editar un vale de entrada, solo tendremos que dar click en 
                el botón verde de vales pendientes del menú de acciones. Una vez que hayamos le demos click, se nos abrirá 
                una ventana el cual nos muestra todos los vales que han sido registrados en el departamento. Aparecerá el estado 
                que nos indica si el vale ya está autorizado o sigue pendiente de autorización.
                </p>
                <br><br>
                <img class="ism" src="img/OVPPF.PNG">
                <br><br>
                <p class="psm">Para poder editar el vale, o poder marcar como autorizado, se debe de dar click al 
                botón amarillo de ver completo. Una vez se haya hecho click, se abrirá una ventana en donde nos 
                mostrará todos los campos de registro del vale, estos campos estarán llenos con la información que se 
                haya registrado en el vale. Para modificar estos registros, solo tendremos que cambiar la información 
                de los campos por la nueva información que se desea guardar. 
                </p>
                <br><br>
                <img class="ism" src="img/EDVPPF.PNG">
                <br><br>
                <p class="psm">Para marcar el vale como autorizado, sólo debemos de dirigirnos a la casilla de estado, 
                en esta tenemos que cambiar el estado de pendiente a autorizado. Una vez que se hayan hecho todos los 
                cambios correspondientes, solo se deberá de hacer click en el botón de actualizar.   
                </p>
                <br><br>
                <img class="ism" src="img/CAME.PNG" style="width:40%;">
                <br><br>
                <p class="psm">Después de hacer click en el botón, nos mostrará una caja de diálogo que nos indicará 
                que el cambio se ha realizado con éxito.   
                </p>
                <br><br>
                <img class="ism" src="img/DME.PNG" style="width:60%;">
                <br><br><br><br>
                <h1 class="tsm" id="SIPF">Salida</h1>
                <br><br>
                <p class="psm">Para generar un reporte de salida de recursos del inventario, tendrá que hacer click en 
                el botón verde de salida, el cual se encuentra en el menú de acciones. Una vez que se le haya hecho 
                click, aparecerá una ventana la cual nos pedirá el nombre de quien haya solicitado la salida, además 
                de agregar el área.
                </p>
                <br><br>
                <img class="ism" src="img/SRF.PNG">
                <br><br><br>
                <p class="psm">Cuando se hayan puesto los datos solicitados, se tendrá que elegir los productos de los 
                cuales se hará la salida del inventario, para esto, en la casilla de producto aparecerán todos los 
                productos que estén registrados, solo se tendrá que seleccionar el producto  y la cantidad que saldrá, 
                en dado caso de poner una cantidad mayor de productos a los que hay en el inventario, el sistema le 
                mandará una alerta en donde le avisará que no se encuentran la cantidad de productos seleccionados. 
                Para poder agregar más productos a la salida, solo tendrá que hacer click en el botón azul de agregar 
                otro producto, esto le generará otra casilla para poder escoger otro producto, se pueden agregar los 
                productos que sean necesarios. Para poder quitar una de estas casillas de productos, sólo tendrá que 
                hacer click en la opción de quitar que está representada con una “X”, la cual se encuentra en la parte 
                superior izquierda del producto.
                </p>
                <br><br>
                <img class="ism" src="img/SAGRRF.PNG" style="width:60%;">
                <br><br>
                <p class="psm">Una vez que haya seleccionado el o los productos y su cantidad, sólo tendrá que click 
                en el botón rojo de confirmar retiro, esto eliminará la cantidad de productos seleccionados y generará 
                un reporte de salida del inventario con los datos que haya proporcionado.
                </p>
                <br><br>
                <img class="ism" src="img/SALINEPF.PNG" >
                <br><br><br><br><br>
                <h1 class="tsm" id="REPF">Existencia en el inventario</h1>
                <br><br><br>
                <p class="psm">Para poder generar un reporte de la existencia que hay en el inventario se deberá de 
                hacer click en el botón verde de existencia en el inventario, esto nos generará un reporte con todos 
                los productos que hay en el inventario.
                </p>
                <br><br>
                <img class="ism" src="img/EXINPF.PNG">
                <br><br><br><br><br>
                <h1 class="tsm" id="RPPF">Producto en el inventario</h1>
                <br><br><br>
                <p class="psm">Para poder generar un reporte de ciertos productos que hay en el inventario, se deberá 
                de hacer click en el botón verde de producto en el inventario, una vez realizado esto nos abrirá una 
                ventana en la cual tendremos que seleccionar el o los productos de los cuales queremos hacer el reporte. 
                </p>
                <br><br>
                <img class="ism" src="img/PIPF.PNG">
                <br><br><br>
                <p class="psm"> 
                Para poder agregar más productos, solo tendrá que hacer click en el botón azul de agregar 
                otro producto, esto le generará otra casilla para poder escoger otro producto, se pueden agregar los 
                productos que sean necesarios. Para poder quitar una de estas casillas de productos, sólo tendrá que 
                hacer click en la opción de quitar que está representada con una “X”, la cual se encuentra en la parte 
                superior izquierda del producto.
                </p>
                <br><br>
                <img class="ism" src="img/SAGRRF.PNG" style="width:60%;">
                <br><br>
                <p class="psm">Cuando se hayan seleccionado todos los productos del cual se quiere hacer el reporte, 
                solo se debe hacer click en el botón verde de generar reporte. Una vez realizado esto, generará un 
                reporte con todos los productos seleccionados anteriormente. 
                </p>
                <br><br>
                <img class="ism" src="img/REXINPF.PNG">
                <br><br><br>

            </div>
            

            <!---------RECURSOS--------->
            <div class="ayudas" id="cont_re">
                <h1  class="tsm">Recursos del estado</h1>
                <br><br>
                <div class="preguntas">
                    <h2>Preguntas</h2>
                    <a href="#RAGPF">¿Cómo agregar recursos?</a><br>
                    <a href="#REDPF">¿Cómo editar recursos?</a><br>
                    <a href="#RELPF">¿Cómo eliminar recursos?</a><br>
                    <a href="#RHVPF">¿Cómo hacer vales de entrada?</a><br>
                    <a href="#RVVPF">¿Cómo ver los vales de entrada?</a><br>
                    <a href="#RSIPF">¿Cómo hacer salidas del invetario?</a><br>
                    <a href="#RREPF">¿Cómo hacer un reporte de existencia de inventario?</a><br>
                    <a href="#RRPPF">¿Cómo hacer un reporte de productos de inventario?</a><br>
                </div>
                <br><br>
                <p class="psm">Para acceder al departamento de recursos del estado, tendremos que dirigirnos al menú de 
                opciones, y seleccionar la opción con el siguiente icono.  </p>
                <br><br>
                <img class="ism" src="img/IRE.PNG" style="width:20%;">
                <br><br>
                <p class="psm">En el departamento de recursos del estado podemos observar una tabla con todos los 
                recursos que han sido registrados en el departamento, además, se puede observar un menú de acciones en el 
                que se encuentran todas las opciones que se pueden hacer en este departamento.    </p>
                <br><br>
                <img class="ism" src="img/MRE.PNG">
                <br><br><br><br><br>
                <h1 class="tsm" id="RAGPF">Agregar recursos</h1>
                <br><br>
                <p class="psm">Para poder agregar un recurso, tendremos que dar click en el botón verde de agregar 
                recurso, este botón se encuentra en el menú de acciones de la parte izquierda de la pantalla. Esta opción 
                nos abrirá una ventana que nos permite agregar un recurso al departamento de recursos del estado. 
                Se podrán observar  los campos necesarios para poder registrar el recurso. Estos campos deben de llenarse 
                con la información correspondiente. Los campos de código, nombre, cantidad y unidad deben de 
                llenarse obligatoriamente. Los campos de color, marca se pueden registrar vacíos.</p>
                <br><br>
                <img class="ism" src="img/AGRE.PNG">
                <br><br>
                <p class="psm">Una vez que hayamos llenado los campos correspondientes, solo tendremos que hacer click en 
                el botón verde de agregar producto. Si queremos cancelar la acción, solo debemos hacer click en el botón 
                rojo de cancelar. </p>
                <br><br>
                <img class="ism" src="img/BTNAGRPF.jpg" style="width:20%;">
                <br><br>
                <br><br><br><br><br>
                <h1 class="tsm" id="REDPF">Editar</h1>
                <br><br>
                <p class="psm">Para editar productos tenemos dos botones en cada uno de los productos registrados 
                en el sistema. Para editarlos, haremos click en el botón amarillo de editar, el cual nos abrira una 
                ventana que nos mostrara todos los campos de registro del producto y nos cargara todos los datos que el 
                producto tenga registrado.
                </p>
                <br><br>
                <p class="psm">Para editar, solo tendremos que cambiar la información que queramos modificar en su 
                respectivo campo. Una vez se hayan realizado todos los cambios, solo tendrá que hacer click en el 
                botón verde de actualizar. 
                </p>
                <br><br>
                <img class="ism" src="img/BTNGU.PNG" style="width:20%;">
                <br><br>
                <h1 class="tsm" id="RELPF">Eliminar</h1>
                <br><br>
                <p class="psm" id="ELUS">Para eliminar un prodcuto, solo tendremos que identificar el producto que se desea eliminar,
                 en la parte derecha aparecerán dos botones, le tendremos que dar click en el botón rojo de eliminar. 
                 Cuando le hagamos click nos aparecerá una ventana la cual requiere que se confirme que se quiere 
                 eliminar el producto. En esta  aparecerá el nombre del producto que escogimos para eliminar. 
                 Para confirmar la eliminación solo tendremos que dar click en el botón aceptar.
                </p>
                <br><br>
                <img class="ism" src="img/ELPF.PNG" style="width:50%;">
                <br><br><br><br>
                <h1 class="tsm" id="RHVPF">Entrada</h1>
                <br><br>
                <p class="psm">Si se requiere realizar un vale de entrada, nos dirigiremos al botón verde de entrada del 
                menú de acciones. Al hacer click en esta opción, nos abrirá una ventana en donde podemos agregar los 
                datos del vale de entrada.</p>
                <br><br>
                <img class="ism" src="img/VPRE.PNG">
                <br><br>
                <p class="psm">Una vez que ingresemos los datos correspondientes, tendremos que marcar en las siguientes 
                casillas si el vale ya lo han autorizado o si aún está pendiente la autorización. Además se debe de 
                marcar que tipo de entrada, si es un vale de material donado, si es solo de entrada, o si es de factura.</p>
                <br><br>
                <img class="ism" src="img/TIVPF.PNG" style="width:40%;">
                <br><br>
                <p class="psm">Ya que hayamos puesto los datos del vale, el tipo y si está autorizado o no, se debe de 
                poner los productos que estarán en el vale que quiera generar. Para esto, se encuentra una casilla con 
                todos los productos que han sido registrados en el departamento, solo debe de seleccionar el producto que 
                desea ingresar al vale, además puede ingresar la cantidad solicitada, recibida o surtida del producto, además 
                de si existe una observación para el vale que quiere registrar. Se pueden agregar varios productos al vale, 
                para esto, solo debe de hacer click en el botón azul de agregar otro producto, una vez que lo oprima solo debe 
                de llenar los campos mencionados anteriormente. Cuando haya terminado de agregar los productos y quiera guardar 
                el vale, solo debe de hacer click en el botón verde de agregar entrada.</p>
                <br><br>
                <img class="ism" src="img/PVPF.PNG" style="width:90%;">
                <br><br><br><br><br>
                <h1 class="tsm" id="RVVPF">Vales pendientes</h1>
                <br><br>
                <p class="psm">Cuando se requiere visualizar o editar un vale de entrada, solo tendremos que dar click en 
                el botón verde de vales pendientes del menú de acciones. Una vez que hayamos le demos click, se nos abrirá 
                una ventana el cual nos muestra todos los vales que han sido registrados en el departamento. Aparecerá el estado 
                que nos indica si el vale ya está autorizado o sigue pendiente de autorización.
                </p>
                <br><br>
                <img class="ism" src="img/OVPPF.PNG">
                <br><br>
                <p class="psm">Para poder editar el vale, o poder marcar como autorizado, se debe de dar click al 
                botón amarillo de ver completo. Una vez se haya hecho click, se abrirá una ventana en donde nos 
                mostrará todos los campos de registro del vale, estos campos estarán llenos con la información que se 
                haya registrado en el vale. Para modificar estos registros, solo tendremos que cambiar la información 
                de los campos por la nueva información que se desea guardar. 
                </p>
                <br><br>
                <img class="ism" src="img/EDVPPF.PNG">
                <br><br>
                <p class="psm">Para marcar el vale como autorizado, sólo debemos de dirigirnos a la casilla de estado, 
                en esta tenemos que cambiar el estado de pendiente a autorizado. Una vez que se hayan hecho todos los 
                cambios correspondientes, solo se deberá de hacer click en el botón de actualizar.   
                </p>
                <br><br>
                <img class="ism" src="img/CAME.PNG" style="width:40%;">
                <br><br>
                <p class="psm">Después de hacer click en el botón, nos mostrará una caja de diálogo que nos indicará 
                que el cambio se ha realizado con éxito.   
                </p>
                <br><br>
                <img class="ism" src="img/DME.PNG" style="width:60%;">
                <br><br><br><br>
                <h1 class="tsm" id="RSIPF">Salida</h1>
                <br><br>
                <p class="psm">Para generar un reporte de salida de recursos del inventario, tendrá que hacer click en 
                el botón verde de salida, el cual se encuentra en el menú de acciones. Una vez que se le haya hecho 
                click, aparecerá una ventana la cual nos pedirá el nombre de quien haya solicitado la salida, además 
                de agregar el área.
                </p>
                <br><br>
                <img class="ism" src="img/SRF.PNG">
                <br><br><br>
                <p class="psm">Cuando se hayan puesto los datos solicitados, se tendrá que elegir los productos de los 
                cuales se hará la salida del inventario, para esto, en la casilla de producto aparecerán todos los 
                productos que estén registrados, solo se tendrá que seleccionar el producto  y la cantidad que saldrá, 
                en dado caso de poner una cantidad mayor de productos a los que hay en el inventario, el sistema le 
                mandará una alerta en donde le avisará que no se encuentran la cantidad de productos seleccionados. 
                Para poder agregar más productos a la salida, solo tendrá que hacer click en el botón azul de agregar 
                otro producto, esto le generará otra casilla para poder escoger otro producto, se pueden agregar los 
                productos que sean necesarios. Para poder quitar una de estas casillas de productos, sólo tendrá que 
                hacer click en la opción de quitar que está representada con una “X”, la cual se encuentra en la parte 
                superior izquierda del producto.
                </p>
                <br><br>
                <img class="ism" src="img/SAGRRF.PNG" style="width:60%;">
                <br><br>
                <p class="psm">Una vez que haya seleccionado el o los productos y su cantidad, sólo tendrá que click 
                en el botón rojo de confirmar retiro, esto eliminará la cantidad de productos seleccionados y generará 
                un reporte de salida del inventario con los datos que haya proporcionado.
                </p>
                <br><br>
                <img class="ism" src="img/SALINEPF.PNG" >
                <br><br><br><br><br>
                <h1 class="tsm" id="RREPF">Existencia en el inventario</h1>
                <br><br><br>
                <p class="psm">Para poder generar un reporte de la existencia que hay en el inventario se deberá de 
                hacer click en el botón verde de existencia en el inventario, esto nos generará un reporte con todos 
                los productos que hay en el inventario.
                </p>
                <br><br>
                <img class="ism" src="img/EXINPF.PNG">
                <br><br><br><br><br>
                <h1 class="tsm" id="RRPPF">Producto en el inventario</h1>
                <br><br><br>
                <p class="psm">Para poder generar un reporte de ciertos productos que hay en el inventario, se deberá 
                de hacer click en el botón verde de producto en el inventario, una vez realizado esto nos abrirá una 
                ventana en la cual tendremos que seleccionar el o los productos de los cuales queremos hacer el reporte. 
                </p>
                <br><br>
                <img class="ism" src="img/PIPF.PNG">
                <br><br><br>
                <p class="psm"> 
                Para poder agregar más productos, solo tendrá que hacer click en el botón azul de agregar 
                otro producto, esto le generará otra casilla para poder escoger otro producto, se pueden agregar los 
                productos que sean necesarios. Para poder quitar una de estas casillas de productos, sólo tendrá que 
                hacer click en la opción de quitar que está representada con una “X”, la cual se encuentra en la parte 
                superior izquierda del producto.
                </p>
                <br><br>
                <img class="ism" src="img/SAGRRF.PNG" style="width:60%;">
                <br><br>
                <p class="psm">Cuando se hayan seleccionado todos los productos del cual se quiere hacer el reporte, 
                solo se debe hacer click en el botón verde de generar reporte. Una vez realizado esto, generará un 
                reporte con todos los productos seleccionados anteriormente. 
                </p>
                <br><br>
                <img class="ism" src="img/REXINPF.PNG">
                <br><br><br>

            </div>
            

            <!-- Material de papeleria------->
            <div class="ayudas" id="cont_mp">
                <h1  class="tsm">Material de papelería</h1>
                <br><br>
                <div class="preguntas">
                    <h2>Preguntas</h2>
                    <a href="#AGPF">¿Cómo agregar recursos?</a><br>
                    <a href="#EDPF">¿Cómo editar recursos?</a><br>
                    <a href="#ELPF">¿Cómo eliminar recursos?</a><br>
                    <a href="#HVPF">¿Cómo hacer vales de entrada?</a><br>
                    <a href="#VVPF">¿Cómo ver los vales de entrada?</a><br>
                    <a href="#SIPF">¿Cómo hacer salidas del invetario?</a><br>
                    <a href="#REPF">¿Cómo hacer un reporte de existencia de inventario?</a><br>
                    <a href="#RPPF">¿Cómo hacer un reporte de productos de inventario?</a><br>
                </div>
                <br><br>
                <p class="psm">Para acceder al departamento de material de papelería, tendremos que dirigirnos al menú de 
                opciones, y seleccionar la opción con el siguiente icono.  </p>
                <br><br>
                <img class="ism" src="img/IMP.PNG" style="width:20%;">
                <br><br>
                <p class="psm">En el departamento de material de papelería podemos observar una tabla con todos los 
                recursos que han sido registrados en el departamento, además, se puede observar un menú de acciones en el 
                que se encuentran todas las opciones que se pueden hacer en este departamento.    </p>
                <br><br>
                <img class="ism" src="img/MMP.PNG">
                <br><br><br><br><br>
                <h1 class="tsm" id="AGPF">Agregar recursos</h1>
                <br><br>
                <p class="psm">Para poder agregar un recurso, tendremos que dar click en el botón verde de agregar 
                recurso, este botón se encuentra en el menú de acciones de la parte izquierda de la pantalla. Esta opción 
                nos abrirá una ventana que nos permite agregar un recurso al departamento. 
                Se podrán observar  los campos necesarios para poder registrar el recurso. Estos campos deben de llenarse 
                con la información correspondiente. Los campos de código, nombre, cantidad y unidad deben de 
                llenarse obligatoriamente. Los campos de color, marca se pueden registrar vacíos.</p>
                <br><br>
                <img class="ism" src="img/AGRE.PNG">
                <br><br>
                <p class="psm">Una vez que hayamos llenado los campos correspondientes, solo tendremos que hacer click en 
                el botón verde de agregar producto. Si queremos cancelar la acción, solo debemos hacer click en el botón 
                rojo de cancelar. </p>
                <br><br>
                <img class="ism" src="img/BTNAGRPF.jpg" style="width:20%;">
                <br><br>
                <br><br><br><br><br>
                <h1 class="tsm" id="EDPF">Editar</h1>
                <br><br>
                <p class="psm">Para editar productos tenemos dos botones en cada uno de los productos registrados 
                en el sistema. Para editarlos, haremos click en el botón amarillo de editar, el cual nos abrira una 
                ventana que nos mostrara todos los campos de registro del producto y nos cargara todos los datos que el 
                producto tenga registrado.
                </p>
                <br><br>
                <p class="psm">Para editar, solo tendremos que cambiar la información que queramos modificar en su 
                respectivo campo. Una vez se hayan realizado todos los cambios, solo tendrá que hacer click en el 
                botón verde de actualizar. 
                </p>
                <br><br>
                <img class="ism" src="img/BTNGU.PNG" style="width:20%;">
                <br><br>
                <h1 class="tsm" id="ELPF">Eliminar</h1>
                <br><br>
                <p class="psm" id="ELUS">Para eliminar un prodcuto, solo tendremos que identificar el producto que se desea eliminar,
                 en la parte derecha aparecerán dos botones, le tendremos que dar click en el botón rojo de eliminar. 
                 Cuando le hagamos click nos aparecerá una ventana la cual requiere que se confirme que se quiere 
                 eliminar el producto. En esta  aparecerá el nombre del producto que escogimos para eliminar. 
                 Para confirmar la eliminación solo tendremos que dar click en el botón aceptar.
                </p>
                <br><br>
                <img class="ism" src="img/ELPF.PNG" style="width:50%;">
                <br><br><br><br>
                <h1 class="tsm" id="HVPF">Entrada</h1>
                <br><br>
                <p class="psm">Si se requiere realizar un vale de entrada, nos dirigiremos al botón verde de entrada del 
                menú de acciones. Al hacer click en esta opción, nos abrirá una ventana en donde podemos agregar los 
                datos del vale de entrada.</p>
                <br><br>
                <img class="ism" src="img/ENPF.PNG">
                <br><br>
                <p class="psm">Una vez que ingresemos los datos correspondientes, tendremos que marcar en las siguientes 
                casillas si el vale ya lo han autorizado o si aún está pendiente la autorización. Además se debe de 
                marcar que tipo de entrada, si es un vale de material donado, si es solo de entrada, o si es de factura.</p>
                <br><br>
                <img class="ism" src="img/TIVPF.PNG" style="width:40%;">
                <br><br>
                <p class="psm">Ya que hayamos puesto los datos del vale, el tipo y si está autorizado o no, se debe de 
                poner los productos que estarán en el vale que quiera generar. Para esto, se encuentra una casilla con 
                todos los productos que han sido registrados en el departamento, solo debe de seleccionar el producto que 
                desea ingresar al vale, además puede ingresar la cantidad solicitada, recibida o surtida del producto, además 
                de si existe una observación para el vale que quiere registrar. Se pueden agregar varios productos al vale, 
                para esto, solo debe de hacer click en el botón azul de agregar otro producto, una vez que lo oprima solo debe 
                de llenar los campos mencionados anteriormente. Cuando haya terminado de agregar los productos y quiera guardar 
                el vale, solo debe de hacer click en el botón verde de agregar entrada.</p>
                <br><br>
                <img class="ism" src="img/PVPF.PNG" style="width:90%;">
                <br><br><br><br><br>
                <h1 class="tsm" id="VVPF">Vales pendientes</h1>
                <br><br>
                <p class="psm">Cuando se requiere visualizar o editar un vale de entrada, solo tendremos que dar click en 
                el botón verde de vales pendientes del menú de acciones. Una vez que hayamos le demos click, se nos abrirá 
                una ventana el cual nos muestra todos los vales que han sido registrados en el departamento. Aparecerá el estado 
                que nos indica si el vale ya está autorizado o sigue pendiente de autorización.
                </p>
                <br><br>
                <img class="ism" src="img/OVPPF.PNG">
                <br><br>
                <p class="psm">Para poder editar el vale, o poder marcar como autorizado, se debe de dar click al 
                botón amarillo de ver completo. Una vez se haya hecho click, se abrirá una ventana en donde nos 
                mostrará todos los campos de registro del vale, estos campos estarán llenos con la información que se 
                haya registrado en el vale. Para modificar estos registros, solo tendremos que cambiar la información 
                de los campos por la nueva información que se desea guardar. 
                </p>
                <br><br>
                <img class="ism" src="img/EDVPPF.PNG">
                <br><br>
                <p class="psm">Para marcar el vale como autorizado, sólo debemos de dirigirnos a la casilla de estado, 
                en esta tenemos que cambiar el estado de pendiente a autorizado. Una vez que se hayan hecho todos los 
                cambios correspondientes, solo se deberá de hacer click en el botón de actualizar.   
                </p>
                <br><br>
                <img class="ism" src="img/CAME.PNG" style="width:40%;">
                <br><br>
                <p class="psm">Después de hacer click en el botón, nos mostrará una caja de diálogo que nos indicará 
                que el cambio se ha realizado con éxito.   
                </p>
                <br><br>
                <img class="ism" src="img/DME.PNG" style="width:60%;">
                <br><br><br><br>
                <h1 class="tsm" id="SIPF">Salida</h1>
                <br><br>
                <p class="psm">Para generar un reporte de salida de recursos del inventario, tendrá que hacer click en 
                el botón verde de salida, el cual se encuentra en el menú de acciones. Una vez que se le haya hecho 
                click, aparecerá una ventana la cual nos pedirá el nombre de quien haya solicitado la salida, además 
                de agregar el área.
                </p>
                <br><br>
                <img class="ism" src="img/SRF.PNG">
                <br><br><br>
                <p class="psm">Cuando se hayan puesto los datos solicitados, se tendrá que elegir los productos de los 
                cuales se hará la salida del inventario, para esto, en la casilla de producto aparecerán todos los 
                productos que estén registrados, solo se tendrá que seleccionar el producto  y la cantidad que saldrá, 
                en dado caso de poner una cantidad mayor de productos a los que hay en el inventario, el sistema le 
                mandará una alerta en donde le avisará que no se encuentran la cantidad de productos seleccionados. 
                Para poder agregar más productos a la salida, solo tendrá que hacer click en el botón azul de agregar 
                otro producto, esto le generará otra casilla para poder escoger otro producto, se pueden agregar los 
                productos que sean necesarios. Para poder quitar una de estas casillas de productos, sólo tendrá que 
                hacer click en la opción de quitar que está representada con una “X”, la cual se encuentra en la parte 
                superior izquierda del producto.
                </p>
                <br><br>
                <img class="ism" src="img/SAGRRF.PNG" style="width:60%;">
                <br><br>
                <p class="psm">Una vez que haya seleccionado el o los productos y su cantidad, sólo tendrá que click 
                en el botón rojo de confirmar retiro, esto eliminará la cantidad de productos seleccionados y generará 
                un reporte de salida del inventario con los datos que haya proporcionado.
                </p>
                <br><br>
                <img class="ism" src="img/SALINEPF.PNG" >
                <br><br><br><br><br>
                <h1 class="tsm" id="REPF">Existencia en el inventario</h1>
                <br><br><br>
                <p class="psm">Para poder generar un reporte de la existencia que hay en el inventario se deberá de 
                hacer click en el botón verde de existencia en el inventario, esto nos generará un reporte con todos 
                los productos que hay en el inventario.
                </p>
                <br><br>
                <img class="ism" src="img/EXINPF.PNG">
                <br><br><br><br><br>
                <h1 class="tsm" id="RPPF">Producto en el inventario</h1>
                <br><br><br>
                <p class="psm">Para poder generar un reporte de ciertos productos que hay en el inventario, se deberá 
                de hacer click en el botón verde de producto en el inventario, una vez realizado esto nos abrirá una 
                ventana en la cual tendremos que seleccionar el o los productos de los cuales queremos hacer el reporte. 
                </p>
                <br><br>
                <img class="ism" src="img/PIPF.PNG">
                <br><br><br>
                <p class="psm"> 
                Para poder agregar más productos, solo tendrá que hacer click en el botón azul de agregar 
                otro producto, esto le generará otra casilla para poder escoger otro producto, se pueden agregar los 
                productos que sean necesarios. Para poder quitar una de estas casillas de productos, sólo tendrá que 
                hacer click en la opción de quitar que está representada con una “X”, la cual se encuentra en la parte 
                superior izquierda del producto.
                </p>
                <br><br>
                <img class="ism" src="img/SAGRRF.PNG" style="width:60%;">
                <br><br>
                <p class="psm">Cuando se hayan seleccionado todos los productos del cual se quiere hacer el reporte, 
                solo se debe hacer click en el botón verde de generar reporte. Una vez realizado esto, generará un 
                reporte con todos los productos seleccionados anteriormente. 
                </p>
                <br><br>
                <img class="ism" src="img/REXINPF.PNG">
                <br><br><br>

            </div>
            
            <div class="ayudas" id="cont_ml">
                <h1  class="tsm">Material de limpieza</h1>
                <br><br>
                <div class="preguntas">
                    <h2>Preguntas</h2>
                    <a href="#AGPF">¿Cómo agregar recursos?</a><br>
                    <a href="#EDPF">¿Cómo editar recursos?</a><br>
                    <a href="#ELPF">¿Cómo eliminar recursos?</a><br>
                    <a href="#SIPF">¿Cómo hacer salidas del invetario?</a><br>
                    <a href="#REPF">¿Cómo hacer un reporte de existencia de inventario?</a><br>
                    <a href="#RPPF">¿Cómo hacer un reporte de productos de inventario?</a><br>
                </div>
                <br><br>
                <p class="psm">Para acceder al departamento de material de limpieza, tendremos que dirigirnos al menú de 
                opciones, y seleccionar la opción con el siguiente icono.  </p>
                <br><br>
                <img class="ism" src="img/IML.PNG" style="width:20%;">
                <br><br>
                <p class="psm">En el departamento de material de limpieza podemos observar una tabla con todos los 
                recursos que han sido registrados en el departamento, además, se puede observar un menú de acciones en el 
                que se encuentran todas las opciones que se pueden hacer en este departamento.    </p>
                <br><br><br><br><br>
                <h1 class="tsm" id="AGPF">Agregar recursos</h1>
                <br><br>
                <p class="psm">Para poder agregar un recurso, tendremos que dar click en el botón verde de agregar 
                recurso, este botón se encuentra en el menú de acciones de la parte izquierda de la pantalla. Esta opción 
                nos abrirá una ventana que nos permite agregar un recurso al departamento. 
                Se podrán observar  los campos necesarios para poder registrar el recurso. Estos campos deben de llenarse 
                con la información correspondiente. Los campos de código, nombre, cantidad y unidad deben de 
                llenarse obligatoriamente. Los campos de color, marca se pueden registrar vacíos.</p>
                <br><br>
                <img class="ism" src="img/AGRE.PNG">
                <br><br>
                <p class="psm">Una vez que hayamos llenado los campos correspondientes, solo tendremos que hacer click en 
                el botón verde de agregar producto. Si queremos cancelar la acción, solo debemos hacer click en el botón 
                rojo de cancelar. </p>
                <br><br>
                <img class="ism" src="img/BTNAGRPF.jpg" style="width:20%;">
                <br><br>
                <br><br><br><br><br>
                <h1 class="tsm" id="EDPF">Editar</h1>
                <br><br>
                <p class="psm">Para editar productos tenemos dos botones en cada uno de los productos registrados 
                en el sistema. Para editarlos, haremos click en el botón amarillo de editar, el cual nos abrira una 
                ventana que nos mostrara todos los campos de registro del producto y nos cargara todos los datos que el 
                producto tenga registrado.
                </p>
                <br><br>
                <p class="psm">Para editar, solo tendremos que cambiar la información que queramos modificar en su 
                respectivo campo. Una vez se hayan realizado todos los cambios, solo tendrá que hacer click en el 
                botón verde de actualizar. 
                </p>
                <br><br>
                <img class="ism" src="img/BTNGU.PNG" style="width:20%;">
                <br><br>
                <h1 class="tsm" id="ELPF">Eliminar</h1>
                <br><br>
                <p class="psm" id="ELUS">Para eliminar un prodcuto, solo tendremos que identificar el producto que se desea eliminar,
                 en la parte derecha aparecerán dos botones, le tendremos que dar click en el botón rojo de eliminar. 
                 Cuando le hagamos click nos aparecerá una ventana la cual requiere que se confirme que se quiere 
                 eliminar el producto. En esta  aparecerá el nombre del producto que escogimos para eliminar. 
                 Para confirmar la eliminación solo tendremos que dar click en el botón aceptar.
                </p>
                <br><br>
                <img class="ism" src="img/ELPF.PNG" style="width:50%;">
              
                <br><br><br><br><br>
                
                <h1 class="tsm" id="SIPF">Salida</h1>
                <br><br>
                <p class="psm">Para generar un reporte de salida de recursos del inventario, tendrá que hacer click en 
                el botón verde de salida, el cual se encuentra en el menú de acciones. Una vez que se le haya hecho 
                click, aparecerá una ventana la cual nos pedirá el nombre de quien haya solicitado la salida, además 
                de agregar el área.
                </p>
                <br><br>
                <img class="ism" src="img/SRF.PNG">
                <br><br><br>
                <p class="psm">Cuando se hayan puesto los datos solicitados, se tendrá que elegir los productos de los 
                cuales se hará la salida del inventario, para esto, en la casilla de producto aparecerán todos los 
                productos que estén registrados, solo se tendrá que seleccionar el producto  y la cantidad que saldrá, 
                en dado caso de poner una cantidad mayor de productos a los que hay en el inventario, el sistema le 
                mandará una alerta en donde le avisará que no se encuentran la cantidad de productos seleccionados. 
                Para poder agregar más productos a la salida, solo tendrá que hacer click en el botón azul de agregar 
                otro producto, esto le generará otra casilla para poder escoger otro producto, se pueden agregar los 
                productos que sean necesarios. Para poder quitar una de estas casillas de productos, sólo tendrá que 
                hacer click en la opción de quitar que está representada con una “X”, la cual se encuentra en la parte 
                superior izquierda del producto.
                </p>
                <br><br>
                <img class="ism" src="img/SAGRRF.PNG" style="width:60%;">
                <br><br>
                <p class="psm">Una vez que haya seleccionado el o los productos y su cantidad, sólo tendrá que click 
                en el botón rojo de confirmar retiro, esto eliminará la cantidad de productos seleccionados y generará 
                un reporte de salida del inventario con los datos que haya proporcionado.
                </p>
                <br><br>
                <img class="ism" src="img/SALINEPF.PNG" >
                <br><br><br><br><br>
                <h1 class="tsm" id="REPF">Existencia en el inventario</h1>
                <br><br><br>
                <p class="psm">Para poder generar un reporte de la existencia que hay en el inventario se deberá de 
                hacer click en el botón verde de existencia en el inventario, esto nos generará un reporte con todos 
                los productos que hay en el inventario.
                </p>
                <br><br>
                <img class="ism" src="img/EXINPF.PNG">
                <br><br><br><br><br>
                <h1 class="tsm" id="RPPF">Producto en el inventario</h1>
                <br><br><br>
                <p class="psm">Para poder generar un reporte de ciertos productos que hay en el inventario, se deberá 
                de hacer click en el botón verde de producto en el inventario, una vez realizado esto nos abrirá una 
                ventana en la cual tendremos que seleccionar el o los productos de los cuales queremos hacer el reporte. 
                </p>
                <br><br>
                <img class="ism" src="img/PIPF.PNG">
                <br><br><br>
                <p class="psm"> 
                Para poder agregar más productos, solo tendrá que hacer click en el botón azul de agregar 
                otro producto, esto le generará otra casilla para poder escoger otro producto, se pueden agregar los 
                productos que sean necesarios. Para poder quitar una de estas casillas de productos, sólo tendrá que 
                hacer click en la opción de quitar que está representada con una “X”, la cual se encuentra en la parte 
                superior izquierda del producto.
                </p>
                <br><br>
                <img class="ism" src="img/SAGRRF.PNG" style="width:60%;">
                <br><br>
                <p class="psm">Cuando se hayan seleccionado todos los productos del cual se quiere hacer el reporte, 
                solo se debe hacer click en el botón verde de generar reporte. Una vez realizado esto, generará un 
                reporte con todos los productos seleccionados anteriormente. 
                </p>
                <br><br>
                <img class="ism" src="img/REXINPF.PNG">
                <br><br><br>
            </div>
            
            <div class="ayudas" id="cont_md">
                <h1  class="tsm">Material donado</h1>
                <br><br>
                <p class="psm">Para acceder al departamento de material de donado, tendremos que dirigirnos al menú de 
                opciones, y seleccionar la opción con el siguiente icono.  </p>
                <br><br>
                <img class="ism" src="img/IMD.PNG" style="width:20%;">
                <br><br>
                <p class="psm">En este departamento podemos ver un registro de todos los productos que han sido donados 
                en los otros departamentos. Se muestra el código del producto, la cantidad y el departamento al que 
                pertenece.</p>
                <br><br>
                <img class="ism" src="img/MMD.PNG">
            </div>
            
            <div class="ayudas" id="cont_ac">
                <h1  class="tsm">Almacén de archivos</h1>
            </div>
            
            <div class="ayudas" id="cont_ed">
                <h1  class="tsm">Editar reportes</h1>
                <br><br>
                <p class="psm">Para acceder a la opción de editar reportes, tendremos que dirigirnos al menú de 
                opciones, y seleccionar la opción con el siguiente icono.  </p>
                <br><br>
                <img class="ism" src="img/IER.PNG" style="width:20%;">
                <br><br>
                <p class="psm">El sistema cuenta con una opción para cambiar el formato de los reportes. Esta opción 
                nos permite cambiar el nombre de la persona que autoriza los reportes. También permite cambiar el nombre
                 del Vo.Bo. Esto lo cambiaremos en sus respectivos campos.</p>
                <br><br>
                <img class="ism" src="img/EDN.PNG">
                <br><br><br>
                <p class="psm">Además de los cambios anteriores, se puede cambiar el color de los reportes, para esto se 
                tendrá que oprimir el cuadro en el que se encuentra el color actual de los reportes, se abrirá un cuadro 
                el cual nos permitirá poner el código rgb del nuevo color, o lo podemos cambiar arrastrando las barras 
                que hay en el cuadro. </p>
                <br><br>
                <img class="ism" src="img/CC.PNG">
                <br><br><br>
                <p class="psm">Por último, se puede cambiar el pie de página y el encabezado, para esto solo se debe de 
                presionar el botón de seleccionar archivo, después nos abrirá el explorador de archivos, en donde 
                tendremos que buscar el nuevo encabezado o pie de página, una vez que se encuentre, solo tendremos que 
                seleccionar el archivo y se subirá. </p>
                <br><br>
                <p class="psm">Tenemos dos botones, el botón azul sirve para ver una vista previa de los cambios que 
                hemos realizado, al oprimir este botón no se guardarán los cambios. Para guardar los cambios tendremos
                que darle al botón verde de guardar. </p>
                <br><br>
                <img class="ism" src="img/BER.PNG" style="width:20%;">
            </div>

            <div class="ayudas" id="cont_enc">
                <h1  class="tsm">Menú del encabezado</h1>
                <br><br><br>
                <p class="psm">El menú del encabezado estará en todas las ventanas del sistema. Este encabezado nos 
                ayudará a dirigirnos a las diferentes ventanas del sistema de una forma rápida y sencilla.  </p>
                <br><br>
                <img class="ism" src="img/MENC.PNG">
                <br><br><br>
                <p class="psm">La opción de inicio nos ayudará a dirigirnos al menú principal, no importa en cual 
                ventana nos encontremos. 
 </p>
                <br><br>
                <img class="ism" src="img/IN.PNG" style="width:10%;">
                <br><br><br>
                <p class="psm">En la opción de departamentos encontraremos todos los departamentos con los que cuenta 
                el sistema. Para dirigirnos al departamento que queramos, solo debemos de hacer click en el nombre del
                 departamento.   </p>
                <br><br>
                <img class="ism" src="img/depa.PNG" style="width:20%;">
                <br><br><br>

                <p class="psm">Ayuda nos dirijirá a la ventana de ayuda, en donde encontraremos información de como 
                funciona el sistema.  </p>
                <br><br>
                <img class="ism" src="img/AYU.PNG" style="width:10%;">
                <br><br><br>
                <p class="psm">En esta opción podremos ver el nombre del usuario que ha iniciado seisón en el sistema,
                 en el cual podremos cerrar seisón para inicar sesión con otra cuenta. Además contamos con una opción 
                 para hacer un respaldo de la base de datos. </p>
                <br><br>
                <img class="ism" src="img/CER.PNG" style="width:20%;">
                <br><br><br>
            </div>

    
        </div>
    
    </div>
    
</body>

<footer> <?php include ('../footer/footer.blade.php');?> </footer>

</html>