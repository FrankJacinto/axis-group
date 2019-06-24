<!DOCTYPE html>
<html>
<head>
	 <title>managemen</title>
	<meta charset="utf-8">

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script  src="https://code.jquery.com/jquery-3.3.1.min.js"  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>

   
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="../css/estilos/estilos-login.css">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap/bootstrap.min.css">
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>
 

</head>


<body>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Clientes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Colaboradores</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Parametros</a>
  </li>
</ul>

<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

<div class="row">
    <div class="col-lg-10 col-xm-6 col-centrada table-responsive">
      <p>carga en one</p>
      <table class="table table-striped ">
        <thead>
          <tr>
            <th scope="col">Ide</th>
            <th scope="col">RUC</th>
            <th scope="col">Razon Social</th>
            <th scope="col">Usuario</th>
            <th scope="col">Contraseña</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
            
          </tr>
        </thead>

        <?php 
        $campo_15="c.ide, c.RUC, c.razon_social, u.usuario,u.clave,u.estado ";
        $tabla1 = "cliente";
        $tabla2="usuario";
        $donde_15 = "";
        $grupo_15 = "";
        $orden_15 = "";
        
        $array_15=f_select_clientes($campo_15,$tabla1,$tabla2,$donde_15,$grupo_15,$orden_15);

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
                  <td>

                    <a data-toggle="modal" href="#modal_editarcliente" onclick="seleccionar_cliente();" class="btn btn-primary btn-sm">editar</a>
                    <a href="" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombres'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                  </td>
               </tr>
            <?php }?>
          
        </tbody>
      </table>
    </div>
  </div>





  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

    <div class="row">
    <div class="col-lg-10 col-xm-6 col-centrada table-responsive">
      <table class="table table-striped ">
        <thead>
          <tr>
            <th scope="col">Ide</th>
            <th scope="col">DNI</th>
            <th scope="col">Nombres</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Area</th>
            <th scope="col">Usuario</th>
            <th scope="col">contraseña</th>
            <th scope="col">Estado</th>
            <th scope="col">Acciones</th>
            
          </tr>
        </thead>
    
    <?php 
        $campo_15=" c.ide,c.DNI,c.nombres,c.apellidos,c.area,u.usuario,u.clave, u.estado";
        $tabla1 = "colaborador";
        $tabla2="usuario";
        $donde_15 = "";
        $grupo_15 = "";
        $orden_15 = "";
        
        $array_15=f_select_colaboradores($campo_15,$tabla1,$tabla2,$donde_15,$grupo_15,$orden_15);

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
                  <td><?=$lista_15[7]?></th>
                  <td>

                      <a href="" title="Editar datos" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                      <a href="" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombres'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
                  </td>
               </tr>
            <?php }?>
          
        </tbody>
      </table>
    </div>
  </div>


  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
    <P>Aqui se modificaran las tablas maestras de la BD</P>
    <section class="mt-5">

      <h1>BUSQUEDA DE USUARIOS</h1>

      <div class="formulario">
        <label for="caja_busqueda">Buscar</label>
        <input type="text" name="caja_busqueda" id="caja_busqueda"></input>


      </div>

      <div id="datos"></div>


    </section>
  </div>
</div>

 <div class="modal fade" id="modal_editarcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar Cliente</h5>

         
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
        </div>
        
      </div>
    </div>
   </div>


<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/main.js"></script>


</body>
</html>