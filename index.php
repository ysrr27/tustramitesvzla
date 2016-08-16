<?php include('logueo.php'); ?>
<!DOCTYPE html>
<html>
<head>
<?php
include('common_head.php');

?>
</head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.6&appId=1441268399520835";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php 
include('common_menu.php');

?>

<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background mbr-after-navbar" id="header1-73" style="background-image: url(image/image_1.jpg);">
    <div class="mbr-box__magnet mbr-box__magnet--sm-padding mbr-box__magnet--center-left">
        <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(76, 105, 114);"></div>
        <div class="mbr-box__container mbr-section__container container">
            <div class="mbr-box mbr-box--stretched">
                <div class="mbr-box__magnet mbr-box__magnet--center-left">
                    <div class="row">
                        <div class=" col-sm-6">
                            <div class="mbr-hero animated fadeInUp">
                                <h1 class="mbr-hero__text">TUS TRAMITES EN VENEZUELA</h1>
                                <p class="mbr-hero__subtext">Profesionalidad y Compromiso... <br></p>
                            </div>
                            <?php if (!isset($idusuario))  { ?>
                                <div class="mbr-buttons btn-inverse mbr-buttons--left">
                                    <button type="button" class="btn-registro mbr-buttons__btn btn-rg btn btn-lg animated fadeInUp delay btn-warning" data-toggle="modal" data-target="#myModallogueo">INGRESAR</button>
                                    <a class="_btn-registro mbr-buttons__btn btn btn-rg btn-lg btn-default animated fadeInUp delay" href="register.php">REGISTRARSE</a>
                                </div>

                                <?php } ?>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="mbr-arrow mbr-arrow--floating text-center">
            <div class="mbr-section__container container">
                <a class="mbr-arrow__link" href="#features1-75"><i class="glyphicon glyphicon-menu-down"></i></a>
            </div>
        </div>
    </div>
    <!-- modal de logueo -->
    <?php include("modal.php"); ?>
    <!-- Modal -->
    

<!-- end modal logueo -->
</section>

<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="social-buttons2-84" style="background-color: rgb(240, 240, 240);">
    <div class="container cnt-banner">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8"><img src="image/publicad728x90.jpg" alt=""></div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <div class="container" id="features1-75">
        <div class="row">
            <div class="section-header-services">
                <h2 class="dark-text">NOTICIAS</h2>
            </div>
        </div>
    </div>
    <div class="mbr-section__container container">
        <div class="mbr-header mbr-header--inline row cnt-news">
            <!-- Destacada -->
            <div class="col-xs-12 col-md-8 col-sm-8">
                <article class="important">
                    <div class="wpImg">
                        <img src="image/img-nota-16-9.jpg" alt="Telesur">
                        <h2><a href="blog.php">Las inundaciones de Tailandia dejan cientos de muertos y desaparecidos en todo el país</a></h2>
                    </div>
                </article>
            </div>
            <!-- twitter -->
            <div class="col-xs-12 col-md-4 col-sm-4">
                <a class="twitter-timeline" href="https://twitter.com/Tustramitesenvz" data-widget-id="737246281807060992">Tweets por el @Tustramitesenvz.</a>
                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
            </div>
        </div>
        <!-- Noticias secundarias -->
        <div class="row cnt-news-secundarias">
            <div class="col-xs-12 col-md-4 col-sm-4">
                <article>               
                    <img src="image/img-nota-16-9.jpg" alt="Telesur">
                    <h2><a href="blog.php">Siguen los metodos para evitar la propagacion del ebola</a></h2>
                </article>
            </div>
            <div class="col-xs-12 col-md-4 col-sm-4">
                <article>               
                    <img src="image/img-nota-16-9.jpg" alt="Telesur">
                    <h2><a href="blog.php">Siguen los metodos para evitar la propagacion del ebola</a></h2>
                </article>
            </div>
            <div class="col-xs-12 col-md-4 col-sm-4">
                <article>               
                    <img src="image/img-nota-16-9.jpg" alt="Telesur">
                    <h2><a href="blog.php">Siguen los metodos para evitar la propagacion del ebola</a></h2>
                </article>
            </div>
        </div>
    </div>
    <div class="container cnt-banner">
        <div class="row">
            <div class="col-md-8 col-md-offset-1"><img src="image/publicad728x90.jpg" alt=""></div>
        </div>
    </div>
</section>

<div class="container cnt-service" id="features1-75">
    <div class="row">
        <div class="section-header-services">
            <h2 class="dark-text">EXPERTOS EN TRAMITES</h2>
            <h6>¿Eres Venezolano y te encuentras en el extranjero? 
                <br> Nosotros te apoyamos tramitando los documentos que necesites, con envio a cualquier lugar del planeta.
                <br> Ahorra tiempo y dinero nosotros lo tramitamos por ti...
            </h6>
        </div>
    </div>
</div>
  
<section class="content-2 col-4" style="background-color: rgb(255, 255, 255);">   
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-3 focus-box">
                <div class="thumbnail">
                    <div class="image img-h-serv"><img class="undefined ico-service" src="image/_home-delivery-service.png"></div>
                    <div class="caption">
                        <div>
                            <h3 class="red-border-bottom">SERVICIOS</h3>
                            <p>Sed egestas urna quam, sit amet euismod ligula commodo vitae. Cras hendrerit quam est, non dapibus turpis porta in. Fusce viverra, lectus vitae dignissim interdum, erat leo egestas velit, eu tincidunt tellus eros a mauris.&nbsp;</p>
                        </div>
                        <p class="group"><a href="service.php" class="btn-rg btn btn-default">VER MÁS</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 focus-box">
                <div class="thumbnail">
                    <div class="image img-h-serv"><img class="undefined ico-service" src="image/shopping-store-cart-.png"></div>
                    <div class="caption">
                        <div>
                            <h3 class="red-border-bottom">SHOP</h3>
                            <p>Sed egestas urna quam, sit amet euismod ligula commodo vitae. Cras hendrerit quam est, non dapibus turpis porta in. Fusce viverra, lectus vitae dignissim interdum, erat leo egestas velit, eu tincidunt tellus eros a mauris. </p>
                        </div>
                        <p class="group"><a href="shop.php" class="btn-rg btn btn-default">VER MÁS</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 focus-box">
                <div class="thumbnail">
                    <div class="image img-h-serv"><img class="undefined ico-service" src="image/verified-contact.png"></div>
                    <div class="caption">
                        <div>
                            <h3 class="red-border-bottom">CONTACTO</h3>
                            <p>Sed egestas urna quam, sit amet euismod ligula commodo vitae. Cras hendrerit quam est, non dapibus turpis porta in. Fusce viverra, lectus vitae dignissim interdum, erat leo egestas velit, eu tincidunt tellus eros a mauris. </p>
                        </div>
                        <p class="group"><a href="contact.php" class="btn-rg btn btn-default">VER MÁS</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-3 focus-box">
                <div class="thumbnail">
                    <div class="image img-h-serv"><img class="undefined ico-service" src="image/text-document-information.png"></div>
                    <div class="caption">
                        <div>
                            <h3 class="red-border-bottom">GUÍA DE TRAMITES</h3>
                            <p>Sed egestas urna quam, sit amet euismod ligula commodo vitae. Cras hendrerit quam est, non dapibus turpis porta in. Fusce viverra, lectus vitae dignissim interdum, erat leo egestas velit, eu tincidunt tellus eros a mauris. </p>
                        </div>
                        <p class="group"><a href="ayuda.php" class="btn-rg btn btn-default">VER MÁS</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="social-buttons2-84" style="background-color: rgb(240, 240, 240);">
    <div class="mbr-section__container container">
        <div class="mbr-header mbr-header--inline row">
            <div class="col-sm-4">
                <h3 class="mbr-header__text">SÍGUENOS EN:</h3>
            </div>
            <div class="mbr-social-icons mbr-social-icons--style-1 col-sm-8"><a class="mbr-social-icons__icon socicon-bg-twitter" title="Twitter" target="_blank" href="https://twitter.com/mobirise"><i class="socicon socicon-twitter"></i></a> <a class="mbr-social-icons__icon socicon-bg-facebook" title="Facebook" target="_blank" href="https://www.facebook.com/pages/Mobirise/1616226671953247"><i class="socicon socicon-facebook"></i></a> <a class="mbr-social-icons__icon socicon-bg-google" title="Google+" target="_blank" href="https://plus.google.com/u/0/+Mobirise/posts"><i class="socicon socicon-google"></i></a> <a class="mbr-social-icons__icon socicon-bg-youtube" title="YouTube" target="_blank" href="http://www.youtube.com/channel/UCt_tncVAetpK5JeM8L-8jyw"><i class="socicon socicon-youtube"></i></a> <a class="mbr-social-icons__icon socicon-bg-instagram" title="Instagram" target="_blank" href="https://instagram.com/mobirise/"><i class="socicon socicon-instagram"></i></a> <a class="mbr-social-icons__icon socicon-bg-pinterest" title="Pinterest" target="_blank" href="https://www.pinterest.com/mobirise/"><i class="socicon socicon-pinterest"></i></a>  <a class="mbr-social-icons__icon socicon-bg-behance" title="Behance" target="_blank" href="https://www.behance.net/Mobirise"><i class="socicon socicon-behance"></i></a> <a class="mbr-social-icons__icon socicon-bg-tumblr" title="Tumblr" target="_blank" href="http://mobirise.tumblr.com/"><i class="socicon socicon-tumblr"></i></a> <a class="mbr-social-icons__icon socicon-bg-linkedin" title="LinkedIn" target="_blank" href="https://www.linkedin.com/in/mobirise"><i class="socicon socicon-linkedin"></i></a> <a class="mbr-social-icons__icon socicon-bg-android" title="Google Play" target="_blank" href="https://play.google.com/store/apps/details?id=com.mobirise.mobirise"><i class="socicon socicon-android"></i></a></div>
        </div>
    </div>
</section>

<section class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--full-height mbr-section--bg-adapted mbr-parallax-background" id="header1-76" style="background-image: url(http://localhost/tramitesVzla/image/ciudad_noche.jpg);">
    <div class="mbr-box__magnet mbr-box__magnet--sm-padding mbr-box__magnet--center-left">
        <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(0, 0, 0);"></div>
        <div class="mbr-box__container mbr-section__container container">
            <div class="mbr-box mbr-box--stretched">
                <div class="mbr-box__magnet mbr-box__magnet--center-left">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6  col-md-offset-1">
                            <div class="mbr-hero animated fadeInUp">
                                <h1 class="mbr-hero__text">CALENDARIO </h1>
                                <p class="title-calendar head-facebook">Días habiles para las instituciones publicas en Venezuela<br></p>
                            </div>
                            <div id="eventCalendarLocaleFile"></div>
                        </div>
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="col-xs-10 col-sm-6 head-facebook"><span><i class="fa fa-facebook-square" aria-hidden="true"></i> facebook</span></div>
                            <div class="fb-page" data-href="https://www.facebook.com/Tus-tr%C3%A1mites-en-Venezuela-718992711564456/?fref=ts" data-tabs="timeline" data-width="365" data-height="450" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Tus-tr%C3%A1mites-en-Venezuela-718992711564456/?fref=ts" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Tus-tr%C3%A1mites-en-Venezuela-718992711564456/?fref=ts">Tus trámites en Venezuela</a></blockquote></div>
                            <div class="col-xs-10 col-sm-6 banner300x250"><img src="https://tpc.googlesyndication.com/simgad/10252419734186099497" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mbr-section mbr-section--relative mbr-section--fixed-size" id="social-buttons1-87" style="background-color: rgb(255, 255, 255);">
    <div class="mbr-section__container container">
        <div class="mbr-header mbr-header--inline row">
            <div class="col-sm-4">
                <h3 class="mbr-header__text">Compartir: </h3>
            </div>
            <div class="mbr-social-icons col-sm-8">
                <div class="mbr-social-likes social-likes_style-1" data-counters="true">
                    <div class="mbr-social-icons__icon social-likes__icon facebook socicon-bg-facebook" title="Share link on Facebook">
                        <i class="socicon socicon-facebook"></i>
                    </div>
                    <div class="mbr-social-icons__icon social-likes__icon twitter socicon-bg-twitter" title="Share link on Twitter">
                        <i class="socicon socicon-twitter"></i>
                    </div>
                    <div class="mbr-social-icons__icon social-likes__icon plusone socicon-bg-google" title="Share link on Google+">
                        <i class="socicon socicon-google"></i>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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


<script src="assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
<script src="assets/masonry/masonry.pkgd.min.js"></script>
<script src="assets/imagesloaded/imagesloaded.pkgd.min.js"></script>
<script src="assets/social-likes/social-likes.js"></script>
<script src="assets/mobirise-gallery/script.js"></script>
<script src="assets/eventCalendar/js/moment.js" type="text/javascript"></script>
<script src="assets/eventCalendar/js/jquery.eventCalendar.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $("#eventCalendarLocaleFile").eventCalendar({
                eventsjson: 'assets/eventCalendar/json/events.json.php',
                locales: {
                    locale: "es",
                    monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                    "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
                    dayNames: [ 'Domingo','Lunes','Martes','Miércoles',
                    'Jueves','Viernes','Sabado' ],
                    dayNamesShort: [ 'Dom','Lun','Mar','Mie', 'Jue','Vie','Sab' ],
                    txt_noEvents: "No hay eventos para este periodo",
                    txt_SpecificEvents_prev: "",
                    txt_SpecificEvents_after: "eventos:",
                    txt_next: "siguiente",
                    txt_prev: "anterior",
                    txt_NextEvents: "Próximos eventos:",
                    txt_GoToEventUrl: "Ir al evento",
                    "moment": {
                        "months" : [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                        "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
                        "monthsShort" : [ "Ene", "Feb", "Mar", "Abr", "May", "Jun",
                        "Julio", "Ago", "Sep", "Oct", "Nov", "Dic" ],
                        "weekdays" : [ "Domingo","Lunes","Martes","Miércoles",
                        "Jueves","Viernes","Sabado" ],
                        "weekdaysShort" : [ "Dom","Lun","Mar","Mie",
                        "Jue","Vie","Sab" ],
                        "weekdaysMin" : [ "Do","Lu","Ma","Mi","Ju","Vi","Sa" ],
                        "longDateFormat" : {
                            "LT" : "H:mm",
                            "LTS" : "LT:ss",
                            "L" : "DD/MM/YYYY",
                            "LL" : "D [de] MMMM [de] YYYY",
                            "LLL" : "D [de] MMMM [de] YYYY LT",
                            "LLLL" : "dddd, D [de] MMMM [de] YYYY LT"
                        },
                        "week" : {
                            "dow" : 1,
                            "doy" : 4
                        }
                    }
                }
            });
        });
    </script>

</body>
</html>