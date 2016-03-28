<?php
@session_start(); 
 include_once('../inc/config.php');
include_once('../inc/connect.php');
	
	$hdfCustomerId = $_POST['hdfCustomerId'];
	$txtName = $_POST['txtName'];
	$employee = $_SESSION['login'];
	$date = date("d-m-Y-H-i-s");
	$random = rand();
   
   if(move_uploaded_file($_FILES["txtfile"]["tmp_name"],"../storage/$hdfCustomerId/doc-$date-$random".$_FILES["txtfile"]["name"]))
		{
			echo "<p>Upload File Complete</p>";
			
			$path = "storage/$hdfCustomerId/doc-$date-$random".$_FILES["txtfile"]["name"];
			
			
			$sqlUpFile = "INSERT INTO file_customer (name, path, upload_who, customer) VALUES ('$txtName', '$path', '$employee', '$hdfCustomerId')";
			$conn->query($sqlUpFile);
			
		}
	
	header( "location: ../customerdata.php" );

$conn->close();
?>