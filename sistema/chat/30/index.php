<?php include("includes/loader.php"); ?>
<?php include("includes/dashboard.php"); ?>
<?php include("includes/logoutHandler.php"); 

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
    <link rel="stylesheet" id="css-main" href="../../../assets/css/codebase.min.css">
    <link rel="stylesheet" href="../../../assets/js/plugins/datatables/dataTables.bootstrap4.css">
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
                        <li><a class="<?php if($menu == '0'){ echo 'active';}; ?>" href="../../../sistema"><i class="si si-home"></i>Escritorio</a></li>
                        <li><a class="<?php if($menu == '1'){ echo 'active';}; ?>" href="../../reply_guias.php"><i class="si si-directions"></i>Respuestas</a></li>
                        <li><a class="<?php if($menu == '2'){ echo 'active';}; ?>" href="../../alumnos.php"><i class="si si-emoticon-smile"></i>Alumnos</a></li>
                        <li><a class="<?php if($menu == '5'){ echo 'active';}; ?>" href="index.php"><i class="si si-bubbles"></i>Chat</a></li>
                    </ul>
                </div>
            </div>
            </nav>

            <main id="main-container">
                <div class="content">
                    <h2 class="content-heading"><i class="si si-users"></i>&nbsp;SALA DE  CHAT</h2>
                       
                    <div class="row">
                    <?php foreach($chat->get_users($chat->clientID) as $user) { ?>
                        <?php
							$user_id = $user[$chat->user_idField];
							$user_name = $user[$chat->users_usernameField];
							$status = $user['status'];
							
							$new_message = $chat->get_unread_messages($user_id, $chat->clientID);
							if($new_message == 0)
							{
								$message_appender = '';
							} else {
								$message_appender = ' <span class="badge badge-info">'.$new_message.'</span>';	
							}
							
							$session = $user['session'];
							if($session == 'online')
							{
								$session_appender = '<span class="badge badge-success">'.$session.'</label>';
							} else {
								$session_appender = '<span class="badge badge-danger">'.$session.'</label>';
							}	
						?>
                        <div class="col-md-6 col-xl-3">
                            <a class="block block-link-shadow" href="chat.php?id=<?php echo $user_id;?>">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-right">
                                        <?php echo $message_appender; ?>
                                        
                                    </div>
                                    <div class="float-left mt-10">
                                        <div class="font-w600 mb-5"><?php echo ucfirst($user_name); ?> </div>
                                        <div class="font-size-sm text-muted"><?php echo $status; ?> <?php echo $session_appender; ?></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php } ?>

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





    </body>
</html>