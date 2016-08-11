<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

header('Content-type: application/json; charset=utf-8');

$aErrores=array();
$jsondata = array();

if((isset($_GET["idCategoryidCategory"]))&&($_GET["idCategory"]!="")){ $idCategory=strip_tags(htmlentities(mysqli_real_escape_string($link, $_GET["idCategory"]))); } else {$idCategory=0;}

if (!control_access("CATEGORIAS", 'ELIMINAR')) { 
	$aErrores[]="USTED NO TIENE PERMISOS PARA REALIZAR ESTA ACCIÓN"; 
	echo "<script language='JavaScript'>document.location.href='../index.php';</script>";
}


if(count($aErrores)==0) { 

	$query = "UPDATE m_clientes SET m_cliente_estatus='0' WHERE m_cliente_id='$idCliente' ";
	$resultado = mysqli_query($link, $query);
	if ($resultado) {

		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "La categoría ha sido borrada"
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "ERROR - Ocurrió un error al intentar borrar la categoría"
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