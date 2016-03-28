<?php
require_once("../connect_ new.php");
$objConn = mysqli_connect($host,$user,$pass,$database);
			mysqli_set_charset($objConn,"utf8");
@$IDFromAl = $_GET["idFromMain"];


?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DELETE FILE ALERT!</title>
<link rel="stylesheet" href="../assets/bootstrap-3.3.1/css/bootstrap.min.css">
</head>
<body>

 
<!--HTML ใน if-->
<div class="container container-padding">
	<div class="panel panel-success">
			<div class="panel-heading">Messages</div><div class="panel-body">
				<h5>เลือกรูปแบบการลบหัวข้อ</h5>
				<ul>
				  <li>ลบเพียงไฟล์แต่ไม่ลบหัวข้อ</li>
				  <li>ลบทั้งไฟล์และลบทั้งหัวข้อ (ถูกลบทั้ง  หมวด!)</li>
				</ul>

				<hr/>
				<p class="footer">
					<center><ul class="list-inline">
								  <li><a class="btn btn-default" href="../list_file.php">กลับไปยังก่อนหน้า</a></li>
								  <li>
								  		<a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='del_file_main_only_file.php?IDal=<?php echo $IDFromAl; ?>';}">
										<button type="button" class="btn btn-warning">ลบเพียงไฟล์</button>
								  </li>
								  <li>
										<a href="JavaScript:if(confirm('Confirm Delete?')==true){window.location='del_file_main.php?IDal=<?php echo $IDFromAl; ?>';}">
										<button type="button" class="btn btn-danger ">ลบทั้งไฟล์และลบทั้งหัวข้อ</button>
								  </li>
							</ul>
					</center>
				</p>
			</div>
	</div>
</div>
		




 



<script src="../assets/jquery.min.js"></script>
<script src="../assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php mysqli_close($objConn); ?>
