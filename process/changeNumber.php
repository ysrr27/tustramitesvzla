<?php include('../logueo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();


if((isset($_POST["numtelefonico"]))&&($_POST["numtelefonico"]!="")){ $numtelefonico=mysqli_real_escape_string($link, $_POST["numtelefonico"]); } else {$aErrores[] = "Debe introducir su número actual";}


if(count($aErrores)==0) { 

	$query = "UPDATE m_clientes SET m_cliente_numeroTelefono='$numtelefonico' WHERE m_cliente_id='$idusuario' ";
	$resultado = mysqli_query($link, $query);
	if ($resultado) {

		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Su número telefónico ha sido actualizado"
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "ERROR - Ocurrió un error al intentar actualizar su número telefónico"
			);
	}

	echo json_encode($jsondata, JSON_FORCE_OBJECT);

}
else{ 
	$jsondata["success"] = false;
	$jsondata["data"] = array(
		'message' => $aErroresHas
		);

	echo json_encode($jsondata, JSON_FORCE_OBJECT);

}

?>