<?php include("includes/loader.php"); ?>

<?php include("includes/logoutHandler.php"); 
include("../../../inc/init.php");

$menu = 5;
$tipoUsuario = $_SESSION['typo_user'];
$guiaGrupo = $_SESSION['grupo_guia'];


?>
<!DOCTYPE html>
<html class="loading" lang="es" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Comunidad Forester Montessori</title>
    <link rel="shortcut icon" href="../../../assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../../../assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../assets/media/favicons/apple-touch-icon-180x180.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link href="css/jChat.css" rel="stylesheet" media="screen" type="text/css" />
    
    <link href="css/user_css.css" rel="stylesheet" media="screen" type="text/css" />
    <link rel="stylesheet" id="css-main" href="../../../assets/css/codebase.min.css">
</head>



    <body>
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-narrow">
              <header id="page-header">
    <div class="content-header">

        <div class="content-header-section">
            <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-navicon"></i>
            </button>
             
                COMUNIDAD FORESTER MONTESSORI
            
            
        </div>

        <div class="content-header-section">

            <div class="btn-group" role="group">
                <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user d-sm-none"></i>
                    <span class="d-none d-sm-inline-block"><?php echo $_SESSION['user_name']; ?></span>
                    <i class="fa fa-angle-down ml-5"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right min-width-200" aria-labelledby="page-header-user-dropdown">
                    <h5 class="h6 text-center py-10 mb-5 border-b text-uppercase">Usuario</h5>
                    <a class="dropdown-item" href="#!">
                        <i class="si si-user mr-5"></i> Mi Perfil
                    </a>

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../../../logout.php">
                        <i class="si si-logout mr-5"></i> Salir
                    </a>
                </div>
            </div>
        </div>

    </div>
    <!-- END Header Content -->

    <!-- Header Loader -->
    <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
    <div id="page-header-loader" class="overlay-header bg-primary">
        <div class="content-header content-header-fullrow text-center">
            <div class="content-header-item">
                <i class="fa fa-sun-o fa-spin text-white"></i>
            </div>
        </div>
    </div>
    <!-- END Header Loader -->
</header>
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
                       <li><a class="<?php if($menu == '0'){ echo 'active';}; ?>" href="../../index.php"><i class="si si-home"></i>Escritorio</a></li>
                        <li class="open">
                            <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-bubbles"></i><span class="sidebar-mini-hide">Chat</span></a>
                            <ul >
                                <?php
                                    $elalumno = $_SESSION['grupo_alumno'];

                                    switch ($elalumno){
                                            case 1:
                                                echo '<li><a href="chats.php?id=1">Teresita Nava Bola&nacute;os</a></li>';
                                                break;
                                            case 2:
                                                echo '<li><a href="chats.php?id=2">Guadalupe Fuentes Guti&eacute;rrez</a></li>';
                                                break;
                                            case 3:
                                                echo '<li><a href="chats.php?id=19">MIRIAM ALETIA GARCIA ESTARDA</a></li>';
                                                echo '<li><a href="chats.php?id=20">REINA AURORA CUEVAS PICHARDO</a></li>';
                                                break;
                                            case 4:
                                                echo '<li><a href="chats.php?id=19">MIRIAM ALETIA GARCIA ESTARDA</a></li>';
                                                echo '<li><a href="chats.php?id=20">REINA AURORA CUEVAS PICHARDO</a></li>';
                                                break;
                                            case 5:
                                                echo '<li><a href="chats.php?id=19">MIRIAM ALETIA GARCIA ESTARDA</a></li>';
                                                echo '<li><a href="chats.php?id=20">REINA AURORA CUEVAS PICHARDO</a></li>';
                                                break;
                                            case 6:
                                                echo '<li><a href="chats.php?id=21">MIRNA GABRIELA ALVAREZ SANCHEZ</a></li>';
                                                echo '<li><a href="chats.php?id=22">BELEM FUENTES GUTIERREZ</a></li>';
                                                break;
                                            case 7:
                                                echo '<li><a href="chats.php?id=21">MIRNA GABRIELA ALVAREZ SANCHEZ</a></li>';
                                                echo '<li><a href="chats.php?id=22">BELEM FUENTES GUTIERREZ</a></li>';
                                                break;
                                            case 8:
                                                echo '<li><a href="chats.php?id=21">MIRNA GABRIELA ALVAREZ SANCHEZ</a></li>';
                                                echo '<li><a href="chats.php?id=22">BELEM FUENTES GUTIERREZ</a></li>';
                                                break;
                                            case 9:
                                                echo '<li><a href="chats.php?id=23">GUADALUPE FUENTES GUTIERREZ</a></li>';
                                                echo '<li><a href="chats.php?id=24">LUCIA RENEE MARTINEZ LUGO</a></li>';
                                                break;
                                            case 10:
                                                echo '<li><a href="chats.php?id=23">GUADALUPE FUENTES GUTIERREZ</a></li>';
                                                echo '<li><a href="chats.php?id=24">LUCIA RENEE MARTINEZ LUGO</a></li>';
                                                break;
                                            case 11:
                                                echo '<li><a href="chats.php?id=23">GUADALUPE FUENTES GUTIERREZ</a></li>';
                                                echo '<li><a href="chats.php?id=24">LUCIA RENEE MARTINEZ LUGO</a></li>';
                                                break;
                                            case 12:
                                                echo '<li><a href="chats.php?id=6">Mar&iacute;a Guadalupe Atilano Bautista</a></li>';
                                                break;
                                            case 13:
                                                echo '<li><a href="chats.php?id=6">Mar&iacute;a Guadalupe Atilano Bautista</a></li>';
                                                break;
                                            case 14:
                                                echo '<li><a href="chats.php?id=6">Mar&iacute;a Guadalupe Atilano Bautista</a></li>';
                                                break;
                                            case 15:
                                                echo '<li><a href="chats.php?id=25">LILIA ADRIANA LOPEZ BENITEZ</a></li>';
                                                echo '<li><a href="chats.php?id=26">LAURA ALEJANDRA ESTRADA VAZQUEZ</a></li>';
                                                break;
                                            case 16:
                                                echo '<li><a href="chats.php?id=25">LILIA ADRIANA LOPEZ BENITEZ</a></li>';
                                                echo '<li><a href="chats.php?id=26">LAURA ALEJANDRA ESTRADA VAZQUEZ</a></li>';
                                                break;
                                            case 17:
                                                echo '<li><a href="chats.php?id=25">LILIA ADRIANA LOPEZ BENITEZ</a></li>';
                                                echo '<li><a href="chats.php?id=26">LAURA ALEJANDRA ESTRADA VAZQUEZ</a></li>';
                                                break;
                                            case 21:
                                                echo '<li><a href="../27/chats.php?id=27">ELIZABETH UBALDO CARDOSO</a></li>';
                                                echo '<li><a href="chats.php?id=28">ALMENDRA ISABEL MURILLO GUERRERO</a></li>';
                                                break;
                                             case 22:
                                                echo '<li><a href="../27/chats.php?id=27">ELIZABETH UBALDO CARDOSO</a></li>';
                                                echo '<li><a href="chats.php?id=28">ALMENDRA ISABEL MURILLO GUERRERO</a></li>';
                                                break;
                                             case 23:
                                                echo '<li><a href="../27/chats.php?id=27">ELIZABETH UBALDO CARDOSO</a></li>';
                                                echo '<li><a href="chats.php?id=28">ALMENDRA ISABEL MURILLO GUERRERO</a></li>';
                                                break;
                                             case 24:
                                                echo '<li><a href="chats.php?id=29">ALMA OFELIA QUINTANA FLORES</a></li>';
                                                echo '<li><a href="chats.php?id=30">GABRIELA HERNANDEZ GUTIERREZ</a></li>';
                                                break;
                                            case 25:
                                                echo '<li><a href="chats.php?id=29">ALMA OFELIA QUINTANA FLORES</a></li>';
                                                echo '<li><a href="chats.php?id=30">GABRIELA HERNANDEZ GUTIERREZ</a></li>';
                                                break;
                                            case 26:
                                                echo '<li><a href="chats.php?id=29">ALMA OFELIA QUINTANA FLORES</a></li>';
                                                echo '<li><a href="chats.php?id=30">GABRIELA HERNANDEZ GUTIERREZ</a></li>';
                                                break;
                                            case 27:
                                                echo '<li><a href="chats.php?id=31">MARIA DE LOURDES RAMIREZ RUIZ</a></li>';
                                                echo '<li><a href="chats.php?id=32">AIDA INDA RODRIGUEZ</a></li>';
                                                break;
                                            case 28:
                                                echo '<li><a href="chats.php?id=31">MARIA DE LOURDES RAMIREZ RUIZ</a></li>';
                                                echo '<li><a href="chats.php?id=32">AIDA INDA RODRIGUEZ</a></li>';
                                                break;
                                            case 29:
                                                echo '<li><a href="chats.php?id=31">MARIA DE LOURDES RAMIREZ RUIZ</a></li>';
                                                echo '<li><a href="chats.php?id=32">AIDA INDA RODRIGUEZ</a></li>';
                                                break;
                                          
                                        }




                                ?>
                            </ul>
                        </li>
            <li><a class="<?php if($menu == '0'){ echo 'active';}; ?>" href="../../../logout.php"><i class="si si-logout"></i>Salir</a></li>
                    </ul>
                </div>
            </div>
            </nav>
            

            <main id="main-container">
                <div class="content">
                    <h2 class="content-heading"><i class="si si-users"></i>&nbsp;SALA DE  CHAT</h2>
                       
              
                    <div class="box">
    
                        <div class="header">
                            <h4><?php echo $chat->server; ?></h4>
                        </div>

                        <div class="content">

                            <?php
                                $current_session_time = $chat->get_session_time($chat->serverID);
                                if($current_session_time == true)
                                {
                                    $session_time = '<span class="session_time">última sesión'.$current_session_time.'</span>';
                                } else {
                                    $session_time = '<span class="session_time">En linea</span>';	
                                }
                            ?>

                            <!-- jChat -->
                            <ul class="messages-layout">
                                <li class="messages"></li>
                            </ul>
                            <!-- Enter message field -->
                             <?php echo $session_time; ?><span id="sample"></span>
                            <div class="message-entry">
                                <input type="text" id="text-input-field" class="input-sm" name="message-entry" /> 
                                <div class="send-group">
                                   
                                    <input type="submit" name="send-message" id="sendMessage" class="btn btn-primary" value="Enviar" />
                                </div>
                            </div>

                            

                        </div>

                    </div>

                 

                </div>
            </main>

            <?php include('../../../copy.php'); ?>

        </div>

        <script src="../../../assets/js/codebase.core.min.js"></script>
        <script src="../../../assets/js/codebase.app.min.js"></script>
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/bootstrap.js" type="text/javascript"></script>
        <script src="js/jChat.js" type="text/javascript"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        <script src="js/custom.js" type="text/javascript"></script>
        <script>
   		$().Chat();
        </script>





    </body>
</html>