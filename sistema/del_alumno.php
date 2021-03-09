<?php include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$menu = 0;

$tipoUsuario = $_SESSION['typo_user'];
$guiaGrupo = $_SESSION['grupo_guia'];


if(isset($_GET['id'])){
    
    $id = $_GET['id'];
    
    $sqle = "SELECT * FROM alumnos WHERE id='$id' LiMIT 1";
    $resulte = query($sqle);
    $rowe = fetch_array($resulte);

    $idAlumno = $rowe['id'];

    $name = $rowe['name'];
    $apaterno = $rowe['apaterno'];
    $amaterno = $rowe['amaterno'];

        $alumno  = $name.' '.$apaterno.' '.$amaterno;

    
} else {
    
    redirect('alumnos.php');
    
}


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
            
            ?>
            
            <main id="main-container">
                <div class="content">
                    <h2 class="content-heading pb-20"> <a href="alumnos.php" class="btn btn-rounded btn-hero btn-sm btn-alt-warning float-right"> <i class="fa fa-mail-reply-all"></i> Volver</a>
                        <i class="si si-grid"></i>&nbsp; Eliminar Alumno </h2>
                    
                   <div class="block">
                                
                        <div class="block-content">
                            <form id="del-alumno" name="del-alumno">.
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"> </label>
                                    <div class="col-lg-9">
                                        <h2 class="text-danger">¡Esta a punto de eliminar a este alumno!</h2>
                                     </div>   
                                 </div>   
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label"></label>
                                    <div class="col-lg-9">
                                       <strong> Alumno: <?php echo $alumno ?></strong>
                                    </div>
                                
                                </div>
                           
                                <input type="hidden" name="id" value="<?php echo $id ?>">
                                <div class="form-group row">
                                    <div class="col-lg-9 ml-auto">
                                        <button type="submit" id="btn-send" class="btn btn-danger">Eliminar Alumno</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                        
                </div>
            </main>

        <?php include('../copy.php'); ?>
        <script src="../assets/js/codebase.core.min.js"></script>
        <script src="../assets/js/codebase.app.min.js"></script>
        <script type="text/javascript">
           
            
            $(document).ready(function(){

                $( "#del-alumno" ).submit(function( event ) {
                    var parametros = $(this).serialize();
                    $("#btn-send").prop('disabled', true);
                    $.ajax({
                        type: "POST",
                        url: "ajax/del_alumno.php",
                        data: parametros,
                        success: function(datos){
                             window.location = 'alumnos.php';
                        }
                    });
                    event.preventDefault();
                  });
                
                


            });		
        </script>

        </div>


    </body>
</html>