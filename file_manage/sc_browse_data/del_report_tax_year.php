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
$hdfPath = $_GET['hdfPath'];
/*.GET*/

    $sqlComment = "DELETE FROM year_tax WHERE yt_id = $id;";
	$sqlquery =  $conn->query($sqlComment);

	unlink($hdfPath);
	
    header( "location: browse_tax_year.php?txtComId=$hdfComId&txtEmId=$hdfEmId&selMonthTax=$hdfSelMonthTax&txtYearAudit=$hdfYearAudit&selAuditWork=$hdfSelAuditWork");

$conn->close();
?>