<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

if (!control_access("RECAUDOS", 'AGREGAR')) { $aErrores[] = "USTED NO TIENE PERSIMO PARA REALIZAR ESTA ACCION";  echo "<script language='JavaScript'>document.location.href='../index.php';</script>"; }


header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();

if((isset($_POST["nombrerecaudo"]))&&($_POST["nombrerecaudo"]!="")){ $nombrerecaudo=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["nombrerecaudo"]))); } else {$aErrores[] = "Debe especificar el nombre de la categoría";}
if((isset($_POST["descripcion"]))&&($_POST["descripcion"]!="")){ $descripcion=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["descripcion"]))); } else {$aErrores[] = "Debe especificar la descripciónd de la categoría";}
if((isset($_POST["estatus"]))&&($_POST["estatus"]!="")){ $activo=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["estatus"]))); }  else {$activo=0;}
if((isset($_POST["idRecaudo"]))&&($_POST["idRecaudo"]!="")){ $idRecaudo=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["idRecaudo"]))); } else {$aErrores[] = "NO SE HA ESPECIFICADO UN ID";}



$fechacompleta=date('Y-m-d H:i:s');


if(count($aErrores)==0) { 

	$query = "UPDATE m_recaudos  SET m_recaudo_nombre='$nombrerecaudo', m_recaudo_descripcion='$descripcion' , m_recaudo_estatus='$activo' WHERE m_recaudo_id='$idRecaudo'";
	$resultado = mysqli_query($link, $query);

	if ($resultado) {

		//Envío la respuesta al Front para redirigir
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Recaudo actualizado exitosamente..."
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "Ocurrió un error, por favor revisar los campos " 
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

