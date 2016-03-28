<?php
require_once("connect_ new.php");
$objConn = mysqli_connect($host,$user,$pass,$database);

mysqli_set_charset($objConn,"utf8");
$selMainFolder = $_POST["selMainfolder"];
$subFolderN = $_POST["txtSFolder"];
$hdfMaxIdx = $_POST['hdfMaxIdx'];

$hdfMaxIdx++; 
echo $hdfMaxIdx;
$sql = "INSERT INTO sub_folder (sub_id, sub_name, main_id, idx_sub) VALUES ('', '$subFolderN', '$selMainFolder', '$hdfMaxIdx')";
$query = mysqli_query($objConn,$sql);

/*ตรวจสอบการ insert
$check_insert = "SELECT sub_name FROM sub_folder where sub_name ='$subFolderN'";
$result = mysqli_query($objConn,$check_insert);
$num_row = mysqli_num_rows($result);

if($num_row==1)
{
	print"<br>Create Subfolder Complete!";
} */

 header( "location: create_sub_folder.php" );
 exit(0);


//echo "$selMainFolder";
//echo "$subFolderN";

			

mysqli_close($objConn);			
?>