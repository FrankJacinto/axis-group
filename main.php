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
  // session_start();
   //if(!$_SESION["ide"]){
   //header("Location: index.php");
   
   
   // }?>

   <?php include("includes/menu.php");
         include ("includes/config.php");
         session_start();
         if (!isset($_SESSION["usuario"])) {
              header("Location: index.php");

         }
         else{
            echo "Usuario: ". $_SESSION["usuario"];
         }
    ?>
    <?php
    $campo_15="id,";
    $campo_15.="nombre";
    $tabla_15 = "evento";
    $donde_15 = "";
    $grupo_15 = "";
    $orden_15 = "";
    $array_15 = f_select($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15);
    ?>
   
   <div class="login-form">
   	<form class="was-validated" enctype='multipart/form-data' method="POST" action="procesa_orden.php">
         <div class="mb-3">
              <p>Registro de ordenes</p>
         </div>
      
         <div class="mb-3">
           <div class="form-check form-check-inline">
              <label><input class="form-check-input" type="radio" name="db" id="dbglobal" value="global" checked="">Global</label>
           </div>

           <div class="form-check form-check-inline">
              <label><input class="form-check-input" type="radio" name="db" id="dbgl" value="gl" >GL</label>
           </div>

        </div>
   		<div class="mb-3">
   			<input class="form-control is-invalid" id="validationTextarea" placeholder="Ingrese un numero de orden" required id="orden" name="orden" >
   			<div class="invalid-feedback">
   				Registrar un numero de orden
   			</div>

   		</div>
         <div class="mb-3">
            <input class="form-control is-invalid" id="validationTextarea" placeholder="Autocompletar Booking" required id="booking" name="booking">
            <div class="invalid-feedback">
               Registrar un numero de orden
            </div>

         </div>
         <div class="mb-3">
            <input class="form-control is-invalid" id="validationTextarea" placeholder="Cliente o Razon social" required id="cliente" name="cliente">
            <div class="invalid-feedback">
               Registrar un numero de orden
            </div>

         </div>
       
   		<div class="form-group">
   			<select class="custom-select" required id="tipo" name="tipo">
   				<option value="">Seleccione</option>
               <?php while($lista_15 = mysqli_fetch_array($array_15)){ ?>
   				<option value="<?=$lista_15[0]?>"><?=$lista_15[1]?></option>
               <?php } ?>
   			</select>
   			<div class="invalid-feedback">Selleccione un item</div>
   		</div>

   		<div class="mb-3">
   			<label for="validationTextarea">Descripcion</label>
   			<textarea class="form-control is-invalid" id="validationTextarea" placeholder="Descripcion del evento" required id="descripcion" name="descripcion"></textarea>
   			<div class="invalid-feedback">
   				Escriba una breve descripcion porfavor.
   			</div>
   		</div>

   		<div class="custom-file">
   			<input type="file" class="custom-file-input" id="validatedCustomFile" required id="image[]" name="image[]" multiple="">
   			<label class="custom-file-label" for="validatedCustomFile">Seleccione imagenes a subir</label>
   			<div class="invalid-feedback">Numero de imagnes (1-15)</div>
   		</div>

   		<div class="mb-3 separacion" >
            <button type="submit" class="btn btn-secondary btn-lg btn-block" id="enviar" name="enviar">Registrar</button>
   		</div>
      
   		
   </div>

 <!----  codigo para mostrar imagenes de modal de una orden-->  
<!-- Large modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="card text-center">
      <div class="card-header">
         Consulta de ordenes
      </div>
      <div class="card-body">
         <h5 class="card-title">Special title treatment</h5>
         <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
         <div class="container-fluid">


            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
               </ol>
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <img src="imagenes/uno.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                     <img src="imagenes/dos.png" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                     <img src="imagenes/tres.png" class="d-block w-100" alt="...">
                  </div>
               </div>
               <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
               </a>
               <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
               </a>
            </div>

         </div>
         <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
      <div class="card-footer text-muted">
         2 days ago
      </div>
   </div>
</div>
</div>
</div>



<div id="Oculto"></div>

<script>
$("input[name='orden']").keypress(function(e) {
    if(e.which == 13) {
        $.post('validar-orden.php', {
            ID : $("input[name='orden']").val(),
            DB : $("input[name='db']:checked").val()
            
        }, function(data){
            $('#Oculto').html(data);
        });
    }
});


</script>

  
</body>
</html>




