<?php include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$tipoUsuario = $_SESSION['typo_user'];
$guiaGrupo = $_SESSION['grupo_guia'];

$menu = 1;

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
            <?php

            $groups = explode(",", $_SESSION['grupo_guia']);
            $idGuia = $_SESSION['id_user'];

            $totalAlumnos = 0;
            $totalActGrup = 0;
            foreach($groups as $group) {


                $sqlta = "SELECT COUNT(id) AS totala FROM `alumnos` WHERE `ngrupo`='$group'";
                $resulta = query($sqlta);
                $rowta = fetch_array($resulta);
                $totalAlumnos+= $rowta['totala'];


                $sqlag = "SELECT COUNT(id) AS totag FROM `actividades_grupo` WHERE `grupo`='$group'";
                $resulag = query($sqlag);
                $rowag = fetch_array($resulag);
                $totalActGrup+= $rowag['totag'];


            }

            $sqlaa = "SELECT COUNT(id) AS totaaa FROM `actividades_alumno` WHERE `guia`='$idGuia'";
            $resulaa = query($sqlaa);
            $rowaa = fetch_array($resulaa);
            $totalActAl= $rowaa['totaaa'];

            ?>
<main id="main-container">

    <div class="content">
        <h2 class="content-heading">
            <i class="si si-directions"></i>&nbsp;RESPUESTAS DE ALUMNOS</h2>
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
        
            <?php 
                foreach($groups as $group) {
                    
                    $sql01 = "SELECT * FROM `grupos` WHERE `id`='$group'";
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
                    $GrupoGuia =  'GRUPO '.$nameg.' '.$ngroup.' '.$dgrade;
                
                    
            ?>

           <div class="block">
                <div class="block-header block-header-default">
                    <h3 class="block-title">  <?php echo $GrupoGuia ?></h3>
                </div>
            
                <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Alumno</th>
                            <th>Actividad</th>
                            <th>Fecha Actividad</th>
                            <th>Fecha Respuesta</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 

                                    $sql = "SELECT * FROM `reply_alumnos` WHERE `idgrupo`='$idGrupo'";
                                    $result = query($sql);

                                   if(row_count($result) > 0) {
                                        while($row = fetch_array($result)){
                                            $idrep = $row['id'];
                                            $idalumno = $row['idalumno'];
                                            $idgrupo = $row['idgrupo'];
                                            $idactivity = $row['idactivity'];
                                            $idtipoact = $row['idtipoact'];
                                            $createdR = date('d-m-Y', strtotime($row['created']));
                                        

                                
                                            $sql2 = "SELECT `name`, `apaterno`, `amaterno` FROM `alumnos` WHERE `id`='$idalumno'";
                                            $result2 = query($sql2);
                                            $row2 = fetch_array($result2);
                                            $nameAl = $row2['name'].' '.$row2['apaterno'].' '.$row2['amaterno'];

                                            
                                            if($idtipoact == 1){
                                                
                                                $sql4 = "SELECT `name`, `created` FROM `actividades_alumno` WHERE `id`='$idactivity' ";
                                                
                                                $result4 = query($sql4);
                                                if(row_count($result4) > 0){
                                                    $row4 = fetch_array($result4);
                                                    $nameAct = $row4['name'];
                                                    $createdA = date('d-m-Y', strtotime($row['created']));
                                                }
                                                
                                            } else {
                                                $sql4 = "SELECT `name`, `created` FROM `actividades_grupo` WHERE `id`='$idactivity'";
                                                $result4 = query($sql4);
                                                if(row_count($result4) > 0){
                                                $row4 = fetch_array($result4);
                                                $nameAct = $row4['name'];
                                                $createdA = date('d-m-Y', strtotime($row['created']));
                                                }
                                                
                                            }
                                            


                                ?>
                                <tr>
                                    <td><?php echo $idrep ?></td>
                                    <td class="font-w600"><?php echo $nameAl ?></td>
                                    <td class="d-none d-sm-table-cell"><a href="detail_reply.php?id=<?php echo $idrep ?>&al=<?php echo $idalumno ?>&idact=<?php echo $idactivity ?>"><?php echo $nameAct ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $createdA ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $createdR ?></td>
                                    
                                </tr>
                                <?php                 
                                        }
                                   }
                                ?>
                    </tbody>
                </table>
            </div>

            
           
        </div>
            <?php
                }
            ?>
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