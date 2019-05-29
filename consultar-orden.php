<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos/estilos-login.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

	<?php include ("includes/config.php");

	$num_orden=$_POST["num_orden"];



	$campo_15="e.nombre, o.descripcion, o.fecha, o.imagen";
	$tabla_15 = "ordenes";
	$donde_15 = "orden = '$num_orden'";
	$grupo_15 = "";
	$orden_15 = "";
	$array_15 = f_select($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15);

	$lista_15 = mysqli_fetch_array($array_15);

// La imagen
	$imagen = $lista_15[0];

// Gracias a esta cabecera, podemos ver la imagen 
// que acabamos de recuperar del campo blob
	header("Content-Type: image/jpg");
// Muestra la imagen
	echo $imagen;   
	?>

	<div class="card text-center">
		<div class="card-header">
			Featured
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
</body>
</html>