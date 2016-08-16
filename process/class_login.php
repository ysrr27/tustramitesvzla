<?php
session_start();
header('Content-type: application/json; charset=utf-8');
include("../extras/conexion.php");
$link=Conectarse();
$aErrores=array();
$jsondata = array();

if((isset($_POST["emailLogin"]))&&($_POST["emailLogin"]!="")){ $emailLogin=strip_tags(htmlentities($_POST["emailLogin"])); } else {$aErrores[] = "Debe introducir el login";}
if((isset($_POST["passwordModal"]))&&($_POST["passwordModal"]!="")){ $passwordModal=md5(strip_tags(htmlentities($_POST["passwordModal"]))); } else {$aErrores[] = "El password no puede estar vacío";}
$ipcliente=getRealIP($_SERVER['REMOTE_ADDR']);
$fechacompleta=date('Y-m-d H:i:s');

if(count($aErrores)==0) { 

	//PARA VALIDAR SI EL USUARIO EXISTE EN LA BD
	$query = "SELECT * FROM  m_clientes WHERE m_cliente_email='".mysqli_real_escape_string($link, $emailLogin)."' AND m_cliente_password='".mysqli_real_escape_string($link, $passwordModal)."'";
	$resultado = mysqli_query($link, $query);
	$existe=mysqli_num_rows($resultado);

	if ($existe >0) {
		
		//SI EXISTE SACOS SUS DATOS Y CREO LAS VARIABLES DE SESION 
		$row=mysqli_fetch_array($resultado);
		$m_cliente_id=$row["m_cliente_id"];
		$m_cliente_nombre=$row["m_cliente_nombre"];
		$m_cliente_apellido=$row["m_cliente_apellido"];
		$m_cliente_email=$row["m_cliente_email"];
		$nombre_completo=utf8_encode($m_cliente_nombre." ".$m_cliente_apellido);

		ini_set('session.gc_maxlifetime',7200);   
		$_SESSION["tr4m1t3sVZLAFront3r4s"]= 'tr4m1t3sFront3r4sRY';
		$_SESSION['usuarioL0g3ad0FR']=$m_cliente_email;
		$_SESSION['nombreUSUcmpletoFR']=$nombre_completo;
		$_SESSION['nombreUSUFR']=$m_cliente_nombre;
		$_SESSION["1dusuar10FR"]=$m_cliente_id;

		
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Ingresando..."
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "Combinación Usuario/Password incorrecta"
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

function getRealIP()
{
	if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){$obtener=$_SERVER["HTTP_X_FORWARDED_FOR"];}else{$obtener="";}
	if($obtener != '')
	{
		$client_ip = 
		( !empty($_SERVER['REMOTE_ADDR']) ) ? 
		$_SERVER['REMOTE_ADDR'] 
		: 
		( ( !empty($_ENV['REMOTE_ADDR']) ) ? 
			$_ENV['REMOTE_ADDR'] 
			: 
			"unknown" );

		$entries = preg_split('/[, ]/', $_SERVER['HTTP_X_FORWARDED_FOR']);

		reset($entries);
		while (list(, $entry) = each($entries)) 
		{
			$entry = trim($entry);
			if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
			{
				$private_ip = array(
					'/^0\./', 
					'/^127\.0\.0\.1/', 
					'/^192\.168\..*/', 
					'/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/', 
					'/^10\..*/');

				$found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);

				if ($client_ip != $found_ip)
				{
					$client_ip = $found_ip;
					break;
				}
			}
		}
	}
	else
	{
		$client_ip = 
		( !empty($_SERVER['REMOTE_ADDR']) ) ? 
		$_SERVER['REMOTE_ADDR'] 
		: 
		( ( !empty($_ENV['REMOTE_ADDR']) ) ? 
			$_ENV['REMOTE_ADDR'] 
			: 
			"unknown" );
	}

	return $client_ip;

}
?>