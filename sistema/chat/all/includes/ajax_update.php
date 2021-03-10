<?php
	
	include("loader.php");
	
	if(!defined('DATABASE')) {
		die('Direct access not permitted');
	}
	
	$message_array = array();
	
	if(isset($_POST['update']))
	{ 
		// Get Last Message
		$message = $chat->get_last_message_with($_POST['id']);
		$count = $chat->get_unread_messages($_POST['id'], $_SESSION['id_user']);

		if($message == null)
		{
			$class = 'client';
			$user_id = $_SESSION['id_user'];
			$username = $_SESSION['user_name'];
		} else {
			$class = 'server';
			$user_id = $_SESSION['jChat_with'];
			$username = $chat->server;
		}
		
		if($message)
		{		
			$message_set_id = $message['id'];
			
			include('msg_tpl.php');
			
			$message_array['message'] = $msg_tpl;
			
			$message_array['last_message'] = $message['id'];
						
			if($count)
			{
				$val = '- ' . $count;
			} else {
				$val = '';
			}
			
			$message_array['new_messages'] = $count; 
		
			echo json_encode($message_array);	
		}
	
	}
	
?>