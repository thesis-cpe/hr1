<?php
@session_start(); 
 include_once('../inc/config.php');
include_once('../inc/connect.php');
	
	$hdfFileId = $_POST['hdfFileId'];
	$hdfFilePath = $_POST['hdfFilePath'];
	$hdfCusId = $_POST['hdfCusId'];
	$hdfComName = $_POST['hdfComName'];
	if(unlink($hdfFilePath))
	{
		$sqlDelFile = "DELETE FROM file_customer WHERE id = '$hdfFileId'";
		$query = $conn->query($sqlDelFile);
		
	}else
	{
		echo "ไม่สามารถลบไฟล์ได้";
	}
	
	$conn->close();	
   
	//header( "location: ../customerdata.php" );
	header( "location: list_doc.php?cus_tax_id=$hdfCusId&company_name=$hdfComName" );
?>