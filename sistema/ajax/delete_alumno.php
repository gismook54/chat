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

    
    
    
    $sql = "UPDATE `alumnos` SET `name`='$nombre', `apaterno`='$apaterno', `amaterno`='$amaterno', `ngrupo`='$grupo', `padre`='$padre', `madre`='$madre', `clave`='$clave', `estatus`='$estatus' WHERE `id`='$id'";
    $result = query($sql);
    confirm($result);
    
    
    
    set_message("Se editó el alumno $alumno correctamente");

    
} else {
    
    set_message("Error no se pudo editar el alumno");
}

?>