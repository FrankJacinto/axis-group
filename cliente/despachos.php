<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  
  <?php include("welcome.php"); ?>

         <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Sistema de Ventas</h3>
                  
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                      <div class="col-md-12">
                           <table class="table table-striped mt-3">
            <thead>

              <tr>
                <th scope="col">Orden</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Booking</th>
                <th scope="col">Fecha</th>
                <th scope="col">Ver</th>
                
              </tr>
            </thead>

            <?php 
              
            $ruc= $_SESSION["usuario"];


            $campo_15="orden, descripcion, booking, fecha";
            $tabla_15 = "ordenes";
            $donde_15 = "RUC='$ruc'";
            $grupo_15 = "";
            $orden_15 = "";


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
            $arraytotal=f_select($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15);
            $numero_filas = mysqli_num_rows($arraytotal);
            $array_15 = paginacion($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15,$empezar_desde,$tamanio_pagina);

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

                          <td>

                            <form method="post" action="seguimiento.php">
                              <input type="text" name="bookin" id="bookin" value="<?=$lista_15[2]?>" hidden="">
                              <button type=" submit" class="btn btn-primary btn-sm"> consultar </button>
                            </form>


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

  <div class="content-wrapper">
  	<!-- Main content -->
  	<section class="content">
  		<div class="container-fluid ">

  			<div class="col-lg-12 col-sm-6  table-responsive">

  				<table class="table table-striped mt-3">
  					<thead>

  						<tr>
  							<th scope="col">Orden</th>
  							<th scope="col">Descripcion</th>
  							<th scope="col">Booking</th>
  							<th scope="col">Fecha</th>
  							<th scope="col">Ver</th>
                
  						</tr>
  					</thead>

  					<?php 
  					  
  					$ruc= $_SESSION["usuario"];


  					$campo_15="orden, descripcion, booking, fecha";
  					$tabla_15 = "ordenes";
  					$donde_15 = "RUC='$ruc'";
  					$grupo_15 = "";
  					$orden_15 = "";


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
  					$arraytotal=f_select($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15);
  					$numero_filas = mysqli_num_rows($arraytotal);
  					$array_15 = paginacion($campo_15,$tabla_15,$donde_15,$grupo_15,$orden_15,$empezar_desde,$tamanio_pagina);

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

  												<td>

  													<form method="post" action="seguimiento.php">
  														<input type="text" name="bookin" id="bookin" value="<?=$lista_15[2]?>" hidden="">
  														<button type=" submit" class="btn btn-primary btn-sm"> consultar </button>
  													</form>


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





  				</section>
  </div>
  <?php include("footer.php"); ?>
  <script type="text/javascript">
  	function enviar_book(orden){

  		$("input[name='orden1']").val(orden);

  	}
  </script>
  <div>
    <section>
      
    </section>
    <aside>
      
    </aside>
  </div>

</body>
</html>