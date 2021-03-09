<?php include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$menu = 0;

$idEdit = $_GET['id'];
$idgrupo = $_GET['grupo'];
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
            


$sqle = "SELECT * FROM `actividades_grupo` WHERE `id`='$idEdit'";
$resulte = query($sqle);
$rowe = fetch_array($resulte);

$idCap = $rowe['id'];
$nameact = $rowe['name'];
$tipo_actividad = $rowe['tipo_actividad'];
$actividad = $rowe['actividad'];
$active = $rowe['active'];


?>
<main id="main-container">
                <div class="content">
                    <h2 class="content-heading pb-20"> <a href="./" class="btn btn-rounded btn-hero btn-sm btn-alt-warning float-right"> <i class="fa fa-mail-reply-all"></i> Volver</a>
                        <i class="si si-grid"></i>&nbsp; Eliminar Actividad</h2>
                    
                   <div class="block">
                                
                        <div class="block-content">
                            <p class="p-10 text-danger"><i class="fa fa-warning"></i> &nbsp;¡PRECAUCIÓN ESTA A PUNTO DE ELIMNAR ESTA ACTIVIDAD!</p>
                            <form id="add-actividad" name="add-actividad">
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre Actividad</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $nameact ?>" disabled>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Descripción </label>
                                    <div class="col-lg-9">
                                         <textarea class="form-control" rows="6"  name="actividad" disabled><?php echo $actividad ?></textarea>
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    
                                    <div class="col-lg-12">
                                       <hr>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-block btn-danger">Eliminar</button>
                                    </div>
                                </div>
                                <input type="hidden" name="guia" value="<?php echo $_SESSION['id_user']; ?>">
                                <input type="hidden" name="id" value="<?php echo $idEdit; ?>">
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
        <script type="text/javascript">
            jQuery(function(){ 
                Codebase.helpers(['select2', 'ckeditor']); 
            });
            
            $(document).ready(function(){

                $( "#add-actividad" ).submit(function( event ) {
                    var parametros = $(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: "ajax/del_actividad_grupo.php",
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