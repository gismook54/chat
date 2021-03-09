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
    

    
    
    $sql = "DELETE FROM `actividades_grupo` WHERE `id`=$id";
    $result = query($sql);
    confirm($result);
    
    unset($_SESSION['doc_actividad']);
    
    set_message("Se eliminó la actividad acorrectamente");

    
} else {
    
    set_message("Error no se pudo agendar la cita intente de nuevo");
}

?>