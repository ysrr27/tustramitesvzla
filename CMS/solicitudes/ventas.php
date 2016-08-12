<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();
if (!control_access("VENTAS", 'EDITAR')){ echo "<script language='JavaScript'>document.location.href='../index.php';</script>"; }
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
              <h3>Ofertas <small>En Orden de Estatus</small></h3>
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
                  <h2>Ventas</h2>
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

                  <p>Listado de Ventas sin aprobar! El administrador debe confirmar la venta para que la misma tenga validéz</p>

                  <!-- start project list -->
                  <table class="table table-striped projects">
                    <thead>
                      <tr>
                        <th style="width: 1%">#</th>
                        <th style="width: 20%">Comprador</th>
                        <th>Producto comprado</th>
                        <th>Cantidad</th>
                        <th>Fecha de compra</th>
                        <th>Cliente al que le compra</th>
                        <th>Estatus compra</th>
                        <th style="width: 20%">#Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                $SQL="SELECT * FROM m_ventas, m_clientes, m_ofertas WHERE m_venta_estatus = 'P'  AND m_venta_idUsuario=m_cliente_id AND m_venta_idOferta=m_oferta_id ORDER BY m_venta_fecha ASC";
                $query=mysqli_query($link, $SQL);
                while ($row=mysqli_fetch_array($query)) {
                 $m_venta_id=$row["m_venta_id"];
                 $m_venta_cantidad=$row["m_venta_cantidad"];
                 $m_venta_estatus=$row["m_venta_estatus"];
                 $m_venta_usuarioAprobado=$row["m_venta_usuarioAprobado"];
                 $m_cliente_telefonoContacto=$row["m_cliente_telefonoContacto"];
                 $m_cliente_nombreContacto=$row["m_cliente_nombreContacto"];
                 $m_cliente_razonSocial=$row["m_cliente_razonSocial"];
                 $m_cliente_rif=$row["m_cliente_rif"];
                 $m_cliente_mail=$row["m_cliente_mail"];
                 $m_oferta_titulo=$row["m_oferta_titulo"];
                 $m_venta_fecha=date("d/m/Y h:i A", strtotime($row["m_venta_fecha"]));
                 $m_oferta_idCliente=$row["m_oferta_idCliente"];

                 if ($m_venta_estatus=="P") {
                   $esatusVenta="SIN APROBAR";
                   $clase="warning";
                 } elseif ($m_venta_estatus="A") {
                   $esatusVenta="APROBADA";
                   $clase="success";
                 } elseif ($m_venta_estatus="R") {
                   $esatusVenta="RECHAZADA";
                   $clase="danger";
                 }
                 
                
                ?>
                      <tr id="Venta<?=$m_venta_id?>">
                        <td>#</td>
                        <td>
                          <a><?php if ($m_cliente_razonSocial!="") {
                            echo $m_cliente_razonSocial;
                          } else {
                            echo $m_cliente_nombreContacto;
                          }
                          ?></a>
                          <br />
                          <small><?=$m_cliente_rif?></small>
                          <br />
                           <small><?=$m_cliente_mail?></small>
                        </td>
                        <td>
                          <ul class="list-inline">
                            <li>
                            <?=$m_oferta_titulo?>
                            </li>
                       
                          </ul>
                        </td>
                        <td >
                          <?=$m_venta_cantidad?>
                        </td>
                        <td >
                          <?=$m_venta_fecha?>
                        </td>
                        <td>

                          <?php

                          $SQLVendedor="SELECT m_cliente_razonSocial, m_cliente_id, m_cliente_mail, m_cliente_rif, m_cliente_nombreContacto FROM m_clientes WHERE m_cliente_id='$m_oferta_idCliente'";
                          $queryVendedor=mysqli_query($link, $SQLVendedor);
                          $rowVendedor=mysqli_fetch_array($queryVendedor);
                          $m_clienteVendedor_razonSocial=$rowVendedor["m_cliente_razonSocial"];
                          $m_clienteVendedor_id=$rowVendedor["m_cliente_id"];
                          $m_clienteVendedor_mail=$rowVendedor["m_cliente_mail"];
                          $m_clienteVendedor_rif=$rowVendedor["m_cliente_rif"];
                          $m_cliente_nombreContacto=$rowVendedor["m_cliente_nombreContacto"];

                          ?>
                          <a><?php if ($m_cliente_razonSocial!="") {
                            echo $m_cliente_razonSocial;
                          } else {
                            echo $m_cliente_nombreContacto;
                          }
                          ?></a>
                          <br />
                          <small><?=$m_clienteVendedor_rif?><small>
                          <br />
                           <small><?=$m_clienteVendedor_mail?></small>
                        </td>
                         <td>
                          <button type="button" class="btn btn-<?=$clase?> btn-xs"><?=$esatusVenta?></Aprobada>
                        </td>
                        <td>
                         <?php if (control_access("VENTAS", 'ELIMINAR')) { ?>
                          <button type="button" class="btn btn-success btn-xs" data-id="<?=$m_venta_id?>" data-accion="A" data-title="Seguro que desea Aprobar esta venta?" data-trigger="focus" data-on-confirm="changeStatus" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-cancel-label="Cancelar!" data-placement="top" title="Seguro que desea Aprobar esta venta?">  <i class="fa fa-check-square"> </i> Aprobar</button>
                          <?php } ?>
                           <?php if (control_access("VENTAS", 'ELIMINAR')) { ?>
                          <button type="button" class="btn btn-danger btn-xs" data-id="<?=$m_venta_id?>" data-accion="R" data-title="Seguro que desea Rechazar esta venta?" data-trigger="focus" data-on-confirm="changeStatus" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-cancel-label="Cancelar!" data-placement="top" title="Seguro que desea rechazar esta venta?">  <i class="fa fa-trash-o"> </i> Rechazar</button>
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
    <script src="../../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
     <!-- NProgress -->
    <script src="../../vendors/nprogress/nprogress.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../js/custom.js"></script>
    <script src="../js/bootstrap-confirmation.min.js"></script>
</body>
</html>
<script>

$('[data-toggle=confirmation]').confirmation();

function changeStatus(){

  var id = $(this).data('id');
  var estatusNuevo = $(this).data('accion');

  $.ajax({
    url: "changeStatus.php",
    type: 'GET',
    enctype: 'multipart/form-data',
    data: "idVenta="+id+"&estatusNew="+estatusNuevo,
    async: false,
    contentType: "application/json",
    dataType: "json",
    success: function (data) {
      if (data['success']) {
        $( "#Venta"+id  ).slideUp();
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