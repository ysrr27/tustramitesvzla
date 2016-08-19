<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();
$fechacompleta=date('Y-m-d H:i:s');
if((isset($_GET["idSolicitud"]))&&($_GET["idSolicitud"]!="")){ $idSolicitud=strip_tags(htmlentities(mysqli_real_escape_string($link, $_GET["idSolicitud"]))); } else {$idSolicitud=0;}
$fechacompleta=date('Y-m-d H:i:s');
if (!control_access("SOLICITUDES", 'EDITAR')) { 
	$aErrores[]="USTED NO TIENE PERMISOS PARA REALIZAR ESTA ACCIÓN"; 
}


if(count($aErrores)==0) { 

	$query = "INSERT r_pagos_solicitudes (r_pago_solicitud_id, r_pago_solicitud_idSolicitud, r_pago_solicitud_fecha) VALUES (Null, '$idSolicitud', '$fechacompleta')";
	$resultado = mysqli_query($link, $query);
	if ($resultado) {

		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Pago registrado Exitosamente"
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