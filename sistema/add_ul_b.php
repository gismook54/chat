<?php include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$menu = 0;
$idGrupo = $_GET['id'];
$tipoUsuario = $_SESSION['typo_user'];
$guiaGrupo = $_SESSION['grupo_guia'];


$sql01 = "SELECT * FROM `grupos` WHERE `id`='$idGrupo'";
$result01 = query($sql01);
$row01 = fetch_array($result01);
$idGrupo = $row01['id'];
$nameg = $row01['name'];
$ngroup = $row01['ngroup'];
$ngrade = $row01['ngrade'];

$sql02 = "SELECT `name` FROM `grades` WHERE `id` ='$ngrade'";
$result02 = query($sql02);
$row02 = fetch_array($result02);
$dgrade = $row02['name'];
$GrupoGuia = $nameg.' '.$ngroup.' '.$dgrade;


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
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <link href="fo/dist/font/font-fileuploader.css" rel="stylesheet">
	<link href="fo/dist/jquery.fileuploader.min.css" media="all" rel="stylesheet">

	
    <style>
			body {
				font-family: 'Roboto', sans-serif;
				font-size: 14px;
                line-height: normal;
				background-color: #fff;

				margin: 0;
			}
            
            form {
                margin: 15px;
            }
            
            .fileuploader {
                max-width: 560px;
            }
            
            input#custom_file_name {
                display: block;
                padding: 8px;
                border-radius: 6px;
                border: 1px solid #ddd;
            }
		</style>
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
                    <h2 class="content-heading pb-20"> <a href="./" class="btn btn-rounded btn-hero btn-sm btn-alt-warning float-right"> <i class="fa fa-mail-reply-all"></i> Volver</a>
                        <i class="si si-grid"></i>&nbsp; Agregar Actividad para el grupo</h2>
                    
                   <div class="block">
                                
                        <div class="block-content">
                            <div id="subevid" class="form-group row">
                                    <form action="php/form_upload.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="custom_file_name">
                                         <div class="col-lg-9"><input type="file" name="files"></div>
                                    </form>
                             </div>
                            <form id="add-actividad" name="add-actividad">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">GRUPO</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" value="<?php echo $GrupoGuia ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre Actividad</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tipo Archivo </label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipo_actividad" id="video" value="1" checked>
                                            <label class="custom-control-label" for="video">Video</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipo_actividad" id="imagen" value="2">
                                            <label class="custom-control-label" for="imagen">Imagen</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipo_actividad" id="archivo" value="3">
                                            <label class="custom-control-label" for="archivo">Documento</label>
                                        </div>
                                         <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipo_actividad" id="ligayt" value="4">
                                            <label class="custom-control-label" for="ligayt">Video de YouTube</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="liga" class="form-group row" style="display: none">
                                    <label class="col-lg-3 col-form-label">Liga del video</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="ligav" name="ligav">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Descripción </label>
                                    <div class="col-lg-9">
                                         <textarea class="form-control" rows="6"  name="actividad"></textarea>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Publicar inmediatamente</label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="active" id="si" value="1" checked>
                                            <label class="custom-control-label" for="si">Sí</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="active" id="no" value="0">
                                            <label class="custom-control-label" for="no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Necesita Respuesta</label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="rr" id="rr1" value="1">
                                            <label class="custom-control-label" for="rr1">Sí</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="rr" id="rr0" value="0" checked>
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
                                <input type="hidden" name="grupo" value="<?php echo $idGrupo ?>">
                            </form>
                        </div>
                    </div>
                        
                </div>
            </main>
        <?php include('../copy.php'); ?>
        <script src="../assets/js/codebase.core.min.js"></script>
        <script src="../assets/js/plugins/select2/js/select2.full.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>
        <script src="fo/dist/jquery.fileuploader.min.js" type="text/javascript"></script>
	    <script src="fo/js/custom.js" type="text/javascript"></script>
        <script type="text/javascript">

            $(document).ready(function(){
                
                 $('#add-actividad input').on('change', function() {
                   //alert($('input[name=tipo_actividad]:checked', '#add-actividad').val()); 

                    var idr = $('input[name=tipo_actividad]:checked', '#add-actividad').val();

                    console.log('ID '+idr);

                    if(idr == 4){
                         $('#subevid').hide(); 
                         $('#liga').show('slow');
                    } else {
                        $('#subevid').show('slow'); 
                         $('#liga').hide();

                    }
                });

                $( "#add-actividad" ).submit(function( event ) {
                    var parametros = $(this).serialize();
                    $("#btn-send").prop('disabled', true);
                    $.ajax({
                        type: "POST",
                        url: "ajax/add_actividad_grupo.php",
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