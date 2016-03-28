<?php
require_once("../connect_ new.php");
$objConn = mysqli_connect($host,$user,$pass,$database);
			mysqli_set_charset($objConn,"utf8");
//$sub2ID = $_GET["Sub2ID"];

@$sub2ID = $_GET["Sub2IDal"];


?>

<html>
<head>
<title>DELETE FILE SUB2</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../assets/bootstrap-3.3.1/css/bootstrap.min.css">
</head>
<body>

<?php
     /*VAR*/
    /* $chFile = array();
     $idxChFile = 0;  */

	$sqlSelFileSub2 = "SELECT * FROM file WHERE sub2_id = $sub2ID"; //command select sub2 form tb file
	$querySelFileSub2 = mysqli_query($objConn,$sqlSelFileSub2); // query select sub2 form tb file
	
	$sqlDelSub2File = "DELETE FROM file WHERE sub2_id = $sub2ID";  //command delete file ใน sub2 นั้นๆ
	
	
	$delFileS2TbS2 = "DELETE FROM sub_lv2 WHERE sub2_id =  $sub2ID";
	


	@$numRowSub2 = mysqli_num_rows($querySelFileSub2);
	

	
	if(isset($sub2ID))
	{
			/*--Unlink File---*/
			if($numRowSub2>0)
			{
				while ($arrSelFileSub2 = mysqli_fetch_array($querySelFileSub2))
				{
					$file = "../".$arrSelFileSub2['path_file'];
					unlink($file);	
						
						/*if (!unlink($file))
						  {
						  echo ("Error deleting $file");
						  }
						else
						  {
						  echo ("Deleted $file");
						  } */
				}
			}
			$quryDelSub2 = mysqli_query($objConn,$sqlDelSub2File);  // query delete file ใน sub2 นั้นๆ กระทำ ใน tb file
			$qryDelS2TbS2 = mysqli_query($objConn,$delFileS2TbS2); // query delele sub2 name จาก tb sub2
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
