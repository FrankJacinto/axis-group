

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>

  
    <link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    
  
</head>
<body>



<?php
	$servername = "localhost";
    $username = "root";
  	$password = "";
  	$dbname = "axis";

	$conn = new mysqli($servername, $username, $password, $dbname);
      if($conn->connect_error){
        die("Conexión fallida: ".$conn->connect_error);
      }

    $salida = "";

    $query = "SELECT * FROM ordenes ORDER By fecha desc LIMIT 10";


    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM ordenes WHERE orden LIKE '%$q%' OR booking LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<div class='container-fluid'>
     
    <div class='col-lg-12 col-sm-10  table-responsive'><table  class='table table-striped table-sm '>
        <thead>
          <tr >
            <th scope='col'>Ide</th>
            <th scope='col'>Orden</th>
            <th scope='col'>Booking</th>
            <th scope='col'>Fecha</th>
            <th scope='col'>Estado</th>
            <th scope='col'>Adjuntar</th>
            <th scope='col'>Listar</th>
            
          </tr>
        </thead>
    			

    	<tbody>";
       $id=12;


    	while ($fila = $resultado->fetch_array()) {
            $boo="'".$fila[6]."'";

                        $directory="Archivosordenes/".$fila[6];
                        
                        if (file_exists($directory)) {
                            $dirint = dir($directory);
                            $cont=0;

                            while (($archivo = $dirint->read()) !== false)
                            {
                                if (strpos($archivo, 'pdf')){
                                    $cont=$cont+1;
                                }

                            }

                            if ($cont==7) {
                                $estado="Regularizado";
                            }
                            else{
                                if ($cont<7) {
                                 $estado="Pendiente";
                             }
                         }

                          
                        }
                        else{

                            $estado="Pendiente";
                        }
                        $salida.="<tr>
    					<td>".$fila[0]."</td>
    					<td>".$fila[1]."</td>
    					<td>".$fila[6]."</td>
    					<td>".$fila[5]."</td>
                        <td>".$estado."</td>
                        <td>
                        <a data-toggle='modal' href='#exampleModal' onclick=enviar_orden(".$fila[0].",'".$fila[6]."'); ><img src='Imagenes/pd.png' ></a>
                        </td>
                        <td>
                        <a data-toggle='modal' href='#modal_listararchivos' onclick=enviar_orden1('".$fila[6]."'); ><img src='Imagenes/edit.png' ></a>
                        </td>
    					
                        
    				</tr>";
                    $cont=0;

    	}
    	$salida.="</tbody></table></div></div>";
    }else{
    	$salida.="NO SE ENCONTRARON COINCIDENCIAS";
    }


    echo $salida;

    $conn->close();



?>
<script type="text/javascript">
    function enviar_orden(id,booking) {
     $("input[name='ide']").val(id);
     $("input[name='book']").val(booking);
     <?php $valor= 'booking' ?>


 }
 function enviar_orden1(booking) {
    $.ajax({
        url: 'administrativo/listar_archivos.php' ,
        type: 'POST' ,
        dataType: 'html',
        data: {booking: booking},
    })
    .done(function(respuesta){
        $("#datos1").html(respuesta);
    })
    .fail(function(){
        console.log("errorsoli");
    });

}


  
</script>

</body>
</html>