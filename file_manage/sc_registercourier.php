
<?php
include_once('inc/config.php');

	//$dateserver = $_POST['txtDatelist'];
	$datein = $_POST['txtDatein'];
	$datedoc = $_POST['txtDatedoc'];
	$nodoc = $_POST['txtNodoc'];
	$header = $_POST['list1'];
	$employee = $_POST['txtEm'];
	$cus = $_POST['txtCus'];
	$cusgen = $_POST['txtCusgen'];
	//$file = $_POST['fileIn'];

	$errors = array();
	$messages = array();

	include_once('inc/connect.php'); 

			if($cusgen==TRUE)
			{ 	$date = date("d-m-Y-H-i-s");
				$random = rand();
				if(isset($_FILES["fileIn"]["tmp_name"]))
				{
					
						//if(move_uploaded_file($_FILES["fileIn"]["tmp_name"],"storage/$cus/$cusgen".$_FILES["fileIn"]["name"]))
					  if(move_uploaded_file($_FILES["fileIn"]["tmp_name"],"storage/$cus/courier-$date-$random-$cusgen".$_FILES["fileIn"]["name"]))
						{
							//echo "<p>Upload File  Complete</p>";
							//$path_file = "storage/$cus/$cusgen".$_FILES["fileIn"]["name"];
							//echo $path_; 
							$path_file = "storage/$cus/courier-$date-$random-$cusgen".$_FILES["fileIn"]["name"];
						}
				}
				//echo $path_file;

				$sql = ("INSERT INTO receip_return_doc (receip_return_doc_imp_dat, receip_return_doc_dat, receip_return_doc_no, receip_return_doc_head, receip_return_doc_imp_who, receip_return_doc_path, customer_tax_id, fk_n_customer_id) VALUES ('$datein', '$datedoc', '$nodoc', '$header', '$employee', '$path_file', '$cus', '$cusgen')");
				$result = $conn->query($sql);

				if($result==TRUE)
				{
					array_push($messages, "บันทึกข้อมูล เอกสารเลขที่: $nodoc เสร็จสิ้น");
				}
				else
				{
					die("<script>
						alert('ผิดพลาด! : บันทึกข้อมูลผิดพลาด');
						history.back();
					 	</script>");
				}
			}

			elseif(empty($cusgen))
			{ 	$date = date("d-m-Y-H-i-s");
				$random = rand();
			
				if(isset($_FILES["fileIn"]["tmp_name"])){
					
						//if(move_uploaded_file($_FILES["fileIn"]["tmp_name"],"storage/$cus/".$_FILES["fileIn"]["name"]))
						if(move_uploaded_file($_FILES["fileIn"]["tmp_name"],"storage/courier-$date-$random-$cus/".$_FILES["fileIn"]["name"]))
						{
							$path_file = "storage/courier-$date-$random-$cus/".$_FILES["fileIn"]["name"];
							//echo "<p>Upload File  Complete</p>";
							//$path_file = "storage/$cus/".$_FILES["fileIn"]["name"];
							//echo $path_; 
						}
				}
				//echo $path_file;

				$sql = ("INSERT INTO receip_return_doc (receip_return_doc_imp_dat, receip_return_doc_dat, receip_return_doc_no, receip_return_doc_head, receip_return_doc_imp_who, receip_return_doc_path, customer_tax_id, fk_n_customer_id) VALUES ('$datein', '$datedoc', '$nodoc', '$header', '$employee', '$path_file', '$cus', NULL)");
				$result = $conn->query($sql);
			
				if($result == TRUE)
				{
					array_push($messages, "บันทึกข้อมูล เอกสารเลขที่: $nodoc เสร็จสิ้น");
				}
				else
				{
					die("<script>
						alert('ผิดพลาด! : บันทึกข้อมูลผิดพลาด');
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
				echo('<a class="btn btn-blue" href="courier.php">เพิ่มรายการใหม่</a>');
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
		
