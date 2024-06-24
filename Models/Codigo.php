<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Codigo{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($nombre,$codigo,$fecha_ini,$fecha_fin){
	$sql="INSERT INTO cod_autorizacion (nombre,codigo,fecha_ini,fecha_fin) VALUES ('$nombre','$codigo','$fecha_ini','$fecha_fin')";
	return ejecutarConsulta($sql);
}

public function editar($nombre,$codigo,$fecha_ini,$fecha_fin){
	$sql="UPDATE cod_autorizacion SET nombre='$nombre',codigo='$codigo',fecha_ini='$fecha_ini',fecha_fin='$fecha_fin' 
	WHERE idcodigo='$idcodigo'";
	return ejecutarConsulta($sql);
}


//metodo para mostrar registros
public function mostrar($idcategoria){
	$sql="SELECT * FROM cod_autorizacion WHERE idcodigo='$idcodigo'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros
public function listar(){
	$sql="SELECT * FROM cod_autorizacion";
	return ejecutarConsulta($sql);
}
//listar y mostrar en selct
public function select(){
	$sql="SELECT * FROM cod_autorizacion WHERE idcodigo='$idcodigo'";
	return ejecutarConsulta($sql);
}
}

 ?>
