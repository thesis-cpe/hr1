
<?php
include_once('inc/config.php');
include_once('inc/connect.php');
		
	$sql = ("DELETE FROM customer_gen WHERE n_customer_id = '".$_GET["cusnew"]."'");
	$result = $conn->query($sql);

	if($result==TRUE)
	{ 
		$sqli = ("DELETE FROM coast_work WHERE fk_n_customer_id='".$_GET["cusnew"]."'");
		$resulti = $conn->query($sqli);

		if($resulti==TRUE)
		{ 
			header("Location: workdata.php");
		}
		else
		{ 
			die("<script>
				alert('ผิดพลาด! : ลบทีมงานผิดพลาด');
				history.back();
				</script>");
		}
	}
	else
	{ 
		die("<script>
			alert('ผิดพลาด! : ลบรหัสงานผิดพลาด');
			history.back();
			</script>");
	}

$conn->close();
?>