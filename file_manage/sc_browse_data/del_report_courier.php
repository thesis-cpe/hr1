<?php
 include_once('../inc/config.php');
 include_once('../inc/connect.php');
/*GET*/
$hdfID = $_GET['hdfID'];
$hdfComID= $_GET['hdfComID'];
$hdfEmID = $_GET['hdfEmID'];
$hdfDatepicker = $_GET['hdfDatepicker'];
$hdfDatepicker2 = $_GET['hdfDatepicker2'];
$hdfPathDoc = $_GET['hdfPathDoc'];

/*.GET*/

    $sql= "DELETE FROM receip_return_doc WHERE receip_return_doc_id = $hdfID;";
    $sqlquery =  $conn->query($sql);
    unlink($hdfPathDoc);
	
	header( "location: browse_courier.php?txtComId=$hdfComID&txtEmId=$hdfEmID&datepicker=$hdfDatepicker&datepicker2=$hdfDatepicker2");

$conn->close();
?>