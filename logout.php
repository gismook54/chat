<?php include("inc/init.php");



    $_SESSION = array();
    session_destroy();
    $_SESSION['jChat_isLogout'] = 'true';
	if(isset($_COOKIE['email'])) {

		unset($_COOKIE['email']);

		setcookie('email', '', time()-86400);


	}


redirect("index.php");