<?php include('logueo.php'); 
include('extras/conexion.php');
$link=Conectarse();


$SQL="SELECT SUM(CASE WHEN m_producto_destacado = '1' THEN 1 ELSE 0 END) AS destacadas, SUM(CASE WHEN m_producto_destacado ='0' THEN 1 ELSE 0 END) AS noDestacadas FROM m_productos WHERE m_producto_estatus='1'   ORDER BY  m_producto_estatus ASC ";
$queryDestacada=mysqli_query($link, $SQL);
$row=mysqli_fetch_array($queryDestacada);
$destacadas=$row["destacadas"];
$noDestacadas=$row["noDestacadas"];

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
</section>


<section class="content-2 simple col-1 col-undefined mbr-parallax-background mbr-after-navbar" id="content5-92" style="background-image: url(image/ciudad_noche.jpg);">
    <div class="mbr-overlay" style="opacity: 0.6; background-color: rgb(0, 0, 0);"></div>
    <div class="container">
        <div class="row">
            <div>
                <div class="thumbnail">
                    <div class="caption">
                        <h1 class="text-title"><i class="fa fa-shopping-cart" aria-hidden="true"></i> SHOP</h1>
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
                <hr>
                    <div class="col-md-12">
                        <section class="mbr-slider mbr-section mbr-section--no-padding carousel slide" data-ride="carousel" data-wrap="true" data-interval="5000" id="slider2-78">
                            <div class="mbr-section__container container article-slider mbr-section__container--isolated">
                                <div class="">
                                    <ol class="carousel-indicators">

                                        <?php
                                        for ($i=0 ; $i<$destacadas; $i++ ) { 
                                            if ($i<=3) {
                                        ?>
                                        <li data-app-prevent-settings="" data-target="#slider2-78" <?php if($i==0){ echo 'class="active"';} ?> data-slide-to="<?=$i?>"></li>
                                        <?php } } ?>
                                    </ol>
                                    <div class="carousel-inner" role="listbox">


                                        <?php
                                        $SQL="SELECT * FROM m_productos WHERE m_producto_estatus=1 AND m_producto_destacado=1 ORDER BY m_producto_updated_at DESC LIMIT 0,3";
                                        $query=mysqli_query($link, $SQL);
                                        $k=1;
                                        while ($row=mysqli_fetch_array($query)) {
                                            $m_producto_id=$row["m_producto_id"];
                                            $m_producto_nombre=$row["m_producto_nombre"];
                                            $m_producto_descripcion=$row["m_producto_descripcion"];
                                            $m_producto_precio=$row["m_producto_precio"];
                                            $m_producto_cantidad=$row["m_producto_cantidad"];
                                            $m_producto_estatus=$row["m_producto_estatus"];
                                            $SQLFoto="SELECT * FROM r_fotos_productos WHERE r_fotos_producto_idProducto='$m_producto_id' LIMIT 0,1";
                                            $queryFoto=mysqli_query($link, $SQLFoto);
                                            $rowFoto=mysqli_fetch_array($queryFoto);
                                            $r_fotos_producto_path=$rowFoto["r_fotos_producto_path"];
                                        ?>
                                        <div class="mbr-box mbr-section mbr-section--relative mbr-section--fixed-size mbr-section--bg-adapted item dark center <?php if($k==1){ echo 'active';} ?>">
                                            <div class="mbr-box__magnet">
                                                <div>                                                  
                                                    <div class="row">
                                                    <div class="col-md-4">
                                                        <img src="multimedia/<?=$r_fotos_producto_path?>">
                                                    </div>
                                                        <div class="col-sm-8">
                                                            <div class="caption">
                                                                <div>
                                                                    <h3 class=""><?=$m_producto_nombre?></h3>
                                                                    <div class="star">
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star-o" aria-hidden="true"></i>
                                                                    </div>
                                                                    <p><?=$m_producto_descripcion?></p>  
                                                                </div>
                                                                <h3><i class="fa fa-eur" aria-hidden="true"></i><?=$m_producto_precio?></h3>
                                                                <p class="group"><a href="internal_shop.php?id=<?=$m_producto_id?>" class="btn-rg btn btn-default"><i class="fa fa-cart-plus" aria-hidden="true"></i> VER MÁS</a></p>
                                                            </div>            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $k++; } ?>
                                     
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <div class="row">
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
                    <div class="col-md-8 col-xs-12 col-md-offset-2 cnt-banner-768-90">
                        <img src="https://s.adroll.com/a/DMQ/V5Q/DMQV5QEXMZE5BJYAVD33RI.jpg" alt="">
                    </div>
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

</body>
</html>