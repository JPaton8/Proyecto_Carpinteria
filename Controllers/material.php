<?php
require_once "../Models/Material.php";

$material = new Material();
$idmaterial = isset($_POST["idmaterial"]) ? limpiarCadena($_POST["idmaterial"]) : "";
$nombre = isset($_POST["nombre"]) ? limpiarCadena($_POST["nombre"]) : "";
$descripcion = isset($_POST["descripcion"]) ? limpiarCadena($_POST["descripcion"]) : "";

switch ($_GET["op"]) {
    case 'guardaryeditar':
        if (empty($idmaterial)) {
            $rspta = $material->insertar($nombre, $descripcion);
            echo $rspta ? "Datos registrados correctamente" : "No se pudo registrar los datos";
        } else {
            $rspta = $material->editar($idmaterial, $nombre, $descripcion);
            echo $rspta ? "Datos actualizados correctamente" : "No se pudo actualizar los datos";
        }
        break;

    case 'desactivar':
        $rspta = $material->desactivar($idmaterial);
        echo $rspta ? "Datos desactivados correctamente" : "No se pudo desactivar los datos";
        break;
        
    case 'activar':
        $rspta = $material->activar($idmaterial);
        echo $rspta ? "Datos activados correctamente" : "No se pudo activar los datos";
        break;

    case 'mostrar':
        $rspta = $material->mostrar($idmaterial);
        echo json_encode($rspta);
        break;

    case 'listar':
        $rspta = $material->listarMateriales();
        $data = Array();

        while ($reg = $rspta->fetch_object()) {
            $data[] = array(
                "0" => ($reg->estado) ? '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->idmaterial . ')"><i class="fa fa-pencil"></i></button>' . ' ' . '<button class="btn btn-danger btn-xs" onclick="desactivar(' . $reg->idmaterial . ')"><i class="fa fa-close"></i></button>' : '<button class="btn btn-warning btn-xs" onclick="mostrar(' . $reg->idmaterial . ')"><i class="fa fa-pencil"></i></button>' . ' ' . '<button class="btn btn-primary btn-xs" onclick="activar(' . $reg->idmaterial . ')"><i class="fa fa-check"></i></button>',
                "1" => $reg->nombre,
                "2" => $reg->descripcion,
                "3" => ($reg->estado) ? '<span class="label bg-green">Activado</span>' : '<span class="label bg-red">Desactivado</span>'
            );
        }
        $results = array(
            "sEcho" => 1, //info para datatables
            "iTotalRecords" => count($data), //enviamos el total de registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total de registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case 'selectMaterial':
        $rspta = $material->listarActivosMaterial();
        echo '<option value="0">Seleccione...</option>';
        while ($reg = $rspta->fetch_object()) {
            echo '<option value=' . $reg->idmaterial . '>' . $reg->nombre . '</option>';
        }
        break;
}
?>
