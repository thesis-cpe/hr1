<?php
  @session_start(); 
include_once('inc/config.php');
$who = $_SESSION['login'];
$cusnew = $_POST['txtNewcus'];
$cusold = $_POST['txtOldcus'];  //$tax_id

//ข้อมูลงาน
$datestart = $_POST['txtDatestart'];
$dateend = $_POST['txtDateend'];
$workstart = $_POST['txtWorkstart'];
$choice = $_POST['list3'];
$salary = $_POST['txtSalary'];
$timework = $_POST['txtTimework'];
$workclose = $_POST['txtClose'];
$checkclose = 0;

//เงื่อนไขการให้บริการ
$data_chb = $_POST['chb'];
$data_check = $_POST['chk'];
$data_con = $_POST['hid'];
$data_date = $_POST['txtDatefunction'];
$data_month = $_POST['txtMonthfunction'];

//เอกสารใบเสนอราคา
$datequo = $_POST['txtDatequo'];
$pricequo = $_POST['txtPricequo'];
$docquo = $_POST['txtDocquo'];

//เอกสารสัญญา
$datecon = $_POST['txtDatecon'];
$pricecon = $_POST['txtPricecon'];
$doccon = $_POST['txtDoccon'];

$errors = array();
$messages = array();

	include_once('inc/connect.php');

			$cchb = sizeof($data_chb);
			$ccon = sizeof($data_con);
			$cdate = sizeof($data_date);
			$cmonth = sizeof($data_month);
			if(count($data_chb)>0)
			{/*ติดตรงนี้*/
				foreach ($data_chb as $key => $value) 
				{
					$sql = ("INSERT INTO conditions (condition_check, condition_name, condition_dat, condition_month, n_customer_id) VALUES ('$data_check[$value]', '$data_con[$value]','$data_date[$value]','$data_month[$value]','$cusnew')");
					$result = $conn->query($sql);
					//echo $data_check[$value]."---".$data_con[$value]."---".$data_date[$value]."---".$data_month[$value]."<br>";
				}
				/*foreach ($data_chb as $key => $value) 
				{
					echo $data_check[$value]."---".$data_con[$value]."---".$data_date[$value]."---".$data_month[$value]."<br>";
				}*/
			}
			else
			{
				die("<script>
					alert('ผิดพลาด! : ข้อมูลเงื่อนไขการทำบัญชีผิดพลาด');
					history.back();
			 		</script>");
			}
			
			if($result==TRUE)
			{
				$sqlx = ("INSERT INTO work_details (work_start, work_end, work_receip_dat, work_coast_choice, work_coast_bath, work_period, fk_n_customer_id) VALUES ('$datestart', '$dateend', '$workstart', '$choice', '$salary', '$timework', '$cusnew')");
				$resultx = $conn->query($sqlx);
			}
			else
			{
				die("<script>
					alert('ผิดพลาด! : ข้อมูลเงื่อนไขการทำบัญชีผิดพลาด');
					history.back();
			 		</script>");
			}
				if($resultx==TRUE)
				{
					$sqli = ("INSERT INTO close_work (customer_gen, close_time, close_who) VALUES ('$cusnew', '$workclose', '$who')");
					$resulti = $conn->query($sqli);
				}
				else
				{
					die("<script>
						alert('ผิดพลาด! : ข้อมูลเปิดโครงการผิดพลาด');
						history.back();
				 		</script>");
				}

				$pathtxtPathcon=NULL;
				$pathtxtPathquo=NULL;
				if($resulti==TRUE)  
				{
					if(isset($_FILES["txtPathquo"]["tmp_name"]))
					{
						if(move_uploaded_file($_FILES["txtPathquo"]["tmp_name"],"storage/$cusold/$cusnew".$_FILES["txtPathquo"]["name"]))
						{
							$pathtxtPathquo  = "storage/$cusold/$cusnew".$_FILES["txtPathquo"]["name"];
							//echo $pathtxtPathquo;
							//echo "<p>Upload txtPathquo Complete</p>";
						}
					}

					if($pathtxtPathquo=="")
					{
						$sqly = ("UPDATE quotation SET quotation_date='$datequo', quotation_price='$pricequo', quotation_no='$docquo' WHERE fk_n_customer_id=$cusnew");
						$resulty = $conn->query($sqly);
					}
					else
					{
						$sqly = ("UPDATE quotation SET quotation_date='$datequo', quotation_price='$pricequo', quotation_no='$docquo', quotation_path='$pathtxtPathquo' WHERE fk_n_customer_id=$cusnew");
						$resulty = $conn->query($sqly);
					}
				}
				else
				{
					die("<script>
						alert('ผิดพลาด! : ข้อมูลเต้นทุนงานผิดพลาด');
						history.back();
			 			</script>");
				}
					if($resulty==TRUE) 
					{
						if(isset($_FILES["txtPathcon"]["tmp_name"]))
						{
							if(move_uploaded_file($_FILES["txtPathcon"]["tmp_name"],"storage/$cusold/$cusnew".$_FILES["txtPathcon"]["name"]))
							{
								
								$pathtxtPathcon  = "storage/$cusold/$cusnew".$_FILES["txtPathcon"]["name"];
								//echo $pathtxtPathcon;
								//echo "<p>Upload File txtPathcon Complete</p>";
							}
						}				
						
						if($pathtxtPathcon=="")
						{
							$sqlz = ("UPDATE convention SET convention_date='$datecon', convention_price='$pricecon', convention_no='$doccon' WHERE fk_n_customer_id=$cusnew");
							$resultz = $conn->query($sqlz);
						}	
						else
						{
							$sqlz = ("UPDATE convention SET convention_date='$datecon', convention_price='$pricecon', convention_no='$doccon', convention_path='$pathtxtPathcon' WHERE fk_n_customer_id=$cusnew");
							$resultz = $conn->query($sqlz);
						}
					}
					else
					{
						die("<script>
							alert('ผิดพลาด! : ข้อมูลใบเสนอราคาผิดพลาด');
							history.back();
			 				</script>");
					}
						if($resultz==TRUE)
						{
							array_push($messages, "รหัสงาน: $cusnew ลงทะเบียนเรียบร้อยแล้ว");
						}
						else
						{
							die("<script>
							alert('ผิดพลาด! : ข้อมูลสัญญาว่าจ้างผิดพลาด');
							history.back();
			 				</script>");
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
				echo('<a class="btn btn-blue" href="inwork_gen.php">เพิ่มรายการใหม่</a>');
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
