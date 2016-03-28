<?php
include_once('inc/config.php');

	$name = $_POST['txtName'];
	$active = $_POST['list1'];
	$tax = $_POST['txtNumtax'];
	$taxo =  $_POST['txtNumtax'];
	$id = $_POST['txtID'];
	$trade = $_POST['txtNumtrade'];
	$addrth = $_POST['txtAddressth'];
	$addren = $_POST['txtAddressen'];
	$tel = $_POST['txtTel'];
	$fax = $_POST['txtFax'];
	$site = $_POST['txtSite'];
	$email = $_POST['txtEmail'];
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

		$path_img=NULL;
			/*รูปบริษัท*/
			if(isset($_FILES["txtPiccustomer"]["tmp_name"]))
			{
				if(move_uploaded_file($_FILES["txtPiccustomer"]["tmp_name"],"storage/$tax/$tax".$_FILES["txtPiccustomer"]["name"]))
				{
					//echo "<p>Upload File  Complete</p>";
					$path_img = "storage/$tax/$tax".$_FILES["txtPiccustomer"]["name"];
					//echo $path_img; 
				}
			}

			if($path_img=="")
			{
				$sql = ("UPDATE customer SET customer_company='$name', customer_status='$active', customer_tax_id='$tax', 
					customer_trade_id='$trade', customer_addr_th='$addrth', customer_addr_en='$addren', customer_tel='$tel', 
					customer_fax='$fax', customer_web='$site', customer_email='$email', customer_function='$function', customer_contact='$contact', 
					customer_contact_tel='$contact_tel', customer_contact_email='$contact_email', customer_latitude='$la', customer_longitude='$lo', customer_note='$note' WHERE customer_id=$id");
				$result = $conn->query($sql);
															
				if($result==TRUE)
				{
					array_push($messages, "อัพเดตข้อมูลลูกค้า $name เสร็จสิ้น");
				}
				else
				{
					die("<script>
						alert('ผิดพลาด! : อัพเดตข้อมูลผิดพลาด');
						history.back();
						</script>");
				}
			}
			else
			{
				$sql = ("UPDATE customer SET customer_company='$name', customer_status='$active', customer_tax_id='$tax', 
					customer_trade_id='$trade', customer_addr_th='$addrth', customer_addr_en='$addren', customer_tel='$tel', 
					customer_fax='$fax', customer_web='$site', customer_email='$email', customer_function='$function', customer_contact='$contact', 
					customer_contact_tel='$contact_tel', customer_contact_email='$contact_email', customer_latitude='$la', customer_longitude='$lo', customer_img='$path_img', customer_note='$note' WHERE customer_tax_id=$tax");
				$result = $conn->query($sql);
															
				if($result==TRUE)
				{
					array_push($messages, "อัพเดตข้อมูลลูกค้า $name เสร็จสิ้น");
				}
				else
				{
					die("<script>
						alert('ผิดพลาด! : อัพเดตข้อมูลผิดพลาด');
						history.back();
						</script>");
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