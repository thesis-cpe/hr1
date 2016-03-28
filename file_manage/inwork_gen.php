<?php
  @session_start(); 
  header("Content-type: text/html; charset=utf-8");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Add Work ::.</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Loading bootstrap css-->
    <!-- Custom Fonts -->
    <link type="text/css" rel="stylesheet" href="styles/font-awesome-4.1.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
    <link rel="stylesheet" type="text/css" href="inc/bootstrap/css/jquery-ui.css">

    <script type="text/javascript" src="script/jquery.min.js"></script>
	<script type="text/javascript" src="script/arrow79.js"></script>
	
</head>
<body>
<?php
	if(isset($_SESSION['user']))
	{
		if($_SESSION['status']=="ADMIN")
		{
?>
	<div>
		<div id="wrapper">
            <?php include_once('inc/topbar.php'); ?><br>
            <?php include_once('inc/menu.php'); ?>
            <div id="page-wrapper">
                <div class="page-content">
                    <div id="sum_box" class="row">
						<div class="col-lg-12">
							<form class="form-horizontal" action="sc_registercusgen.php" method="post">
								<div class="panel panel-violet">
									<div class="panel-heading">
										<h3 class="panel-title"><span class="fa fa-pencil"></span> &nbsp;&nbsp; ข้อมูลกิจการ</h3>
									</div><br><br>
													
									<!-- รหัสลูกค้า -->
									<div class="row">	
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label"><span style="color:red"> * </span>รหัสบริษัท : </label>
													<div class="col-md-6">
														<input type="text" id="txtNumcusold" name="txtNumcusold" class="form-control input-sm"   required/>
													</div>
											</div>
										</div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label"><span style="color:red"> * </span>ปีภาษี : </label>
													<div class="col-md-4">
														<select class="form-control input-sm" name="txtNumcusnew">
			                                                <option></option>
			                                                <?php for($i=2557;$i<=2599;$i++){ ?>
			                                                		<option value=" <?php echo "$i"; ?>"> <?php echo "$i"; ?></option>
			                                                <?php } ?>
			                                            </select>
													</div>
											</div>
										</div>
									</div>

									<!-- ชื่อลูกค้า -->
									<div class="row">	
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label"><span style="color:red"> * </span>ชื่อลูกค้า : </label>
													<div class="col-md-6">
														<input type="text" id="txtName" name="txtName" class="form-control input-sm" onkeyup="autocomplet()" onChange="updatecusold()" autofocus="autofocus" required/>
														<ul id="namecus_list_id" name="namecus_list_id"></ul>
														<input type="hidden" id="txtNameajax" name="txtName" class="form-control input-sm" />
													</div>
											</div>
										</div>
									</div>

									<div class="row">	
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label"><span style="color:red"> * </span>รายได้โครงการ : </label>
													<div class="col-md-5">
														<input type="text" id="txtRevenue" name="txtRevenue" class="form-control input-sm" placeholder="บาท" onKeyPress="return KeyCode(txtRevenue)" required/>
													</div>
											</div>
										</div>
										<div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label"><span style="color:red"> * </span>ค่าใช้จ่ายสำนักงาน : </label>
													<div class="col-md-5">
														<input type="text" id="txtCharge" name="txtCharge" class="form-control input-sm" placeholder="บาท/ชั่วโมง" onKeyPress="return KeyCode(txtCharge)" required/>
													</div>
											</div>
										</div>
									</div>

									<div class="row">	
										<div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-2 control-label">หมายเหตุ : </label>
													<div class="col-md-6">
														<TEXTAREA type="text" id="txtComment" name="txtComment" class="form-control"></TEXTAREA>
													</div>
											</div>
										</div>
									</div>
									
									<div class="modal-footer">
										<center>
											<p align = "center"><span style="color:red"> * <label>หมายเหตุ!!! : กรุณากรอกข้อมูลให้ครบทุกช่อง ก่อนบันทึก</label></span></p>
											<button class="btn btn-success " type="submit" >ต่อไป</button>
										</center>
									</div>

								</div><!-- /panel-info -->
							</form>
						</div>
						<!-- /.col-lg-12 -->
					</div>
					<!-- roe mbl -->
				</div>
				<!-- /.content -->
				<?php include_once('inc/footer.php'); ?>
			</div>
			<!-- /#page-wrapper -->
		</div>
		<!-- /#wrapper -->
	</div>
	<?php
		}
		else
		{
			header("Location:workdata.php");
		}
	?>

<!-- Autocomplete -->
<script type="text/javascript" src="inc/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="inc/bootstrap/js/script.js"></script>

<!-- Ajax list -->
<script type="text/javascript" src="inc/bootstrap/js/scriptm.js"></script>

<script src="script/jquery-1.10.2.min.js"></script>
    <script src="script/jquery-migrate-1.2.1.min.js"></script>
    <script src="script/jquery-ui.js"></script>
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
    <script src="script/index.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="script/main.js"></script>

 <script type="text/javascript">
	function KeyCode(objId)
	{
		if (event.keyCode >= 48 && event.keyCode<=57) //48-57(ตัวเลข) ,65-90(Eng ตัวพิมพ์ใหญ่ ) ,97-122(Eng ตัวพิมพ์เล็ก)
		{
			return true;
		}
		else
		{
			alert("กรอกได้เฉพาะตัวเลข 0-9 เท่านั้น");
			return false;
		}
    }
</script>

<script>
var ajax = getHTTPObject();

function getHTTPObject()
{
	var xmlhttp;
	if (window.XMLHttpRequest) {
	  // code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	} else if (window.ActiveXObject) {
	  // code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	} else {
	  //alert("Your browser does not support XMLHTTP!");
	}
	return xmlhttp;
}

function updatecusold()
{
	if (ajax)
	{
		var name = document.getElementById("txtName").value;
		if(name)
		{
			var url = "auto_complet.php";
			var param = "?name=" + escape(name);

			ajax.open("GET", url + param, true);
			ajax.onreadystatechange = handleAjax;
			ajax.send(null);
		}
	}
}
function handleAjax()
{
	if (ajax.readyState == 4)
	{
		cus = ajax.responseText.split(",")

		var txtNumcusold = document.getElementById('txtNumcusold');

		txtNumcusold.value = cus[0];
		
	}
}
</script>

<?php 
	} 
	else
	{
		header("Location: ../index.html");
	}
?>
</body>
</html>