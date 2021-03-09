<nav id="sidebar">
<div class="sidebar-content">

    <div class="content-header content-header-fullrow mb-20">
        <div class="content-header-section sidebar-mini-visible-b">
            <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                <span class="text-dual-primary-dark">C</span><span class="text-success">F</span>
            </span>
        </div>
        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                <i class="fa fa-times text-danger"></i>
            </button>
            <div class="content-header-item">
                <a class="font-w700" href="./">
                <img src="https://www.comunidadforester.com/assets/media/favicons/logotipo_forester.png" width="60"  alt=""/> </a>
            </div>
        </div>
    </div>

    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li><a class="<?php if($menu == '0'){ echo 'active';}; ?>" href="./"><i class="si si-home"></i>Escritorio</a></li>
            <li><a class="<?php if($menu == '1'){ echo 'active';}; ?>" href="reply_guias.php"><i class="si si-directions"></i>Respuestas</a></li>
            <li class="<?php if($menu == '3' ||$menu == '4' ){ echo 'open';}; ?>">
                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-trash"></i><span class="sidebar-mini-hide">Eliminar</span></a>
                <ul>
                    <li><a class="<?php if($menu == '3'){ echo 'active';}; ?>" href="delete_activity_alumno.php">Actividad Alumnos</a></li>
                    <li><a class="<?php if($menu == '4'){ echo 'active';}; ?>" href="delete_activity_grupo.php">Actividad Grupos</a></li>
                </ul>
            </li>
            <li class="<?php if($menu == '6' ||$menu == '7' ){ echo 'open';}; ?>">
                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-trash"></i><span class="sidebar-mini-hide">Historico</span></a>
                <ul>
                    <li><a class="<?php if($menu == '6'){ echo 'active';}; ?>" href="delete_hist_alumno.php">Actividad Alumnos</a></li>
                    <li><a class="<?php if($menu == '7'){ echo 'active';}; ?>" href="delete_hist_alumno.php">Actividad Grupos</a></li>
                </ul>
            </li>
            
            <li><a class="<?php if($menu == '2'){ echo 'active';}; ?>" href="alumnos.php"><i class="si si-emoticon-smile"></i>Alumnos</a></li>
            <li><a class="<?php if($menu == '5'){ echo 'active';}; ?>" href="chat/<?php echo $_SESSION['id_user'] ?>/"><i class="si si-bubbles"></i>Chat</a></li>
        </ul>
    </div>
</div>
</nav>