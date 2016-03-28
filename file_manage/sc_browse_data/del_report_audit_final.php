<?php
 include_once('../inc/config.php');
 include_once('../inc/connect.php');
/*GET*/
@$coment = $_GET['txtComment'];
@$id = $_GET['hdfID'];
@$date2 = $_GET['date2'];  //วันนท่ทำงาน  
@$txtEmId = $_GET['txtEmId2']; //รหัสพนักงาน
@$txtComId = $_GET['txtComId2']; //รหัสบริษัท
@$txtYearTax = $_GET['txtYearTax'];
@$txtMonthAcc = $_GET['txtMonthAcc'];
@$hdfDoc = $_GET['hdfDoc'];
/*.GET*/

    $sqlComment = "DELETE FROM audit_final WHERE audit_final_id = $id;";
	$sqlquery =  $conn->query($sqlComment);
	unlink($hdfDoc);
    header( "location: browse_audit_final.php?datepicker-th7=$date2&txtEmId=$txtEmId&txtComId=$txtComId&txtYearAudit=$txtYearTax&selMonthTax=$txtMonthAcc" );

$conn->close();
?>