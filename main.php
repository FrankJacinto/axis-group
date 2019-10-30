<!DOCTYPE html>
<html>
<head>
	<title>Axis Group</title>
	<meta charset="utf-8">
 
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
  <link rel="icon" type="image/png" href="imagenes/favicon.png" />
	
</head>
<body>

  

   <?php 
         
         include("include/welcome.php");
         

         if (!isset($_SESSION["usuario"])) {
              header("Location: index.php");

         }
         else{
            //echo "Bienvenido : ".$_SESSION["tipo_usuario"]." ". $_SESSION["usuario"];
         }

         if ($_SESSION["tipo_usuario"]==1) {
             include("admin/gestionar.php");
           # code...
         }
         if ($_SESSION["tipo_usuario"]==2) {
             include("registro-ordenes.php");
           # code...
         }
         if ($_SESSION["tipo_usuario"]==3) {
             include("jefatura/principal.php");
           # code...
         }
         if ($_SESSION["tipo_usuario"]==4) {
             include("administrativo/documentacion.php");
           # code...
         }
         if ($_SESSION["tipo_usuario"]==5) {
             include("cliente/reservas.php");
           # code...
         }
         if ($_SESSION["tipo_usuario"]==6) { 
             include ("customer/reservas.php");
         }?>


  <script type="text/javascript">
    function enviar_book(orden){
    
      $("input[name='orden1']").val(orden);
     
    }
  </script>
  <?php 
    if ($_SESSION["tipo_usuario"]==5) {
      include("include/footer.php");
    }
  ?>

</body>
</html>