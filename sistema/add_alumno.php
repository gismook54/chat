<?php include("../inc/init.php");
include("ajax/class-clave.php");
if(!logged_in()){

    redirect("../");
}

$menu = 2;


?>
<!DOCTYPE html>
<html class="loading" lang="es" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Sistema Integral de Gestión de Clínicas | SIGC</title>
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
           
            <?php include("nav.php");?>
            <?php include("top.php");?>
            <main id="main-container">
                <div class="content">
                    <h2 class="content-heading pb-20"> <a href="alumnos.php" class="btn btn-rounded btn-hero btn-sm btn-alt-warning float-right"> <i class="fa fa-mail-reply-all"></i> Volver</a>
                        <i class="si si-grid"></i>&nbsp; Agregar Alumno</h2>
                    
                   <div class="block">
                                
                        <div class="block-content">
                            <form id="add-alumno" name="add-alumno">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Apellido Paterno</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="apaterno" name="apaterno">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Apellido Materno</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="amaterno" name="amaterno">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="nombre" name="nombre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre Padre</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="padre" name="padre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre Madre</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="madre" name="madre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Clave</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="clave" name="clave" value="<?php echo strtoupper($claveAcceso) ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Grupo</label>
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
                                           
                                                        echo '<option value="'.$id.'">'.$name.' '.$ngroup.' '.$dgrade.'</option>';
                                                    }
                                               }

                                            ?>
                                        </select>

                                    </div>
                                </div>
                                
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
        <script src="../assets/js/SimpleAjaxUploader.js"></script>
        <script type="text/javascript">
            jQuery(function(){ 
                Codebase.helpers(['select2']); 
            });
            
            $(document).ready(function(){

                $( "#add-alumno" ).submit(function( event ) {
                    var parametros = $(this).serialize();
                    $("#btn-send").prop('disabled', true);
                    $.ajax({
                        type: "POST",
                        url: "ajax/add_alumno.php",
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

                var uploader = new ss.SimpleUpload({
                    button: btn,
                    url: 'ajax/upload01.php',
                    name: 'uploadfile',
                    hoverClass: 'hover',
                    focusClass: 'focus',
                    responseType: 'json',

                    startXHR: function() {
                        progressOuter.style.display = 'block'; 
                        this.setProgressBar( progressBar );
                    },
                    onSubmit: function() {
                        msgBox.innerHTML = 'Cargando...'; 
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