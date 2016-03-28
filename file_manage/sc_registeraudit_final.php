<?php
include_once('inc/config.php');

	//บน
	$datein = $_POST['txtDatein'];
	$employee = $_POST['txtEm'];
	$cusgen = $_POST['txtCusgen'];
	$year = $_POST['txtYear'];
	$month = $_POST['txtMonth'];

	//ล่าง
	@$data_chbf = $_POST['chbf'];
	$data_hidf = $_POST['hidf'];
	//$file = $_POST['filIn'];
	
	$errors = array();
	$messages = array();

	include_once('inc/connect.php');

	if(count($data_chbf)>0)
	{
		$sqll = ("SELECT * FROM customer_gen WHERE n_customer_id=$cusgen");
		$resultl = $conn->query($sqll);
		$rowl = $resultl->fetch_assoc();
		//echo $rowl['fk_customer_tax_id'];

		if(isset($_FILES["filIn"]))
		{
			$name_arrray = $_FILES["filIn"]['name'];
			$thm_name_arrray = $_FILES["filIn"]['tmp_name'];
						
			foreach ($data_chbf as $key => $value) 
			{  	/*แบงค์เพิ่ม*/
					$date = date("d-m-Y-H-i-s");
					$random = rand();
				/*.แบงค์เพิ่ม*/
				
				//if(move_uploaded_file($thm_name_arrray[$value],"storage/$rowl[fk_customer_tax_id]/$cusgen".$name_arrray[$value]))
				if(move_uploaded_file($thm_name_arrray[$value],"storage/$rowl[fk_customer_tax_id]/audit_final-$date-$random-$cusgen".$name_arrray[$value]))
				{	
					$pathtxtPath[$value]  = "storage/$rowl[fk_customer_tax_id]/audit_final-$date-$random-$cusgen".$name_arrray[$value];
					//$pathtxtPath[$value]  = "storage/$rowl[fk_customer_tax_id]/$cusgen".$name_arrray[$value];
					//echo $pathtxtPath;
					//echo "<p>Upload filIn Complete</p>";
					$sqli = ("INSERT INTO audit_final (audit_final_imp_dat, audit_final_imp_who, audit_final_year, audit_final_month, audit_final_name, audit_final_path, fk_n_customer_id) VALUES ('$datein', '$employee', '$year', '$month', '$data_hidf[$value]', '$pathtxtPath[$value]', '$cusgen')");
					$resulti = $conn->query($sqli);
									
				}
				else
				{
					die("<script>
						alert('ผิดพลาด! : อัพโหลดไฟล์ผิดพลาด.');
						history.back();
					 	</script>");
				}
			}
						
				if($resulti==TRUE)
				{
					array_push($messages, "บันทึกข้อมูลการรายงาน การจัดทำบัญชีหลังตรวจสอบแล้วเสร็จประจำปี รหัสงาน : $cusgen เสร็จสิ้น");
				}
				else
				{
					die("<script>
						alert('ผิดพลาด! : บันทึกข้อมูลผิดพลาด');
						history.back();
						</script>");
				}
		}	
	}else
	{
		array_push($messages, "บันทึกข้อมูลการรายงาน การจัดทำบัญชีหลังตรวจสอบแล้วเสร็จประจำปี รหัสงาน : $cusgen เสร็จสิ้น");
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
				echo('<a class="btn btn-blue" href="audit_final.php">เพิ่มรายการใหม่</a>');
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