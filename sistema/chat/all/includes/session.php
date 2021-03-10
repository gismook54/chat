<?php
	
	/*
	* This is a sample session, you can use your own but be based on this one
	*/
	
	############################################################################################### 
	#### Internal Validation
	###############################################################################################
		
	// Right Away on Login
	if(isset($_POST['username']) && isset($_POST['password'])) 
	{ 
		$ok = authenticate($_POST['username'], $_POST['password'], USERS_TABLE);
		
		if($ok == false)
		{
			$_SESSION['jChat_loginMessage'] = 'Invalid Credentials';
			header('Location: login.php');
			exit();		
		} elseif(in_array('error_found', $ok)) {
			$_SESSION['jChat_loginMessage'] = $ok['error'];
			header('Location: login.php');
			exit();
		}
	}
	
	// Will check all pages that does need authentication - direct access example
	// The current pages are those to skip authentication
	if(
		basename($_SERVER['PHP_SELF']) !== 'login.php'
	)
	{
		if(!isset($_SESSION['jChat_username']) && !isset($_SESSION['jChat_authenticated']) && $_SESSION['jChat_authenticated'] !== 'true') 
		{
			$_SESSION['jChat_loginMessage'] = 'Failed to log in';
			
			header('Location: login.php');
			exit();	
		}
	}
	
	############################################################################################### 
	#### Session Functions
	###############################################################################################
	
	function authenticate($username, $password, $user_table)
	{
		$c = new connectMe(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE);
		
		if($username && $password) 
		{
			$query = sprintf("SELECT * FROM %s WHERE username = '%s' and password = '%s' LIMIT 1", 
								$c->escape($user_table),
								$c->escape($username), 
								$c->escape(sha1($password))
							);
							
			$result = $c->query($query);
			
			$results = $c->fetch_row($result);

			// gave a result and was authenticated
			if(!empty($results))
			{
				$_SESSION['jChat_username'] = $username;
				$_SESSION['jChat_authenticated'] = 'true';
				$_SESSION['jChat_token'] = md5(uniqid(mt_rand(), true));
				return $results;		
			} elseif($c->error()) {
				 return array('error_found' => 'true', 'error' => $c->error());
			} else {
				return false;	
			}
			
		}	
	}
	
	function get_user($identifier)
	{
		$c = new connectMe(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE);
		
		$username = $_SESSION['jChat_username'];
		
		if(isset($username))
		{	
			
			if(!isset($_SESSION['grupo_guia'])){
				$query = $c->query("SELECT id, name as username FROM guias WHERE id = '{$_SESSION['jChat_with']}'");
			}else{
				$query = $c->query("SELECT id, name as username FROM alumnos WHERE id = '{$_SESSION['jChat_with']}'");
			}
			
			
			while($row = $c->fetch_row($query))
			{
				//get logged user id and username
				$users_username = $row['username'];
				$users_id = $row['id'];
				
			}
			
				
                  
                    
					if($identifier == "id" || $identifier == "ID")
					{
						return $users_id;
					}
					
					if($identifier == "username" || $identifier == "USERNAME" || $identifier == "Username")
					{
						return $users_username;
					}
					
			
			} else {
				header('Location: login.php');
				exit();	
			}
		
	}
	
?>