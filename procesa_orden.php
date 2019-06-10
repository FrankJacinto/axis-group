

<?php include("includes/config.php")?>
<?php
if(isset($_POST["enviar"])){

   $orden=$_POST["orden"];
   $tipo=$_POST["tipo"];
   $ruc=$_POST["ocultito"];
   $descripcion=$_POST["descripcion"];
   $usuario="fjacinto";
   $booking =$_POST["booking"];
   $cliente=$_POST["cliente"];

  

        $campo_00 = "id='null',";
        $campo_00.= "orden='$orden',";
        $campo_00.= "tipo='$tipo',";
        $campo_00.= "usuario='$usuario',";
        $campo_00.= "descripcion='$descripcion',";
        $campo_00.= "fecha= now(),";
        $campo_00.="booking='$booking',";
        $campo_00.="cliente='$cliente',";
        $campo_00.="ruc='$ruc'";

        // $campo_00.="cantidad_imagenes='$cantidadimagenes'";
        
        $tabla_00 = "ordenes";
        $guarda = f_insert($campo_00,$tabla_00);

        if($guarda==1 ){

         //$cantidadimagenes=0;
         $fallidas=0;
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
            $target_path = $directorio.'/'.$booking.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            
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
            
            echo "Insercion correcta";

            header("Location: mensaje.php");

        }else{
            header("Location: main.php?ord=1");
             echo "$orden  $tipo  $descripcion $booking $cliente";
              echo "Insercion INcorrecta";
              echo "<br>     $guarda";
              echo "<br>     $fallidas";
            
        }
}

?>