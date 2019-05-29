<?php


function conexion(){

	$server="192.168.10.124";
	$user="dbuser";
	$pass="dbpass";
	$bd="db_aduan_00";
	$cn=mysqli_connect($server,$user,$pass);

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

function conexion_global(){

	$server="192.168.10.124";
	$user="dbuser";
	$pass="dbpass";
	$bd="db_carga_00";
	$cn=mysqli_connect($server,$user,$pass);

	if (mysqli_connect_errno()) {
		echo "Error al conectar con la base de datos";
		exit();
	}
	mysqli_select_db($cn,$bd);
	mysqli_set_charset($cn,"utf8");
	
	return $cn;
}


function f_select_global($campos,$tabla,$donde,$agrupado,$order){
	$conexion=conexion_global();

	if(empty($donde)){
		$s="select $campos from $tabla $agrupado $order";
	}else{
		$s="select $campos from $tabla where $donde $agrupado $order";
	}
	
	$r=mysqli_query($conexion,$s);

	return $r;
	mysqli_close($conexion);
}


?>