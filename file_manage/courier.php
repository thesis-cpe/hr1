<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: courier ::.</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Loading bootstrap css-->
    <!-- Custom Fonts -->
    <link type="text/css" rel="stylesheet" href="styles/font-awesome-4.1.0/css/font-awesome.min.css" >
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
    <link rel="stylesheet" type="text/css" href="inc/bootstrap/css/jquery-ui.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui.min.css">

    <script type="text/javascript" src="script/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="script/jquery-ui.min.js"></script>

    <script type="text/javascript" src="script/jquery.min.js"></script>
	<script type="text/javascript" src="script/arrow79.js"></script>
	
	<script> <!--AJAX HIDE USER TXT-->
	function showEmployee(str2) {
	    if (str2 == "") {
	        document.getElementById("txtHintEmployee").innerHTML = "";
	        return;
	    } else { 
	        if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() {
	            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	                document.getElementById("txtHintEmployee").innerHTML = xmlhttp.responseText;
	            }
	        }
	        xmlhttp.open("GET","sc_hide_user/get_txt_user.php?pass_audit="+str2,true);
	        xmlhttp.send();
	    }
	}
	</script><!--.AJAX HIDE USER TXT-->

	<script>
	    $(function(){
	        $('#cusnewnumber').autocomplete({source:'autocomplete.php'});
	    })
	</script>

	<script>
	    $(function(){
	        $('#cusoldnumber').autocomplete({source:'autocomplete2.php'});
	    })
	</script>
	
</head>
<body>
<?php
	if(isset($_SESSION['user']))
	{
		include_once('inc/config.php');
		include_once('inc/connect.php');
?> 
	<div>
		<div id="wrapper">
            <?php include_once('inc/topbar.php'); ?>
            <?php include_once('inc/menu.php'); ?>
            <div id="page-wrapper">
                <div class="page-content">
                    <div id="sum_box" class="row mbl">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-red">
									<div class="panel-heading">
										<h3 class="panel-title"><span class="fa fa-pencil"></span> &nbsp;&nbsp;  ระบบบันทึกการรับ-ส่งบัญชีและเอกสาร </h3>
									</div>
									
									<div class="panel-body"><br>
										<form class="form-horizontal" action='sc_registercourier.php' method="POST" enctype="multipart/form-data">
											
											<div class="row">
												<div class="col-md-6">
                                            		<div class="form-group">
                                                		<label class="col-md-4 control-label"><span style="color:red"> * </span>วันที่นำเข้าข้อมูล : </label>
															<div class="col-md-5">
																<input type="text" id="datepicker-th" name="txtDatein" class="form-control input-sm" required/> 
															</div>
													</div>
												</div>
												<div class="col-md-6">
                                            		<div class="form-group">
                                                		<label class="col-md-4 control-label"><span style="color:red"> * </span>วันที่ในเอกสาร : </label>
															<div class="col-md-5">
																<input type="text" id="datepicker-th1" name="txtDatedoc" class="form-control input-sm" required/> 
															</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
                                            		<div class="form-group">
                                                		<label class="col-md-4 control-label"><span style="color:red"> * </span>เลขที่เอกสาร : </label>
															<div class="col-md-6">
																<input type="text" id="" name="txtNodoc" class="form-control input-sm" required/> 
															</div>
													</div>
												</div>
												<div class="col-md-6">
                                            		<div class="form-group">
                                                		<label class="col-md-4 control-label"><span style="color:red"> * </span>หัวเรื่อง : </label>
															<div class="col-md-5">
																<select class="form-control input-sm" name="list1" >
																	<option value=NULL></option>
																	<option value="รับเอกสาร">รับเอกสาร</option>
																	<option value="ส่งเอกสาร">ส่งเอกสาร</option>
																</select> 
														</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
                                            		<div class="form-group">
                                                		<label class="col-md-4 control-label">ผู้นำเข้าข้อมูล : </label>
															<div class="col-md-5">
																<input type="text" id="" name="txtEm" class="form-control input-sm" value="<?php echo ("$_SESSION[login]");?>" disabled/>
																<input type="hidden" id="" name="txtEm" class="form-control input-sm" value="<?php echo ("$_SESSION[login]");?>"/> 
															</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
                                            		<div class="form-group">
                                                		<label class="col-md-4 control-label"><span style="color:red"> * </span>รหัสบริษัท : </label>
															<div class="col-md-6">
																 <input type="text" id="cusoldnumber" name="txtCus" class="input form-control input-sm"> 
															</div>
													</div>
												</div>
												<div class="col-md-6">
                                            		<div class="form-group">
                                                		<label class="col-md-4 control-label">รหัสงานบริษัท : </label>
															<div class="col-md-6">
																 <input type="text" name="txtCusgen" id="cusnewnumber" class="input form-control input-sm"> 
															</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
                                            		<div class="form-group">
                                                		<label class="col-md-4 control-label"><span style="color:red"> * </span>แนบไฟล์เอกสาร : </label>
															<div class="col-md-5">
																 <!--<input type="file" id="" name="fileIn" class="form-control input-sm" required/>-->
																 <div style="position:relative;">
                                                                  <a class='btn btn-primary' href='javascript:;'> Choose File...
                                                                  <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
                                                                  -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
                                                                  color:transparent;' name="fileIn" size="50"  onchange='$("#upload-file").html($(this).val());' required>
                                                                  </a> &nbsp; <br><span class='label label-info' id="upload-file"></span></div> 
															</div>
													</div>
												</div>
											</div>

											<div class="modal-footer">
												<center>
													<span style="color:red"> * โปรดตรวจสอบความถูกต้อง ก่อนกดบันทึก </span><br>
													<input type="submit" class="btn btn-green " value="บันทึก" />
													<input type="reset" class="btn btn-yellow " value="ล้างข้อมูล" />
												</center>
											</div>
										</form>
									</div>
									<!-- /#panel body -->
								</div>
								<!-- /#panel panel-info -->	

								<div class="panel panel-violet">
									<div class="panel-heading">
										<h3 class="panel-title"><span class="fa fa-search"></span> &nbsp;&nbsp;  เรียกดูข้อมูลการบันทึกรับ-ส่งบัญชีและเอกสาร </h3>
									</div>
									
									<div class="panel-body"><br>
										<form action="sc_browse_data/browse_courier.php" method="GET">
											<div class="from-group">
												<div class="row">
													<div class="list-inline">
														<div class="col-md-offset-1 col-md-2">
															<label><span style="color:red"> * </span>เลือกตาม : </label>
														</div>
														<div class="col-md-3">
															<!--<input type="text"  name="txtComId" class="form-control input-sm" placeholder="รหัสงานบริษัท"/>
															<br> -->
                                                            <!--แบงค์ เพิ่ม-->
															<?php
															 if($_SESSION['status'] == "ADMIN")
															 {
																 echo(' <select name="selCustomerId" class="form-control input-sm" onchange="showEmployee(this.value)">
                                                                <option></option>');
															 }
															 elseif($_SESSION['status'] == "USER")
															 {
																 echo ('<select name="selCustomerId" class="form-control input-sm" onchange="showEmployee(this.value)"');
															 }
															?>
                                                           
                                                                <?php
                                                                         $fknEmployeeID = $_SESSION['login'];
                                                                         
                                                                        $sqlCoastWork = "SELECT fk_n_customer_id FROM coast_work WHERE fk_employee_worker_id = '$fknEmployeeID'";
                                                                        $querySqlCoastWork =  $conn->query($sqlCoastWork);
                                                                        while ($arrCoastWork = $querySqlCoastWork->fetch_array()) 
                                                                        {  $custmerID =   $arrCoastWork['fk_n_customer_id'];

                                                                            ?>
                                                                            <!--HTML-->
                                                                            <option value="<?php echo $custmerID; ?>"><?php echo $custmerID; ?></option>
                                                                            <!--.HTML-->

                                                                       <?php } 
                                                                ?>
                                                            </select> 
                                                            <!--แบงค์ เพิ่ม-->
														</div>
													</div>
												</div><br>

												<div class="row">
													<div class="list-inline">
														<div class="col-md-offset-1 col-md-2">
															<label></label>
														</div>
														<div class="col-md-3" id="txtHintEmployee">
															<input type="text"  name="txtEmId" class="form-control input-sm" placeholder="รหัสพนักงาน" readonly value="<?php echo("$_SESSION[login]"); ?>"/>
														</div>
													</div>
												</div><br>

												<div class="row">
													<div class="list-inline">
														<div class="col-md-offset-1 col-md-2">
															<label></label>
														</div>
														<div class="col-md-3">
															<input type="text"  name="datepicker" class="form-control input-sm" placeholder="ช่วงนำเข้าข้อมูล"/>
														</div>
													</div>
												</div><br>

												<div class="row">
													<div class="list-inline">
														<div class="col-md-offset-1 col-md-2">
															<label></label>
														</div>
														<div class="col-md-3">
															<input type="text" id="datepicker-th" name="datepicker2" class="form-control input-sm" placeholder="ช่วงวันที่ของเอกสารที่แนบ"/>
														</div>
													</div>
												</div><br>

												<div class="row">
													<div class="col-md-offset-5 col-md-2">
														<button class="btn btn-success form-control input-sm" type="submit">เรียกดู</button>
													</div>
												</div>

											</div>
											<!-- /form group -->
										</form>
									</div>
									<!-- /#panel body -->
								</div>
								<!-- /#panel panel-success -->
							</div>
						</div>
						<!-- /.row -->
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

	<?php $conn->close(); ?>

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
    <script type="text/javascript" src="inc/bootstrap/js/scriptm.js"></script>

    <!-- Datepicker JavaScript -->
    <script type="text/javascript" src="inc/bootstrap/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="inc/bootstrap/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>

    <script type="text/javascript">
    $(function () {
        var d = new Date();
        var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);

        $("#datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th1").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
    	
    	$("#datepicker-th2").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th3").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
    });
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