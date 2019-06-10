

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

    $query = "SELECT * FROM colaborador ORDER By ide LIMIT 5";

    if (isset($_POST['consulta'])) {
    	$q = $conn->real_escape_string($_POST['consulta']);
    	$query = "SELECT * FROM colaborador WHERE ide LIKE '%$q%' OR DNI LIKE '%$q%' OR nombres LIKE '%$q%' OR apellidos LIKE '%$q%' OR area LIKE '$q' ";
    }

    $resultado = $conn->query($query);

    if ($resultado->num_rows>0) {
    	$salida.="<table  class='table table-striped '>
        <thead>
          <tr >
            <th scope='col'>Ide</th>
            <th scope='col'>DNI</th>
            <th scope='col'>Nombres</th>
            <th scope='col'>Apellidos</th>
            <th scope='col'>Contraseña</th>
            <th scope='col'>Acciones</th>
            
            
          </tr>
        </thead>
    			

    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['ide']."</td>
    					<td>".$fila['DNI']."</td>
    					<td>".$fila['nombres']."</td>
    					<td>".$fila['apellidos']."</td>
    					<td>".$fila['area']."</td>
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