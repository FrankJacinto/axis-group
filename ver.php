<?php

    
include ("includes/config.php");

$num_orden=$_POST["num_orden"];



$campo_15="imagen";
$tabla_15 = "ordenes";
$donde_15 = "orden = '$num_orden'";
$grupo_15 = "";
$orden_15 = "";
$array_15 = f_select($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15);

$lista_15 = mysqli_fetch_array($array_15);

// La imagen
$imagen = $lista_15[0];

// Gracias a esta cabecera, podemos ver la imagen 
// que acabamos de recuperar del campo blob
header("Content-Type: image/jpg");
// Muestra la imagen
echo $imagen;   
?>