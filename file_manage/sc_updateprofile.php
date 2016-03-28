
<?php
include_once('inc/config.php');

	$name = $_POST['txtName'];
	$lname = $_POST['txtSurname'];
	$nation = $_POST['txtIdentification'];
	$id = $_POST['txtNumwork'];
	$marri = $_POST['list2'];
	$addr = $_POST['txtAddress'];
	$addrp = $_POST['txtAddresspersent'];
	$tel = $_POST['txtTel'];
	$email = $_POST['txtEmail'];
	$ref = $_POST['txtOther'];
	$reft = $_POST['txtTelother'];
	$gradute = $_POST['list3'];
	$major = $_POST['txtMajor'];
	$grade = $_POST['txtGrade'];
	$academy = $_POST['txtUniversity'];
	//$pic = $_POST['txtPicture'];
	 
	$errors = array();
	$messages = array();

	if(strlen($nation) < 13)
	{
		die("<script>
			alert('ผิดพลาด! : $nation ไม่ครบ 13 หลัก');
			history.back();
			 </script>");
	}
	else
	{	
		include_once('inc/connect.php');
		
		$path_pic_employee=NULL;
		$path_convention_employee = NULL;
			
			/*รูปประจำตัว*/
			if(isset($_FILES["txtPicture"]["tmp_name"]))
			{
				if(move_uploaded_file($_FILES["txtPicture"]["tmp_name"],"storage/1111/employee/$nation".$_FILES["txtPicture"]["name"]))
				{
					//echo "<p>Upload PICTURE COMLETE</p>";
					$path_pic_employee = "storage/1111/employee/$nation".$_FILES["txtPicture"]["name"];
				} 
				
			}
			
			/*ส่วนสัญญาจ้าง*/	
			if(isset($_FILES["fileConvention"]["tmp_name"]))
			{
				if(move_uploaded_file($_FILES["fileConvention"]["tmp_name"],"storage/1111/employee/$nation".$_FILES["fileConvention"]["name"]))
				{
					//echo "<p>Upload PICTURE COMLETE</p>";
					$path_convention_employee = "storage/1111/employee/$nation".$_FILES["fileConvention"]["name"];
				}
			}
		
			/*.ส่วนสัญญาจ้าง*/	
						
			if($path_pic_employee=="" || $path_convention_employee=="")
			{
				$sql = ("UPDATE employee SET employee_name='$name', employee_lname='$lname', employee_nation_id='$nation',
						employee_addr='$addr', employee_addrp='$addrp', employee_tel='$tel', employee_email='$email', employee_contact_name='$ref', 
						employee_contact_tel='$reft', employee_graduate='$gradute', employee_major='$major', employee_grade='$grade', 
						employee_academy='$academy', employee_married_status='$marri' WHERE employee_worker_id='$id' ");
								
				if ($conn->query($sql) == TRUE) 
				{
					array_push($messages, "อัพเดตข้อมูลเสร็จสิ้น");
				} 
				else 
				{
					die("<script>
						alert('ผิดพลาด! : อัพเดตข้อมูลผิดพลาด');
						history.back();
						 </script>");
				}
			}
			if($path_pic_employee!="")
			{
				$sql = ("UPDATE employee SET employee_name='$name', employee_lname='$lname', employee_nation_id='$nation',
						employee_addr='$addr', employee_addrp='$addrp', employee_tel='$tel', employee_email='$email', 
						employee_contact_name='$ref', employee_contact_tel='$reft', employee_graduate='$gradute', 
						employee_major='$major', employee_grade='$grade', employee_academy='$academy', employee_married_status='$marri', 
						employee_picture='$path_pic_employee' WHERE employee_worker_id='$id' ");
								
				if ($conn->query($sql) == TRUE) 
				{
					array_push($messages, "เปลี่ยนแปลงรูปประจำตัวเรียบร้อย");
				} 
				else 
				{
					die("<script>
						alert('ผิดพลาด! : อัพเดตข้อมูลผิดพลาด');
						history.back();
						 </script>");
				}
			}
			if($path_convention_employee!="")
			{
				$sql = ("UPDATE employee SET employee_name='$name', employee_lname='$lname', employee_nation_id='$nation',
						employee_addr='$addr', employee_addrp='$addrp', employee_tel='$tel', employee_email='$email', 
						employee_contact_name='$ref', employee_contact_tel='$reft', employee_graduate='$gradute', 
						employee_major='$major', employee_grade='$grade', employee_academy='$academy', employee_married_status='$marri', 
						employee_convention='$path_convention_employee' WHERE employee_worker_id='$id' ");
								
				if ($conn->query($sql) == TRUE) 
				{
					array_push($messages, "อัพโหลดสัญญาจ้างเรียบร้อย");
				} 
				else 
				{
					die("<script>
						alert('ผิดพลาด! : อัพเดตข้อมูลผิดพลาด');
						history.back();
						 </script>");
				}
			}
		
		
	}		
$conn->close();
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/pace.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
</head>

<body>
<div class="container container-padding">
	<?php
			if(sizeof($errors) > 0)
			{
				echo('<div class="panel panel-red">');
				echo('<div class="panel-heading">Messages</div>');
				echo('<div class="panel-body">');
				
				foreach($errors as $e)
				{
					echo("<p>");
					echo($e);
					echo("</p>");
				}
				
				echo('<hr />');
    			echo('<p class="footer">');
    			echo('<center>');
				echo('<a class="btn btn-red" href="javascript: history.back()">ย้อนกลับ</a>');
				echo ('&nbsp;&nbsp;');
        		echo('<a class="btn btn-green" href="profile.php">ข้อมูลส่วนตัว</a>');
        		echo('</center>');
    			echo('</p>');
				
				echo('</div>');
				echo('</div>');
			}
			else
			{
				echo('<div class="panel panel-yellow">');
				echo('<div class="panel-heading">Messages</div>');
				echo('<div class="panel-body">');
				
				foreach($messages as $msg)
				{
					echo("<p>");
					echo($msg);
					echo("</p>");
				}
				
				echo('<hr />');
    			echo('<p class="footer">');
    			echo('<center>');
				echo('<a class="btn btn-blue" href="profile.php">ข้อมูลส่วนตัว</a>');
				echo ('&nbsp;&nbsp;');
        		echo('<a class="btn btn-pink" href="indexv2.php">หน้าหลัก</a>');
        		echo('</center>');
    			echo('</p>');
				
				echo('</div>');
				echo('</div>');
			}
			
		?>
</div>
<script src="script/jquery-1.10.2.min.js"></script>
<script src="script/jquery-migrate-1.2.1.min.js"></script>
<script src="script/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="script/bootstrap.min.js"></script>
<script src="script/bootstrap-hover-dropdown.js"></script>
<script src="script/html5shiv.js"></script>
<script src="script/respond.min.js"></script>
<script src="script/jquery.metisMenu.js"></script>
<script src="script/jquery.slimscroll.js"></script>
<script src="script/jquery.cookie.js"></script>
<script src="script/icheck.min.js"></script>
<script src="script/custom.min.js"></script>
<script src="script/jquery.news-ticker.js"></script>
<script src="script/jquery.menu.js"></script>
<script src="script/pace.min.js"></script>
<script src="script/holder.js"></script>
<script src="script/responsive-tabs.js"></script>
<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="script/main.js"></script>
</body>
</html> 