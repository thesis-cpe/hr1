<?php
require_once("../connect_ new.php");
$objConn = mysqli_connect($host,$user,$pass,$database);
			mysqli_set_charset($objConn,"utf8");
@$subIDFromAl = $_GET["Sub2ID"];


?>

<?php
	@$sqlSub2Name ="SELECT * FROM sub_lv2 WHERE sub2_id = $subIDFromAl";
	@$qrySub2Name = mysqli_query($objConn, $sqlSub2Name);
	while ($arrSub2Name = mysqli_fetch_array($qrySub2Name))
	{
		@$sub2Name = $arrSub2Name['sub2_name'];
	}
?>

<html>
<head>
<title>DELETE FILE SUB ALERT!</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="../assets/bootstrap-3.3.1/css/bootstrap.min.css">
</head>
<body>

 
<!--HTML ใน if-->
<div class="container container-padding">
	<div class="panel panel-success">
			<div class="panel-heading">Messages</div><div class="panel-body">
			<form action="sc_update_sub2Name.php" method="GET" name="formRenameSub2">
				<h5>เปลี่ยนชื่อหัวย่อย</h5>
				<ul>
				  <li>กรอกชื่อใหม่ลงกล่องข้อความ</li>
				  <li>กดปุ่ม เปลี่ยนชื่อ</li>
				</ul>

				<hr/>
					<div class="row">
				        <div class="col-md-1">ชื่อเดิม</div>
				        <div class="col-md-9"><?php echo $sub2Name ;?></div>
				    </div>

				    <div class="row">
				       <br><div class="col-md-1">ชื่อใหม่</div>
				        <div class="col-md-7">
				        	<input class="form form-control" type="text" name="txtNemName"/>
				        	<input type="hidden" name="hdfSub2ID" value="<?php echo $subIDFromAl ?>"/>
				        </div>
				    </div>

				<hr/>

				<p class="footer">
					<center><ul class="list-inline">
								  <li><a class="btn btn-default" href="../list_file.php">กลับไปยังก่อนหน้า</a></li>
								  <li>
								  	<button type="submit" class="btn btn-success">เปลี่ยนชื่อ</button>
								  </li>
								  
							</ul>
							</form>
					</center>
				</p>
			</div>
	</div>
</div>
<script src="../assets/jquery.min.js"></script>
<script src="../assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_close($objConn) ?>

