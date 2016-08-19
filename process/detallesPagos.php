<?php
include('../logueo.php');
include('../extras/conexion.php');
$link=Conectarse();
echo $uid = $_GET['id'];
echo $idServicio= $_GET['idservicio'];


$SQlServicio="SELECT m_servicio_nombre FROM m_servicios WHERE m_servicio_id='$idServicio'";
$querySer=mysqli_query($link, $SQlServicio);
$rowServ=mysqli_fetch_array($querySer);
$m_servicio_nombre=$rowServ["m_servicio_nombre"];



$SQL="SELECT * FROM r_pagos_solicitudes WHERE r_pago_solicitud_idSolicitud='$uid'";
$query=mysqli_query($link, $SQL);
$i=0;
?>

<div class="row text-left">
	<div class="col-xs-12 tableAdmin">
		<div class="col-xs-2"><strong># Cuotas:</strong></div>
		<div class="col-xs-3"><strong><i class="fa fa-file-text-o" aria-hidden="true"></i> Tramite:</strong></div>
		<div class="col-xs-3"><strong><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de Pago:</strong></div>
		<div class="col-xs-4"><strong><i class="fa fa-spinner" aria-hidden="true"></i> Estatus de Pago:</strong></div>
	</div>

	<?php

	while ($row=mysqli_fetch_array($query)) {
		$r_pago_solicitud_id[$i] = $row["r_pago_solicitud_id"];
		$r_pago_solicitud_fecha[$i] = date("d/m/Y", strtotime($row["r_pago_solicitud_fecha"]));
		$i++;

	}

	if (isset($r_pago_solicitud_id[0])) {
		$pago[0]="Aprobado";
	} else {
		$pago[0]="Pendiente";
	}

	if (isset($r_pago_solicitud_id[1])) {
		$pago[1]="Aprobado";
	} else {
		$pago[1]="Pendiente";
	}


	?>
	<div class="col-xs-12">
		<div class="col-xs-2">1° cuota</div>
		<div class="col-xs-3"><?=$m_servicio_nombre?></div>
		<div class="col-xs-3"><?=$r_pago_solicitud_fecha[0]?></div>
		<div class="col-xs-4"><i class="fa fa-check-circle" aria-hidden="true"></i> Pago <?=$pago[0]?> </div>
	</div>
	<div class="col-xs-12">
		<div class="col-xs-2">2° cuota</div>
		<div class="col-xs-3"><?=$m_servicio_nombre?></div>
		<div class="col-xs-3"><?=$r_pago_solicitud_fecha[1]?></div>
		<div class="col-xs-4"><i class="fa fa-check-circle" aria-hidden="true"></i> Pago <?=$pago[1]?></div>
	</div>
</div>   