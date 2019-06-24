<!DOCTYPE html>
<html>
<head>
	<title>Visualizar pdf</title>
</head>
<body>

	<?php
	$archivo=$_GET["archivo"];
    $booking=$_GET["book"];
    echo "$archivo  $booking";

	 header("Content-disposition: inline; filename=$archivo");
	 header("Content-type: application/pdf");
	 readfile("Archivosordenes/$booking/$archivo");
	?>

</body>
</html>