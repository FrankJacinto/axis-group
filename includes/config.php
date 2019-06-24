<?php
function conexion(){

	$server="localhost";
	$usuario="root";
	$pass="";
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
function close(){
	mysqli_close();
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
?>