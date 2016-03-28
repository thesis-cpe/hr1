<?php
  @session_start(); 

include_once('inc/config.php');

$newcus = $_POST['txtNumcusnew'];
$oldcus = $_POST['txtNumcusold'];
$comment = $_POST['txtComment'];
$revenue = $_POST['txtRevenue'];
$charge = $_POST['txtCharge'];
$who = $_SESSION['login'];
	$yy = substr("$newcus",3);
	include_once('inc/connect.php');
	 
		$sql = ("SELECT COUNT(*) AS COUNT_ID FROM customer_gen WHERE fk_customer_tax_id LIKE '%$oldcus%' ");
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

			echo $aa = str_pad($row["COUNT_ID"], 4, "0", STR_PAD_LEFT);								
			$nn = "$yy"."$oldcus"."$aa";
			$sql = ("INSERT INTO customer_gen (n_customer_id, customer_gen_year, customer_gen_who, customer_gen_revenue, customer_gen_charge, customer_gen_comment, fk_customer_tax_id) 
				VALUES ('$nn','$newcus', '$who', '$revenue', '$charge', '$comment', '$oldcus')");
			$result = $conn->query($sql);

			if($result==TRUE)
			{
				header("Location:inwork.php?cusnew=$nn&cusold=$oldcus");
			}
			else
			{
				die("<script>
					alert('ผิดพลาด! : บันทึกข้อมูลผิดพลาด');
					history.back();
				 	</script>");
			}

		$conn->close();



?>