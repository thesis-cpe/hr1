
<?php
include_once('inc/config.php');

	$dateserver = $_POST['DateBox'];
	$datework = $_POST['txtDatework'];
	$employee = $_POST['txtEm'];
	$cusgen = $_POST['txtCus'];
	$hour = $_POST['txtHour'];
	$minute = $_POST['txtMinute'];
	$detail = $_POST['txtDetail'];
	$record = $_POST['txtRecord'];
	//$file = $_POST['fileDaily'];
	$prob = $_POST['txtProb'];

	$errors = array();
	$messages = array();

	$total=0;
	$total=(($hour*60)+$minute);

	include_once('inc/connect.php'); 
	/*แบงค์เพิ่ม*/
	$date = date("d-m-Y-H-i-s");
	$random = rand();
	/*.แบงค์เพิ่ม*/

		if(isset($_FILES["fileDaily"]["tmp_name"]))
		{
			$sqll = ("SELECT * FROM customer_gen WHERE n_customer_id=$cusgen");
			$resultl = $conn->query($sqll);
			$rowl = $resultl->fetch_assoc();
					
			//if(move_uploaded_file($_FILES["fileDaily"]["tmp_name"],"storage/$rowl[fk_customer_tax_id]/$cusgen".$_FILES["fileDaily"]["name"]))
			if(move_uploaded_file($_FILES["fileDaily"]["tmp_name"],"storage/$rowl[fk_customer_tax_id]/daily-$date-$random-$cusgen".$_FILES["fileDaily"]["name"]))
			{
				//echo "<p>Upload File  Complete</p>";
				//$path_file = "storage/$rowl[fk_customer_tax_id]/$cusgen".$_FILES["fileDaily"]["name"];
				$path_file = "storage/$rowl[fk_customer_tax_id]/daily-$date-$random-$cusgen".$_FILES["fileDaily"]["name"];
				//echo $path_; 
			}
		}
//echo $path_file;
		if(isset($path_file))
		{
			/*echo "$dateserver<br>";
			echo "$datework<br>";
			echo "$employee<br>";
			echo "$hour<br>";
			echo "$minute<br>";
			echo "$detail<br>";
			echo "$prob<br>";
			echo "$path_file<br>";
			echo "$cusgen<br>";
		    echo $path_file; */
			$sql = ("INSERT INTO daily_record (dr_work_dat, dr_em_id, dr_time_hour, dr_time_minute, dr_record, dr_detail, dr_problem, dr_path, fk_n_customer_id) 
				VALUES ('$datework', '$employee', '$hour', '$minute', '$record', '$detail', '$prob', '$path_file', '$cusgen')");
			$result = $conn->query($sql);

			if($result==TRUE)
			{
				array_push($messages, "บันทึกข้อมูลการรายงานประจำวันเสร็จสิ้น");
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
			die("<script>
				alert('ERROR! : FILE NOT FOUND');
				history.back();
			 	</script>");
		}
				$conn->close();

?>
<!DOCTYPE html>
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
				echo('<a class="btn btn-blue" href="daily_work.php">เพิ่มรายการใหม่</a>');
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
