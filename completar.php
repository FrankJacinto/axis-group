<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<script>
		$("input[name='tipo']").val('');
		$("input[name='descripcion']").val('');
	</script>
	<?php 
	include ("includes/config.php");
	$Iden = (is_numeric($_POST['ID']))?$_POST['ID']:NULL;
    echo "$Iden $Iden";
	if(!is_null($Iden)){
		//$Consulta = 'SELECT * FROM ordenes WHERE orden = '.$Iden.';';

		$campo_15="orden, tipo, descripcion,imagen";

		$tabla_15 = "ordenes";
		$donde_15 = "orden='$Iden'";
		$grupo_15 = "";
		$orden_15 = "";
		$array_15 = f_select($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15);
		$TotalFilas=0;
		while($lista_15 = mysqli_fetch_array($array_15)){ 
			$ordencopia=$lista_15[0];
			$tipocopia=$lista_15[1];
			$descripcioncopia=$lista_15[2];
			$imagencopia=$lista_15[3];
			 
			$TotalFilas=$TotalFilas+1;

		}
		
		if($TotalFilas == 0){
			echo "<script>alert('No hay valores que coincidan con la búsqueda. ');</script> ";
		} else {
			?>
			<script>
			
				$("textarea[name='descripcion']").val("<?php echo $descripcioncopia;?>");
				$("select[name='tipo']").val("<?php echo $tipocopia;?>");
				$("input[name='image']").val("<?php echo $tipocopia;?>");
				
			</script>
			<?php 
		}
	} else {
		echo "<script>alert('Estas metiendo un valor no numérico');</script>";
	}
	?>


	
</body>
</html>