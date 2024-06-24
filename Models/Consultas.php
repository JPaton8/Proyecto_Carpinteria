<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Consultas{


	//implementamos nuestro constructor
public function __construct(){

}

//listar registros
public function comprasfecha($fecha_inicio,$fecha_fin){
	$sql="SELECT DATE(c.fecha_hora) as fecha, u.nombre as usuario, p.nombre as proveedor, c.tipo_comprobante, c.serie_comprobante, c.num_comprobante, c.total_compra,c.impuesto,c.estado FROM compra c INNER JOIN persona p ON c.idproveedor=p.idpersona INNER JOIN usuario u ON c.idusuario=u.idusuario WHERE DATE(c.fecha_hora)>='$fecha_inicio' AND DATE(c.fecha_hora)<='$fecha_fin'";
	return ejecutarConsulta($sql);
}


public function ventasfechacliente($fecha_inicio,$fecha_fin,$idcliente){
	$sql="SELECT DATE(v.fecha_hora) as fecha, u.nombre as usuario, p.nombre as cliente, v.tipo_comprobante,v.serie_comprobante, v.num_comprobante , v.total_venta, v.impuesto, v.estado FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE DATE(v.fecha_hora)>='$fecha_inicio' AND DATE(v.fecha_hora)<='$fecha_fin' AND v.idcliente='$idcliente'";
	return ejecutarConsulta($sql);
}

public function totalcomprahoy(){  
	$sql="SELECT IFNULL(SUM(total_compra),0) as total_compra FROM compra WHERE DATE(fecha_hora)=curdate()";
	return ejecutarConsulta($sql);
}

public function totalventahoy(){
	$sql="SELECT IFNULL(SUM(total_venta),0) as total_venta FROM venta WHERE DATE(fecha_hora)=curdate()";
	return ejecutarConsulta($sql);
}

public function comprasultimos_10dias(){
	$sql=" SELECT CONCAT(DAY(fecha_hora),'-',MONTH(fecha_hora)) AS fecha, SUM(total_compra) AS total FROM compra GROUP BY fecha_hora ORDER BY fecha_hora DESC LIMIT 0,10";
	return ejecutarConsulta($sql);
}

public function ventasultimos_12meses(){
	$sql=" SELECT DATE_FORMAT(fecha_hora,'%M') AS fecha, SUM(total_venta) AS total FROM venta GROUP BY MONTH(fecha_hora) ORDER BY fecha_hora DESC LIMIT 0,12";
	return ejecutarConsulta($sql);
}

public function cantidadclientes(){
	$sql="SELECT COUNT(*) totalc FROM persona WHERE tipo_persona='Cliente'";
	return ejecutarConsulta($sql);
}

public function cantidadproveedores(){
	$sql="SELECT COUNT(*) totalp FROM persona WHERE tipo_persona='Proveedor'";
	return ejecutarConsulta($sql);
}

public function cantidadmuebles(){
	$sql="SELECT COUNT(*) totalar FROM mueble WHERE condicion=1";
	return ejecutarConsulta($sql);
}
public function totalstock(){
	$sql="SELECT SUM(stock) AS totalstock FROM mueble";
	return ejecutarConsulta($sql);
}

public function cantidadcategorias(){
	$sql="SELECT COUNT(*) totalca FROM categoria WHERE condicion=1";
	return ejecutarConsulta($sql);
}

}

 ?>
