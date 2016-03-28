<?php
 include_once('../inc/config.php');
 include_once('../inc/connect.php');
/*GET*/

$id = $_POST['hdfTrashId'];
@$date = $_POST['date2'];  //วันนท่ทำงาน  
@$txtEmId = $_POST['txtEmId2']; //รหัสพนักงาน
@$txtComId = $_POST['txtComId2'];
$hdfPathDoc = $_POST['hdfPathDoc']; //รหัสบริษัท
/*.GET*/

    $sql = "DELETE FROM daily_record WHERE dr_id = $id";
    $sqlquery =  $conn->query($sql);

    unlink($hdfPathDoc);
	
	header( "location: browse_daily_work.php?datepicker-th1=$date&txtEmId=$txtEmId&txtComId=$txtComId" );

$conn->close();
?>