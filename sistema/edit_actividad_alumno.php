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

$sqle = "SELECT * FROM `actividades_alumno` WHERE `id`='$idEdit'";
$resulte = query($sqle);
$rowe = fetch_array($resulte);

$idCap = $rowe['id'];
$alumnoCap = $rowe['alumno'];
$nameact = $rowe['name'];
$tipo_actividad = $rowe['tipo_actividad'];
$actividad = $rowe['actividad'];
$active = $rowe['active'];
$rr = $rowe['rr'];






?>
<main id="main-container">
                <div class="content">
                    <h2 class="content-heading pb-20"> <a href="./" class="btn btn-rounded btn-hero btn-sm btn-alt-warning float-right"> <i class="fa fa-mail-reply-all"></i> Volver</a>
                        <i class="si si-grid"></i>&nbsp; Edit Actividad</h2>
                    
                   <div class="block">
                         <div id="subevid" class="form-group row">
                                <form action="php/form_upload.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" id="custom_file_name">
                                     <div class="col-lg-12"><input type="file" name="files"></div>
                                </form>
                         </div>
                        <div class="block-content">
                            <form id="add-actividad" name="add-actividad">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Alumno</label>
                                    <div class="col-lg-9">
                                        <select class="js-select2 form-control" id="alumno" name="alumno">
                                            <option></option>
                                            <?php 
                                                
                                                $groups = explode(",", $_SESSION['grupo_guia']);

                                                foreach($groups as $group) {
                                                    echo $group;
                                                    $sql = "SELECT * FROM `alumnos` WHERE `ngrupo`='$group'";
                                                    $result = query($sql);
                                                    while($row = fetch_array($result)){
                                                        
                                                     $id = $row['id'];
                                                     $name = $row['name'];
                                                     $apaterno = $row['apaterno'];
                                                     $amaterno = $row['amaterno'];
                                                    
                                                        if($alumnoCap == $id){
                                                            
                                                            echo '<option value="'.$id.'" selected>'.$name.' '.$apaterno.' '.$amaterno.'</option>';
                                                        } else {
                                                            
                                                            echo '<option value="'.$id.'">'.$name.' '.$apaterno.' '.$amaterno.'</option>';
                                                            
                                                        }

                                                     
                                                        
                                                    }
                                                           
                                                  }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre Actividad</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $nameact ?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tipo Archivo </label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipo_actividad" id="video" value="1" <?php if($tipo_actividad==1){echo 'checked';}?>>
                                            <label class="custom-control-label" for="video">Video</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipo_actividad" id="imagen" value="2" <?php if($tipo_actividad==2){echo 'checked';}?>>
                                            <label class="custom-control-label" for="imagen">Imagen</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipo_actividad" id="archivo" value="3" <?php if($tipo_actividad==3){echo 'checked';}?>>
                                            <label class="custom-control-label" for="archivo">Documento</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Descripción </label>
                                    <div class="col-lg-9">
                                         <textarea class="form-control" rows="6"  name="actividad"><?php echo $actividad ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Publicar inmediatamente</label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="active" id="si" value="1"  <?php if($active==1){echo 'checked';}?>>
                                            <label class="custom-control-label" for="si">Sí</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="active" id="no" value="0" <?php if($active==0){echo 'checked';}?>>
                                            <label class="custom-control-label" for="no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Necesita Respuesta</label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="rr" id="rr1" value="1"  <?php if($rr==1){echo 'checked';}?>>
                                            <label class="custom-control-label" for="rr1">Sí</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="rr" id="rr0" value="0" <?php if($rr==0){echo 'checked';}?>>
                                            <label class="custom-control-label" for="rr0">No</label>
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
            jQuery(function(){ 
                Codebase.helpers(['select2', 'ckeditor']); 
            });
            
            $(document).ready(function(){

                $( "#add-actividad" ).submit(function( event ) {
                    var parametros = $(this).serialize();
                    $("#btn-send").prop('disabled', true);
                    $.ajax({
                        type: "POST",
                        url: "ajax/edit_actividad_alumno.php",
                        data: parametros,
                        success: function(datos){
                             window.location = './';
                        }
                    });
                    event.preventDefault();
                  });
                
                
            });		
        </script>

        </div>


    </body>
</html>