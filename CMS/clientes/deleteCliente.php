<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();

if((isset($_GET["idCliente"]))&&($_GET["idCliente"]!="")){ $idCliente=strip_tags(htmlentities(mysqli_real_escape_string($link, $_GET["idCliente"]))); } else {$idCliente=0;}

if (!control_access("CLIENTES", 'ELIMINAR')) { 
	$aErrores[]="USTED NO TIENE PERMISOS PARA REALIZAR ESTA ACCIÓN"; 
}


if(count($aErrores)==0) { 

	$query = "UPDATE m_clientes SET m_cliente_estatus='0' WHERE m_cliente_id='$idCliente' ";
	$resultado = mysqli_query($link, $query);
	if ($resultado) {

		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "El Cliente ha sido borrado"
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "ERROR - Ocurrió un error al intentar borrar al cliente"
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