   
    
    <div class="modal fade" id="myModallogueo" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header modal-head-login">
                <div class="row col-ms-10">
                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                                <div id="mensajes"></div>
                            </span>
                        </div>
                    </div>
                </div>
                    
                </div>

                <div class="modal-body">
                    <div class="row">

                        <form class="form-horizontal" name="formModalogin" id="formModalogin">
                            <div class="form-group row col-sm-10">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-addon ico-login"><i class="fa fa-user" aria-hidden="true"></i></div>
                                        <input type="email" class="form-control-registro form-login" name="emailLogin" id="emailLogin" placeholder="Correo electrónico">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-sm-10">
                                <div class="col-md-3"></div>
                                <div class="col-md-9">
                                    <div class="input-group">
                                        <div class="input-group-addon ico-login"><i class="fa fa-lock" aria-hidden="true"></i></div>
                                        <input type="password" class="form-control-registro form-login" name="passwordModal" id="passwordModal" placeholder="Contraseña">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row col-sm-10">
                                <div class="col-md-3"></div>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn-login btn btn-primary btn-lg btn-block">Entrar</button>
                                </div>
                            </div>
                        </form>
                    </div>   
                    <div class="modal-footer">
                        <div class="row">
                            <div class="col-md-6 text-left"><a href="register.php"><p>Registrarse</p></a></div>
                            <div class="col-md-6"> <a href="#"><p>¿Olvidaste tú contraseña?</p></a></div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
  $(function() {

    $("#formModalogin").validate({

      rules: {
        emailLogin: "required",
        passwordModal: "required"
      },

      messages: {
        emailLogin: "Debe especificar su usuario de correo",
        passwordModal: "Debe especificar la contraseña"
      },

      submitHandler: function(form) {
        var formData = new FormData($("#formModalogin")[0]);
       $.ajax({
          url: "process/class_login.php",
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
            setTimeout("location.reload();", 500);
          } else{
            $("#mensajes").css("z-index", "999");
            $($("#mensajes").html("<div class='alert alert-error'><a href='#' class='close' data-dismiss='alert' id='cerrar'>&times;</a><div id='dataMessage'></div></div>").fadeIn("slow"));
            $('#dataMessage').append(data['data']['message']);
            setTimeout(function() { $(".alert").alert('close'); $("#mensajes").css("z-index", "-1");}, 2000);
          };
        },
        error: function(data) {
          $($("#mensajes").html(data).fadeIn( "slow" ));
          $.each(data['data']['message'], function(index, val) {
            $('#mensajes').append(val+ '<br>');
          });
        },
        cache: false,
        contentType: false,
        processData: false
      });

}
});

});


$(function() {
 $('#myModallogueo').on('hidden.bs.modal', function () {
  $("#formModalogin")[0].reset();
})
}); 

</script>