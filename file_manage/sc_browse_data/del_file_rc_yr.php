<?php
 include_once('../inc/config.php');
 include_once('../inc/connect.php');
/*GET*/

@$id = $_GET['hdfFileId'];
@$date2 = $_GET['hdfDat'];  //วันนท่ทำงาน  
@$txtEmId = $_GET['hdfEmId']; //รหัสพนักงาน
@$txtComId = $_GET['hdfComId']; //รหัสบริษัท
@$txtYearTax = $_GET['hdfYearAudit'];
@$txtMonthAcc = $_GET['hdfMonthTax'];
@$hdfPath = $_GET['hdfPath'];
/*.GET*/

echo $hdfPath;

	if(unlink($hdfPath))
	{
		  $sqlComment = "DELETE FROM file_rc_year WHERE file_rc_yr_id = $id;";
		  $sqlquery =  $conn->query($sqlComment);
	}else
	{
		"ไม่สารถลบไฟล์ได้";
	} 
		$conn->close();
  
	header( "location: browse_audit_year.php?datepicker-th7=$date2&txtEmId=$txtEmId&txtComId=$txtComId&txtYearAudit=$txtYearTax&selMonthTax=$txtMonthAcc" );
?>