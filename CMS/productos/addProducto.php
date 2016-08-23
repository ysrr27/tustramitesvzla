<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

if (!control_access("PRODUCTOS", 'AGREGAR')) { $aErrores[] = "USTED NO TIENE PERSIMO PARA REALIZAR ESTA ACCION";}


header('Content-type: application/json; charset=utf-8');
$aErrores=array();
$jsondata = array();

if((isset($_POST["nombreProducto"]))&&($_POST["nombreProducto"]!="")){ $nombreProducto=strip_tags(mysqli_real_escape_string($link, $_POST["nombreProducto"])); } else {$aErrores[] = "El nombre del producto no puede estar vacío";}
if((isset($_POST["costoProducto"]))&&($_POST["costoProducto"]!="")){ $costoProducto=strip_tags(mysqli_real_escape_string($link, $_POST["costoProducto"])); } else {$aErrores[] = "Debe especificar el costo del producto";}
if((isset($_POST["cantidadDisponible"]))&&($_POST["cantidadDisponible"]!="")){ $cantidadDisponible=mysqli_real_escape_string($link, $_POST["cantidadDisponible"]); } else {$aErrores[] = "Debe especificar la cantidad disponible del producto";}
if((isset($_POST["estatus"]))&&($_POST["estatus"]!="")){ $activo=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["estatus"]))); }  else {$activo=0;}
if((isset($_POST["descripcion"]))&&($_POST["descripcion"]!="")){ $descripcion=mysqli_real_escape_string($link, $_POST["descripcion"]); } else {$aErrores[] = "La descripción del producto no puede estar vacía";}
if((isset($_POST["idsImagenes"]))&&($_POST["idsImagenes"]!="")){ $idsImagenes=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["idsImagenes"]))); } else {$aErrores[] = "La oferta debe contener por lo menos una imagen";}
if((isset($_POST["destacado"]))&&($_POST["destacado"]!="")){ $destacado=strip_tags(htmlentities(mysqli_real_escape_string($link, $_POST["destacado"]))); }  else {$destacado=0;}

$fechacompleta=date('Y-m-d H:i:s');
$costoProducto=trim(str_replace("€","",$costoProducto));

if(count($aErrores)==0) { 

	$query = "INSERT INTO m_productos (m_producto_id, m_producto_nombre, m_producto_descripcion, m_producto_precio, m_producto_cantidad, m_producto_estatus, m_producto_destacado, m_producto_created_at, m_producto_updated_at) VALUES (Null, '$nombreProducto', '$descripcion', '$costoProducto', '$cantidadDisponible', '$activo', '$destacado', '$fechacompleta', '$fechacompleta')";
	$resultado = mysqli_query($link, $query);
	$lasid=mysqli_insert_id($link);

	$archivos = explode(",", $idsImagenes);
	foreach ($archivos as $valor) {
		$SQLPDF="UPDATE r_fotos_productos SET r_fotos_producto_idProducto='$lasid' WHERE r_fotos_producto_id='$valor'";
		$queryPDF=mysqli_query($link, $SQLPDF);
	}

	if ($resultado) {

		//Envío la respuesta al Front para redirigir
		$jsondata["success"] = true;
		$jsondata["data"] = array(
			'message' => "Servicio registrado exitosamente... "
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