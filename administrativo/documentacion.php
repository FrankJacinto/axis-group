<!DOCTYPE html>
<html>
<head>
	<title>Documentacion-Axis</title>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
	

    <link rel="stylesheet" type="text" href="../css/estilo.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
	<style type="text/css">
		.div-center{
			width: 500px;
			position: relative;

		}
		.col-centrada{
			float: none;
			margin: 0 auto;
			padding-top: 30px;
		}

	</style>
	
</head>
<body>


   <?php
   if(isset($_POST["btn_guardar"])){
      $ide=$_POST["ide"];
     $cantidadarchivos=0;
       $fallidas=0;
       $rutas[]=array();
       foreach($_FILES["image"]['tmp_name'] as $key => $tmp_name)
       {
        //Validamos que el archivo exista
        if($_FILES["image"]["name"][$key]) {
            $filename = $_FILES["image"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["image"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            $numeroorden="12345";
            $directorio = 'Archivosordenes/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
              mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$ide.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            $rutas[$cantidadarchivos]=$target_path;

             
            
            

            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) { 
                //echo "El archivo $filename se ha almacenado de forma exitosa.<br>";
              $cantidadarchivos=$cantidadarchivos+1;

            } else {    
              echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
              $fallidas=$fallidas+1;

            }
            closedir($dir); //Cerramos el directorio de destino
          }
        }
        if ($fallidas==0) {
        	

        	$campo_00 = "id='null',";
        	$campo_00.= "id_orden='$ide',";
        	$campo_00.= "rutabl='$rutas[0]',";
        	$campo_00.= "rutavgm='$rutas[1]',";
        	$campo_00.= "rutacarta_autorizacion='$rutas[2]'";

        	$tabla_00 = "archivos";
        	$guarda = f_insert($campo_00,$tabla_00);
        	 if($guarda==1 ){
        	 	$resultado="Actualizacion de documentos exitosa";
        	 }
        }
          

   }
   ?>


   <section class="principal">

      <h1 class="my-2">Ordenes aduaneras</h1>

      <div class="mb-1">
        <label for="caja_busqueda">Buscar por Nro orden / Booking</label>
        <input type="text" name="caja_busqueda" id="caja_busqueda"></input>


      </div>

      <div id="datos" class="mx-4"></div>


    </section>
   </div>



   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
   	Launch demo modal
   </button>
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   	<div class="modal-dialog" role="document">
   		<div class="modal-content">
   			<div class="modal-header">
   				<h5 class="modal-title" id="exampleModalLabel">Cargar archivos</h5>
   				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
   					<span aria-hidden="true">&times;</span>
   				</button>
   			</div>
   			<div class="modal-body">
   				<form class="was-validated" enctype='multipart/form-data' method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
   					<div class="mb-3" >
   						<p>Subir archivos</p>
   					</div>



                    <input type="text"  hidden="true" name="ide">
   					<div class="custom-file">
   						<input type="file" class="custom-file-input" id="validatedCustomFile" required id="image[]" name="image[]" multiple="">
   						<label class="custom-file-label" for="validatedCustomFile">Seleccione imagenes a subir</label>
   						<div class="invalid-feedback">Seleccione los archivos .pdf (BL, VGM, Carta de zarpe)</div>
   					</div>
   					<div class="mb-3 separacion" >
   						<button type="submit" class="btn btn-secondary btn-lg btn-block" id="btn_guardar" name="btn_guardar">Registrar</button>
   					</div>
                    <div class="modal-footer">
   				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
   				<button type="submit" class="btn btn-primary" id="btn_guardar" name="btn_guardar">Guardar</button>
   			</div>




   				</form>
   			</div>
   			
   		</div>
   	</div>
   </div>
   <?php
      if (isset($_POST["btn_guardar"])) {
      	   echo "presionaste en guardar";
      }

   ?>

   
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>