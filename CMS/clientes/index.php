<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../common_head.php"); ?>

  <!-- Switchery -->
  <link href="../../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="../../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
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
              <h3>Registro de Clientes</h3>
            </div>
            
          </div>
          <div class="clearfix"></div>


          <div class="row">
            <div class="col-md-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Datos Comerciales</h2>
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
                  <form class="form-horizontal form-label-left" data-parsley-validate id="formClientes" name="formClientes">

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                      <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                      <input type="text" name="razonSocial" class="form-control has-feedback-left" id="razonSocial" placeholder="Razón Social">
                      
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                     <span class="fa fa-building form-control-feedback right" aria-hidden="true"></span>
                     <input type="text" class="form-control" name="rifCliente" id="rifCliente" placeholder="RIF">
                     
                   </div>

                   <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                    <input type="text" class="form-control has-feedback-left" name="emailCliente" id="emailCliente" placeholder="Email">

                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                    <input type="text" class="form-control numeric" name="telefonoCliente" id="telefonoCliente" placeholder="Teléfono">

                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <span class="fa fa-male form-control-feedback left" aria-hidden="true"></span>
                    <input type="text" class="form-control has-feedback-left" name="nombreContacto" id="nombreContacto" placeholder="Nombre de Contácto">

                  </div>

                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                    <input type="text" class="form-control numeric" name="telefonoContacto" id="telefonoContacto" placeholder="Teléfono de Contacto">

                  </div>

                 
                  <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                    <span class="fa fa-unlock-alt form-control-feedback left" aria-hidden="true"></span>
                    <input type="text" class="form-control has-feedback-left" name="passwordContacto" id="passwordContacto" placeholder="Password">
                  </div>
                  <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">

                    <button type="button" class="btn" value="Generar" onClick="generate()" title="Generar Clave Segura">Generar</button>
                  </div>

                </div>

                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <label for="message">Estatus Cliente :</label>
                    <div class="radio" id="EstatusRadio">

                     <input type="checkbox" class="js-switch" id="estatus" name="estatus" value="1"/>  
                     <label id="estatusText" for="estatus">Inactivo</label>
                   </div>
                 </div>
                 <div class="col-md-6 col-sm-6 col-xs-12">
                  <label for="message">Verificación de Cliente</label>
                  <div class="" id="Estatusverificado">

                    <input type="checkbox" id="verificacion" class="js-switch" name="verificacion" value="1"/> 
                    <label id="verificadoText" for="verificacion">Sin verificar</label>
                  </div>
                </div>
              </div>


              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                  <button type="submit" class="btn btn-success" id="btn_enviar">Guardar</button>
                  <button type="button" onClick="document.location.href='listar.php'" class="btn btn-primary" >Cancelar</button>
                  
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
<script src="../../vendors/iCheck/icheck.min.js"></script>

<!-- Switchery -->
<script src="../../vendors/switchery/dist/switchery.min.js"></script>

<script src="../js/validate/jquery.validate.js"></script>
<script type="text/javascript" src="../js/jquery.numeric.min.js"></script>
<script type="text/javascript" src="../js/validacionRIF.js"></script>

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


<script>
$(function() {

  $("#formClientes").validate({

    rules: {
      razonSocial: "required",
      rifCliente: "required",
      emailCliente: {
        required: true,
        email: true
      },
      loginCliente: "required",
      passwordContacto: "required",
      telefonoCliente: {
        required: true,
        minlength: 14,
        maxlength:14,
      },
      nombreContacto: "required",
      telefonoContacto: {
        required: true,
        minlength: 14,
        maxlength:14
      },
    },

    messages: {
      razonSocial: "Debe especificar la Razón Social del Cliente",
      rifCliente: "Debe especificar el RIF",
      loginCliente: "El usuario debe tener un login",
      passwordContacto:"Debe asignarle una contraseña al usuario",
      emailCliente: "Se requiere un Email válido",
      telefonoCliente: {
        required: "Debe introducir un número telefónico",
        minlength: "El número debe tener 11 dígitos",
        maxlength: "El número NO debe tener mas de 11 dígitos"
      },
      nombreContacto: "Debe especificar el nombre de contacto",
      telefonoContacto: {
        required: "Debe introducir un número telefónico",
        minlength: "El número debe tener 11 dígitos",
        maxlength: "El número NO debe tener mas de 11 dígitos"
      },

    },

    submitHandler: function(form) {
      var formData = new FormData($("#formClientes")[0]);
      $.ajax({
        url: "addCliente.php",
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
$(".numeric").numeric();
$("#remove").click(
  function(e)
  {
    e.preventDefault();
    $(".numeric").removeNumeric();
  }
  );

</script>

<script>/*(function($){validarRif('rifCliente'); function validacionRif() {$.validator.addMethod('rif', function(value, element){value = value.toUpperCase();if (!/^[Vv]{1}[-]{1}[0-9]{8}[-]{1}[0-9]{1}$/.test(value))return false;else {return true;}}, 'Ingrese un rif válido.');}})(jQuery);*/</script>


<script type="text/javascript">

function randomPassword(length) {
  var chars = "abcdefghijklmnopqrstuvwxyz!@#$%^&*()-+<>ABCDEFGHIJKLMNOP1234567890";
  var pass = "";
  for (var x = 0; x < length; x++) {
    var i = Math.floor(Math.random() * chars.length);
    pass += chars.charAt(i);
  }
  return pass;
}

function generate() {
  $( "#passwordContacto" ).val(randomPassword(15));
}
</script>



</body>
</html>