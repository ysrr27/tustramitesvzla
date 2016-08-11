<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();

if((isset($_GET["idVenta"]))&&($_GET["idVenta"]!="")){ $idVenta=strip_tags(htmlentities(mysqli_real_escape_string($link, $_GET["idVenta"]))); } else {$idVenta=0;}
if((isset($_GET["estatusNew"]))&&($_GET["estatusNew"]!="")){ $estatusNew=strip_tags(htmlentities(mysqli_real_escape_string($link, $_GET["estatusNew"]))); } else {$estatusNew="P";}
$fechacompleta=date('Y-m-d H:i:s');
if (!control_access("VENTAS", 'EDITAR')) { 
	$aErrores[]="USTED NO TIENE PERMISOS PARA REALIZAR ESTA ACCIÓN"; 
}


if(count($aErrores)==0) { 

	$query = "UPDATE m_ventas SET m_venta_estatus='$estatusNew', m_venta_fechaAprobado='$fechacompleta', m_venta_usuarioAprobado='$idusuario' WHERE m_venta_id='$idVenta' ";
	$resultado = mysqli_query($link, $query);
	if ($resultado) {

		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Venta Actualizada Correctamente"
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "ERROR - Ocurrió un error al intentar realizar la acción"
			);
	}

	echo json_encode($jsondata, JSON_FORCE_OBJECT);

}
else{ 
	$jsondata["success"] = false;
	$jsondata["data"] = array(
		'message' => $aErrores
		);

	echo json_encode($jsondata, JSON_FORCE_OBJECT);

}

?>