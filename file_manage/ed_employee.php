<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Edit Employee ::.</title>
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

    <script type="text/javascript" src="script/jquery.min.js"></script>
	<script type="text/javascript" src="script/arrow79.js"></script>
	
</head>
<body>	
<?php
	if(isset($_SESSION['user']))
	{	
		if($_SESSION['status']=="ADMIN")
		{
		include_once('inc/config.php');
		include_once('inc/connect.php');	
		$sql = ("SELECT * FROM employee WHERE employee_worker_id = '".$_GET["em_id"]."'");
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
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
								<form class="form-horizontal" name="myform" action='sc_updateemployee.php' method="POST" enctype="multipart/form-data">
									<div class="panel panel-violet">
										<div class="panel-heading">
											<h3 class="panel-title"><span class="fa fa-edit"></span> &nbsp;&nbsp;แก้ไขข้อมูลพนักงาน</h3>
										</div><br></br>
										<?php //echo ($_SESSION['login']); ?>
													
										<!-- ชื่อ - สกุล -->
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-2 control-label"><span style="color:red"> * </span>ชื่อ - นามสกุล : </label> 
														<div class="col-md-4">
															<input type="text" id="txtName" name="txtName" class="form-control input-sm" value="<?php echo("$row[employee_name]");?>" required/> 
														</div>
														<div class="col-md-4">
															<input type="text" id="txtSurname" name="txtSurname" class="form-control input-sm" value="<?php echo("$row[employee_lname]");?>" required/>
														</div>
												</div>
											</div>
										</div>

										<!-- รหัสพนักงาน -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>รหัสพนักงาน : </label>
														<div class="col-md-6">
															<input type="text" id="txtNumemployee" name="txtNumemployee" class="form-control input-sm" value="<?php echo("$row[employee_worker_id]");?>" />
														</div>
															<input type="hidden" id="txtNumwork" name="txtNumwork" class="form-control input-sm" value="<?php echo("$row[employee_worker_id]");?>"/>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">รหัสผู้ทำบัญชี : </label>
														<div class="col-md-6">
															<input type="text" id="txtNumaccount" name="txtNumaccount" class="form-control input-sm" value="<?php echo("$row[employee_audit_id]"); ?>"/>
														</div>
												</div>
											</div>
										</div><br>
									</div>
									<!-- /panel panel-info -->
												
									<div class="panel panel-violet">
										<div class="panel-heading">
											<h3 class="panel-title"><span class="fa fa-edit"></span> &nbsp;&nbsp;แก้ไขข้อมูลส่วนบุคคล</h3>
										</div>
										<br></br>

										<!-- เลขประจำตัวประชาชน -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>เลขประจำตัวประชาชน : </label>
														<div class="col-md-6">
															<input type="text" id="txtIdentification" name="txtIdentification" class="form-control input-sm" maxlength="13" value="<?php echo("$row[employee_nation_id]"); ?>" onKeyPress="return KeyCode(txtIdentification)" required readonly/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">สถานะสมรส : </label>
														<div class="col-md-4">
															<input type="text" id="" name="" class="form-control input-sm" value="<?php echo("$row[employee_married_status]"); ?>" required readonly/>
														</div>
												</div>
											</div>
										</div>

										<!-- ที่อยู่ตามทะเบียนบ้าน -->
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-2 control-label"><span style="color:red"> * </span>ที่อยู่ตามทะเบียนบ้าน : </label>
														<div class="col-md-8">
															<input type="text" id="txtAddress" name="txtAddress" class="form-control input-sm" value="<?php echo("$row[employee_addr]"); ?>" required readonly/>
														</div>
												</div>
											</div>
										</div>

										<!-- ที่อยู่ปัจจุบัน -->
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-2 control-label"><span style="color:red"> * </span>ที่อยู่ปัจจุบัน : </label>
														<div class="col-md-8">
															<input name="txtAddresspersent" type="text" class="form-control input-sm" id="txtAddresspersent" value="<?php echo("$row[employee_addrp]"); ?>" required readonly/>
														</div>
												</div>
											</div>
										</div>

										<!-- โทรศัพท์ -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>โทรศัพท์ : </label>
														<div class="col-md-6">
															<input type="text" id="txtTel" name="txtTel" class="form-control input-sm" maxlength="10" value="<?php echo("$row[employee_tel]"); ?>" onKeyPress="return KeyCode(txtTel)" required readonly/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>อีเมล์ : </label>
														<div class="col-md-6">
															<input type="email" id="txtEmail" name="txtEmail" class="form-control input-sm" placeholder="example@exam.com" value="<?php echo("$row[employee_email]"); ?>" required readonly/>
														</div>
												</div>
											</div>
										</div>

										<!-- บุคคลที่ติดต่อได้ -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">บุคคลที่ติดต่อได้ : </label>
														<div class="col-md-7">
															<input type="text" id="txtOther" name="txtOther" class="form-control input-sm" value="<?php echo("$row[employee_contact_name]"); ?>" readonly/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">โทรศัพท์ : </label>
														<div class="col-md-6">
															<input type="text" id="txtTelother" name="txtTelother" class="form-control input-sm" maxlength="10" value="<?php echo("$row[employee_contact_tel]"); ?>" onKeyPress="return KeyCode(txtTelother)" readonly/>
														</div>
												</div>
											</div>
										</div>

										<!-- ระดับการศึกษา -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">ระดับการศึกษา : </label>
														<div class="col-md-4">
															<input type="text" id="" name="" class="form-control input-sm" value="<?php echo("$row[employee_graduate]"); ?>" readonly/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">สาขาวิชาที่จบ : </label>
														<div class="col-md-6">
															<input type="text" id="txtMajor" name="txtMajor" class="form-control input-sm" value="<?php echo("$row[employee_major]"); ?>" readonly />
														</div>
												</div>
											</div>
										</div>

										<!-- เกรดเฉลี่ยรวม -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">เกรดเฉลี่ยรวม : </label>
														<div class="col-md-4">
															<input type="number_float" id="txtGrade" name="txtGrade" class="form-control input-sm" value="<?php echo("$row[employee_grade]"); ?>" readonly/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">ชื่อมหาวิทยาลัย : </label>
														<div class="col-md-6">
															<input type="text" id="txtUniversity" name="txtUniversity" class="form-control input-sm" value="<?php echo("$row[employee_academy]"); ?>" readonly/>
														</div>
												</div>
											</div>
										</div>

										<!-- เริ่มปฏิบัติงาน -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>เริ่มปฏิบัติงาน : </label>
														<div class="col-md-4">
															<input type="text" id="datepicker-th" name="txtDatepicker" class="form-control input-sm" value="<?php echo("$row[employee_register_date]"); ?>" />
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>อัตราเงินเดือน : </label>
														<div class="col-md-4">
															<input type="number" id="txtMoney" name="txtMoney" class="form-control input-sm" value="<?php echo("$row[employee_salary]"); ?>" onKeyPress="return KeyCode(txtMoney)"/>
														</div>
														<div class="col-md-2">
															<label>บาท </label>
														</div>
												</div>
											</div>
										</div>

										<!-- ค่าแรง -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>ค่าแรงต่อวัน : </label>
														<div class="col-md-4">
															<input type="text" id="txtCoast" name="txtCoast" class="form-control input-sm" value="<?php echo("$row[employee_coast]"); ?>" onKeyPress="return KeyCode(txtCoast)"/>
														</div>
														<div class="col-md-2">
															<label>บาท/วัน </label>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>จำนวนวันทำงาน : </label>
														<div class="col-md-4">
															<input type="number" id="txtDateno" name="txtDateno" class="form-control input-sm" value="<?php echo("$row[employee_datework]"); ?>" onKeyPress="return KeyCode(txtDateno)"/>
														</div>
														<div class="col-md-2">
															<label> วัน/เดือน </label>
														</div>
												</div>
											</div>
										</div>

										<!-- เงื่อนไข -->
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-2 control-label">เงื่อนไขวันหยุดและสวัสดิการ : </label>
														<div class="col-md-8">
															<input type="text" id="txtCondition" name="txtCondition" class="form-control input-sm" value="<?php echo("$row[employee_condition]"); ?>" />
														</div>
												</div>
											</div>
										</div>

										<!-- หมายเหตุ -->
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-2 control-label">หมายเหตุ : </label>
														<div class="col-md-6">
															<TEXTAREA type="text" class="form-control input-sm" name="txtNote" id="txtNote" value="<?php echo("$row[customer_note]") ?>"></TEXTAREA>
														</div>
												</div>
											</div>
										</div>

										<div class="modal-footer">
											<center>
												<p align = "center"><span style="color:red"> * <label>หมายเหตุ!!! : กรุณากรอกข้อมูลให้ครบทุกช่อง ก่อนบันทึก</label></span></p>
												<input type="submit" class="btn btn-green" name="Submit" value="บันทึก"/>
												<input type="reset" class="btn btn-yellow" value="ล้างข้อมูล"/>
											</center>
										</div>
									</div> 
									<!-- /panel panel-info -->
								</form>  <!--.form action to sc_updateprofile.php-->
										
							</div>
							<!-- /.col-lg-12 -->
						</div>
						<!-- /.row -->
					</div>
					<!-- row mbl -->
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
			header("Location: ed_profile.php");
		}

	$conn->close(); ?>

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