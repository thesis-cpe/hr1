<?php
@session_start();
	include_once('inc/config.php');
    include_once('inc/connect.php');

	$datesave = $_POST['DateBox'];
	$datereceive = $_POST['txtReceive'];
	$bill = $_POST['txtBill'];
	$money = $_POST['txtMoney'];
	@$detail = $_POST['txtDetail'];
	$customer = $_POST['txtCustomer'];
	$tax = $_POST['txtTax'];
	$employee  = $_SESSION['login'];

	/*echo $datesave."<br>";
	echo $datereceive."<br>";
	echo $bill."<br>";
	echo $money."<br>";
	echo $detail."<br>";
	echo $customer."<br>";
	echo $tax."<br>";
	echo $employee."<br>";*/

	if(isset($_FILES["fileoffice"]["tmp_name"]))
	{
		if(move_uploaded_file($_FILES["fileoffice"]["tmp_name"],"storage/$tax/$customer".$_FILES["fileoffice"]["name"]))
		{
			//echo "<p>Upload File  Complete</p>";
			$path_img = "storage/$tax/$customer".$_FILES["fileoffice"]["name"];
			//echo $path_img; 
		}
	}
	$path_store = "storage/$tax";
	//echo $path_store."<br>";
	//echo $path_img."<br>";

	$sql = "INSERT INTO payment (payment_save, payment_revenue, payment_bill, payment_coast, payment_detail, payment_path, fk_employee, fk_n_customer) 
	VALUES ('$datesave', '$datereceive', '$bill', '$money', '$detail', '$path_img', '$employee', '$customer')";
	$result = $conn->query($sql);

	if ($result==true)
	{
		echo ('<link type="text/css" rel="stylesheet" href="inc/bootstrap/css/bootstrap.css">');
		echo ('<script type="text/javascript" src="inc/bootstrap/js/bootstrap.js"></script>');
		echo ('<div class="alert alert-success" role="alert">กรุณารอสักครู่......</div>');
		header("refresh: 2; url=workadmin.php");
	}
	else
	{
		die("<script>
			alert('ผิดพลาด! : กรุณาลองใหม่อีกครั้ง');
			history.back();
			</script>");
	}
?>