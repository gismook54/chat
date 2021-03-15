<?php  include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$menu = 5;
$tipoUsuario = $_SESSION['typo_user'];
//$guiaGrupo = $_SESSION['grupo_guia'];
$groups = explode(",", isset($_SESSION['grupo_guia']) ? $_SESSION['grupo_guia'] : '' );
$server_ID = isset($_SESSION['jChat_with']) ? $_SESSION['jChat_with'] : 0;
$server_USERNAME = isset($_SESSION['jChat_with']) ? $_SESSION['jChat_with'] : 0;

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
                <h2 class="content-heading"><i class="si si-users"></i>&nbsp;SALA DE CHAT</h2>
              
                <div class="js-chat-container row no-gutters">
                    <!-- Left Column -->
                    <div class="js-chat-options d-none d-md-block col-md-12 col-lg-12 bg-white border-right">

        

                        <!-- Chat Tabs -->
                        <div class="block block-transparent mb-0">
                            <ul class="js-chat-tabs nav nav-tabs nav-tabs-alt nav-justified px-15" data-toggle="tabs" role="tablist">
                                
                                <?php 
                                       
                                        foreach($groups as $group) {

                                            $sql01 = "SELECT * FROM `grupos` WHERE `id`='$group'";
                                            $result01 = query($sql01);
                                            $row01 = fetch_array($result01);
                                            $nameg = $row01['name'];
                                            $ngroup = $row01['ngroup'];
                                            $ngrade = $row01['ngrade'];

                                            $sql02 = "SELECT `name` FROM `grades` WHERE `id` ='$ngrade'";
                                            $result02 = query($sql02);
                                            $row02 = fetch_array($result02);
                                            $dgrade = $row02['name'];
                                            $GrupoGuia =  'GRUPO '.$nameg.' '.$ngroup.' '.$dgrade;

                                    ?>
                                
                                <li class="nav-item">
                                    <a class="nav-link active" href="#chat-tabs-<?php echo $group ?>">
                                        <span class="font-w600 font-size-xs text-muted text-uppercase"><?php echo $GrupoGuia ?></span>
                                    </a>
                                </li>
                                
                                <?php } ?>
                               
                            </ul>
                            <div class="js-chat-tabs-content block-content tab-content p-0">
                                <?php 
                                       
                                        foreach($groups as $group) {

                                            $sql03 = "SELECT ngroup FROM `grupos` WHERE `id`='$group'";
                                            $result03 = query($sql03);
                                            $row03 = fetch_array($result03);
                                            $ngroup3 = $row03['ngroup'];
                                            

                                    ?>
                                <div class="tab-pane active p-15" id="chat-tabs-<?php echo $group ?>" role="tabpanel" data-simplebar>
               
                                    <div class="push">
                                        
                                        <ul class="chat-list">
                                         
                                            <?php 
                                                $sql = "SELECT * FROM `alumnos` WHERE `ngrupo`='$group' AND `estatus`='1'";
                                                $result = query($sql);
                                                while($row = fetch_array($result)){
                                                    $id = $row['id'];
                                                    $name = $row['name'];
                                                    $apaterno = $row['apaterno'];
                                                    $amaterno = $row['amaterno'];
                                                    $alumno = $name.' '.$apaterno.' '.$amaterno;
                                                    
                                                   /* $sqlm = "SELECT id FROM messages WHERE status = '$guiaId' AND user_id = '$id' AND receiver = 'unread'";
                                                    $resultm = query($sqlm);
                                                    
                                                    $new_message = $chat->get_unread_messages($user_id, $chat->clientID);
                                                    if($new_message == 0)
                                                    {
                                                        $message_appender = '';
                                                    } else {
                                                        $message_appender = ' <span class="badge badge-danger">'.$new_message.'</span>';	
                                                    }

                                                    $session = $user['session'];
                                                    if($session == 'online')
                                                    {
                                                        $session_appender = '<span class="badge badge-success badge-pill">'.$session.'</span>';
                                                    } else {
                                                        $session_appender = '<span class="badge badge-danger badge-pill">'.$session.'</span>';
                                                    }	*/
                                            ?>
                                            
                                            <li class="chat-list-item">
                                                <div class="mr-10">
                                                    <a class="img-link img-status" href="javascript:void(0)">
                                                       <a href="chat.php?id=<?php echo $id; ?>"> <img class="img-avatar img-avatar48" src="../assets/media/avatars/avatar4.jpg" alt=""></a>
                                                       
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="chat.php?id=<?php echo $id; ?>" class="font-w600"><?php echo ucfirst($alumno); ?>
                                                        <?php echo $message_appender; ?></a>
                                                    <div class="font-size-xs text-muted">
                                                       <?php echo $status; ?> 
                                                    </div>
                                                </div>
                                                <div class="ml-auto">
                                                    <?php echo $session_appender; ?>
                                                </div>
                                            </li>
                                          
                                          <?php } ?>  
                                        </ul>
                                    </div>
                                </div>
                                 <?php } ?>
                            </div>
                        </div>
                        <!-- END Chat Tabs -->

                        <!-- Separator (visible on mobile) -->
                        <div class="d-md-none py-5 bg-body-dark"></div>
                    </div>

                </div>
                <!-- END Page Content -->
              </div>
            </main>
            

            <?php include('../copy.php'); ?>

        </div>

        <script src="../assets/js/codebase.core.min.js"></script>
        <script src="../assets/js/codebase.app.min.js"></script>
        <script src="../assets/js/plugins/slick/slick.min.js"></script>
   
        <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
        
        
        

    </body>
</html>