
<?php
include_once('inc/config.php');

	$nation = $_POST['txtIdentification'];
	$name = $_POST['txtName'];
	$lname = $_POST['txtSurname'];
	$id = $_POST['txtNumemployee'];
	$audit = $_POST['txtNumaccount'];
	$date = $_POST['txtDatepicker'];
	$salary = $_POST['txtMoney'];
	$coast = $_POST['txtCoast'];
	$workno = $_POST['txtDateno'];
	$condition = $_POST['txtCondition'];
	$note = $_POST['txtNote'];
	 
	$errors = array();
	$messages = array();
	
		include_once('inc/connect.php');
			
				$sql = ("UPDATE employee SET employee_name='$name', employee_lname='$lname', employee_worker_id='$id', 
					employee_audit_id='$audit', employee_register_date='$date', employee_salary='$salary', employee_coast='$coast', 
					employee_datework='$workno', employee_condition='$condition', employee_note='$note' 
					WHERE employee_nation_id='$nation'");
				$result = $conn->query($sql);

				if($result==TRUE)
				{
					array_push($messages, "อัพเดตข้อมูลพนักงาน: $name $lname เสร็จสิ้น");
				}
				else
				{
					die("<script>
						alert('ผิดพลาด! : อัพเดตข้อมูลผิดพลาด');
						history.back();
			 			</script>");
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
        		echo('<a class="btn btn-green" href="indexv2.php">หน้าหลัก</a>');
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
				echo('<a class="btn btn-blue" href="employeedata.php">เพิ่มรายการใหม่</a>');
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