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

</head>
<body>
	<?php include("includes/config.php"); ?>
	<?php include("includes/menu.php"); ?>


	<div class="container">
		<div >
			<nav>
				<div class="nav nav-tabs" id="nav-tab" role="tablist">
					<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Imagenes</a>
					<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Archivos</a>
					
				</div>
			</nav>
			<div class="tab-content" id="nav-tabContent">
				<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
					<div  class="container">
						<div class="row">
							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<?php
                               //Recuperar imagenes de un directorio
									$book=$_POST["bookin"];
									$directory="Imagenes_ordenes/".$book;
									$dirint = dir($directory);
									$cont=0;

									while (($archivo = $dirint->read()) !== false)
									{
										if (strpos($archivo, 'gif')|| strpos($archivo, 'jpg') || strpos($archivo, 'png')|| strpos($archivo, 'jpeg')){
											if($cont==0){?>
												<div class="carousel-item active">
													<img src="<?=$directory.'/'.$archivo?>" class="d-block w-100" alt="...">
												</div>
											<?php }
											else{ ?>

												<div class="carousel-item ">
													<img src="<?=$directory.'/'.$archivo?>" class="d-block w-100" alt="...">
												</div>


											<?php }
											$cont=$cont+1;
										}}
										$dirint->close();
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
						</div>

					</div>
				<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
					<div class="container-fluid">
						<div class="">
							<ul class="list-group">

						<!--Recuperar archivos del directorio-->
						<?php
                               //Recuperar imagenes de un directorio

						$directory="Archivosordenes/".$book;
						$dirint = dir($directory);
						$cont=0;
                        
						while (($archivo = $dirint->read()) !== false)
						{
							if (strpos($archivo, 'pdf')){?>

								<li class="list-group-item d-flex justify-content-between align-items-center">
									
									<a target="blank" href="ver_pdf.php?book=<?=$book?>&archivo=<?=$archivo?>"> <?=$cont?>  <?=$archivo?>
										<span class="glyphicon glyphicon-download-alt"></span>
									</a>

								</li>

							<?php $cont=$cont+1;}

						}
						$dirint->close();
						?>
					</ul>
						</div>
					</div>
				</div>
			
			</div>
		
		</div>

	</div>


	

</body>
</html>