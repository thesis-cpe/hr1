<?php
 include_once('../inc/config.php');
 include_once('../inc/connect.php');
/*GET*/
$hdfEmId = $_GET['hdfEmId'];
$hdfComId = $_GET['hdfComId'];
$hdfYearAudit = $_GET['hdfYearAudit'];
$hdfSelMonthTax = $_GET['hdfSelMonthTax'];
$hdfSelAuditWork = $_GET['hdfSelAuditWork'];
$id = $_GET['hdfId'];
$hdfPathDoc = $_GET['hdfPathDoc'];
/*.GET*/

    $sqlComment = "DELETE FROM month_tax WHERE mt_id = $id;";
	$sqlquery =  $conn->query($sqlComment);
	
	unlink($hdfPathDoc);

    header( "location: browse_tax_month.php?txtComId=$hdfComId&txtEmId=$hdfEmId&selMonthTax=$hdfSelMonthTax&txtYearAudit=$hdfYearAudit&selAuditWork=$hdfSelAuditWork");

$conn->close();
?>