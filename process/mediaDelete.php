<?php include('../logueo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

header('Content-type: application/json; charset=utf-8');

$aErrores=array();
$jsondata = array();

if((isset($_GET["idRecaudo"]))&&($_GET["idRecaudo"]!="")){ $idRecaudo=strip_tags(htmlentities(mysqli_real_escape_string($link, $_GET["idRecaudo"]))); } else {$idRecaudo=0;}


if(count($aErrores)==0) { 

	$query = "DELETE FROM r_clientes_recaudos WHERE r_cliente_recaudo_id='$idRecaudo' ";
	$resultado = mysqli_query($link, $query);
	if ($resultado) {

		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "El archivo ha sido borrada"
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "ERROR - Ocurrió un error al intentar borrar el archivo"
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