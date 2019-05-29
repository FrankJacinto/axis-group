<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<?php
    //Recibimos los datos de la imagen
	/*$nombre_imagen=$_FILES["image"]["name"];
	$tipo_imagen=$_FILES["image"]["type"];
	$tamaño_imagen=$_FILES["image"]["size"];
	echo("El tamaño en bytes  $tamaño_imagen");
	echo "$tipo_imagen";
	if ($tamaño_imagen<1000000) {
		if ($tipo_imagen=="image/jpeg" or $tipo_imagen=="image/png" or $tipo_imagen=="image/gif" ) {
  		# code...



			$carpeta_destino=$_SERVER["DOCUMENT_ROOT"].'/server_imagenes/';
			move_uploaded_file($_FILES["image"]["tmp_name"],$carpeta_destino.$nombre_imagen);
		}
//establecer tamaño como tipo
		else{
			echo "Solo se pueden subir imagenes";
		}
	}

else{
	echo "El tamaño es demasiado grande";
}

$server="localhost";
$db="axis";
$user="root";
$pass="";

$con=mysqli_connect($server,$user,$pass);
if (mysqli_connect_errno()) {
	echo "Error al conectar con la base de datos";
	exit();
}
mysqli_select_db($con,$db);
mysqli_set_charset($con,"utf8");
$id=$_POST["orden"];
$s="INSERT INTO imagen values ('$id','$nombre_imagen')";
$r=mysqli_query($con,$s);
//mysqli_close($con);
*/


?>

<?php 
//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["image"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["image"]["name"][$key]) {
			$filename = $_FILES["image"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["image"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			$numeroorden="12345";
			$directorio = 'ImagenesOrdenes/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$numeroorden.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
				} else {	
				echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
		}
	}
?>

?>
</body>
</html>