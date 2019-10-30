<!DOCTYPE html>
<html>
<head>
	<title>Menu Axis</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
  
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">AXIS GROUP</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     <?php
     
     session_start();

     if ($_SESSION["tipo_usuario"]==2) { ?>
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Registro de Ordenes <span class="sr-only">(current)</span></a>
      </li>
     <?php  }       ?>

     <?php if ($_SESSION["tipo_usuario"]==1) { ?>
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Administrar <span class="sr-only">(current)</span></a>
      </li>
     <?php  }       ?>

      <?php if ($_SESSION["tipo_usuario"]==4) { ?>
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Documentacion <span class="sr-only">(current)</span></a>
      </li>
     <?php  }       ?>

     <?php if ($_SESSION["tipo_usuario"]==5){  ?>
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Seguimiento<span class="sr-only">(current)</span></a>

      </li>
      <li class="nav-item" >
        <a class="nav-link" href="reserva.php">Reservas<span class="sr-only">(current)</span></a>
      </li>
     <?php  }       ?>

      <?php if ($_SESSION["tipo_usuario"]==3) { ?>
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Consultas<span class="sr-only">(current)</span></a>
      </li>
     <?php  }       ?>

      <li class="nav-item">
        <a class="nav-link" href="cerrar-sesion.php">Cerrar Sesion</a>
      </li>

      
      
    </ul>
    <a class="navbar-brand" href="#"> <?php  if ($_SESSION["tipo_usuario"]!=5){
       echo "Bienvenido: ".$_SESSION["usuario"]; 
       }
       else{
           $ruc= $_SESSION["usuario"];
           $campo_15="razon_social";
           $tabla_15 = "cliente";
           $ruc=$_SESSION["usuario"];
           $donde_15 = "RUC='$ruc'";
           $grupo_15 = "";
           $orden_15 = "";

           $array_15 = f_select($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15);


           while($lista_15 = mysqli_fetch_array($array_15)){ 
             echo " Bienvenido Sres. ".$lista_15[0];
             
          }

        
      }
        ?>
    </a>
   
  </div>
</nav>

</body>
</html>