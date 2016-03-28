<?php
require_once("../connect_ new.php");
$objConn = mysqli_connect($host,$user,$pass,$database);
			mysqli_set_charset($objConn,"utf8");
@$subIDFromAl = $_GET["hdfID"];


?>
<?php /*UPDATE SUB2NAME*/
	@$main_NewName = $_GET['txtNemName'];
	
	echo $subIDFromAl;
	if(isset($main_NewName))
	{ 

		$sqlReSub2Name = "UPDATE main_folder SET name = '$main_NewName' WHERE id = $subIDFromAl";
		$qryReSub2Name = mysqli_query($objConn,$sqlReSub2Name);
		
		header( "location: ../list_file.php" );
 		exit(0);
		
	}
	
?>
<?php mysqli_close($objConn); ?>