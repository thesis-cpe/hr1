
<?php
include_once('inc/config.php');

	$name = $_POST['txtName'];
	$lname = $_POST['txtSurname'];
	$active = $_POST['list1'];
	$id = $_POST['txtNumemployee'];
	$pass = md5($_POST['txtNumemployee']);
	$audit = $_POST['txtNumaccount'];
	$nation = $_POST['txtIdentification'];
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
	$date = $_POST['txtDatepicker'];
	$salary = $_POST['txtMoney'];
	$coast = $_POST['txtCoast'];
	$workno = $_POST['txtDateno'];
	$condition = $_POST['txtCondition'];
	$note = $_POST['txtNote'];
	//$pic = $_POST['picture'];
	 
	$errors = array();
	$messages = array();	

	include_once('inc/connect.php');

	$sql = ("SELECT COUNT(*) AS countnum FROM employee WHERE employee_nation_id = '$nation'");
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if($row['countnum'] == 0)
	{
		$sql = ("INSERT INTO employee(employee_name, employee_lname, employee_worker_id, employee_audit_id, employee_nation_id,
		employee_addr, employee_addrp, employee_tel, employee_email, employee_contact_name, employee_contact_tel, employee_graduate, 
		employee_major, employee_grade, employee_academy, employee_register_date, employee_salary, employee_married_status, employee_coast, employee_datework, employee_condition, employee_note) 
		VALUES('$name', '$lname', '$id', '$audit', '$nation', '$addr', '$addrp', '$tel', '$email', '$ref', '$reft', '$gradute', '$major', '$grade', '$academy', '$date', '$salary', '$marri', '$coast', '$workno', '$condition', '$note')");
		$result = $conn->query($sql);

		if($result==TRUE)
		{
			$sqli = ("INSERT INTO user(email, password, user_status, fkey_worker_id) VALUES ('$id', '$pass', '$active', '$id')");
			$resulti = $conn->query($sqli);

			if ($resulti==TRUE) 
			{
				array_push($messages, "ลงทะเบียนพนักงาน : $name $lname เรียบร้อยแล้ว");
			} 
			else 
			{
				//echo "Error: " . $sql . "<br>" . $conn->error;
				die("<script>
				alert('ผิดพลาด! : ลงทะเบียนบัญชีผู้ใช้ผิดพลาด');
				history.back();
				</script>");
			}
		}
		else
		{
			die("<script>
			alert('ผิดพลาด! : ลงทะเบียนพนักงานผิดพลาด');
			history.back();
			</script>");
		}

	}
	else
	{
		//echo "Error: " . $sql . "<br>" . $conn->error;
		die("<script>
		alert('ผิดพลาด! : $nation ลงทะเบียนเรียบร้อยแล้ว');
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