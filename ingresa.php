<?php 
include("extras/conexion.php");
$link=Conectarse();
if((isset($_GET["user"]))&&($_GET["user"]!="")){ $user=strip_tags(htmlentities($_GET["user"])); } else {$aErrores[] = "Este usuario NO existe";}
if((isset($_GET["hash"]))&&($_GET["hash"]!="")){ $hash=strip_tags(htmlentities($_GET["hash"])); } else {$aErrores[] = "Este Usuario NO existe";}

if(count($aErrores)==0) { 

    //PARA VALIDAR SI EL USUARIO EXISTE EN LA BD
    $query = "SELECT * FROM  m_clientes WHERE m_cliente_email='".mysqli_real_escape_string($link, $user)."' AND m_cliente_hash='".mysqli_real_escape_string($link, $hash)."' AND m_cliente_estatus='0' ";
    $resultado = mysqli_query($link, $query);
    $existe=mysqli_num_rows($resultado);

    if ($existe >0) {
        $SQLActivar="UPDATE m_clientes SET m_cliente_estatus='1' WHERE m_cliente_email='$user'";
        $queryActivar=mysqli_query($link, $SQLActivar);
        $exitoso=true;
    }
    else{
        $exitoso=false;
    }
}
else{
   echo "<script language='JavaScript'>document.location.href='index.php';</script>"; 
}
?>
<!DOCTYPE html>
<html>
<head>
  <?php
include('common_head.php');
?>

</head>
<body>

   <?php 
include('common_menu.php');
?>

    <section class="content-2 simple col-1 col-undefined mbr-parallax-background mbr-after-navbar" id="content5-92" style="background-image: url(image/ciudad_noche.jpg);">
        <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(0, 0, 0);"></div>
        <div class="container">
            <div class="row">
                <div>
                    <div class="thumbnail">
                        <div class="caption">
                            <div>
                             <p>Profesionalidad y compromiso somos expertos en tramites... <br></p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <h4 class="alert-heading">¡Bienvenido!</h4>

          <?php if($exitoso) {  ?>
          <p>¡Gracias por unirte a TUS TRAMITES EN VENEZUELA! </p>
          <p>Tu cuenta ha sido activada correctamente, ahora puedes ingresar...</p>
          <?php } else { ?>

          <p>¡Gracias visitar a TUS TRAMITES EN VENEZUELA! </p>
          <p>ERROR, tu usuario no se encuentra registrado en o ya este link caducó!</p>
          <p>Te invitamos a registrarte haciendo click <a href="register.php">AQUÍ</a></p>
          <?php  } ?>
          

      </div>
 </div>
</div>
<div class="container">
    <div class="row">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header modal-head-login">
                    <div class="row col-ms-10">
                        <div class="col-md-2"></div>
                        <div class="col-md-10">
                            <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                                <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                                    <span class="mbr-brand__logo">
                                        <a href="#">
                                            <img class="mbr-navbar__brand-img mbr-brand__img" src="image/logistics-international-service-by-airplane.png">
                                        </a>
                                    </span>
                                    <span class="mbr-brand__name">
                                        <a class="mbr-brand__name text-white" href="#">TUS TRAMITES EN VENEZUELA </a>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form class="form-horizontal">
                            <div class="form-group row col-sm-10">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-addon ico-login"><i class="fa fa-user" aria-hidden="true"></i></div>
                                        <input type="email" class="form-control-registro form-login" id="inputEmail3" placeholder="Correo electrónico">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-sm-10">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-addon ico-login"><i class="fa fa-lock" aria-hidden="true"></i></div>
                                        <input type="password" class="form-control-registro form-login" id="inputPassword3" placeholder="Contraseña">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-sm-10">
                                <div class="col-md-3"></div>
                                <div class="col-sm-9">
                                    <button type="button" class="btn-login btn btn-primary btn-lg btn-block">Entrar</button>
                                </div>
                            </div>
                        </form>
                    </div>   
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-xs-12 col-md-offset-2 cnt-banner-768-90"><img src="https://s.adroll.com/a/DMQ/V5Q/DMQV5QEXMZE5BJYAVD33RI.jpg" alt=""></div>
    </div>
    
</div>


<section class="mbr-section mbr-section--relative mbr-section--fixed-size mbr-parallax-background section-envio" id="msg-box3-117">
    <div class="mbr-overlay background-envio"></div>
    <div class="mbr-section__container container mbr-section__container--first">
        <div class="mbr-header mbr-header--wysiwyg row">
            <div class="col-sm-8 col-sm-offset-2">
                <h1 class="mbr-header__text">ENVIOS A CUALQUIER PARTE DEL MUNDO...</h1>
                
            </div>
        </div>
    </div>
    <div class="mbr-section__container container mbr-section__container--middle">
        <div class="row">
            <div class="mbr-article mbr-article--wysiwyg col-sm-8 col-sm-offset-2">
                <ul>
                    <li><em>Ahorra tiempo y dinero.</em></li>
                    <li><em>Nos caracterizamos por nuestra responsabilidad y compromiso.</em></li>
                    <li><em>En tramites somos los lideres.</em><br></li>
                    <li><em>Tramites en tiempo record.<br></em></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="mbr-section__container container mbr-section__container--last">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h3 class="mbr-header__text">SÍGUENOS EN:</h3>
                <div class="mbr-section__container container">
                    <div class="mbr-header mbr-header--inline row">
                        <div class="mbr-social-icons mbr-social-icons--style-1 col-sm-8">
                            <a class="mbr-social-icons__icon socicon-bg-twitter" title="Twitter" target="_blank" href="https://twitter.com/mobirise"><i class="socicon socicon-twitter"></i></a> 
                            <a class="mbr-social-icons__icon socicon-bg-facebook" title="Facebook" target="_blank" href="https://www.facebook.com/pages/Mobirise/1616226671953247"><i class="socicon socicon-facebook"></i></a> 
                            <a class="mbr-social-icons__icon socicon-bg-google" title="Google+" target="_blank" href="https://plus.google.com/u/0/+Mobirise/posts"><i class="socicon socicon-google"></i></a> 
                            <a class="mbr-social-icons__icon socicon-bg-youtube" title="YouTube" target="_blank" href="http://www.youtube.com/channel/UCt_tncVAetpK5JeM8L-8jyw"><i class="socicon socicon-youtube"></i></a> 
                            <a class="mbr-social-icons__icon socicon-bg-instagram" title="Instagram" target="_blank" href="https://instagram.com/mobirise/"><i class="socicon socicon-instagram"></i></a> 
                            <a class="mbr-social-icons__icon socicon-bg-pinterest" title="Pinterest" target="_blank" href="https://www.pinterest.com/mobirise/"><i class="socicon socicon-pinterest"></i></a>  
                            <a class="mbr-social-icons__icon socicon-bg-behance" title="Behance" target="_blank" href="https://www.behance.net/Mobirise"><i class="socicon socicon-behance"></i></a> 
                            <a class="mbr-social-icons__icon socicon-bg-tumblr" title="Tumblr" target="_blank" href="http://mobirise.tumblr.com/"><i class="socicon socicon-tumblr"></i></a> 
                            <a class="mbr-social-icons__icon socicon-bg-linkedin" title="LinkedIn" target="_blank" href="https://www.linkedin.com/in/mobirise"><i class="socicon socicon-linkedin"></i></a> 
                            <a class="mbr-social-icons__icon socicon-bg-android" title="Google Play" target="_blank" href="https://play.google.com/store/apps/details?id=com.mobirise.mobirise"><i class="socicon socicon-android"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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


<script>
$( "#resumen,#resumenMobil" ).click(function() {
  $( "#resumen-details" ).show( "slow" );
  $( "#facturacion-details" ).hide( 1000 );
  $( "#solicitudes-details" ).hide( 1000 );
  $( "#perfil-details" ).hide( 1000 );
  $("#resumen").addClass("active");
  $( "#facturacion" ).removeClass( "active" );
  $( "#solicitudes" ).removeClass( "active" );
  $( "#perfil" ).removeClass( "active" );
  $( "body" ).removeClass( "open" );
});
$( "#facturacion,.num-facturas" ).click(function() {
  $( "#facturacion-details" ).show( "slow" );
  $( "#resumen-details" ).hide( 1000 );
  $( "#solicitudes-details" ).hide( 1000 );
  $( "#perfil-details" ).hide( 1000 );
  $("#facturacion").addClass("active");
  $( "#resumen" ).removeClass( "active" );
  $( "#solicitudes" ).removeClass( "active" );
  $( "#perfil" ).removeClass( "active" );
  $( "body" ).removeClass( "open" );
});
$( "#solicitudes,.num-solicitud" ).click(function() {
  $( "#solicitudes-details" ).show( "slow" );
  $( "#facturacion-details" ).hide( 1000 );
  $( "#resumen-details" ).hide( 1000 );
  $( "#perfil-details" ).hide( 1000 );
  $("#solicitudes").addClass("active");
  $( "#resumen" ).removeClass( "active" );
  $( "#facturacion" ).removeClass( "active" );
  $( "#perfil" ).removeClass( "active" );
  $( "body" ).removeClass( "open" );
});
$( "#perfil,#perfilMobil" ).click(function() {
  $( "#perfil-details" ).show( "slow" );
  $( "#facturacion-details" ).hide( 1000 );
  $( "#resumen-details" ).hide( 1000 );
  $( "#solicitudes-details" ).hide( 1000 );
  $("#perfil").addClass("active");
  $( "#resumen" ).removeClass( "active" );
  $( "#solicitudes" ).removeClass( "active" );
  $( "#facturacion" ).removeClass( "active" );
  $( "body" ).removeClass( "open" );
});
//Exelent little functions to use any time when class modification is needed
function hasClass(ele, cls) {
    return !!ele.className.match(new RegExp('(\\s|^)' + cls + '(\\s|$)'));
}
function addClass(ele, cls) {
    if (!hasClass(ele, cls)) ele.className += " " + cls;
}
function removeClass(ele, cls) {
    if (hasClass(ele, cls)) {
        var reg = new RegExp('(\\s|^)' + cls + '(\\s|$)');
        ele.className = ele.className.replace(reg, ' ');
    }
}
//Add event from js the keep the marup clean
function init() {
    document.getElementById("menu-toggle").addEventListener("click", toggleMenu);
}
//The actual fuction
function toggleMenu() {
    var ele = document.getElementsByTagName('body')[0];
    if (!hasClass(ele, "open")) {
        addClass(ele, "open");
    } else {
        removeClass(ele, "open");
    }
}
//Prevent the function to run before the document is loaded
document.addEventListener('readystatechange', function() {
    if (document.readyState === "complete") {
        init();
    }
});
</script>

</body>
</html>

