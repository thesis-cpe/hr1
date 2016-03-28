<?php
require_once("connect_ new.php");

$main_folder = $_POST['txtMFolder'];
$hdfMaxIdx = $_POST['hdfMaxIdx'];
$objConnect = mysqli_connect($host,$user,$pass,$database);
mysqli_set_charset($objConnect,"utf8");
/* ตรวจสอบความผิดพลาด */
if ($objConnect->connect_error) {
    die("Connection failed: " . $objConnect->connect_error);
	} 

/* insert  main name*/
$hdfMaxIdx++; //increment 
$sql = "INSERT INTO main_folder(id , name, idx) VALUES ('','$main_folder', '$hdfMaxIdx')";
$objQuery = mysqli_query($objConnect,$sql); 

 header( "location: create_main_folder.php" );
 exit(0);	
			mysqli_close($objConnect);
?>
