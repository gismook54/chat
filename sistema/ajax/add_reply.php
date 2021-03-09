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

    $answer = clean($_POST['answer']);
    $idactivity = clean($_POST['idactivity']);
    $idgrupo = clean($_POST['idgrupo']);
    $idalumno = clean($_POST['idalumno']);
    $idta = clean($_POST['idta']);
        

    $doc = $_SESSION['doc_reply'];

    
    
    $sql = "INSERT INTO `reply_alumnos`(`idalumno`, `idgrupo`, `idactivity`, `idtipoact`, `answer`, `doc_answer`)";
    $sql.= " VALUES('$idalumno', '$idgrupo', '$idactivity', '$idta', '$answer', '$doc')";
    $result = query($sql);
    confirm($result);
    
    unset($_SESSION['doc_reply']);
    
    set_message("Se agregó la respuesta correctamente");

    
} else {
    
    set_message("Error no se pudo agendar la cita intente de nuevo");
}

?>