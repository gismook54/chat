<?php include("../inc/init.php");
if(!logged_in()){

    redirect("../");
}

$tipoUsuario = $_SESSION['typo_user'];
$guiaGrupo = $_SESSION['grupo_guia'];

$laguia =  $_SESSION['id_user'];
$menu = 7;

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

?>
            
<main id="main-container">
    <div class="content">
        
        <h2 class="content-heading">

            
            <i class="si si-book-open"></i>&nbsp;
            ELIMINAR ACTIVIDADES DE GRUPOS</h2>
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
                <h3 class="block-title"><i class="si si-trash"></i>&nbsp;Actividades por Alumno</h3>
                <a class="btn btn-square btn-alt-success min-width-125" href="javascript:seleccionar_todo()">Marcar todos</a>&nbsp;&nbsp;
<a class="btn btn-square btn-alt-warning min-width-125" href="javascript:deseleccionar_todo()">Desmarcar todos</a> 

            </div>
            <div class="block-content block-content-full">
               <form id="elimina" name="elimina">
                <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Estatus</th>
                            <th>Actividad</th>
                            
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                            <?php 

                                    $sql = "SELECT * FROM `actividades_grupo` WHERE `guia`='$laguia' AND `active`='0'";
                                    $result = query($sql);

                                   if(row_count($result) > 0) {
                                        while($row = fetch_array($result)){
                                            $id = $row['id'];
                             
                                            $nameact = $row['name'];
                                            $guia = $row['guia'];
                                            $created = date('d-m-Y', strtotime($row['created']));
                                            $active = $row['active'];
                                            
                                            if($active == '1'){
                                                $lactividad = 'Desactivar Actividad';
                                                $colorS = 'success';
                                                $icon = '<i class="fa fa-close"></i>';
                                                
                                            } else {
                                                $lactividad = 'Activar Actividad';
                                                $colorS = 'danger';
                                                $icon = '<i class="fa fa-check-square-o"></i>';

                                                
                                            }
                                            
                                            


                                ?>
                                <tr>
                                    <td> <div class="custom-control custom-checkbox custom-control-inline mb-5">
                                            <input class="custom-control-input" type="checkbox" name="delete[]" id="delete_<?php echo $id ?>" value="<?php echo $id ?>">
                                            <label class="custom-control-label" for="delete_<?php echo $id ?>">Eliminar</label>
                                        </div></td>
                                    <td>
                                        
                                             <a href="edit_status_grupo.php?id=<?php echo $id ?>" type="button" class="btn btn-sm btn-<?php echo $colorS ?>" data-toggle="tooltip" title="Editar Actividad"><?php echo $icon ?>
                                                
                                            </a>
                                       
                                    
                                    </td>
                                    
                                    <td class="d-none d-sm-table-cell"><a href="detail_actividad_grupo.php?id=<?php echo $id ?>"><?php echo $nameact ?></td>
                                   
                                    <td class="d-none d-sm-table-cell"><?php echo $created ?></td>
                                   
                                </tr>
                                <?php                 
                                        }
                                   }
                                ?>
                           
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-6 offset-6"><button type="submit" id="btn-send" class="btn btn-danger btn-block"><i class="si si-trash"></i>&nbsp;Eliminar</button></div>   
                </div>
              
              </form>
            </div>
        </div>

    </div>
    
</main>
            
            <?php include('../copy.php'); 
            if($tipoUsuario == 3){
            ?>
            
                
            <?php   
            }
            
            ?>
            
        </div>
        <script src="../assets/js/codebase.core.min.js"></script>
        <script src="../assets/js/codebase.app.min.js"></script>
        <script src="../assets/js/plugins/slick/slick.min.js"></script>
        <script src="../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <script>

        
            
            function seleccionar_todo(){
               for (i=0;i<document.elimina.elements.length;i++)
                  if(document.elimina.elements[i].type == "checkbox")
                     document.elimina.elements[i].checked=1
            } 
            
            function deseleccionar_todo(){
                   for (i=0;i<document.elimina.elements.length;i++)
                      if(document.elimina.elements[i].type == "checkbox")
                         document.elimina.elements[i].checked=0
                } 
            
            $(document).ready(function(){
                


                $( "#elimina" ).submit(function( event ) {
                    var parametros = $(this).serialize();
                    $("#btn-send").prop('disabled', true);
                    $.ajax({
                        type: "POST",
                        url: "ajax/del_actividad_grupos",
                        data: parametros,
                        success: function(datos){
                           window.location = 'delete_activity_grupo.php';
                        }
                    });
                    event.preventDefault();
                  });
                
               

            });		
           
 
        </script>
 


    </body>
</html>