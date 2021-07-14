  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link rel="icon" href="https://www.tamaulipas.gob.mx/wp-content/uploads/2016/10/cropped-logotam-1-32x32.png" sizes="32x32">
  <title>Document</title>
  <link rel="stylesheet" href="/icoepris/header/style.css">
  <link rel="stylesheet" href="/icoepris/css/style.css">
  <link rel="stylesheet" href="/icoepris/footer/style.css">
</head>

<header>
 
  <div class="contenedor_header">
        
    <div class="contenedor_img_header">
      <div>
        <!--
         Fecha del Dia
        <?php 
          date_default_timezone_set('America/Monterrey');
          $dianum=date("d",time());
          $sem=date("N",time());
          settype($sem,"int");
          $mes=date("m",time());
          settype($mes,"int");
          $year= date("Y",time());
          $semana=["Lunes","Martes","Miércoles","Jueves","Viernes","Sabado","Domingo"];
          $meses=["Enero","Febrero","Marzo","Abril","Mayo","Junio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
          
          echo $semana[$sem-1]." ".$dianum." de ".$meses[$mes-1]." del ".$year;
          ?>
          Fecha del Dia-->
    </div>
     <div class="contenedor_menu">
       <nav class="menu_header">
        <ul>
          
          <?php 
            if($_SESSION['tipo']=='admin' || $_SESSION['tipo']=='root'){
              echo '<li><a href="../menu/">Inicio</a></li>';
             }
            if($_SESSION['tipo']!='admin' && $_SESSION['tipo']!='root'){
              echo '<li><a href="#">Inicio</a></li>';
            }
          ?>
          <?php 
          if($_SESSION['tipo']=='admin' || $_SESSION['tipo']=='root'){
            echo '<li class="submenu"><a href="#">Departamentos <i class="fa fa-caret-down"></i></a>';
            echo '<ul>';
            echo '<li><a href="../federal/">PROYECTOS FEDERALES</a></li>';
            echo '<li><a href="../estatal/">RECURSOS DEL ESTADO</a></li>';
            echo '<li><a href="../papeleria/">MATERIAL DE PAPELERIA</a></li>';
            echo '<li><a href="../limpieza/">MATERIAL DE LIMPIEZA</a></li>';
            echo '<li><a href="../donado/">MATERIAL DONADO</a></li>';
            echo '<li><a href="../archivo/">ALMACÉN DE ARCHIVOS</a></li>';
          
            echo '</ul>';
            echo '</li>';
          }
      
          if($_SESSION['tipo']!='admin' && $_SESSION['tipo']!='root'){
           echo '<li><a href="#">'.$_SESSION['tipo'].'</a></li>'; 
          }
    
        ?>
      
          <li><a href="../Ayuda/">Ayuda</a></li>
          <li class="submenu"><a href="#"><?php echo $_SESSION['usuario'].' ';?><i class="fa fa-caret-down" ></i></a>
            <ul>
              <li><a href="../login/cerrar_sesion.php">CERRAR SESIÓN</a></li>
            </ul>
          </li>

        </ul>
      </nav>
    </div> 
    </div>
       
  </div>

<script>
  $(".submenu").click(function(){
  $(this).children("ul").slideToggle();
})

$("ul").click(function(ev){
  ev.stopPropagation();
})
</script>
