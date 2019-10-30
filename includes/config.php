   <?php
function conexion(){

	$server="localhost";
	$usuario="root";
	$pass="Axis2019.";
	$bd = "axis";
	$cn=mysqli_connect($server,$usuario,$pass);

	if (mysqli_connect_errno()) {
		echo "Error al conectar con la base de datos";
		exit();
	}
	mysqli_select_db($cn,$bd);
	mysqli_set_charset($cn,"utf8");
	
	return $cn;
}
function close($con){
	mysqli_close($con);
}
function test(){
	$mensaje="OK";
	return $mensaje;
}

function f_select($campos,$tabla,$donde,$agrupado,$order){
	$conexion=conexion();

	if(empty($donde)){
		$s="select $campos from $tabla $agrupado $order";
	}else{
		$s="select $campos from $tabla where $donde $agrupado $order";
	}
	
	$r=mysqli_query($conexion,$s);

	return $r;
	mysqli_close($conexion);
}
function paginacion($campos,$tabla,$donde,$agrupado,$order,$inicio,$tamanio){
	$conexion=conexion();

	if(empty($donde)){
		$s="select $campos from $tabla $agrupado $order limit $inicio,$tamanio";
	}else{
		$s="select $campos from $tabla where $donde $agrupado $order limit $inicio,$tamanio";
	}
	
	$r=mysqli_query($conexion,$s);

	return $r;
	mysqli_close($conexion);
}
function f_select_union($campos,$tabla1,$tabla2,$donde,$agrupado,$order){
	$conexion=conexion();

	if(empty($donde)){
		$s="select $campos from $tabla1 as o inner join $tabla2 as e  on o.tipo = e.id ";
	}else{
		$s="select $campos from $tabla1 as o inner join $tabla2 as e where $donde $agrupado $order";
	}
	
	$r=mysqli_query($conexion,$s);

	return $r;
	mysqli_close($conexion);
}
function f_select_lineas_navieras($ruc){
	$conexion=conexion();

	if(!empty($ruc)){
		$s="select ln.id, ln.nombre from cliente as c inner join cliente_linea_naviera as cl on c.ide=cl.id_cliente inner JOIN linea_naviera as ln on cl.id_linea_naviera=ln.id where c.RUC= $ruc";
	}
	
	$r=mysqli_query($conexion,$s);

	return $r;
	mysqli_close($conexion);
}
function f_select_tecnologias(){
	$conexion=conexion();
	$s="select t.id_tecnologia,t.nombre  from tecnologia as t where t.estado='1'";
	$r=mysqli_query($conexion,$s);

	return $r;
	mysqli_close($conexion);
}
function f_select_puertos(){
	$conexion=conexion();
	$s="select p.id_pod,p.nombre  from pod as p where p.estado='1'";
	$r=mysqli_query($conexion,$s);

	return $r;
	mysqli_close($conexion);
}
function f_select_clientes($campos,$tabla1,$tabla2,$donde,$agrupado,$order){
	$conexion=conexion();

	if(empty($donde)){
		$s="select $campos from $tabla1 as c inner join $tabla2 as u  on c.ide_usuario=u.ide ";
	}else{
		$s="select $campos from $tabla1 as o inner join $tabla2 as e where $donde $agrupado $order";
	}
	
	$r=mysqli_query($conexion,$s);

	return $r;
	mysqli_close($conexion);
}

function f_select_colaboradores($campos,$tabla1,$tabla2,$donde,$agrupado,$order){
	$conexion=conexion();

	if(empty($donde)){
		$s="select $campos from $tabla1 as c inner join $tabla2 as u  on c.ide_usuario=u.ide ";
	}else{
		$s="select $campos from $tabla1 as o inner join $tabla2 as u  on c.ide_usuario=u.ide  where $donde $agrupado $order";
	}
	
	$r=mysqli_query($conexion,$s);

	return $r;
	
}
function f_update($campos,$tabla,$donde){
    $conexion=conexion();
	$s="UPDATE $tabla SET $campos WHERE $donde";
	conexion();
	$r=mysqli_query($conexion,$s);
	return $r;
	mysqli_close($conexion);

}

function f_insert($campos,$tabla){
	$conexion=conexion();
	$s="INSERT INTO $tabla SET $campos";
	$r=mysqli_query($conexion,$s);
	mysqli_close($conexion);
	return $r;
}
function f_select_cliente($ruc){
      $conexion=conexion();
      if(!empty($ruc)){
      	$s="select ide,razon_social from cliente where ruc=$ruc ";
      	$r=mysqli_query($conexion,$s);
      	mysqli_close($conexion);
      	return $r;
      }
}
function f_select_customer($usuario){
      $conexion=conexion();
      if(!empty($usuario)){
      	$s="select c.id_customer, nombres from customer as c inner join usuario as u on c.id_usuario=u.ide where u.usuario='$usuario'";
      	$r=mysqli_query($conexion,$s);
      	mysqli_close($conexion);
      	return $r;
      }
}
function f_select_reservas_cliente($id){
      $conexion=conexion();
      if(!empty($id)){
      	$s="select r.id_reserva, r.producto, r.num_contenedores, p.nombre, p.id_pod, l.nombre,t.nombre, r.fecha, c.razon_social from reserva as r INNER join cliente as c on r.id_cliente=c.ide INNER join tecnologia as t 
      	on r.id_tecnologia=t.id_tecnologia INNER join pod as p on r.id_pod=p.id_pod  INNER join linea_naviera as l on r.id_linea_naviera=l.id WHERE c.ide=$id";

      	$r=mysqli_query($conexion,$s);
      	mysqli_close($conexion);
      	return $r;
      }
}
function f_paginacion_reservas($id,$inicio,$tamanio){
      $conexion=conexion();
      if(!empty($id)){
      	$s="select r.id_reserva, r.producto, r.num_contenedores,p.nombre,p.id_pod, l.nombre,l.id,t.nombre,t.id_tecnologia, r.fecha, c.razon_social from reserva as r INNER join cliente as c on r.id_cliente=c.ide INNER join tecnologia as t 
      	on r.id_tecnologia=t.id_tecnologia INNER join pod as p on r.id_pod=p.id_pod  INNER join linea_naviera as l on r.id_linea_naviera=l.id WHERE c.ide=$id ORDER BY fecha DESC limit $inicio,$tamanio";
      	
      	$r=mysqli_query($conexion,$s);
      	mysqli_close($conexion);
      	return $r;
      }
}
function f_paginacion_reservas_customer($id,$inicio,$tamanio){
	 $conexion=conexion();

      if(!empty($id)){

      	$s="select r.id_reserva,c.razon_social, r.producto, p.nombre,t.nombre, r.fecha, ln.nombre 
         from reserva as r inner join cliente as c on r.id_cliente=c.ide inner join customer as cu on c.id_customer=cu.id_customer
         inner join linea_naviera as ln on r.id_linea_naviera=ln.id inner join pod as p on r.id_pod=p.id_pod inner join 
         tecnologia as t 
         on t.id_tecnologia=r.id_tecnologia
         where cu.id_customer=$id
         order by c.razon_social asc limit $inicio,$tamanio";
      	
      	$r=mysqli_query($conexion,$s);
      	mysqli_close($conexion);
      	return $r;
      }
}
function f_reservas_customer($id){
	 $conexion=conexion();

      if(!empty($id)){

      	$s="select r.id_reserva,c.razon_social, r.producto, p.nombre,t.nombre, r.fecha, ln.nombre 
         from reserva as r inner join cliente as c on r.id_cliente=c.ide inner join customer as cu on c.id_customer=cu.id_customer
         inner join linea_naviera as ln on r.id_linea_naviera=ln.id inner join pod as p on r.id_pod=p.id_pod inner join 
         tecnologia as t 
         on t.id_tecnologia=r.id_tecnologia
         where cu.id_customer=$id";
      	
      	$r=mysqli_query($conexion,$s);
      	mysqli_close($conexion);
      	return $r;
      }
}



?>