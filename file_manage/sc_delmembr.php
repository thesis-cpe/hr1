<?php

 include_once('inc/config.php');
    // Create connection
    $conn = new mysqli(DB_IP, DB_USER, DB_PASS, DB_NAME);
    $conn->query("SET NAMES UTF8");
	echo $employee_id = $_GET['employee_id'];
	echo $customer = $_GET['customer'];
	echo $coast_work_id = $_GET['id'];
	echo $cusnew = $_GET['cusnew'];

	$sql = "DELETE FROM coast_work WHERE coast_work_id ='$coast_work_id'";
	$sqlquery =  $conn->query($sql);
  // echo $sql = "DELETE FROM message WHERE id = '$hdfIdMsn'";
	
	//$sqlquery =  $conn->query($sql);
	/*if($sqlquery)
	{
		<script>
			alert("sent complete");
		</script>	
		header( "location: ../employeedata.php" );
		
	}else
	{
		<script>
			alert("cannot sent");
		</script>
		header( "location: ../employeedata.php" );
		 
	} */
	
	header( "location: ed_work.php?cusnew=$cusnew" );
	











$conn->close();
?>