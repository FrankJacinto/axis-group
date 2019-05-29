<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	
    
	<script>
		$("input[name='booking']").val('');
		$("input[name='cliente']").val('');
	</script>

	<?php 
	 include("includes/configaxis.php");
	//$Iden = (is_numeric($_POST['ID']))?:NULL;
	 $Iden=$_POST['ID'];
	 $DB=$_POST['DB'];
	 
    echo "$Iden $Iden";
    echo "$DB";
   
	if($Iden){
		
		$donde_15 = "NRO_ORDEN='$Iden'";
		$grupo_15 = "";
		$orden_15 = "";

		if ($DB=="gl") {
			$campo_15="NRO_ORDEN, NBOOKING, NOMB_CLTE";
			$tabla_15 = "sa_decunica";
			$array_15 = f_select($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15);
		}
		if ($DB=="global") {
			$campo_16="NRO_ORDEN, NOM_EMBAR, DCTO_EMBARH";
			$tabla_16 = "cg_conohijo";
			$array_15 = f_select_global($campo_16,$tabla_16,$donde_15,$grupo_15,$orden_15);
		}
		$TotalFilas=0;
		while($lista_15 = mysqli_fetch_array($array_15)){ 
		
			$ordencopia=$lista_15[0];
			$bookcopia=$lista_15[1];
			$clientecopia=$lista_15[2];
			 
			$TotalFilas=$TotalFilas+1;

		}
		
		if($TotalFilas == 0){
			echo "<script>alert('No hay valores que coincidan con la búsqueda. ');</script> ";
		} else {
			?>
			<script>
			
				$("input[name='booking']").val("<?php echo $bookcopia;?>");
				$("input[name='cliente']").val("<?php echo $clientecopia;?>");
				$("select[name='tipo']").focus();
				
			</script>
			<?php 
		}
	} else {
		echo "<script>alert('Estas metiendo un valor no numérico');</script>";
	}
	?>
	
	
	
	

	

</body>
</html>