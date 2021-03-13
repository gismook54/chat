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


    $sqlag = "SELECT COUNT(id) AS totag FROM `actividades_grupo` WHERE `grupo`='$group' AND active = '1'";
    $resulag = query($sqlag);
    $rowag = fetch_array($resulag);
    $totalActGrup+= $rowag['totag'];

    
}

$sqlaa = "SELECT COUNT(id) AS totaaa FROM `actividades_alumno` WHERE `guia`='$idGuia' AND active = '1'";
$resulaa = query($sqlaa);
$rowaa = fetch_array($resulaa);
$totalActAl= $rowaa['totaaa'];

?>
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
                        <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="<?php echo $totalAlumnos ?>">0</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Total Alumnos</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-4">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-grid fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600"><span data-toggle="countTo" data-speed="1000" data-to="<?php echo $totalActAl ?>">0</span></div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Total actividades por alumno</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-4">
                <a class="block block-link-shadow text-right" href="javascript:void(0)">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-layers fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="<?php echo $totalActGrup ?>">0</div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Total actividades por grupo</div>
                    </div>
                </a>
            </div>

            <!-- END Row #1 -->
        </div>
        <h2 class="content-heading">

            <a href="add_actividad_alumno.php" class="btn btn-rounded btn-sm btn-alt-primary float-right mb-10 mr-10"> <i class="fa fa-plus"></i> Agregar Actividad Alumno</a>
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
                            <th>Fuente</th>
                            <th>Alumno</th>
                            <th>Grupo</th>
                            <th>Actividad</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 

                                    $sql = "SELECT * FROM `actividades_alumno` WHERE `guia`='$idGuia' AND active = '1'";
                                    $result = query($sql);

                                   if(row_count($result) > 0) {
                                        while($row = fetch_array($result)){
                                            $id = $row['id'];
                                            $alumno = $row['alumno'];
                                            $nameact = $row['name'];
                                            $ta = $row['tipo_actividad'];
                                            $guia = $row['guia'];
                                            $dactivitity = date('Ymd', strtotime($row['created']));
                                            $created = date('d-M-Y', strtotime($row['created']));
                                            
                                            $sqlA = "SELECT * FROM `alumnos` WHERE `id`='$alumno'";
                                            $resultA = query($sqlA);
                                            $rowA = fetch_array($resultA);
                                            $nameA = $rowA['name'].' '.$rowA['apaterno'].' '.$rowA['amaterno'];
                                            $idGrupoAl = $rowA['ngrupo'];
                                                        
                                            $sqlgn = "SELECT * FROM `grupos` WHERE `id`='$idGrupoAl'";
                                            $resultgn = query($sqlgn);
                                            $rowgn = fetch_array($resultgn);
                                            $nameg = $rowgn['name'];
                                            $ngroup = $rowgn['ngroup'];
                                            $ngrade = $rowgn['ngrade'];

                                            $sql3 = "SELECT `name` FROM `grades` WHERE `id` ='$ngrade'";
                                            $result3 = query($sql3);
                                            $row3 = fetch_array($result3);
                                            $dgrade = $row3['name'];
                                            $GrupoAlumno =  $nameg.' '.$ngroup.' '.$dgrade;
                                            
                                            switch ($ta){
                                                case 1:
                                                   $lta = 'Video';
                                                   break;
                                                case 2:
                                                   $lta = 'Imagen';

                                                   break;
                                                case 3:
                                                   $lta = 'Documento';

                                                   break;
                                                case 4:
                                                   $lta = 'YouTube';

                                                   break;

                                            }


                                ?>
                                <tr>
                                    <td><?php echo $lta ?></td>
                                    <td class="font-w600"><?php echo $nameA ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $GrupoAlumno ?></td>
                                    <td class="d-none d-sm-table-cell"><a href="detail_actividad.php?id=<?php echo $id ?>&al=<?php echo $alumno ?>"><?php echo $nameact ?></a></td>
                                    <td><span style="display: none"><?php echo $dactivitity ?> </span><?php echo $created ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="edit_actividad_alumno.php?id=<?php echo $id ?>" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Editar Actividad">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="del_actividad_alumno.php?id=<?php echo $id ?>" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Eliminar Actividad">
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
            <i class="si si-book-open"></i>&nbsp;<a href="add_actividad_grupos.php" class="btn btn-rounded  btn-success float-right"> <i class="fa fa-plus"></i> Agregar Todos los Grupos</a>
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
                    <h3 class="block-title"> <a href="add_actividad_grupo.php?id=<?php echo $idGrupo ?>" class="btn btn-rounded btn-sm btn-alt-primary float-right"> <i class="fa fa-plus"></i> Agregar Actividad Grupo</a> <?php echo $GrupoGuia ?></h3>
                </div>
            
                <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-2">
                    <thead>
                        <tr>
                            <th>Fuente</th>
                            <th>Guía</th>
                            <th>Actividad</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 

                                    $sql = "SELECT * FROM `actividades_grupo` WHERE `grupo`='$idGrupo' AND `active`='1'";
                                    $result = query($sql);

                                   if(row_count($result) > 0) {
                                        while($row = fetch_array($result)){
                                            $id = $row['id'];
                                            $ngrupo = $row['grupo'];
                                            $nameact = $row['name'];
                                            $ta = $row['tipo_actividad'];
                                            $guia = $row['guia'];
                                            $dactivitity = date('Ymd', strtotime($row['created']));
                                            $created = date('d-m-Y', strtotime($row['created']));


                                            $sql2 = "SELECT `name` FROM `guias` WHERE `id`='$guia'";
                                            $result2 = query($sql2);
                                            $row2 = fetch_array($result2);
                                            $nameGuia = $row2['name'];


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
                                            
                                            switch ($ta){
                                                case 1:
                                                   $lta = 'Video';
                                                   break;
                                                case 2:
                                                   $lta = 'Imagen';

                                                   break;
                                                case 3:
                                                   $lta = 'Documento';

                                                   break;
                                                case 4:
                                                   $lta = 'YouTube';

                                                   break;

                                            }


                                ?>
                                <tr>
                                    <td><?php echo $lta ?></td>
                                    <td class="font-w600"><?php echo $nameGuia ?></td>
                                    <td class="d-none d-sm-table-cell"><a href="detail_actividad_grupo.php?id=<?php echo $id ?>"><?php echo $nameact ?></td>
                                    <td><span style="display: none"><?php echo $dactivitity ?> </span><?php echo $created ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                            <a href="edit_actividad_grupo.php?id=<?php echo $id ?>" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Editar Grupo">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="del_actividad_grupo.php?id=<?php echo $id ?>" type="button" class="btn btn-sm btn-secondary" data-toggle="tooltip" title="Eliminar Grupo">
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
            <?php
                }
            ?>
    </div>
</main>