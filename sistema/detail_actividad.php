<?php include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$idAct = $_GET['id'];
$isAlumno = $_GET['al'];


$tipoUsuario = $_SESSION['typo_user'];
$guiaGrupo = $_SESSION['grupo_guia'];

$menu = 0;

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
    <link rel="stylesheet" href="../assets/js/plugins/datatables/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="../assets/css/codebase.css">
    
    
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
                            $replyBtn = '1';
                            break;
                }
            
            
               
                
                    $sql2 = "SELECT `name`,`apaterno`,`amaterno`, `ngrupo` FROM `alumnos` WHERE `id`='$isAlumno'";
                    $result2 = query($sql2);
                    $row2 = fetch_array($result2);
                    $nameAlumno = $row2['name'].' '.$row2['apaterno'].' '.$row2['amaterno'];
                    $ngroup = $row2['ngrupo'];
            ?>

            
            <main id="main-container">
                <div class="content">

                    <h2 class="content-heading pb-20"> <a href="./" class="btn btn-rounded btn-hero btn-sm btn-alt-warning float-right"> <i class="fa fa-mail-reply-all"></i> Volver</a>
                        <i class="si si-grid"></i>&nbsp; ACTIVIDADES</h2>
                    <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title"><?php echo $nameAlumno ?></h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <ul class="list list-timeline list-timeline-modern pull-t">
                            <?php
    
                                $sql = "SELECT * FROM `actividades_alumno` WHERE `id`='$idAct' AND `active`='1'";
                                $result = query($sql);
                                while($row = fetch_array($result)){
                                        $id = $row['id'];
                                        $alumno = $row['alumno'];
                                        $name = $row['name'];
                                        $tipo_actividad = $row['tipo_actividad'];
                                        $guia = $row['guia'];
                                        $created = date('d-m-Y', strtotime($row['created']));
                                        $actividad = $row['actividad'];
                                        $doc_actividad = $row['doc_actividad'];
                                        $rr = $row['rr'];
                                
                                        //Tipo de icono y URL
                                        switch ($tipo_actividad){
                                            case 1:
                                               $ico = 'si si-camcorder';
                                               $color = 'bg-gd-dusk';
                                               $media = 'docs/guia-'.$guia.'/'.$doc_actividad;
                                               $path = 'docs/guia-'.$guia.'/';
                                               break;
                                            case 2:
                                               $ico = 'si si-camera';
                                               $color = 'bg-gd-aqua';
                                               $media = 'docs/guia-'.$guia.'/'.$doc_actividad;
                                               $path = 'docs/guia-'.$guia.'/';
                                               break;
                                            case 3:
                                               $ico = 'fa fa-download';
                                               $color = 'bg-gd-sun';
                                               $media = 'docs/guia-'.$guia.'/'.$doc_actividad;
                                               $path = 'docs/guia-'.$guia.'/';
                                               break;
                                            case 4:
                                               $ico = 'fa fa-youtube';
                                               $color = 'bg-gd-sun';
                                               $media = $doc_actividad;
                                               $path = 'docs/guia-'.$guia.'/';
                                               break;
                                                
                                 
                                            
                                        }
                                
                             ?>   
                                <li>
                                    <div class="list-timeline-time"><?php echo $created ?></div>
                                    <i class="list-timeline-icon <?php echo $ico ?> <?php echo $color ?>"></i>
                                    <div class="list-timeline-content">
                                        <p class="font-w600 mb-10"><?php echo $name ?></p>
                                        <p class="mb-20"><?php echo $actividad ?></p>
                                        <?php 
                                            if($tipo_actividad == 1){
                                        ?>
                                        <a href="<?php echo $media ?>" class="btn btn-alt-secondary html5lightbox" title="<?php echo $name ?>"><i class="si si-camcorder"></i>&nbsp;Ver Video</a> &nbsp; <a href="<?php echo $media ?>" class="btn btn-outline-secondary"  download="<?php echo $name ?>"><i class="fa fa-download"></i>&nbsp;Descargar el Video</a>
                                        
                                   
                                        <?php
                                        }    
                                        
                                         if($tipo_actividad == 2){
                                        ?>
                                        <a href="<?php echo $media ?>" class="btn btn-alt-secondary html5lightbox" data-group="mygroup" title="<?php echo $name ?>">
                                       <i class="si si si-camera"></i> VER</a>
                                        <?php
                                        }    
                                        
                                            if($tipo_actividad == 3){
                                        ?>
                                        <a href="<?php echo $media ?>" class="btn btn-alt-secondary"><i class="fa fa-cloud-download"></i>&nbsp;Descargar documento</a>
                                        <?php
                                        }  if($tipo_actividad == 4){
                                        ?>
                                        <a href="<?php echo $media ?>" class="btn btn-alt-secondary html5lightbox"><i class="si si-social-youtube"></i>&nbsp;Ver Video</a>
                                        <?php
                                        }    
                                        ?>  
                  
                                    </div>
                                </li>
                              

                            </ul>
                        </div>
                        <?php 
                        
                            if($rr==1){
                                
                            
                        
                        ?>
                        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            <div class="block-options">
                                <?php
                                if($replyBtn == '1'){
                                ?>
                                <button type="button" class="btn btn-alt-secondary" data-toggle="modal" data-target="#modal-reply" data-id="<?php echo $id?>" data-idal="<?php echo $alumno?>" data-idg="<?php echo $ngroup ?>" data-idta="1"><i class="si si-cloud-upload"></i>&nbsp;Responder Actividad</button>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                                }
                            }
                         ?>
                    </div>

                </div>
            </main>
             
            <?php include('../copy.php'); ?>
            <div class="modal" id="modal-reply" tabindex="-1" role="dialog" aria-labelledby="modal-normal" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Respuesta Actividad</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="si si-close"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <script src="../assets/js/codebase.core.min.js"></script>
        <script src="../assets/js/codebase.app.min.js"></script>
        <script src="../assets/js/plugins/slick/slick.min.js"></script>
        <script src="../assets/js/plugins/html5lightbox/html5lightbox.js"></script>
        <script src="../assets/js/SimpleAjaxUploader.js"></script>
        <script type="application/javascript">
        $(document).ready(function () {
            'use strict';


            $('#modal-reply').on('show.bs.modal', function (event) {

                    var button = $(event.relatedTarget);
                    var id = button.data('id');
                    var idal = button.data('idal');
                    var idg = button.data('idg');
                    var idta = button.data('idta');
                
                    var modal = $(this);
                    modal.find('.block-content').load('add_reply.php?id='+id+'&idAl='+idal+'&idG='+idg+'&idta='+idta);

            });
            

       }); 
     </script>
    </body>
</html>