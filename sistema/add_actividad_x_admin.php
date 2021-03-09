<main id="main-container">
                <div class="content">
                    <h2 class="content-heading pb-20"> <a href="./" class="btn btn-rounded btn-hero btn-sm btn-alt-warning float-right"> <i class="fa fa-mail-reply-all"></i> Volver</a>
                        <i class="si si-grid"></i>&nbsp; Agregar Aactividad</h2>
                    
                   <div class="block">
                                
                        <div class="block-content">
                            <form id="add-alumno" name="add-alumno">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Apellido Paterno</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="apaterno" name="apaterno">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Apellido Materno</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="amaterno" name="amaterno">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="nombre" name="nombre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre Padre</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="padre" name="padre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre Madre</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="madre" name="madre">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Clave</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="clave" name="clave" value="<?php echo strtoupper($claveAcceso) ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Grupo</label>
                                    <div class="col-lg-9">

                                        <select class="form-control" id="grupo" name="grupo">

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
                                           
                                                        echo '<option value="'.$id.'">'.$name.' '.$ngroup.' '.$dgrade.'</option>';
                                                    }
                                               }

                                            ?>
                                        </select>

                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <div class="col-lg-9 ml-auto">
                                        <button type="submit" class="btn btn-alt-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                        
                </div>
            </main>