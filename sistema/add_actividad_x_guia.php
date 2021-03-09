<main id="main-container">
                <div class="content">
                    <h2 class="content-heading pb-20"> <a href="./" class="btn btn-rounded btn-hero btn-sm btn-alt-warning float-right"> <i class="fa fa-mail-reply-all"></i> Volver</a>
                        <i class="si si-grid"></i>&nbsp; Agregar Actividad</h2>
                    
                   <div class="block">
                         <div id="subevid" class="form-group row">
                                    <form action="php/form_upload.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="custom_file_name">
                                         <div class="col-lg-9"><input type="file" name="files"></div>
                                    </form>
                             </div>
                        <div class="block-content">
                            <form id="add-actividad" name="add-actividad">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Alumno</label>
                                    <div class="col-lg-9">
                                        <select class="js-select2 form-control" id="alumno" name="alumno">
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


                                                     echo '<option value="'.$id.'">'.$name.' '.$apaterno.' '.$amaterno.'</option>';
                                                        
                                                    }
                                                           
                                                  }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre Actividad</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Tipo Archivo </label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipo_actividad" id="video" value="1" checked>
                                            <label class="custom-control-label" for="video">Video</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipo_actividad" id="imagen" value="2">
                                            <label class="custom-control-label" for="imagen">Imagen</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipo_actividad" id="archivo" value="3">
                                            <label class="custom-control-label" for="archivo">Documento</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="tipo_actividad" id="ligayt" value="4">
                                            <label class="custom-control-label" for="ligayt">Video de YouTube</label>
                                        </div>
                                    </div>
                                </div>
                                <div id="subevid" class="form-group row">
                                    <label class="col-lg-3 col-form-label">Subir archivo</label>
                                    <div class="col-lg-4">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="photo-emp" name="photo-emp" data-toggle="custom-file-input">
                                            <label class="custom-file-label" for="photo-emp">Subir</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div id="progressOuter" class="progress push" style="display:none;">
                                             <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" style="width: 0%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                                                <span id="lpb" class="progress-bar-label">100%</span>
                                            </div>
                                        </div>
                                        <div id="msgBox"></div>
                                    </div>
                                </div>
                                <div id="liga" class="form-group row" style="display: none">
                                    <label class="col-lg-3 col-form-label">Liga del video</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="ligav" name="ligav">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Descripción </label>
                                    <div class="col-lg-9">
                                         <textarea class="form-control" rows="6"  name="actividad"></textarea>
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Publicar inmediatamente</label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="active" id="si" value="1" checked>
                                            <label class="custom-control-label" for="si">Sí</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="active" id="no" value="0">
                                            <label class="custom-control-label" for="no">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Necesita Respuesta</label>
                                    <div class="col-lg-9">
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="rr" id="rr1" value="1">
                                            <label class="custom-control-label" for="rr1">Sí</label>
                                        </div>
                                        <div class="custom-control custom-radio custom-control-inline mb-5">
                                            <input class="custom-control-input" type="radio" name="rr" id="rr0" value="0" checked>
                                            <label class="custom-control-label" for="rr0">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    
                                    <div class="col-lg-12">
                                       <hr>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="form-group row">
                                    <div class="col-6">
                                        <button type="submit" id="btn-send" class="btn btn-block btn-alt-primary">Guardar</button>
                                    </div>
                                </div>
                                <input type="hidden" name="guia" value="<?php echo $_SESSION['id_user']; ?>">
                            </form>
                        </div>
                    </div>
                        
                </div>
            </main>