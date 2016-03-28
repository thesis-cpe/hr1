
<?php
include_once('inc/config.php');
include_once('inc/connect.php');

	$sql = ("DELETE FROM customer_gen WHERE n_customer_id='".$_GET["cusnew_tax_id"]."'");
	$result = $conn->query($sql);
	
	if($result == TRUE)
	{
		header("Location: workdata.php");
	}
	else
	{
		die("<script>
			alert('ผิดพลาด! : ลบข้อมูลงานผิดพลาด');
			history.back();
			</script>");
	}					

$conn->close();
?>