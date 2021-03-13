<?php
	
	include("loader.php");
	
	if(!defined('DATABASE')) {
		die('Direct access not permitted');
	}
	
	if(isset($_POST['message']))
	{		

		if(isset($_FILES['file']['name'])){	
			$file_location = $chat->upload_file($_FILES['file']);
		}

		// Insert Message
		$message = $_POST['message'];
		$message_set_id = $chat->set_message($_POST['message'], $file_location);
				
		// Get Messages
		$messages_ids = $chat->get_messages_id($_SESSION['id_user'], $_SESSION['jChat_with']);

		// Check if is client or server
		if(!empty($messages_ids))
		{
			foreach($messages_ids as $message_id)
			{	
				if($message_id['id'] == $message_set_id)
				{
					if($message_id['user_id'] == $_SESSION['id_user'])
					{
						$class = "client";
						$user_id = $_SESSION['id_user'];	
						$username = $_SESSION['user_name'];
					} elseif($message_id['user_id'] == $_SESSION['jChat_with']) {
						$class = "server";
						$user_id = 	$_SESSION['jChat_with'];
						$username = $chat->server;
						
					}	
				}
			}
			
			include('msg_tpl.php');
			
			echo $msg_tpl;

		}
		unset($_SESSION['jChat_requested_id']);
		
		$chat->set_messages_read($_SESSION['jChat_with']);
	}

	
	
?>