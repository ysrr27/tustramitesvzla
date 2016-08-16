<?php include('../logueo.php'); 
include('../extras/conexion.php');
$link=Conectarse();


header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();
if((isset($_POST["idServicio"]))&&($_POST["idServicio"]!="")){ $idServicio=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["idServicio"]))); }  else {$idServicio=0;}
if((isset($_POST["nameFinal"]))&&($_POST["nameFinal"]!="")){ $nombre=strip_tags(mysqli_real_escape_string($link, $_POST["nameFinal"])); } else {$aErrores[] = "Debe ingresar el nombre del destinatario";}
if((isset($_POST["lastnameFinal"]))&&($_POST["lastnameFinal"]!="")){ $lastnameFinal=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["lastnameFinal"]))); } else {$aErrores[] = "Debe ingresar el apellido del destinatario";}
if((isset($_POST["numberFinal"]))&&($_POST["numberFinal"]!="")){ $numberFinal=mysqli_real_escape_string($link, $_POST["numberFinal"]); } else {$aErrores[] = "Debe ingresar el número de teléfono";}
if((isset($_POST["mailFinal"]))&&($_POST["mailFinal"]!="")){ $mailFinal=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["mailFinal"]))); } else {$aErrores[] = "Debe ingresar un correo válido";}
if((isset($_POST["countryFinal"]))&&($_POST["countryFinal"]!="")){ $countryFinal=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["countryFinal"]))); } else {$aErrores[] = "Debe indicar el país de destino";}
if((isset($_POST["postalcodeFinal"]))&&($_POST["postalcodeFinal"]!="")){ $postalcodeFinal=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["postalcodeFinal"]))); } else {$aErrores[] = "Debe indicar el código postal";}
if((isset($_POST["addressFinal"]))&&($_POST["addressFinal"]!="")){ $addressFinal=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["addressFinal"]))); } else {$aErrores[] = "Debe introducir la dirección de destino";}
if((isset($_POST["idsFiles"]))&&($_POST["idsFiles"]!="")){ $idsFiles=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["idsFiles"]))); } else {$aErrores[] = "No se han adjuntado los recaudos BACK";}
if((isset($_POST["tipotelefono"]))&&($_POST["tipotelefono"]!="")){ $tipotelefono=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["tipotelefono"]))); } else {$aErrores[] = "error";}


$fechacompleta=date('Y-m-d H:i:s');

if ($idServicio==0) {
	$aErrores[] = "ERROR";
}



if(count($aErrores)==0) { 

	$query = "INSERT INTO m_solicitudes (m_solicitud_id, m_solicitud_idCliente, m_solicitud_idServicio, m_solicitud_nombreDestinatario, m_solicitud_apellidoDestinatario, m_solicitud_tipoTelefono, m_solicitud_telefonoDestinatario, m_solicitud_correoDestinatario, m_solicitud_paisDestinatario, m_solicitud_codigopostalDestinatario, m_solicitud_direccionDestinatario, m_solicitud_estatus_id, m_solicitud_fechaCreacion, m_solicitud_updated_at) VALUES (Null, '$idusuario', '$idServicio', '$nombre', '$lastnameFinal', '$tipotelefono', '$numberFinal', '$mailFinal', '$countryFinal', '$postalcodeFinal', '$addressFinal', '1', '$fechacompleta', '$fechacompleta')";
	$resultado = mysqli_query($link, $query);
	$lasid=mysqli_insert_id($link);

	$archivos = explode(",", $idsFiles);
	foreach ($archivos as $valor) {
		$SQLPDF="UPDATE r_clientes_recaudos SET r_cliente_recaudo_idSolicitud='$lasid' WHERE r_cliente_recaudo_id='$valor'";
		$queryPDF=mysqli_query($link, $SQLPDF);
	}
	if ($resultado) {

		//Envío la respuesta al Front para redirigir
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Solicitud generada correctamente..."
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "Ocurrió un error, por favor revisar los campos $query "
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