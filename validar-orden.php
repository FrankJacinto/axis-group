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
	 $ORDEN=$_POST['ID'];
	 $DB=$_POST['DB'];
	 $ANIO=$_POST['ANIO'];
	 $DIVISION=$_POST['DIVISION'];
	 	 
	 $Iden=$ANIO.'/'.$DIVISION.''.$ORDEN;

    echo "$Iden $Iden";

    echo "$DB";
   
	if($ORDEN && $DIVISION){
		
		$donde_15 = "NRO_ORDEN='$Iden'";
		$grupo_15 = "";
		$orden_15 = "";

		if ($DB=="gl") {
			$donde_15 = "NRO_ORDEN='$Iden'";
			$campo_15="NRO_ORDEN, NBOOKING, NOMB_CLTE,CODI_CLTE";
			$tabla_15 = "sa_decunica";
			$array_15 = f_select($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15);
		}
		if ($DB=="global") {
			$donde_15 = "NRO_ORDENH='$Iden'";
			$campo_16="NRO_ORDENH, DCTO_EMBARH, NOM_EMBAR,CLIENTE";
			$tabla_16 = "cg_conohijo";
			$array_15 = f_select_global($campo_16,$tabla_16,$donde_15,$grupo_15,$orden_15);
		}
		$TotalFilas=0;
		while($lista_15 = mysqli_fetch_array($array_15)){ 
		
			$ordencopia=$lista_15[0];
			$bookcopia=$lista_15[1];
			$clientecopia=$lista_15[2];
			$ruc=$lista_15[3];
			 
			$TotalFilas=$TotalFilas+1;

		}
		
		if($TotalFilas == 0){

			$error="No se encontro registro en aduanas y carga";
        ?>
         <script >
         	$("#contenido").html("No se encontraron registros en  SINTAD");
         </script>
			
			
		<?php	
		} else {
			?>
			<script>
			
				$("input[name='booking']").val("<?php echo $bookcopia;?>");
				$("input[name='cliente']").val("<?php echo $clientecopia;?>");
				$("input[name='ocultito']").val("<?php echo $ruc;?>");
				
				$("#contenido").html("");
				
				$("select[name='tipo']").focus();
				
			</script>
			<?php 
		}
	} else {
		$error="Ingresar un valor";
		//echo "$error";
		//echo "<script>alert('Estas metiendo un valor no numérico');</script>";
      ?>
		 <script >
         	$("#contenido").html("Debes completar los campos");
         </script>
         
	<?php }
	?>
	
	
	
	

	

</body>
</html>