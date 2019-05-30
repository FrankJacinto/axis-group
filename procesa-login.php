<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
   
	<?php
    


	include("includes/config.php");
	$estado="1";

	

	
	//nuevo codigo 

	if(isset($_POST["btn-ingresar"])){
		if ((isset($_POST["usuario"])) && (isset($_POST["clave"]))) {
			$usuario=$_POST["usuario"];
			$clave=$_POST["clave"];
          
            $campo_15="usuario, estado, tipo_usuario";
			$tabla_15 = "usuario";
			$donde_15 = "usuario='$usuario' and ";
			$donde_15.="clave='$clave'";
			$grupo_15 = "";
			$orden_15 = "";
			$array_15 = f_select($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15);
			$user=0;

			while($lista_15 = mysqli_fetch_array($array_15)){ 
				echo "$lista_15[1]";
				$user=$user+1;
	
	        }

	        if($user==1){

	        	session_start();
	        	$_SESSION["usuario"]=$usuario;
	        	header("Location: main.php");

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

</body>
</html>