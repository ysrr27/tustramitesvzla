 <div class="left_col scroll-view">
  <div class="navbar nav_title" style="border: 0;">
    <a href="<?=$serveractual?>/index2.php" class="site_title"><img src="<?=$serveractual?>/images/tvzla.png" style="height:90%; width:90%;"></a>
  </div>

  <div class="clearfix"></div>

  <!-- menu profile quick info -->
  <div class="profile">
    <div class="profile_pic">
      <img src="<?=$serveractual?>/images/tvzla.png" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Bienvenido,</span>
      <h2><?=$nombre_completo?></h2>
    </div>
  </div>
  <!-- /menu profile quick info -->

  <br />

  <!-- sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>Menú</h3>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-home"></i> inicio <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu" style="display: block;">
            <li><a href="<?=$serveractual?>/index2.php">Dashboard</a></li>

          </ul>
        </li>

        <?php if (control_access("SOLICITUDES", 'VER')) { ?>

        <li><a><i class="fa fa-shopping-cart"></i> Solicitudes <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <?php if (control_access("SOLICITUDES", 'VER')) { ?>
            <li><a href="<?=$serveractual?>/solicitudes/listar.php"><i class="fa fa-database"></i>Listar</a>
            </li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>

        <?php if (control_access("CLIENTES", 'VER')) { ?>

        <li><a><i class="fa fa-group"></i> Clientes <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <?php if (control_access("CLIENTES", 'AGREGAR')) { ?>
            <li><a href="<?=$serveractual?>/clientes/index.php"><i class="fa fa-plus-square-o"></i>Agregar</a>
            </li>
            <?php } ?>
            <?php if (control_access("CLIENTES", 'VER')) { ?>
            <li><a href="<?=$serveractual?>/clientes/listar.php"><i class="fa fa-database"></i>Listar</a>
            </li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>

        <?php if (control_access("SERVICIOS", 'VER')) { ?>

        <li><a><i class="fa fa-tags"></i> Servicios  <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <?php if (control_access("SERVICIOS", 'AGREGAR')) { ?>
            <li><a href="<?=$serveractual?>/servicios/index.php"><i class="fa fa-plus-square-o"></i>Agregar</a>
            </li>
            <?php } ?>
            <?php if (control_access("SERVICIOS", 'VER')) { ?>
            <li><a href="<?=$serveractual?>/servicios/listar.php"><i class="fa fa-database"></i>Listar</a>
            </li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>

        <?php if (control_access("RECAUDOS", 'VER')) { ?>

        <li><a><i class="fa fa-tasks"></i> Recaudos  <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <?php if (control_access("RECAUDOS", 'AGREGAR')) { ?>
            <li><a href="<?=$serveractual?>/recaudos/index.php"><i class="fa fa-plus-square-o"></i>Agregar</a>
            </li>
            <?php } ?>
            <?php if (control_access("RECAUDOS", 'VER')) { ?>
            <li><a href="<?=$serveractual?>/recaudos/listar.php"><i class="fa fa-database"></i>Listar</a>
            </li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>





        <li><a><i class="fa fa-cog"></i> Administración  <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
           <li><a href="<?=$serveractual?>/administracion/cambiaclave.php"><i class="fa fa-edit"></i>Cambiar Clave</a>
           </li>
           <?php if (control_access("ADMINISTRACION", 'AGREGAR')) { ?>
           <li><a href="<?=$serveractual?>/administracion/crearGrupo.php"><i class="fa fa-users"></i>Crear Grupo</a>
           </li>
           <?php }?>
           <?php if (control_access("ADMINISTRACION", 'AGREGAR')) { ?>
           <li><a href="<?=$serveractual?>/administracion/crearusuario.php"><i class="fa fa-user"></i>Agregar Usuario</a>
           </li>
           <?php }?>
           <?php if (control_access("ADMINISTRACION", 'VER')) { ?>
           <li><a href="<?=$serveractual?>/administracion/index.php"><i class="fa fa-database"></i>Ver usuarios</a>
           </li>

           <?php if (control_access("ADMINISTRACION", 'VER')) { ?>
           <li><a href="<?=$serveractual?>/administracion/indexGrupos.php"><i class="fa fa-reorder"></i>Ver Grupos </a>
           </li>
           <?php }?>

         </ul>
       </li>
       <?php } ?>

     </ul>
   </div>


 </div>
 <!-- /sidebar menu -->

 <!-- /menu footer buttons -->
 <div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <a href="<?=$serveractual?>/cerrar.php" data-toggle="tooltip" data-placement="top" title="Logout">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->
</div>