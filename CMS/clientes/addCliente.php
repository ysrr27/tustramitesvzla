<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

if (!control_access("CLIENTES", 'AGREGAR')) { $aErrores[] = "USTED NO TIENE PERSIMO PARA REALIZAR ESTA ACCION";}


header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();

if((isset($_POST["razonSocial"]))&&($_POST["razonSocial"]!="")){ $razonSocial=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["razonSocial"]))); } else {$aErrores[] = "La Razón social no puede estar vacía";}
if((isset($_POST["rifCliente"]))&&($_POST["rifCliente"]!="")){ $rifCliente=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["rifCliente"]))); } else {$aErrores[] = "Debe especificar el RIF";}
if((isset($_POST["emailCliente"]))&&($_POST["emailCliente"]!="")){ $emailCliente=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["emailCliente"]))); } else {$aErrores[] = "Es obligatoria colocar un email";}
if((isset($_POST["telefonoCliente"]))&&($_POST["telefonoCliente"]!="")){ $telefonoCliente=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["telefonoCliente"]))); } else {$aErrores[] = "Debe introducir un número de teléfono";}
if((isset($_POST["nombreContacto"]))&&($_POST["nombreContacto"]!="")){ $nombreContacto=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["nombreContacto"]))); } else {$aErrores[] = "Debe indicar un nombre de contacto";}
if((isset($_POST["telefonoContacto"]))&&($_POST["telefonoContacto"]!="")){ $telefonoContacto=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["telefonoContacto"]))); } else {$aErrores[] = "Debe introducir el número de teléfono del cantacto";}
if((isset($_POST["passwordContacto"]))&&($_POST["passwordContacto"]!="")){ $passwordCliente=md5(strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["passwordContacto"])))); } else {$aErrores[] = "Debe introducir un password";}
if((isset($_POST["estatus"]))&&($_POST["estatus"]!="")){ $activo=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["estatus"]))); }  else {$activo=0;}
if((isset($_POST["verificacion"]))&&($_POST["verificacion"]!="")){ $verificacion=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["verificacion"]))); } else {$verificacion=0;}
$fechacompleta=date('Y-m-d H:i:s');



//PARA VALIDAR SI EL USUARIO EXISTE EN LA BD CONSULTO SI YA EL RIF EXISTE
	$queryVal = "SELECT m_cliente_id FROM  m_clientes WHERE m_cliente_rif='".mysqli_real_escape_string($link, $rifCliente)."'";
	$resultadoVal = mysqli_query($link, $queryVal);
	$existe=mysqli_num_rows($resultadoVal);
	if ($existe >0) {
		$aErrores[] ="Ya Existe un cliente registrado con este RIF";
	}

	//PARA VALIDAR SI EL LOGIN EXISTE EN LA BD CONSULTO SI YA EL RIF EXISTE
	$queryValLogin = "SELECT m_cliente_id FROM  m_clientes WHERE m_cliente_mail='".mysqli_real_escape_string($link, $emailCliente)."'";
	$resultadoValLogin = mysqli_query($link, $queryValLogin);
	$existeLogin=mysqli_num_rows($resultadoValLogin);
	if ($existeLogin >0) {
		$aErrores[] ="Este email ya se encuentra registrado";
	}



if(count($aErrores)==0) { 

	$query = "INSERT INTO m_clientes (m_cliente_id, m_cliente_razonSocial, m_cliente_rif, m_cliente_mail, m_cliente_telefono, m_cliente_nombreContacto, m_cliente_telefonoContacto, m_cliente_login, m_cliente_password, m_cliente_estatus, m_cliente_verificado,  m_cliente_fecharegistro) VALUES (Null, '$razonSocial', '$rifCliente', '$emailCliente', '$telefonoCliente', '$nombreContacto', '$telefonoContacto', '$loginCliente', '$passwordCliente', '$activo', '$verificacion', '$fechacompleta')";
	$resultado = mysqli_query($link, $query);

	if ($resultado) {

		//Envío la respuesta al Front para redirigir
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Cliente registrado exitosamente..."
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