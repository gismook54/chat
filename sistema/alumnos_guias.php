<?php
$groups = explode(",", $_SESSION['grupo_guia']);
$idGuia = $_SESSION['id_user'];
?>
<main id="main-container">
    <div class="content">
        <h2 class="content-heading">
            <i class="si si-emoticon-smile"></i>&nbsp;ALUMNOS</h2>
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
                <h3 class="block-title"><?php echo $GrupoGuia ?></h3>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Clave</th>
                            <th>Padre</th>
                            <th>Madre</th>
                            <th>Último acceso</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php 

                                    $sql = "SELECT * FROM `alumnos` WHERE `ngrupo`='$group' AND `estatus`='1'";
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
                                            
                                            if($row['last_login']== '' ){
                                                $last_login = '';
                                            }else{
                                                $last_login = date('d-m-Y h:i', strtotime($row['last_login']));
                                            }
                                            

                                            $elGrupo = $nameG.' '.$ngroup.' '.$dgrade;
                                            $alumno = $name.' '.$apaterno.' '.$amaterno;


                                ?>
                                <tr>
                                    <td class="font-w600"><?php echo $alumno ?></td>
                                    <td class="d-none d-sm-table-cell"><?php echo $clave ?></td>
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
           
            <?php
                }
            ?>
       
    </div>
</main>