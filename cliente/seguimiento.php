<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
  <script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>

	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>


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
	<?php include("welcome.php"); ?>
	
    <?php 
      
      if (!isset($_SESSION["usuario"])) {
              header("Location: index.php");

         
   
    } ?>
    <div class="content-wrapper">

    	<!-- Main content -->
    	<section class="content"> 

    		<div class="container-fluid">
    			<ul class="nav nav-tabs" id="myTab" role="tablist">
    				<li class="nav-item">
    					<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
    						Evidencias
    					</a>
    				</li>
    				<li class="nav-item">
    					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Archivos</a>
    				</li>
    				<li class="nav-item">
    					<a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Imagenes</a>
    				</li>
    			</ul>
    			<div class="tab-content" id="myTabContent">

    			<div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">


    				<div id="contenedor">
    					<div id="myCarousel" class="carousel slide">
    						<ol class="carousel-indicators">
    							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    							<li data-target="#myCarousel" data-slide-to="1"></li>
    							<li data-target="#myCarousel" data-slide-to="2"></li>
    							<li data-target="#myCarousel" data-slide-to="3"></li>
    							<li data-target="#myCarousel" data-slide-to="4"></li>
    						</ol>
    						<!-- Carousel items -->
    						<div class="carousel-inner">

                                 
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
													<div class="carousel-item item active" style="background-image: url('<?=$directory.'/'.$archivo?>')">
														
													</div>
												<?php }
												else{ ?>

													<div class="carousel-item item " style="background-image: url('<?=$directory.'/'.$archivo?>')">
														
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
    						<!-- Carousel nav -->
    						<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
    						<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    					</div>
    				</div>

    				
    				<script>
    					$(document).ready(function(){
    						$('.myCarousel').carousel()
    					});
    				</script>

    				
    				</div>

    				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    					<div class="container-fluid">
						<div class="">
							<ul class="list-group">

						<!--Recuperar archivos del directorio-->
						<?php
                               //Recuperar imagenes de un directorio
                       $book=$_POST["bookin"];
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
    				<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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

										<a target="blank" href="descargar_imagen.php?book=<?=$book?>&archivo=<?=$archivo?>"> <?=$cont?>  <?=$archivo?>
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

</section>
</div>


	
<?php include("footer.php"); ?>
</body>
</html>