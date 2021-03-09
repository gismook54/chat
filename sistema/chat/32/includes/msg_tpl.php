<?php
	
	if(!defined('DATABASE')) {
		die('Direct access not permitted');
	}
	
	$msg_tpl = 
	'
	<li class="'.$class.'" id="'.$message_set_id.'">
		
		<div class="message-area">
			<span class="pointer"></span>
			<div class="info-row">
				<span class="user-name"><a href="#"><strong>'.$username.'</strong></a>:</span>
				<span class="delete" id="'.$message_set_id.'">x</span>
				<span class="time" id="'.$message_set_id.'">'.$chat->get_messages_time($message_set_id).'</span>
				<div class="clear"></div>
			</div>
			<p>
				'.$chat->get_messages($message_set_id).'
			</p>
		</div>
		<div class="clear"></div>
	</li>
	';

?>