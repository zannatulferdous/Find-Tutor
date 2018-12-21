
<?php
	
	$dbname = "find_tutor";
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$conn =new mysqli($hostname,$username,$password,$dbname);
 if($conn->connect_error){
	die("connection failed:".$conn->connect_error); 
 }
?>