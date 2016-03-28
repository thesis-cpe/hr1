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
@$path = $_GET['hdfPath'];

/*.GET*/
	if(unlink($path)){
		$sqlComment = "DELETE FROM file_rc_mth WHERE file_rc_mth_id = $id";
		$sqlquery =  $conn->query($sqlComment);
	}
	else
	{
		echo "ไม่สามารถลบไฟล์ได้";
	}
    $conn->close(); 
	
	header( "location: browse_audit_month.php?datepicker-th7=$date2&txtEmId=$txtEmId&txtComId=$txtComId&txtYearAudit=$txtYearTax&selMonthTax=$txtMonthAcc" );












?>