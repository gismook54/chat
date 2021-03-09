<?php include("includes/loader.php"); ?>

<?php include("includes/logoutHandler.php"); ?>

<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>jChat</title>
    
    <link href="css/jChat.css" rel="stylesheet" media="screen" type="text/css" />
	
    <link href="css/reset.css" rel="stylesheet" media="screen" type="text/css" />
    <link href="css/bootstrap.css" rel="stylesheet" media="screen" type="text/css" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen" type="text/css" />
    <link href="css/user_css.css" rel="stylesheet" media="screen" type="text/css" />
   
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/jChat.js" type="text/javascript"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="js/custom.js" type="text/javascript"></script> 
    
</head>

<body>
	
    
    
	<!-- BOX -->
    <div class="box">
    
    	<div class="header">
        	<h4><?php echo $chat->server; ?></h4>
        </div>
        
        <div class="content">
        	
            <?php
				$current_session_time = $chat->get_session_time($chat->serverID);
				if($current_session_time == true)
				{
					$session_time = '<span class="session_time">Last seen '.$current_session_time.'</span>';
				} else {
					$session_time = '<span class="session_time">En línea</span>';	
				}
			?>
            
			<!-- jChat -->
            <ul class="messages-layout">
                <li class="messages"></li>
            </ul>
            <!-- Enter message field -->
             <?php echo $session_time; ?><span id="sample"></span>
            <div class="message-entry">
                <input type="text" id="text-input-field" class="input-sm" name="message-entry" /> 
                <div class="send-group">
                    <a href="#emoticons" data-option="emotions" class="attachEmotions" data-toggle="modal"></a>
                    <input type="submit" name="send-message" id="sendMessage" class="btn btn-primary" value="Send" />
                </div>
            </div>
            
            <!-- Emoticons Modal -->
            <div id="emoticons" class="modal hide fade">
                <div class="modal-header"><h4>Emotions</h4></div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <a href="#" class="btn" data-dismiss="modal">Close</a>
                </div>
            </div>
            
            <!-- // jChat -->
                     
        </div>
        
    </div>
    <!-- // END BOX -->
     
                  
</body> 
   
   <script>
   		$().Chat();
   </script>
   
</html>