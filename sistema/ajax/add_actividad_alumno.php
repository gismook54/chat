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

    
    $alumno = clean($_POST['alumno']);
    $name = clean($_POST['name']);
    $tipo_actividad = clean($_POST['tipo_actividad']);
    $actividad = clean($_POST['actividad']);
    $guia = clean($_POST['guia']);
    $active = clean($_POST['active']);
    $rr = clean($_POST['rr']);
    $ligav = clean($_POST['ligav']);
    
    
    if(isset($_SESSION['doc_actividad'])){
        $doc = $_SESSION['doc_actividad'];  
    } else {
        $doc = $ligav;  
    }
    
    
    $sql = "INSERT INTO `actividades_alumno`(`alumno`, `name`, `tipo_actividad`, `guia`,`actividad`, `doc_actividad`, `active`, `rr`)";
    $sql.= " VALUES('$alumno', '$name', '$tipo_actividad', '$guia', '$actividad', '$doc', '$active', '$rr')";
    $result = query($sql);
    confirm($result);
    
    unset($_SESSION['doc_actividad']);
    
    set_message("Se agregó la actividad $name correctamente");

    
} else {
    
    set_message("Error no se pudo agendar la cita intente de nuevo");
}

?>