<?php
	@session_start();
	
	unset($_SESSION['user']);
	session_destroy();
	
	unset($_SESSION['status']);
	session_destroy();
	
	//setcookie('username', '', time() - 3600*24*7);
	
/* // remove all session variables
	session_unset(); 

// destroy the session 
	session_destroy(); */
	header("location:../index.html");
?>