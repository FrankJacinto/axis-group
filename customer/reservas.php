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
                  <h3 class="box-title">Axis Group</h3>
                 
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
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
										$arraytotal=f_reservas_customer($id_customer);
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
														<a data-toggle="modal" href="#modal_nueva_reserva" onclick="modificar_reserva('<?=$lista_15[1]?>','<?=$lista_15[6]?>','<?=$lista_15[2]?>','<?=$lista_15[4]?>','<?=$lista_15[6]?>','<?=$lista_15[6]?>','<?=$lista_15[0]?>');"><img src='customer/img/delete.png' ></a>
											
														<a onclick="mensaje(<?=$lista_15[0]?>);" ><img src='customer/img/update.png' ></a>

														
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
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <div class="modal fade" id="modal_nueva_reserva" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h2 class="modal-title" id="exampleModalScrollableTitle">Registro de reserva </h2>
					<?php
					if (isset($_POST["editar"])) {?>
						<div class='alert alert-success' role='alert'> 
							<button class='close' data-dismiss='alert'><span>&times;</span> </button>
							<?=$mensaje?> 
						</div>
					<?php }?>
					<?php
					if (isset($_POST["enviar"])) {?>
						<div class='alert alert-success' role='alert'> 
							<button class='close' data-dismiss='alert'><span>&times;</span> </button>
							<?=$mensaje?> 
						</div>
					<?php }?>

					
				</div>
				<div class="modal-body">
					<form id="form-registrar" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
						<div class="form-group" hidden="">
							<label for="id_reserva">Codigo</label>
							<input type="text"  class="form-control"  id="id_reserv" name="id_reserv" >
						</div>
						<div class="form-group">
							<label for="producto">Producto</label>
							<input type="text" class="form-control" required id="producto" name="producto" placeholder="Ingrese producto a exportar">
						</div>
						<div class="form-group">
							<label for="linea">Linea Naviera</label>
							<?php  $array_15 = f_select_lineas_navieras($ruc);?>
							<select class="form-control" required id="linea" name="linea">
								<option value="">Seleccione</option>
								<?php while($lista_15 = mysqli_fetch_array($array_15)){ ?>
									<option value="<?=$lista_15[0]?>"><?=$lista_15[1]?></option>
								<?php } ?>
							</select>
							
						</div>
						<div class="form-group">
							<label for="num_contenedores">Numero de contenedores</label>
								<select class="form-control" required id="num_contenedores" name="num_contenedores">
								<option value="">Seleccione</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
								<option value="5">5</option>

							</select>
						</div>
						<div class="form-group">
							<label for="pod">Destino de descarga</label>
							<?php  $array_17 = f_select_puertos();?>
							<select class="form-control" required id="pod" name="pod">
								<option value="">Seleccione</option>
								<?php while($lista_17 = mysqli_fetch_array($array_17)){ ?>
								<option value="<?=$lista_17[0]?>"><?=$lista_17[1]?></option>
								<?php } ?>
							</select>
							
						</div>
					 <DIV>
					 	
					 </DIV>
						
						<div class="form-group">
							<label for="tecnologia">Tecnlogia de contenedores</label>
							<?php  $array_16 = f_select_tecnologias();?>
							<select class="form-control" required id="tecnologia" name="tecnologia">
								<option value="">Seleccione</option>
								<?php while($lista_16 = mysqli_fetch_array($array_16)){ ?>
									<option value="<?=$lista_16[0]?>"><?=$lista_16[1]?></option>
								<?php } ?>
							</select>
						</div>
						<div class="form-group">
							<label for="fecha">Fecha</label>
							<input type="date" class="form-control" id="fecha" name="fecha" placeholder="Ingresa la fecha ">
						</div>
						
							<button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
							<button type="submit" class="btn btn-success " id="enviar" name="enviar">Guardar</button>
							<button type="submit" class="btn btn-success " id="editar" name="editar">Editar</button>

							
				</div>

				</div>
				
			</div>
		
	</div>
	


       <!-- jQuery 2.1.4 -->
<script type="text/javascript">

	function botones(){

	}
	function mensaje(producto){
		alert(producto);
	}

    function modificar_reserva(producto,fecha,num_contenedores,pod,linea,tecnologia,id_reserva) {
     $("input[name='producto']").val(producto);
     $("input[name='fecha']").val(fecha);
     $("select[name='num_contenedores']").val(num_contenedores);
     $("select[name='pod']").val(pod);
     $("select[name='linea']").val(linea);
     $("select[name='tecnologia']").val(tecnologia);
     $("input[name='id_reserv']").val(id_reserva);
     $('#enviar').hide();
     $('#editar').show();
    
    }
     function limpiar() {
     $("input[name='producto']").val('');
     $("input[name='fecha']").val('');
     $("select[name='num_contenedores']").val('');
     $("select[name='pod']").val('');
     $("select[name='linea']").val('');
     $("select[name='tecnologia']").val('');
     $("input[name='id_reserv']").val('');
     $('#editar').hide();
     $('#enviar').show();
    
    }



</script>

	
</body>
</html>