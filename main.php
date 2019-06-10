<!DOCTYPE html>
<html>
<head>
	<title>Bienvenido Axis Group</title>
	<meta charset="utf-8">
 

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>

   
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos/estilos-login.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
  
	
</head>
<body>

  

   <?php 
         include ("includes/config.php");
         include("includes/menu.php");
         

         if (!isset($_SESSION["usuario"])) {
              header("Location: index.php");

         }
         else{
            //echo "Bienvenido : ".$_SESSION["tipo_usuario"]." ". $_SESSION["usuario"];
         }

         if ($_SESSION["tipo_usuario"]==1) {
             include("admin/gestionar.php");
           # code...
         }
         if ($_SESSION["tipo_usuario"]==2) {
             include("registro-ordenes.php");
           # code...
         }
         if ($_SESSION["tipo_usuario"]==3) {
             include("jefatura/principal.php");
           # code...
         }
         if ($_SESSION["tipo_usuario"]==4) {
             include("administrativo/documentacion.php");
           # code...
         }
         if ($_SESSION["tipo_usuario"]==5) { ?>

       
           
          
         
    <div class="container col-centrada">
     
    <div class="col-lg-10 col-xm-6 col-centrada table-responsive">
      <h3>
        Listado de despachos aduaneros
        <small class="text-muted">axis-gl</small>
      </h3>
      <table class="table table-striped ">
        <thead>
          <tr>
            <th scope="col">Orden</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Booking</th>
            <th scope="col">Fecha</th>
            <th scope="col">Ver</th>
            
           
          </tr>
        </thead>
    
        <?php 
        $ruc= $_SESSION["usuario"];
       

        $campo_15="orden, descripcion, booking, fecha";
        $tabla_15 = "ordenes";
        $donde_15 = "RUC='$ruc'";
        $grupo_15 = "";
        $orden_15 = "";

         
        if (isset($_GET["pagina"])) {
        
         
           $pagina=$_GET["pagina"];
         
       }
       else{
         $pagina=1;
       }

         //$pagina=1;
         $tamanio_pagina=2;
         $empezar_desde=($pagina-1)*$tamanio_pagina;

         //ver cuantas ordenes tiene el cliente
         $arraytotal=f_select($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15);
         $numero_filas = mysqli_num_rows($arraytotal);
         $array_15 = paginacion($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15,$empezar_desde,$tamanio_pagina);

         $numero_paginas=ceil($numero_filas/$tamanio_pagina);
          //echo "$numero_filas    $numero_paginas";
        ?>
        <tbody>
                   
        <?php while($lista_15 = mysqli_fetch_array($array_15)){ ?>
               <tr>
                  <td><?=$lista_15[0]?></th>
                  <td><?=$lista_15[1]?></th>
                  <td><?=$lista_15[2]?></th>
                  <td><?=$lista_15[3]?></th>

                  <td>
                    <a href="" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true">Imagenes</span></a>
                    <a href="" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombres'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true">Archivos</span></a>
                  </td>
               </tr>
            <?php } ?>
          
        </tbody>
      </table>
      <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>

    <?php
    for ($i=1; $i <=$numero_paginas ; $i++) { 
      ?>
      <li class="page-item"><a class="page-link" href="?pagina=<?=$i?>"><?=$i?></a></li>
    <?php }

    ?>
  
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
   <?php } ?>
    </div>
  </div>
  
</body>
</html>