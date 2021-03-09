<?php 

ini_set('memory_limit', '20G');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("inc/init.php");
if(logged_in()){

    redirect("sistema/");
}
?>
<!doctype html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Comunidad Forester Montessori</title>
        <link rel="shortcut icon" href="assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
        <link rel="stylesheet" id="css-main" href="assets/css/codebase.css">
    </head>
    <body>

        <div id="page-container" class="main-content-boxed">

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-body-dark bg-pattern" style="background-image: url('assets/media/various/bg-pattern.png');">
                    <div class="row mx-0 justify-content-center">
                        <div class="hero-static col-lg-6 col-xl-4">
                            <div class="content content-full overflow-hidden">
                                <div class="py-30 text-center">
                                    <img src="assets/media/favicons/logotipo_forester.png" alt="Forester Montessori"/>
                                    <h1 class="h4 font-w700 mt-30 mb-10">Comunidad Forester Montessori</h1>
                              </div>
                                <div class="row">
                                    <div class="col-lg-12 col-lg-offset-6">
                                        <?php display_message(); ?>
                                        <?php validate_user_login(); ?>
                                    </div>
                                </div>
                                <form class="js-validation-signin" id="login-guias">
                                    <div class="block block-themed block-rounded block-shadow">
                                        <div class="block-header bg-gd-emerald">
                                            <h3 class="block-title">ACCESO ALUMNOS </h3>
                                        </div>
                                        <div class="block-content">
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="login-username">Clave</label>
                                                    <input type="password" class="form-control" id="clave" name="clave" required>
                                                    <small>Ingresa la clave proporcionada por el colegio</small>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row mb-0">
                                                <div class="col-sm-8 d-sm-flex align-items-center push">
                                                    
                                                </div>
                                                <div class="col-sm-4 text-sm-right push">
                                                    <button type="submit" class="btn btn-alt-primary btn-block">
                                                        <i class="si si-login mr-10"></i> Acceder
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <a href="login_guias.php" class="btn btn-block btn-alt-primary">ACCESO GUIAS</a>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <a href="login.php" class="btn btn-block btn-alt-warning">ACCESO ADMINISTRACIÓN</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="block-content bg-body-light">
                                            <?php include('copy.php'); ?>
                                        </div>
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            
        </div>
        <!-- END Page Container -->


        <script src="assets/js/codebase.core.min.js"></script>
        <script src="assets/js/codebase.app.min.js"></script>
        <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>
        <script src="assets/js/pages/op_auth_signin.min.js"></script>
        <script type="text/javascript">

            $(document).ready(function(){

                $( "#login-guias" ).submit(function( event ) {
                    var parametros = $(this).serialize();
                    $.ajax({
                        type: "POST",
                        url: "sistema/ajax/login_padres.php",
                        data: parametros,
                        success: function(datos){
                            if(datos == '1'){
                                window.location = 'sistema/';
                            } else {
                                console.log(datos);
                            }
                             
                        }
                    });
                    event.preventDefault();
                  });
                
               


            });		
        </script>
    </body>
</html>