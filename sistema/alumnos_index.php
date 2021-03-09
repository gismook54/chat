<main id="main-container">
    <div class="content">
        <h2 class="content-heading">
            <a href="add_alumno.php" class="btn btn-rounded btn-hero btn-sm btn-alt-primary float-right mb-10"> <i class="fa fa-plus"></i> Agregar Alumno</a>
            <i class="si si-emoticon-smile"></i>&nbsp;<a href="ajax/dwl-alumnos.php" class="btn btn-rounded btn-hero btn-sm btn-alt-success float-right mb-10"> <i class="fa fa-cloud-download"></i> Descargar</a>&nbsp;
            ALUMNOS</h2>
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
                <h3 class="block-title">Listado de Alumnos</h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <?php if($userId == 2 || $userId == 1 || $userId == 6){?>
                            <th>Acciones</th>
                            <th>Estatus</th>
                            <?php } ?>
                            <th>Nombre</th>
                            <th>Clave</th>
                            <th>Grupo</th>
                            <th>Padre</th>
                            <th>Madre</th>
                            <th>Último acceso</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                            <?php 

                                    $sql = "SELECT * FROM `alumnos` ";
                                    $result = query($sql);

                                   if(row_count($result) > 0) {
                                        while($row = fetch_array($result)){
                                            $id = $row['id'];
                                            $name = $row['name'];
                                            $apaterno = $row['apaterno'];
                                            $amaterno = $row['amaterno'];
                                            $ngrupo = $row['ngrupo'];
                                            $padre = $row['padre'];
                                            $madre = $row['madre'];
                                            $clave = $row['clave'];
                                            $estatus = $row['estatus'];
                                            
                                            if($estatus == '1'){
                                                $laestatus = 'ACTIVO';
                                                $coloEstatus = 'success';
                                            } else {
                                                $laestatus = 'INACTIVO';
                                                $coloEstatus = 'danger';
                                            }
                                            
                                            if($row['last_login']== '' ){
                                                $last_login = '';
                                            }else{
                                                $last_login = date('d-m-Y h:i', strtotime($row['last_login']));
                                            }
                                            
                                            

                                            $sql2 = "SELECT * FROM `grupos` WHERE `id`='$ngrupo'";
                                            $result2 = query($sql2);
                                            $row2 = fetch_array($result2);
                                            $nameG = $row2['name'];
                                            $ngroup = $row2['ngroup'];
                                            $ngrade = $row2['ngrade'];



                                            $sql3 = "SELECT `name` FROM `grades` WHERE `id`='$ngrade'";
                                            $result3 = query($sql3);
                                            $row3 = fetch_array($result3);

                                            $dgrade = $row3['name'];

                                            $elGrupo = $nameG.' '.$ngroup.' '.$dgrade;
                                            $alumno = $name.' '.$apaterno.' '.$amaterno;


                                ?>
                                <tr>
                                    <?php if($userId == 2 || $userId == 1 || $userId == 6){?>
                                    <td><a href="edit_alumno.php?id=<?php echo $id ?>" class="btn btn-sm btn-circle btn-alt-secondary mr-5 mb-5"><i class="si si-note"></i></a><a href="del_alumno.php?id=<?php echo $id ?>" class="btn btn-sm btn-circle btn-alt-danger mr-5 mb-5"><i class="si si-trash"></i></a></td>
                                    <td><span class="badge badge-<?php echo $coloEstatus ?>"><?php echo $laestatus ?></span></td>
                                    <?php } ?>
                                    <td class="font-w600"><?php echo $alumno ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $clave ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $elGrupo?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $padre ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $madre ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $last_login ?></td>
                                    
                                    
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