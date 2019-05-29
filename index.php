<!DOCTYPE html>
<html>
<head>
	<title>Inicio Axis</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/estilos/estilos-login.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos/estilos-login.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
</head>
<body>
	<div class="login-form">    
    <form action="procesa-login.php" method="post" name="form-login">
		<div align="center"><img src="http://www.axis-gl.com/images/logo-mail.png" alt="..." class="img-thumbnail"></div>
		<br>
    	<h4 class="modal-title">Bienvenido Axis Group</h4>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" required="required" id="usuario" name="usuario">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" id="clave" name="clave">
        </div>
        <div class="form-group small clearfix">
            <label class="checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="forgot-link">Forgot Password?</a>
        </div> 
        <input type="submit" class="btn btn-primary btn-block btn-lg" value="Login" id="btn-ingresar" name="btn-ingresar">              
    </form>			
    <div class="text-center small">Don't have an account? <a href="#">Sign up</a></div>
</div>


</body>
</html>