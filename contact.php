<?php include('logueo.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <?php include('common_head.php');?>

</head>
<body>

    <?php 
    include('common_menu.php');
    ?>

    <!-- Modal -->
   <?php include("modal.php"); ?>

<!-- end modal logueo -->
</section>


<section class="content-2 simple col-1 col-undefined mbr-parallax-background mbr-after-navbar" id="content5-92" style="background-image: url(image/ciudad_noche.jpg);">
    <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(0, 0, 0);"></div>
    <div class="container">
        <div class="row">
            <div>
                <div class="thumbnail">
                    <div class="caption">
                        <h1 class="text-title"><i class="fa fa-phone-square" aria-hidden="true"></i> CONTÁCTANOS</h1>
                        <div><p>Para nosotros es un placer atenderte. Te ofrecemos diversos medios para que puedas comunicarte con nosotros.<br></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner -->
<section class="content-2 cont-contact">
    <!-- contacto -->
    <div class="slide" id="slide5" data-slide="5" data-stellar-background-ratio="0.5">
        <div class="container clearfix">
            <div class="row">
                <div class="col-xs-4 content col-md-4 contactype active" id="contact-mapClick">
                    <div><i class="fa fa-street-view" aria-hidden="true"></i></div>
                    <p>Map</p>
                </div>
                <div class="col-xs-4 content col-md-4 contactype" id="contact-carClick">
                    <span><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                    <div><i class="fa fa-envelope-o" aria-hidden="true"></i></div> 
                    <p>Correo</p>
                    <p class="p-menu">Correo</p>
                </div>
                <div class="col-xs-4 content col-md-4 contactype" id="contact-busClick">
                    <span><i class="fa fa-share" aria-hidden="true"></i></span>
                    <div><i class="fa fa-share" aria-hidden="true"></i></div>
                    <p>Redes Sociales</p>
                    <p class="p-menu">Redes Sociales</p>
                </div>
            </div>

            <div class="row">
                <div class="content grid_12 contactmap" id="contact-map">
                    <div class="col-md-4">
                        <br>
                        <h2>CONTACTO</h2>
                        <p class="information"><span><i class="fa fa-map-marker" aria-hidden="true"></i>  DIRECCIÓN: </span>Rúa da Coruña, 5A 36208 Vigo Pontevedra España</p>
                        <p class="information"><span><i class="fa fa-whatsapp" aria-hidden="true"></i>  TELEFONO: </span> +34 693 80 18 09</p>
                        <p class="information"><span><i class="fa fa-envelope-o" aria-hidden="true"></i>  CORREO: </span> envenezuelatustramites@gmail.com</p>

                        <div class="clear"></div>
                    </div>
                    <div class="grid_8 omega">
                        <div id="map_canvas"></div>
                    </div>
                </div>

                <div class="content grid_12 contactmap dn" id="contact-car">
                    <div class="col-xs-12 col-md-4">
                        <h2>ESCRÍBENOS A NUESTRO CORREO</h2>
                        <p id="info-correo">tustramitesenvenezuela@gmail.com</p>
                        <br><br>
                    </div>
                    <div class="grid_8 omega">
                        <div class="col-xs-10 grid_6 omega col-md-6">
                            <form>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control-registro" id="nombre" name="nombre" placeholder="Nombres y Apellido">
                                    </div>
                                </div>                                             
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control-registro" id="correo" name="correo" placeholder="Correo electrónico">
                                    </div>
                                </div>                 
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <select id="country" class="form-control-registro" name="country" title="País de residencia"><!-- countries -->
                                            <option value=" " disabled selected>País</option>
                                            <option value="AF">Afghanistan</option>
                                            <option value="AL">Albania</option>
                                            <option value="DZ">Algeria</option>
                                            <option value="AS">American Samoa</option>
                                            <option value="AD">Andorra</option>
                                            <option value="AO">Angola</option>
                                            <option value="AI">Anguilla</option>
                                            <option value="AQ">Antarctica</option>
                                            <option value="AG">Antigua and Barbuda</option>
                                            <option value="AR">Argentina</option>
                                            <option value="AM">Armenia</option>
                                            <option value="AW">Aruba</option>
                                            <option value="AU">Australia</option>
                                            <option value="AT">Austria</option>
                                            <option value="AZ">Azerbaijan</option>
                                            <option value="BS">Bahamas</option>
                                            <option value="BH">Bahrain</option>
                                            <option value="BD">Bangladesh</option>
                                            <option value="BB">Barbados</option>
                                            <option value="BY">Belarus</option>
                                            <option value="BE">Belgium</option>
                                            <option value="BZ">Belize</option>
                                            <option value="BJ">Benin</option>
                                            <option value="BM">Bermuda</option>
                                            <option value="BT">Bhutan</option>
                                            <option value="BO">Bolivia</option>
                                            <option value="BA">Bosnia and Herzegowina</option>
                                            <option value="BW">Botswana</option>
                                            <option value="BV">Bouvet Island</option>
                                            <option value="BR">Brazil</option>
                                            <option value="IO">British Indian Ocean Territory</option>
                                            <option value="BN">Brunei Darussalam</option>
                                            <option value="BG">Bulgaria</option>
                                            <option value="BF">Burkina Faso</option>
                                            <option value="BI">Burundi</option>
                                            <option value="KH">Cambodia</option>
                                            <option value="CM">Cameroon</option>
                                            <option value="CA">Canada</option>
                                            <option value="CV">Cape Verde</option>
                                            <option value="KY">Cayman Islands</option>
                                            <option value="CF">Central African Republic</option>
                                            <option value="TD">Chad</option>
                                            <option value="CL">Chile</option>
                                            <option value="CN">China</option>
                                            <option value="CX">Christmas Island</option>
                                            <option value="CC">Cocos (Keeling) Islands</option>
                                            <option value="CO">Colombia</option>
                                            <option value="KM">Comoros</option>
                                            <option value="CG">Congo</option>
                                            <option value="CD">Congo, the Democratic Republic of the</option>
                                            <option value="CK">Cook Islands</option>
                                            <option value="CR">Costa Rica</option>
                                            <option value="CI">Cote d'Ivoire</option>
                                            <option value="HR">Croatia (Hrvatska)</option>
                                            <option value="CU">Cuba</option>
                                            <option value="CY">Cyprus</option>
                                            <option value="CZ">Czech Republic</option>
                                            <option value="DK">Denmark</option>
                                            <option value="DJ">Djibouti</option>
                                            <option value="DM">Dominica</option>
                                            <option value="DO">Dominican Republic</option>
                                            <option value="TP">East Timor</option>
                                            <option value="EC">Ecuador</option>
                                            <option value="EG">Egypt</option>
                                            <option value="SV">El Salvador</option>
                                            <option value="GQ">Equatorial Guinea</option>
                                            <option value="ER">Eritrea</option>
                                            <option value="EE">Estonia</option>
                                            <option value="ET">Ethiopia</option>
                                            <option value="FK">Falkland Islands (Malvinas)</option>
                                            <option value="FO">Faroe Islands</option>
                                            <option value="FJ">Fiji</option>
                                            <option value="FI">Finland</option>
                                            <option value="FR">France</option>
                                            <option value="FX">France, Metropolitan</option>
                                            <option value="GF">French Guiana</option>
                                            <option value="PF">French Polynesia</option>
                                            <option value="TF">French Southern Territories</option>
                                            <option value="GA">Gabon</option>
                                            <option value="GM">Gambia</option>
                                            <option value="GE">Georgia</option>
                                            <option value="DE">Germany</option>
                                            <option value="GH">Ghana</option>
                                            <option value="GI">Gibraltar</option>
                                            <option value="GR">Greece</option>
                                            <option value="GL">Greenland</option>
                                            <option value="GD">Grenada</option>
                                            <option value="GP">Guadeloupe</option>
                                            <option value="GU">Guam</option>
                                            <option value="GT">Guatemala</option>
                                            <option value="GN">Guinea</option>
                                            <option value="GW">Guinea-Bissau</option>
                                            <option value="GY">Guyana</option>
                                            <option value="HT">Haiti</option>
                                            <option value="HM">Heard and Mc Donald Islands</option>
                                            <option value="VA">Holy See (Vatican City State)</option>
                                            <option value="HN">Honduras</option>
                                            <option value="HK">Hong Kong</option>
                                            <option value="HU">Hungary</option>
                                            <option value="IS">Iceland</option>
                                            <option value="IN">India</option>
                                            <option value="ID">Indonesia</option>
                                            <option value="IR">Iran (Islamic Republic of)</option>
                                            <option value="IQ">Iraq</option>
                                            <option value="IE">Ireland</option>
                                            <option value="IL">Israel</option>
                                            <option value="IT">Italy</option>
                                            <option value="JM">Jamaica</option>
                                            <option value="JP">Japan</option>
                                            <option value="JO">Jordan</option>
                                            <option value="KZ">Kazakhstan</option>
                                            <option value="KE">Kenya</option>
                                            <option value="KI">Kiribati</option>
                                            <option value="KP">Korea, Democratic People's Republic of</option>
                                            <option value="KR">Korea, Republic of</option>
                                            <option value="KW">Kuwait</option>
                                            <option value="KG">Kyrgyzstan</option>
                                            <option value="LA">Lao People's Democratic Republic</option>
                                            <option value="LV">Latvia</option>
                                            <option value="LB">Lebanon</option>
                                            <option value="LS">Lesotho</option>
                                            <option value="LR">Liberia</option>
                                            <option value="LY">Libyan Arab Jamahiriya</option>
                                            <option value="LI">Liechtenstein</option>
                                            <option value="LT">Lithuania</option>
                                            <option value="LU">Luxembourg</option>
                                            <option value="MO">Macau</option>
                                            <option value="MK">Macedonia, The Former Yugoslav Republic of</option>
                                            <option value="MG">Madagascar</option>
                                            <option value="MW">Malawi</option>
                                            <option value="MY">Malaysia</option>
                                            <option value="MV">Maldives</option>
                                            <option value="ML">Mali</option>
                                            <option value="MT">Malta</option>
                                            <option value="MH">Marshall Islands</option>
                                            <option value="MQ">Martinique</option>
                                            <option value="MR">Mauritania</option>
                                            <option value="MU">Mauritius</option>
                                            <option value="YT">Mayotte</option>
                                            <option value="MX">Mexico</option>
                                            <option value="FM">Micronesia, Federated States of</option>
                                            <option value="MD">Moldova, Republic of</option>
                                            <option value="MC">Monaco</option>
                                            <option value="MN">Mongolia</option>
                                            <option value="MS">Montserrat</option>
                                            <option value="MA">Morocco</option>
                                            <option value="MZ">Mozambique</option>
                                            <option value="MM">Myanmar</option>
                                            <option value="NA">Namibia</option>
                                            <option value="NR">Nauru</option>
                                            <option value="NP">Nepal</option>
                                            <option value="NL">Netherlands</option>
                                            <option value="AN">Netherlands Antilles</option>
                                            <option value="NC">New Caledonia</option>
                                            <option value="NZ">New Zealand</option>
                                            <option value="NI">Nicaragua</option>
                                            <option value="NE">Niger</option>
                                            <option value="NG">Nigeria</option>
                                            <option value="NU">Niue</option>
                                            <option value="NF">Norfolk Island</option>
                                            <option value="MP">Northern Mariana Islands</option>
                                            <option value="NO">Norway</option>
                                            <option value="OM">Oman</option>
                                            <option value="PK">Pakistan</option>
                                            <option value="PW">Palau</option>
                                            <option value="PA">Panama</option>
                                            <option value="PG">Papua New Guinea</option>
                                            <option value="PY">Paraguay</option>
                                            <option value="PE">Peru</option>
                                            <option value="PH">Philippines</option>
                                            <option value="PN">Pitcairn</option>
                                            <option value="PL">Poland</option>
                                            <option value="PT">Portugal</option>
                                            <option value="PR">Puerto Rico</option>
                                            <option value="QA">Qatar</option>
                                            <option value="RE">Reunion</option>
                                            <option value="RO">Romania</option>
                                            <option value="RU">Russian Federation</option>
                                            <option value="RW">Rwanda</option>
                                            <option value="KN">Saint Kitts and Nevis</option>
                                            <option value="LC">Saint LUCIA</option>
                                            <option value="VC">Saint Vincent and the Grenadines</option>
                                            <option value="WS">Samoa</option>
                                            <option value="SM">San Marino</option>
                                            <option value="ST">Sao Tome and Principe</option>
                                            <option value="SA">Saudi Arabia</option>
                                            <option value="SN">Senegal</option>
                                            <option value="SC">Seychelles</option>
                                            <option value="SL">Sierra Leone</option>
                                            <option value="SG">Singapore</option>
                                            <option value="SK">Slovakia (Slovak Republic)</option>
                                            <option value="SI">Slovenia</option>
                                            <option value="SB">Solomon Islands</option>
                                            <option value="SO">Somalia</option>
                                            <option value="ZA">South Africa</option>
                                            <option value="GS">South Georgia and the South Sandwich Islands</option>
                                            <option value="ES">Spain</option>
                                            <option value="LK">Sri Lanka</option>
                                            <option value="SH">St. Helena</option>
                                            <option value="PM">St. Pierre and Miquelon</option>
                                            <option value="SD">Sudan</option>
                                            <option value="SR">Suriname</option>
                                            <option value="SJ">Svalbard and Jan Mayen Islands</option>
                                            <option value="SZ">Swaziland</option>
                                            <option value="SE">Sweden</option>
                                            <option value="CH">Switzerland</option>
                                            <option value="SY">Syrian Arab Republic</option>
                                            <option value="TW">Taiwan, Province of China</option>
                                            <option value="TJ">Tajikistan</option>
                                            <option value="TZ">Tanzania, United Republic of</option>
                                            <option value="TH">Thailand</option>
                                            <option value="TG">Togo</option>
                                            <option value="TK">Tokelau</option>
                                            <option value="TO">Tonga</option>
                                            <option value="TT">Trinidad and Tobago</option>
                                            <option value="TN">Tunisia</option>
                                            <option value="TR">Turkey</option>
                                            <option value="TM">Turkmenistan</option>
                                            <option value="TC">Turks and Caicos Islands</option>
                                            <option value="TV">Tuvalu</option>
                                            <option value="UG">Uganda</option>
                                            <option value="UA">Ukraine</option>
                                            <option value="AE">United Arab Emirates</option>
                                            <option value="GB">United Kingdom</option>
                                            <option value="US">United States</option>
                                            <option value="UM">United States Minor Outlying Islands</option>
                                            <option value="UY">Uruguay</option>
                                            <option value="UZ">Uzbekistan</option>
                                            <option value="VU">Vanuatu</option>
                                            <!--<option value="VE">Venezuela</option>-->
                                            <option value="VN">Viet Nam</option>
                                            <option value="VG">Virgin Islands (British)</option>
                                            <option value="VI">Virgin Islands (U.S.)</option>
                                            <option value="WF">Wallis and Futuna Islands</option>
                                            <option value="EH">Western Sahara</option>
                                            <option value="YE">Yemen</option>
                                            <option value="YU">Yugoslavia</option>
                                            <option value="ZM">Zambia</option>
                                            <option value="ZW">Zimbabwe</option>
                                        </select><!-- end countries -->
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <textarea name="mensaje" class="form-control-registro contact-mensaje" id="" cols="30" rows="10" placeholder="Mensaje"></textarea>
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                        <button type="button" class="btn btn-danger">Cancelar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="content grid_12 contactmap dn" id="contact-bus">
                    <div class="col-md-4">
                        <h2>Encuentranos en las Redes Sociales</h2>
                        <p class="information">Trámite y asesoría con cualquier tipo de documentación en Venezuela.</p>
                        <br><br>
                    </div>
                    <div class="grid_8 omega">
                        <div class="grid_6 omega" id="scroll2">
                            <div class="">
                                <div class="mbr-section__container">
                                   <h3 class="mbr-header__text">SÍGUENOS EN:</h3>
                                   <div class="mbr-header mbr-header--inline">
                                    <div class="mbr-social-icons mbr-social-icons--style-1 col-sm-12">
                                        <a class="mbr-social-icons__icon socicon-bg-twitter" title="Twitter" target="_blank" href="https://twitter.com/mobirise"><i class="socicon socicon-twitter"></i></a> 
                                        <a class="mbr-social-icons__icon socicon-bg-facebook" title="Facebook" target="_blank" href="https://www.facebook.com/pages/Mobirise/1616226671953247"><i class="socicon socicon-facebook"></i></a> 
                                        <a class="mbr-social-icons__icon socicon-bg-google" title="Google+" target="_blank" href="https://plus.google.com/u/0/+Mobirise/posts"><i class="socicon socicon-google"></i></a> 
                                        <a class="mbr-social-icons__icon socicon-bg-youtube" title="YouTube" target="_blank" href="http://www.youtube.com/channel/UCt_tncVAetpK5JeM8L-8jyw"><i class="socicon socicon-youtube"></i></a> 
                                        <a class="mbr-social-icons__icon socicon-bg-instagram" title="Instagram" target="_blank" href="https://instagram.com/mobirise/"><i class="socicon socicon-instagram"></i></a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- contacto -->
</section>

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



<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>
<script>$('#contact-car').hide();
    $('#contact-bus').hide();
    $('#contact-bike').hide();
    $('#contact-phone').hide();
    $('#contact-mail').hide();
    $('#contact-carClick').removeClass('active');
    $('#contact-busClick').removeClass('active');
    $('#contact-bikeClick').removeClass('active');
    $('#contact-phoneClick').removeClass('active');
    $('#contact-mailClick').removeClass('active');
    $('#contact-map').show();
    $('#contact-mapClick').addClass('active');
    $('#contact-mapClick').click(function () {
        $('#contact-car').hide();
        $('#contact-bus').hide();
        $('#contact-bike').hide();
        $('#contact-phone').hide();
        $('#contact-mail').hide();
        $('#contact-carClick').removeClass('active');
        $('#contact-busClick').removeClass('active');
        $('#contact-bikeClick').removeClass('active');
        $('#contact-phoneClick').removeClass('active');
        $('#contact-mailClick').removeClass('active');
        $('#contact-map').show();
        $('#contact-mapClick').addClass('active');
    });
    $('#contact-carClick').click(function () {
        $('#contact-map').hide();
        $('#contact-bus').hide();
        $('#contact-bike').hide();
        $('#contact-phone').hide();
        $('#contact-mail').hide();
        $('#contact-mapClick').removeClass('active');
        $('#contact-busClick').removeClass('active');
        $('#contact-bikeClick').removeClass('active');
        $('#contact-phoneClick').removeClass('active');
        $('#contact-mailClick').removeClass('active');
        $('#contact-car').show();
        $('#contact-carClick').addClass('active');
    });
    $('#contact-busClick').click(function () {
        $('#contact-map').hide();
        $('#contact-car').hide();
        $('#contact-bike').hide();
        $('#contact-phone').hide();
        $('#contact-mail').hide();
        $('#contact-mapClick').removeClass('active');
        $('#contact-carClick').removeClass('active');
        $('#contact-bikeClick').removeClass('active');
        $('#contact-phoneClick').removeClass('active');
        $('#contact-mailClick').removeClass('active');
        $('#contact-bus').show();
        $('#contact-busClick').addClass('active');
    });
    $('#contact-bikeClick').click(function () {
        $('#contact-map').hide();
        $('#contact-car').hide();
        $('#contact-bus').hide();
        $('#contact-phone').hide();
        $('#contact-mail').hide();
        $('#contact-mapClick').removeClass('active');
        $('#contact-carClick').removeClass('active');
        $('#contact-busClick').removeClass('active');
        $('#contact-phoneClick').removeClass('active');
        $('#contact-mailClick').removeClass('active');
        $('#contact-bike').show();
        $('#contact-bikeClick').addClass('active');
    });
    $('#contact-phoneClick').click(function () {
        $('#contact-map').hide();
        $('#contact-car').hide();
        $('#contact-bus').hide();
        $('#contact-bike').hide();
        $('#contact-mail').hide();
        $('#contact-mapClick').removeClass('active');
        $('#contact-carClick').removeClass('active');
        $('#contact-busClick').removeClass('active');
        $('#contact-bikeClick').removeClass('active');
        $('#contact-mailClick').removeClass('active');
        $('#contact-phone').show();
        $('#contact-phoneClick').addClass('active');
    });
    $('#contact-mailClick').click(function () {
        $('#contact-map').hide();
        $('#contact-car').hide();
        $('#contact-bus').hide();
        $('#contact-bike').hide();
        $('#contact-phone').hide();
        $('#contact-mapClick').removeClass('active');
        $('#contact-carClick').removeClass('active');
        $('#contact-busClick').removeClass('active');
        $('#contact-bikeClick').removeClass('active');
        $('#contact-phoneClick').removeClass('active');
        $('#contact-mail').show();
        $('#contact-mailClick').addClass('active');
    });
    var map;
    function initialize() {
        var mapOptions = {
            zoom: 13,
            center: new google.maps.LatLng(42.22128, -8.7335685,17),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
</script>

  
</body>
</html>