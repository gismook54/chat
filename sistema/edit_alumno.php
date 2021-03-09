<?php include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$menu = 0;

$idEdit = $_GET['id'];
$tipoUsuario = $_SESSION['typo_user'];
$guiaGrupo = $_SESSION['grupo_guia'];

$sqle = "SELECT * FROM alumnos WHERE id='$idEdit'";
$resulte = query($sqle);
$rowe = fetch_array($resulte);

$idAlumno = $rowe['id'];

$name = $rowe['name'];
$apaterno = $rowe['apaterno'];
$amaterno = $rowe['amaterno'];
$ngrupoAl = $rowe['ngrupo'];
$padre = $rowe['padre'];
$madre = $rowe['madre'];
$clave = $rowe['clave'];
$estatus = $rowe['estatus'];


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
                        <i class="si si-grid"></i>&nbsp; Editar Alumno </h2>
                    
                   <div class="block">
                                
                        <div class="block-content">
                            <form id="edit-alumno" name="edit-alumno">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Apellido Paterno</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="apaterno" name="apaterno" value="<?php echo $apaterno ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Apellido Materno</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="amaterno" name="amaterno" value="<?php echo $amaterno ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $name ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre Padre</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="padre" name="padre" value="<?php echo $padre ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre Madre</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="madre" name="madre" value="<?php echo $madre ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Clave</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="clave" name="clave" value="<?php echo $clave ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Grupo <?php echo $ngrupoAl ?></label>
                                    <div class="col-lg-9">
                                            
                                        <select class="form-control" id="grupo" name="grupo">

                                            <?php 
                                                
                                                $sql = "SELECT * FROM `grupos`";
                                                $result = query($sql);

                                               if(row_count($result) > 0) {
                                                    while($row = fetch_array($result)){
                                                        $id = $row['id'];
                                                        $name = $row['name'];
                                                        $ngroup = $row['ngroup'];
                                                        $ngrade = $row['ngrade'];
                                                        
                                                        $sql2 = "SELECT `name` FROM `grades` WHERE `id` ='$ngrade'";
                                                        $result2 = query($sql2);
                                                        $row2 = fetch_array($result2);

                                                        $dgrade = $row2['name'];
                                                        
                                                        if($ngrupoAl == $id ){
                                                            echo '<option value="'.$id.'" selected>'.$name.' '.$ngroup.' '.$dgrade.'</option>';
                                                            
                                                        }else{
                                                           echo '<option value="'.$id.'">'.$name.' '.$ngroup.' '.$dgrade.'</option>'; 
                                                        }
                                           
                                                        
                                                    }
                                               }

                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Estatus </label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="estatus" id="activo" value="1" <?php if($estatus==1){echo 'checked';}?>>
                                            <label class="custom-control-label" for="activo">Activo</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="estatus" id="inactivo" value="0" <?php if($estatus==0){echo 'checked';}?>>
                                            <label class="custom-control-label" for="inactivo">Inactivo</label>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="id" value="<?php echo $idAlumno ?>">
                                <div class="form-group row">
                                    <div class="col-lg-9 ml-auto">
                                        <button type="submit" id="btn-send" class="btn btn-alt-primary">Guardar</button>
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
        <script src="../assets/js/plugins/select2/js/select2.full.min.js"></script>
        <script src="../assets/js/plugins/jquery-tags-input/jquery.tagsinput.min.js"></script>
        <script src="../assets/js/plugins/masked-inputs/jquery.maskedinput.min.js"></script>
        <script src="../assets/js/plugins/ckeditor/ckeditor.js"></script>
        <script src="../assets/js/SimpleAjaxUploader.js"></script>
        <script type="text/javascript">
            jQuery(function(){ 
                Codebase.helpers(['select2', 'ckeditor']); 
            });
            
            $(document).ready(function(){

                $( "#edit-alumno" ).submit(function( event ) {
                    var parametros = $(this).serialize();
                    $("#btn-send").prop('disabled', true);
                    $.ajax({
                        type: "POST",
                        url: "ajax/edit_alumno.php",
                        data: parametros,
                        success: function(datos){
                             window.location = 'alumnos.php';
                        }
                    });
                    event.preventDefault();
                  });
                
                //FOTO EMPLEADO
                var btn = document.getElementById('photo-emp'),
                    progressBar = document.getElementById('progressBar'),
                    progressOuter = document.getElementById('progressOuter'),
                    msgBox = document.getElementById('msgBox');
                    labelPb = document.getElementById('lpb');

                var uploader = new ss.SimpleUpload({
                    button: btn,
                    url: 'ajax/upload02.php',
                    name: 'uploadfile',
                    hoverClass: 'hover',
                    focusClass: 'focus',
                    responseType: 'json',

                    startXHR: function() {
                        progressOuter.style.display = 'block'; 
                        this.setProgressBar( progressBar );
                    },
                    onSubmit: function() {
                         labelPb.innerHTML = 'Cargando...'; 
                        btn.innerHTML = 'Espere...'; 
                      },
                    onComplete: function( filename, response ) {

                        btn.style.display = 'block';
                        btn.innerHTML = '<i class="ion-upload"></i>&nbsp;Cargar de nuevo'; 
                        progressOuter.style.display = 'none';

                        if ( !response ) {
                            msgBox.innerHTML = 'Lo sentimos, el archivo no se pudo subir trate de nuevo';
                            return;
                        }

                        if ( response.success === true ) {

                            msgBox.innerHTML =  response.msg;



                        } else {
                            if ( response.msg )  {
                                msgBox.innerHTML = response.msg;

                            } else {
                                msgBox.innerHTML = 'Ocurrio un error al tratar de subir su archivo, trate de nuevo.';
                            }
                        }
                      },
                    onError: function() {
                        progressOuter.style.display = 'none';
                        msgBox.innerHTML = 'No se pueden subir archivos en este momento';
                      }
                });


            });		
        </script>

        </div>


    </body>
</html>