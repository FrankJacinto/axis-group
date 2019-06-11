

<!DOCTYPE html>
<html>
<head>
    <title></title>
    
  
   
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

    $query = "SELECT * FROM ordenes ORDER By id LIMIT 8";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM ordenes WHERE orden LIKE '%$q%' OR booking LIKE '%$q%'";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table  class='table table-striped table-sm '>
        <thead>
          <tr >
            <th scope='col'>Ide</th>
            <th scope='col'>Orden</th>
            <th scope='col'>Booking</th>
            <th scope='col'>Fecha</th>
            <th scope='col'>Adjuntar</th>
            <th scope='col'>Estado</th>
            
            
          </tr>
        </thead>
    			

    	<tbody>";
       $id=12;
    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['id']."</td>
    					<td>".$fila['orden']."</td>
    					<td>".$fila['booking']."</td>
    					<td>".$fila['fecha']."</td>

                        <td>
                        <a data-toggle='modal' href='#exampleModal' onclick='enviar_orden(".$fila['id'].")'; ><img src='../Imagenes/pdf.png' ></a>
                        </td>
    					<td>Pendiente</td>
                        
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();



?>
<script type="text/javascript">
    function enviar_orden(id){
     $("input[name='ide']").val(id);

  }
</script>

</body>
</html>