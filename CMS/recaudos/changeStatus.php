<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

header('Content-type: application/json; charset=utf-8');

$aErrores=array();
$jsondata = array();

if((isset($_GET["idRecaudo"]))&&($_GET["idRecaudo"]!="")){ $idRecaudo=strip_tags(htmlentities(mysqli_real_escape_string($link, $_GET["idRecaudo"]))); } else {$idRecaudo=0;}
if((isset($_GET["nextStatus"]))&&($_GET["nextStatus"]!="")){ $nextStatus=strip_tags(htmlentities(mysqli_real_escape_string($link, $_GET["nextStatus"]))); } else {$nextStatus=0;}




if (!control_access("RECAUDOS", 'ELIMINAR')) { 
	$aErrores[]="USTED NO TIENE PERMISOS PARA REALIZAR ESTA ACCIÓN"; 
}


if(count($aErrores)==0) { 

	$query = "UPDATE m_recaudos SET m_recaudo_estatus='$nextStatus' WHERE m_recaudo_id='$idRecaudo' ";
	$resultado = mysqli_query($link, $query);
	if ($resultado) {

		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "El recaudo ha sido cambiada de estatus"
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "ERROR - Ocurrió un error al intentar cambiar el estatus de la categoría"
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