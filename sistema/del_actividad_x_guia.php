<?php

$sqle = "SELECT * FROM `actividades_alumno` WHERE `id`='$idEdit'";
$resulte = query($sqle);
$rowe = fetch_array($resulte);

$idCap = $rowe['id'];
$alumnoCap = $rowe['alumno'];
$nameact = $rowe['name'];
$tipo_actividad = $rowe['tipo_actividad'];
$actividad = $rowe['actividad'];
$active = $rowe['active'];






?>
<main id="main-container">
                <div class="content">
                    <h2 class="content-heading pb-20"> <a href="./" class="btn btn-rounded btn-hero btn-sm btn-alt-warning float-right"> <i class="fa fa-mail-reply-all"></i> Volver</a>
                        <i class="si si-grid"></i>&nbsp; Eliminar Actividad</h2>
                    
                   <div class="block">
                                
                        <div class="block-content">
                            <p class="p-10 text-danger"><i class="fa fa-warning"></i> &nbsp;¡PRECAUCIÓN ESTA A PUNTO DE ELIMNAR ESTA ACTIVIDAD!</p>
                            <form id="add-actividad" name="add-actividad">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Alumno</label>
                                    <div class="col-lg-9">
                                        <select class="js-select2 form-control" id="alumno" name="alumno" disabled>
                                            <option></option>
                                            <?php 
                                                
                                                $groups = explode(",", $_SESSION['grupo_guia']);

                                                foreach($groups as $group) {
                                                    echo $group;
                                                    $sql = "SELECT * FROM `alumnos` WHERE `ngrupo`='$group'";
                                                    $result = query($sql);
                                                    while($row = fetch_array($result)){
                                                        
                                                     $id = $row['id'];
                                                     $name = $row['name'];
                                                     $apaterno = $row['apaterno'];
                                                     $amaterno = $row['amaterno'];
                                                    
                                                        if($alumnoCap == $id){
                                                            
                                                            echo '<option value="'.$id.'" selected>'.$name.' '.$apaterno.' '.$amaterno.'</option>';
                                                        } else {
                                                            
                                                            echo '<option value="'.$id.'">'.$name.' '.$apaterno.' '.$amaterno.'</option>';
                                                            
                                                        }

                                                     
                                                        
                                                    }
                                                           
                                                  }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre Actividad</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $nameact ?>" disabled>
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Descripción </label>
                                    <div class="col-lg-9">
                                         <textarea class="form-control" rows="6"  name="actividad" disabled><?php echo $actividad ?></textarea>
                                    </div>
                                </div>

                                
                                <div class="form-group row">
                                    
                                    <div class="col-lg-12">
                                       <hr>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-block btn-danger">Eliminar</button>
                                    </div>
                                </div>
                                <input type="hidden" name="guia" value="<?php echo $_SESSION['id_user']; ?>">
                                <input type="hidden" name="id" value="<?php echo $idCap; ?>">
                            </form>
                        </div>
                    </div>
                        
                </div>
            </main>