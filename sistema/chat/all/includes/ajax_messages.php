<?php
	
	include("loader.php");
	
	echo 'hola';
	if(!defined('DATABASE')) {
		die('Direct access not permitted');
	}
	echo 'hey';
	
	if(isset($_POST['clientID']))
	{
		echo 'si viene el numero de cliente';
		// Get The Messages ID of the logged in clientID (user_id) and the one he sends to serverID (receiver)
		var_dump($chat->clientID);
		var_dump($chat->serverID);
		$messages_ids = $chat->get_messages_id($chat->clientID, $chat->serverID);

		var_dump($messages_ids);

		if(!empty($messages_ids))
		{
			foreach($messages_ids as $message_id)
			{	
				if($message_id['user_id'] == $chat->clientID)
				{
					$class = "client";
					$user_id = $chat->clientID;	
					$username = $chat->client;
				} elseif($message_id['user_id'] == $chat->serverID) {
					$class = "server";
					$user_id = 	$chat->serverID;
					$username = $chat->server;
				}
				
				$message_set_id = $message_id['id'];
				
				include('msg_tpl.php');
			
				echo $msg_tpl;
				
			}
		} 
		
		if(isset($message_id))
		{
			$_SESSION['jChat_requested_id'] = $message_id['id'];
		}
	}
		
?>