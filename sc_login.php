	<?php
	@session_start();
	include_once("file_manage/inc/config.php");

	// get log in information via post
	$email = $_POST["txtEmail"];
	$pass = md5($_POST["txtPassword"]);
	$errors = array();
	$messages = array();

	include_once("file_manage/inc/connect.php");

	$sql = ("SELECT * FROM user WHERE email = '$email' AND password = '$pass'");
	$result = $conn->query($sql);

	if ($result->num_rows > 0) //ตรวจสอบว่ามี email และ password ตรงกันหรือไม่
	{
		$row = $result->fetch_assoc();

		$_SESSION['user'] = rand(); //random ให้ค่า SESSION_ID ให้ไม่เหมือนกันในการเข้าใช้งานแต่ละครั้ง
		$_SESSION['login'] = $row['fkey_worker_id'];
		//echo ($_SESSION['login']);
		$user_session = session_id();

		if($row["user_status"] != 1)  //ตรวจสอบ email ที่ทำการเข้าระบบ ว่ามีสถานะอะไร
		{
			$_SESSION['status'] = "USER"; //เก็บสถานะไว้ใน SESSION['status']
			//setcookie('username', $email,time()+3600*24*7); //set cookie ไว้ในเครื่องฝั่ง client
		}
		else
		{
			$_SESSION['status'] = "ADMIN";
			//setcookie('username', $email,time()+3600*24*7);
		}
			array_push($messages, "ยินดีต้อนรับ : $email <br>  สิทธิเข้าใช้งาน : ".$_SESSION['status']." <br> รหัสพนักงาน : ".$_SESSION['login']." ");

			/*$sql = ("UPDATE user SET user_session_id = $user_session WHERE fkey_worker_id = ".$_SESSION["login"]." ");
			$result = $conn->query($sql);
			<br> SESSION_ID : $user_session <br>*/
	}
	else
	{
		die("<script>
		alert('ผิดพลาด! : ชื่อผู้ใช้งาน หรือ รหัสผ่านไม่ถูกต้อง');
		history.back();
		</script>");
	}

	$conn->close();
?>

<html>
<head><title>เข้าสู่ระบบ</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Loading bootstrap css-->
   <link type="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
	<div class="container container-padding">
<?php
	if(sizeof($errors) > 0)
	{
		echo('<div class="panel panel-danger">');
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
		echo('<a class="btn btn-red" href="index.php">ย้อนกลับ</a>');
		echo('</center>');
		echo('</p>');

		echo('</div>');
		echo('</div>');
	}
	else
	{
		echo('<div class="panel panel-success">');
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
		echo('<a class="btn btn-primary" href="file_manage/profile.php">ระบบควบคุมคุณภาพงานบัญชีและภาษี</a>'); //ส่วนกำหนดว่าให้ไปหน้าไหน
		echo ('&nbsp;&nbsp;');
		echo('<a class="btn btn-danger" href="file_audit/index.php">ระบบเอกสารงานบัญชี</a>'); //ส่วนกำหนดว่าให้ไปหน้าไหน
		echo('</center>');
		echo('</p>');
		echo('</div>');
		echo('</div>');
	}

?>
</div>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>