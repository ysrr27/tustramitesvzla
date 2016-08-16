<script src="assets/mobirise/js/fileinput.js" type="text/javascript"></script>
<div class="modal fade" id="myModal" role="dialog">


    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Detalles de su solitud:</h4>
            </div>
            <div class="modal-body">
                <!-- page content -->
                <div class="page-title">
                    <div class="row facture">
                        <div class="col-md-4"> 
                            <ul class="listFacture"> <strong>Tipo de Tramite:</strong>
                                <li><?=strtoupper($m_servicio_nombre)?></li>                         
                            </ul>                                  
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <!-- Smart Wizard -->
                                    <div class="x_content">
                                        <!-- up file -->
                                        <div class="row">
                                            <div id="wizard" class="swMain">
                                                <ul class="anchor">
                                                    <li>
                                                        <a href="#step-1" id="step1" class="selected" isdone="1" rel="1">
                                                            <span class="stepNumber">1</span>
                                                            <span class="stepDesc">
                                                                Recaudos<br>
                                                                <small>Agregar los recaudos del tramite</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-3" id="step2" class="disabled" isdone="0" rel="2">
                                                            <span class="stepNumber">2</span>
                                                            <span class="stepDesc">
                                                                Datos de envió<br>
                                                                <small>Agregar los datos para el envió</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#step-4" id="step3" class="disabled" isdone="0" rel="3">
                                                            <span class="stepNumber">3</span>
                                                            <span class="stepDesc">
                                                                Resumen<br>
                                                                <small>Detalle de su tramite</small>
                                                            </span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>     

                                                                                        
                                        <div class="row">
                                            <form name="formSolicitud" id="formSolicitud" method="POST" action="process/addSolicitud.php">
                                                <div id="step-1">   
                                                    <div class=" kv-main"> 

                                                        <input type="hidden" name="cantidadRecaudos" id="cantidadRecaudos" value="<?=$cantidadRecaudos?>">
                                                        <input type="hidden" name="idServicio" id="idServicio" value="<?=$idServicio?>">                                                             
                                                        <p><em>*Todos los recaudos son obligatorios y en formato  PDF <i class="fa fa-file-pdf-o" aria-hidden="true"></i> </em></p>
                                                        <p><ol>
                                                         <?php 

                                                         $SQlRecaudos="SELECT * FROM r_recaudos_servicios AS S, m_recaudos as R WHERE S.r_recaudos_servicios_idServicio='$idServicio' AND  S.r_recaudos_servicio_idRecaudo=R.m_recaudo_id AND R.m_recaudo_estatus='1'";
                                                         $queryRecaudos=mysqli_query($link, $SQlRecaudos);
                                                         while ($rowRecaduos=mysqli_fetch_array($queryRecaudos)) {
                                                            $m_recaudo_nombre=$rowRecaduos["m_recaudo_nombre"];
                                                            $m_recaudo_descripcion=$rowRecaduos["m_recaudo_descripcion"];

                                                            ?>
                                                            <li> <i class="fa fa-file-pdf-o" aria-hidden="true"></i> <?=$m_recaudo_nombre?></li>
                                                            <?php } ?>
                                                        </ol></p>
                                                        <input type="hidden" name="idsFiles" id="idsFiles" value="">
                                                        <input id="archivos" multiple name="archivos[]" type="file" multiple data-min-file-count="1"  accept="application/pdf" data-upload-url="process/uploadMedia.php">
                                                        <div id="errorBlock" class="help-block"></div>

                                                        <hr>
                                                        <br>
                                                    </div>
                                                </div>


                                                <div id="step-2" class="col-md-9 col-md-offset-1" style="display: none;">
                                                    <p><em><i class="fa fa-plane" aria-hidden="true"></i> *Dirección donde desea recibir su tramite</em></p>   
                                                    <form>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control-registro" id="nombre" name="nombre" placeholder="Nombres">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control-registro" id="apellido" name="apellido" placeholder="Apellidos">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-sm-3 col-xs-3">
                                                                <select class="form-control-registro" name="tipotelefono" id="tipotelefono">
                                                                    <option value="celular">Celular</option>
                                                                    <option value="casa">Casa</option>
                                                                    <option value="casa">Oficina</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-9 col-xs-9">
                                                                <input type="text" class="form-control-registro numeric" id="numtelefono" name="numtelefono" placeholder="Numero telefónico">
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
                                                                <input type="text" class="form-control-registro numeric" id="codigo" placeholder="Código Postal">
                                                            </div>
                                                        </div>
                                                        <p><em><i class="fa fa-map-marker" aria-hidden="true"></i> *Debe colocar la dirección exacta</em></p>
                                                        <div class="form-group row">
                                                            <div class="col-sm-12">
                                                                <input type="text" class="form-control-registro" id="direccion" name="direccion" placeholder="Dirección">
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div id="step-3" class="content" style="display: none;">
                                                        <div class="col-md-9 col-md-offset-1">
                                                            <div class="panel panel-default">
                                                                <div id="mensajesx"></div>
                                                                <div class="panel-heading">
                                                                    <p><em><i class="fa fa-wpforms" aria-hidden="true"></i> Detalle de su tramite</em></p> 
                                                                </div>
                                                                <div class="panel-body">
                                                                    <div class="row">
                                                                        <div class="col-md-4"> <strong>Tipo de tramite</strong></div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-4"> <?=strtoupper($m_servicio_nombre)?></div>
                                                                    </div>
                                                                    <hr><p><strong> Datos del envio <i class="fa fa-envelope-o" aria-hidden="true"></i></strong></p>
                                                                    <div class="row factureTop">
                                                                        <div class="col-md-4"><strong> Nombres: </strong></div>
                                                                        <div class="col-md-4"> <strong>Apellidos: </strong></div>
                                                                        <div class="col-md-4"><strong>Telefono de contacto: </strong></div> 
                                                                        <div class="col-md-4"><input type="text" name="nameFinal" id="nameFinal" class="invisibble" readonly>  </div>
                                                                        <div class="col-md-4"> <input type="text" name="lastnameFinal" id="lastnameFinal" class="invisibble" readonly> </div>
                                                                        <div class="col-md-4"><input type="text" name="numberFinal" id="numberFinal" class="invisibble" readonly> </div>
                                                                    </div>
                                                                    <div class="row factureTop">
                                                                        <div class="col-md-4"><strong> Correo Electrónico: </strong></div>
                                                                        <div class="col-md-4"><strong> País: </strong></div>
                                                                        <div class="col-md-4"><strong> Codigo Postal:</strong></div> 
                                                                        <div class="col-md-4"><input type="text" name="mailFinal" id="mailFinal" class="invisibble" reandonly>  </div>
                                                                        <div class="col-md-4"><input type="text" name="countryFinal" id="countryFinal" class="invisibble" reandonly>  </div>
                                                                        <div class="col-md-4"><input type="text" name="postalcodeFinal" id="postalcodeFinal" class="invisibble" readonly>  </div>
                                                                    </div>
                                                                    <div class="row factureTop">
                                                                        <div class="col-md-12"><strong> Dirección:</strong></div>
                                                                        <div class="col-md-12"><input type="text" name="addressFinal" id="addressFinal" class="invisibble" readonly> </div>
                                                                    </div>
                                                                    <hr><p><strong> Recaudos <i class="fa fa-file-pdf-o" aria-hidden="true"></i></strong></p>

                                                                    <div class="row factureTop">

                                                                        <p>
                                                                            <ol id="filesGet">

                                                                            </ol>

                                                                        </p>

                                                                    </div>
                                                                    <div class="row factureTop">
                                                                    <input type="text" name="recaudosFinal" id="recaudosFinal" class="invisible" style="color:#FFFFFF" >
                                                                    </div>
                                                                     <div class="row factureTop">
                                                                    <input type="text" name="cantidadRecaudosFinal" id="cantidadRecaudosFinal" class="invisible" style="color:#FFFFFF">
                                                                    </div>
                                                                </div>
                                                                <!-- /.panel-body -->
                                                            </div>
                                                            <!-- /.panel -->
                                                        </div>
                                                    </div>




                                                </div>

                                                <div class="row swMain">
                                                    <div class="actionBar">
                                                        <div class="msgBox">
                                                            <div class="content">

                                                            </div>
                                                            <a href="#" class="close">X</a>
                                                        </div>
                                                        <div class="loader">Loading</div>
                                                        <button type="button" class="buttonFinish buttonDisabled" onClick="uploadFiles()">Confirmar</button>
                                                        <button type="button" class="buttonNext" id="continuar" onClick="pasarData()" >Continuar</button>
                                                        <button type="button" class="buttonPrevious buttonDisabled" >Atras</button>
                                                    </div>
                                                </form>
                                            </div>

                                            <!-- End up file -->
                                        </div>                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>  


        </div>
    </div>
    <script>

    $('#archivos').fileinput({
        language: 'es',
        uploadUrl: '#',
        allowedFileExtensions : ['pdf', 'png','gif', 'jpg'],
    });

    $('#archivos').on('fileuploaded', function(event, data, previewId, index) {
      var form = data.form, files = data.files, extra = data.extra,
      response = data.response, reader = data.reader;


      $.each(response, function(index, val) {
        var input = $( "#idsFiles" );
        input.val( input.val() +","+ val );
    });

  })

    </script>

    <script>

  // When the browser is ready...
  $(function() {

    // Setup form validation on the #register-form element
    $("#formSolicitud").validate({

        // Specify the validation rules
        rules: {
            nameFinal: "required",
            lastnameFinal: "required",
            docIdentidad: "required",
            numberFinal: {
                required: true,
                minlength: 11,
                maxlength:17,
            },
            mailFinal: {
                required: true,
                email: true
            },
            postalcodeFinal:"required",
            direccion:"required",
            countryFinal: {
                required: true,
            },
            nombre: "required",
            apellido: "required",
            numtelefono: {
                required: true,
                minlength: 11,
                maxlength:17,
            },
            correo: {
                required: true,
                email: true
            },
            codigo:"required",
            direccion:"required",
            country: {
                required: true,
            }, 
            recaudosFinal: "required",
            cantidadRecaudosFinal: {
                equalTo: '#cantidadRecaudos'
            }
        },

        // Specify the validation error messages
        messages: {
         nameFinal: "Los datos de envío están incompletos, debe especificar su nombre",
         lastnameFinal: "Los datos de envío están incompletos, debe especificar su apellido",
         numberFinal: {
            required: "Debe introducir un número telefónico",
            minlength: "El número debe tener al menos 11 dígitos",
            maxlength: "El número NO debe tener mas de 17 dígitos"
        },
        mailFinal: "Se requiere un Email válido",
        direccion: "Debe especificar su dirección exacta",
        postalcodeFinal:"Debe indicar su dirección",
        countryFinal: {
            countryFinal: "Debe seleccionar su país"
        },
        nombre: "Los datos de envío están incompletos, debe especificar su nombre",
        apellido: "Los datos de envío están incompletos, debe especificar su apellido",
        numtelefono: {
            required: "Debe introducir un número telefónico",
            minlength: "El número debe tener al menos 11 dígitos",
            maxlength: "El número NO debe tener mas de 17 dígitos"
        },
        correo: "Se requiere un Email válido",
        direccion: "Debe especificar su dirección exacta",
        codigo:"Debe indicar su dirección",
        country: {
            country: "Debe seleccionar su país"
        }, 
        recaudosFinal:"Debe adjuntar los recaudos",
        cantidadRecaudosFinal: {
            required:"No ha adjuntado sus recaudos, por favor regrese al paso 1",
            equalTo: 'Sus recaudos están incompletos'
        }

    },

    submitHandler: function(form) {
        
            var formData = new FormData($("#formSolicitud")[0]);
             $.ajax({
                url: "process/addSolicitud.php",
                type: 'POST',
                enctype: 'multipart/form-data',
                data: formData,
                async: false,
                contentType: "application/json",
                dataType: "json",
                success: function (data) {
                    if (data['success']) {
                        $("#mensajesx").css("z-index", "999");
                        $($("#mensajesx").html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
                        $('#dataMessage').append(data['data']['message']);
                        setTimeout(function() { $(".alert").alert('close'); $("#mensajesx").css("z-index", "-1");}, 3000);
                        setTimeout("location.href='myaccount.php';", 500);
                    } else{
                        $("#mensajesx").css("z-index", "999");
                        $.each(data['data']['message'], function(index, val) {
                            $($("#mensajesx").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
                            $('#dataMessage').append(val+ '<br>');
                        });
                        setTimeout(function() { $(".alert").alert('close'); $("#mensajesx").css("z-index", "-1");}, 2000);
                    };
                },
                error: function(data) {
                    $("#mensajesx").css("z-index", "999");
                    $($("#mensajesx").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
                    $.each(data['data']['message'], function(index, val) {
                        $('#dataMessage').append(val+ '<br>');
                    });
                    setTimeout(function() { $(".alert").alert('close'); $("#mensajesx").css("z-index", "-1");}, 2000);
                },
                cache: false,
                contentType: false,
                processData: false
            });
}
});

});


</script>
