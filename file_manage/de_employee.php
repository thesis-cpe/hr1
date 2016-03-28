
<?php
include_once('inc/config.php');
include_once('inc/connect.php');

	$sql = ("DELETE FROM employee WHERE employee_worker_id='".$_GET["emp_worker_id"]."'");
	$result = $conn->query($sql);

	if($result == TRUE)
	{ 
		header("Location: employeedata.php");
	}
	else
	{ 
		die("<script>
			alert('ผิดพลาด! : ลบข้อมูลพนักงานผิดพลาด');
			history.back();
			</script>");
	}
	
$conn->close();
?>
