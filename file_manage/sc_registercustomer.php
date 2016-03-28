<?php
include_once('inc/config.php');

	$name = $_POST['txtName'];
	$active = $_POST['list1'];
	$tax = $_POST['txtNumtex']; 
	$trade = $_POST['txtNumtrade'];
	$addrth = $_POST['txtAddressth'];
	$addren = $_POST['txtAddressen'];
	$tel = $_POST['txtTel'];
	$fax = $_POST['txtFax'];
	$site = $_POST['txtSite'];
	$email = $_POST['txtEmail'];
	$authority = $_POST['txtPerson'];
	$numofauthority = sizeof($authority);
	$authority_status = $_POST['list2'];
	$numofauthority_status = sizeof($authority_status);
	$function = $_POST['txtFunction'];
	$contact = $_POST['txtCommu'];
	$contact_tel = $_POST['txtTelcommu'];
	$contact_email = $_POST['txtEmailcommu'];
	$note = $_POST['txtNote'];
	$la = @$_POST['lat_value'];
	$lo = @$_POST['lon_value'];
	//$latitude = $_POST['txtLatitude'];
	//$longitude = $_POST['txtLongitude'];
	//$picus = $_POST['txtPiccustomer'];
	
	$errors = array();
	$messages = array();

	include_once('inc/connect.php');
	
		$sql = ("SELECT COUNT(*) AS COUNT_NAME FROM customer WHERE customer_company = '$name'");
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
														
		if($row['COUNT_NAME'] > 0)
		{
			die("<script>
				alert('ผิดพลาด! : บริษัท $name ได้ลงทะเบียนเรียบร้อยแล้ว');
				history.back();
			 	</script>");
		}
		else
		{
			$path_img=NULL;
			/*make directory customer*/
				mkdir("storage/$tax");
			/*.make directory customer*/
			/*picture customer*/
			if(isset($_FILES["txtPiccustomer"]["tmp_name"]))
			{
				if(move_uploaded_file($_FILES["txtPiccustomer"]["tmp_name"],"storage/$tax/$tax".$_FILES["txtPiccustomer"]["name"]))
				{
					//echo "<p>Upload File  Complete</p>";
					$path_img = "storage/$tax/$tax".$_FILES["txtPiccustomer"]["name"];
					//echo $path_img; 
				}
			}
			$path_store = "storage/$tax";

			if($path_img=="")
			{
				$sql = ("INSERT INTO customer(customer_company, customer_status, customer_tax_id, customer_trade_id, customer_addr_th,
					customer_addr_en, customer_tel, customer_fax, customer_web, customer_email, customer_function, customer_contact, customer_contact_tel, customer_contact_email, customer_latitude, customer_longitude, path_store, customer_note) 
					VALUES('$name', '$active', '$tax', '$trade', '$addrth', '$addren', '$tel', '$fax', '$site', '$email', '$function', '$contact', '$contact_tel', '$contact_email', '$la', '$lo', '$path_store', '$note')");
				$result = $conn->query($sql);
				
				if($result==TRUE)
				{
					$i=0;
					do
					{
						$sqli="INSERT INTO signatory_customer (signatory_name, signatory_status, customer_tax_id) VALUES ('$authority[$i]', '$authority_status[$i]', '$tax')";
						$resulti = $conn->query($sqli);

						$i++;
					}while ( $i < $numofauthority);

					array_push($messages, "ลงทะเบียน $name เสร็จสิ้น");
				}
				else
				{
					die("<script>
					alert('ผิดพลาด! : บันทึกข้อมูลผิดพลาด');
					history.back();
				 	</script>");
				}
			}
			else
			{

				$sql = ("INSERT INTO customer(customer_company, customer_status, customer_tax_id, customer_trade_id, customer_addr_th,
					customer_addr_en, customer_tel, customer_fax, customer_web, customer_email, customer_function, customer_contact, customer_contact_tel, customer_contact_email, customer_latitude, customer_longitude, customer_img, path_store, customer_note) 
					VALUES('$name', '$active', '$tax', '$trade', '$addrth', '$addren', '$tel', '$fax', '$site', '$email', '$function', '$contact', '$contact_tel', '$contact_email', '$la', '$lo', '$path_img', '$path_store', '$note')");
				$result = $conn->query($sql);
				
				if($result==TRUE)
				{
					$i=0;
					do
					{
						$sqli="INSERT INTO signatory_customer (signatory_name, signatory_status, customer_tax_id) VALUES ('$authority[$i]', '$authority_status[$i]', '$tax')";
						$resulti = $conn->query($sqli);

						$i++;
					}while ( $i < $numofauthority);

					array_push($messages, "ลงทะเบียน $name เสร็จสิ้น");
				}
				else
				{
					die("<script>
					alert('ผิดพลาด! : บันทึกข้อมูลผิดพลาด');
					history.back();
				 	</script>");
				}
			}
			
			
		}
		$conn->close();

?>

<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Loading bootstrap css-->
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700">
    <link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Oswald:400,700,300">
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/all.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/pace.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
</head>

<body>
<div class="container container-padding">
	<?php
			if(sizeof($errors) > 0)
			{
				echo('<div class="panel panel-red">');
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
				echo('<a class="btn btn-red" href="javascript: history.back()">ย้อนกลับ</a>');
				echo ('&nbsp;&nbsp;');
        		echo('<a class="btn btn-green" href="indexv2.php">หน้าหลัก</a>');
        		echo('</center>');
    			echo('</p>');
				
				echo('</div>');
				echo('</div>');
			}
			else
			{
				echo('<div class="panel panel-yellow">');
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
				echo('<a class="btn btn-blue" href="customerdata.php">เพิ่มรายการใหม่</a>');
				echo ('&nbsp;&nbsp;');
        		echo('<a class="btn btn-pink" href="indexv2.php">หน้าหลัก</a>');
        		echo('</center>');
    			echo('</p>');
				
				echo('</div>');
				echo('</div>');
			}
			
		?>
</div>
<script src="script/jquery-1.10.2.min.js"></script>
<script src="script/jquery-migrate-1.2.1.min.js"></script>
<script src="script/jquery-ui.js"></script>
<!--loading bootstrap js-->
<script src="script/bootstrap.min.js"></script>
<script src="script/bootstrap-hover-dropdown.js"></script>
<script src="script/html5shiv.js"></script>
<script src="script/respond.min.js"></script>
<script src="script/jquery.metisMenu.js"></script>
<script src="script/jquery.slimscroll.js"></script>
<script src="script/jquery.cookie.js"></script>
<script src="script/icheck.min.js"></script>
<script src="script/custom.min.js"></script>
<script src="script/jquery.news-ticker.js"></script>
<script src="script/jquery.menu.js"></script>
<script src="script/pace.min.js"></script>
<script src="script/holder.js"></script>
<script src="script/responsive-tabs.js"></script>
<!--LOADING SCRIPTS FOR PAGE--><!--CORE JAVASCRIPT-->
<script src="script/main.js"></script>
</body>
</html>