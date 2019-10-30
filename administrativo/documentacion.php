<!DOCTYPE html>
<html>
<head>
	<title>Documentacion-Axis</title>
	<meta charset="utf-8">

	
  
	

    <link rel="stylesheet" type="text" href="../css/estilo.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

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
            $directorio = 'cliente/Archivosordenes/'.$book; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
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
            $directorio = 'cliente/Archivosordenes/'.$book; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
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

    <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Axis Group</h3>
                  
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                              <!--Contenido-->
                              
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

                             
                      </div>
                      </div>
                        
                      </div>
                    </div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

   

   


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
             						<option value="DAM 40">DAM 40</option>
             						<option value="DAM 41">DAM 41</option>
             						<option value="BL MASTER">BL Master</option>
             						<option value="FACTURA COMERCIAL">Factura comercial</option>
             						<option value="CARTA DE TEMPERATURA">Carta de temperatura</option>
             						<option value="HOJA DE RUTA">Hoja de ruta</option>
             						<option value="INSPECCION SENASA">Inspeccion SENASA</option>
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
             	
             	</div>   	

             </div>

   		</div>
   	</div>
   </div>


   <!--Modal ver archivos-->

   <div class="modal fade" id="modal_listararchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   	<div class="modal-dialog" role="document">
   		<div class="modal-content">
   			<div class="modal-header">
   				<h5 class="modal-title" id="exampleModalLabel">Ver documentos</h5>
   				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
   					<span aria-hidden="true">&times;</span>
   				</button>
   			</div>
             
              <div class="modal-body">

              	<input type="text" hidden=""  name="ide" ide="ide">

               	<input type="text" hidden="" name="book" id="book" />
               	
              	<div id="datos1">
              		<p></p>
              	</div>

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


   



   
	
  
    <?php include ("./includes/footer.php");  ?>


</body>
</html>