<?php include('logueo.php');
include('extras/conexion.php');
$link=Conectarse();

if (!isset($idusuario)) {
    echo "<script language='JavaScript'>parent.location.href='index.php';</script>";
}



//SQL SOLICITUDES
$SQL="SELECT * FROM m_solicitudes WHERE m_solicitud_idCliente='$idusuario'";
$query=mysqli_query($link, $SQL);
$numeroSolicitudes=mysqli_num_rows($query);


?>
<!DOCTYPE html>
<html>
<head>
 <?php
 include('common_head.php');
 ?>

</head>
<body>

 <?php  include('common_menu.php');?>

<section class="content-2 simple col-1 col-undefined mbr-parallax-background mbr-after-navbar" id="content5-92" style="background-image: url(image/ciudad_noche.jpg);">
    <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(0, 0, 0);"></div>
    <div class="container">
        <div class="row">
            <div>
                <div class="thumbnail">
                    <div class="caption">
                        <div><p>Profesionalidad y compromiso somos expertos en trámites... <br></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container" id="menumobile">
    <nav id="menu" role="navigation">
        <ul>
            <li><a href="#" class="lnk-menu" id="resumenMobil">Resumen</a></li>
            <li><a href="#" class="lnk-menu num-facturas">Facturación</a></li>
            <li><a href="#" class="lnk-menu num-solicitud">Solicitudes</a></li>
            <li><a href="#" class="lnk-menu" id="perfilMobil">Perfil</a></li>
        </ul>
    </nav>
    <div class="page-wrap">
        <button id="menu-toggle"></button>
   </div>
</div>
<section class="container-fluid">
<div class="container menuAdmin">
        <div class="col-md-12 menu">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" id="resumen" href="#">Resumen</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="facturacion" href="#">Facturación</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="solicitudes" href="#">Solicitudes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="perfil" href="#">Mi Perfil</a>
                </li>
            </ul>

            <!-- menu mobile -->
        </div>

        <!-- Resumen -->
        <div class="row" id="resumen-details">
            <div class="col-md-12 text-admin">
                <h4>Resumen</h4>
                <a href="#" class="num-facturas"><button type="button" class="btn btn-secondary num-facturas">3</button> Tramites por Facturar</a> 
                <hr>
                <a href="#" class="num-solicitud"> <button type="button" class="btn btn-secondary"><?=$numeroSolicitudes?></button> Solicitud<?php if ($numeroSolicitudes>1) echo "es"; ?></a>
                <hr>
                <a href="#" class="num-solicitud" id="num-productos"><button type="button" class="btn btn-secondary">3</button> Productos</a>
                <hr>
            </div>
        </div>
        <!-- Facturacion -->
        <div class="row" id="facturacion-details" style="display: none;">
            <div class="col-md-12 col-xs-12 text-admin">
                <h4>Facturación</h4>
                <div class="col-md-12 text-center col-sm-12">
                    <div class="col-md-1 col-sm-1">#</div>
                    <div class="col-md-4 col-sm-4">Solicitud</div>
                    <div class="col-md-4 col-sm-4">Pago</div>
                    <div class="col-md-2 col-sm-2 col-md-offset-1">Estatus del Tramite</div>
                </div>
                <div class="col-md-12 tableAdmin text-center col-sm-12">
                    <div class="col-md-1 col-sm-1">
                        <blockquote class="card-blockquote"> 002050</blockquote>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="text-admin"><a href="internal-service.html"> Partida de Nacimiento </a></div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <button type="button" class="btn btn-pay hvr-icon-pay-good" data-toggle="modal" data-target="#mypay"> <i class="fa fa-usd" aria-hidden="true"></i> Pago </button>
                    </div>
                    <div class="col-md-2 col-sm-2 col-md-offset-1">
                        <button type="button" class="btn btn-info num-solicitud" data-toggle="modal" data-target=""> En proceso</button>
                    </div>
                </div>
                <div class="col-md-12 tableAdmin text-center col-sm-12">
                    <div class="col-md-1 col-sm-1">
                        <blockquote class="card-blockquote"> 002050</blockquote>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="text-admin"><a href="internal-service.html"> Partida de Nacimiento </a></div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <button type="button" class="btn btn-pay hvr-icon-pay-err" data-toggle="modal" data-target="#mypay"> <i class="fa fa-usd" aria-hidden="true"></i> Pago </button>
                    </div>
                    <div class="col-md-2 col-sm-2 col-md-offset-1">
                        <button type="button" class="btn btn-info num-solicitud" data-toggle="modal" data-target=""> En proceso</button>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 tableAdmin text-center">
                    <div class="col-md-1 col-sm-1">
                        <blockquote class="card-blockquote"> 002050</blockquote>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="text-admin"><a href="internal-service.html"> Partida de Nacimiento </a></div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <button type="button" class="btn btn-pay hvr-icon-pay-info" data-toggle="modal" data-target="#mypay"> <i class="fa fa-usd" aria-hidden="true"></i> Pago </button>
                    </div>
                    <div class="col-md-2 col-sm-2 col-md-offset-1">
                        <button type="button" class="btn btn-info num-solicitud" data-toggle="modal" data-target="#"> En proceso</button>
                        <!-- modal de estatus -->

                        <!-- Modal -->
                        <div class="modal fade" id="mypay" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                <div class="modal-header modal-head-login">
                                    <div class="row col-ms-10">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-10">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                                                <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                                                    <span class="mbr-brand__logo">
                                                        <a href="#">
                                                            <img class="mbr-navbar__brand-img mbr-brand__img" src="image/logistics-international-service-by-airplane.png">
                                                        </a>
                                                    </span>
                                                    <span class="mbr-brand__name">
                                                        <p class="mbr-brand__name text-white" href="#">TUS TRÁITES EN VENEZUELA </p>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <div class="row text-left">
                                        <div class="col-xs-12 tableAdmin">
                                            <div class="col-xs-2"><strong># Cuotas:</strong></div>
                                            <div class="col-xs-3"><strong><i class="fa fa-file-text-o" aria-hidden="true"></i> Tramite:</strong></div>
                                            <div class="col-xs-3"><strong><i class="fa fa-calendar" aria-hidden="true"></i> Fecha de Pago:</strong></div>
                                            <div class="col-xs-4"><strong><i class="fa fa-spinner" aria-hidden="true"></i> Estatus de Pago:</strong></div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="col-xs-2">1° cuota</div>
                                            <div class="col-xs-3">Parida de Nacimiento</div>
                                            <div class="col-xs-3">30/06/16</div>
                                            <div class="col-xs-4"><i class="fa fa-check-circle" aria-hidden="true"></i> Pago recibido</div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="col-xs-2">2° cuota</div>
                                            <div class="col-xs-3">Parida de Nacimiento</div>
                                            <div class="col-xs-3">30/06/16</div>
                                            <div class="col-xs-4"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Pendiente por pago</div>
                                        </div>
                                    </div>   
                                    <div class="modal-footer">
                                        <div class="row modal-color">
                                        </div>                        
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <!-- end modal  -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Solicitudes -->

   
        <div class="row text-admin" id="solicitudes-details" style="display: none;" >
            <h4>Trámites</h4>
            <div class="col-md-12 text-center col-sm-12">
                <div class="col-md-1 col-sm-1">#</div>
                <div class="col-md-4 col-sm-4">Solicitud</div>
                <div class="col-md-4 col-sm-4">Progreso</div>
                <div class="col-md-2 col-sm-2 col-md-offset-1">Estatus</div>
            </div>
            <!-- Solicitudes -->
                 <?php 
        $SQLSolicitudes="SELECT m_solicitud_estatus_id, m_solicitud_id, m_solicitud_updated_at, m_estatus_solicitud_id, m_estatus_solicitud_descripcion, m_servicio_nombre FROM m_solicitudes AS SOL, m_servicios AS SER, m_estatus_solicitudes AS ESTA WHERE SOL.m_solicitud_idCliente='$idusuario' AND SER.m_servicio_id=SOL.m_solicitud_idServicio AND ESTA.m_estatus_solicitud_id=m_solicitud_estatus_id";
        $querySolicitudes=mysqli_query($link, $SQLSolicitudes);
        while ($rowSolicitudes=mysqli_fetch_array($querySolicitudes)) {
            $m_solicitud_id=$rowSolicitudes["m_solicitud_id"];
            $m_solicitud_estatus_id=$rowSolicitudes["m_solicitud_estatus_id"];
            $m_solicitud_updated_at=$rowSolicitudes["m_solicitud_updated_at"];
            $m_solicitud_estatus_id=$rowSolicitudes["m_solicitud_estatus_id"];
            $m_estatus_solicitud_descripcion=$rowSolicitudes["m_estatus_solicitud_descripcion"];
            $m_servicio_nombre=$rowSolicitudes["m_servicio_nombre"];

            if ($m_solicitud_estatus_id ==1) {
               $porcentajeAvance=0;
            } else {
                $porcentajeAvance= round(($m_solicitud_estatus_id -1) / 4 * 100, 2);
            }
            $porcentajeN=100-$porcentajeAvance;

            switch ($m_solicitud_estatus_id) {
                case 1:
                $tipoBoton = "default";
                break;
                case 2:
                $tipoBoton =  "primary";
                break;
                case 3: 
                $tipoBoton =  "info";
                break;
                 case 4: 
                $tipoBoton =  "dark";
                break;
                 case 5: 
                $tipoBoton =  "success";
                break;
                case 6: 
                $tipoBoton =  "danger";
                break;
                case 7: 
                $tipoBoton =  "danger";
                break;
               
            }

        ?>
         <script>

        $(document).ready(function() {
            $("#positive<?=$m_solicitud_id?>").css("width", "<?=$porcentajeAvance?>%");
            $("#negative<?=$m_solicitud_id?>").css("width", "<?=$porcentajeN?>%");
        });

    </script>
            <div class="col-md-12 tableAdmin text-center col-sm-12">
                <div class="col-md-1 col-sm-1">
                    <blockquote class="card-blockquote"> 00<?=$m_solicitud_id?></blockquote>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="text-admin"><a href="internal-service.html"> <?=$m_servicio_nombre?> </a></div>
                </div>
                <div class="col-md-4 col-sm-4 col-md-offset-1">
                    <div class="progress-bar">
                        <div class="bar positive" id="positive<?=$m_solicitud_id?>">
                            <span><?=$porcentajeN?>%</span>
                        </div>
                        <div class="bar negative" id="negative<?=$m_solicitud_id?>">
                            <span><?=$porcentajeAvance?>%</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 col-sm-2">
                    <button type="button" class="btn btn-<?=$tipoBoton?>" data-toggle="modal" data-target="#myStatus"> <?=utf8_encode($m_estatus_solicitud_descripcion)?></button>
                </div>
            </div>
           
         <?php } ?>
        </div>

        <!-- Perfil -->

        <?php 

        $SQlPerfil="SELECT * FROM m_clientes WHERE m_cliente_id='$idusuario'";
        $queryPerfil=mysqli_query($link, $SQlPerfil);
        $rowPerfil=mysqli_fetch_array($queryPerfil);
        $m_cliente_nombre=$rowPerfil["m_cliente_nombre"];
        $m_cliente_apellido=$rowPerfil["m_cliente_apellido"];
        $m_cliente_documentoIdentidad=$rowPerfil["m_cliente_documentoIdentidad"];
        $m_cliente_numeroTelefono=$rowPerfil["m_cliente_numeroTelefono"];
        $m_cliente_email=$rowPerfil["m_cliente_email"];
        $m_cliente_direccion=$rowPerfil["m_cliente_direccion"];
        $m_cliente_pais=$rowPerfil["m_cliente_pais"];

        ?>

        <div class="row" id="perfil-details" style="display: none;">
            <div class="col-md-12 text-admin col-sm-12">
                <h4>Perfil</h4>
                <div class="col-md-2 col-sm-3">
                    <div class="card">
                        <div class="card image cap"><i class="fa fa-user" aria-hidden="true"></i></div>     
                    </div>
                </div>
                <div class="col-md-10 col-sm-9">
                    <div class="col-md-3 col-sm-3">
                        <div class="card">
                            <div class="card-block">
                                <strong class="card-title">Datos de Cuenta</strong>
                                <a href="#" title="Modificar Datos de Cuenta" class="btn-modif hvr-icon-modif" data-toggle="modal" data-target="#modificar-daros-cuenta"></a>
                                <ul>
                                    <li>Usuario: <?=$m_cliente_email?></li>
                                    <li>Clave: *******</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Modal Modificar Datos de Cuenta-->
                        <div class="modal fade" id="modificar-daros-cuenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form>
                                        <div class="modal-header modal-head-login">
                                            <div class="row col-ms-10">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-10">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                                                        <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                                                            <span class="mbr-brand__logo">
                                                                <a href="#">
                                                                    <img class="mbr-navbar__brand-img mbr-brand__img" src="image/logistics-international-service-by-airplane.png">
                                                                </a>
                                                            </span>
                                                            <span class="mbr-brand__name">
                                                            <p class="mbr-brand__name text-white" href="#">TUS TRAMITES EN VENEZUELA </p>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-header">
                                            <h4 class="modal-title text-center" id="myModalLabel">Actualizar Datos de Cuenta:</h4><hr>
                                            <div class="form-group row">
                                                <label class="col-xs-4 col-form-label">Nuevo usuario:</label>
                                                <div class="col-xs-8">
                                                    <input class="form-control-registro" type="text" value="Beiker" id="new-user" name="new-user">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xs-4 col-form-label">Nueva clave:</label>
                                                <div class="col-xs-8">
                                                    <input class="form-control-registro" type="password" value="*****" id="new-password" name="new-password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="card">
                            <div class="card-block">
                                <strong class="card-title">Datos Personales</strong>
                                <a href="#" title="Modificar Datos Personales" class="btn-modif hvr-icon-modif" data-toggle="modal" data-target="#modificar-daros-personales"></a>
                                <ul>
                                    <li>Nombre: <?=$m_cliente_nombre?></li>
                                    <li>Apellido: <?=$m_cliente_apellido?></li>
                                    <li>Correo: <?=$m_cliente_email?></li>
                                    <li>Telf: <?=$m_cliente_numeroTelefono?></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Modal Modificar Datos Personales-->
                        <div class="modal fade" id="modificar-daros-personales" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form>
                                        <div class="modal-header modal-head-login">
                                            <div class="row col-ms-10">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-10">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                                                        <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                                                            <span class="mbr-brand__logo">
                                                                <a href="#">
                                                                    <img class="mbr-navbar__brand-img mbr-brand__img" src="image/logistics-international-service-by-airplane.png">
                                                                </a>
                                                            </span>
                                                            <span class="mbr-brand__name">
                                                            <p class="mbr-brand__name text-white" href="#">TUS TRÁMITES EN VENEZUELA </p>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-header">
                                            <h4 class="modal-title  text-center" id="myModalLabel">Actualizar Datos Personales:</h4><hr>
                                            <div class="form-group row">
                                                <label class="col-xs-4 col-form-label text-center">Nuevo Correo:</label>
                                                <div class="col-xs-8">
                                                    <input class="form-control-registro" type="text" value="beiker01@correo.com" id="new-email" name="new-email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xs-4 col-form-label text-center">Nuevo Telef:</label>
                                                <div class="col-xs-8">
                                                    <input class="form-control-registro" type="text" value="+54 420 3000323" id="new-telf" name="new-telf">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="card">
                            <div class="card-block">
                                <strong class="card-title">Domicilio </strong>
                                 <a href="#" title="Modificar Domicilio" class="btn-modif hvr-icon-modif" data-toggle="modal" data-target="#modificar-domicilio"></a>
                                <ul>
                                    <li><?=$m_cliente_direccion?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Modificar domicilio-->
                    <div class="modal fade" id="modificar-domicilio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                    <form>
                                        <div class="modal-header modal-head-login">
                                            <div class="row col-ms-10">
                                                <div class="col-md-2"></div>
                                                <div class="col-md-10">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                                                        <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                                                            <span class="mbr-brand__logo">
                                                                <a href="#">
                                                                    <img class="mbr-navbar__brand-img mbr-brand__img" src="image/logistics-international-service-by-airplane.png">
                                                                </a>
                                                            </span>
                                                            <span class="mbr-brand__name">
                                                            <p class="mbr-brand__name text-white" href="#">TUS TRÁMITES EN VENEZUELA </p>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-header">
                                            <h4 class="modal-title text-center" id="myModalLabel">Actualizar Domicilio:</h4><hr>
                                            <div class="form-group row">
                                                <label class="col-xs-4 col-form-label text-center">Nueva Dirección:</label>
                                                <div class="col-xs-8">
                                                    <input class="form-control-registro" type="text" value="Madrid, España" id="new-addres" name="new-addres">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="button" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- banner 728 x 90 -->
      <!--   <div class="col-md-12">
             <div class="col-md-8 col-md-offset-2 col-xs-12"><img src="image/publicad728x90.jpg" alt="Publicidad"></div>
        </div> -->
    </div>
</section>

<?php include('common_redes.php'); ?>

<div class="container cnt-banner">
    <div class="col-md-8 col-md-offset-1 col-xs-12"><img src="image/publicad728x90.jpg" alt=""></div>
</div>




<?php include('common_footer.php');?>
<script>
$( "#resumen,#resumenMobil" ).click(function() {
  $( "#resumen-details" ).show( "slow" );
  $( "#facturacion-details" ).hide( 1000 );
  $( "#solicitudes-details" ).hide( 1000 );
  $( "#perfil-details" ).hide( 1000 );
  $("#resumen").addClass("active");
  $( "#facturacion" ).removeClass( "active" );
  $( "#solicitudes" ).removeClass( "active" );
  $( "#perfil" ).removeClass( "active" );
  $( "body" ).removeClass( "open" );
});
$( "#facturacion,.num-facturas" ).click(function() {
  $( "#facturacion-details" ).show( "slow" );
  $( "#resumen-details" ).hide( 1000 );
  $( "#solicitudes-details" ).hide( 1000 );
  $( "#perfil-details" ).hide( 1000 );
  $("#facturacion").addClass("active");
  $( "#resumen" ).removeClass( "active" );
  $( "#solicitudes" ).removeClass( "active" );
  $( "#perfil" ).removeClass( "active" );
  $( "body" ).removeClass( "open" );
});
$( "#solicitudes,.num-solicitud" ).click(function() {
  $( "#solicitudes-details" ).show( "slow" );
  $( "#facturacion-details" ).hide( 1000 );
  $( "#resumen-details" ).hide( 1000 );
  $( "#perfil-details" ).hide( 1000 );
  $("#solicitudes").addClass("active");
  $( "#resumen" ).removeClass( "active" );
  $( "#facturacion" ).removeClass( "active" );
  $( "#perfil" ).removeClass( "active" );
  $( "body" ).removeClass( "open" );
});
$( "#perfil,#perfilMobil" ).click(function() {
  $( "#perfil-details" ).show( "slow" );
  $( "#facturacion-details" ).hide( 1000 );
  $( "#resumen-details" ).hide( 1000 );
  $( "#solicitudes-details" ).hide( 1000 );
  $("#perfil").addClass("active");
  $( "#resumen" ).removeClass( "active" );
  $( "#solicitudes" ).removeClass( "active" );
  $( "#facturacion" ).removeClass( "active" );
  $( "body" ).removeClass( "open" );
});
//Exelent little functions to use any time when class modification is needed
function hasClass(ele, cls) {
    return !!ele.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));
}
function addClass(ele, cls) {
    if (!hasClass(ele, cls)) ele.className += " " + cls;
}
function removeClass(ele, cls) {
    if (hasClass(ele, cls)) {
        var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
        ele.className = ele.className.replace(reg, ' ');
    }
}
//Add event from js the keep the marup clean
function init() {
    document.getElementById("menu-toggle").addEventListener("click", toggleMenu);
}
//The actual fuction
function toggleMenu() {
    var ele = document.getElementsByTagName('body')[0];
    if (!hasClass(ele, "open")) {
        addClass(ele, "open");
    } else {
        removeClass(ele, "open");
    }
}
//Prevent the function to run before the document is loaded
document.addEventListener('readystatechange', function() {
    if (document.readyState === "complete") {
        init();
    }
});
</script>

</body>
</html>
