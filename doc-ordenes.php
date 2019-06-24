

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

    $query = "SELECT * FROM ordenes ORDER By fecha desc LIMIT 10";


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
            <th scope='col'>Estado</th>
            <th scope='col'>Adj</th>
            <th scope='col'>Edit</th>
            
          </tr>
        </thead>
    			

    	<tbody>";
       $id=12;
    	while ($fila = $resultado->fetch_array()) {
            $boo="'".$fila[6]."'";
    		$salida.="<tr>
    					<td>".$fila[0]."</td>
    					<td>".$fila[1]."</td>
    					<td>".$fila[6]."</td>
    					<td>".$fila[5]."</td>
                        <td>".$fila[10]."</td>
                        <td>
                        <a data-toggle='modal' href='#exampleModal' onclick=enviar_orden(".$fila[0].",'".$fila[6]."'); ><img src='../Imagenes/pd.png' ></a>
                        </td>
                        <td>
                        <a data-toggle='modal' href='#modal_listararchivos' onclick=enviar_orden(".$fila[0].",'".$fila[6]."'); ><img src='../Imagenes/edit.png' ></a>
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
<script type="text/javascript">
    function enviar_orden(id,booking) {
     $("input[name='ide']").val(id);
     $("input[name='book']").val(booking);
     <?php $valor= 'booking' ?>


  }
</script>

</body>
</html>