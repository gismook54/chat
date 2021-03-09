<?php include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$menu = 3;


?>
<!doctype html>
<html lang="es" class="no-focus">
<?php include("head_start.php");?>
<link rel="stylesheet" href="../assets/js/plugins/datatables/dataTables.bootstrap4.css">

    <body>
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-narrow">
           
            <?php include("nav.php");?>
            <?php include("top.php");?>

            <main id="main-container">
                <div class="content">
                    <h2 class="content-heading">
                        <a href="add_guia.php" class="btn btn-rounded btn-hero btn-sm btn-alt-primary float-right mb-10"> <i class="fa fa-plus"></i> Agregar Guía</a>
                        <i class="si si-users"></i>&nbsp;
                        GUÍAS</h2>
                        <?php
                            if(isset($_SESSION['message'])){
                        ?>
                            <div class="alert alert-success d-flex align-items-center justify-content-between mb-15" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="d-flex align-items-center">
                                    <i class="bx bx-check"></i>
                                    <span>
                                       <?php display_message(); ?>
                                    </span>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                    <div class="row">
                     <?php 
                            $sql = "SELECT * FROM `guias`";
                            $result = query($sql);

                           if(row_count($result) > 0) {
                                while($row = fetch_array($result)){
                                    $id = $row['id'];
                                    $name = $row['name'];
                                    $photo = $row['photo'];
                                    $idgrupo = $row['idgrupo'];
                                    $clave = $row['clave'];
                                    $estatus = $row['estatus'];


                        ?>
                        <div class="col-md-6 col-xl-3">
                            <div class="block block-link-shadow">
                                <div class="block-content block-content-full clearfix">
                                    <div class="text-right float-right">
                                        <div class="font-w600 mb-5"><a href="edit_guia.php?id=<?php echo $id ?>"><?php echo $name ?> </a></div>
                                        <div class="font-size-sm text-muted">
                                        <?php
                                            $sql2 = "SELECT * FROM `grupos` WHERE `id`='$idgrupo'";
                                            $result2 = query($sql2);
                                            while($row2 = fetch_array($result2)){
                                                $ngrade = $row2['ngrade'];
                                                
                                                $sql3 = "SELECT `name` FROM `grades` WHERE `id`='$ngrade'";
                                                $result3 = query($sql3);
                                                $row3 = fetch_array($result3);
                                                $nlgrade = $row3['name'];
                                                
                                                
                                                echo $row2['name'].' '.$row2['ngroup'].' '.$nlgrade .'<br>';
                                            }
                                                echo 'CLAVE: '.$clave;
                                        ?>
                                        </div>
                                    </div>
                                    <div class="float-left">
                                       <a href="edit_guia.php?id=<?php echo $id ?>"> <img class="img-avatar" src="docs/<?php echo $photo ?>" alt=""></a>
                                    </div>
                                </div>
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

        </div>

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