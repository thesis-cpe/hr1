<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>sc_upload_file</title>
<link rel="stylesheet" href="../assets/bootstrap-3.3.1/css/bootstrap.min.css">
</head>

<body>
<!--HTML BODY-->
<div class="container container-padding">
	<div class="panel panel-success">
			<div class="panel-heading">Messages</div><div class="panel-body">
				
<!--.HTML BODY-->
<?php
require_once("../connect_ new.php"); 
$objconnect = mysqli_connect($host,$user,$pass,$database);
mysqli_set_charset($objconnect ,"utf8");
/*รับค่าตัวแปรจาก sl main และ sub*/
$main_folder_id = $_POST['hdfMainID'];
$sub_folder_id = $_POST['hdfSubID'];
$hdfSub2ID = $_POST['hdfSub2ID'];
/*Thai PDF*/
if(isset($_FILES["fileThPDF"]["tmp_name"])){
	
		if(move_uploaded_file($_FILES["fileThPDF"]["tmp_name"],"../storage/".$_FILES["fileThPDF"]["name"]))
		{
			echo "<p>Upload File Thai PDF Complete</p>";
			
			$path_th_pdf = "storage/".$_FILES["fileThPDF"]["name"];
			$sql = "INSERT INTO file(file_id, path_file, type_file, main_id, sub_id, sub2_id) VALUES ('','$path_th_pdf',1,'$main_folder_id','$sub_folder_id','$hdfSub2ID')";
			$Query = mysqli_query($objconnect,$sql);
			
		}
}

/*Thai Offcice*/
if(isset($_FILES["fileThOff"]["tmp_name"])){
		if(move_uploaded_file($_FILES["fileThOff"]["tmp_name"],"../storage/".$_FILES["fileThOff"]["name"]))
		{
			echo "<p>Upload File Thai Office Complete</p>";
			
			$path_th_off = "storage/".$_FILES["fileThOff"]["name"];
			$sql_type2 = "INSERT INTO file(file_id, path_file, type_file, main_id, sub_id, sub2_id) VALUES ('','$path_th_off',2,'$main_folder_id','$sub_folder_id','$hdfSub2ID')";
			$Query_type2 = mysqli_query($objconnect,$sql_type2);
			
		
		}
}

/*English PDF*/
if(isset($_FILES["fileEnPDF"]["tmp_name"])){
		if(move_uploaded_file($_FILES["fileEnPDF"]["tmp_name"],"../storage/".$_FILES["fileEnPDF"]["name"]))
		{
			echo "<p>Upload File English PDF Complete</p>";
			
			$path_en_pdf = "storage/".$_FILES["fileEnPDF"]["name"];
			$sql_type3 = "INSERT INTO file(file_id, path_file, type_file, main_id, sub_id, sub2_id) VALUES ('','$path_en_pdf',3,'$main_folder_id','$sub_folder_id','$hdfSub2ID')";
			$Query_type3 = mysqli_query($objconnect,$sql_type3);
			
			
		}
}

/*English Office*/
if(isset($_FILES["fileEnOff"]["tmp_name"])){
		if(move_uploaded_file($_FILES["fileEnOff"]["tmp_name"],"../storage/".$_FILES["fileEnOff"]["name"]))
		{
			echo "<p>Upload File English Office Complete</p>";
			
			$path_en_off = "storage/".$_FILES["fileEnOff"]["name"];
			$sql_type4 = "INSERT INTO file (file_id, path_file, type_file, main_id, sub_id, sub2_id) VALUES ('','$path_en_off',4,'$main_folder_id','$sub_folder_id','$hdfSub2ID')";
			$Query_type4 = mysqli_query($objconnect,$sql_type4);
			
		}
}?>
<!--HTML BODY-->
  
				<hr/>
				<center><p class="footer"><a class="btn btn-default" href="../list_file.php">Go To List File</a></center></p>
			</div>
	</div>
</div>
<!--.HTML BODY-->
<?php mysqli_close($objconnect);
?>
<script src="../assets/jquery.min.js"></script>
<script src="../assets/bootstrap-3.3.1/js/bootstrap.min.js"></script>

</body>
</html>