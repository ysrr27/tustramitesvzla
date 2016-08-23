<?php 
include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();
header( 'Content-type: text/html; charset=iso-8859-1' );

$search = $_POST['token'];
$SQL="SELECT m_cliente_id, m_cliente_razonSocial, m_cliente_nombreContacto FROM m_clientes WHERE m_cliente_nombreContacto like '%" . $search . "%' OR m_cliente_razonSocial like '%" . $search . "%'   ORDER BY m_cliente_id DESC";
$query_services = mysqli_query($link, $SQL);
while ($row_services = mysqli_fetch_array($query_services)) {

	$m_cliente_razonSocial=$row_services["m_cliente_razonSocial"];
	$m_cliente_id=$row_services["m_cliente_id"];
    echo '<div class="suggest-element" data-id="'.$m_cliente_id.'" data-razon="'.$m_cliente_razonSocial.'"><a data="'.$m_cliente_razonSocial.'" id="cliente'.$m_cliente_id.'" >'.utf8_encode($m_cliente_razonSocial).'</a></div>';
}
?>