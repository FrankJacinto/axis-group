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
      <li class="nav-item active">
        <a class="nav-link" href="main.php">Registro de Ordenes <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" >
        <a class="nav-link" href="listado.php">Consultas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cerrar-sesion.php">Cerrar Sesion</a>
      </li>
      
 
    </ul>
    <form class="form-inline my-2 my-lg-0" action="consultar-orden.php" method="post">
      <input class="form-control mr-sm-2" type="text" placeholder="buscar por orden" aria-label="Search" id="num_orden" name="num_orden" required>
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Filtrar</button>
    </form>
  </div>
</nav>

</body>
</html>