<?php include('../logeo.php'); 
include('../extras/conexion.php');
$link=Conectarse();
if (!control_access("CLIENTES", 'VER')) {  echo "<script language='JavaScript'>document.location.href='../index.php';</script>"; }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../common_head.php"); ?>

  <style>
  .suggest-element {
    margin-left:5px;
    margin-top:5px;
    width:350px;
    cursor:pointer;
  }
  #suggestions {
    width:350px;
    height:150px;
    overflow: auto;
    z-index: 999;
    background-color: #FFFFFF;
    display: none;
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
              <h3>Listado de Clientes registrados</h3>
            </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <div class="input-group">
                  <input type="text" class="form-control" name="buscador" id="buscador" placeholder="Buscar...">
                  <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Ir!</button>
                    
                  </span>
                </div>
                <div id="suggestions" style="width:20%; z-index:3; overflow: hidden; float: center;  position: fixed; margin-top:0px; border-left-width: 1em;" ></div>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div id="mensajes"> </div>
          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_content">

                  <div class="row">

                    <div class="clearfix"></div>

                    <?php
                    if((isset($_GET["idCliente"]))&&($_GET["idCliente"]!="")){ 

                    $idCliente=strip_tags(htmlentities(mysqli_real_escape_string($link, $_GET["idCliente"]))); 
                     $QueryClientes="SELECT * FROM m_clientes WHERE m_cliente_id='$idCliente' ORDER BY m_cliente_razonSocial ASC LIMIT 0,1";
                  } 
                  else{
                     $QueryClientes="SELECT * FROM m_clientes WHERE m_cliente_estatus='1' AND m_cliente_tipoCliente='1'  ORDER BY m_cliente_razonSocial ASC LIMIT 0,9";
                  }
                   
                    $query=mysqli_query($link, $QueryClientes);
                    if (mysqli_num_rows($query) ==0) {
                      echo "NO EXISTEN CLIENTES REGISTRADOS";
                    } else {
                      while($row=mysqli_fetch_array($query)){
                        $m_cliente_id=$row["m_cliente_id"];
                        $m_cliente_razonSocial=$row["m_cliente_razonSocial"];
                        $m_cliente_rif=$row["m_cliente_rif"];
                        $m_cliente_mail=$row["m_cliente_mail"];
                        $m_cliente_telefono=$row["m_cliente_telefono"];
                        $m_cliente_nombreContacto=$row["m_cliente_nombreContacto"];
                        $m_cliente_telefonoContacto=$row["m_cliente_telefonoContacto"];
                        $m_cliente_login=$row["m_cliente_login"];
                        $m_cliente_estatus=$row["m_cliente_estatus"];
                        $m_cliente_verificado=$row["m_cliente_verificado"];
                        $m_cliente_fecharegistro=$row["m_cliente_fecharegistro"];


                        ?>
                        <div class="col-md-4 col-sm-4 col-xs-12" id="Cliente<?=$m_cliente_id?>">
                          <div class="well profile_view">
                            <div class="col-sm-12">
                              <h4 class="brief"><i><?php echo $m_cliente_razonSocial; ?></i></h4>
                              <div class="left col-xs-7">
                                <h2><?=$m_cliente_nombreContacto; ?></h2>
                                <p><strong>Datos de contacto: </strong> </p>
                                <ul class="list-unstyled">
                                  <li><i class="fa fa-phone"></i> <?=$m_cliente_telefono?> </li>
                                  <li><i class="fa fa-mobile-phone"></i> <?=$m_cliente_telefonoContacto?> </li>
                                  <li><i class="fa fa-envelope-o"></i> <?=$m_cliente_mail?> </li>
                                  <div></div>
                                </ul>
                              </div>
                              <div class="right col-xs-5 text-center">
                                <img src="../images/user.png" alt="" class="img-circle img-responsive">
                              </div>
                              <div class="right col-xs-5 text-right">
                                &nbsp;

                               
                             </div>
                           </div>

                           <div class="col-xs-12 bottom text-left">

                            <div class="col-xs-12 col-sm-12 emphasis">
                              <?php if (control_access("CLIENTES", 'EDITAR')) { ?> 
                              <button type="button" class="btn btn-success btn-xs editando" data-id="<?=$m_cliente_id?>"> <i class="fa fa-user">
                              </i> Editar</button>
                              <?php } ?>
                              <?php if (control_access("CLIENTES", 'VER')) { ?> 
                              <button type="button" class="btn btn-primary btn-xs viendo" data-id="<?=$m_cliente_id?>">
                                <i class="fa fa-user"> </i> Ver Perfil
                              </button>
                              <?php } ?>
                              <?php if (control_access("CLIENTES", 'ELIMINAR')) { ?> 
                              <button type="button" class="btn btn-danger btn-xs" data-id="<?=$m_cliente_id?>" data-title="Seguro que desea eliminar?" data-trigger="focus" data-on-confirm="deleteCliente" data-toggle="confirmation" data-btn-ok-label="Sí" data-btn-cancel-label="Cancelar!" data-placement="top"> 
                                <i class="fa fa-trash-o"> </i> Borrar </button>
                                <?php } ?>
                                
                                  <?php
                                if ($m_cliente_verificado) {
                                 ?>
                                 <button type="button" class="btn btn-success btn-xs" title="Cliente Verificado" style="padding-bottom:0px; float:right;"> <i class="fa fa-check-square"></i></button>
                                 <?php
                               } else {
                                 ?>
                                 <button type="button" class="btn btn-warning btn-xs" title="Cliente Sin Verificar" style="padding-bottom:0px; float:right;"> <i class="fa fa-clock-o"></i></button>
                                 <?php
                               }

                               ?>


                              </div>
                            </div>
                          </div>
                        </div>

                        <?php } 
                      }
                      ?>
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
    <!--LIBRERIAS COMUNES-->
    <?php include("../common_libraries.php"); ?>
    <!--/LIBRERIAS COMUNES-->

    <script src="../js/bootstrap-confirmation.min.js"></script>

    <script>

    $('[data-toggle=confirmation]').confirmation();

    function deleteCliente(){

      var id = $(this).data('id');

      $.ajax({
        url: "deleteCliente.php",
        type: 'GET',
        enctype: 'multipart/form-data',
        data: "idCliente="+id,
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

$(".editando").click(function (e) {
  var idEditar=$(this).data('id');

  window.location.href = 'editCliente.php?idCliente='+idEditar;
});

$(".viendo").click(function (e) {
  var idVer=$(this).data('id');
  window.location.href = 'verCliente.php?idCliente='+idVer;
});


</script>



<script type="text/javascript">
//BUSCADOR AUTOCOMPLETE
$(document).ready(function() {    
    //Al escribr dentro del input con id="buscador"
    $('#buscador').keypress(function(){
        //Obtenemos el value del input
        var token = $(this).val();       
        console.log(token); 
        var dataString = 'token='+token;

        //Le pasamos el valor del input al ajax
        $.ajax({
          type: "POST",
          url: "autocomplete.php",
          data: dataString,
          success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').on('click', function(){

                  var idCliente=$(this).data('id');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#buscador').val($(this).data('razon'));
                    //Hacemos desaparecer el resto de sugerencias
                    $('#suggestions').fadeOut(1000);
                    document.location.href="listar.php?idCliente="+idCliente;
                  });              
              }
            });
      });              
});    
</script>
</body>
</html>