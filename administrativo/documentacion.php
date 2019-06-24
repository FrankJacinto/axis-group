<!DOCTYPE html>
<html>
<head>
	<title>Documentacion-Axis</title>
	<meta charset="utf-8">

	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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
   	$book=$_POST["book"];
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
            $directorio = 'Archivosordenes/'.$book; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
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
        	
        	//cambiar estado a orden 
            
        	$verificar_archivos=mysqli_query(conexion(),"SELECT * FROM archivos where id_orden='$ide'");

        	if(mysqli_num_rows($verificar_archivos)==0){
        		
        	
        	
            $campos="estado='Regularizado'";
            $table="ordenes";
            $where="id='$ide'";
            $resp=f_update($campos,$table,$where);
          


        	$campo_00 = "id='null',";
        	
        	for ($i=0; $i <$cantidadarchivos ; $i++) { 
        	 $campo_00.= "ruta".($i+1)."='$rutas[$i]',";
        	 //echo "ruta".($i+1)."='$rutas[$i]',";
        	}
        	$campo_00.= "id_orden='$ide'";


        	$tabla_00 = "archivos";
        	$guarda = f_insert($campo_00,$tabla_00);
        	if($guarda==1 && $resp==1 ){
        		$resultado="Actualizacion de documentos exitosa";
        	}
        } else{
              $resultado="Ya se agrego archivos al numero de orden";

        }
    }

   }
   ?>


<?php
   if(isset($_POST["btn_cargar"])){
   	$ide=$_POST["ide"];
   	$book=$_POST["book"];
   	$documento=$_POST["documento"];
   	$cantidadarchivos=0;
       $fallidas=0;
       $rutas[]=array();
       foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
       {
        //Validamos que el archivo exista
        if($_FILES["archivo"]["name"][$key]) {
            $filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            $directorio = 'Archivosordenes/'.$book; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
              mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$documento.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
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
        
   }
   ?>

   <section class="principal">
    
      

      <div class="mx-5 my-2">
        <label for="caja_busqueda">Buscar por Nro orden / Booking</label>
        <input type="text" name="caja_busqueda" id="caja_busqueda"></input>


      </div>
      <?php
      $resultado="";
      if (isset($_POST["btn_guardar"])) {

      	if ($resultado!="") {?>
      		<div class="container-fluid">
      			<div class='alert alert-danger ' role='alert'> 
      				<button class='close' data-dismiss='alert'><span>&times;</span> </button>
      				<?=$resultado?> 
      			</div>
      		</div>
      	<?php }}?> 

      <div id="datos" ></div>


    </section>
   </div>

   


   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   	<div class="modal-dialog" role="document">
   		<div class="modal-content">
   			<div class="modal-header">
   				<h5 class="modal-title" id="exampleModalLabel">Subir archivos .pdf</h5>
   				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
   					<span aria-hidden="true">&times;</span>
   				</button>
   			</div>
             <!--Subir archivos individualmente-->
             <div class="modal-body">
             	<ul class="nav nav-tabs" id="myTab" role="tablist">
             		<li class="nav-item">
             			<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Ajuntar</a>
             		</li>
             		<li class="nav-item">
             			<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Acciones</a>
             		</li>
             		
             	</ul>
             	<div class="tab-content" id="myTabContent">
             		<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
             			<div class="mb-3" id="contenido" name="contenido">

             			</div>

               <form class="was-validated" method="post" action="">


               	<input type="text" hidden=""  name="ide" ide="ide">

               	<input type="text" hidden="" name="book" id="book" />

               	<div class="form-group">
               		<select class="custom-select" required id="documento" name="documento">
               			<option value ="" >Seleccionar documento </option>
               			<option value="DAM-40">DAM 40</option>
               			<option value="DAM-41">DAM 41</option>
               			<option value="BL-MASTER">BL Master</option>
               			<option value="FACTURA-COMERCIAL">Factura comercial</option>
               			<option value="CARTA-DE-TEMPERATURA">Carta de temperatura</option>
               			<option value="HOJA-DE-RUTA">Hoja de ruta</option>
               			<option value="INSPECCION-SENASA">Inspeccion SENASA</option>
               		</select>
               		<div class="invalid-feedback">Example invalid custom select feedback</div>
               	</div>

               	<div class="custom-file">
               		<input type="file" class="custom-file-input"  required id="campoFichero" name="campoFichero" accept="application/pdf">
               		<label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
               		<div class="invalid-feedback">Example invalid custom file feedback</div>
               	</div>
               
               	<div class="modal-footer">
               		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               		<button type="submit" class="btn btn-primary" id="btn_cargar">Subir archivo</button>
               	</div>
               </form>

             		</div>

             		<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
             			<form class="was-validated" method="post" action="administrativo/mirar_pdf.php">

                           <input type="text"  name="book" id="book" hidden="" />

             				<div class="form-group">
             					<select class="custom-select" required id="documento" name="documento">
             						<option value ="" >Seleccionar documento </option>
             						<option value="DAM-40">DAM 40</option>
             						<option value="DAM-41">DAM 41</option>
             						<option value="BL-MASTER">BL Master</option>
             						<option value="FACTURA-COMERCIAL">Factura comercial</option>
             						<option value="CARTA-DE-TEMPERATURA">Carta de temperatura</option>
             						<option value="HOJA-DE-RUTA">Hoja de ruta</option>
             						<option value="INSPECCION-SENASA">Inspeccion SENASA</option>
             					</select>
             					<div class="invalid-feedback">Example invalid custom select feedback</div>
             				</div>

             				
             				<div class="modal-footer">
             					
             					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             					<button type=" submit" class="btn btn-primary"> ver </button>
             				
             				</div>
             			</form>
             		</div>
             	
             	</div>   	

             </div>

             


          
   			<!-- <div class="modal-body">
   				<form class="was-validated" enctype='multipart/form-data' method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
   					<div class="mb-3" >
   						<p>Subir archivos</p>
   					</div>


                    <input type="text"  hidden="" name="ide">
                    <input type="text" hidden=""  name="book">
   					<div class="custom-file">
   						<input type="file" class="custom-file-input" id="validatedCustomFile" required id="image[]" name="image[]" multiple="">
   						<label class="custom-file-label" for="validatedCustomFile">Seleccione imagenes a subir</label>
   						<div class="invalid-feedback">Seleccione los archivos .pdf (BL, VGM, Carta de zarpe)</div>
   					</div>
   					
   					<div class="modal-footer">
   						<button type="button" class="btn btn-secondary" >Cancelar</button>
   						<button type="submit" class="btn btn-primary" onclick="abrirmodal();" id="btn_guardar" name="btn_guardar">Guardar</button>
   					</div>
   					
   				</form>
   			</div> -->
   			
   		</div>
   	</div>
   </div>


   <!--Modal editar archivos-->

   <div class="modal fade" id="modal_listararchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   	<div class="modal-dialog" role="document">
   		<div class="modal-content">
   			<div class="modal-header">
   				<h5 class="modal-title" id="exampleModalLabel">Ver /editar documentos</h5>
   				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
   					<span aria-hidden="true">&times;</span>
   				</button>
   			</div>
             <!--Subir archivos individualmente-->


              <div class="modal-body">




              	<input type="text" hidden=""  name="ide" ide="ide">

               	<input type="text" hidden="" name="book" id="book" />
               	
               	<ul class="list-group">

              		<!--Recuperar archivos del directorio-->
              		<?php
                               //Recuperar archivos de un directorio
                    $book="B6JBK029541";
              		$directory="Archivosordenes/".$book;
              		$dirint = dir($directory);
              		$cont=0;
                    

              		while (($archivo = $dirint->read()) !== false)
              		{
              			if (strpos($archivo, 'pdf')){?>

              				<li class="list-group-item d-flex justify-content-between align-items-center">
              					<?=$archivo?>
              					<a href="ver_pdf.php?book=<?=$book?>&archivo=<?=$archivo?>">ver
              						<span class="glyphicon glyphicon-download-alt"></span>
              					</a>

              				</li>

              			<?php }

              		}
              		$dirint->close();
              		?>
              	</ul>


               
              </div>	


   		</div>
   	</div>
   </div>

<div id="Oculto" name="Oculto" hidden=""></div>
   <script >

   	$( "#btn_cargarr" ).click(function() {
   			
   		$.post('administrativo/guardar_archivo.php', {
   			ID : $("input[name='ide']").val(),
   			BOOK : $("input[name='book']").val(),
   			DOCUMENTO : $("select[name='documento'] option:selected").val()


   			
   		}, function(data){
   			$('#Oculto').html(data);
   		});
   	});
   </script>
  

   <script >

   	$( "#btn_enlace" ).click(function() {

   		
   	});
   </script>



   <script language='javascript'>
			$(function(){
				$('#btn_cargar').on('click', function (e){
					
					e.preventDefault(); // Evitamos que salte el enlace.
					/* Creamos un nuevo objeto FormData. Este sustituye al 
					atributo enctype = "multipart/form-data" que, tradicionalmente, se 
					incluía en los formularios (y que aún se incluye, cuando son enviados 
					desde HTML. */
					var paqueteDeDatos = new FormData();
					/* Todos los campos deben ser añadidos al objeto FormData. Para ello 
					usamos el método append. Los argumentos son el nombre con el que se mandará el 
					dato al script que lo reciba, y el valor del dato.
					Presta especial atención a la forma en que agregamos el contenido 
					del campo de fichero, con el nombre 'archivo'. */
					paqueteDeDatos.append('archivo', $('#campoFichero')[0].files[0]);
					paqueteDeDatos.append('ide', $('#ident').prop('value'));
					paqueteDeDatos.append('book', $('#book').prop('value'));
					paqueteDeDatos.append('documento', $('#documento').prop('value'));
					//paqueteDeDatos.append('correo', $('#campoCorreo').prop('value'));
					var destino = "administrativo/guardar_archivo.php"; // El script que va a recibir los campos de formulario.
					/* Se envia el paquete de datos por ajax. */
					$.ajax({
						url: destino,
						type: 'POST', // Siempre que se envíen ficheros, por POST, no por GET.
						contentType: false,
						data: paqueteDeDatos, // Al atributo data se le asigna el objeto FormData.
						processData: false,
						cache: false, 
						success: function(resultado){ // En caso de que todo salga bien.
							console.log(resultado);
						},
						error: function (){ // Si hay algún error.
							alert("Algo ha fallado.");
						}
					}).done(function(res){
						$("#Oculto").html(res);
					});

				});
			});
		</script>


   



   
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>