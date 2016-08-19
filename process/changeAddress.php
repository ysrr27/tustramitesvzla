<?php include('../logueo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();


if((isset($_POST["newaddres"]))&&($_POST["newaddres"]!="")){ $newaddres=mysqli_real_escape_string($link, $_POST["newaddres"]); } else {$aErrores[] = "Debe introducir su dirección";}


if(count($aErrores)==0) { 

	$query = "UPDATE m_clientes SET m_cliente_direccion='$newaddres' WHERE m_cliente_id='$idusuario' ";
	$resultado = mysqli_query($link, $query);
	if ($resultado) {

		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Su dirección ha sido actualizada"
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "ERROR - Ocurrió un error al intentar actualizar su dirección"
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