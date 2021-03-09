<?php
	
	include("loader.php");
	
	if(!defined('DATABASE')) {
		die('Direct access not permitted');
	}
	
	if(isset($_POST['offline']) && $_POST['offline'] == 'true')
	{
		$offline = $chat->set_user_sessionStatus($chat->clientID, 'OFFLINE');
		
	} elseif(isset($_POST['offline']) && $_POST['offline'] == 'false') {
		$bo = $chat->set_user_sessionStatus($chat->clientID, 'BACK_ONLINE');	
	}

?>