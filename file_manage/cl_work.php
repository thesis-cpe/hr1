<?php
	@session_start();
	include_once('inc/config.php');
	include_once('inc/connect.php');

	$cus_id = $_GET['cusnew_id'];
	$cl_work = $_GET['cl'];

	if($cl_work==0)
	{
		$sql = ("UPDATE customer_gen SET check_close='0' WHERE n_customer_id=$cus_id");
		$result = $conn->query($sql);
		if($result==TRUE)
		{
			die("<script>
			alert('เสร็จสิ้น! : เปิดโครงการเสร็จสิ้น');
			history.back();
			</script>");
		}
		else
		{
			die("<script>
			alert('ผิดพลาด! : เปิดโครงการผิดพลาด');
			history.back();
			</script>");
		}
	}
	else
	{
		$sql = ("UPDATE customer_gen SET check_close='1' WHERE n_customer_id=$cus_id");
		$result = $conn->query($sql);
		if($result==TRUE)
		{
			die("<script>
			alert('เสร็จสิ้น! : ปิดโครงการเสร็จสิ้น');
			history.back();
			</script>");
		}
		else
		{
			die("<script>
			alert('ผิดพลาด! : ปิดโครงการผิดพลาด');
			history.back();
			</script>");
		}
	}

	$conn->close();
	header("Location: workdata.php");
?>