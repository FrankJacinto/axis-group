
<?php
if (isset($_POST['booking'])) {

	$book=$_POST["booking"];

	
	$directory="../Archivosordenes/".$book;
	

	
	$salida="<p>  Booking: ".$book."</p>";

	if (file_exists($directory)){
		$dirint = dir($directory);
		$salida.="<table  class='table table-striped table-sm '>
		<thead>
		<tr >
		<th scope='col'>Ide</th>
		<th scope='col'>archivo</th>
        <th scope='col'>Accion</th>
		</tr>
		</thead>
		<tbody>";
        $i=0;
		while (($archivo = $dirint->read()) !== false)
		{
			if (strpos($archivo, 'pdf')){
				$i=$i+1;
				$salida.="<tr>
				<td>".$i."</td>
				<td>".$archivo."</td>
				<td>
				<a  href='ver_pdf.php?book=".$book."&archivo=".$archivo."' target='blank'>
				<img src='Imagenes/ver.png' >
				</a>
				</td>
				
				</tr>";

			}
		}
		$dirint->close();
		$salida.="</tbody></table>";

	}
	else{
		$salida.="No existen archivos";
	}
	echo $salida;
}  
?>


