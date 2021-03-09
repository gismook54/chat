<?php
	$query_string = 'action=logout&token='.$_SESSION['jChat_token'];

	if($_SERVER['QUERY_STRING'] == $query_string)
	{
		$chat->set_user_sessionStatus($chat->clientID, 'OFFLINE');
		
		$_SESSION = array();
		session_destroy();
		
		$_SESSION['jChat_isLogout'] = 'true';
		
		header('Location: login.php', true, 302);
		exit();
	}
?>