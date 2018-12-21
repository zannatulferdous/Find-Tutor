<?php
session_start();
// unset($_SESSION["user_no"]);
// unset($_SESSION["user_name"]);
if (isset($_SESSION['user_name']))
{
    unset($_SESSION['user_name']);
}
// session_destroy();
$url = "loginadmin.php";
// if(isset($_GET["session_expired"]))
// {	
// $url .= "?session_expired=" . $_GET["session_expired"];
// }
header("Location:$url");
?>


