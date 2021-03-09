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

    
    $clave = clean($_POST['clave']);

    
    $sql = "SELECT * FROM `alumnos` WHERE`clave`='$clave' AND `estatus`='1'";

		$result = query($sql);

		if(row_count($result) == 1) {

			$row = fetch_array($result);


            $alumnoId = $row['id'];
            $alumnoName = $row['name'];
            $alumnoApaterno = $row['apaterno'];
            $alumnoAmaterno = $row['amaterno'];
            $alumnoGrupo = $row['ngrupo'];
            $ll = date('y-m-d h:i:s');

            $alName = $alumnoName.' '.$alumnoApaterno.' '.$alumnoAmaterno;
            $_SESSION['user_name'] = $alName;
            $_SESSION['id_user'] =  $alumnoId;
            $_SESSION['grupo_alumno'] = $alumnoGrupo;
            $_SESSION['typo_user'] = '3';
            
            $_SESSION['jChat_username'] = $alName;
			$_SESSION['jChat_authenticated'] = 'true';
			$_SESSION['jChat_token'] = md5(uniqid(mt_rand(), true));
            
            
            $sql2 = "UPDATE `alumnos` SET `last_login`='$ll' WHERE `id`=$alumnoId";
            $result2 = query($sql2);
            confirm($result2);
            
            
            echo '1';  
            //redirect("../../sistema/");
            

		} else {
            echo '0';

                //redirect("login_guias.php");



		}
    
    
} 
?>