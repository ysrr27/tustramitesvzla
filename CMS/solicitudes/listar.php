<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();
if (!control_access("SOLICITUDES", 'VER')){ echo "<script language='JavaScript'>document.location.href='../index.php';</script>"; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../common_head.php"); ?>
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
              <h3>Solicitudes <small>En Orden de Estatus</small></h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Solicitudes</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">


                  <!-- start project list -->
                  <table class="table table-striped projects">
                    <thead>
                      <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 20%">Cliente</th>
                        <th>Servicio Solicitado</th>
                        <th>País</th>
                        <th>Fecha de Solicitud</th>
                        <th>Estatus Solicitud</th>
                        <th style="width: 20%">#Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                $SQL="SELECT * FROM m_solicitudes, m_clientes, m_servicios, m_estatus_solicitudes WHERE m_solicitud_estatus_id <= 5  AND m_solicitud_idCliente=m_cliente_id AND m_solicitud_idServicio=m_servicio_id AND m_solicitud_estatus_id= m_estatus_solicitud_id ORDER BY m_solicitud_fechaCreacion ASC";
                $query=mysqli_query($link, $SQL);
                while ($row=mysqli_fetch_array($query)) {
                 $m_solicitud_id=$row["m_solicitud_id"];
                 $m_estatus_solicitud_id=$row["m_estatus_solicitud_id"];
                 $m_estatus_solicitud_descripcion=$row["m_estatus_solicitud_descripcion"];
                 $m_cliente_numeroTelefono=$row["m_cliente_numeroTelefono"];
                 $m_cliente_nombre=$row["m_cliente_nombre"];
                 $m_cliente_apellido=$row["m_cliente_apellido"];
                 $m_cliente_documentoIdentidad=$row["m_cliente_documentoIdentidad"];
                 $m_cliente_email=$row["m_cliente_email"];
                 $m_servicio_nombre=$row["m_servicio_nombre"];
                 $m_solicitud_fechaCreacion=date("d/m/Y h:i A", strtotime($row["m_solicitud_fechaCreacion"]));
                 $m_cliente_id=$row["m_cliente_id"];
                 $m_cliente_pais = $row["m_cliente_pais"];



                switch ($m_estatus_solicitud_id) {
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
                      <tr id="Solicitud<?=$m_solicitud_id?>">
                        <td>#</td>
                        <td>
                          <a><?=$m_cliente_nombre." ".$m_cliente_apellido?></a>
                          <br />
                          <small><?=$m_cliente_numeroTelefono?></small>
                          <br />
                           <small><?=$m_cliente_email?></small>
                        </td>
                        <td>
                          <ul class="list-inline">
                            <li>
                            <?=$m_servicio_nombre?>
                            </li>
                       
                          </ul>
                        </td>
                        <td >
                          <?=$m_cliente_pais?>
                        </td>
                        <td >
                          <?=$m_solicitud_fechaCreacion?>
                       
                         <td>
                          <button type="button" class="btn btn-<?=$tipoBoton?> btn-xs"><?=utf8_encode($m_estatus_solicitud_descripcion)?></Aprobada>
                        </td>
                        <td>
                         <?php if (control_access("SOLICITUDES", 'EDITAR')) { ?>
                          <a href="editarSolicitud.php?id=<?=$m_solicitud_id?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Editar </a>
                          <?php } ?>
                           <?php if (control_access("SOLICITUDES", 'ELIMINAR')) { ?>
                          <button type="button" class="btn btn-danger btn-xs" data-id="<?=$m_solicitud_id?>" data-title="Seguro que desea Rechazar esta solicitud?" data-trigger="focus" data-on-confirm="rechazarSolicitud" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-cancel-label="Cancelar!" data-placement="top" title="Seguro que desea rechazar esta solicitud?">  <i class="fa fa-trash-o"> </i> Rechazar</button>
                          <?php } ?>
                        </td>
                      </tr>
               <?php } ?>
                    </tbody>
                  </table>
                  <!-- end project list -->

                </div>
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
  <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
     <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../js/custom.js"></script>
    <script src="../js/bootstrap-confirmation.min.js"></script>
</body>
</html>
<script>

$('[data-toggle=confirmation]').confirmation();

function rechazarSolicitud(){

  var id = $(this).data('id');
  $.ajax({
    url: "rechazarSolicitud.php",
    type: 'GET',
    enctype: 'multipart/form-data',
    data: "idSolicitud="+id,
    async: false,
    contentType: "application/json",
    dataType: "json",
    success: function (data) {
      if (data['success']) {
        $( "#Solicitud"+id  ).slideUp();
        $("#mensajes").css("z-index", "999");
        $($("#mensajes").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
        $('#dataMessage').append(data['data']['message']);
        setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 2000);
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