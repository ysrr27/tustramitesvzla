<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();


if((isset($_GET["id"]))&&($_GET["id"]!="")){ $idSolicitud= $_GET["id"]; }

$SQL="SELECT * FROM m_solicitudes AS A, m_clientes AS C, m_estatus_solicitudes AS E, m_servicios AS S WHERE A.m_solicitud_id = '$idSolicitud' AND C.m_cliente_id = A.m_solicitud_idCliente AND  A.m_solicitud_estatus_id =  E.m_estatus_solicitud_id AND A.m_solicitud_idServicio = S.m_servicio_id ";
$query=mysqli_query($link, $SQL);
while ($row=mysqli_fetch_array($query)) {
  $m_cliente_id=$row["m_cliente_id"];
  $m_cliente_nombre =$row["m_cliente_nombre"];
  $m_cliente_apellido=$row["m_cliente_apellido"];
  $m_servicio_estatus=$row["m_servicio_estatus"];
  $m_cliente_documentoIdentidad=$row["m_cliente_documentoIdentidad"];
  $m_cliente_tipoDocumento=$row["m_cliente_tipoDocumento"];
  $m_cliente_tipoTelefono=$row["m_cliente_tipoTelefono"];
  $m_cliente_numeroTelefono=$row["m_cliente_numeroTelefono"];
  $m_cliente_email=$row["m_cliente_email"];
  $m_cliente_pais=$row["m_cliente_pais"];
  $m_cliente_direccion=$row["m_cliente_direccion"];
  $m_solicitud_nombreDestinatario=$row["m_solicitud_nombreDestinatario"];
  $m_solicitud_apellidoDestinatario=$row["m_solicitud_apellidoDestinatario"];
  $m_solicitud_tipoTelefono=$row["m_solicitud_tipoTelefono"];
  $m_solicitud_telefonoDestinatario=$row["m_solicitud_telefonoDestinatario"];
  $m_solicitud_correoDestinatario=$row["m_solicitud_correoDestinatario"];
  $m_solicitud_paisDestinatario=$row["m_solicitud_paisDestinatario"];
  $m_solicitud_codigopostalDestinatario=$row["m_solicitud_codigopostalDestinatario"];
  $m_solicitud_direccionDestinatario=$row["m_solicitud_direccionDestinatario"];
  $m_solicitud_updated_at=$row["m_solicitud_updated_at"];
  $m_solicitud_estatus_id=$row["m_solicitud_estatus_id"];
  $m_solicitud_fechaCreacion=$row["m_solicitud_fechaCreacion"];
  $m_estatus_solicitud_id=$row["m_estatus_solicitud_id"];
  $m_servicio_id=$row["m_servicio_id"];
  $m_servicio_nombre=$row["m_servicio_nombre"];
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../common_head.php"); ?>

  <!-- Switchery -->
  <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <style type="text/css">
  .x_title{
    padding: 0px;
    margin-bottom: 0px;
  }
  .x_panel{
    margin-bottom: 0px;
  }
  </style>
</head>
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <?php include("../common_menu.php");?>
      </div>

      <!-- top navigation -->
      <?php include("../common_topNavigation.php"); ?>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>Ver solicitud de servicio</h3>
            </div>
            
          </div>
          <div class="clearfix"></div>


          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Datos del cliente</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>

                  </ul>
                  <div class="clearfix"></div>
                </div>

                <div id="mensajes">

                </div>
                <div class="x_content">


                  <br />

                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    <input type="text" name="razonSocial" class="form-control has-feedback-left" id="nombre" value="<?=$m_cliente_nombre." ".$m_cliente_apellido?>" Readonly>

                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                   <span class="fa fa-credit-card form-control-feedback right" aria-hidden="true"></span>
                   <input type="text" class="form-control" name="documento" id="documento" value="<?=$m_cliente_tipoDocumento.": ".$m_cliente_documentoIdentidad?>" Readonly>

                 </div>

                 <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                  <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                  <input type="text" class="form-control has-feedback-left" name="emailCliente" id="emailCliente" placeholder="Email" value="<?=$m_cliente_email?>" Readonly>

                </div>

                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                 <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                 <input type="text" class="form-control" name="documento" id="documento" value="<?=$m_cliente_tipoTelefono.": ".$m_cliente_numeroTelefono?>" Readonly>

               </div>

               <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <span class="fa fa-flag form-control-feedback left" aria-hidden="true"></span>
                <input type="text" class="form-control has-feedback-left" name="pais" id="pais" placeholder="País" valeu="<?=$m_cliente_pais?>"  Readonly>

              </div>

            </div>

          </div>






        </div>
        <div class="col-md-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Datos de la Solicitud</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

              </ul>
              <div class="clearfix"></div>
            </div>

            <div id="mensajes">

            </div>
            <div class="x_content">


              <br />

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Tipo de Solicitud</label>
                <span class="fa fa-arrows form-control-feedback left" aria-hidden="true"></span>
                <input type="text" name="razonSocial" class="form-control has-feedback-left" id="nombre" value="<?=$m_servicio_nombre?>" Readonly>

              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Fecha de la solicitud</label>
                <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                <input type="text" class="form-control" name="documento" id="documento" value="<?=date("d-m-Y H:i", strtotime($m_solicitud_fechaCreacion))?>" Readonly>

              </div>


              



            </div>

          </div>

        </div>

        <div class="col-md-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Datos para el envío</h2>
              <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>

              </ul>
              <div class="clearfix"></div>
            </div>

            <div id="mensajes">

            </div>
            <div class="x_content">


              <br />

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Nombre Destinatario</label>
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                <input type="text" name="destinatario" class="form-control has-feedback-left" id="destinatario" value="<?=$m_solicitud_nombreDestinatario." ".$m_solicitud_apellidoDestinatario?>" Readonly>

              </div>


              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Teléfono Destanatario</label>
                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                <input type="text" class="form-control" name="documento" id="documento" value="<?=$m_solicitud_tipoTelefono.": ".$m_solicitud_telefonoDestinatario?>" Readonly>

              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Correo electrónico del destianatario</label>
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                <input type="text" class="form-control has-feedback-left" name="emailCliente" id="emailCliente" placeholder="Email" value="<?=$m_solicitud_correoDestinatario?>" Readonly>

              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>País de destino</label>
                <span class="fa fa-flag form-control-feedback left" aria-hidden="true"></span>
                <input type="text" class="form-control has-feedback-left" name="pais" id="pais" value="<?=$m_solicitud_paisDestinatario?>"  Readonly>

              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Dirección de destino</label>
                <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>
                <input type="text" class="form-control has-feedback-left" name="pais" id="pais"  value="<?=$m_solicitud_direccionDestinatario?>"  Readonly>

              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <label>Código Postal destino</label>
                <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                <input type="text" class="form-control has-feedback-left" name="pais" id="pais" value="<?=$m_solicitud_codigopostalDestinatario?>"  Readonly>

              </div>
            </div>

          </div>

        </div>
        <div class="col-md-6 col-xs-12"><div class="x_panel">
          <div class="x_title">
            <h2>Recaudos</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>

            </ul>
            <div class="clearfix"></div>
          </div>

          <div id="mensajes">

          </div>
          <div class="x_content">


            <br />

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
             <label>Recaudos requeridos</label>
             <ul>
              <?php 

              $SQlRecaudos="SELECT * FROM r_recaudos_servicios AS S, m_recaudos as R WHERE S.r_recaudos_servicios_idServicio='$m_servicio_id' AND  S.r_recaudos_servicio_idRecaudo=R.m_recaudo_id AND R.m_recaudo_estatus='1'";
              $queryRecaudos=mysqli_query($link, $SQlRecaudos);
              $cantidadRecaudos=mysqli_num_rows($queryRecaudos);
              while ($rowRecaduos=mysqli_fetch_array($queryRecaudos)) {
                $m_recaudo_nombre=$rowRecaduos["m_recaudo_nombre"];
                $m_recaudo_descripcion=$rowRecaduos["m_recaudo_descripcion"];

                ?>

                <li><em>&nbsp; &nbsp; <?=$m_recaudo_nombre?></em></li>

                <?php } ?>
              </ul>


            </div>

            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
              <label>Recaudos Adjuntos</label>
              <ul>


                <?php 

                $sqlAdjuntos="SELECT * FROM r_clientes_recaudos WHERE r_cliente_recaudo_idSolicitud='$idSolicitud'";
                $queryadjuntos=mysqli_query($link, $sqlAdjuntos);
                    //$cantidadRecaudos=mysqli_num_rows($queryRecaudos);
                $i=0;
                while ($rowRecaduos=mysqli_fetch_array($queryadjuntos)) {
                  $r_cliente_recaudo_file=$rowRecaduos["r_cliente_recaudo_file"];
                  $i++;
                  ?>

                  <li><em>&nbsp; &nbsp; <a href="../../process/uploads/<?=$r_cliente_recaudo_file?>" target="_blank">Recaudo <?=$i?></a></em></li>

                  <?php } ?>
                </ul>

              </div>






            </div>

          </div></div>
          <div class="col-md-6 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Estatus</h2>
                <ul class="nav navbar-right panel_toolbox">
                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                  </li>

                </ul>
                <div class="clearfix"></div>
              </div>

              <div id="mensajes">

              </div>
                <form name="updateSolicitud" id="updateSolicitud">
                <div class="x_content">


                  <br />
                  
                    <input type="hidden" value="<?=$idSolicitud?>" name="idSolicitud">
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Estatus de la Solicitud</label>
                      <select id="estatus" name="estatus" class="form-control" required="">

                        <?php
                        $SQlStatus="SELECT * FROM m_estatus_solicitudes ORDER BY m_estatus_solicitud_id ASC";
                        $queryStatus=mysqli_query($link, $SQlStatus);
                        while ($rowStatus=mysqli_fetch_array($queryStatus)) {
                          $m_estatus_solicitud_id=$rowStatus["m_estatus_solicitud_id"];
                          $m_estatus_solicitud_descripcion=$rowStatus["m_estatus_solicitud_descripcion"];


                          ?>
                          <option value="<?=$m_estatus_solicitud_id?>" <?php if($m_estatus_solicitud_id==$m_solicitud_estatus_id){ echo "SELECTED"; } ?>><?=utf8_encode($m_estatus_solicitud_descripcion)?></option>


                          <?php } ?>
                        </select>

                      </div>

                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Pagos</label>

                        <?php 
                        $SQLPagos="SELECT * FROM r_pagos_solicitudes WHERE r_pago_solicitud_idSolicitud='$idSolicitud' ORDER BY r_pago_solicitud_fecha ASC";
                        $queryPagos=mysqli_query($link, $SQLPagos);
                        $numeroPagos=mysqli_num_rows($queryPagos);
                        switch ($numeroPagos) {
                          case 0:
                          $boton1 = "btn-success";
                          $estado1='';
                          $boton2 = "btn-success";
                          $estado2='';
                          break;
                          case 1:
                          $boton1 = "btn-pay hvr-icon-pay-good";
                          $estado1='disabled="disabled"';
                          $boton2 = "btn-success";
                          $estado2='';
                          break;
                          case 2: 
                          $boton1 = "btn-pay hvr-icon-pay-good";
                          $estado1='disabled="disabled"';
                          $boton2 = "btn-pay hvr-icon-pay-good";
                          $estado2='disabled="disabled"';
                          break;

                        }


                        ?><br>

                        <button type="button" class="btn <?=$boton1?>" <?=$estado1?> id="boton1" title="Marcar primera cuota pagada?" data-id="<?=$idSolicitud?>" data-pago="1" data-title="Seguro?" data-trigger="focus" data-on-confirm="agregarPago" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-cancel-label="Cancelar!" data-placement="top" title="Marcar Pago?"><i class="fa fa-usd" aria-hidden="true"></i> 1er Pago</button>
                        <button type="button" class="btn <?=$boton2?>" <?=$estado2?>  id="boton2" title="Marcar segunda cuota pagada?" data-id="<?=$idSolicitud?>" data-pago="2" data-title="Seguro?" data-trigger="focus" data-on-confirm="agregarPago" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-cancel-label="Cancelar!" data-placement="top" title="Marcar Pago?"><i class="fa fa-usd" aria-hidden="true"></i> 2do Pago</button>

                      </div>

                    </div>

                  </div>



                  </div>
                  <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">


                        <div class="clearfix"></div>
                      </div>

                      <div id="mensajes">

                      </div>
                      <div class="x_content">


                      <br />

                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                          <button type="button" class="btn btn-success" id="btn_enviar">Guardar</button>
                          <button type="button" onClick="document.location.href='listar.php'" class="btn btn-warning" >Cancelar</button>
                        </div>
                      </div>

              </form>




                </div>

              </div>

            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <?php include("../common_footer.php"); ?>
        <!-- /footer content -->
      </div>
    </div>

    <!--LIBRERIAS COMUNES-->
    <?php include("../common_libraries.php"); ?>
    <!--/LIBRERIAS COMUNES-->
    <script type="text/javascript">
    $("div.radio  > span > small").css("display","none");
    </script>
    <!--LIBRERIAS INDIVIDUALES NO COMUNES-->
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>

    <!-- Switchery -->
    <script src="../vendors/switchery/dist/switchery.min.js"></script>

    <script src="../js/validate/jquery.validate.js"></script>
    <script type="text/javascript" src="../js/jquery.numeric.min.js"></script>
    <script type="text/javascript" src="../js/validacionRIF.js"></script>
    <script src="../js/bootstrap-confirmation.min.js"></script>

    <script type="text/javascript">


    $("#EstatusRadio").click(function() {
      if ($('#estatus').prop('checked')) {
       $("#estatusText").html("<b>Activo</b>");
     }
     else{
      $("#estatusText").html("<b>Inactivo</b>");
    }
  });

    $("#Estatusverificado").click(function() {
      if ($('#verificacion').prop('checked')) {
       $("#verificadoText").html("<b>Verificado</b>");
     }
     else{
      $("#verificadoText").html("<b>Sin verificar</b>");
    }
  });


    </script>


    <script type="text/javascript">

    $('[data-toggle=confirmation]').confirmation();


    function agregarPago(){

      var id = $(this).data('id');
      var idPago = $(this).data('pago');


      $.ajax({
        url: "addPago.php",
        type: 'GET',
        enctype: 'multipart/form-data',
        data: "idSolicitud="+id,
        async: false,
        contentType: "application/json",
        dataType: "json",
        success: function (data) {
          if (data['success']) {
            $( "#boton"+idPago).attr("disabled", "disabled");
            $("#mensajes").css("z-index", "999");
            $($("#mensajes").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
            $('#dataMessage').append(data['data']['message']);
            setTimeout(function() { $(".alert").alert('close');  $("#mensajes").css("z-index", "-1");}, 2000);
          }
          else{
            $("#mensajes").css("z-index", "999");
            $($("#mensajes").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
            $.each(data['data']['message'], function(index, val) {
              $('#dataMessage').append(val+ '<br>');
            });
            setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 4000);
          }
        },
        error: function(data) {
         $("#mensajes").css("z-index", "777");
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


};
</script>

<script type="text/javascript">

$("#btn_enviar").click(function() { 
 var formData = new FormData($("#updateSolicitud")[0]);
 $.ajax({
  url: "updateSolicitud.php",
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
      setTimeout(function() { $(".alert").alert('close'); document.location.href='listar.php'; $("#mensajes").css("z-index", "-1");}, 2000);
    }
    else{
      $("#mensajes").css("z-index", "999");
      $($("#mensajes").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
      $.each(data['data']['message'], function(index, val) {
        $('#dataMessage').append(val+ '<br>');
      });
      setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 4000);
    }
  },
  error: function(data) {
   $("#mensajes").css("z-index", "777");
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
});

</script>

</body>
</html>