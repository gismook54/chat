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
    $grupo = json_encode($_POST['grupo']);
    
    $clave = clean($_POST['clave']);
    
    if(isset($_POST['estatus'])){
        
        $estatus = clean($_POST['estatus']);
        
    }else{
        
        $estatus = '0';
        
    }
    
    
    if(isset($_SESSION['foto_emp'])){
        
        $photo = $_SESSION['foto_emp'];
        
    }else{
        
        $photo = 'avatar.jpg';
        
    }
    
    $sql = "INSERT INTO `guias`(`name`, `photo`, `idgrupo`, `clave`, `estatus`)";
    $sql.= " VALUES('$nombre', '$photo', '$grupo', '$clave', '$estatus')";
    $result = query($sql);
    confirm($result);
    
    
    
    set_message("Se agregó la guía $nombre correctamente");

    
} else {
    
    set_message("Error no se pudo agendar la cita intente de nuevo");
}

?>