
<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--transparent mbr-navbar--sticky mbr-navbar--auto-collapse" id="menu-74">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                        <span class="mbr-brand__logo"><a href="index.php"><img class="mbr-navbar__brand-img mbr-brand__img" src="image/logistics-international-service-by-airplane.png" alt="Tus Tramites en Venezuela"></a></span>
                        <span class="mbr-brand__name"><a class="mbr-brand__name text-white" href="#">T. VZLA</a></span>
                    </span>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger text-white"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column">
                            <ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active">
                                <li class="mbr-navbar__item"><a class="mbr-buttons__link btn btn-rg text-white " href="index.php">INICIO</a></li> 
                                <li class="mbr-navbar__item"><a class="mbr-buttons__link btn btn-rg text-white" href="service.php">SERVICIOS</a></li>
                                <li class="mbr-navbar__item"><a class="mbr-buttons__link btn btn-rg text-white" href="shop.php">SHOP</a></li> 
                                <li class="mbr-navbar__item"><a class="mbr-buttons__link btn btn-rg text-white" href="quienessomos.php">QUIÉNES SOMOS</a></li>
                                <li class="mbr-navbar__item"><a class="mbr-buttons__link btn btn-rg text-white" href="contact.php">CONTACTO</a>
                                     <?php if ($usuNombre!="") { ?>
                                    <button type="button" class="btn-log mbr-buttons__btn btn btn-lg animated fadeInUp delay btn-warning" data-toggle="modal"><a href="myaccount.php" title="Ir a mi cuenta"><i class="fa fa-user" aria-hidden="true"></i> <?=$usuNombre?></a></button>
                                      <button type="button" class="btn-log mbr-buttons__btn btn btn-lg animated fadeInUp delay btn-warning"><a href="cerrar.php" title="Cerrar Sesión"><i class="fa fa-eject" aria-hidden="true"></i></a></button>
                                    <?php } else { ?>
                                     <button type="button" class="btn-log mbr-buttons__btn btn btn-lg animated fadeInUp delay btn-warning" data-toggle="modal" data-target="#myModallogueo"><i class="fa fa-user" aria-hidden="true"></i></button>
                                     <?php } ?>

                                     
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>