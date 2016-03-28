<?php
// Create connection
	$conn = new mysqli(DB_IP, DB_USER, DB_PASS, DB_NAME);
	$conn->query("SET NAMES UTF8");
// Check connection
	if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}
?>