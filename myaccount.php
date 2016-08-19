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
<style type="text/css">
    .col-md-offset-1{
        margin-left: 0px;
    }
</style>
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
                <hr>
                <a href="#" class="num-solicitud"> <button type="button" class="btn btn-secondary"><?=$numeroSolicitudes?></button> Solicitud<?php if ($numeroSolicitudes>1) echo "es"; ?></a>
                <hr>
                <a href="#" class="num-solicitud" id="num-productos"><button type="button" class="btn btn-secondary">3</button> Productos</a>
                <hr>
            </div>
        </div>


        <!-- Solicitudes -->


        <div class="row text-admin" id="solicitudes-details" style="display: none;" >
            <h4>Trámites</h4>
            <div class="col-md-12 text-center col-sm-12">
                <div class="col-md-1 col-sm-1">#</div>
                <div class="col-md-4 col-sm-4">Solicitud</div>
                <div class="col-md-2 col-sm-2">Progreso</div>
                 <div class="col-md-2 col-sm-2">Pagos</div>
                <div class="col-md-2 col-sm-2 col-md-offset-1">Estatus</div>
            </div>
            <!-- Solicitudes -->
            <?php 
            $SQLSolicitudes="SELECT m_solicitud_estatus_id, m_solicitud_id, m_solicitud_updated_at, m_estatus_solicitud_id, m_estatus_solicitud_descripcion, m_servicio_nombre, m_solicitud_idServicio FROM m_solicitudes AS SOL, m_servicios AS SER, m_estatus_solicitudes AS ESTA WHERE SOL.m_solicitud_idCliente='$idusuario' AND SER.m_servicio_id=SOL.m_solicitud_idServicio AND ESTA.m_estatus_solicitud_id=m_solicitud_estatus_id";
            $querySolicitudes=mysqli_query($link, $SQLSolicitudes);
            while ($rowSolicitudes=mysqli_fetch_array($querySolicitudes)) {
                $m_solicitud_id=$rowSolicitudes["m_solicitud_id"];
                $m_solicitud_estatus_id=$rowSolicitudes["m_solicitud_estatus_id"];
                $m_solicitud_updated_at=$rowSolicitudes["m_solicitud_updated_at"];
                $m_solicitud_estatus_id=$rowSolicitudes["m_solicitud_estatus_id"];
                $m_estatus_solicitud_descripcion=$rowSolicitudes["m_estatus_solicitud_descripcion"];
                $m_solicitud_idServicio =$rowSolicitudes["m_solicitud_idServicio"];
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
                <div class="col-md-2 col-sm-2 col-md-offset-1">
                    <div class="progress-bar">
                        <div class="bar positive" id="positive<?=$m_solicitud_id?>">
                            <span><?=$porcentajeAvance?>%</span>
                        </div>
                        <div class="bar negative" id="negative<?=$m_solicitud_id?>">
                            <span><?=$porcentajeAvance?>%</span>
                        </div>
                    </div>
                </div>
                 <div class="col-md-2 col-sm-2">
                        <button type="button" class="btn btn-pay hvr-icon-pay-good" data-toggle="modal" data-id="<?=$m_solicitud_id?>" onclick="showAjaxModal('<?=$m_solicitud_id?>', '<?=$m_solicitud_idServicio?>');"> <i class="fa fa-usd" aria-hidden="true"></i> Pagos </button>
                    </div>
                <div class="col-md-2 col-sm-2">
                    <button type="button" class="btn btn-<?=$tipoBoton?>"> <?=utf8_encode($m_estatus_solicitud_descripcion)?></button>
                </div>
            </div>

            <?php } ?>
        </div>

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
                                        Cargando...
                                        <div class="modal-footer">
                                            <div class="row modal-color">
                                            </div>                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end modal  -->


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
                           <div id="mensajes"></div>
                           <div class="modal-dialog" role="document">
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
                                                        <p class="mbr-brand__name text-white" href="#">TUS TRAMITES EN VENEZUELA </p>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form name="changePass" id="changePass" data-parsley-validate novalidate="novalidate">
                                    <div class="modal-header">

                                        <h4 class="modal-title text-center" id="myModalLabel">Cambiar Clave:</h4><hr>
                                        <div class="form-group row">
                                            <label class="col-xs-4 col-form-label">Clave Actual:</label>
                                            <div class="col-xs-8">
                                                <input class="form-control-registro" type="password" id="claveactual" name="claveactual">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xs-4 col-form-label">Nueva clave:</label>
                                            <div class="col-xs-8">
                                                <input class="form-control-registro" type="password"  id="newpassword" name="newpassword">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-xs-4 col-form-label">Repite clave:</label>
                                            <div class="col-xs-8">
                                                <input class="form-control-registro" type="password"  id="repasswordnew" name="repasswordnew">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Cambiar Clave</button>
                                        <button type="button" id="cerrarChangepass" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

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
                            <a href="#" title="Modificar Datos Personales" class="btn-modif hvr-icon-modif" data-toggle="modal" data-target="#UpdatePersonalData"></a>
                            <ul>
                                <li>Nombre: <?=$m_cliente_nombre?></li>
                                <li>Apellido: <?=$m_cliente_apellido?></li>
                                <li>Correo: <?=$m_cliente_email?></li>
                                <li>Telf: <?=$m_cliente_numeroTelefono?></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Modal Modificar Datos Personales-->
                    <div class="modal fade" id="UpdatePersonalData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
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
                                                        <p class="mbr-brand__name text-white" href="#">TUS TRÁMITES EN VENEZUELA </p>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-header">
                                    <div id="mensajesx"></div>
                                <form name="updateNumber" id="updateNumber">
                                    <h4 class="modal-title  text-center" id="myModalLabel">Actualizar Datos Personales:</h4><hr>

                                    <div class="form-group row">
                                        <label class="col-xs-4 col-form-label text-center">Nuevo Teléfono:</label>
                                        <div class="col-xs-8">
                                            <input class="form-control-registro" type="text" value="<?=$m_cliente_numeroTelefono?>" id="numtelefonico" name="numtelefonico">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" >Guardar Cambios</button>
                                    <button type="button" class="btn btn-secondary" id="closeNumber" data-dismiss="modal">Cancelar</button>
                                    
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
                <div id="mensajesY"></div>
                <div class="modal-dialog" role="document">
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
                                                    <p class="mbr-brand__name text-white" href="#">TUS TRÁMITES EN VENEZUELA </p>
                                                </span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form id="changeAddress" name="changeAddress">
                            <div class="modal-header">
                                <h4 class="modal-title text-center" id="myModalLabel">Actualizar Domicilio:</h4><hr>
                                <div class="form-group row">
                                    <label class="col-xs-4 col-form-label text-center">Nueva Dirección:</label>
                                    <div class="col-xs-8">
                                        <input class="form-control-registro" type="text" value="<?=$m_cliente_direccion?>" id="newaddres" name="newaddres">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeAddress">Cancelar</button>
                                
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

  // When the browser is ready...
  $(function() {
    $("#changePass").validate({
        rules: {
            claveactual: "required",
            newpassword: {
                required: true
            },
            repasswordnew: {
                equalTo: '#newpassword'
            }
        },

        // Specify the validation error messages
        messages: {
            claveactual: "Debe introducir su clave actual",
            newpassword: {
                required: "Debe asignar una clave"
            },
            repasswordnew: {
                required:"Debe repetir su clave",
                equalTo: 'Sus claves no coninciden'
            }

        },
        
        submitHandler: function(form) {
            var formData = new FormData($("#changePass")[0]);
            $.ajax({
                url: "process/changePass.php",
                type: 'POST',
                enctype: 'multipart/form-data',
                data: formData,
                async: false,
                contentType: "application/json",
                dataType: "json",
                success: function (data) {

                    if (data['success']) {
                        $("#mensajes").css("z-index", "999");

                        $($("#mensajes").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
                        $('#dataMessage').append(data['data']['message']);
                        setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1"); $("#cerrarChangepass").click(); }, 2000);
                    } else{
                        $("#mensajes").css("z-index", "999");
                        $.each(data['data']['message'], function(index, val) {
                            $($("#mensajes").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
                            $('#dataMessage').append(val+ '<br>');
                        });
                        setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 2000);
                    };
                },
                error: function(data) {
                    $("#mensajes").css("z-index", "999");
                    $($("#mensajes").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
                    $.each(data['data']['message'], function(index, val) {
                        $('#dataMessage').append(val+ '<br>');
                    });
                    setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 2000);
                },
                cache: false,
                contentType: false,
                processData: false
            });
}
});

});


</script>
    <script type="text/javascript">
        function showAjaxModal(id, idServicio)
        {
            //var uid = $(this).data('id');
            var uid = id;
            var idServ = idServicio;
            console.log(idServicio);
            jQuery('#mypay').modal('show', {backdrop: 'static'});


            jQuery.ajax({
                url: "process/detallesPagos.php?id="+ uid+"&idservicio="+idServ,
                success: function(response)
                {
                    jQuery('#mypay .modal-body').html(response);
                }
            });
        }
        </script>
<script>

  // When the browser is ready...
  $(function() {
    $("#changeAddress").validate({
        rules: {
            newaddres: {
                required: true,
            }
        },

        // Specify the validation error messages
        messages: {
            newaddres: {
                required: "Debe introducir su dirección de domicilio",
            }

        },
        
        submitHandler: function(form) {
            var formData = new FormData($("#changeAddress")[0]);
            $.ajax({
                url: "process/changeAddress.php",
                type: 'POST',
                enctype: 'multipart/form-data',
                data: formData,
                async: false,
                contentType: "application/json",
                dataType: "json",
                success: function (data) {

                    if (data['success']) {
                        $("#mensajesY").css("z-index", "999");
                        $($("#mensajesY").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
                        $('#dataMessage').append(data['data']['message']);
                        setTimeout(function() { $(".alert").alert('close'); $("#mensajesY").css("z-index", "-1"); $("#closeAddress").click(); }, 2000);
                    } else{
                        $("#mensajesY").css("z-index", "999");
                        $.each(data['data']['message'], function(index, val) {
                            $($("#mensajesY").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
                            $('#dataMessage').append(val+ '<br>');
                        });
                        setTimeout(function() { $(".alert").alert('close'); $("#mensajesY").css("z-index", "-1");}, 2000);
                    };
                },
                error: function(data) {
                    $("#mensajesY").css("z-index", "999");
                    $($("#mensajesY").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
                    $.each(data['data']['message'], function(index, val) {
                        $('#dataMessage').append(val+ '<br>');
                    });
                    setTimeout(function() { $(".alert").alert('close'); $("#mensajesY").css("z-index", "-1");}, 2000);
                },
                cache: false,
                contentType: false,
                processData: false
            });
}
});

});
</script>

<script>

  // When the browser is ready...
  $(function() {
    $("#updateNumber").validate({
        rules: {
            numtelefonico: {
                required: true,
                minlength: 11,
                maxlength: 14
            }
        },

        // Specify the validation error messages
        messages: {
            numtelefonico: {
                required: "Debe introducir un número telefónico",
                minlength: "El número debe tener al menos 11 dígitos",
                maxlength: "El número NO debe tener mas de 14 dígitos"
            }

        },
        
        submitHandler: function(form) {
            var formData = new FormData($("#updateNumber")[0]);
            $.ajax({
                url: "process/changeNumber.php",
                type: 'POST',
                enctype: 'multipart/form-data',
                data: formData,
                async: false,
                contentType: "application/json",
                dataType: "json",
                success: function (data) {

                    if (data['success']) {
                        $("#mensajesx").css("z-index", "999");
                        $($("#mensajesx").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
                        $('#dataMessage').append(data['data']['message']);
                        setTimeout(function() { $(".alert").alert('close'); $("#mensajesx").css("z-index", "-1"); $("#closeNumber").click(); }, 2000);
                    } else{
                        $("#mensajesx").css("z-index", "999");
                        $.each(data['data']['message'], function(index, val) {
                            $($("#mensajesx").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
                            $('#dataMessage').append(val+ '<br>');
                        });
                        setTimeout(function() { $(".alert").alert('close'); $("#mensajesx").css("z-index", "-1");}, 2000);
                    };
                },
                error: function(data) {
                    $("#mensajesx").css("z-index", "999");
                    $($("#mensajesx").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
                    $.each(data['data']['message'], function(index, val) {
                        $('#dataMessage').append(val+ '<br>');
                    });
                    setTimeout(function() { $(".alert").alert('close'); $("#mensajesx").css("z-index", "-1");}, 2000);
                },
                cache: false,
                contentType: false,
                processData: false
            });
}
});

});
</script>

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
