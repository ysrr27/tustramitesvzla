<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

header('Content-type: application/json; charset=utf-8');

$aErrores=array();
$jsondata = array();

if((isset($_GET["idProducto"]))&&($_GET["idProducto"]!="")){ $idProducto=strip_tags(htmlentities(mysqli_real_escape_string($link, $_GET["idProducto"]))); } else {$idProducto=0;}

if (!control_access("PRODUCTOS", 'ELIMINAR')) { 
	$aErrores[]="USTED NO TIENE PERMISOS PARA REALIZAR ESTA ACCIÓN"; 
}


//NO SE PERMITE BORRAR OFERTAS CON VENTAS YA REGISTRADAS PORQUE COMPROMETE LA INTEGRIDAD DE LA BD
$SQLcheck="SELECT m_venta_id FROM m_ventas WHERE m_venta_idProducto='$idProducto'";
$queryCheck=mysqli_query($link, $SQLcheck);
$numero=mysqli_num_rows($queryCheck);
if ($numero > 0) {
	$aErrores[]="No se puede borrar un producto que ya posee ventas registradas";
}

if(count($aErrores)==0) { 


	$query = "DELETE FROM m_productos  WHERE m_producto_id='$idProducto' ";
	$resultado = mysqli_query($link, $query);
	if ($resultado) {

		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "El producto ha sido eliminado"
			);


	} else {
		$jsondata["success"] = false;
		$jsondata["data"] = array(
			'message' => "ERROR - Ocurrió un error al intentar borrar el producto"
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
