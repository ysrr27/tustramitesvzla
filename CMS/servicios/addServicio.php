<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

if (!control_access("SERVICIOS", 'AGREGAR')) { $aErrores[] = "USTED NO TIENE PERSIMO PARA REALIZAR ESTA ACCION";  echo "<script language='JavaScript'>document.location.href='../index.php';</script>"; }


header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();

if((isset($_POST["tituloServicio"]))&&($_POST["tituloServicio"]!="")){ $tituloServicio=strip_tags(mysqli_real_escape_string($link, $_POST["tituloServicio"])); } else {$aErrores[] = "El nombre del servicio no puede estar vacío";}
if((isset($_POST["iconoServicio"]))&&($_POST["iconoServicio"]!="")){ $iconoServicio=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["iconoServicio"]))); } else {$aErrores[] = "Debe especificar el ícono para identificar el servicio";}
if((isset($_POST["descripcion"]))&&($_POST["descripcion"]!="")){ $descripcion=mysqli_real_escape_string($link, $_POST["descripcion"]); } else {$aErrores[] = "La descripción del servicio no puede estar vacía";}
if((isset($_POST["estatus"]))&&($_POST["estatus"]!="")){ $activo=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["estatus"]))); }  else {$activo=0;}

$fechacompleta=date('Y-m-d H:i:s');


if(count($aErrores)==0) { 

	$query = "INSERT INTO m_servicios (m_servicio_id, m_servicio_nombre, m_servicio_descripcion, m_servicio_icono, m_servicio_estatus, m_servicio_created_at, m_servicio_updated_at) VALUES (Null, '$tituloServicio', '$descripcion', '$iconoServicio', '$activo', '$fechacompleta', '$fechacompleta')";
	$resultado = mysqli_query($link, $query);
	$lasid=mysqli_insert_id($link);

	foreach ($_POST['recaudos'] as $recaudoID)
	{
		$SQlRecuados="INSERT INTO r_recaudos_servicios (r_recaudos_servicio_id, r_recaudos_servicios_idServicio, r_recaudos_servicio_idRecaudo) VALUE (Null, '$lasid', '$recaudoID')";
		$resultadoRecaudos = mysqli_query($link, $SQlRecuados);
	}


	if ($resultado) {

		//Envío la respuesta al Front para redirigir
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Servicio registrado exitosamente... $rec"
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