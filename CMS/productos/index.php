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
  <!-- Select2 -->
  <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="../css/custom.css" rel="stylesheet">
  <!-- bootstrap-wysiwyg -->
  <link href="../css/bootstrap-select.min.css" rel="stylesheet">
  <link href="../css/fileinput.css" rel="stylesheet">
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
              <h3>Registro de Productos</h3>
            </div>
            
          </div>
          <div class="clearfix"></div>


          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Información del producto a ofertar</h2>
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
                  <form class="form-horizontal form-label-left" method="POST" action="addServicio.php" data-parsley-validate id="formProductos" name="formProductos" enctype="multipart/form-data">
                    
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Nombre del Producto:</label>
                      <span class="fa fa-text-height form-control-feedback left" aria-hidden="true"></span>
                      <input type="text" name="nombreProducto" class="form-control has-feedback-left" id="nombreProducto" placeholder="Nombre del Producto">
                      
                    </div>



                     <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <label>Precio del producto</label>
                          <span class="fa fa-eur form-control-feedback left" aria-hidden="true"></span>
                          <input type="text" class="form-control has-feedback-left numeric" name="costoProducto" id="costoProducto" placeholder="Precio del producto">

                        </div>

                   
                      <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <label>Cantidad disponible</label>
                        <span class="fa fa-cubes form-control-feedback left" aria-hidden="true"></span>
                        <input type="text" class="form-control has-feedback-left numeric" name="cantidadDisponible" id="cantidadDisponible" placeholder="Cantidad Disponibles">

                      </div>


                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="x_panel">
                        <div class="x_title">
                          <h2>Descripción del Producto</h2>
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

                          </div>
                          <textarea name="descipcionProducto" id="descipcionProducto" style="display:none;"></textarea>
                          <br />

                          <div class="ln_solid"></div>

                          <input type="hidden" id="descripcion" name="descripcion" value="">

                        </div>
                      </div>
                    </div>

                  </div>

                   <div class="col-md-12 col-sm-6 col-xs-12" style="margin-bottom:30px;">
                       <h2>Fotos del producto</h2>
                       <input type="hidden" name="idsImagenes" id="idsImagenes" value="">
                       <input id="archivos" name="archivos[]" class="file" type="file" multiple data-min-file-count="1" data-upload-url="uploadMedia.php">
                       <div id="errorBlock" class="help-block"></div>

                     </div>

                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label for="message">Estatus del Producto :</label>
                    <div class="radio" id="EstatusRadio">

                     <input type="checkbox" class="js-switch" id="estatus" name="estatus" value="1"/>  
                     <label id="estatusText" for="estatus">Inactivo</label>
                   </div>
                 </div>

                 <div class="col-md-6 col-sm-6 col-xs-12">
                    <label for="message">Destacado :</label>
                    <div class="radio" id="estatusDestacado">

                     <input type="checkbox" class="js-switch" id="destacado" name="destacado" value="1"/>  
                     <label id="destacadoText" for="destacado">NO</label>
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
<script src="../js/fileinput.js"></script>
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
<script type="text/javascript" src="../js/jquery.numeric.min.js"></script>
<script src="../js/bootstrap-select.min.js"></script>

<!--JQuery Price Format -->
<script src="../js/jquery.price_format.2.0.js"></script>


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

$("#estatusDestacado").click(function() {
  if ($('#destacado').prop('checked')) {
   $("#destacadoText").html("<b>SI</b>");
 }
 else{
  $("#destacadoText").html("<b>NO</b>");
}
});



</script>

<!--CAMPO DE PRECIOS-->
<script type="text/javascript">
$('#costoProducto').priceFormat();
</script>
<!--/CAMPO PRECIOS-->

<script type="text/javascript">
$(".numeric").numeric();
$("#remove").click(
  function(e)
  {
    e.preventDefault();
    $(".numeric").removeNumeric();
  }
  );

</script>

<script>

$("#archivos").fileinput({
  'showPreview' : true,
   allowedFileExtensions : ['png','gif', 'jpg'],
  maxFilePreviewSize: 10240


});
$('#archivos').on('fileuploaded', function(event, data, previewId, index) {
  var form = data.form, files = data.files, extra = data.extra,
  response = data.response, reader = data.reader;

  $.each(response, function(index, val) {
    var input = $( "#idsImagenes" );
    input.val( input.val() +","+ val );
  });
})


</script>


<script>
$(function() {

  $("#formProductos").validate({

    rules: {
      nombreProducto: "required",
      cantidadDisponible: "required",
      costoProducto: "required",
      descipcionProducto: "required",
      archivos: {
        required: true,
        extension: "jpg|jpeg|png|giv"
      },
    },

    messages: {
      nombreProducto: "Debe Colocarle un nombre al producto",
      cantidadDisponible: "Debe indicar la cantidad disponible del producto",
      costoProducto: "Debe indicar el precio de venta del producto",
      descipcionProducto: "Debe agregar una descripción del producto",
      archivos: {
        required: "Debe agregar las fotos del producto",
        extension: "Extensión de archivo no permitida",
      },
    },

    submitHandler: function(form) {
      document.getElementById('descripcion').value = document.getElementById("editor").innerHTML;
      var formData = new FormData($("#formProductos")[0]);
      $.ajax({
        url: "addProducto.php",
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

