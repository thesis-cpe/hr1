<?php
require_once("../connect_ new.php");
$objConn = mysqli_connect($host,$user,$pass,$database);
			mysqli_set_charset($objConn,"utf8");
@$subIDFromAl = $_GET["hdfSub2ID"];


?>
<?php /*UPDATE SUB2NAME*/
	@$sub_NewName = $_GET['txtNemName'];
	
	echo $subIDFromAl;
	if(isset($sub_NewName))
	{ 

		$sqlReSub2Name = "UPDATE sub_folder SET sub_name = '$sub_NewName' WHERE sub_id = $subIDFromAl";
		$qryReSub2Name = mysqli_query($objConn,$sqlReSub2Name);
		
		header( "location: ../list_file.php" );
 		exit(0);
		
	}
	
?>

<?php mysqli_close($objConn); ?>