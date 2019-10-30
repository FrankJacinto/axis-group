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
         <div class="container">
          <p class="h2">Registro de reservas</p>
        </div>
        <div class="container">
          
          <form class="was-validated">
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="validationServer01">Cod-Reserva</label>
                <input type="text" class="form-control is-valid" id="validationServer01" placeholder="" value="2567" required>
                <div class="valid-feedback">
                  Codigo de reserva generado
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationServer02">Cliente</label>
                <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="Otto" required>
                <div class="valid-feedback">
                  Cliente validado
                </div>
              </div>

              
            </div>
            <div class="form-row">
              <div class="col-md-2 mb-3">
                <label for="validationServerUsername">Contenedores</label>
                <div class="form-group">
                  <select class="custom-select" required>
                    <option value="">Selecciona </option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="3">4</option>
                  </select>
                  <div class="invalid-feedback">Seleccione Nro de cont.</div>
                  <div class="valid-feedback">Cantidad validada </div>
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationServer02">Consignatario</label>
                <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="O" required>
                
                <div class="valid-feedback">
                  Verifica consigatario 
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationServer02">POD</label>
                <input type="text" class="form-control is-valid" id="validationServer02" placeholder="Last name" value="Otto" required>
                <div class="valid-feedback">
                  Verifica el POD
                </div>
              </div>

            </div>
            <div class="form-row">
              <div class="col-md-3 mb-3">
                <label for="validationServerUsername">Producto</label>
                <div class="input-group">
                  
                  <input type="text" class="form-control is-invalid" id="validationServerUsername" placeholder="nombre del producto" aria-describedby="inputGroupPrepend3" required>
                  <div class="valid-feedback">
                    Nombre
                  </div>
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationServerUsername">Tecnologia</label>
                <div class="form-group">
                  <select class="custom-select" required>
                    <option value="">Selecciona tecnologia</option>
                    <option value="1">Standar</option>
                    <option value="2">Starcare</option>
                    <option value="3">Extendfresh</option>
                  </select>
                  <div class="invalid-feedback">Seleccione tecnologia</div>
                  <div class="valid-feedback">Tecnologia validada </div>
                </div>
              </div>
              <div class="col-md-2 mb-3">
                <label for="validationServerUsername">Fecha</label>
                <div class="form-group">
                  
                  <input type="date" class="form-control is-invalid" id="validationServerUsername" placeholder="nombre del producto" aria-describedby="inputGroupPrepend3" required>
                  <div class="valid-feedback"> fecha validada</div>
                  
                </div>
              </div>
            </div>
            
            <button class="btn btn-primary" type="submit">Enviar reserva</button>
          </form>
        </div>

      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <?php include ("footer.php"); ?>
  </body>
</html>