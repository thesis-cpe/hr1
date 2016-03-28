<?php
 include_once('../inc/config.php');
 include_once('../inc/connect.php');
/*GET*/
$coment = $_GET['txtComment'];
$id = $_GET['hdfID'];
@$date = $_GET['date2'];  //วันนท่ทำงาน  
@$txtEmId = $_GET['txtEmId2']; //รหัสพนักงาน
@$txtComId = $_GET['txtComId2']; //รหัสบริษัท
/*.GET*/

    $sqlComment = "UPDATE daily_record SET dr_descri = '$coment'  WHERE dr_id = $id";
    $sqlquery =  $conn->query($sqlComment);
	
	header( "location: browse_daily_work.php?datepicker-th1=$date&txtEmId=$txtEmId&txtComId=$txtComId" );

$conn->close();
?>