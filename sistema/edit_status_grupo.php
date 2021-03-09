<?php include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$menu = 0;

$idEdit = $_GET['id'];
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
    <link rel="stylesheet" href="../assets/js/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="../assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
    <link rel="stylesheet" id="css-main" href="../assets/css/codebase.min.css">
    <link href="fo/dist/font/font-fileuploader.css" rel="stylesheet">
	<link href="fo/dist/jquery.fileuploader.min.css" media="all" rel="stylesheet">
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
            <?php

$sqle = "SELECT * FROM `actividades_grupo` WHERE `id`='$idEdit'";
$resulte = query($sqle);
$rowe = fetch_array($resulte);

$idCap = $rowe['id'];
$nameact = $rowe['name'];
$active = $rowe['active'];
$rr = $rowe['rr'];






?>
<main id="main-container">
                <div class="content">
                    <h2 class="content-heading pb-20"> <a href="./" class="btn btn-rounded btn-hero btn-sm btn-alt-warning float-right"> <i class="fa fa-mail-reply-all"></i> Volver</a>
                        <i class="si si-grid"></i>&nbsp; Desactivar Actividad</h2>
                    
                   <div class="block">
                        
                        <div class="block-content">
                            <form id="add-actividad" name="add-actividad">
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre Actividad</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $nameact ?>" readonly>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Desactivar Actividad</label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="active" id="si" value="0"  <?php if($active==1){echo 'checked';}?>>
                                            <label class="custom-control-label" for="si">Sí</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="active" id="no" value="1" <?php if($active==0){echo 'checked';}?>>
                                            <label class="custom-control-label" for="no">No</label>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="form-group row">
                                    
                                    <div class="col-lg-12">
                                       <hr>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group row">
                                    <div class="col-6">
                                        <button type="submit" id="btn-send" class="btn btn-block btn-alt-primary">Guardar</button>
                                    </div>
                                </div>
                                <input type="hidden" name="guia" value="<?php echo $_SESSION['id_user']; ?>">
                                <input type="hidden" name="id" value="<?php echo $idCap; ?>">
                            </form>
                        </div>
                    </div>
                        
                </div>
            </main>

        <?php include('../copy.php'); ?>
        <script src="../assets/js/codebase.core.min.js"></script>
        <script src="../assets/js/codebase.app.min.js"></script>
        <script src="../assets/js/plugins/select2/js/select2.full.min.js"></script>
        <script src="../assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
        <script src="../assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
        <script src="fo/dist/jquery.fileuploader.min.js" type="text/javascript"></script>
	    <script src="fo/js/custom.js" type="text/javascript"></script>
        <script type="text/javascript">
           
            
            $(document).ready(function(){

                $( "#add-actividad" ).submit(function( event ) {
                    var parametros = $(this).serialize();
                    $("#btn-send").prop('disabled', true);
                    $.ajax({
                        type: "POST",
                        url: "ajax/edit_estatus_grupo.php",
                        data: parametros,
                        success: function(datos){
                             window.location = 'delete_activity_grupo.php';
                        }
                    });
                    event.preventDefault();
                  });
                
                
            });		
        </script>

        </div>


    </body>
</html>