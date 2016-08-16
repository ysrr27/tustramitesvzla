<?php include('logueo.php');
include('extras/conexion.php');
$link=Conectarse();
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
    <!-- modal de logueo -->

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
                        <h1 class="text-title">SERVICIOS</h1>
                        <div><p>Tramites en tiempo record... <br></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner -->
<section class="content-2" id="features1-77" style="background-color: rgb(28, 73, 110);" >

    <div class="container">   
        <div class="row">
            <div class="col-md-8 col-xs-12 col-md-offset-2 cnt-banner-768-90"><img src="https://s.adroll.com/a/DMQ/V5Q/DMQV5QEXMZE5BJYAVD33RI.jpg" alt=""></div>
        </div>
        <br><br> 
        <div class="row">
            <div class="col-md-12">


            <?php 
            //SQL DE SERVICIOS
            $SQL="SELECT * FROM m_servicios WHERE m_servicio_estatus='1' ORDER BY m_servicio_nombre ASC";
            $query=mysqli_query($link, $SQL);
            while ($row=mysqli_fetch_array($query)) {
                $m_servicio_id=$row["m_servicio_id"];
                $m_servicio_nombre=$row["m_servicio_nombre"];
                $m_servicio_descripcion=$row["m_servicio_descripcion"];
                $m_servicio_icono=$row["m_servicio_icono"];
                $m_servicio_id=$row["m_servicio_id"];
                $m_servicio_id=$row["m_servicio_id"];
                $m_servicio_id=$row["m_servicio_id"];

            
            ?>

                <div class="s-box">
                    <div class="thumbnail">
                        <a href="internal-service.php?serv=<?=$m_servicio_id?>">
                            <div class="image image-service" ><i class="fa <?=$m_servicio_icono?> fa-5x" style="margin-top:25px;" aria-hidden="true"></i></div>
                            <div class="caption">
                                <div>
                                    <h3 class="red-border-bottom titleH3botton"><?=$m_servicio_nombre?></h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

              <?php } ?>

              
              
            </div>
            <div class="col-md-12">
             <div class="mbr-arrow mbr-arrow--floating text-center">
                <div class="mbr-section__container container">
                    <a class="mbr-arrow__link" href="#features1-75"><i class="glyphicon glyphicon-menu-down"></i></a>
                </div>
            </div>        
            <div class="col-md-12 col-xs-12 banner-servicio">
                <div class="col-md-8 col-xs-12 col-md-offset-2 cnt-banner-768-90"><img src="https://s.adroll.com/a/DMQ/V5Q/DMQV5QEXMZE5BJYAVD33RI.jpg" alt=""></div>
            </div>

        </div>

    </div>
</section>

<?php include('common_redes.php'); ?>



<?php include('common_footer.php');?>



</body>
</html>