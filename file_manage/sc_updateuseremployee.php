<?php
	@session_start();
	include_once("inc/config.php");

	// get log in information via post
	$email = $_POST["txtUser"];
	$em = $_POST["txtNumem"];
	$pass = md5($_POST["txtPassword"]);
	$conpass = md5($_POST["txtConpassword"]);

	$errors = array();
	$messages = array();

	include_once('inc/connect.php');
		$sql = ("UPDATE user SET password='$pass' WHERE fkey_worker_id='$em'");
		$result = $conn->query($sql);

		if($result==TRUE)
		{ ?>
			<script>
			alert('เสร็จสิ้น! : แก้ไขรหัสผ่านเสร็จสิ้น');
			history.back();
			</script>
			<?php
			//echo $sql;
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
