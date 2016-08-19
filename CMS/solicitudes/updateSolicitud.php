<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();
$fechacompleta=date('Y-m-d H:i:s');


if((isset($_POST["idSolicitud"]))&&($_POST["idSolicitud"]!="")){ $idSolicitud=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["idSolicitud"]))); }  else {$aErrores[]="NO SE HA RECIBIDO EL ID DE LA SOLICITUD"; }
if((isset($_POST["estatus"]))&&($_POST["estatus"]!="")){ $idEstatus=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["estatus"]))); }  else { $aErrores[]="NO SE HA RECIBIDO EL ID DEL ESTATUS"; }




$fechacompleta=date('Y-m-d H:i:s');


if (!control_access("SOLICITUDES", 'EDITAR')) { 
	$aErrores[]="USTED NO TIENE PERMISOS PARA REALIZAR ESTA ACCIÓN"; 
}


if(count($aErrores)==0) { 

	$query = "UPDATE m_solicitudes SET  m_solicitud_estatus_id='$idEstatus', m_solicitud_updated_at='$fechacompleta' WHERE m_solicitud_id='$idSolicitud='";
	$resultado = mysqli_query($link, $query);
	if ($resultado) {

		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Solicitud Actualizada Exitosamente"
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