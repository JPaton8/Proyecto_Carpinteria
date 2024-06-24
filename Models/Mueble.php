<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Mueble{


	//implementamos nuestro constructor
public function __construct(){

}
//metodo insertar regiustro
public function insertar($idcategoria,$codigo,$nombre,$stock,$descripcion,$precio_venta,$imagen){
	$sql="INSERT INTO mueble (idcategoria,codigo,nombre,stock,descripcion,precio_venta,imagen,condicion)
	 VALUES ('$idcategoria','$codigo','$nombre','$stock','$descripcion','$precio_venta','$imagen','1')";
	return ejecutarConsulta($sql);
}

public function editar($idmueble,$idcategoria,$codigo,$nombre,$stock,$descripcion,$precio_venta,$imagen){
	$sql="UPDATE mueble SET idcategoria='$idcategoria',codigo='$codigo', nombre='$nombre',stock='$stock',descripcion='$descripcion', precio_venta='$precio_venta',imagen='$imagen' 
	WHERE idmueble='$idmueble'";
	return ejecutarConsulta($sql);
}
public function desactivar($idmueble){
	$sql="UPDATE mueble SET condicion='0' WHERE idmueble='$idmueble'";
	return ejecutarConsulta($sql);
}
public function activar($idmueble){
	$sql="UPDATE mueble SET condicion='1' WHERE idmueble='$idmueble'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idmueble){
	$sql="SELECT * FROM mueble WHERE idmueble='$idmueble'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros 
public function listar(){
	$sql="SELECT mu.idmueble,mu.idcategoria,mu.nombre as categoria,mu.codigo, mu.nombre,mu.stock,mu.descripcion,mu.precio_venta,mu.imagen,mu.condicion FROM mueble mu INNER JOIN categoria c ON mu.idcategoria=c.idcategoria";
	return ejecutarConsulta($sql);
}
//listar registros activos
public function listarActivos(){
	$sql="SELECT mu.idmueble,mu.idcategoria,c.nombre as categoria,mu.codigo, mu.nombre,mu.stock,mu.descripcion,mu.precio_venta,mu.imagen,mu.condicion FROM mueble mu INNER JOIN categoria c ON mu.idcategoria=c.idcategoria WHERE mu.condicion='1'";
	return ejecutarConsulta($sql);
}

//implementar un metodo para listar los activos, su ultimo precio y el stock(vamos a unir con el ultimo registro de la tabla detalle_ingreso)
public function listarActivosVenta()
{
	$sql="SELECT mu.idmueble,mu.idcategoria,c.nombre as categoria,mu.codigo, mu.nombre,mu.stock,  mu.precio_venta, mu.descripcion,mu.imagen,mu.condicion FROM mueble mu INNER JOIN categoria c ON mu.idcategoria=c.idcategoria WHERE mu.condicion='1'AND mu.stock > 0";
	return ejecutarConsulta($sql);
}
}
 ?>
