<?php
	
	include("loader.php");
	
	if(!defined('DATABASE')) {
		die('Direct access not permitted');
	}
	
	if(isset($_POST['messageID']))
	{
		echo $chat->unregister_message($_POST['messageID'], $chat->clientID, $chat->serverID);
	}
	
?>