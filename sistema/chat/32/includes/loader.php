<?php
	session_start();

	ob_start(); 
	
	error_reporting(0);
	
	date_default_timezone_set('America/Mexico_City');
		
	// Database Connection
	include('connection.php');
	
	if(!defined('DATABASE')) { die('Direct access not permitted'); }
	
	// Dabase Class
	include('database.class.php');
	
	// jChat Class
	include('jChat.php');
	
	// Session Manager
	include('session.php');

	$chat = new jChat();	
		
	///////////////////////////////////////////////////////////////	
	// Configurations - This is were the user configuration starts
	///////////////////////////////////////////////////////////////
	
	// Register Database Username Fields
	$chat->users_table = 'usersg17'; // the users table
	$chat->users_usernameField = 'username'; // the username field from users table
	$chat->user_idField = 'chat_id'; // the id (primary key, auto-incremented) field for the users table
	
	if(isset($_GET['id']))
	{
		$_SESSION['jChat_with'] = $chat->sanitize_integer($_GET['id']);	
	}
	
	if(isset($_POST['id']))
	{
		$_SESSION['jChat_with'] = $chat->sanitize_integer($_POST['id']);	
	}
	
	$server_ID = $chat->get_user(@$_SESSION['jChat_with'], 'ID');
	$server_USERNAME = ucfirst($chat->get_user(@$_SESSION['jChat_with'], 'USERNAME'));

	// Register Logged in user and the one he is chatting here (Client & Server)
	if(isset($_SESSION['jChat_authenticated']) && $_SESSION['jChat_authenticated'] == true)
	{
		$chat->clientID = get_user("ID"); // logged user id
		$chat->client = ucfirst(get_user("USERNAME")); // logged username
	}
		$chat->serverID = (int)$server_ID; // client user id
		$chat->server = $server_USERNAME;	 // client user name
	
	$chat->attachmentPath = 'images/attachments/';
		
	// Register Emoticons
	include('emoticons.php');
	$chat->emoticons = $emoticons;

?>