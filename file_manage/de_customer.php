
<?php
include_once('inc/config.php');
include_once('inc/connect.php')

	$sql = ("DELETE FROM customer WHERE customer_tax_id = '".$_GET["cus_tax_id"]."'");
	$result = $conn->query($sql);

	if($result == TRUE)
	{ 
		rmdir("$_GET[cus_tax_id]");
		header("Location: customerdata.php");
	}
	else
	{ 
		die("<script>
			alert('ผิดพลาด! : ลบข้อมูลกิจการลูกค้าผิดพลาด');
			history.back();
			</script>");
	}

$conn->close();
?>