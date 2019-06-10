<!DOCTYPE html>
<html>
<head>
	<title>Documentacion-Axis</title>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
	

    <link rel="stylesheet" type="text" href="../css/estilo.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../js/main.js"></script>
	<style type="text/css">
		.div-center{
			width: 500px;
			position: relative;

		}
		.col-centrada{
			float: none;
			margin: 0 auto;
			padding-top: 30px;
		}

	</style>
	
</head>
<body>

   <section class="principal">

      <h1>Ordenes aduaneras</h1>

      <div class="formulario">
        <label for="caja_busqueda">Buscar</label>
        <input type="text" name="caja_busqueda" id="caja_busqueda"></input>


      </div>

      <div id="datos"></div>


    </section>
   </div>


	<!-- <div class="row">
		<div class="col-lg-10 col-xm-6 col-centrada table-responsive">
			<table class="table table-striped ">
				<thead>
					<tr>
						<th scope="col">Id</th>
						<th scope="col">Orden</th>
						<th scope="col">Tipo</th>
						<th scope="col">Usuario</th>
						<th scope="col">Descripcion</th>
						<th scope="col">Fecha</th>
						
					</tr>
				</thead>

				<?php 
				$campo_15="(select lpad(o.id, 3, 0)), o.orden, e.nombre , o.usuario, o.descripcion, o.fecha";
				$tabla1 = "ordenes";
				$tabla2="evento";
				$donde_15 = "";
				$grupo_15 = "";
				$orden_15 = "";
				
				$array_15=f_select_union($campo_15,$tabla1,$tabla2,$donde_15,$grupo_15,$orden_15);

                ?>
                <tbody>
                	
				<?php while($lista_15 = mysqli_fetch_array($array_15)){ ?>
					     <tr>
					        <td><?=$lista_15[0]?></th>
					        <td><?=$lista_15[1]?></th>
					        <td><?=$lista_15[2]?></th>
					        <td><?=$lista_15[3]?></th>
					        <td><?=$lista_15[4]?></th>
					        <td><?=$lista_15[5]?></th>
					        <td></td>
					     </tr>
				    <?php }?>
					
				</tbody>
			</table>
		</div>
	</div> -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>
</html>