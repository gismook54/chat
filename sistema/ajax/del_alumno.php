<?php include("../../inc/init.php");

$menu = 0;



if(isset($_POST['id'])){
    
    $id = $_POST['id']; 
    $sql = "DELETE FROM `alumnos` WHERE `id`='$id'";
    $result = query($sql);
    confirm($result);
    set_message("Se elimino alumno");
   
    
} else {
    
    redirect('alumnos.php');
    
}
