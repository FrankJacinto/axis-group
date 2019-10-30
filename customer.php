<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<div class="content-wrapper">

		<!-- Main content -->
		<section class="content">


			<div class="row">
				<div class="col-md-12">
					<div class="box">
						<div class="box-header with-border">
							<h3 class="box-title">Reservas clientes</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-success" onclick="limpiar();" data-toggle="modal" id="btn_nuevo" name="btn_nuevo" data-target="#modal_nueva_reserva">Informacion</button>
							</div>
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							<div class="container-fluid ">

								<div class="col-lg-12 col-sm-6  table-responsive">

									<table class="table table-striped mt-3">
										<thead>
											<tr>
												<th scope="col">Codigo</th>
												<th scope="col">Razón social</th>
												<th scope="col">Producto</th>
												<th scope="col">POD</th>
												<th scope="col">Tecnologia</th>
												<th scope="col">Fecha</th>
												<th scope="col">Linea</th>
                                                <th scope="col">Acciones</th>

											</tr>
										</thead>

										<?php 

										$id_customer= $_SESSION["id_customer"];


										


										if (isset($_GET["pagina"])) {


											$pagina=$_GET["pagina"];

										}
										else{
											$pagina=1;
										}

         //$pagina=1;
										$tamanio_pagina=5;

										$empezar_desde=($pagina-1)*$tamanio_pagina;

         //ver cuantas ordenes tiene el cliente
										$arraytotal=f_select_reservas_cliente($id_customer);
										$numero_filas = mysqli_num_rows($arraytotal);
										$array_15 = f_paginacion_reservas_customer($id_customer,$empezar_desde,$tamanio_pagina);

										$numero_paginas=ceil($numero_filas/$tamanio_pagina);
          //echo "$numero_filas    $numero_paginas";
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
												    <td><?=$lista_15[6]?></th>
													<td>
														<a data-toggle="modal" href="#modal_nueva_reserva" onclick="modificar_reserva('<?=$lista_15[1]?>','<?=$lista_15[6]?>','<?=$lista_15[2]?>','<?=$lista_15[4]?>','<?=$lista_15[6]?>','<?=$lista_15[6]?>','<?=$lista_15[0]?>');"><img src='img/delete.png' ></a>
											
														<a onclick="mensaje(<?=$lista_15[0]?>);" ><img src='img/update.png' ></a>
														
													</td>

												</tr>
											<?php } ?>

										</tbody>
									</table>
													<nav aria-label="Page navigation example">
														<ul class="pagination">
															<li class="page-item">
																<a class="page-link" href="#" aria-label="Previous">
																	<span aria-hidden="true">&laquo;</span>
																</a>
															</li>

															<?php
															for ($i=1; $i <=$numero_paginas ; $i++) { 
																?>
																<li class="page-item"><a class="page-link" href="?pagina=<?=$i?>"><?=$i?></a></li>
															<?php }

															?>

															<li class="page-item">
																<a class="page-link" href="#" aria-label="Next">
																	<span aria-hidden="true">&raquo;</span>
																</a>
															</li>
														</ul>
													</nav>

												</div>
											</div>

							
				</div><!-- /.box-body -->
			</div><!-- /.box -->
		</div><!-- /.col -->
	</div><!-- /.row -->

</section><!-- /.content -->
</div><!-- /.content-wrapper -->

</body>
</html>