<?php
	/*include_once('inc/config.php');
	include_once('inc/connect.php');

	$p = trim($_GET['term']);  //ให้ใช้คีย์เป็นคำว่า 'term' เท่านั้น
	if(empty($p)) {
		exit;
	}
	$sql = "SELECT customer_company AS name FROM customer 
				WHERE customer_company LIKE '%$p%'";
	
	$result = $conn->query($sql);
	if($result->num_rows > 0) {
		//อ่านข้อมูลผลลัพธ์มาสร้างเป็นอาร์เรย์ของ PHP
		$a = array();
		while($data = $result->fetch_array()) {
			array_push($a, $data[0]);
		}
		//แปลงอาร์เรย์ของ PHP เป็น JSON แล้วส่งกลับ
		echo json_encode($a); 
	}	
	$conn->close();*/
?>

<?php
	$p = trim($_GET['term']);  //ให้ใช้คีย์เป็นคำว่า 'term' เท่านั้น
	if(empty($p)) {
		exit;
	}
	$link = mysqli_connect("localhost", "root", "root", "audit");
	$sql = "SELECT * FROM customer 
				WHERE customer_tax_id LIKE '%$p%'";
	
	$result = mysqli_query($link, $sql);
	if(mysqli_num_rows($result) > 0) {
		//อ่านข้อมูลผลลัพธ์มาสร้างเป็นอาร์เรย์ของ PHP
		$a = array();
		while($data = mysqli_fetch_array($result)) {
			array_push($a, $data[3]);
		}
		//แปลงอาร์เรย์ของ PHP เป็น JSON แล้วส่งกลับ
		echo json_encode($a); 
	}	
	mysqli_close($link);
?>