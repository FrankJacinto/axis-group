<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
   // $archivo=$_GET["archivo"];
   // $booking=$_GET["book"];
     $archivo=$_POST["documento"];
     $booking=$_POST["book"];
     $archivo=$archivo.'.pdf';

     //$archivo.=$archivo."pdf";
     //print_r ($archivo );
     //print_r ($booking);
     //$archivo="HOJA-DE-RUTA.pdf";
     //$booking="54431706";

     if ($archivo&&$booking) {

     	$ruta="../Archivosordenes/".$booking."/".$archivo;
     	if (file_exists($ruta)) {
     		header("Content-disposition: inline; filename=$archivo");
     		header("Content-type: application/pdf");
     		readfile("../Archivosordenes/$booking/$archivo");
     	}
     	else{
            echo "No se encontro archivo";
     	}
     	
     }
     

    
	?>

</body>
</html>