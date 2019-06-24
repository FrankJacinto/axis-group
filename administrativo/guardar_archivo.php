<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
   
   
   <?php
    $documento=$_POST["documento"];
    $booking = $_POST["book"];
    $ide = $_POST["ide"];
    $respuesta="NASA";
    
    if ($documento) {
    	

    	$nombre_imagen=$_FILES["archivo"]["name"];
    	$tipo_imagen=$_FILES["archivo"]["type"];
    	$tamaño_imagen=$_FILES["archivo"]["size"];

	

if ($tamaño_imagen<1000000) {
		if ($tipo_imagen=="application/pdf" ) {
  		# code...

			if($_FILES["archivo"]["name"]) {
            $filename = $_FILES["archivo"]["name"]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo"]["tmp_name"];
            //$source=$documento; //Obtenemos un nombre temporal del archivo
            $directorio = './../Archivosordenes/'.$booking; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
            	mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$documento.'.pdf';
            //Indicamos la ruta de destino, así como el nombre del archivo
            
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if (!file_exists($target_path)) {

            	if(move_uploaded_file($source, $target_path)) { 
                //echo "El archivo $filename se ha almacenado de forma exitosa.<br>";
               // rename($target_path, $documento);

            		$respuesta="Se ha enviado el archivo ".$documento;

            	} else {    
            		$respuesta="Intentelo nuevamente";


            	}

            }
            else{
            	$respuesta="Ya existe el archivo $documento en el servidor";
            }

            closedir($dir); //Cerramos el directorio de destino
        }



    }
//establecer tamaño como tipo
		else{
			$respuesta= "Solo puede subir archivos .pdf";
		}
	}

	else{
		$respuesta= "El tamaño del archivo es demasiado grande";
	}
}
else{
	$respuesta="Debe seleccionar el tipo de doc";
}
    
    ?>
    <script >
    	$("#contenido").html("<?php echo($respuesta); ?>");
    	$("select[name='documento']").val(''); 
    	$("input[name='campoFichero']").val(''); 
    </script>





   
    

  
</body>
</html>