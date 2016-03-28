<?php
require_once("../connect_ new.php");
$objConn = mysqli_connect($host,$user,$pass,$database);
			mysqli_set_charset($objConn,"utf8");
@$subID = $_GET["SubIDal"];


?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DELETE FILE SUB </title> <!--ลบแค่ file ใน sub-->
<link rel="stylesheet" href="../assets/bootstrap-3.3.1/css/bootstrap.min.css">
</head>
<body>

<?php
     

	$sqlSelFileSub = "SELECT * FROM file WHERE sub_id = $subID AND sub2_id = 0"; //command select sub form tb file
	$querySelFileSub = mysqli_query($objConn,$sqlSelFileSub); // query select sub form tb file
	
	$sqlDelSubFile = "DELETE FROM file WHERE sub_id = $subID AND sub2_id = 0";  //command delete file ใน sub2 นั้นๆ
	
	
	

	@$numRowSub = mysqli_num_rows($querySelFileSub);

	
	if(isset($subID))
	{
			/*--Unlink File---*/
			if($numRowSub>0)
			{
				while ($arrSelFileSub = mysqli_fetch_array($querySelFileSub))
				{
					$file = "../".$arrSelFileSub['path_file'];
					unlink($file);	
						
					/*	if (!unlink($file))
						  {
						  echo ("Error deleting $file");
						  }
						else
						  {
						  echo ("Deleted $file");
						  } */
				}
			}
			$quryDelSub = mysqli_query($objConn,$sqlDelSubFile);  // query delete file ใน sub นั้นๆ กระทำ ใน tb file
			
			?> <!--ิปด php บนสุด-->  
<!--HTML ใน if-->
<div class="container container-padding">
	<div class="panel panel-success">
			<div class="panel-heading">Messages</div><div class="panel-body">
				<p>Delete File Complete.</p>
				<hr/>
				<center><p class="footer"><a class="btn btn-default" href="../list_file.php">Back To Previous</a></center></p>
			</div>
	</div>
</div>
		



<!-- .HTML ใน if-->
	<?php }  /*ปิด if isset*/ 
	else
	{  ?>

<!--HTML ใน else-->
<div class="container container-padding">
	<div class="panel panel-success">
			<div class="panel-heading">Messages</div><div class="panel-body">
				<p>Cannot Delete File.</p>
				<hr/>
				<center><p class="footer"><a class="btn btn-default" href="../list_file.php">Back To Previous</a></center></p>
			</div>
	</div>
</div>	
		



<!-- .HTML ใน else-->


<?php } ?> <!--close tag php ก่อน else-->
 



<script src="../assets/jquery.min.js"></script>
<script src="../assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php mysqli_close($objConn); ?>
