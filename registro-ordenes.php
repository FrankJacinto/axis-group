<!DOCTYPE html>
<html>
<head>
  <title>Bienvenido Axis Group</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>

   
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  
</head>
<body>

    <?php 
         

         if (!isset($_SESSION["usuario"])) {
              header("Location: index.php");

         }
         else{
           // echo "Bienvenido : ".$_SESSION["tipo_usuario"]." ". $_SESSION["usuario"];
         }
    ?>
    <?php
    $campo_15="id,";
    $campo_15.="nombre";
    $tabla_15 = "evento";
    $donde_15 = "";
    $grupo_15 = "";
    $orden_15 = "";
    $array_15 = f_select($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15);
    ?>


    <?php
    if(isset($_POST["enviar"])){

     $anio=$_POST["anio"];
     $division=$_POST["division"];
     $ord=$_POST["orden"];
    
     $orden=$anio.'/'.$division.''.$ord;

     $tipo=$_POST["tipo"];
     $ruc=$_POST["ocultito"];
     $descripcion=$_POST["descripcion"];
     $usuario=$_SESSION["usuario"];
     $booking =$_POST["booking"];
     $cliente=$_POST["cliente"];
     
     $rut=$booking."-";


     $mensaje="";
     $cantidadimagenes=0;
     $fallidas=0;
     $rutas_imagenes[]=array();
     foreach($_FILES["image"]['tmp_name'] as $key => $tmp_name)
     {
        //Validamos que el archivo exista
      if($_FILES["image"]["name"][$key]) {
            $filename = $_FILES["image"]["name"][$key]; //Obtenemos el nombre original del archivo
            $source = $_FILES["image"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
            $directorio = 'Imagenes_ordenes'.'/'.$booking; //Declaramos un  variable con la ruta donde guardaremos los archivos
            
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
              mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");    
            }
            
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$rut.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            $rutas_imagenes[$cantidadimagenes]=$target_path;
            
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) { 
                //echo "El archivo $filename se ha almacenado de forma exitosa.<br>";
              $cantidadimagenes=$cantidadimagenes+1;

            } else {    
              echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
              $fallidas=$fallidas+1;

            }
            closedir($dir); //Cerramos el directorio de destino
          }
        }
        if ($fallidas==0) {

         $mensaje.=" e imagenes Insertadas exitosamente ";

         $verificar_orden=mysqli_query(conexion(),"SELECT * FROM ordenes where orden='$orden'");

         //$verificar_imagenes=mysqli_query(conexion(),"SELECT * FROM imagenes where id_orden='$orden'");

         if(mysqli_num_rows($verificar_orden)==0){

           $campo_00 = "id='null',";
           $campo_00.= "orden='$orden',";
           $campo_00.= "tipo='$tipo',";
           $campo_00.= "usuario='$usuario',";
           $campo_00.= "descripcion='$descripcion',";
           $campo_00.= "fecha= now(),";
           $campo_00.="booking='$booking',";
           $campo_00.="cliente='$cliente',";
           $campo_00.="ruc='$ruc',";
           $campo_00.="estado='Pendiente'";
           $tabla_00 = "ordenes";

           $guarda = f_insert($campo_00,$tabla_00);

           if($guarda==1){
             $mensaje="Registro exitoso";


           }
           else{
            $mensaje="Ocurrio un error al insertar la orden";

          }

        }

        else{
         $mensaje="Ya existe un registro con esta orden";
       }


     }
 else{
  $mensaje="Ocurrio un error al insertar imagenes";
 }
}

 ?>
   

  <div class="container">
   <div class="row">
    <div class="col col-lg-4 div-center">   
    
     <?php
      if (isset($_POST["enviar"])) {?>

        
        <div class='alert alert-success' role='alert'> 
          <button class='close' data-dismiss='alert'><span>&times;</span> </button>
          <?=$mensaje?> 
        </div>
      <?php }
      
      ?> 

    <form class="was-validated formulario" enctype='multipart/form-data' method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
         <div class="mb-3" id="contenido" name="contenido">
              <p>Registro de ordenes</p>
         </div>
         
      
         <div class="mb-3">
           <div class="form-check form-check-inline">
              <label><input class="form-check-input" type="radio" name="db" id="dbglobal" value="global" checked=". ">Global</label>
           </div>

           <div class="form-check form-check-inline">
              <label><input class="form-check-input" type="radio" name="db" id="dbgl" value="gl" >GL</label>
           </div>

        </div>
      
      <div class="input-group mb-3">
        <input class="form-control is-invalid" id="validationTextarea" placeholder="" maxlength="2" value ="19"required id="anio" name="anio">
        <input class="form-control is-invalid" id="validationTextarea" placeholder="" value="" maxlength="2" required id="division" name="division" >
        <input class="form-control is-invalid" id="validationTextarea" placeholder="" maxlength="6" required id="orden" name="orden" >
        <div class="input-group-append">
          <button class="btn btn-success btn-outline-secondary" type="button" id="validar" name ="validar"value="Enviar">Validar</button>
        </div>
        <div class="invalid-feedback">
          Registrar un numero de orden
        </div>
        <input type="text" name="ocultito" id="ocultito" hidden="">
      </div>
         <div class="mb-3">
            <input class="form-control is-invalid" id="validationTextarea" placeholder="Autocompletar Booking" required id="booking" name="booking">
            <div class="invalid-feedback">
               Autocompletado booking
            </div>

         </div>
         <div class="mb-3">
            <input class="form-control is-invalid" id="validationTextarea" placeholder="Cliente o Razon social" required id="cliente" name="cliente">
            <div class="invalid-feedback">
               Autoconpletado cliente
            </div>

         </div>
       
      <div class="form-group">
        <select class="custom-select" required id="tipo" name="tipo">
          <option value="">Seleccione</option>
               <?php while($lista_15 = mysqli_fetch_array($array_15)){ ?>
          <option value="<?=$lista_15[0]?>"><?=$lista_15[1]?></option>
               <?php } ?>
        </select>
        <div class="invalid-feedback">Seleccione un item</div>
      </div>

      <div class="mb-3">
        <label for="validationTextarea">Descripcion</label>
        <textarea class="form-control is-invalid" id="validationTextarea" placeholder="Descripcion del evento" required id="descripcion" name="descripcion"></textarea>
        <div class="invalid-feedback">
          Escriba una breve descripcion porfavor.
        </div>
      </div>

      <div class="custom-file">
        <input type="file" class="custom-file-input" id="validatedCustomFile" required id="image[]" name="image[]" multiple="">
        <label class="custom-file-label" for="validatedCustomFile">Seleccione imagenes a subir</label>
        <div class="invalid-feedback">Numero de imagenes (1-15)</div>
      </div>

      <div class="mb-3 separacion" >
            <button type="btn btn-success" class="btn btn-success btn-lg btn-block" id="enviar" name="enviar">Registrar</button>
      </div>
      

   </div>
 </div>
  </div>

<div id="Oculto" name="Oculto" hidden=""></div>

<script >
  $( "#validar" ).click(function() {
   $.post('validar-orden.php', {
            ID : $("input[name='orden']").val(),
            DB : $("input[name='db']:checked").val(),
            ANIO:$("input[name='anio']").val(),
            DIVISION: $("input[name='division']").val()

            
        }, function(data){
            $('#Oculto').html(data);
        });
});
</script>

<script>
$("input[name='orden']").keypress(function(e) {
    if(e.which == 13) {


        $.post('validar-orden.php', {
            ID : $("input[name='orden']").val(),
            DB : $("input[name='db']:checked").val(),
            ANIO:$("input[name='anio']").val(),
            DIVISION: $("input[name='division']").val(),

            
        }, function(data){
            $('#Oculto').html(data);
        });
    }
});
  

</script>

</body>
</html>