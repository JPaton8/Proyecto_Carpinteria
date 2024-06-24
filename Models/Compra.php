<?php 
//incluir la conexion de base de datos
require "../config/Conexion.php";
class Compra{
	//implementamos nuestro constructor
public function __construct(){

}

//metodo insertar registro
public function insertar($idproveedor,$idusuario,$tipo_comprobante,$serie_comprobante,$num_comprobante,$fecha_hora,$impuesto,$total_compra,$idmaterial,$cantidad,$precio_compra){
	$sql="INSERT INTO compra (idproveedor,idusuario,tipo_comprobante,serie_comprobante,num_comprobante,fecha_hora,impuesto,total_compra,estado) VALUES ('$idproveedor','$idusuario','$tipo_comprobante','$serie_comprobante','$num_comprobante','$fecha_hora','$impuesto','$total_compra','Aceptado')";
	//return ejecutarConsulta($sql);
	 $idcompranew=ejecutarConsulta_retornarID($sql);
	 $num_elementos=0;
	 $sw=true;
	 while ($num_elementos < count($idmaterial)) {
	 	$sql_detalle="INSERT INTO detalle_compra (idcompra,idmaterial,cantidad,precio_compra) VALUES('$idcompranew','$idmaterial[$num_elementos]','$cantidad[$num_elementos]','$precio_compra[$num_elementos]')";
	 	ejecutarConsulta($sql_detalle) or $sw=false;
	 	$num_elementos=$num_elementos+1;
	 }
	 return $sw;
} 

public function anular($idcompra){
	$sw=true; 
	$sql="UPDATE compra SET estado='Anulado' WHERE idcompra='$idcompra'";
 	ejecutarConsulta($sql);
 	$sql_detalle="UPDATE detalle_compra SET estado='0' WHERE idcompra='$idcompra'"; 	
 	ejecutarConsulta($sql_detalle) or $sw=false;
	 return $sw;
}

//metodo para mostrar registros
public function mostrar($idcompra){
	$sql="SELECT c.idcompra,DATE(c.fecha_hora) as fecha,c.idproveedor,p.nombre as proveedor,u.idusuario,u.nombre as usuario, c.tipo_comprobante,c.serie_comprobante,c.num_comprobante,c.total_compra,c.impuesto,c.estado FROM compra c INNER JOIN persona p ON c.idproveedor=p.idpersona INNER JOIN usuario u ON c.idusuario=u.idusuario WHERE idcompra='$idcompra'";
	return ejecutarConsultaSimpleFila($sql);
}

public function listarDetalle($idcompra){
	$sql="SELECT dc.idcompra,dc.idmaterial,m.nombre,dc.cantidad,dc.precio_compra,c.impuesto ,c.total_compra FROM detalle_compra dc INNER JOIN material m ON dc.idmaterial=m.idmaterial INNER JOIN compra c ON c.idcompra=dc.idcompra WHERE dc.idcompra='$idcompra'"; 
	return ejecutarConsulta($sql);
}

//listar registros
public function listar(){
	$sql="SELECT c.idcompra,DATE(c.fecha_hora) as fecha,c.idproveedor,p.nombre as proveedor,u.idusuario,u.nombre as usuario, c.tipo_comprobante,c.serie_comprobante,c.num_comprobante,c.total_compra,c.impuesto,c.estado FROM compra c INNER JOIN persona p ON c.idproveedor=p.idpersona INNER JOIN usuario u ON c.idusuario=u.idusuario ORDER BY c.idcompra DESC";
	return ejecutarConsulta($sql);
}

}

 ?>
