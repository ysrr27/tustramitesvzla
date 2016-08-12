<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();


if((isset($_GET["id"]))&&($_GET["id"]!="")){ $idServicio= $_GET["id"]; }

$SQL="SELECT * FROM m_servicios WHERE m_servicio_id = '$idServicio'";
$query=mysqli_query($link, $SQL);
while ($row=mysqli_fetch_array($query)) {
  $m_servicio_nombre=$row["m_servicio_nombre"];
  $m_servicio_descripcion =$row["m_servicio_descripcion"];
  $m_servicio_icono=$row["m_servicio_icono"];
  $m_servicio_estatus=$row["m_servicio_estatus"];
}

//RECAUDOS
$SQLRecaudos="SELECT r_recaudos_servicio_idRecaudo FROM r_recaudos_servicios WHERE r_recaudos_servicios_idServicio='$idServicio'";
$queryRecaudos=mysqli_query($link, $SQLRecaudos);
$recaudos = array();

while ($rowRecaudos=mysqli_fetch_array($queryRecaudos)) {
  $r_recaudos_servicio_idRecaudo=$rowRecaudos["r_recaudos_servicio_idRecaudo"];
  $recaudos[] = $r_recaudos_servicio_idRecaudo;
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
  <!-- Select2 -->
  <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="../css/custom.css" rel="stylesheet">
  <!-- bootstrap-wysiwyg -->
  <link href="../css/bootstrap-select.min.css" rel="stylesheet">
  <link href="../css/fileinput.css" rel="stylesheet">
  <link rel="stylesheet" href="../fonts/gi/genericons.css">
  <link rel="stylesheet" href="../css/icon-picker.min.css">


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
              <h3>Registro de Servicio</h3>
            </div>
            
          </div>
          <div class="clearfix"></div>


          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Información del servicio a ofertar</h2>
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
                  <form class="form-horizontal form-label-left" method="POST" action="addServicio.php" data-parsley-validate id="formServicios" name="formServicios" enctype="multipart/form-data">
                     <input type="hidden" name="idServicio" value="<?=$idServicio?>" />
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Nombre del Servicio:</label>
                      <span class="fa fa-text-height form-control-feedback left" aria-hidden="true"></span>
                      <input type="text" name="tituloServicio" class="form-control has-feedback-left" id="tituloServicio" value="<?=$m_servicio_nombre?>" placeholder="Nombre del Servicio">
                      
                    </div>



                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Recaudos necesarios:</label>
                      <select class="selectpicker" multiple name="recaudos[]">                       
                       <?php
                       $SQLRecaudos="SELECT * FROM m_recaudos WHERE m_recaudo_estatus  ='1'  ORDER BY m_recaudo_nombre ASC";
                       $queryRecaudos=mysqli_query($link, $SQLRecaudos);
                       while ($rowRecaudos=mysqli_fetch_array($queryRecaudos)) {
                        $m_recaudo_id=$rowRecaudos["m_recaudo_id"];
                        $m_recaudo_nombre=$rowRecaudos["m_recaudo_nombre"];


                        if (in_array("$m_recaudo_id", $recaudos)) {
                          $existe="selected";
                        }
                        else{
                          $existe="";
                        }
                        ?>
                        <option value="<?=$m_recaudo_id?>" <?=$existe?> ><?=$m_recaudo_nombre?></option>

                        <?php } ?>
                      </select>

                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                      <label>Ícono del Servicio: </label>

                      <div class="icon-picker" data-pickerid="fa" data-iconsets='{"fa":"Cambiar el ícono"}'>
                        <input type="text" value="<?=$m_servicio_icono?>" size="1" name="iconoServicio" style="border:0px; color:#FFFFFF;" />
                      </div>
                    </div>






                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Descripción del Servicio</h2>
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


                          <div id="alerts"></div>
                          <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                            <div class="btn-group">
                              <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                              <ul class="dropdown-menu">
                              </ul>
                            </div>
                            <div class="btn-group">
                              <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                              <ul class="dropdown-menu">
                                <li>
                                  <a data-edit="fontSize 5">
                                    <p style="font-size:17px">Huge</p>
                                  </a>
                                </li>
                                <li>
                                  <a data-edit="fontSize 3">
                                    <p style="font-size:14px">Normal</p>
                                  </a>
                                </li>
                                <li>
                                  <a data-edit="fontSize 1">
                                    <p style="font-size:11px">Small</p>
                                  </a>
                                </li>
                              </ul>
                            </div>
                            <div class="btn-group">
                              <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                              <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                              <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                              <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                            </div>
                            <div class="btn-group">
                              <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                              <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                              <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                              <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                            </div>
                            <div class="btn-group">
                              <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                              <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                              <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                              <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                            </div>
                            <div class="btn-group">
                              <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                              <div class="dropdown-menu input-append">
                                <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                <button class="btn" type="button">Add</button>
                              </div>
                              <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>

                            </div>


                            <div class="btn-group">
                              <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                              <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                            </div>
                          </div>

                          <div id="editor">
                             <?=$m_servicio_descripcion?>
                          </div>
                          <input type="hidden" name="descripcion" id="descripcion">

                          <div class="ln_solid"></div>

                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label for="message">Estatus del Servivio :</label>
                    <div class="radio" id="EstatusRadio">

                     <input type="checkbox" class="js-switch" id="estatus" name="estatus" value="1"  <?php if($m_servicio_estatus){ echo "checked='checked'"; } ?>/> 
                     <label id="estatusText" for="estatus"><?php if($m_servicio_estatus){ echo "Activo"; } else{ echo "Inactivo"; }?></label>
                   </div>
                 </div>

               </div>



               <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">

                  <button type="submit" class="btn btn-success" id="btn_enviar">Guardar</button>
                  <button type="button" onClick="document.location.href='listar.php'" class="btn btn-warning" >Cancelar</button>
                </div>
              </div>


            </div>





          </form>
        </div>
      </div>
    </div>


    <div class="fa-set icon-set">
      <ul>
        <li data-code="f042" data-class="fa fa-adjust" class="fa fa-adjust"></li>
        <li data-code="f170" data-class="fa fa-adn" class="fa fa-adn"></li>
        <li data-code="f037" data-class="fa fa-align-center" class="fa fa-align-center"></li>
        <li data-code="f039" data-class="fa fa-align-justify" class="fa fa-align-justify"></li>
        <li data-code="f036" data-class="fa fa-align-left" class="fa fa-align-left"></li>
        <li data-code="f038" data-class="fa fa-align-right" class="fa fa-align-right"></li>
        <li data-code="f0f9" data-class="fa fa-ambulance" class="fa fa-ambulance"></li>
        <li data-code="f13d" data-class="fa fa-anchor" class="fa fa-anchor"></li>
        <li data-code="f17b" data-class="fa fa-android" class="fa fa-android"></li>
        <li data-code="f103" data-class="fa fa-angle-double-down" class="fa fa-angle-double-down"></li>
        <li data-code="f100" data-class="fa fa-angle-double-left" class="fa fa-angle-double-left"></li>
        <li data-code="f101" data-class="fa fa-angle-double-right" class="fa fa-angle-double-right"></li>
        <li data-code="f102" data-class="fa fa-angle-double-up" class="fa fa-angle-double-up"></li>
        <li data-code="f107" data-class="fa fa-angle-down" class="fa fa-angle-down"></li>
        <li data-code="f104" data-class="fa fa-angle-left" class="fa fa-angle-left"></li>
        <li data-code="f105" data-class="fa fa-angle-right" class="fa fa-angle-right"></li>
        <li data-code="f106" data-class="fa fa-angle-up" class="fa fa-angle-up"></li>
        <li data-code="f179" data-class="fa fa-apple" class="fa fa-apple"></li>
        <li data-code="f187" data-class="fa fa-archive" class="fa fa-archive"></li>
        <li data-code="f0ab" data-class="fa fa-arrow-circle-down" class="fa fa-arrow-circle-down"></li>
        <li data-code="f0a8" data-class="fa fa-arrow-circle-left" class="fa fa-arrow-circle-left"></li>
        <li data-code="f01a" data-class="fa fa-arrow-circle-o-down" class="fa fa-arrow-circle-o-down"></li>
        <li data-code="f190" data-class="fa fa-arrow-circle-o-left" class="fa fa-arrow-circle-o-left"></li>
        <li data-code="f18e" data-class="fa fa-arrow-circle-o-right" class="fa fa-arrow-circle-o-right"></li>
        <li data-code="f01b" data-class="fa fa-arrow-circle-o-up" class="fa fa-arrow-circle-o-up"></li>
        <li data-code="f0a9" data-class="fa fa-arrow-circle-right" class="fa fa-arrow-circle-right"></li>
        <li data-code="f0aa" data-class="fa fa-arrow-circle-up" class="fa fa-arrow-circle-up"></li>
        <li data-code="f063" data-class="fa fa-arrow-down" class="fa fa-arrow-down"></li>
        <li data-code="f060" data-class="fa fa-arrow-left" class="fa fa-arrow-left"></li>
        <li data-code="f061" data-class="fa fa-arrow-right" class="fa fa-arrow-right"></li>
        <li data-code="f062" data-class="fa fa-arrow-up" class="fa fa-arrow-up"></li>
        <li data-code="f047" data-class="fa fa-arrows" class="fa fa-arrows"></li>
        <li data-code="f0b2" data-class="fa fa-arrows-alt" class="fa fa-arrows-alt"></li>
        <li data-code="f07e" data-class="fa fa-arrows-h" class="fa fa-arrows-h"></li>
        <li data-code="f07d" data-class="fa fa-arrows-v" class="fa fa-arrows-v"></li>
        <li data-code="f069" data-class="fa fa-asterisk" class="fa fa-asterisk"></li>
        <li data-code="f1b9" data-class="fa fa-automobile" class="fa fa-automobile"></li>
        <li data-code="f04a" data-class="fa fa-backward" class="fa fa-backward"></li>
        <li data-code="f05e" data-class="fa fa-ban" class="fa fa-ban"></li>
        <li data-code="f19c" data-class="fa fa-bank" class="fa fa-bank"></li>
        <li data-code="f080" data-class="fa fa-bar-chart-o" class="fa fa-bar-chart-o"></li>
        <li data-code="f02a" data-class="fa fa-barcode" class="fa fa-barcode"></li>
        <li data-code="f0c9" data-class="fa fa-bars" class="fa fa-bars"></li>
        <li data-code="f0fc" data-class="fa fa-beer" class="fa fa-beer"></li>
        <li data-code="f1b4" data-class="fa fa-behance" class="fa fa-behance"></li>
        <li data-code="f1b5" data-class="fa fa-behance-square" class="fa fa-behance-square"></li>
        <li data-code="f0f3" data-class="fa fa-bell" class="fa fa-bell"></li>
        <li data-code="f0a2" data-class="fa fa-bell-o" class="fa fa-bell-o"></li>
        <li data-code="f171" data-class="fa fa-bitbucket" class="fa fa-bitbucket"></li>
        <li data-code="f172" data-class="fa fa-bitbucket-square" class="fa fa-bitbucket-square"></li>
        <li data-code="f15a" data-class="fa fa-bitcoin" class="fa fa-bitcoin"></li>
        <li data-code="f032" data-class="fa fa-bold" class="fa fa-bold"></li>
        <li data-code="f0e7" data-class="fa fa-bolt" class="fa fa-bolt"></li>
        <li data-code="f1e2" data-class="fa fa-bomb" class="fa fa-bomb"></li>
        <li data-code="f02d" data-class="fa fa-book" class="fa fa-book"></li>
        <li data-code="f02e" data-class="fa fa-bookmark" class="fa fa-bookmark"></li>
        <li data-code="f097" data-class="fa fa-bookmark-o" class="fa fa-bookmark-o"></li>
        <li data-code="f0b1" data-class="fa fa-briefcase" class="fa fa-briefcase"></li>
        <li data-code="f15a" data-class="fa fa-btc" class="fa fa-btc"></li>
        <li data-code="f188" data-class="fa fa-bug" class="fa fa-bug"></li>
        <li data-code="f1ad" data-class="fa fa-building" class="fa fa-building"></li>
        <li data-code="f0f7" data-class="fa fa-building-o" class="fa fa-building-o"></li>
        <li data-code="f0a1" data-class="fa fa-bullhorn" class="fa fa-bullhorn"></li>
        <li data-code="f140" data-class="fa fa-bullseye" class="fa fa-bullseye"></li>
        <li data-code="f1ba" data-class="fa fa-cab" class="fa fa-cab"></li>
        <li data-code="f073" data-class="fa fa-calendar" class="fa fa-calendar"></li>
        <li data-code="f133" data-class="fa fa-calendar-o" class="fa fa-calendar-o"></li>
        <li data-code="f030" data-class="fa fa-camera" class="fa fa-camera"></li>
        <li data-code="f083" data-class="fa fa-camera-retro" class="fa fa-camera-retro"></li>
        <li data-code="f1b9" data-class="fa fa-car" class="fa fa-car"></li>
        <li data-code="f0d7" data-class="fa fa-caret-down" class="fa fa-caret-down"></li>
        <li data-code="f0d9" data-class="fa fa-caret-left" class="fa fa-caret-left"></li>
        <li data-code="f0da" data-class="fa fa-caret-right" class="fa fa-caret-right"></li>
        <li data-code="f150" data-class="fa fa-caret-square-o-down" class="fa fa-caret-square-o-down"></li>
        <li data-code="f191" data-class="fa fa-caret-square-o-left" class="fa fa-caret-square-o-left"></li>
        <li data-code="f152" data-class="fa fa-caret-square-o-right" class="fa fa-caret-square-o-right"></li>
        <li data-code="f151" data-class="fa fa-caret-square-o-up" class="fa fa-caret-square-o-up"></li>
        <li data-code="f0d8" data-class="fa fa-caret-up" class="fa fa-caret-up"></li>
        <li data-code="f0a3" data-class="fa fa-certificate" class="fa fa-certificate"></li>
        <li data-code="f0c1" data-class="fa fa-chain" class="fa fa-chain"></li>
        <li data-code="f127" data-class="fa fa-chain-broken" class="fa fa-chain-broken"></li>
        <li data-code="f00c" data-class="fa fa-check" class="fa fa-check"></li>
        <li data-code="f058" data-class="fa fa-check-circle" class="fa fa-check-circle"></li>
        <li data-code="f05d" data-class="fa fa-check-circle-o" class="fa fa-check-circle-o"></li>
        <li data-code="f14a" data-class="fa fa-check-square" class="fa fa-check-square"></li>
        <li data-code="f046" data-class="fa fa-check-square-o" class="fa fa-check-square-o"></li>
        <li data-code="f13a" data-class="fa fa-chevron-circle-down" class="fa fa-chevron-circle-down"></li>
        <li data-code="f137" data-class="fa fa-chevron-circle-left" class="fa fa-chevron-circle-left"></li>
        <li data-code="f138" data-class="fa fa-chevron-circle-right" class="fa fa-chevron-circle-right"></li>
        <li data-code="f139" data-class="fa fa-chevron-circle-up" class="fa fa-chevron-circle-up"></li>
        <li data-code="f078" data-class="fa fa-chevron-down" class="fa fa-chevron-down"></li>
        <li data-code="f053" data-class="fa fa-chevron-left" class="fa fa-chevron-left"></li>
        <li data-code="f054" data-class="fa fa-chevron-right" class="fa fa-chevron-right"></li>
        <li data-code="f077" data-class="fa fa-chevron-up" class="fa fa-chevron-up"></li>
        <li data-code="f1ae" data-class="fa fa-child" class="fa fa-child"></li>
        <li data-code="f111" data-class="fa fa-circle" class="fa fa-circle"></li>
        <li data-code="f10c" data-class="fa fa-circle-o" class="fa fa-circle-o"></li>
        <li data-code="f1ce" data-class="fa fa-circle-o-notch" class="fa fa-circle-o-notch"></li>
        <li data-code="f1db" data-class="fa fa-circle-thin" class="fa fa-circle-thin"></li>
        <li data-code="f0ea" data-class="fa fa-clipboard" class="fa fa-clipboard"></li>
        <li data-code="f017" data-class="fa fa-clock-o" class="fa fa-clock-o"></li>
        <li data-code="f0c2" data-class="fa fa-cloud" class="fa fa-cloud"></li>
        <li data-code="f0ed" data-class="fa fa-cloud-download" class="fa fa-cloud-download"></li>
        <li data-code="f0ee" data-class="fa fa-cloud-upload" class="fa fa-cloud-upload"></li>
        <li data-code="f157" data-class="fa fa-cny" class="fa fa-cny"></li>
        <li data-code="f121" data-class="fa fa-code" class="fa fa-code"></li>
        <li data-code="f126" data-class="fa fa-code-fork" class="fa fa-code-fork"></li>
        <li data-code="f1cb" data-class="fa fa-codepen" class="fa fa-codepen"></li>
        <li data-code="f0f4" data-class="fa fa-coffee" class="fa fa-coffee"></li>
        <li data-code="f013" data-class="fa fa-cog" class="fa fa-cog"></li>
        <li data-code="f085" data-class="fa fa-cogs" class="fa fa-cogs"></li>
        <li data-code="f0db" data-class="fa fa-columns" class="fa fa-columns"></li>
        <li data-code="f075" data-class="fa fa-comment" class="fa fa-comment"></li>
        <li data-code="f0e5" data-class="fa fa-comment-o" class="fa fa-comment-o"></li>
        <li data-code="f086" data-class="fa fa-comments" class="fa fa-comments"></li>
        <li data-code="f0e6" data-class="fa fa-comments-o" class="fa fa-comments-o"></li>
        <li data-code="f14e" data-class="fa fa-compass" class="fa fa-compass"></li>
        <li data-code="f066" data-class="fa fa-compress" class="fa fa-compress"></li>
        <li data-code="f0c5" data-class="fa fa-copy" class="fa fa-copy"></li>
        <li data-code="f09d" data-class="fa fa-credit-card" class="fa fa-credit-card"></li>
        <li data-code="f125" data-class="fa fa-crop" class="fa fa-crop"></li>
        <li data-code="f05b" data-class="fa fa-crosshairs" class="fa fa-crosshairs"></li>
        <li data-code="f13c" data-class="fa fa-css3" class="fa fa-css3"></li>
        <li data-code="f1b2" data-class="fa fa-cube" class="fa fa-cube"></li>
        <li data-code="f1b3" data-class="fa fa-cubes" class="fa fa-cubes"></li>
        <li data-code="f0c4" data-class="fa fa-cut" class="fa fa-cut"></li>
        <li data-code="f0f5" data-class="fa fa-cutlery" class="fa fa-cutlery"></li>
        <li data-code="f0e4" data-class="fa fa-dashboard" class="fa fa-dashboard"></li>
        <li data-code="f1c0" data-class="fa fa-database" class="fa fa-database"></li>
        <li data-code="f03b" data-class="fa fa-dedent" class="fa fa-dedent"></li>
        <li data-code="f1a5" data-class="fa fa-delicious" class="fa fa-delicious"></li>
        <li data-code="f108" data-class="fa fa-desktop" class="fa fa-desktop"></li>
        <li data-code="f1bd" data-class="fa fa-deviantart" class="fa fa-deviantart"></li>
        <li data-code="f1a6" data-class="fa fa-digg" class="fa fa-digg"></li>
        <li data-code="f155" data-class="fa fa-dollar" class="fa fa-dollar"></li>
        <li data-code="f192" data-class="fa fa-dot-circle-o" class="fa fa-dot-circle-o"></li>
        <li data-code="f019" data-class="fa fa-download" class="fa fa-download"></li>
        <li data-code="f17d" data-class="fa fa-dribbble" class="fa fa-dribbble"></li>
        <li data-code="f16b" data-class="fa fa-dropbox" class="fa fa-dropbox"></li>
        <li data-code="f1a9" data-class="fa fa-drupal" class="fa fa-drupal"></li>
        <li data-code="f044" data-class="fa fa-edit" class="fa fa-edit"></li>
        <li data-code="f052" data-class="fa fa-eject" class="fa fa-eject"></li>
        <li data-code="f141" data-class="fa fa-ellipsis-h" class="fa fa-ellipsis-h"></li>
        <li data-code="f142" data-class="fa fa-ellipsis-v" class="fa fa-ellipsis-v"></li>
        <li data-code="f1d1" data-class="fa fa-empire" class="fa fa-empire"></li>
        <li data-code="f0e0" data-class="fa fa-envelope" class="fa fa-envelope"></li>
        <li data-code="f003" data-class="fa fa-envelope-o" class="fa fa-envelope-o"></li>
        <li data-code="f199" data-class="fa fa-envelope-square" class="fa fa-envelope-square"></li>
        <li data-code="f12d" data-class="fa fa-eraser" class="fa fa-eraser"></li>
        <li data-code="f153" data-class="fa fa-eur" class="fa fa-eur"></li>
        <li data-code="f153" data-class="fa fa-euro" class="fa fa-euro"></li>
        <li data-code="f0ec" data-class="fa fa-exchange" class="fa fa-exchange"></li>
        <li data-code="f12a" data-class="fa fa-exclamation" class="fa fa-exclamation"></li>
        <li data-code="f06a" data-class="fa fa-exclamation-circle" class="fa fa-exclamation-circle"></li>
        <li data-code="f071" data-class="fa fa-exclamation-triangle" class="fa fa-exclamation-triangle"></li>
        <li data-code="f065" data-class="fa fa-expand" class="fa fa-expand"></li>
        <li data-code="f08e" data-class="fa fa-external-link" class="fa fa-external-link"></li>
        <li data-code="f14c" data-class="fa fa-external-link-square" class="fa fa-external-link-square"></li>
        <li data-code="f06e" data-class="fa fa-eye" class="fa fa-eye"></li>
        <li data-code="f070" data-class="fa fa-eye-slash" class="fa fa-eye-slash"></li>
        <li data-code="f09a" data-class="fa fa-facebook" class="fa fa-facebook"></li>
        <li data-code="f082" data-class="fa fa-facebook-square" class="fa fa-facebook-square"></li>
        <li data-code="f049" data-class="fa fa-fast-backward" class="fa fa-fast-backward"></li>
        <li data-code="f050" data-class="fa fa-fast-forward" class="fa fa-fast-forward"></li>
        <li data-code="f1ac" data-class="fa fa-fax" class="fa fa-fax"></li>
        <li data-code="f182" data-class="fa fa-female" class="fa fa-female"></li>
        <li data-code="f0fb" data-class="fa fa-fighter-jet" class="fa fa-fighter-jet"></li>
        <li data-code="f15b" data-class="fa fa-file" class="fa fa-file"></li>
        <li data-code="f1c6" data-class="fa fa-file-archive-o" class="fa fa-file-archive-o"></li>
        <li data-code="f1c7" data-class="fa fa-file-audio-o" class="fa fa-file-audio-o"></li>
        <li data-code="f1c9" data-class="fa fa-file-code-o" class="fa fa-file-code-o"></li>
        <li data-code="f1c3" data-class="fa fa-file-excel-o" class="fa fa-file-excel-o"></li>
        <li data-code="f1c5" data-class="fa fa-file-image-o" class="fa fa-file-image-o"></li>
        <li data-code="f1c8" data-class="fa fa-file-movie-o" class="fa fa-file-movie-o"></li>
        <li data-code="f016" data-class="fa fa-file-o" class="fa fa-file-o"></li>
        <li data-code="f1c1" data-class="fa fa-file-pdf-o" class="fa fa-file-pdf-o"></li>
        <li data-code="f1c5" data-class="fa fa-file-photo-o" class="fa fa-file-photo-o"></li>
        <li data-code="f1c5" data-class="fa fa-file-picture-o" class="fa fa-file-picture-o"></li>
        <li data-code="f1c4" data-class="fa fa-file-powerpoint-o" class="fa fa-file-powerpoint-o"></li>
        <li data-code="f1c7" data-class="fa fa-file-sound-o" class="fa fa-file-sound-o"></li>
        <li data-code="f15c" data-class="fa fa-file-text" class="fa fa-file-text"></li>
        <li data-code="f0f6" data-class="fa fa-file-text-o" class="fa fa-file-text-o"></li>
        <li data-code="f1c8" data-class="fa fa-file-video-o" class="fa fa-file-video-o"></li>
        <li data-code="f1c2" data-class="fa fa-file-word-o" class="fa fa-file-word-o"></li>
        <li data-code="f1c6" data-class="fa fa-file-zip-o" class="fa fa-file-zip-o"></li>
        <li data-code="f0c5" data-class="fa fa-files-o" class="fa fa-files-o"></li>
        <li data-code="f008" data-class="fa fa-film" class="fa fa-film"></li>
        <li data-code="f0b0" data-class="fa fa-filter" class="fa fa-filter"></li>
        <li data-code="f06d" data-class="fa fa-fire" class="fa fa-fire"></li>
        <li data-code="f134" data-class="fa fa-fire-extinguisher" class="fa fa-fire-extinguisher"></li>
        <li data-code="f024" data-class="fa fa-flag" class="fa fa-flag"></li>
        <li data-code="f11e" data-class="fa fa-flag-checkered" class="fa fa-flag-checkered"></li>
        <li data-code="f11d" data-class="fa fa-flag-o" class="fa fa-flag-o"></li>
        <li data-code="f0e7" data-class="fa fa-flash" class="fa fa-flash"></li>
        <li data-code="f0c3" data-class="fa fa-flask" class="fa fa-flask"></li>
        <li data-code="f16e" data-class="fa fa-flickr" class="fa fa-flickr"></li>
        <li data-code="f0c7" data-class="fa fa-floppy-o" class="fa fa-floppy-o"></li>
        <li data-code="f07b" data-class="fa fa-folder" class="fa fa-folder"></li>
        <li data-code="f114" data-class="fa fa-folder-o" class="fa fa-folder-o"></li>
        <li data-code="f07c" data-class="fa fa-folder-open" class="fa fa-folder-open"></li>
        <li data-code="f115" data-class="fa fa-folder-open-o" class="fa fa-folder-open-o"></li>
        <li data-code="f031" data-class="fa fa-font" class="fa fa-font"></li>
        <li data-code="f04e" data-class="fa fa-forward" class="fa fa-forward"></li>
        <li data-code="f180" data-class="fa fa-foursquare" class="fa fa-foursquare"></li>
        <li data-code="f119" data-class="fa fa-frown-o" class="fa fa-frown-o"></li>
        <li data-code="f11b" data-class="fa fa-gamepad" class="fa fa-gamepad"></li>
        <li data-code="f0e3" data-class="fa fa-gavel" class="fa fa-gavel"></li>
        <li data-code="f154" data-class="fa fa-gbp" class="fa fa-gbp"></li>
        <li data-code="f1d1" data-class="fa fa-ge" class="fa fa-ge"></li>
        <li data-code="f013" data-class="fa fa-gear" class="fa fa-gear"></li>
        <li data-code="f085" data-class="fa fa-gears" class="fa fa-gears"></li>
        <li data-code="f06b" data-class="fa fa-gift" class="fa fa-gift"></li>
        <li data-code="f1d3" data-class="fa fa-git" class="fa fa-git"></li>
        <li data-code="f1d2" data-class="fa fa-git-square" class="fa fa-git-square"></li>
        <li data-code="f09b" data-class="fa fa-github" class="fa fa-github"></li>
        <li data-code="f113" data-class="fa fa-github-alt" class="fa fa-github-alt"></li>
        <li data-code="f092" data-class="fa fa-github-square" class="fa fa-github-square"></li>
        <li data-code="f184" data-class="fa fa-gittip" class="fa fa-gittip"></li>
        <li data-code="f000" data-class="fa fa-glass" class="fa fa-glass"></li>
        <li data-code="f0ac" data-class="fa fa-globe" class="fa fa-globe"></li>
        <li data-code="f1a0" data-class="fa fa-google" class="fa fa-google"></li>
        <li data-code="f0d5" data-class="fa fa-google-plus" class="fa fa-google-plus"></li>
        <li data-code="f0d4" data-class="fa fa-google-plus-square" class="fa fa-google-plus-square"></li>
        <li data-code="f19d" data-class="fa fa-graduation-cap" class="fa fa-graduation-cap"></li>
        <li data-code="f0c0" data-class="fa fa-group" class="fa fa-group"></li>
        <li data-code="f0fd" data-class="fa fa-h-square" class="fa fa-h-square"></li>
        <li data-code="f1d4" data-class="fa fa-hacker-news" class="fa fa-hacker-news"></li>
        <li data-code="f0a7" data-class="fa fa-hand-o-down" class="fa fa-hand-o-down"></li>
        <li data-code="f0a5" data-class="fa fa-hand-o-left" class="fa fa-hand-o-left"></li>
        <li data-code="f0a4" data-class="fa fa-hand-o-right" class="fa fa-hand-o-right"></li>
        <li data-code="f0a6" data-class="fa fa-hand-o-up" class="fa fa-hand-o-up"></li>
        <li data-code="f0a0" data-class="fa fa-hdd-o" class="fa fa-hdd-o"></li>
        <li data-code="f1dc" data-class="fa fa-header" class="fa fa-header"></li>
        <li data-code="f025" data-class="fa fa-headphones" class="fa fa-headphones"></li>
        <li data-code="f004" data-class="fa fa-heart" class="fa fa-heart"></li>
        <li data-code="f08a" data-class="fa fa-heart-o" class="fa fa-heart-o"></li>
        <li data-code="f1da" data-class="fa fa-history" class="fa fa-history"></li>
        <li data-code="f015" data-class="fa fa-home" class="fa fa-home"></li>
        <li data-code="f0f8" data-class="fa fa-hospital-o" class="fa fa-hospital-o"></li>
        <li data-code="f13b" data-class="fa fa-html5" class="fa fa-html5"></li>
        <li data-code="f03e" data-class="fa fa-image" class="fa fa-image"></li>
        <li data-code="f01c" data-class="fa fa-inbox" class="fa fa-inbox"></li>
        <li data-code="f03c" data-class="fa fa-indent" class="fa fa-indent"></li>
        <li data-code="f129" data-class="fa fa-info" class="fa fa-info"></li>
        <li data-code="f05a" data-class="fa fa-info-circle" class="fa fa-info-circle"></li>
        <li data-code="f156" data-class="fa fa-inr" class="fa fa-inr"></li>
        <li data-code="f16d" data-class="fa fa-instagram" class="fa fa-instagram"></li>
        <li data-code="f19c" data-class="fa fa-institution" class="fa fa-institution"></li>
        <li data-code="f033" data-class="fa fa-italic" class="fa fa-italic"></li>
        <li data-code="f1aa" data-class="fa fa-joomla" class="fa fa-joomla"></li>
        <li data-code="f157" data-class="fa fa-jpy" class="fa fa-jpy"></li>
        <li data-code="f1cc" data-class="fa fa-jsfiddle" class="fa fa-jsfiddle"></li>
        <li data-code="f084" data-class="fa fa-key" class="fa fa-key"></li>
        <li data-code="f11c" data-class="fa fa-keyboard-o" class="fa fa-keyboard-o"></li>
        <li data-code="f159" data-class="fa fa-krw" class="fa fa-krw"></li>
        <li data-code="f1ab" data-class="fa fa-language" class="fa fa-language"></li>
        <li data-code="f109" data-class="fa fa-laptop" class="fa fa-laptop"></li>
        <li data-code="f06c" data-class="fa fa-leaf" class="fa fa-leaf"></li>
        <li data-code="f0e3" data-class="fa fa-legal" class="fa fa-legal"></li>
        <li data-code="f094" data-class="fa fa-lemon-o" class="fa fa-lemon-o"></li>
        <li data-code="f149" data-class="fa fa-level-down" class="fa fa-level-down"></li>
        <li data-code="f148" data-class="fa fa-level-up" class="fa fa-level-up"></li>
        <li data-code="f1cd" data-class="fa fa-life-bouy" class="fa fa-life-bouy"></li>
        <li data-code="f1cd" data-class="fa fa-life-ring" class="fa fa-life-ring"></li>
        <li data-code="f1cd" data-class="fa fa-life-saver" class="fa fa-life-saver"></li>
        <li data-code="f0eb" data-class="fa fa-lightbulb-o" class="fa fa-lightbulb-o"></li>
        <li data-code="f0c1" data-class="fa fa-link" class="fa fa-link"></li>
        <li data-code="f0e1" data-class="fa fa-linkedin" class="fa fa-linkedin"></li>
        <li data-code="f08c" data-class="fa fa-linkedin-square" class="fa fa-linkedin-square"></li>
        <li data-code="f17c" data-class="fa fa-linux" class="fa fa-linux"></li>
        <li data-code="f03a" data-class="fa fa-list" class="fa fa-list"></li>
        <li data-code="f022" data-class="fa fa-list-alt" class="fa fa-list-alt"></li>
        <li data-code="f0cb" data-class="fa fa-list-ol" class="fa fa-list-ol"></li>
        <li data-code="f0ca" data-class="fa fa-list-ul" class="fa fa-list-ul"></li>
        <li data-code="f124" data-class="fa fa-location-arrow" class="fa fa-location-arrow"></li>
        <li data-code="f023" data-class="fa fa-lock" class="fa fa-lock"></li>
        <li data-code="f175" data-class="fa fa-long-arrow-down" class="fa fa-long-arrow-down"></li>
        <li data-code="f177" data-class="fa fa-long-arrow-left" class="fa fa-long-arrow-left"></li>
        <li data-code="f178" data-class="fa fa-long-arrow-right" class="fa fa-long-arrow-right"></li>
        <li data-code="f176" data-class="fa fa-long-arrow-up" class="fa fa-long-arrow-up"></li>
        <li data-code="f0d0" data-class="fa fa-magic" class="fa fa-magic"></li>
        <li data-code="f076" data-class="fa fa-magnet" class="fa fa-magnet"></li>
        <li data-code="f064" data-class="fa fa-mail-forward" class="fa fa-mail-forward"></li>
        <li data-code="f112" data-class="fa fa-mail-reply" class="fa fa-mail-reply"></li>
        <li data-code="f122" data-class="fa fa-mail-reply-all" class="fa fa-mail-reply-all"></li>
        <li data-code="f183" data-class="fa fa-male" class="fa fa-male"></li>
        <li data-code="f041" data-class="fa fa-map-marker" class="fa fa-map-marker"></li>
        <li data-code="f136" data-class="fa fa-maxcdn" class="fa fa-maxcdn"></li>
        <li data-code="f0fa" data-class="fa fa-medkit" class="fa fa-medkit"></li>
        <li data-code="f11a" data-class="fa fa-meh-o" class="fa fa-meh-o"></li>
        <li data-code="f130" data-class="fa fa-microphone" class="fa fa-microphone"></li>
        <li data-code="f131" data-class="fa fa-microphone-slash" class="fa fa-microphone-slash"></li>
        <li data-code="f068" data-class="fa fa-minus" class="fa fa-minus"></li>
        <li data-code="f056" data-class="fa fa-minus-circle" class="fa fa-minus-circle"></li>
        <li data-code="f146" data-class="fa fa-minus-square" class="fa fa-minus-square"></li>
        <li data-code="f147" data-class="fa fa-minus-square-o" class="fa fa-minus-square-o"></li>
        <li data-code="f10b" data-class="fa fa-mobile" class="fa fa-mobile"></li>
        <li data-code="f10b" data-class="fa fa-mobile-phone" class="fa fa-mobile-phone"></li>
        <li data-code="f0d6" data-class="fa fa-money" class="fa fa-money"></li>
        <li data-code="f186" data-class="fa fa-moon-o" class="fa fa-moon-o"></li>
        <li data-code="f19d" data-class="fa fa-mortar-board" class="fa fa-mortar-board"></li>
        <li data-code="f001" data-class="fa fa-music" class="fa fa-music"></li>
        <li data-code="f0c9" data-class="fa fa-navicon" class="fa fa-navicon"></li>
        <li data-code="f19b" data-class="fa fa-openid" class="fa fa-openid"></li>
        <li data-code="f03b" data-class="fa fa-outdent" class="fa fa-outdent"></li>
        <li data-code="f18c" data-class="fa fa-pagelines" class="fa fa-pagelines"></li>
        <li data-code="f1d8" data-class="fa fa-paper-plane" class="fa fa-paper-plane"></li>
        <li data-code="f1d9" data-class="fa fa-paper-plane-o" class="fa fa-paper-plane-o"></li>
        <li data-code="f0c6" data-class="fa fa-paperclip" class="fa fa-paperclip"></li>
        <li data-code="f1dd" data-class="fa fa-paragraph" class="fa fa-paragraph"></li>
        <li data-code="f0ea" data-class="fa fa-paste" class="fa fa-paste"></li>
        <li data-code="f04c" data-class="fa fa-pause" class="fa fa-pause"></li>
        <li data-code="f1b0" data-class="fa fa-paw" class="fa fa-paw"></li>
        <li data-code="f040" data-class="fa fa-pencil" class="fa fa-pencil"></li>
        <li data-code="f14b" data-class="fa fa-pencil-square" class="fa fa-pencil-square"></li>
        <li data-code="f044" data-class="fa fa-pencil-square-o" class="fa fa-pencil-square-o"></li>
        <li data-code="f095" data-class="fa fa-phone" class="fa fa-phone"></li>
        <li data-code="f098" data-class="fa fa-phone-square" class="fa fa-phone-square"></li>
        <li data-code="f03e" data-class="fa fa-photo" class="fa fa-photo"></li>
        <li data-code="f03e" data-class="fa fa-picture-o" class="fa fa-picture-o"></li>
        <li data-code="f1a7" data-class="fa fa-pied-piper" class="fa fa-pied-piper"></li>
        <li data-code="f1a8" data-class="fa fa-pied-piper-alt" class="fa fa-pied-piper-alt"></li>
        <li data-code="f1a7" data-class="fa fa-pied-piper-square" class="fa fa-pied-piper-square"></li>
        <li data-code="f0d2" data-class="fa fa-pinterest" class="fa fa-pinterest"></li>
        <li data-code="f0d3" data-class="fa fa-pinterest-square" class="fa fa-pinterest-square"></li>
        <li data-code="f072" data-class="fa fa-plane" class="fa fa-plane"></li>
        <li data-code="f04b" data-class="fa fa-play" class="fa fa-play"></li>
        <li data-code="f144" data-class="fa fa-play-circle" class="fa fa-play-circle"></li>
        <li data-code="f01d" data-class="fa fa-play-circle-o" class="fa fa-play-circle-o"></li>
        <li data-code="f067" data-class="fa fa-plus" class="fa fa-plus"></li>
        <li data-code="f055" data-class="fa fa-plus-circle" class="fa fa-plus-circle"></li>
        <li data-code="f0fe" data-class="fa fa-plus-square" class="fa fa-plus-square"></li>
        <li data-code="f196" data-class="fa fa-plus-square-o" class="fa fa-plus-square-o"></li>
        <li data-code="f011" data-class="fa fa-power-off" class="fa fa-power-off"></li>
        <li data-code="f02f" data-class="fa fa-print" class="fa fa-print"></li>
        <li data-code="f12e" data-class="fa fa-puzzle-piece" class="fa fa-puzzle-piece"></li>
        <li data-code="f1d6" data-class="fa fa-qq" class="fa fa-qq"></li>
        <li data-code="f029" data-class="fa fa-qrcode" class="fa fa-qrcode"></li>
        <li data-code="f128" data-class="fa fa-question" class="fa fa-question"></li>
        <li data-code="f059" data-class="fa fa-question-circle" class="fa fa-question-circle"></li>
        <li data-code="f10d" data-class="fa fa-quote-left" class="fa fa-quote-left"></li>
        <li data-code="f10e" data-class="fa fa-quote-right" class="fa fa-quote-right"></li>
        <li data-code="f1d0" data-class="fa fa-ra" class="fa fa-ra"></li>
        <li data-code="f074" data-class="fa fa-random" class="fa fa-random"></li>
        <li data-code="f1d0" data-class="fa fa-rebel" class="fa fa-rebel"></li>
        <li data-code="f1b8" data-class="fa fa-recycle" class="fa fa-recycle"></li>
        <li data-code="f1a1" data-class="fa fa-reddit" class="fa fa-reddit"></li>
        <li data-code="f1a2" data-class="fa fa-reddit-square" class="fa fa-reddit-square"></li>
        <li data-code="f021" data-class="fa fa-refresh" class="fa fa-refresh"></li>
        <li data-code="f18b" data-class="fa fa-renren" class="fa fa-renren"></li>
        <li data-code="f0c9" data-class="fa fa-reorder" class="fa fa-reorder"></li>
        <li data-code="f01e" data-class="fa fa-repeat" class="fa fa-repeat"></li>
        <li data-code="f112" data-class="fa fa-reply" class="fa fa-reply"></li>
        <li data-code="f122" data-class="fa fa-reply-all" class="fa fa-reply-all"></li>
        <li data-code="f079" data-class="fa fa-retweet" class="fa fa-retweet"></li>
        <li data-code="f157" data-class="fa fa-rmb" class="fa fa-rmb"></li>
        <li data-code="f018" data-class="fa fa-road" class="fa fa-road"></li>
        <li data-code="f135" data-class="fa fa-rocket" class="fa fa-rocket"></li>
        <li data-code="f0e2" data-class="fa fa-rotate-left" class="fa fa-rotate-left"></li>
        <li data-code="f01e" data-class="fa fa-rotate-right" class="fa fa-rotate-right"></li>
        <li data-code="f158" data-class="fa fa-rouble" class="fa fa-rouble"></li>
        <li data-code="f09e" data-class="fa fa-rss" class="fa fa-rss"></li>
        <li data-code="f143" data-class="fa fa-rss-square" class="fa fa-rss-square"></li>
        <li data-code="f158" data-class="fa fa-rub" class="fa fa-rub"></li>
        <li data-code="f158" data-class="fa fa-ruble" class="fa fa-ruble"></li>
        <li data-code="f156" data-class="fa fa-rupee" class="fa fa-rupee"></li>
        <li data-code="f0c7" data-class="fa fa-save" class="fa fa-save"></li>
        <li data-code="f0c4" data-class="fa fa-scissors" class="fa fa-scissors"></li>
        <li data-code="f002" data-class="fa fa-search" class="fa fa-search"></li>
        <li data-code="f010" data-class="fa fa-search-minus" class="fa fa-search-minus"></li>
        <li data-code="f00e" data-class="fa fa-search-plus" class="fa fa-search-plus"></li>
        <li data-code="f1d8" data-class="fa fa-send" class="fa fa-send"></li>
        <li data-code="f1d9" data-class="fa fa-send-o" class="fa fa-send-o"></li>
        <li data-code="f064" data-class="fa fa-share" class="fa fa-share"></li>
        <li data-code="f1e0" data-class="fa fa-share-alt" class="fa fa-share-alt"></li>
        <li data-code="f1e1" data-class="fa fa-share-alt-square" class="fa fa-share-alt-square"></li>
        <li data-code="f14d" data-class="fa fa-share-square" class="fa fa-share-square"></li>
        <li data-code="f045" data-class="fa fa-share-square-o" class="fa fa-share-square-o"></li>
        <li data-code="f132" data-class="fa fa-shield" class="fa fa-shield"></li>
        <li data-code="f07a" data-class="fa fa-shopping-cart" class="fa fa-shopping-cart"></li>
        <li data-code="f090" data-class="fa fa-sign-in" class="fa fa-sign-in"></li>
        <li data-code="f08b" data-class="fa fa-sign-out" class="fa fa-sign-out"></li>
        <li data-code="f012" data-class="fa fa-signal" class="fa fa-signal"></li>
        <li data-code="f0e8" data-class="fa fa-sitemap" class="fa fa-sitemap"></li>
        <li data-code="f17e" data-class="fa fa-skype" class="fa fa-skype"></li>
        <li data-code="f198" data-class="fa fa-slack" class="fa fa-slack"></li>
        <li data-code="f1de" data-class="fa fa-sliders" class="fa fa-sliders"></li>
        <li data-code="f118" data-class="fa fa-smile-o" class="fa fa-smile-o"></li>
        <li data-code="f0dc" data-class="fa fa-sort" class="fa fa-sort"></li>
        <li data-code="f15d" data-class="fa fa-sort-alpha-asc" class="fa fa-sort-alpha-asc"></li>
        <li data-code="f15e" data-class="fa fa-sort-alpha-desc" class="fa fa-sort-alpha-desc"></li>
        <li data-code="f160" data-class="fa fa-sort-amount-asc" class="fa fa-sort-amount-asc"></li>
        <li data-code="f161" data-class="fa fa-sort-amount-desc" class="fa fa-sort-amount-desc"></li>
        <li data-code="f0de" data-class="fa fa-sort-asc" class="fa fa-sort-asc"></li>
        <li data-code="f0dd" data-class="fa fa-sort-desc" class="fa fa-sort-desc"></li>
        <li data-code="f0dd" data-class="fa fa-sort-down" class="fa fa-sort-down"></li>
        <li data-code="f162" data-class="fa fa-sort-numeric-asc" class="fa fa-sort-numeric-asc"></li>
        <li data-code="f163" data-class="fa fa-sort-numeric-desc" class="fa fa-sort-numeric-desc"></li>
        <li data-code="f0de" data-class="fa fa-sort-up" class="fa fa-sort-up"></li>
        <li data-code="f1be" data-class="fa fa-soundcloud" class="fa fa-soundcloud"></li>
        <li data-code="f197" data-class="fa fa-space-shuttle" class="fa fa-space-shuttle"></li>
        <li data-code="f110" data-class="fa fa-spinner" class="fa fa-spinner"></li>
        <li data-code="f1b1" data-class="fa fa-spoon" class="fa fa-spoon"></li>
        <li data-code="f1bc" data-class="fa fa-spotify" class="fa fa-spotify"></li>
        <li data-code="f0c8" data-class="fa fa-square" class="fa fa-square"></li>
        <li data-code="f096" data-class="fa fa-square-o" class="fa fa-square-o"></li>
        <li data-code="f18d" data-class="fa fa-stack-exchange" class="fa fa-stack-exchange"></li>
        <li data-code="f16c" data-class="fa fa-stack-overflow" class="fa fa-stack-overflow"></li>
        <li data-code="f005" data-class="fa fa-star" class="fa fa-star"></li>
        <li data-code="f089" data-class="fa fa-star-half" class="fa fa-star-half"></li>
        <li data-code="f123" data-class="fa fa-star-half-empty" class="fa fa-star-half-empty"></li>
        <li data-code="f123" data-class="fa fa-star-half-full" class="fa fa-star-half-full"></li>
        <li data-code="f123" data-class="fa fa-star-half-o" class="fa fa-star-half-o"></li>
        <li data-code="f006" data-class="fa fa-star-o" class="fa fa-star-o"></li>
        <li data-code="f1b6" data-class="fa fa-steam" class="fa fa-steam"></li>
        <li data-code="f1b7" data-class="fa fa-steam-square" class="fa fa-steam-square"></li>
        <li data-code="f048" data-class="fa fa-step-backward" class="fa fa-step-backward"></li>
        <li data-code="f051" data-class="fa fa-step-forward" class="fa fa-step-forward"></li>
        <li data-code="f0f1" data-class="fa fa-stethoscope" class="fa fa-stethoscope"></li>
        <li data-code="f04d" data-class="fa fa-stop" class="fa fa-stop"></li>
        <li data-code="f0cc" data-class="fa fa-strikethrough" class="fa fa-strikethrough"></li>
        <li data-code="f1a4" data-class="fa fa-stumbleupon" class="fa fa-stumbleupon"></li>
        <li data-code="f1a3" data-class="fa fa-stumbleupon-circle" class="fa fa-stumbleupon-circle"></li>
        <li data-code="f12c" data-class="fa fa-subscript" class="fa fa-subscript"></li>
        <li data-code="f0f2" data-class="fa fa-suitcase" class="fa fa-suitcase"></li>
        <li data-code="f185" data-class="fa fa-sun-o" class="fa fa-sun-o"></li>
        <li data-code="f12b" data-class="fa fa-superscript" class="fa fa-superscript"></li>
        <li data-code="f1cd" data-class="fa fa-support" class="fa fa-support"></li>
        <li data-code="f0ce" data-class="fa fa-table" class="fa fa-table"></li>
        <li data-code="f10a" data-class="fa fa-tablet" class="fa fa-tablet"></li>
        <li data-code="f0e4" data-class="fa fa-tachometer" class="fa fa-tachometer"></li>
        <li data-code="f02b" data-class="fa fa-tag" class="fa fa-tag"></li>
        <li data-code="f02c" data-class="fa fa-tags" class="fa fa-tags"></li>
        <li data-code="f0ae" data-class="fa fa-tasks" class="fa fa-tasks"></li>
        <li data-code="f1ba" data-class="fa fa-taxi" class="fa fa-taxi"></li>
        <li data-code="f1d5" data-class="fa fa-tencent-weibo" class="fa fa-tencent-weibo"></li>
        <li data-code="f120" data-class="fa fa-terminal" class="fa fa-terminal"></li>
        <li data-code="f034" data-class="fa fa-text-height" class="fa fa-text-height"></li>
        <li data-code="f035" data-class="fa fa-text-width" class="fa fa-text-width"></li>
        <li data-code="f00a" data-class="fa fa-th" class="fa fa-th"></li>
        <li data-code="f009" data-class="fa fa-th-large" class="fa fa-th-large"></li>
        <li data-code="f00b" data-class="fa fa-th-list" class="fa fa-th-list"></li>
        <li data-code="f08d" data-class="fa fa-thumb-tack" class="fa fa-thumb-tack"></li>
        <li data-code="f165" data-class="fa fa-thumbs-down" class="fa fa-thumbs-down"></li>
        <li data-code="f088" data-class="fa fa-thumbs-o-down" class="fa fa-thumbs-o-down"></li>
        <li data-code="f087" data-class="fa fa-thumbs-o-up" class="fa fa-thumbs-o-up"></li>
        <li data-code="f164" data-class="fa fa-thumbs-up" class="fa fa-thumbs-up"></li>
        <li data-code="f145" data-class="fa fa-ticket" class="fa fa-ticket"></li>
        <li data-code="f00d" data-class="fa fa-times" class="fa fa-times"></li>
        <li data-code="f057" data-class="fa fa-times-circle" class="fa fa-times-circle"></li>
        <li data-code="f05c" data-class="fa fa-times-circle-o" class="fa fa-times-circle-o"></li>
        <li data-code="f043" data-class="fa fa-tint" class="fa fa-tint"></li>
        <li data-code="f150" data-class="fa fa-toggle-down" class="fa fa-toggle-down"></li>
        <li data-code="f191" data-class="fa fa-toggle-left" class="fa fa-toggle-left"></li>
        <li data-code="f152" data-class="fa fa-toggle-right" class="fa fa-toggle-right"></li>
        <li data-code="f151" data-class="fa fa-toggle-up" class="fa fa-toggle-up"></li>
        <li data-code="f014" data-class="fa fa-trash-o" class="fa fa-trash-o"></li>
        <li data-code="f1bb" data-class="fa fa-tree" class="fa fa-tree"></li>
        <li data-code="f181" data-class="fa fa-trello" class="fa fa-trello"></li>
        <li data-code="f091" data-class="fa fa-trophy" class="fa fa-trophy"></li>
        <li data-code="f0d1" data-class="fa fa-truck" class="fa fa-truck"></li>
        <li data-code="f195" data-class="fa fa-try" class="fa fa-try"></li>
        <li data-code="f173" data-class="fa fa-tumblr" class="fa fa-tumblr"></li>
        <li data-code="f174" data-class="fa fa-tumblr-square" class="fa fa-tumblr-square"></li>
        <li data-code="f195" data-class="fa fa-turkish-lira" class="fa fa-turkish-lira"></li>
        <li data-code="f099" data-class="fa fa-twitter" class="fa fa-twitter"></li>
        <li data-code="f081" data-class="fa fa-twitter-square" class="fa fa-twitter-square"></li>
        <li data-code="f0e9" data-class="fa fa-umbrella" class="fa fa-umbrella"></li>
        <li data-code="f0cd" data-class="fa fa-underline" class="fa fa-underline"></li>
        <li data-code="f0e2" data-class="fa fa-undo" class="fa fa-undo"></li>
        <li data-code="f19c" data-class="fa fa-university" class="fa fa-university"></li>
        <li data-code="f127" data-class="fa fa-unlink" class="fa fa-unlink"></li>
        <li data-code="f09c" data-class="fa fa-unlock" class="fa fa-unlock"></li>
        <li data-code="f13e" data-class="fa fa-unlock-alt" class="fa fa-unlock-alt"></li>
        <li data-code="f0dc" data-class="fa fa-unsorted" class="fa fa-unsorted"></li>
        <li data-code="f093" data-class="fa fa-upload" class="fa fa-upload"></li>
        <li data-code="f155" data-class="fa fa-usd" class="fa fa-usd"></li>
        <li data-code="f007" data-class="fa fa-user" class="fa fa-user"></li>
        <li data-code="f0f0" data-class="fa fa-user-md" class="fa fa-user-md"></li>
        <li data-code="f0c0" data-class="fa fa-users" class="fa fa-users"></li>
        <li data-code="f03d" data-class="fa fa-video-camera" class="fa fa-video-camera"></li>
        <li data-code="f194" data-class="fa fa-vimeo-square" class="fa fa-vimeo-square"></li>
        <li data-code="f1ca" data-class="fa fa-vine" class="fa fa-vine"></li>
        <li data-code="f189" data-class="fa fa-vk" class="fa fa-vk"></li>
        <li data-code="f027" data-class="fa fa-volume-down" class="fa fa-volume-down"></li>
        <li data-code="f026" data-class="fa fa-volume-off" class="fa fa-volume-off"></li>
        <li data-code="f028" data-class="fa fa-volume-up" class="fa fa-volume-up"></li>
        <li data-code="f071" data-class="fa fa-warning" class="fa fa-warning"></li>
        <li data-code="f1d7" data-class="fa fa-wechat" class="fa fa-wechat"></li>
        <li data-code="f18a" data-class="fa fa-weibo" class="fa fa-weibo"></li>
        <li data-code="f1d7" data-class="fa fa-weixin" class="fa fa-weixin"></li>
        <li data-code="f193" data-class="fa fa-wheelchair" class="fa fa-wheelchair"></li>
        <li data-code="f17a" data-class="fa fa-windows" class="fa fa-windows"></li>
        <li data-code="f159" data-class="fa fa-won" class="fa fa-won"></li>
        <li data-code="f19a" data-class="fa fa-wordpress" class="fa fa-wordpress"></li>
        <li data-code="f0ad" data-class="fa fa-wrench" class="fa fa-wrench"></li>
        <li data-code="f168" data-class="fa fa-xing" class="fa fa-xing"></li>
        <li data-code="f169" data-class="fa fa-xing-square" class="fa fa-xing-square"></li>
        <li data-code="f19e" data-class="fa fa-yahoo" class="fa fa-yahoo"></li>
        <li data-code="f157" data-class="fa fa-yen" class="fa fa-yen"></li>
        <li data-code="f167" data-class="fa fa-youtube" class="fa fa-youtube"></li>
        <li data-code="f16a" data-class="fa fa-youtube-play" class="fa fa-youtube-play"></li>
        <li data-code="f166" data-class="fa fa-youtube-square" class="fa fa-youtube-square"></li>
      </ul>
    </div>
  </div>
</div>
<!-- /page content -->

<!-- footer content -->
<?php include("../common_footer.php"); ?>
<!-- /footer content -->
</div>
</div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->

<script type="text/javascript" src="../js/icon-picker.min.js"></script>

<!--UPLOAD FILES Lib-->
<script src="../js/fileinput.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- iCheck -->
<script src="../vendors/iCheck/icheck.min.js"></script>


<!-- Switchery -->
<script src="../vendors/switchery/dist/switchery.min.js"></script>



<!-- starrr -->
<script src="../js/validate/jquery.validate.js"></script>
<!-- Custom Theme Scripts -->
<script src="../js/custom.js"></script>

<!-- bootstrap-wysiwyg -->
<script src="../vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
<script src="../vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
<script src="../vendors/google-code-prettify/src/prettify.js"></script>

<script src="../js/bootstrap-select.min.js"></script>




<script type="text/javascript">
(function($){

  $(document).ready(function(){

    var $body = $('body');

    $('.icon-picker').qlIconPicker({
      'save': 'class'
    });
    $('.save-code').qlIconPicker({
      'save': 'code'
    });
    $('.icon-large').qlIconPicker({
      'size': 'large',
      'mode': 'inline'
    });
    $('.icon-dontclose').qlIconPicker({
      'mode': 'inline',
      'closeOnPick': false
    });

    $body.on('iconselected.queryloop', function(e, icon){
      console.log('Icon selected: ' + icon);
    });
    $body.on('iconpickershow.queryloop', function(e, mode){
      console.log('Icon picker shown, mode: ' + mode);
    });
    $body.on('iconpickerclose.queryloop', function(e, mode){
      console.log('Icon picker closed, mode: ' + mode);
    });

  });

})(jQuery);
</script>

<script type="text/javascript">


$("#EstatusRadio").click(function() {
  if ($('#estatus').prop('checked')) {
   $("#estatusText").html("<b>Activo</b>");
 }
 else{
  $("#estatusText").html("<b>Inactivo</b>");
}
});



</script>




<script>
$(function() {

  $("#formServicios").validate({

    rules: {
      tituloServicio: "required",
      recaudos: "required",
      iconoServicio: "required",
    },

    messages: {
      tituloServicio: "Debe Colocarle un titulo de su servicio",
      recaudos: "Debe especificar los recaudos necesarios",
      iconoServicio: "Debe selecionar un ícono para identificar el servicio"
    },

    submitHandler: function(form) {
      var desc=document.getElementById("editor").innerHTML;
      document.getElementById('descripcion').value = desc.trim() ;

      var formData = new FormData($("#formServicios")[0]);
      $.ajax({
        url: "modifyServicio.php",
        type: 'POST',
        enctype: 'multipart/form-data',
        data: formData,
        async: false,
        contentType: "application/json",
        dataType: "json",
        success: function (data) {
         if (data['success']) {
          $("#mensajes").css("z-index", "777");
          $($("#mensajes").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
          $('#dataMessage').append(data['data']['message']);
          setTimeout(function() { window.location.href = 'listar.php';}, 1000);
        } else{
          $("#mensajes").css("z-index", "888");
          $.each(data['data']['message'], function(index, val) {
            $($("#mensajes").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
            $('#dataMessage').append(val+ '<br>');
          });
          setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 2000);


        };

      },
      error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
      },
      cache: false,
      contentType: false,
      processData: false
    });

}
});

});


</script>





<!-- bootstrap-wysiwyg -->
<script>
$(document).ready(function() {
  function initToolbarBootstrapBindings() {
    var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
    'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
    'Times New Roman', 'Verdana'
    ],
    fontTarget = $('[title=Font]').siblings('.dropdown-menu');
    $.each(fonts, function(idx, fontName) {
      fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
    });
    $('a[title]').tooltip({
      container: 'body'
    });
    $('.dropdown-menu input').click(function() {
      return false;
    })
    .change(function() {
      $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
    })
    .keydown('esc', function() {
      this.value = '';
      $(this).change();
    });

    $('[data-role=magic-overlay]').each(function() {
      var overlay = $(this),
      target = $(overlay.data('target'));
      overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
    });

    if ("onwebkitspeechchange" in document.createElement("input")) {
      var editorOffset = $('#editor').offset();

      $('.voiceBtn').css('position', 'absolute').offset({
        top: editorOffset.top,
        left: editorOffset.left + $('#editor').innerWidth() - 35
      });
    } else {
      $('.voiceBtn').hide();
    }
  }

  function showErrorAlert(reason, detail) {
    var msg = '';
    if (reason === 'unsupported-file-type') {
      msg = "Unsupported format " + detail;
    } else {
      console.log("error uploading file", reason, detail);
    }
    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
      '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
  }

  initToolbarBootstrapBindings();

  $('#editor').wysiwyg({
    fileUploadError: showErrorAlert
  });

  window.prettyPrint;
  prettyPrint();
});
</script>
<!-- /bootstrap-wysiwyg -->


</body>
</html>

