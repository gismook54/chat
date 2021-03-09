<?php include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$idAct = $_GET['id'];
$isAlumno = $_GET['al'];
$idact = $_GET['idact'];


$tipoUsuario = $_SESSION['typo_user'];
$guiaGrupo = $_SESSION['grupo_guia'];

$menu = 1;

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
                            break;
                }
            
            
               
                
                    $sql2 = "SELECT `name`,`apaterno`,`amaterno`, `ngrupo` FROM `alumnos` WHERE `id`='$isAlumno'";
                    $result2 = query($sql2);
                    $row2 = fetch_array($result2);
                    $nameAlumno = $row2['name'].' '.$row2['apaterno'].' '.$row2['amaterno'];
            
                    
                  
            ?>

            
            <main id="main-container">
                <div class="content">

                    <h2 class="content-heading pb-20"> <a href="reply_guias.php" class="btn btn-rounded btn-hero btn-sm btn-alt-warning float-right"> <i class="fa fa-mail-reply-all"></i> Volver</a>
                        <i class="si si-grid"></i>&nbsp; RESPUESTA</h2>
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
    
                                $sql = "SELECT * FROM `reply_alumnos` WHERE `id`='$idAct'";
                                $result = query($sql);
                                while($row = fetch_array($result)){
                                        $id = $row['id'];
                                        $answer = $row['answer'];
                                        $idalumno = $row['idalumno'];
                                        $idtipoact = $row['idtipoact'];
                                        $created = date('d-m-Y', strtotime($row['created']));
                                        $doc_actividad = $row['doc_answer'];
                                    
                                        if($idtipoact == 1){
                                                
                                                $sql4 = "SELECT `name`, `created` FROM `actividades_alumno` WHERE `id`='$idact'";
                                                $result4 = query($sql4);
                                                $row4 = fetch_array($result4);
                                                $nameAct = $row4['name'];
                                                $createdA = date('d-m-Y', strtotime($row['created']));
                                                
                                            } else {
                                                $sql4 = "SELECT `name`, `created` FROM `actividades_grupo` WHERE `id`='$idact'";
                                                $result4 = query($sql4);
                                                $row4 = fetch_array($result4);
                                                $nameAct = $row4['name'];
                                                $createdA = date('d-m-Y', strtotime($row['created']));
                                                
                                            }
                                       
                                        $ico = 'fa fa-eye';
                                        $color = 'bg-gd-dusk';
                                        $media = 'docs/res/alumno-'.$idalumno.'/'.$doc_actividad;
                                              
                                
                             ?>   
                                <li>
                                    <div class="list-timeline-time"><?php echo $created ?></div>
                                    <i class="list-timeline-icon <?php echo $ico ?> <?php echo $color ?>"></i>
                                    <div class="list-timeline-content">
                                        <p class="font-w600 mb-10">FECHA <?php echo $createdA ?>   | <?php echo $nameAct ?></p>
                                        <p class="mb-20"><?php echo $answer ?></p>
                                        
                                        <a href="<?php echo $media ?>" class="btn btn-alt-secondary html5lightbox" data-group="mygroup" title="<?php echo $nameAct ?>">
                                            <i class="fa <?php echo $ico ?>"></i> Ver</a>
                                       
                                    </div>
                                </li>
                              

                            </ul>
                        </div>
                        <?php 
                        
                            if($rr==1){
                                
                            
                        
                        ?>
                        <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                            <div class="block-options">
                                <button type="button" class="btn btn-alt-secondary" data-toggle="modal" data-target="#modal-reply" data-id="<?php echo $id?>" data-idal="<?php echo $alumno?>" data-idg="<?php echo $ngroup ?>" data-idta="1"><i class="si si-cloud-upload"></i>&nbsp;Responder Actividad</button>
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