<?php include('logueo.php'); 
include('extras/conexion.php');
$link=Conectarse();


if((isset($_GET["id"]))&&($_GET["id"]!="")){ $idProducto=strip_tags(htmlentities($_GET["id"])); } else {echo "<script language='JavaScript'>document.location.href='index.php';</script>";}


$SQL="SELECT *, SUM(m_venta_cantidad) AS vendidas FROM m_productos, m_ventas WHERE m_producto_id='$idProducto' AND m_venta_idProducto=m_producto_id";
$query=mysqli_query($link, $SQL);
$disponible=mysqli_num_rows($query);
$row=mysqli_fetch_array($query);
$m_producto_nombre=$row["m_producto_nombre"];
$m_producto_descripcion=$row["m_producto_descripcion"];
$m_producto_precio=$row["m_producto_precio"];
$m_producto_cantidad=$row["m_producto_cantidad"];
$m_producto_estatus=$row["m_producto_estatus"];
$vendidad=$row["vendidas"];
if (is_null($NumeroVentas)) {
    $NumeroVentas=0;
}
$disponibles=$m_producto_cantidad-$NumeroVentas;

$SQL="SELECT SUM(CASE WHEN m_producto_destacado = '1' THEN 1 ELSE 0 END) AS destacadas, SUM(CASE WHEN m_producto_destacado ='0' THEN 1 ELSE 0 END) AS noDestacadas FROM m_productos WHERE m_producto_estatus='1'   ORDER BY  m_producto_estatus ASC ";
$queryDestacada=mysqli_query($link, $SQL);
$rowDes=mysqli_fetch_array($queryDestacada);
$destacadas=$rowDes["destacadas"];
$noDestacadas=$rowDes["noDestacadas"];


if ($disponible==0) {
   echo "<script language='JavaScript'>document.location.href='shop.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <?php include('common_head.php');?>

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
                        <h1 class="text-title">TRAMITES EN TIEMPO RECORD</h1>
                        <div><p>Profesionalidad y compromiso somos expertos en tramites... <br></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content-2" id="features1-77" >
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <section id="example">
                    <div class="col-md-10">
                        <div class="easyzoom easyzoom--overlay easyzoom--with-thumbnails">
                            <span class='zoom' id='ex1'>

                                <?php 
                                $SQlFotos="SELECT * FROM r_fotos_productos WHERE r_fotos_producto_idProducto='$idProducto'";
                                $queryFotos=mysqli_query($link, $SQlFotos);
                                $rowFotos=mysqli_fetch_array($queryFotos);
                                $r_fotos_producto_path=$rowFotos["r_fotos_producto_path"];
                                ?>
                                <img id="destacada" src='multimedia/<?=$r_fotos_producto_path?>' width='555' height='320' alt='Daisy on the Ohoopee'/>
                            </span>
                        </div>
                    </div>    
                    <div class="col-md-2">
                        <ul class="thumbnails">
                            <?php 
                            $SQlFotos="SELECT * FROM r_fotos_productos WHERE r_fotos_producto_idProducto='$idProducto'";
                            $queryFotos=mysqli_query($link, $SQlFotos);
                            $i=1;
                            while ($rowFotos=mysqli_fetch_array($queryFotos)) {
                                $r_fotos_producto_path=$rowFotos["r_fotos_producto_path"];
                                $i++;

                                ?>
                                <li>
                                    <a class="button" id="img-<?=$i?>" href="#.">
                                        <img src="multimedia/<?=$r_fotos_producto_path?>" alt="" />
                                    </a>
                                </li>

                                <?php  } ?>

                            </ul>
                        </div>
                    </section>
                </div>
                <div class="col-md-5 cont-product-title">
                    <h3 class="product-title"><?=$m_producto_nombre?></h3>
                    <div class="star">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                <hr>
                <ul>
                    <li>
                        <h3 class="product-title"><i class="fa fa-eur" aria-hidden="true"></i><?=$m_producto_precio?> <sub>00</sub></h3>
                    </li>
                    <li>
                        <h3><i class="fa fa-paypal" aria-hidden="true"></i> | <i class="fa fa-plane" aria-hidden="true"></i> </h3>
                    </li>
                    <li>
                        <label>Cantidad:</label>
                        <div class="product-quantity clearfix">
                            <a class="btn-cant menos" id="modal-qty-minus">-</a>
                            <input type="text" class="btn-cant form-control" id="cantidad" name="cantidad" value="1">
                            <a class="btn-cant mas" id="modal-qty-plus">+</a>
                        </div>
                    </li>
                    <li><br>

                        <?php if ($usuNombre!="") { ?>

                        <a href="#." class="btn-rg btn btn-default"><i class="fa fa-cart-plus" aria-hidden="true"></i> Comprar</a>
                        <?php } else { ?>
                        <button type="button" class="btn-rg btn btn-default" data-toggle="modal" data-target="#myModallogueo"><i class="fa fa-cart-plus" aria-hidden="true"></i>Comprar</button>
                          <?php } ?>
                    </li>
                    <li><br>
                        <label>Compartir</label>  
                        <div class="addthis_sharing_toolbox"></div>
                    </li>
                </ul>
                <hr>
                <p><?=$m_producto_descripcion?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="col-md-8 col-xs-12 col-md-offset-2 cnt-banner-768-90"><img src="https://s.adroll.com/a/DMQ/V5Q/DMQV5QEXMZE5BJYAVD33RI.jpg" alt=""></div>
            </div>
            <hr>
            <div class="col-lg-12">
                <h3 class="title-shop">Nuevos Productos</h3>
            </div>
            <div class="container">
              <div id="carousel-example-generic" class="carousel slide cont-carrousel" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">

                    <?php
                    for ($i=0 ; $i<$destacadas; $i++ ) { 
                        ?>
                        <li data-target="#carousel-example-generic" <?php if($i==0){ echo 'class="active"';} ?> data-slide-to="<?=$i?>"></li>
                        <?php } ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php
                        $SQL="SELECT * FROM m_productos WHERE m_producto_estatus=1 AND m_producto_destacado=0 ORDER BY m_producto_updated_at DESC LIMIT 0,6";
                        $query=mysqli_query($link, $SQL);
                        $total=mysqli_num_rows($query);
                        $i=0;
                        $j=1;
                        while ($row=mysqli_fetch_array($query)) {
                            $m_producto_id=$row["m_producto_id"];
                            $m_producto_nombre=$row["m_producto_nombre"];
                            $m_producto_descripcion=$row["m_producto_descripcion"];
                            $m_producto_precio=$row["m_producto_precio"];
                            $m_producto_cantidad=$row["m_producto_cantidad"];
                            $m_producto_estatus=$row["m_producto_estatus"];
                            $i++;
                            $SQLFoto="SELECT * FROM r_fotos_productos WHERE r_fotos_producto_idProducto='$m_producto_id' LIMIT 0,1";
                            $queryFoto=mysqli_query($link, $SQLFoto);
                            $rowFoto=mysqli_fetch_array($queryFoto);
                            $r_fotos_producto_path=$rowFoto["r_fotos_producto_path"];
                            if($i==1){ 
                             ?>
                             <div class="item <?php if($j==1){ echo 'active';} ?> ">
                                <?php } ?>

                                <div class="col-md-4">
                                    <div>
                                        <div class="thumbnail">
                                            <div class="image"><img class="undefined ico-service" src="multimedia/<?=$r_fotos_producto_path?>"></div>
                                            <div class="caption">
                                                <div>
                                                    <h3><?=$m_producto_nombre?></h3>
                                                    <div class="star">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    </div>
                                                    <p><?=$m_producto_descripcion?> </p>
                                                    <h3 class="red-border-bottom"><i class="fa fa-eur" aria-hidden="true"></i><?=$m_producto_precio?></h3>
                                                </div>
                                                <p><a href="internal_shop.php?id=<?=$m_producto_id?>"class="btn-rg btn btn-default"><i class="fa fa-cart-plus" aria-hidden="true"></i> Más informacón</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if (($i==3) or($i==$total)) {
                                    echo "</div>";
                                    $i=0;
                                }
                                $j++;

                            } ?>


                        </div>
                    </div>
                </div>
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
        </section>

        <?php include('common_redes.php'); ?>

        <div class="container cnt-banner">
            <div class="col-md-8 col-md-offset-1 col-xs-12"><img src="image/publicad728x90.jpg" alt=""></div>
        </div>

        <?php include('common_footer.php');?>


        <!-- Social Share Kit JS -->
        <script src="share/dist/js/social-share-kit.js?v=1.0.8"></script>

        <script src="assets/bootstrap-carousel-swipe/bootstrap-carousel-swipe.js"></script>
        <script src='assets/mobirise/js/jquery.zoom.js'></script>

        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57865161c869895a"></script>
        <script>
        $(document).ready(function(){
            $('.button').click(function(){
                var test = jQuery(this).attr("id");
                var images = $('#'+test+' img').attr('src');
                $('#destacada').attr('src', images);
                $('#ex1').zoom();  
            });

            $('#ex1').zoom();  
        });



        $(".mas").click(function (e) {
            var maximo = <?=$m_producto_cantidad?>;
            var cantidad=parseInt(document.getElementById("cantidad").value);
            var suma = cantidad+1;
            if (cantidad<maximo) {
            document.getElementById("cantidad").value=suma;
        }
      });
        $(".menos").click(function (e) {
            var minimo = 1;
            var cantidad=parseInt(document.getElementById("cantidad").value);
            var resta = cantidad-1;
            if (cantidad>minimo) {
            document.getElementById("cantidad").value=resta;
        }
      });

        </script>

    </body>
    </html>