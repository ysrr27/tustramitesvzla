<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

header('Content-type: application/json; charset=utf-8');

$aErrores=array();
$jsondata = array();

if((isset($_GET["idServicio"]))&&($_GET["idServicio"]!="")){ $idServicio=strip_tags(htmlentities(mysqli_real_escape_string($link, $_GET["idServicio"]))); } else {$idServicio=0;}

if (!control_access("SERVICIOS", 'ELIMINAR')) { 
	$aErrores[]="USTED NO TIENE PERMISOS PARA REALIZAR ESTA ACCIÓN"; 
}


//NO SE PERMITE BORRAR OFERTAS CON VENTAS YA REGISTRADAS PORQUE COMPROMETE LA INTEGRIDAD DE LA BD
$SQLcheck="SELECT m_solicitud_id FROM m_solicitudes WHERE m_solicitud_idServicio='$idServicio'";
$queryCheck=mysqli_query($link, $SQLcheck);
$numero=mysqli_num_rows($queryCheck);
if ($numero > 0) {
	$aErrores[]="No se puede borrar un servicio que ya posee solicitudes registradas";
}

if(count($aErrores)==0) { 

	//PARA EVITAR ERRORES POR LA CLAVE FORANEA, NO SE PUEDE BORRAR UN SERVICIO SIN ANTES BORRAR SUS RECAUDOS EN LA TABLA PUENTE
	$DeleteSqlRec="DELETE FROM r_recaudos_servicios WHERE r_recaudos_servicios_idServicio='$idServicio'";
	$resRec = mysqli_query($link, $DeleteSqlRec);


	$query = "DELETE FROM m_servicios  WHERE m_servicio_id='$idServicio' ";
	$resultado = mysqli_query($link, $query);
	if ($resultado) {

		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "El servicio ha sido eliminado"
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "ERROR - Ocurrió un error al intentar borrar el servicio"
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
