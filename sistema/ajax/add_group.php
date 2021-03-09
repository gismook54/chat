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

    $grades = clean($_POST['grades']);
    $nombre = clean($_POST['nombre']);
    $grupo = clean($_POST['grupo']);

    
    echo $limpia3;
    
    $sql = "INSERT INTO `grupos`(`name`, `ngroup`, `ngrade`)";
    $sql.= " VALUES('$nombre', '$grupo', '$grades')";
    $result = query($sql);
    confirm($result);
    
    
    
    set_message("Se agregó el grupo $nombre correctamente");

    
} else {
    
    set_message("Error no se pudo agendar la cita intente de nuevo");
}

?>