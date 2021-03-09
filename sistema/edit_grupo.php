<?php include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$menu = 4;
$idgc = clean($_GET['id']);
echo $idgc;

if (isset($id)){  
    
    $sqlc = "SELECT * FROM `grupos` WHERE `id`='$idgc'";
    $resultc = query($sqlc);
    
     if(row_count($resultc) == 1) {
         
        $rowg = fetch_array($resultc);
        $nameg = $rowg['name'];
        echo $nameg;
         
     } else {
         
         redirect("grupos.php");
         
     }
    
}

?>
<!doctype html>
<html lang="es" class="no-focus">
<?php include("head_start.php");?>

    <body>

        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-narrow">
           
            <?php include("nav.php");?>
            <?php include("top.php");?>
            <main id="main-container">
                <div class="content">
                    <h2 class="content-heading"> <a href="grupos.php" class="btn btn-rounded btn-hero btn-sm btn-alt-warning float-right mb-10"> <i class="fa fa-mail-reply-all"></i> Volver</a>
                        <i class="si si-grid"></i>&nbsp; Editar Grupo</h2>
                    
                   <div class="block">
                                
                        <div class="block-content">
                            <form id="add-group" name="add-group">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Nombre</label>
                                    <div class="col-lg-9">

                                        <select class="form-control" id="nombre" name="nombre">
                                            <?php 
                                             
                                                $sql = "SELECT * FROM `group_names`";
                                                $result = query($sql);

                                               if(row_count($result) > 0) {
                                                    while($row = fetch_array($result)){

                                                        $id = $row['id'];
                                                        $abbr = $row['abbr'];
                                                        $name = $row['name'];
                                                        if($name == $nameg){
                                                            
                                                            echo '<option value="'.$name.'" selected>'.$abbr.' | '.$name.'</option>';
                                                            
                                                        } else {
                                                            
                                                            echo '<option value="'.$name.'">'.$abbr.' | '.$name.'</option>';
                                                            
                                                        }
                                                        
                                                    }
                                               }

                                            ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Grupo</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" id="grupo" name="grupo" value="<?php echo $rowg['ngroup']; ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label">Grado</label>
                                    <div class="col-lg-9">

                                        <select class="form-control" id="grades" name="grades">
                                            <option value="">---Seleccione----</option>
                                            <?php 

                                                $sql = "SELECT * FROM `grades`";
                                                $result = query($sql);

                                               if(row_count($result) > 0) {
                                                    while($row = fetch_array($result)){

                                                        $id = $row['id'];
                                                        $name = $row['name'];
                                                        if($id == $rowg['ngrade'] ){
                                                            
                                                             echo '<option value="'.$id.'" selected>'.$name.'</option>';
                                                            
                                                        } else {
                                                            
                                                            echo '<option value="'.$id.'">'.$name.'</option>';
                                                            
                                                        }
                                                       
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
                                <input type="hidden" name="id" value="<?php echo $idgc; ?>">
                            </form>
                        </div>
                    </div>
                        
                </div>
            </main>

        <?php include('../copy.php'); ?>

        <script src="../assets/js/codebase.core.min.js"></script>
        <script src="../assets/js/codebase.app.min.js"></script>
        <script src="../assets/js/plugins/slick/slick.min.js"></script>
        <script src="../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>


        <script type="text/javascript">
            $(document).ready(function(){

                $( "#add-group" ).submit(function( event ) {
                    var parametros = $(this).serialize();
                    $("#btn-send").prop('disabled', true);
                    $.ajax({
                        type: "POST",
                        url: "ajax/add_group.php",
                        data: parametros,
                        success: function(datos){
                            window.location = 'grupos.php';
                        }
                    });
                    event.preventDefault();
                  });


            });		
        </script>

        </div>


    </body>
</html>