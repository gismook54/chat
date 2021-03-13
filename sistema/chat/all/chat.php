<?php include("includes/loader.php"); ?>

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
    <link href="css/jChat.css" rel="stylesheet" media="screen" type="text/css" />

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/css/emoji.css" rel="stylesheet">


    <link href="css/user_css.css" rel="stylesheet" media="screen" type="text/css" />
    <link rel="stylesheet" id="css-main" href="../../../assets/css/codebase.min.css">

    <style>
        #new-chat.box {
            width: 65%;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 200px;
        }

        #new-chat .input-message-text {
           border-color: #343a40;
        }

        #new-chat .content {
            width: 100% !important;
            padding: 15px;
        }

        #new-chat .btn-send-message{
            margin-left: -10px;
            margin-top: 3px;
        }

        #new-chat .emoji-picker-icon{
            right: 24px;
            top: 6px;
        }

        #new-chat .fa{
           font-size:  34px;
        }

        #new-chat .input-file{
            margin-top: 11px;
        }


    </style>


</head>

<body>
    <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-narrow">
        <header id="page-header">
            <div class="content-header">

                <div class="content-header-section">
                    <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-navicon"></i>
                    </button>

                    COMUNIDAD FORESTER MONTESSORI


                </div>

                <div class="content-header-section">

                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-rounded btn-dual-secondary" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user d-sm-none"></i>
                            <span class="d-none d-sm-inline-block"><?php echo $_SESSION['user_name']; ?></span>
                            <i class="fa fa-angle-down ml-5"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right min-width-200"
                            aria-labelledby="page-header-user-dropdown">
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
                        <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r"
                            data-toggle="layout" data-action="sidebar_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                        <div class="content-header-item">
                            <a class="font-w700" href="./">
                                <img src="https://www.comunidadforester.com/assets/media/favicons/logotipo_forester.png"
                                    width="60" alt="" /> </a>
                        </div>
                    </div>
                </div>

                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li><a class="<?php if($menu == '0'){ echo 'active';}; ?>" href="../../"><i
                                    class="si si-home"></i>Escritorio</a></li>
                        <li><a class="<?php if($menu == '1'){ echo 'active';}; ?>" href="../../reply_guias.php"><i
                                    class="si si-directions"></i>Respuestas</a></li>
                        <li><a class="<?php if($menu == '2'){ echo 'active';}; ?>" href="../../alumnos.php"><i
                                    class="si si-emoticon-smile"></i>Alumnos</a></li>
                        <li><a class="<?php if($menu == '5'){ echo 'active';}; ?>" href="index.php"><i
                                    class="si si-bubbles"></i>Chat</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
            $current_session_time = $chat->get_session_time($chat->serverID);
            if($current_session_time == true)
            {
                $session_time = '<span class="session_time float-right text-lowercase mr-2"> activo '.$current_session_time.'</span>';
            } else {
                $session_time = '<span class="session_time float-right text-lowercase mr-2">En linea</span>';	
            }
        ?>


        <main id="main-container">
            <div class="content">
                <h2 class="content-heading"><i class="si si-users"></i>&nbsp;SALA DE CHAT</h2>


                <div id="new-chat" class="box">

                    <div class="header">
                        <h4><?php echo $chat->server; ?>  <?php echo $session_time; ?></h4>
                        
                        <!-- Enter message field -->
                       
                    </div>

                    <div class="content">

                        <!-- jChat -->
                        <ul class="messages-layout">
                            <li class="messages"></li>
                        </ul>

                        <!--<div class="message-entry" >
                                <div class="send-group">
                                    <input type="text" id="text-input-field2" class="input-sm" name="message-entry" data-emojiable="true" placeholder="hola"> 
                                </div>
                            </div>-->
                        <div class="row">
                            <div class="col-10">
                                <textarea name="message-entry" id="text-input-field" cols="30" rows="2" class="input-message-text" data-emojiable="true"></textarea>
                            </div>
                            <div class="col-2">
                                <input type="submit" name="send-message" id="sendMessage" class="btn btn-lg btn-primary btn-send-message"
                                    value="Enviar" />
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-12"><input id="uploadFile" class="input-file" type="file" accept="*" name="image" /></div>
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


    <!-- ** emoji scripts ** -->
    <script src="lib/js/config.js"></script>
    <script src="lib/js/util.js"></script>
    <script src="lib/js/jquery.emojiarea.js"></script>
    <script src="lib/js/emoji-picker.js"></script>

    <script>
        window.emojiPicker = new EmojiPicker({
            emojiable_selector: '[data-emojiable=true]',
            assetsPath: 'lib/img',
            popupButtonClasses: 'fa fa-smile-o'
        });
        window.emojiPicker.discover();
    </script>


</body>

</html>