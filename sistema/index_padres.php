<?php


$idAlumno =$_SESSION['id_user'];


$sql = "SELECT `ngrupo` FROM `alumnos` WHERE `id`='$idAlumno'";
$result = query($sql);
$row = fetch_array($result);
$idGpo = $row['ngrupo'];

?>
<main id="main-container">
    <div class="content">
        
        <h2 class="content-heading">
            <i class="si si-book-open"></i>&nbsp;ACTIVIDADES</h2>
        
       
        <div class="block">
            <div class="block-header block-header-default">
                <h3 class="block-title">ACTIVIDADES PERSONALES</h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th>Fuente</th>
                            <th>Actividad</th>
                            <th>Fecha</th>
                            <th>Req. Respuesta</th>
                            <th>Realizada</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 

                                    $sql = "SELECT * FROM `actividades_alumno` WHERE `alumno`='$idAlumno' AND active = '1'";
                                    $result = query($sql);

                                   if(row_count($result) > 0) {
                                        while($row = fetch_array($result)){
                                            $id = $row['id'];
                                            $alumno = $row['alumno'];
                                            $grupo = $row['grupo'];
                                            $nameact = $row['name'];
                                            $ta = $row['tipo_actividad'];
                                            $rr = $row['rr'];
                                            $dactivitity = date('Ymd', strtotime($row['created']));
                                            $created = date('d/m/Y', strtotime($row['created']));
                                            
                                            $sqlA = "SELECT `name`,`apaterno`,`amaterno` FROM `alumnos` WHERE `id`='$alumno'";
                                            $resultA = query($sqlA);
                                            $rowA = fetch_array($resultA);
                                            $nameA = $rowA['name'].' '.$rowA['apaterno'].' '.$rowA['amaterno'];
                                                        
                                            if($rr==1){
                                                $rr =  'SI';
                                                $sqlRep = "SELECT * FROM `reply_alumnos` WHERE `idactivity`='$id' AND `idalumno`='$alumno'";
                                                $resultRep = query($sqlRep);
                                                if(row_count($resultRep) > 0) {
                                                    $rowRep = fetch_array($resultRep);
                                                    $idrep = $rowRep['id'];
                     
                                                    $created = date('d/m/Y', strtotime($rowRep['created']));
                                                    $resRep = '<a class="btn btn-alt-success" href="detail_reply.php?id='.$idrep.'&al='.$idAlumno.'&idact='.$id.'"> SI | '.$created.'</a>';
                                                } else {
                                                    $resRep = '<span class="badge badge-danger">NO</span>';
                                                }
                                            }else{
                                                $rr =  'NO';
                                                $resRep = '<span class="badge badge-sucees">NO APLICA</span>';
                                            }
                                            
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
                                    <td class="d-none d-sm-table-cell"><a href="detail_actividad.php?id=<?php echo $id ?>&al=<?php echo $alumno ?>"><?php echo $nameact ?></a></td>
                                    <td><span style="display: none"><?php echo $dactivitity ?> </span><?php echo $created ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $rr ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $resRep ?></td>
                                    
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
      
                    
                    $sql01 = "SELECT * FROM `grupos` WHERE `id`='$idGpo'";
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
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full-2">
                    <thead>
                        <tr>
                            <th>Fuente</th>
                            <th>Actividad</th>
                            <th>Fecha</th>
                            <th>Req. Respuesta</th>
                            <th>Realizada</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 

                                    $sql = "SELECT * FROM `actividades_grupo` WHERE `grupo`='$idGrupo' AND `active`='1'";
                                    $result = query($sql);

                                   if(row_count($result) > 0) {
                                        while($row = fetch_array($result)){
                                            $idActi = $row['id'];
                                            $ngrupo = $row['grupo'];
                                            $nameact = $row['name'];
                                            $ta = $row['tipo_actividad'];
                                            $guia = $row['guia'];
                                            $dactivitity = date('Ymd', strtotime($row['created']));
                                            $created = date('d/m/Y', strtotime($row['created']));
                                             $rr = $row['rr'];


                                            $sql2 = "SELECT `name` FROM `guias` WHERE `id`='$guia'";
                                            $result2 = query($sql2);
                                            $row2 = fetch_array($result2);
                                            $nameGui = $row2['name'];


                                            //echo $idAlumno;
                                            
                                            
                                            if($rr==1){
                                                $rr =  'SI';
                                                $sqlRep = "SELECT * FROM `reply_alumnos` WHERE `idactivity`=' $idActi' AND `idalumno`='$idAlumno'";
                                                $resultRep = query($sqlRep);
                                                if(row_count($resultRep) > 0) {
                                                    $rowRep = fetch_array($resultRep);
                                                    $idrep = $rowRep['id'];
                     
                                                    $created = date('d/m/Y', strtotime($rowRep['created']));
                                                    $resRep = '<a class="btn btn-alt-success" href="detail_reply.php?id='.$idrep.'&al='.$idAlumno.'&idact='.$id.'"> SI | '.$created.'</a>';
                                                } else {
                                                    $resRep = '<span class="badge badge-danger">NO</span>';
                                                }
                                            }else{
                                                $rr =  'NO';
                                                $resRep = '<span class="badge badge-sucees">NO APLICA</span>';
                                            }
                                            
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
                                    <td class="d-none d-sm-table-cell"><a href="detail_actividad_grupo.php?id=<?php echo $idActi ?>"><?php echo $nameact ?></a></td>
                                    <td><span style="display: none"><?php echo $dactivitity ?> </span><?php echo $created ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $rr ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $resRep ?></td>
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