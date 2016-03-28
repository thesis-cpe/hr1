<?php

 include_once('../inc/config.php');
 include_once('../inc/connect.php');

	$hdfIdMsnin = $_POST['hdfIdMsnin'];
	
	$sqlMsn = "UPDATE message SET inbox='1' WHERE id = '$hdfIdMsnin'";
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