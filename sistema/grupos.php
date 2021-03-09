<?php include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$menu = 4;


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
                        <a href="add_grupo.php" class="btn btn-rounded btn-hero btn-sm btn-alt-primary float-right mb-10"> <i class="fa fa-plus"></i> Agregar Grupo</a>
                        <i class="si si-grid"></i>&nbsp;
                        GRUPOS</h2>
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
                   <div class="block">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Listado de Grupos</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Grupo</th>
                                        <th>Grado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
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
                  

                                            ?>
                                            <tr>
                                                <td class="font-w600"><?php echo $name ?></td>
                                                <td class="d-none d-sm-table-cell"><?php echo $ngroup ?></td>
                                                <td class="d-none d-sm-table-cell"><?php echo $dgrade?></td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="edit_grupo?id=<?php echo $id ?>" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Editar Grupo">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="del_grupo?id=edit_grupo?id=<?php echo $id ?>" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Eliminar Grupo">
                                                            <i class="fa fa-times"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php                 
                                                    }
                                               }
                                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->


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