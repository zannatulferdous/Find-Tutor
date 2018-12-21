<?php

function isLoginSessionExpired() {
    
	$login_session_duration = 60*3; 
	$current_time = time(); 
	if(isset($_SESSION['last_activity']) and isset($_SESSION["user_no"])){  
		if(((time() - $_SESSION['last_activity']) > $login_session_duration)){ 
			return true; 
		} 
	}
	return false;
}
?>

