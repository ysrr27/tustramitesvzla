<?php ini_set('session.gc_maxlifetime',7200);
ini_set("session.cache_expire",120);
session_start();
if (isset($_SESSION["tr4m1t3sVZLAFront3r4s"])){$variable=$_SESSION["tr4m1t3sVZLAFront3r4s"];}else{$variable="";}
header('Content-Type: text/html; charset=UTF-8');
$urlphpserver= curPageURL();

$aux_server=explode("/",$urlphpserver);
$serveractual=$aux_server[0]."//".$aux_server[2]."/".$aux_server[3]."/".$aux_server[4];

function curPageURL() {
	$pageURL = 'http';
// if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}


if ($variable != ''){
	$loginusuario=$_SESSION['usuarioL0g3ad0FR'];
	$nombre_completo=$_SESSION['nombreUSUcmpletoFR'];
	$idusuario=$_SESSION['1dusuar10FR'];
	$usuNombre=$_SESSION["nombreUSUFR"];
}


?>