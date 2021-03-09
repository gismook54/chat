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

    
    $nombre = clean($_POST['nombre']);
    $apaterno = clean($_POST['apaterno']);
    $amaterno = clean($_POST['amaterno']);
    $padre = clean($_POST['padre']);
    $madre = clean($_POST['madre']);
    $grupo = clean($_POST['grupo']);
    $clave = clean($_POST['clave']);
    
    
    
    $sql = "INSERT INTO `alumnos`(`name`, `apaterno`, `amaterno`, `ngrupo`, `padre`, `madre`, `clave`, `estatus`)";
    $sql.= " VALUES('$nombre', '$apaterno', '$amaterno', '$grupo', '$padre', '$madre', '$clave', '1')";
    $result = query($sql);
    confirm($result);
    
    
    
    set_message("Se agregó el alumno $nombre correctamente");

    
} else {
    
    set_message("Error no se pudo agendar la cita intente de nuevo");
}

?>