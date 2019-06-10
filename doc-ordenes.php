

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
    	$salida.="<table  class='table table-striped '>
        <thead>
          <tr >
            <th scope='col'>Ide</th>
            <th scope='col'>Orden</th>
            <th scope='col'>Booking</th>
            <th scope='col'>Fecha</th>
            <th scope='col'>Adjuntar</th>
            
            
          </tr>
        </thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['id']."</td>
    					<td>".$fila['orden']."</td>
    					<td>".$fila['booking']."</td>
    					<td>".$fila['fecha']."</td>
    					
                        <td>

                        <a href='' title='Editar datos' class='btn btn-primary btn-sm'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a>
                        <a href='' title='Eliminar' class='btn btn-danger btn-sm'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a>
                       </td>
    				</tr>";

    	}
    	$salida.="</tbody></table>";
    }else{
    	$salida.="NO HAY DATOS :(";
    }


    echo $salida;

    $conn->close();



?>