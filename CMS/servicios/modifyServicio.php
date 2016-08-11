<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

if (!control_access("OFERTAS", 'EDITAR')) { $aErrores[] = "USTED NO TIENE PERSIMO PARA REALIZAR ESTA ACCION"; }


header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();

if((isset($_POST["tituloServicio"]))&&($_POST["tituloServicio"]!="")){ $tituloServicio=strip_tags(mysqli_real_escape_string($link, $_POST["tituloServicio"])); } else {$aErrores[] = "El nombre del servicio no puede estar vacío";}
if((isset($_POST["iconoServicio"]))&&($_POST["iconoServicio"]!="")){ $iconoServicio=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["iconoServicio"]))); } else {$aErrores[] = "Debe especificar el ícono para identificar el servicio";}
if((isset($_POST["descripcion"]))&&($_POST["descripcion"]!="")){ $descripcion=mysqli_real_escape_string($link, $_POST["descripcion"]); } else {$aErrores[] = "La descripción del servicio no puede estar vacía";}
if((isset($_POST["estatus"]))&&($_POST["estatus"]!="")){ $activo=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["estatus"]))); }  else {$activo=0;}

$fechacompleta=date('Y-m-d H:i:s');

if(count($aErrores)==0) { 

	$query = "UPDATE m_servicios SET m_servicio_nombre='$tituloServicio',  m_servicio_descripcion='$descripcion',  m_servicio_icono='$iconoServicio', m_oferta_descripcion='$descripcion', m_servicio_estatus= '$activo', m_servicio_updated_at='$fechacompleta' WHERE m_servicio_id='$idOferta'";
	$resultado = mysqli_query($link, $query);
	
	if ($resultado) {

		//Envío la respuesta al Front para redirigir
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Servicio registrada exitosamente..."
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "Ocurrió un error, por favor revisar los campos"
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