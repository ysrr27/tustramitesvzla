<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();
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
              <h3>
                Categorías
                
              </h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search for...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">IR!</button>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <div class="clearfix"></div>

          <div class="row">


            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Categorías registradas</h2>
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
                  <div id="mensajes"> </div>
                </div>

                <div class="x_content">



                  <div class="table-responsive">
                    <table class="table table-striped jambo_table bulk_action">
                      <thead>
                        <tr class="headings">
                          <th>
                            <input type="checkbox" id="check-all" class="flat">
                          </th>
                          <th class="column-title">Categoría </th>
                          <th class="column-title">Descripción </th>
                          <th class="column-title">Estatus </th>
                          <th class="column-title no-link last"><span class="nobr">Acciones</span>
                          </th>

                        </tr>
                      </thead>

                      <tbody>

                        <?php
                        $SQL="SELECT * FROM m_recaudos ORDER BY m_recaudo_nombre ASC";
                        $query=mysqli_query($link, $SQL);
                        while ($row=mysqli_fetch_array($query)) {
                          $m_recaudo_id=$row["m_recaudo_id"];
                          $m_recaudo_nombre=$row["m_recaudo_nombre"];
                          $m_recaudo_descripcion=$row["m_recaudo_descripcion"];
                          $m_recaudo_estatus=$row["m_recaudo_estatus"];
                          if ($m_recaudo_estatus) {
                            $m_recaudo_estatus="ACTIVO";
                            $icon="power-off";
                            $text="Desactivar recaudo";
                            $nextStatus=0;
                            $color="success";
                          } else {
                            $m_recaudo_estatus="INACTIVO";
                            $icon="check";
                            $text="Activar recaudo";
                            $nextStatus=1;
                            $color="warning";
                          }
                          

                          ?>
                          <tr class="even pointer">
                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>
                            <td class=" "><?=$m_recaudo_nombre?></td>
                            <td class=" "><?=$m_recaudo_descripcion?> </td>
                            <td class=" "><button type="button" class="btn btn-<?=$color?>"><?=$m_recaudo_estatus?></button></td>
                            <td class=" ">

                              <?php if (control_access("RECAUDOS", 'EDITAR')) { ?>
                              <button type="button" title="Editar Recaudo" class="btn btn-default btn-xs EDITANDO" data-id="<?=$m_recaudo_id?>"> <i class="fa fa-edit"></i></button>
                              <?php } ?>

                              <?php if (control_access("RECAUDOS", 'ELIMINAR')) { ?>
                              <button type="button" class="btn btn-default btn-xs" data-id="<?=$m_recaudo_id?>" data-accion="<?=$nextStatus?>" data-title="Seguro que desea <?=$text?>?" data-trigger="focus" data-on-confirm="changeStatus" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-cancel-label="Cancelar!" data-placement="top" title="<?=$text?>?"> <i class="fa fa-<?=$icon?>"></i></button>
                              <?php } ?>
                              
                            </td>

                          </tr>

                          <?php } ?>

                        </tbody>
                      </table>
                    </div>
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
    <?php include("../common_libraries.php"); ?>
  </body>
  <script src="../js/bootstrap-confirmation.min.js"></script>
  <script>

  $('[data-toggle=confirmation]').confirmation();

  function deleteCategory(){

    var id = $(this).data('id');

    $.ajax({
      url: "deleteRecaudo.php",
      type: 'GET',
      enctype: 'multipart/form-data',
      data: "idRecaudo="+id,
      async: false,
      contentType: "application/json",
      dataType: "json",
      success: function (data) {
        if (data['success']) {
          $( "#Cliente"+id  ).slideUp();
          $("#mensajes").css("z-index", "999");
          $($("#mensajes").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
          $('#dataMessage').append(data['data']['message']);
          setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 2000);
        }
        else{
          $("#mensajes").css("z-index", "999");
          $($("#mensajes").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
          $('#dataMessage').append(data['data']['message']);
          setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 2000);
        }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) { 
        alert("Status: " + textStatus); alert("Error: " + errorThrown); 
      } ,
      cache: false,
      contentType: false,
      processData: false

    });


};



//REDIRECT DEL EDITAR 
$(".EDITANDO").click(function (e) {
  var idEditar=$(this).data('id');

  window.location.href = 'editarRecaudo.php?idRecaudo='+idEditar;
});
//FIN DEL EDITAR

//ACTIVAR/DESACTIVAR CATEGORÏAS
function changeStatus(){

  var id = $(this).data('id');
  var nextStatus= $(this).data('accion');
  $.ajax({
    url: "changeStatus.php",
    type: 'GET',
    enctype: 'multipart/form-data',
    data: "idRecaudo="+id+"&nextStatus="+nextStatus,
    async: false,
    contentType: "application/json",
    dataType: "json",
    success: function (data) {
      if (data['success']) {
        $("#mensajes").css("z-index", "999");
        $($("#mensajes").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
        $('#dataMessage').append(data['data']['message']);
        setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 2000);
        setTimeout(function() { document.location.href="listar.php";}, 1000);

      }
      else{
        $("#mensajes").css("z-index", "999");
        $($("#mensajes").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
        $('#dataMessage').append(data['data']['message']);
        setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 2000);
      }
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
      alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    } ,
    cache: false,
    contentType: false,
    processData: false

  });


};
//FIN ACTIVAR/DESACTIVAR

</script>

</html>
