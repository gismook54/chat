<?php include("includes/loader.php"); ?>
<?php include("includes/logoutHandler.php"); ?>
<?php include("../inc/db.php");
include("../inc/functions.php");

if(!logged_in()){

    redirect("../");
}

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
    <link rel="shortcut icon" href="../assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="../assets/media/favicons/favicon-192x192.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/media/favicons/apple-touch-icon-180x180.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="../assets/css/codebase.min.css">
    <link href="css/jChat.css" rel="stylesheet" media="screen" type="text/css" />
    <link href="css/user_css.css" rel="stylesheet" media="screen" type="text/css" />
</head>


    <body>

        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-narrow">
           
            <?php 
            
                switch ($tipoUsuario){
                        case 1:
                            include("nav_admin.php");
                            include("top.php");
                     
                            break;
                        case 2:
                            include("nav_guias.php");
                            include("top.php");
   
                            break;
                        case 3:
                            include("nav_padres.php");
                            include("top.php");
    
                            break;
                }
            
            ?>
            

          <main id="main-container">
            <div class="content">
                <h2 class="content-heading">
                        <a href="uchat.php" class="btn btn-rounded btn-sm btn-alt-warning float-right mb-10"> <i class="fa fa-plus"></i> Volver</a>
                        <i class="si si-users"></i>&nbsp;
                        SALA DE CHAT</h2>
            
                <div class="box">
    
    	<div class="header">
        	<h4><?php echo $chat->server; ?></h4>
        </div>
        
        <div class="content">
        	
            <?php
				$current_session_time = $chat->get_session_time($chat->serverID);
				if($current_session_time == true)
				{
					$session_time = '<span class="session_time">Last seen '.$current_session_time.'</span>';
				} else {
					$session_time = '<span class="session_time">En línea</span>';	
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
                    <a href="#emoticons" data-option="emotions" class="attachEmotions" data-toggle="modal"></a>
                    <input type="submit" name="send-message" id="sendMessage" class="btn btn-primary" value="Enviar" />
                </div>
            </div>
            
            
                     
        </div>
        
    </div>
              
            </div>
              
              
              
         </main>
            

            <?php include('../copy.php'); ?>

        </div>

        <script src="../assets/js/codebase.core.min.js"></script>
        <script src="../assets/js/codebase.app.min.js"></script>
        <script src="../assets/js/plugins/slick/slick.min.js"></script>
        <script src="js/jChat.js" type="text/javascript"></script>
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        
        <script>
   		$().Chat();
        </script>
        

    </body>
</html>