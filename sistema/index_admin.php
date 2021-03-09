<?php


  
    
$sqlta = "SELECT COUNT(id) AS totala FROM `alumnos`";
$resulta = query($sqlta);
$rowta = fetch_array($resulta);
$totalAlumnos+= $rowta['totala'];


$sqlag = "SELECT COUNT(id) AS totag FROM `actividades_grupo`";
$resulag = query($sqlag);
$rowag = fetch_array($resulag);
$totalActGrup+= $rowag['totag'];

    
$sqlaa = "SELECT COUNT(id) AS totaaa FROM `actividades_alumno`";
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

            <i class="si si-book-open"></i>&nbsp; ACTIVIDADES POR ALUMNO</h2>
        
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
                                            
                                            $sql3 = "SELECT `name`, `apaterno`, `amaterno` FROM `alumnos` WHERE `id`='$alumno'";
                                            $result3 = query($sql3);
                                            $row3 = fetch_array($result3);
                                            $nameAlumno = $row3['name'].' '.$row3['apaterno'].' '.$row3['amaterno'];



                                ?>
                                <tr>
                                    <td class="font-w600"><?php echo $nameAlumno ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $nameG?></td>
                                    <td class="d-none d-sm-table-cell"><a href="detail_actividad.php?id=<?php echo $id ?>&al=<?php echo $alumno ?>"><?php echo $nameact ?></a></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $created ?></td>
              
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
        <h2 class="content-heading"><i class="si si-book-open"></i>&nbsp;ACTIVIDADES POR GRUPO</h2>
            

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
                                    <td class="d-none d-sm-table-cell"><a href="detail_actividad_grupo.php?id=<?php echo $id ?>"><?php echo $nameact ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $created ?></td>
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