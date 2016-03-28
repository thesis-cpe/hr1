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

/*.GET*/

    $sqlComment = "UPDATE audit_rc_mth SET audit_rc_mth_descri = '$coment' WHERE audit_rc_m_id = $id";
    $sqlquery =  $conn->query($sqlComment);
	
	header( "location: browse_audit_month.php?datepicker-th7=$date2&txtEmId=$txtEmId&txtComId=$txtComId&txtYearAudit=$txtYearTax&selMonthTax=$txtMonthAcc" );

$conn->close();
?>