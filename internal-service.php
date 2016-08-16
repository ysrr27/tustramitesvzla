<?php include('logueo.php');
include('extras/conexion.php');
$link=Conectarse();

if((isset($_GET["serv"]))&&($_GET["serv"]!="")){ $idServicio=strip_tags(htmlentities($_GET["serv"])); } else {echo "<script language='JavaScript'>parent.location.href='index.php';</script>";}

$SQL="SELECT * FROM m_servicios WHERE m_servicio_id='$idServicio'";
$query=mysqli_query($link, $SQL);
$row=mysqli_fetch_array($query);
$m_servicio_nombre=$row["m_servicio_nombre"];
$m_servicio_descripcion=$row["m_servicio_descripcion"];
$m_servicio_icono=$row["m_servicio_icono"];
$m_servicio_estatus=$row["m_servicio_estatus"];

if (!$m_servicio_estatus) {
    echo "<script language='JavaScript'>parent.location.href='index.php';</script>";
}


?>
<!DOCTYPE html>
<html>
<head>
 <?php
 include('common_head.php');
 ?>
 <link href="assets/mobirise/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
 <style type="text/css">
 .invisibble{
    border: none;
}
.error{
    color: red;
}
.fileinput-upload{
    display: none;
}
</style>
</head>
<body>
    <?php 
    include('common_menu.php');
    ?>
    <!-- modal de logueo -->

    <!-- Modal -->
    <?php include("modal.php"); ?>
    <!-- end modal logueo -->
</section>
</section>

<section class="content-2 simple col-1 col-undefined mbr-parallax-background mbr-after-navbar" id="content5-92" style="background-image: url(image/ciudad_noche.jpg);">
    <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(0, 0, 0);"></div>
    <div class="container">
        <div class="row">
            <div>
                <div class="thumbnail">
                    <div class="caption">
                        <h1 class="text-title">SERVICIOS</h1>
                        <div><p>Profesionalidad y compromiso somos expertos en tramites... <br></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container cnt-service">
    <div class="col-md-8 col-md-offset-1 col-xs-12"><img src="image/publicad728x90.jpg" alt=""></div>
</div>

<div class="container cnt-service">
    <div class="row">
        <div class="col-md-3 about-left"></div>
        <div class="col-md-9 col-md-9 about-right">
            <div class="about-top">
                <h3 class="mbr-header__text"><?=strtoupper($m_servicio_nombre)?></h3>
                <div class="star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </div>
                
                <div class="mbr-section__container container mbr-section__container--middle">
                    <div class="row">
                        <div class="mbr-article mbr-article--wysiwyg col-sm-8">
                            <p><?=$m_servicio_descripcion?></p>
                            <blockquote>
                                <p><em><i class="fa fa-folder-open" aria-hidden="true"></i> RECAUDOS:</em></p>
                                <ul>

                                    <?php 

                                    $SQlRecaudos="SELECT * FROM r_recaudos_servicios AS S, m_recaudos as R WHERE S.r_recaudos_servicios_idServicio='$idServicio' AND  S.r_recaudos_servicio_idRecaudo=R.m_recaudo_id AND R.m_recaudo_estatus='1'";
                                    $queryRecaudos=mysqli_query($link, $SQlRecaudos);
                                    $cantidadRecaudos=mysqli_num_rows($queryRecaudos);
                                    while ($rowRecaduos=mysqli_fetch_array($queryRecaudos)) {
                                        $m_recaudo_nombre=$rowRecaduos["m_recaudo_nombre"];
                                        $m_recaudo_descripcion=$rowRecaduos["m_recaudo_descripcion"];

                                        ?>

                                        <li><em>&nbsp; &nbsp; <?=$m_recaudo_nombre?></em></li>

                                        <?php } ?>
                                    </ul>


                                    <label><i class="fa fa-share-alt" aria-hidden="true"></i> Compartir:</label>
                                    <div class="addthis_sharing_toolbox"></div>

                                    <h3 class="pago-title"><i class="fa fa-cc-paypal" aria-hidden="true"></i> | <i class="fa fa-plane" aria-hidden="true"></i></h3>
                                </blockquote>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <section class="mbr-section" id="buttons1-115">
        <div class="mbr-section__container container mbr-section__container--middle">
            <div class="">
                <div class="col-sm-8 col-sm-offset-2">
                    <div class="mbr-buttons mbr-buttons--center">

                        <?php if (isset($idusuario))  { ?>
                        <button type="button" class="btn-default-service btn-rg btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-cart-plus" aria-hidden="true"></i> Solicitar</button>
                        <?php } else { ?>
                        <button type="button" class="btn-default-service btn-rg btn btn-default" data-toggle="modal" data-target="#myModallogueo"><i class="fa fa-cart-plus" aria-hidden="true"></i> Solicitar</button>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Modal -->
            <?php include('modal_SendSolicitud.php'); ?>
            <!--/Modal-->
        </section>

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6&appId=1441268399520835";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>

                    <ul class="comentarios">
                        <li class="activeComent"><a href="#"><span class="icofb"></span>Comentarios</a></li>
                    </ul>

                    <div class="comentArtic">
                        <div class="fb-comments" data-href="tustramitesenvenezuela.com" data-width="728" data-numposts="3"></div>
                    </div>

                </div>
            </div>
        </div>

        <?php include('common_redes.php'); ?>

        <div class="container cnt-banner">
            <div class="col-md-8 col-md-offset-1 col-xs-12"><img src="image/publicad728x90.jpg" alt=""></div>
        </div>

        <section class="mbr-section mbr-section--relative mbr-section--fixed-size section-contact" id="contacts2-90">
            <div class="mbr-section__container container">
                <div class="mbr-contacts mbr-contacts--wysiwyg row">
                    <div class="row ico-footer">
                        <div class="col-md-2 text-center mbr-contacts__text">
                            <a href="#.">
                                <strong><i class="fa fa-whatsapp ico-footer" aria-hidden="true"></i></strong><br>
                                <strong class="mbr-contacts__text">+34 693 80 18 09</strong>
                            </a>
                        </div>
                        <div class="col-md-2 text-center mbr-contacts__text">
                            <a href="https://www.facebook.com/Tus-tr%C3%A1mites-en-Venezuela-718992711564456/?fref=ts">
                                <strong><i class="fa fa-facebook-square" aria-hidden="true"></i></strong><br>
                                <strong>Tus Trámites en Venezuela</strong>
                            </a>
                        </div>
                        <div class="col-md-2 text-center mbr-contacts__text">
                            <a href="https://twitter.com/Tustramitesenvz?ref_src=twsrc%5Etfw">
                                <strong><i class="fa fa-twitter-square" aria-hidden="true"></i></strong><br>
                                <strong> @Tustramitesenvz </strong>
                            </a>
                        </div>
                        <div class="col-md-2 text-center mbr-contacts__text">
                            <a href="https://www.instagram.com/tustramitesenvenezuela/">
                                <strong><i class="fa fa-instagram" aria-hidden="true"></i></strong><br>
                                <strong>tustramitesenvenezuela</strong>
                            </a>
                        </div>
                        <div class="col-md-2 text-center mbr-contacts__text">
                            <a href="mail.google.com">
                                <strong><i class="fa fa-envelope" aria-hidden="true"></i></strong><br>
                                <strong>envenezuelatustramites@gmail.com</strong>
                            </a>
                        </div>
                    </div>    
                </div>
            </div>
        </section>

        <?php include('common_footer.php');?>
        <script type="text/javascript" src="assets/validate/jquery.numeric.min.js"></script>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57865161c869895a"></script>
        <script type="text/javascript">
        function pasarData(){
            $("#filesGet").html("");
            document.getElementById('nameFinal').value = document.getElementById('nombre').value;
            document.getElementById('lastnameFinal').value = document.getElementById('apellido').value;
            document.getElementById('countryFinal').value = document.getElementById('country').value;
            document.getElementById('addressFinal').value = document.getElementById('direccion').value;
            document.getElementById('mailFinal').value = document.getElementById('correo').value;
            document.getElementById('numberFinal').value = document.getElementById('numtelefono').value;
            document.getElementById('postalcodeFinal').value = document.getElementById('codigo').value;
            var files = $("#archivos")[0].files;
            for (var i = 0; i < files.length; i++){
             $( "#filesGet" ).append( "<li>"+files[i].name+"</li>" );
         }
         document.getElementById('recaudosFinal').value = document.getElementById('filesGet').innerHTML;
         document.getElementById('cantidadRecaudosFinal').value = i;
     }




     function uploadFiles(){
        $(".fileinput-upload").click();
          setTimeout(function() { $("#formSolicitud").submit();}, 800);
    }
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
    <script type="text/javascript">
    $(document).ready(function(){  
       var count = 0;
       var countPrev = 0;     
    // $('.buttonNext').attr('onClick', 'validateFiles();');
    $(".buttonNext").click(function(event) {
        event.preventDefault();
        count += 1;
        $(".buttonPrevious").attr('id', count);
        var contentPanelId = jQuery(this).attr("id");
        switch (true) {
            case (count == 1):
            $( "#step2" ).addClass( "selected" );
            $("#step2").removeClass("disabled");
            $(".buttonPrevious").removeAttr('disabled');
            $(".buttonPrevious").removeClass("buttonDisabled");
            $("#step-1").css("display", "none");
            $("#step-2").css("display", "block");
            $('.buttonNext').attr('onClick', 'pasarData()');

            

            break;
            case (count == 2):
            $( "#step3" ).addClass( "selected" );
            $("#step3").removeClass("disabled");
            $( ".buttonNext" ).addClass( "buttonDisabled" );
            $(".buttonNext").attr('disabled','disabled');
            $("#step3").removeClass("disabled");
            $(".buttonFinish").removeClass("buttonDisabled");
            $("#step-2").css("display", "none");
            $("#step-3").css("display", "block");
            $(".facture").css("display", "none");
            break;
            case (count == 3):
            $( ".buttonNext" ).addClass( "buttonDisabled" );
            $(".buttonNext").off('click');
            break;
            default:
        }
    });

$( ".buttonPrevious" ).click(function() {
    count -= 1;
    $(".buttonPrevious").attr('id', count);
    var contentPanelId = jQuery(this).attr("id");
    switch (true) {
        case (contentPanelId == 0):
        $( "#step2" ).addClass( "disabled" );
        $("#step2").removeClass("selected");
        $( ".buttonPrevious" ).addClass( "buttonDisabled" );
        $(".buttonPrevious").attr('disabled','disabled');
        $("#step-1").css("display", "block");
        $("#step-2").css("display", "none");
        break;
        case (contentPanelId == 1):
        $( "#step3" ).addClass( "disabled" );
        $("#step3").removeClass("selected");
        $( "#step2" ).addClass( "selected" );
        $("#step2").removeClass("disabled");
        $(".buttonNext").removeClass("buttonDisabled");
        $(".buttonNext").removeAttr('disabled');
        $("#step-2").css("display", "block");
        $("#step-3").css("display", "none");
        $(".facture").css("display", "block");
        $(".buttonFinish").addClass("buttonDisabled");

        break;
        default:
    }
});
});
</script>


</body>
</html>