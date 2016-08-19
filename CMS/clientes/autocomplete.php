<?php 
include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();
header( 'Content-type: text/html; charset=utf-8' );

$search = $_POST['token'];
$SQL="SELECT m_cliente_id, m_cliente_nombre, m_cliente_apellido  FROM m_clientes WHERE m_cliente_nombre like '%" . $search . "%' OR m_cliente_apellido like '%" . $search . "%'   ORDER BY m_cliente_id DESC";
$query_services = mysqli_query($link, $SQL);
while ($row_services = mysqli_fetch_array($query_services)) {

	$m_cliente_nombre=$row_services["m_cliente_nombre"];
	$m_cliente_id=$row_services["m_cliente_id"];
	$m_cliente_apellido=$row_services["m_cliente_apellido"];
    echo '<div class="suggest-element" data-id="'.$m_cliente_id.'" data-razon="'.$m_cliente_nombre.'"><a data="'.$m_cliente_nombre.'" id="cliente'.$m_cliente_id.'" >'.$m_cliente_nombre." ".$m_cliente_apellido.'</a></div>';
}
?>