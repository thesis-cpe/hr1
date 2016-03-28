<?php
require_once("../connect_ new.php");
$objConn = mysqli_connect($host,$user,$pass,$database);
			mysqli_set_charset($objConn,"utf8");
$hdfID = $_POST['hdfID'];
$txtIdx = $_POST['txtIdx'];

?>

<html>
<head>
<title>EDIT IDX</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/bootstrap-3.3.1/css/bootstrap.min.css">
</head>
<body>

<?php
     
	$sql = "UPDATE main_folder SET idx = '$txtIdx' WHERE id = '$hdfID'";
	$query = mysqli_query($objConn, $sql);
	mysqli_close($objConn);
	header("Location: ../list_file.php");
	die();
?>
 



<script src="../assets/jquery.min.js"></script>
<script src="../assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
</body>
</html>


