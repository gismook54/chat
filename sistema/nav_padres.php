
<?php include("chat/all/includes/loader.php"); ?>

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
                <img src="../assets/media/favicons/logotipo_forester.png" width="60"  alt=""/> </a>
            </div>
        </div>
    </div>

    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li><a class="<?php if($menu == '0'){ echo 'active';}; ?>" href="./"><i class="si si-home"></i>Escritorio</a></li>
            <li class="open">
                <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bubbles"></i><span class="sidebar-mini-hide">Chat</span></a>
                <ul >
                    <?php
                        $elalumno = $_SESSION['grupo_alumno'];

                        $guias = $chat->get_guias($elalumno);

                        foreach($guias as $guia){
                            echo "<li><a href='chat/all/chats.php?id=$guia[id]'>$guia[name]</a></li>";
                        }
                       
                    ?>
                </ul>
            </li>
            <li><a class="<?php if($menu == '0'){ echo 'active';}; ?>" href="../logout.php"><i class="si si-logout"></i>Salir</a></li>
        </ul>
    </div>

</div>
</nav>