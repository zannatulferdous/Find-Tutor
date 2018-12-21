<?php
 session_start();
include("functions.php");
if(isset($_SESSION["User_ID"])) {
	if(isLoginSessionExpired()) {
		header("Location:login.php");
	}
}
?>