<!DOCTYPE html>
<html>
<head>

    <?php
    include('common_head.php');
    ?>

    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
</head>
<body>

    <?php 
    include('common_menu.php');
    ?>
    <div id="mensajes"></div>
    <section class="content-2 simple col-1 col-undefined mbr-parallax-background mbr-after-navbar" id="content5-92" style="background-image: url(image/ciudad_noche.jpg);">
        <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(0, 0, 0);"></div>
        <div class="container">
            <div class="row">
                <div>
                    <div class="thumbnail">
                        <div class="caption">
                            <h1 class="text-title"> <i class="fa fa-user-plus" aria-hidden="true"></i> REGISTRO</h1>
                            <div><p>Profesionalidad y compromiso somos expertos en tramites... <br></p></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container cnt-banner">
        <div class="row">
            <div class="col-md-7">
                <div class="section-header-services">
                    <h2 class="dark-text">EXPERTOS EN TRAMITES</h2>
                    <h6>¿Eres Venezolano y te encuentras en el extranjero? 
                        <br> Nosotros te apoyamos tramitando los documentos que necesites, con envio a cualquier lugar del planeta.
                        <br> Ahorra tiempo y dinero nosotros lo tramitamos por ti...
                    </h6>
                </div>  
                <!-- Banner 370 x 370 -->
                <div class="col-md-8 cnt-banner-370x370">
                    <img src="image/10.jpg" alt="">
                </div>
            </div>

            <!-- Formulario -->
            <div class="col-md-5 col-xs-12 col-sm-12" style="border-left: 1px solid darkblue ">
                <form name="formRegusterUser" id="formRegusterUser" data-parsley-validate novalidate="novalidate">
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <h3>Cuenta Personal</h3>
                            <p><em>* Todos los campos son obligatorios</em></p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control-registro" id="nombre" name="nombre" placeholder="Nombre">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input type="text" class="form-control-registro" id="apellido" name="apellido" placeholder="Apellido">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-3 col-xs-3">
                            <select class="form-control-registro form-select" name="tipoDocumento">
                             <option value="ci">C.I</option>
                             <option value="rif">RIF</option>
                             <option value="pasaporte">Pasaporte</option>
                         </select>
                     </div>
                     <div class="col-sm-9 col-xs-9">
                        <input type="text" class="form-control-registro" id="docIdentidad" name="docIdentidad" placeholder="Número de documento de identidad">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-3 col-xs-3">
                        <select class="form-control-registro form-select" name="tipoTelefono">
                            <option value="celular">Celuar</option>
                            <option value="casa">Casa</option>
                        </select>
                    </div>
                    <div class="col-sm-9 col-xs-9">
                        <input type="tel" class="form-control-registro" id="numtelefonico" name="numtelefonico" placeholder='Número telefónico: +99(99)9999-9999)'>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="email" class="form-control-registro" id="correo" name="correo" placeholder="Correo electrónico">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="password" class="form-control-registro" id="passwordcliente" name="passwordcliente" placeholder="Cree su contraseña">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <input type="password" class="form-control-registro" id="repassword" name="repassword" placeholder="Confirme su contraseña">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <select id="country" class="form-control-registro" name="country" title="País de residencia" class="required"><!-- countries -->
                            <option disabled selected value="">País de residencia</option>
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
                        <input type="text" class="form-control-registro" name="direccion" id="direccion" placeholder="Dirección">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-12">
                        <button type="submit" class="btn-color btn btn-primary btn-lg btn-block" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Registrando..." id="myButton">Continuar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('common_redes.php'); ?>


<div class="container cnt-banner">
    <div class="col-md-8 col-md-offset-1 col-xs-12"><img src="image/publicad728x90.jpg" alt=""></div>
</div>

<?php include('common_footer.php');?>


<script src="assets/validate/jquery.validate.js"></script>
<script type="text/javascript" src="assets/validate/validacionRIF.js"></script>

<script>

  // When the browser is ready...
  $(function() {

    // Setup form validation on the #register-form element
    $("#formRegusterUser").validate({

        // Specify the validation rules
        rules: {
            nombre: "required",
            apellido: "required",
            docIdentidad: "required",
            numtelefonico: {
                required: true,
                minlength: 11,
                maxlength:17,
            },
            correo: {
                required: true,
                email: true
            },
            passwordcliente: {
                required: true
               // minlength: 6,
               // notEqualTo: ['#nombre', '#apellido', '#correo']
           },
           repassword: {
            equalTo: '#passwordcliente'
        },
        direccion:"required",
        country: {
            required: true,
        }
    },

        // Specify the validation error messages
        messages: {
         nombre: "Debe especificar su nombre",
         apellido: "Debe especificar su apellido",
         docIdentidad: "Campo Obligatorio",
         numtelefonico: {
            required: "Debe introducir un número telefónico",
            minlength: "El número debe tener al menos 11 dígitos",
            maxlength: "El número NO debe tener mas de 17 dígitos"
        },
        correo: "Se requiere un Email válido",
        passwordcliente: {
            required: "Debe asignar una clave"
                //minlength: "Su clave debe tener más de 6 digitos",
                //notEqualTo:"SHIT"
            },
            repassword: {
                required:"Debe repetir su clave",
                equalTo: 'Sus claves no coninciden'
            },
            direccion:"Debe indicar su dirección",
            country: {
                required: "Debe seleccionar su país"
            }

        },
        
        submitHandler: function(form) {

            var formData = new FormData($("#formRegusterUser")[0]);
             var btn;
             $.ajax({
                url: "process/addCliente.php",
                type: 'POST',
                enctype: 'multipart/form-data',
                data: formData,
                async: false,
                contentType: "application/json",
                dataType: "json",
                success: function (data) {

                    if (data['success']) {
                        $("#mensajes").css("z-index", "999");
                        $("#formRegusterUser")[0].reset();
                        $($("#mensajes").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
                        $('#dataMessage').append(data['data']['message']);
                        setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 3000);
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

<script>(function($){validarRif('docIdentidad'); function validacionRif() {$.validator.addMethod('rif', function(value, element){value = value.toUpperCase();if (!/^[Vv]{1}[-]{1}[0-9]{8}[-]{1}[0-9]{1}$/.test(value))return false;else {return true;}}, 'Ingrese un rif válido.');}})(jQuery);</script>

</body>
</html>