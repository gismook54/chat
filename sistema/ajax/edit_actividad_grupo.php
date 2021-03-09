<?php include("../../inc/init.php");


/* Previene acceso directo a esta página*/ 
$isAjax = isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND
strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
if(!$isAjax) {
  $user_error = 'Acceso denegado - direct call is not allowed...';
  trigger_error($user_error, E_USER_ERROR);
}
ini_set('display_errors',1);



if($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = clean($_POST['id']);
    $grupo = clean($_POST['grupo']);
    $name = clean($_POST['name']);
    $tipo_actividad = clean($_POST['tipo_actividad']);
    $actividad = clean($_POST['actividad']);
    $guia = clean($_POST['guia']);
    
    if(isset($_SESSION['doc_actividad'])){
       $doc = $_SESSION['doc_actividad']; 
       $ins = 'doc_actividad=\''.$doc.'\',';
    } else {
       $ins= '';
    }
    
    $active = clean($_POST['active']);
    $rr = clean($_POST['rr']);
    
    $updated = date('Y-m-d h-i-s');
    
    
    $sql = "UPDATE `actividades_grupo` SET `name`='$name', `tipo_actividad`='$tipo_actividad', `guia`='$guia', `created`='$updated', `actividad`='$actividad', $ins `active`='$active', `rr`='$rr'  WHERE `id`=$id";
    $result = query($sql);
    confirm($result);
    
    unset($_SESSION['doc_actividad']);
    
    set_message("Se actualizó la actividad $name correctamente");

    
} else {
    
    set_message("Error no se pudo agendar la cita intente de nuevo");
}

?>