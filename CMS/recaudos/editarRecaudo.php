<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();

if (!control_access("RECAUDOS", 'EDITAR')){ echo "<script language='JavaScript'>document.location.href='../index.php';</script>"; }


if((isset($_GET["idRecaudo"]))&&($_GET["idRecaudo"]!="")){ $idRecaudo=strip_tags(htmlentities($_GET["idRecaudo"])); } else {echo "<script language='JavaScript'>document.location.href='../index.php';</script>";}




$SQL="SELECT * FROM m_recaudos WHERE m_recaudo_id='$idRecaudo'";
$queryRecaudo=mysqli_query($link, $SQL);
$row=mysqli_fetch_array($queryRecaudo);
$m_recaudo_nombre=$row["m_recaudo_nombre"];
$m_recaudo_descripcion=$row["m_recaudo_descripcion"];
$m_recaudo_estatus=$row["m_recaudo_estatus"];
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
              <h3>Editar Recaudo</h3>
            </div>
            
          </div>
          <div class="clearfix"></div>


          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Recaudos para disponible para cada servicio</h2>
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
                  <form class="form-horizontal form-label-left" id="formCategoria" name="formCategoria">
                    <input type="hidden" name="idRecaudo" id="idRecaudo" value="<?=$idRecaudo?>" />
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Nombre del Recaudo</label>
                      <span class="fa fa-tasks form-control-feedback left" aria-hidden="true"></span>
                      <input type="text" name="nombrerecaudo" class="form-control has-feedback-left" id="nombrerecaudo" placeholder="Nombre del recaudo" value="<?=$m_recaudo_nombre?>">
                      
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                       <label>Descripción del Recaudo</label>
                     <span class="fa fa-file-text-o form-control-feedback right" aria-hidden="true"></span>
                     <textarea class="resizable_textarea form-control" name="descripcion" id="descripcion" placeholder="Descripción del recaudo" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 74px;"><?=$m_recaudo_descripcion?></textarea>                
                   </div>

                 </div>

                 <div class="form-group">



                

                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label for="message">Estatus Categoría :</label>
                    <div class="radio" id="EstatusRadio">

                     <input type="checkbox" class="js-switch" id="estatus" name="estatus" value="1"  <?php if($m_recaudo_estatus){ echo "checked='checked'"; } ?>/>  
                     <label id="estatusText" for="estatus"><?php if($m_recaudo_estatus){ echo "Activo"; } else{ echo "Inactivo"; }?></label>
                   </div>
                 </div>
                 
               </div>


               <div class="ln_solid"></div>
               <div class="form-group" >
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3" style="margin-top:20px;">
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
<!-- Autosize -->
<script src="../vendors/autosize/dist/autosize.min.js"></script>
<!-- jQuery autocomplete -->  <script>
autosize($('.resizable_textarea'));
</script>

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

  $("#formCategoria").validate({

    rules: {
      nombrerecaudo: "required",
      descripciondescripcion: "required",
    },

    messages: {
      nombrerecaudo: "Debe especificar un nombre para el recaudo",
      descripcion: "Debe especificar una descrición el recaudo",
    },

    submitHandler: function(form) {

     var formData = new FormData($("#formCategoria")[0]);

     $.ajax({
      url: "updateRecaudo.php",
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
        alert("ss");
        $("#mensajes").css("z-index", "999");
        $($("#mensajes").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
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