<?php include('../logueo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();


if((isset($_POST["claveactual"]))&&($_POST["claveactual"]!="")){ $claveactual=md5(mysqli_real_escape_string($link, $_POST["claveactual"])); } else {$aErrores[] = "Debe especificar su clave actual";}
if((isset($_POST["newpassword"]))&&($_POST["newpassword"]!="")){ $clavenueva=md5(htmlentities(mysqli_real_escape_string($link, $_POST["newpassword"]))); } else {$aErrores[] = "Su clave no puede estar vacía";}
if((isset($_POST["repasswordnew"]))&&($_POST["repasswordnew"]!="")){ $repiteclave=md5(htmlentities(mysqli_real_escape_string($link, $_POST["repasswordnew"]))); } else {$aErrores[] = "Debe repetir su clave nueva";}



if ($clavenueva!=$repiteclave) {
	$aErrores[] = "Su clave nueva no coincide";
}

$SQLActual="SELECT m_cliente_password FROM m_clientes WHERE m_cliente_id='$idusuario'";
$queryActual=mysqli_query($link, $SQLActual);
$rowActual=mysqli_fetch_array($queryActual);
$m_cliente_password=$rowActual["m_cliente_password"];


if ($m_cliente_password!=$claveactual) {
	$aErrores[] = "Su clave Actual es incorrecta";
}


if(count($aErrores)==0) { 

	$query = "UPDATE m_clientes SET m_cliente_password='$clavenueva' WHERE m_cliente_id='$idusuario' ";
	$resultado = mysqli_query($link, $query);
	if ($resultado) {

		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Su clave ha sido cambiada"
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "ERROR - Ocurrió un error al intentar actualizar su clave"
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