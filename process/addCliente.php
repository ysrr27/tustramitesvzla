<?php 
include('../extras/conexion.php');
$link=Conectarse();
include("sendMail.php");
header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();

if((isset($_POST["nombre"]))&&($_POST["nombre"]!="")){ $nombre=strip_tags(mysqli_real_escape_string($link, $_POST["nombre"])); } else {$aErrores[] = "El campo nombre está vacío";}
if((isset($_POST["apellido"]))&&($_POST["apellido"]!="")){ $apellido=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["apellido"]))); } else {$aErrores[] = "El campo apellido NO puede estar vacío";}
if((isset($_POST["tipoDocumento"]))&&($_POST["tipoDocumento"]!="")){ $tipoDocumento=mysqli_real_escape_string($link, $_POST["tipoDocumento"]); } else {$aErrores[] = "Debe indicar el tipo de documento";}
if((isset($_POST["docIdentidad"]))&&($_POST["docIdentidad"]!="")){ $docIdentidad=mysqli_real_escape_string($link, $_POST["docIdentidad"]); } else {$aErrores[] = "Debe indicar el número de su documento de identidad";}
if((isset($_POST["tipoTelefono"]))&&($_POST["tipoTelefono"]!="")){ $tipoTelefono=mysqli_real_escape_string($link, $_POST["tipoTelefono"]); } else {$aErrores[] = "Debe indicar el tipo de teléfono";}
if((isset($_POST["numtelefonico"]))&&($_POST["numtelefonico"]!="")){ $numtelefonico=mysqli_real_escape_string($link, $_POST["numtelefonico"]); } else {$aErrores[] = "Debe indicar el tipo de teléfono";}
if((isset($_POST["correo"]))&&($_POST["correo"]!="")){ $correo=mysqli_real_escape_string($link, $_POST["correo"]); } else {$aErrores[] = "Debe indicar un email válido";}
if((isset($_POST["passwordcliente"]))&&($_POST["passwordcliente"]!="")){ $password=mysqli_real_escape_string($link, $_POST["passwordcliente"]); } else {$aErrores[] = "Debe indicar luna contraseña";}
if((isset($_POST["repassword"]))&&($_POST["repassword"]!="")){ $repassword=mysqli_real_escape_string($link, $_POST["repassword"]); } else {$aErrores[] = "Las contraseñas no coinciden";}
if((isset($_POST["country"]))&&($_POST["country"]!="")){ $country=mysqli_real_escape_string($link, $_POST["country"]); } else {$aErrores[] = "Debe indicar indicar el país";}
if((isset($_POST["direccion"]))&&($_POST["direccion"]!="")){ $direccion=mysqli_real_escape_string($link, $_POST["direccion"]); } else {$aErrores[] = "Debe indicar la dirección";}

if ($password!=$repassword) {
	$aErrores[] = "Las contraseñas NO coinciden";
}
$paswordEncriptado=md5($password);

if (filter_var($correo, FILTER_VALIDATE_EMAIL) === false) {
	$aErrores[] = "Debe indicar un correo válido";
} 

$fechacompleta=date('Y-m-d H:i:s');

$hash = substr(MD5(rand(5, 100)), 0, 18);

//VALIDACIONES

$SQLVal="SELECT m_cliente_documentoIdentidad, m_cliente_email FROM m_clientes WHERE m_cliente_documentoIdentidad='$docIdentidad' OR m_cliente_email='$correo'";
$queryVal=mysqli_query($link, $SQLVal);
$total=mysqli_num_rows($queryVal);

if ($total >0) {
	$aErrores[] = "Este usuario ya se encuentra registrado";
}



if(count($aErrores)==0) { 

	$query = "INSERT INTO m_clientes (m_cliente_id, m_cliente_nombre, m_cliente_apellido, m_cliente_tipoDocumento, m_cliente_documentoIdentidad, m_cliente_tipoTelefono, m_cliente_numeroTelefono, m_cliente_email, m_cliente_password, m_cliente_pais, m_cliente_direccion, m_cliente_created_at, m_cliente_updated_at, m_cliente_estatus, m_cliente_hash) 
	VALUES (Null, '$nombre', '$apellido', '$tipoDocumento', '$docIdentidad', '$tipoTelefono', '$numtelefonico', '$correo', '$paswordEncriptado', '$country', '$direccion', '$fechacompleta', '$fechacompleta', '0', '$hash')";
	$resultado = mysqli_query($link, $query);
	$lasid=mysqli_insert_id($link);

	if ($resultado) {


		//Envío la respuesta al Front para redirigir
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Ha sido registrado exitosamente,  en pocos minutos le esviaremos un correo a la dirección ($correo) para que confirme su registro!"
			);

		$nombreMail=$nombre." ".$apellido;
		sendMail($correo, $nombreMail , $hash);
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