<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>sc_upload_file</title>
<link rel="stylesheet" href="assets/bootstrap-3.3.1/css/bootstrap.min.css">
</head>

<body>
<?php
require_once("connect_ new.php");
$objConn = mysqli_connect($host,$user,$pass,$database);

mysqli_set_charset($objConn,"utf8");
$selSubfolder = $_POST['selSubfolder'];
$txtSub2 = $_POST['txtSub2'];



if(isset($txtSub2) && isset($selSubfolder))
 { 
 	/* เรีกยดูMAx IDX */
     
     $sqlMaxIdx = "SELECT MAX(idx_sub2) AS lastidx FROM sub_lv2 WHERE sub_id = '$selSubfolder'";
     
     $objQuery4 = mysqli_query($objConn,$sqlMaxIdx);
          while($arrMaxIdx = mysqli_fetch_array($objQuery4))
          {
            $maxIdx = $arrMaxIdx['lastidx'];
          }
          
          $maxIdx++;
          
      
	/*.เรีกยดูMAx IDX */
	
		$insert_sub2 = "INSERT INTO sub_lv2(sub2_id, sub2_name, sub_id, idx_sub2) VALUES ('','$txtSub2','$selSubfolder','$maxIdx')";
		
		$Query_sib2 = mysqli_query($objConn,$insert_sub2);
		$check_insert = "SELECT sub2_name FROM sub_lv2 where sub2_name ='$txtSub2'";
		$result = mysqli_query($objConn,$check_insert);
		$num_row = mysqli_num_rows($result);

			if($num_row==1)
			{ ?>  <!--.} บนสุด--> 
<!--HTML BODY-->
	<div class="container container-padding">
		<div class="panel panel-success">
			<div class="panel-heading">Messages</div>

			<div class="panel-body">
				<p>สร้างหัวข้อย่อยเรียบร้อย</p>
				<hr/>
				<center><p class="footer"><a class="btn btn-default" href="list_file.php">Go To List File</a></center></p>
			</div>
	</div>
</div>

<!--.HTML BODY-->
			<?php }
		
 } 
mysqli_close($objConn);			
?>
<script src="assets/jquery.min.js"></script>
<script src="assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
</body>
 
</html> 