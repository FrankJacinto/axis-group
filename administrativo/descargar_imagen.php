<!DOCTYPE html>
<html>
<head>
	<title>Visualizar pdf</title>
</head>
<body>
<?php

$archivo=$_GET["archivo"];
$booking=$_GET["book"];
$img="";



$img = "../Imagenes_ordenes/".$booking."/".$archivo;
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename='.basename($img));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: ' . filesize($img));
ob_clean();
flush();
readfile($img);

	 
	
	?>

</body>
</html>