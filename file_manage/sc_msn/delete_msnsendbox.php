<?php

 include_once('../inc/config.php');
 include_once('../inc/connect.php');

	$hdfIdMsnsend = $_POST['hdfIdMsnsend'];
	
	$sqlMsn = "UPDATE message SET sendbox='1' WHERE id = '$hdfIdMsnsend'";
   // $sqlMsn = "DELETE FROM message WHERE id = '$hdfIdMsn'";
	
	$sqlquery =  $conn->query($sqlMsn);
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
	
	header( "location: ../profile.php" );
	











$conn->close();
?>