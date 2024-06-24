<?php 
require_once "../Models/Compra.php";
if (strlen(session_id())<1) 
	session_start();

$compra=new Compra();

$idcompra=isset($_POST["idcompra"])? limpiarCadena($_POST["idcompra"]):"";
$idproveedor=isset($_POST["idproveedor"])? limpiarCadena($_POST["idproveedor"]):"";
$idusuario=$_SESSION["idusuario"];
$tipo_comprobante=isset($_POST["tipo_comprobante"])? limpiarCadena($_POST["tipo_comprobante"]):"";
$serie_comprobante=isset($_POST["serie_comprobante"])? limpiarCadena($_POST["serie_comprobante"]):"";
$num_comprobante=isset($_POST["num_comprobante"])? limpiarCadena($_POST["num_comprobante"]):"";
$fecha_hora=isset($_POST["fecha_hora"])? limpiarCadena($_POST["fecha_hora"]):"";
$impuesto=isset($_POST["impuesto"])? limpiarCadena($_POST["impuesto"]):"";
$total_compra=isset($_POST["total_compra"])? limpiarCadena($_POST["total_compra"]):"";


switch ($_GET["op"]) {
	case 'guardaryeditar':
	if (empty($idcompra)) {
		$rspta=$compra->insertar($idproveedor,$idusuario,$tipo_comprobante,$serie_comprobante,$num_comprobante,$fecha_hora,$impuesto,$total_compra,$_POST["idmaterial"],$_POST["cantidad"],$_POST["precio_compra"]);
		echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
	}else{
        
	}
		break;
	

	case 'anular':
		$rspta=$compra->anular($idcompra);
		echo $rspta ? " anulado correctamente" : "No se pudo anular el ingreso";
		break;
	
	case 'mostrar':
		$rspta=$compra->mostrar($idcompra);
		echo json_encode($rspta);
		break;

	case 'listarDetalle':
	require_once "../Models/Negocio.php";
  $cnegocio = new Negocio();
  $rsptan = $cnegocio->listar();
  $regn=$rsptan->fetch_object();
  if (empty($regn)) {
    $smoneda='Simbolo de moneda';
  }else{
    $smoneda=$regn->simbolo;
    $nom_imp=$regn->nombre_impuesto;
  };
		//recibimos el idmost_imp
		$id=$_GET['id'];
		$rspta=$compra->listarDetalle($id);
		$total=0;
		echo ' <thead style="background-color:#8B4513">
        <th>Material</th>
        <th>Cantidad</th>
        <th>Precio Compra</th>
        <th>Subtotal</th>
       </thead>';
		while ($reg=$rspta->fetch_object()) {
			echo '<tr class="filas">
			<td>'.$reg->nombre.'</td>
			<td>'.$reg->cantidad.'</td>
			<td>'.$reg->precio_compra.'</td>
			<td>'.$reg->precio_compra*$reg->cantidad.'</td>
			</tr>';
			$total=$total+($reg->precio_compra*$reg->cantidad);
			$t_compra=$reg->total_compra;
			$imp=$reg->impuesto;
			$most_igv=$t_compra-$total;
		}
		echo '<tfoot>
        <th><span>SubTotal</span><br><span id="valor_impuestoc">'.$nom_imp.' '.$imp.' %</span><br><span>TOTAL</span></th>
         <th></th>
         <th></th>
		 <th></th>
         <th><span id="total">'.$smoneda.' '.number_format((float)$total,2,'.','').'</span><br><span id="most_imp">'.$smoneda.' '.number_format((float)$most_igv,2,'.','').'</span><br><span id="most_total" maxlength="4">'.$smoneda.' '.$t_compra.'</span></th>
       </tfoot>';
		break;

    case 'listar':
		$rspta=$compra->listar();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>($reg->estado=='Aceptado')?'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idcompra.')"><i class="fa fa-eye"></i></button>'.' '.'<button class="btn btn-danger btn-xs" onclick="anular('.$reg->idcompra.')"><i class="fa fa-close"></i></button>':'<button class="btn btn-warning btn-xs" onclick="mostrar('.$reg->idcompra.')"><i class="fa fa-eye"></i></button>',
            "1"=>$reg->fecha,
            "2"=>$reg->proveedor,
            "3"=>$reg->usuario,
            "4"=>$reg->tipo_comprobante,
            "5"=>$reg->serie_comprobante. '-' .$reg->num_comprobante,
            "6"=>$reg->total_compra,
            "7"=>($reg->estado=='Aceptado')?'<span class="label bg-green">Aceptado</span>':'<span class="label bg-red">Anulado</span>'
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);
		break;

		case 'selectProveedor':
			require_once "../Models/Persona.php";
			$persona = new Persona();

			$rspta = $persona->listarp();
			echo '<option value="0">seleccione...</option>';

			while ($reg = $rspta->fetch_object()) {
				echo '<option value='.$reg->idpersona.'>'.$reg->nombre.'</option>';
			}
			break;

			case 'listarMateriales':
			require_once "../Models/Material.php";
			$material=new Material();

				$rspta=$material->listarActivos();
		$data=Array();

		while ($reg=$rspta->fetch_object()) {
			$data[]=array(
            "0"=>'<button class="btn btn-warning" onclick="agregarDetalle('.$reg->idmaterial.',\''.$reg->nombre.'\')"><span class="fa fa-plus"></span></button>',
            "1"=>$reg->nombre,
            "2"=>$reg->descripcion,
            
          
              );
		}
		$results=array(
             "sEcho"=>1,//info para datatables
             "iTotalRecords"=>count($data),//enviamos el total de registros al datatable
             "iTotalDisplayRecords"=>count($data),//enviamos el total de registros a visualizar
             "aaData"=>$data); 
		echo json_encode($results);

				break;
}
 ?>