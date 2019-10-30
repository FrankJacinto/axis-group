<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
  
	<link rel="stylesheet" type="text/css" href="css/bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<style type="text/css">
		.carousel-item {
			height: 85vh;
			min-height: 400px;
		
			background: no-repeat center center scroll;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
       }
	</style>

</head>
<body>
	<?php include("includes/config.php"); ?>
	<?php include("includes/menu.php"); ?>
    <?php 
      if (!isset($_SESSION["tipo_usuario"])) {
              header("Location: index.php");

         
   
    } ?>

	<div class="container-fluid">
		<div >
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<a class="nav-item nav-link active" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="true">Animación</a>
					<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Archivos</a>
					<a class="nav-item nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Imagenes</a>
					
					
			
					
				</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
						</ol>
						

						<div class="carousel-inner" role="listbox">
									<?php
                               //Recuperar imagenes de un directorio
									$book=$_POST["bookin"];
									$directory="Imagenes_ordenes/".$book;
									
                                  
									if (file_exists($directory)) {
										$dirint = dir($directory);
										$cont=0;
										while (($archivo = $dirint->read()) !== false)
										{
											if (strpos($archivo, 'gif')|| strpos($archivo, 'jpg') || strpos($archivo, 'png')|| strpos($archivo, 'jpeg')){
												if($cont==0){?>
													<div class="carousel-item active" style="background-image: url('<?=$directory.'/'.$archivo?>')">
														
													</div>
												<?php }
												else{ ?>

													<div class="carousel-item" style="background-image: url('<?=$directory.'/'.$archivo?>')">
														
													</div>


												<?php }
												$cont=$cont+1;
											}
										}
										$dirint->close();
										# code...
									}
									else{
										echo "No se encontraron archivos";
									}
										?>
									


							</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
				<div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					 <div class="container-fluid">
						<div class="">
							<ul class="list-group">

						<?php
                               //Recuperar imagenes de un directorio
						$directory="Imagenes_ordenes/".$book;
						
						if (file_exists($directory)) {
							$dirint = dir($directory);
							$cont=1;

							while (($archivo = $dirint->read()) !== false)
							{
								if (strpos($archivo,'png')||strpos($archivo, 'jpg')||strpos($archivo, 'jpeg')){?>

									<li class="list-group-item d-flex justify-content-between align-items-center">

										<a target="blank" href="administrativo/descargar_imagen.php?book=<?=$book?>&archivo=<?=$archivo?>"> <?=$cont?>  <?=$archivo?>
										<span class="glyphicon glyphicon-download-alt"></span>
									</a>

								</li>

								<?php $cont=$cont+1;
							}

						}
						$dirint->close();
					}
					else{
						echo "No se encontraron archivos ";
					}
                      ?>
					
					</ul>
						</div>
					</div>

					</div>
					<!-- Recuperar archivovos de un directorio-->
					
				<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					<div class="container-fluid">
						<div class="">
							<ul class="list-group">

						<!--Recuperar archivos del directorio-->
						<?php
                               //Recuperar imagenes de un directorio

						$directory="Archivosordenes/".$book;
						
						if (file_exists($directory)) {
							$dirint = dir($directory);
							$cont=1;

							while (($archivo = $dirint->read()) !== false)
							{
								if (strpos($archivo, 'pdf')){?>

									<li class="list-group-item d-flex justify-content-between align-items-center">

										<a target="blank" href="ver_pdf.php?book=<?=$book?>&archivo=<?=$archivo?>"> <?=$cont?>  <?=$archivo?>
										<span class="glyphicon glyphicon-download-alt"></span>
									</a>

								</li>

								<?php $cont=$cont+1;
							}

						}
						$dirint->close();
					}
					else{
						echo "No se encontraron archivos ";
					}
                      ?>
					
					</ul>
						</div>
					</div>
				</div>
			
				
			
			

			</div>
		
		</div>

	</div>


	
<?php include("includes/footer.php"); ?>
</body>
</html>