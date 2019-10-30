<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Axis Group | www.axisgroup.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="shortcut icon" href="img/favicon.ico">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    
    <div class="wrapper">

      
      <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>A</b>G</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>SIS-AXIS</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <small class="bg-red">Online</small>
                  <span class="hidden-xs">
                    <?php
                    include("../includes/config.php");

        

                    session_start();
                    if (isset($_SESSION["usuario"])) {

                      $campo_15="razon_social";
                      $tabla_15 = "cliente";
                      $ruc=$_SESSION["usuario"];
                      $donde_15 = "RUC='$ruc'";
                      $grupo_15 = ""; 
                      $orden_15 = "";

                      $array_15 = f_select($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15);


                      while($lista_15 = mysqli_fetch_array($array_15)){ 
                     echo " Bienvenido Sres. ".$lista_15[0];
            //echo "soli";

                      }

                    }
                    else{
                      header("Location: index.html");
                    } 
                    ?>
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                      Axis Group - trabajando  en logistica aduanera para tì
                      <small>www.axis-group.com</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a class="nav-link" href="cerrar-sesion.php">Cerrar Sesion</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-laptop"></i>
                <span>Reservas</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="../main.php"><i class="fa fa-circle-o"></i> Reservar</a></li>
                <li><a href=#><i class="fa fa-circle-o"></i> Incidencias</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-th"></i>
                <span>Documentario</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="despachos.php"><i class="fa fa-circle-o"></i> Evidencias</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i> Documentos</a></li>
              </ul>
            </li>
            
                       
            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Acceso</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="configuracion/usuario"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                
              </ul>
            </li>
             <li>
              <a href="#">
                <i class="fa fa-plus-square"></i> <span>Ayuda</span>
                <small class="label pull-right bg-red">PDF</small>
              </a>
            </li>
            <li>
              <a href="#">
                <i class="fa fa-info-circle"></i> <span>Acerca De...</span>
                <small class="label pull-right bg-yellow">IT</small>
              </a>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      
      <!--Fin-Contenido-->
     

      
   <script src="js/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="js/app.min.js"></script>
    
  </body>
</html>
