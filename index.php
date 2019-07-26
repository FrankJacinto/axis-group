<!DOCTYPE html>
<html>
<head>
	<title>Inicio Axis</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>
    
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/estilos/estilos-axis.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	
</head>
<body>

	<?php
    
	include("includes/config.php");
	
	

	//nuevo codigo 
    $error="";
	if(isset($_POST["btn-ingresar"])){

		if ((isset($_POST["usuario"])) && (isset($_POST["clave"]))) {
			//$usuario=$_POST["usuario"];
			//$clave=$_POST["clave"];

			$usuario=mysqli_real_escape_string(conexion(),$_POST["usuario"]);
			$clave=mysqli_real_escape_string(conexion(),$_POST["clave"]);
			close();
          
            $campo_15="usuario, estado, tipo_usuario";
			$tabla_15 = "usuario";
			$donde_15 = "usuario='$usuario' and ";
			$donde_15.="clave='$clave'";
			$grupo_15 = "";
			$orden_15 = "";
			$array_15 = f_select($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15);
			$user=0;

			while($lista_15 = mysqli_fetch_array($array_15)){ 
				$estado=$lista_15[1];
				$tipo_usuario=$lista_15[2];
				
				$user=$user+1;
	
	        }

	        if($user==1){

	        	if ($estado=="1") {
	        		session_start();
	        		$_SESSION["usuario"]=$usuario;
	        		$_SESSION["tipo_usuario"]=$tipo_usuario;
	        		header("Location: main.php");

	        	}
	        	else{
	        		$error="Cuenta desabilitada, contactarse con la empresa";

	        	}

	        	

	        }
	        else{
           
	        	header("Location: index.php?id=0");


	        }
            

		}
		else{
			header ("Location: index.php");
		}
	}
         
 ?>

 <?php
   $id;
   if ((isset($_GET["id"]))&& ($_GET["id"]==0)) {
   	$error="Usuario y/o contraseña incorrecta";

   	
  } 	
   else{

   }
?>

<div class="container py-4 ">
	<div class="row" > 

	<div  class="col col-lg-5 col-md-12 col-sm-12 div-center" >

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" name="form-login" align="center" class="formulario">
		<div align="center">
		 <img src="http://www.axis-gl.com/images/logo-mail.png" alt="..." class="img-thumbnail">
		</div>
		
    	<div class=" py-3">
    		<h4 class="modal-title">Bienvenido Axis Group</h4>
    	</div>
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
        <input type="submit" class="btn btn-success btn-block btn-lg" value="Login" id="btn-ingresar" name="btn-ingresar">

                     
    </form>	
    <?php
    if ($error!="") {?>
    	<div class='alert alert-danger' role='alert'> 
    	<button class='close' data-dismiss='alert'><span>&times;</span> </button>
    	<?=$error?> 
    	</div>
    <?php }?> 		
    <!--div class="text-center small">Don't have an account? <a href="#">Sign up</a></div-->    
</div>
</div>
</div>   

<script >
  $( "#btn-ingresar" ).click(function() {
  	alert "hola";
   $.post('cliente/seguimiento.php', {
            ID : $("input[name='usuario']").val()
            

            
        }, function(data){
            $('#Oculto').html(data);
        });
});
</script>

</body>
</html>