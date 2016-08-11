<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

if (!control_access("RECAUDOS", 'AGREGAR')) { $aErrores[] = "USTED NO TIENE PERSIMO PARA REALIZAR ESTA ACCION";  }


header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();




if((isset($_POST["nombreRecaudo"]))&&($_POST["nombreRecaudo"]!="")){ $nombreRecaudo=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["nombreRecaudo"]))); } else {$aErrores[] = "Debe especificar el nombre del recaudo";}
if((isset($_POST["descripcion"]))&&($_POST["descripcion"]!="")){ $descripcion=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["descripcion"]))); } else {$aErrores[] = "Debe especificar la descripciónd";}
if((isset($_POST["estatus"]))&&($_POST["estatus"]!="")){ $activo=mysqli_real_escape_string($link, $_POST["estatus"]); }  else {$activo=0;}

$fechacompleta=date('Y-m-d H:i:s');


if(count($aErrores)==0) { 

	$query = "INSERT INTO m_recaudos (m_recaudo_id, m_recaudo_nombre, m_recaudo_descripcion, m_recaudo_estatus) VALUES (Null, '$nombreRecaudo', '$descripcion', '$activo')";
	$resultado = mysqli_query($link, $query);
	$lastshit=mysqli_insert_id($link);

	if ($resultado) {

		//Envío la respuesta al Front para redirigir
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Categoría registrada exitosamente... "
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "$query"
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

