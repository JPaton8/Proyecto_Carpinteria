<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Material{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar regiustro
public function insertar($nombre,$descripcion){
	$sql="INSERT INTO material (nombre,descripcion,estado)
	 VALUES ('$nombre','$descripcion','1')";
	return ejecutarConsulta($sql);
}

public function editar($idmaterial, $nombre, $descripcion){
	$sql = "UPDATE material SET nombre='$nombre', descripcion='$descripcion' 
	        WHERE idmaterial='$idmaterial'";
	return ejecutarConsulta($sql);
}

public function desactivar($idmaterial){
	$sql="UPDATE material SET estado='0' WHERE idmaterial='$idmaterial'";
	return ejecutarConsulta($sql);
}
public function activar($idmaterial){
	$sql="UPDATE material SET estado='1' WHERE idmaterial='$idmaterial'";
	return ejecutarConsulta($sql);
}

//metodo para mostrar registros
public function mostrar($idmaterial){
	$sql="SELECT * FROM material WHERE idmaterial='$idmaterial'";
	return ejecutarConsultaSimpleFila($sql);
}

//listar registros 
public function listarMateriales(){
    $sql = "SELECT m.idmaterial, m.nombre, m.descripcion, m.estado FROM material m";
    return ejecutarConsulta($sql);
}


//listar registros activos
public function listarActivos(){
    $sql = "SELECT m.idmaterial, m.nombre, m.descripcion, m.estado FROM material m WHERE m.estado = '1'";
    return ejecutarConsulta($sql);
}


public function listarActivosVentaMaterial(){
    $sql = "SELECT m.id, m.nombre, m.descripcion, m.estado
            FROM material m
            WHERE m.estado = 1";
    return ejecutarConsulta($sql);
}
}

 ?>
