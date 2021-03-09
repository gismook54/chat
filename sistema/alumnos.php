<?php include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$menu = 2;

$tipoUsuario = $_SESSION['typo_user'];
$guiaGrupo = $_SESSION['grupo_guia'];
$userId = $_SESSION['id_user'];

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
    <link rel="stylesheet" id="css-main" href="../assets/css/codebase.min.css">
</head>

    <body>

        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-narrow">
           
            <?php 
            
                switch ($tipoUsuario){
                        case 1:
                            include("nav_admin.php");
                            include("top.php");
                            include("alumnos_index.php");
                            break;
                        case 2:
                            include("nav_guias.php");
                            include("top.php");
                            include("alumnos_guias.php");
                            break;
                        case 3:
                            include("nav_padres.php");
                            include("top.php");
                            break;
                }
            
            ?>


            <!-- Footer -->
            <?php include('../copy.php'); ?>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->

        <script src="../assets/js/codebase.core.min.js"></script>
        <script src="../assets/js/codebase.app.min.js"></script>
        <script src="../assets/js/plugins/slick/slick.min.js"></script>
        <script src="../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <script>

        $(window).on("load", function () {

             $('.js-dataTable-full').DataTable({
                "language": {
                "lengthMenu": "Mostrar _MENU_ por página",
                "zeroRecords": "No existen registros",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros",
                "search":         "Buscar:",
                "paginate": {
                            "first":      "Inicio",
                            "last":       "Fin",
                            "next":       "Siguiente",
                            "previous":   "Anterior"
                        },
                },
                "order": [[ 0, "desc" ]]
             });
            
            
            
            
            
        });
        </script>



    </body>
</html>