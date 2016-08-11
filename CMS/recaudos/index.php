<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../common_head.php"); ?>

  <!-- Switchery -->
  <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="../js/fileinput.js" type="text/javascript"></script>
</head>


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
              <h3>Agregar Recaudos</h3>
            </div>
            
          </div>
          <div class="clearfix"></div>


          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Recaudos disponibles a la hora de registrar un nuevo servicio</h2>
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
                  <form class="form-horizontal form-label-left" id="fromRecaudos" name="fromRecaudos" enctype="multipart/form-data" >

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
                      <input type="text" name="nombreRecaudo" class="form-control has-feedback-left" id="nombreCat" placeholder="Nombre del recaudo">
                      
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                     <span class="fa fa-file-text-o form-control-feedback right" aria-hidden="true"></span>
                     <textarea class="resizable_textarea form-control" name="descripcion" id="descripcion" placeholder="Descripción del recaudo (Si aplíca)" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 74px;"></textarea>                
                   </div>






                 </div>

                 <div class="form-group">



                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label for="message">Estatus Categoría :</label>
                    <div class="radio" id="EstatusRadio">

                     <input type="checkbox" class="js-switch" id="estatus" name="estatus" value="1"/>  
                     <label id="estatusText" for="estatus">Inactiva</label>
                   </div>
                 </div>
                 
               </div>

               <div class="ln_solid"></div>
               <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success" id="btn_enviar">Guardar</button>
                  <button type="button" class="btn btn-primary" onClick="document.location.href='listar.php'">Cancelar</button>
                  
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

<!--LIBRERIAS INDIVIDUALES NO COMUNES-->

<!-- Switchery -->
<script src="../vendors/switchery/dist/switchery.min.js"></script>

<script src="../js/validate/jquery.validate.js"></script>


<script type="text/javascript">


$("#EstatusRadio").click(function() {
  if ($('#estatus').prop('checked')) {
   $("#estatusText").html("<b>Activa</b>");
 }
 else{
  $("#estatusText").html("<b>Inactiva</b>");
}
});


</script>


<script>
$(function() {

  $("#fromRecaudos").validate({

   rules: {
      nombreRecaudo: "required",
      descripcion: "required",
    },

    messages: {
      nombreRecaudo: "Debe especificar un nombre para el recaudo",
      descripcion: "Debe especificar una descrición del recaudo",
      
    },

    submitHandler: function(form) {

     var formData = new FormData($("#fromRecaudos")[0]);


     $.ajax({
      url: "addRecaudo.php",
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
        setTimeout(function() { window.location.href = 'listar.php';}, 1000);
      } else{
        $("#mensajes").css("z-index", "999");
        $($("#mensajes").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
        $('#dataMessage').append(data['data']['message']);
        $.each(data['data']['message'], function(index, val) {
          $('#dataMessage').append(val+ '<br>');
        });
        setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 2000);
        

      };

    },
    error: function(XMLHttpRequest, textStatus, errorThrown) { 
      alert("Status: " + textStatus); alert("Error: " + errorThrown); 
    } ,
    cache: false,
    contentType: false,
    processData: false
  });

}
});

});


</script>

</body>
</html>