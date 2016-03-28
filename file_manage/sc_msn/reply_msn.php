<?php

 include_once('../inc/config.php');
 include_once('../inc/connect.php');

	$txtTitle = $_POST['txtTitle'];
	$taText = $_POST['taText'];
	$hdfSender = $_POST['hdfSender'];
	$hdfRecive =$_POST['hdfRecive'];
	

    $sqlMsn = "INSERT INTO message(title, sender, receiver, msn ) VALUES ('$txtTitle', '$hdfSender', '$hdfRecive', '$taText')";
	//echo  $sqlMsn;
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