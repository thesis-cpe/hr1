<?php
require_once("../connect_ new.php");
$objConn = mysqli_connect($host,$user,$pass,$database);
			mysqli_set_charset($objConn,"utf8");
@$subIDFromAl = $_GET["hdfSub2ID"];


?>
<?php /*UPDATE SUB2NAME*/
	@$sub2NewName = $_GET['txtNemName'];
	echo "$sub2NewName";
	echo $subIDFromAl;
	if(isset($sub2NewName))
	{ 

		$sqlReSub2Name = "UPDATE sub_lv2 SET sub2_name = '$sub2NewName' WHERE sub2_id = $subIDFromAl";
		$qryReSub2Name = mysqli_query($objConn,$sqlReSub2Name);
		
		header( "location: ../list_file.php" );
 		exit(0);
		
	}
	
?>

<?php mysqli_close($objConn); ?>