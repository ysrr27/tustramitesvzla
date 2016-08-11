<?php include('logeo.php'); 
include('extras/conexion.php');
$link=Conectarse();

?>

<!DOCTYPE html>
<html lang="en">
<head>
 <?php include("common_head.php"); ?>
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
       <?php include("common_menu.php");?>
     </div>

     <!-- top navigation -->
     <?php include("common_topNavigation.php"); ?>
     <!-- /top navigation -->


     <!-- page content -->
     <div class="right_col" role="main">

      <br />
      <div class="">

        <div class="row top_tiles">
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-suitcase"></i>
              </div>

              <?php
              $SQLClientes="SELECT SUM(CASE WHEN m_cliente_tipoCliente = '1' THEN 1 ELSE 0 END) AS clientes, SUM(CASE WHEN m_cliente_tipoCliente ='2' THEN 1 ELSE 0 END) AS usuarios FROM m_clientes WHERE m_cliente_estatus='1'  AND m_cliente_verificado='1' ORDER BY  m_cliente_id ASC ";
              $queryCluentes=mysqli_query($link, $SQLClientes);
              $rowClientes=mysqli_fetch_array($queryCluentes);
              $cliemtesRegistrados=$rowClientes["clientes"];
              $usuariosRegistrados=$rowClientes["usuarios"];
              ?>
              <div class="count"><?=$cliemtesRegistrados?></div>

              <h3>Clientes Registrados</h3>
              <p>Clientes ofertantes</p>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-users"></i>
              </div>
              <div class="count"><?=$usuariosRegistrados?></div>

              <h3>Usuarios Registrados </h3>
              <p>Usuarios compradores </p>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-tag"></i>
              </div>
              <div class="count"><?=$usuariosRegistrados?></div>

              <h3>Ofertas Activas</h3>
              <p>Ofertas en periodo de validéz</p>
            </div>
          </div>
          <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="tile-stats">
              <div class="icon"><i class="fa fa-shopping-cart"></i>
              </div>

              <?php
              $SQL24="SELECT COUNT(*) AS ventasHoy from m_ventas where m_venta_fecha between now() - INTERVAL 1 DAY and now()";
              $query24=mysqli_query($link, $SQL24);
              $row24=mysqli_fetch_array($query24);
              $ventasHoy=$row24["ventasHoy"];
              ?>
              <div class="count"><?=$ventasHoy?></div>

              <h3>Ventas del día</h3>
              <p>Ventas de las últimas 24 horas</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>Transaction Summary <small>Weekly progress</small></h2>
                <div class="filter">

                </div>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <div class="col-md-9 col-sm-12 col-xs-12">
                  <div class="demo-container" style="height:250px">
                    <div id="placeholder3xx3" class="demo-placeholder" style="width: 100%; height:250px;"></div>
                  </div>


                </div>

                <div class="col-md-3 col-sm-12 col-xs-12">
                  <div>
                    <div class="x_title">
                      <h2>Top de clientes</h2>
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
                    <ul class="list-unstyled top_profiles scroll-view">

                      <?php
                      $SQLTop="SELECT C.m_cliente_razonSocial, C.m_cliente_mail, SUM(O.m_oferta_cantidad) AS cantidadOfertas FROM m_clientes AS C  INNER JOIN m_ofertas AS O ON C.m_cliente_id=O.m_oferta_idCliente GROUP BY C.m_cliente_id ORDER BY cantidadOfertas DESC LIMIT 0,5";
                      $queryTop=mysqli_query($link, $SQLTop);
                      while($rowTop=mysqli_fetch_array($queryTop)){
                        $m_cliente_razonSocial=$rowTop["m_cliente_razonSocial"];
                        $m_cliente_mail=$rowTop["m_cliente_mail"];
                        $cantidadOfertas=$rowTop["cantidadOfertas"];
                        ?>

                        <li class="media event">
                          <a class="pull-left border-aero profile_thumb">
                            <i class="fa fa-user aero"></i>
                          </a>
                          <div class="media-body">
                            <a class="title" href="#"><?=$m_cliente_razonSocial?></a>
                            <p> <?=$m_cliente_mail?> </p>
                            <p> <small><?=$cantidadOfertas?> Ofertas</small>
                            </p>
                          </div>
                        </li>

                        <?php } ?>


                      </ul>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>






        </div>
      </div>
      <!-- /page content -->

      <!-- footer content -->
      <?php include("common_footer.php"); ?>
      <!-- /footer content -->
    </div>
  </div>

  <?php include("common_libraries.php"); ?>

  <!-- Flot -->
  <script>
  $(document).ready(function() {
        //random data
         <?php

        $SQLFlot="SELECT m_venta_fechaAprobado, STR_TO_DATE(m_venta_fechaAprobado,'%Y-%m-%d') AS fecha, COUNT(*) vendidos FROM m_ventas WHERE STR_TO_DATE(m_venta_fechaAprobado,'%Y-%m-%d')  BETWEEN DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND CURDATE() GROUP BY fecha";
        $queryFlot=mysqli_query($link, $SQLFlot);
        while ($rowFlot=mysqli_fetch_array($queryFlot)) {
        $m_venta_fechaAprobado=date("j", strtotime($rowFlot["m_venta_fechaAprobado"]));
        $vendidos=$rowFlot["vendidos"];
         $array.="[".$m_venta_fechaAprobado.",".$vendidos."],";
        }
        $array = trim($array, ',');
        ?>
        var d1 = [
        <?php print_r($array);?>
        ];

        //flot options
        var options = {
          series: {
            curvedLines: {
              apply: true,
              active: true,
              monotonicFit: true
            }
          },
          colors: ["#26B99A"],
          grid: {
            borderWidth: {
              top: 0,
              right: 0,
              bottom: 1,
              left: 1
            },
            borderColor: {
              bottom: "#7F8790",
              left: "#7F8790"
            }
          }
        };
        var plot = $.plot($("#placeholder3xx3"), [{
          label: "Registrations",
          data: d1,
          lines: {
            fillColor: "rgba(150, 202, 89, 0.12)"
          }, //#96CA59 rgba(150, 202, 89, 0.42)
          points: {
            fillColor: "#fff"
          }
        }], options);
      });
</script>
<!-- /Flot -->



</body>
</html>