<?php include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$menu = 0;





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
                    <div class="row invisible" data-toggle="appear">
                        <!-- Row #1 -->
                        <div class="col-6 col-xl-4">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-graduation fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="1500">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Total Alumnos</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-4">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-wallet fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600">$<span data-toggle="countTo" data-speed="1000" data-to="780">0</span></div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Total Papá/Mamá</div>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-xl-4">
                            <a class="block block-link-shadow text-right" href="javascript:void(0)">
                                <div class="block-content block-content-full clearfix">
                                    <div class="float-left mt-10 d-none d-sm-block">
                                        <i class="si si-envelope-open fa-3x text-body-bg-dark"></i>
                                    </div>
                                    <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="15">0</div>
                                    <div class="font-size-sm font-w600 text-uppercase text-muted">Total Guías</div>
                                </div>
                            </a>
                        </div>
                        
                        <!-- END Row #1 -->
                    </div>
                    <h2 class="content-heading">
                        
                        <a href="add_actividad_alumno.php" class="btn btn-rounded btn-hero btn-sm btn-alt-primary float-right mb-10 mr-10"> <i class="fa fa-plus"></i> Agregar Actividad Alumno</a>
                        <i class="si si-book-open"></i>&nbsp;
                        ACTIVIDADES POR ALUMNO</h2>
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
                            <h3 class="block-title">Actividades por Alumno</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Alumno</th>
                                        <th>Guía</th>
                                        <th>Actividad</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php 

                                                $sql = "SELECT * FROM `actividades_alumno` WHERE `active`='1'";
                                                $result = query($sql);

                                               if(row_count($result) > 0) {
                                                    while($row = fetch_array($result)){
                                                        $id = $row['id'];
                                                        $alumno = $row['alumno'];
                                                        $nameact = $row['name'];
                                                        $guia = $row['guia'];
                                                        $created = date('d-m-Y', strtotime($row['created']));
                                                            

                                                        
                                                        $sql2 = "SELECT `name` FROM `guias` WHERE `id`='$guia'";
                                                        $result2 = query($sql2);
                                                        $row2 = fetch_array($result2);
                                                        $nameG = $row2['name'];


                                            ?>
                                            <tr>
                                                <td class="font-w600"><?php echo $alumno ?></td>
                                                <td class="d-none d-sm-table-cell"><?php echo $clave ?></td>
                                                <td class="d-none d-sm-table-cell"><?php echo $nameG?></td>
                                                <td class="d-none d-sm-table-cell"><?php echo $nameact ?></td>
                                                <td class="d-none d-sm-table-cell"><?php echo $created ?></td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="edit_alumno?id=<?php echo $id ?>" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Editar Grupo">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="del_alumno?id=edit_grupo?id=<?php echo $id ?>" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Eliminar Grupo">
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
                <div class="content">
                    <h2 class="content-heading">
                        <a href="add_actividad_grupo.php" class="btn btn-rounded btn-hero btn-sm btn-alt-primary float-right mb-10"> <i class="fa fa-plus"></i> Agregar Actividad Grupo</a>
                        <i class="si si-book-open"></i>&nbsp;
                        ACTIVIDADES POR GRUPO</h2>
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
                            <h3 class="block-title">Actividades por Grupo</h3>
                        </div>
                        <div class="block-content block-content-full">
                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                                <thead>
                                    <tr>
                                        <th>Grupo</th>
                                        <th>Guía</th>
                                        <th>Actividad</th>
                                        <th>Fecha</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php 

                                                $sql = "SELECT * FROM `actividades_grupo` WHERE `active`='1'";
                                                $result = query($sql);

                                               if(row_count($result) > 0) {
                                                    while($row = fetch_array($result)){
                                                        $id = $row['id'];
                                                        $ngrupo = $row['grupo'];
                                                        $nameact = $row['name'];
                                                        $guia = $row['guia'];
                                                        $created = date('d-m-Y', strtotime($row['created']));
                                                            
                                                        
                                                        $sql2 = "SELECT `name` FROM `guias` WHERE `id`='$guia'";
                                                        $result2 = query($sql2);
                                                        $row2 = fetch_array($result2);
                                                        $nameGui = $row2['name'];
                                                        
                                                        
                                                        $sql4 = "SELECT * FROM `grupos` WHERE `id`='$ngrupo'";
                                                        $result4 = query($sql4);
                                                        $row4 = fetch_array($result4);
                                                        $nameG = $row4['name'];
                                                        $ngroup = $row4['ngroup'];
                                                        $ngrade = $row4['ngrade'];
                         
                  
                                                        
                                                        $sql3 = "SELECT `name` FROM `grades` WHERE `id`='$ngrade'";
                                                        $result3 = query($sql3);
                                                        $row3 = fetch_array($result3);

                                                        $dgrade = $row3['name'];
                                                        
                                                        $elGrupo = $nameG.' '.$ngroup.' '.$dgrade;


                                            ?>
                                            <tr>
                                                <td class="font-w600"><?php echo $elGrupo ?></td>
                                                <td class="d-none d-sm-table-cell"><?php echo $nameGui ?></td>
                                                <td class="d-none d-sm-table-cell"><?php echo $nameG?></td>
                                                <td class="d-none d-sm-table-cell"><?php echo $nameact ?></td>
                                                <td class="d-none d-sm-table-cell"><?php echo $created ?></td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="edit_alumno?id=<?php echo $id ?>" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Editar Grupo">
                                                            <i class="fa fa-pencil"></i>
                                                        </a>
                                                        <a href="del_alumno?id=edit_grupo?id=<?php echo $id ?>" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Eliminar Grupo">
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