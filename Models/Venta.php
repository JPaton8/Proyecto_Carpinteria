<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Venta{


	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($idcliente,$idusuario,$tipo_comprobante,$serie_comprobante,$num_comprobante,$fecha_hora,$impuesto,$total_venta,$idmueble,$cantidad,$precio_venta,$descuento){
	$sql="INSERT INTO venta (idcliente,idusuario,tipo_comprobante,serie_comprobante,num_comprobante,fecha_hora,impuesto,total_venta,estado) VALUES ('$idcliente','$idusuario','$tipo_comprobante','$serie_comprobante','$num_comprobante','$fecha_hora','$impuesto','$total_venta','Aceptado')";
	//return ejecutarConsulta($sql);
	 $idventanew=ejecutarConsulta_retornarID($sql);
	 $num_elementos=0;
	 $sw=true;
	 while ($num_elementos < count($idmueble)) {

	 	$sql_detalle="INSERT INTO detalle_venta (idventa,idmueble,cantidad,precio_venta,descuento) VALUES('$idventanew','$idmueble[$num_elementos]','$cantidad[$num_elementos]','$precio_venta[$num_elementos]','$descuento[$num_elementos]')";

	 	ejecutarConsulta($sql_detalle) or $sw=false; 

	 	$num_elementos=$num_elementos+1;
	 }
	 return $sw;
}

public function anular($idventa){

	$sw=true; 
	$sql="UPDATE venta SET estado='Anulado' WHERE idventa='$idventa'";
 	ejecutarConsulta($sql);
 	$sql_detalle="UPDATE detalle_venta SET estado='0' WHERE idventa='$idventa'"; 	
 	ejecutarConsulta($sql_detalle) or $sw=false;

	 return $sw;

}


//implementar un metodopara mostrar los datos de unregistro a modificar
public function mostrar($idventa){
	$sql="SELECT v.idventa,DATE(v.fecha_hora) as fecha,v.idcliente,p.nombre as cliente,u.idusuario,u.nombre as usuario, v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.total_venta,v.impuesto,v.estado FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE idventa='$idventa'";
	return ejecutarConsultaSimpleFila($sql);
}

public function listarDetalle($idventa){
	$sql="SELECT dv.idventa,dv.idmueble,mu.nombre,dv.cantidad,dv.precio_venta,dv.descuento,(dv.cantidad*dv.precio_venta-dv.descuento) as subtotal, v.total_venta, v.impuesto FROM detalle_venta dv INNER JOIN mueble mu ON dv.idmueble=mu.idmueble INNER JOIN venta v ON v.idventa=dv.idventa WHERE dv.idventa='$idventa'"; 
	return ejecutarConsulta($sql);
}

//listar registros
public function listar(){
	$sql="SELECT v.idventa,DATE(v.fecha_hora) as fecha,v.idcliente,p.nombre as cliente,u.idusuario,u.nombre as usuario, v.tipo_comprobante,v.serie_comprobante,v.num_comprobante,v.total_venta,v.impuesto,v.estado FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario ORDER BY v.idventa DESC";
	return ejecutarConsulta($sql);
}


public function ventacabecera($idventa){
	$sql= "SELECT v.idventa, v.idcliente, p.nombre AS cliente, p.direccion, p.tipo_documento, p.num_documento, p.email, p.telefono, v.idusuario, u.nombre AS usuario, v.tipo_comprobante, v.serie_comprobante, v.num_comprobante, DATE(v.fecha_hora) AS fecha, v.impuesto, v.total_venta FROM venta v INNER JOIN persona p ON v.idcliente=p.idpersona INNER JOIN usuario u ON v.idusuario=u.idusuario WHERE v.idventa='$idventa'";
	return ejecutarConsulta($sql);
}

public function ventadetalles($idventa){
	$sql="SELECT mu.nombre AS mueble, mu.codigo, d.cantidad, d.precio_venta, d.descuento, (d.cantidad*d.precio_venta-d.descuento) AS subtotal FROM detalle_venta d INNER JOIN mueble mu ON d.idmueble=mu.idmueble WHERE d.idventa='$idventa'";
         return ejecutarConsulta($sql);
}

//funcion para selecciolnar el numero de factura
//funcion para selecciolnar el numero de factura
public function numero_venta($tipo_comprobante){ 
		 
	$sql="SELECT num_comprobante FROM venta WHERE tipo_comprobante='$tipo_comprobante' ORDER BY idventa DESC limit 1 ";
	 return ejecutarConsulta($sql);
  
}
//funcion para seleccionar la serie de la factura
public function numero_serie($tipo_comprobante){
 
	$sql="SELECT serie_comprobante ,num_comprobante FROM venta WHERE tipo_comprobante='$tipo_comprobante' ORDER BY idventa DESC limit 1";

return ejecutarConsulta($sql);
} 

}

 ?>
