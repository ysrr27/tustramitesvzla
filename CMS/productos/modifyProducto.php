<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

if (!control_access("OFERTAS", 'EDITAR')) { $aErrores[] = "USTED NO TIENE PERSIMO PARA REALIZAR ESTA ACCION"; }


header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();

if((isset($_POST["nombreProducto"]))&&($_POST["nombreProducto"]!="")){ $nombreProducto=strip_tags(mysqli_real_escape_string($link, $_POST["nombreProducto"])); } else {$aErrores[] = "El nombre del producto no puede estar vacío";}
if((isset($_POST["costoProducto"]))&&($_POST["costoProducto"]!="")){ $costoProducto=strip_tags(mysqli_real_escape_string($link, $_POST["costoProducto"])); } else {$aErrores[] = "Debe especificar el costo del producto";}
if((isset($_POST["cantidadDisponible"]))&&($_POST["cantidadDisponible"]!="")){ $cantidadDisponible=mysqli_real_escape_string($link, $_POST["cantidadDisponible"]); } else {$aErrores[] = "Debe especificar la cantidad disponible del producto";}
if((isset($_POST["estatus"]))&&($_POST["estatus"]!="")){ $activo=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["estatus"]))); }  else {$activo=0;}
if((isset($_POST["descripcion"]))&&($_POST["descripcion"]!="")){ $descripcion=mysqli_real_escape_string($link, $_POST["descripcion"]); } else {$aErrores[] = "La descripción del producto no puede estar vacía";}
if((isset($_POST["idProducto"]))&&($_POST["idProducto"]!="")){ $idProducto=strip_tags(mysqli_real_escape_string($link, $_POST["idProducto"])); } else {$aErrores[] = "Ninǵún ID indicado";}
if((isset($_POST["destacado"]))&&($_POST["destacado"]!="")){ $destacado=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["destacado"]))); }  else {$destacado=0;}

$costoProducto=trim(str_replace("€","",$costoProducto));

$fechacompleta=date('Y-m-d H:i:s');

if(count($aErrores)==0) { 

	$query = "UPDATE m_productos SET m_producto_nombre='$nombreProducto',  m_producto_descripcion='$descripcion',  m_producto_precio='$costoProducto', m_producto_cantidad= '$cantidadDisponible', m_producto_estatus='$activo', m_producto_updated_at='$fechacompleta', m_producto_destacado='$destacado'  WHERE m_producto_id='$idProducto'";
	$resultado = mysqli_query($link, $query);


	
	if ($resultado) {

		//Envío la respuesta al Front para redirigir
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Producto actualizado exitosamente..."
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