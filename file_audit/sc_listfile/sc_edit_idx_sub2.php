<?php
require_once("../connect_ new.php");
$objConn = mysqli_connect($host,$user,$pass,$database);
			mysqli_set_charset($objConn,"utf8");
$hdfSubID = $_POST['hdfSubID'];
$txtIdx = $_POST['txtIdx'];
$hdfSub2ID = $_POST['hdfSub2ID'];
?>

<html>
<head>
<title>EDIT IDX SUB2</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/bootstrap-3.3.1/css/bootstrap.min.css">
</head>
<body>

<?php
     
	$sql = "UPDATE sub_lv2 SET idx_sub2 = '$txtIdx' WHERE sub_id = '$hdfSubID' AND sub2_id = '$hdfSub2ID'";
	//echo $sql;
	$query = mysqli_query($objConn, $sql);
	mysqli_close($objConn);
	header("Location: ../list_file.php");
	die(); 
?>
 



<script src="../assets/jquery.min.js"></script>
<script src="../assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
</body>
</html>


