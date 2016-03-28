<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Edit Profile ::.</title>
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

    <script type="text/javascript" src="script/jquery.min.js"></script>
	<script type="text/javascript" src="script/arrow79.js"></script>
	
</head>
<body>	
<?php
	if(isset($_SESSION['user']))
	{	
		include_once('inc/config.php');
		include_once('inc/connect.php');
		$sql = ("SELECT * FROM employee INNER JOIN user ON employee.employee_worker_id=user.fkey_worker_id WHERE employee.employee_worker_id = '".$_SESSION['login']."'");
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
								<form class="form-horizontal" name="myform" action='sc_updateprofile.php' method="POST" enctype="multipart/form-data">
									<div class="panel panel-violet">
										<div class="panel-heading">
											<h1 class="panel-title"><span class="fa fa-edit"></span> &nbsp;&nbsp;แก้ไขข้อมูลพนักงาน</h1>
										</div><br></br>
										<?php //echo ($_SESSION['login']); ?>
													
										<!-- ชื่อ - สกุล -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>ชื่อ - นามสกุล : </label> 
														<div class="col-md-8">
															<input type="text" id="txtName" name="txtName" class="form-control input-sm" value="<?php echo("$row[employee_name]");?>" required/> 
														</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<input type="text" id="txtSurname" name="txtSurname" class="form-control input-sm" value="<?php echo("$row[employee_lname]");?>" required/>
												</div>
											</div>
										</div>

										<!-- รหัสพนักงาน -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>รหัสพนักงาน : </label>
														<div class="col-md-6">
															<input type="text" id="txtNumemployee" name="txtNumemployee" class="form-control input-sm" value="<?php echo("$row[employee_worker_id]");?>" readonly/>
														</div>
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
											<input type="hidden" id="txtNumwork" name="txtNumwork" class="form-control input-sm" value="<?php echo("$row[employee_worker_id]");?>"/>
										</div>
									</div><!-- END panel panel-info -->
												
									<div class="panel panel-violet">
										<div class="panel-heading">
											<h3 class="panel-title"><span class="fa fa-edit"></span> &nbsp;&nbsp;แก้ไขข้อมูลส่วนบุคคล</h3>
										</div><br></br>

										<!-- เลขประจำตัวประชาชน -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>เลขประจำตัวประชาชน : </label>
														<div class="col-md-6">
															<input type="text" id="txtIdentification" name="txtIdentification" class="form-control input-sm" maxlength="13" value="<?php echo("$row[employee_nation_id]"); ?>" onKeyPress="return KeyCode(txtIdentification)" required/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">สถานะสมรส : </label>
														<div class="col-md-4">
															<select class="form-control input-sm" name="list2">
																<option value="<?php echo("$row[employee_married_status]"); ?>"><?php echo("$row[employee_married_status]"); ?></option>
																<option value="โสด">โสด</option>
																<option value="สมรส">สมรส</option>
																<option value="หย่าร้าง">หย่าร้าง</option>
															</select>
														</div>
												</div>
											</div>
										</div>

										<!-- ที่อยู่ตามทะเบียนบ้าน -->
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-2 control-label"><span style="color:red"> * </span>ที่อยู่ตามทะเบียนบ้าน : </label>
														<div class="col-md-9">
															<input type="text" id="txtAddress" name="txtAddress" class="form-control input-sm" value="<?php echo("$row[employee_addr]"); ?>" required/>
														</div>
												</div>
											</div>
										</div>

										<!-- ที่อยู่ปัจจุบัน -->
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-2 control-label"><span style="color:red"> * </span>ที่อยู่ปัจจุบัน : </label>
														<div class="col-md-9">
															<input name="txtAddresspersent" type="text" class="form-control input-sm" id="txtAddresspersent" value="<?php echo("$row[employee_addrp]"); ?>" required/>
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
															<input type="text" id="txtTel" name="txtTel" class="form-control input-sm" maxlength="10" value="<?php echo("$row[employee_tel]"); ?>" onKeyPress="return KeyCode(txtTel)" required/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>อีเมล์ : </label>
														<div class="col-md-6">
															<input type="email" id="txtEmail" name="txtEmail" class="form-control input-sm" placeholder="example@exam.com" value="<?php echo("$row[employee_email]"); ?>" required/>
														</div>
												</div>
											</div>
										</div>

										<!-- บุคคลที่ติดต่อได้ -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">บุคคลที่ติดต่อได้ : </label>
														<div class="col-md-6">
															<input type="text" id="txtOther" name="txtOther" class="form-control input-sm" value="<?php echo("$row[employee_contact_name]"); ?>"/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">โทรศัพท์ : </label>
														<div class="col-md-6">
															<input type="text" id="txtTelother" name="txtTelother" class="form-control input-sm" maxlength="10" value="<?php echo("$row[employee_contact_tel]"); ?>" onKeyPress="return KeyCode(txtTelother)"/>
														</div>
												</div>
											</div>
										</div>

										<!-- ระดับการศึกษา -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">ระดับการศึกษา : </label>
														<div class="col-md-5">
															<select class="form-control input-sm" name="list3">
																<option value="<?php echo("$row[employee_graduate]"); ?>"><?php echo("$row[employee_graduate]"); ?></option>
																<option value="ปวช">ปวช</option>
																<option value="ปวส">ปวส</option>
																<option value="ปริญญาตรี">ปริญญาตรี</option>
																<option value="ปริญญาโท">ปริญญาโท</option>
																<option value="ปริญญาเอก">ปริญญาเอก</option>
															</select>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">สาขาวิชาที่จบ : </label>
														<div class="col-md-6">
															<input type="text" id="txtMajor" name="txtMajor" class="form-control input-sm" value="<?php echo("$row[employee_major]"); ?>" />
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
															<input type="number_float" id="txtGrade" name="txtGrade" class="form-control input-sm" value="<?php echo("$row[employee_grade]"); ?>"/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">ชื่อมหาวิทยาลัย : </label>
														<div class="col-md-6">
															<input type="text" id="txtUniversity" name="txtUniversity" class="form-control input-sm" value="<?php echo("$row[employee_academy]"); ?>"/>
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
															<input type="text" id="txtDatepicker" name="txtDatepicker" class="form-control input-sm" value="<?php echo("$row[employee_register_date]"); ?>" readonly/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>อัตราเงินเดือน : </label>
														<div class="col-md-4">
															<input type="number" id="txtMoney" name="txtMoney" class="form-control input-sm" value="<?php echo("$row[employee_salary]"); ?>" onKeyPress="return KeyCode(txtMoney)" readonly/>
														</div>
														<div class="col-md-4">
															<label class="control-label">บาท </label>
														</div>
												</div>
											</div>
										</div>

										<!-- ค่าแรง -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>ค่าแรงต่อวัน : </label>
														<div class="col-md-3">
															<input type="text" id="txtCoast" name="txtCoast" class="form-control input-sm" value="<?php echo("$row[employee_coast]"); ?>" onKeyPress="return KeyCode(txtCoast)" readonly/>
														</div>
														<div class="col-md-3">
															<label class="control-label">บาท/วัน </label>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>จำนวนวันทำงาน : </label>
														<div class="col-md-3">
															<input type="number" id="txtDateno" name="txtDateno" class="form-control input-sm" value="<?php echo("$row[employee_datework]"); ?>" onKeyPress="return KeyCode(txtDateno)" readonly/>
														</div>
														<div class="col-md-3">
															<label class="control-label"> วัน/เดือน </label>
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
															<input type="text" id="txtCondition" name="txtCondition" class="form-control input-sm" value="<?php echo("$row[employee_condition]"); ?>" readonly/>
														</div>
												</div>
											</div>
										</div>

										<!-- รูปประจำตัว -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">รูปภาพ : </label>
														<div class="col-md-6">
															<!--<input type="file" id="txtPicture" name="txtPicture" class="form-control input-sm"/>-->
															<div style="position:relative;">
											                      <a class='btn btn-primary' href='javascript:;'> Choose File...
											                      <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
											                      -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
											                      color:transparent;' name="txtPicture" size="50"  onchange='$("#upload-file1").html($(this).val());'>
											                      </a> &nbsp; <span class='label label-info' id="upload-file1"></span></div>
															<span style="color:red"> *รูปภาพมีขนาดไม่เกิน 5 MB .jpg .png เท่านั้น</span>
														</div>
												</div>
											</div>
										</div>
									
										<!-- อัพโหลดสัญญาจ้าง   ส่วนนี้ยังไม่มี sc_upload-->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">สัญญาจ้าง : </label>
														<div class="col-md-6">
															<!--<input type="file" id="fileConvention" name="fileConvention" class="form-control input-sm"/>-->
															<div style="position:relative;">
											                      <a class='btn btn-primary' href='javascript:;'> Choose File...
											                      <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
											                      -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
											                      color:transparent;' name="fileConvention" size="50"  onchange='$("#upload-file").html($(this).val());'>
											                      </a> &nbsp; <span class='label label-info' id="upload-file"></span></div>
														</div>
												</div>
											</div>
										</div>
									
										<!--<div class="row">	
											<div class="list-inline">
												<div class="col-md-offset-1 col-md-3">
													<label>ลบสัญญาจ้างเดิม : </label>
												</div>
												<div class="col-md-6">
													
													
												</div>
											</div>
										</div><br> -->
									
										<div class="modal-footer">
											<center>
												<p align = "center"><span style="color:red"> * <label>หมายเหตุ!!! : กรุณากรอกข้อมูลให้ครบทุกช่อง ก่อนบันทึก</label></span></p>
												<input type="submit" class="btn btn-green" name="Submit" value="บันทึก"/>
												<input type="reset" class="btn btn-yellow" value="ล้างข้อมูล"/>
											</center>
										</div>
									</div><!-- END panel panel-info -->
								</form>  <!-- END form -->
							</div>
						</div><!-- END row -->															
					</div><!-- END row mbl -->
				</div><!-- END CONTENT -->
				<!--BEGIN FOOTER-->
                <?php include_once('inc/footer.php');  ?>
                <!--END FOOTER-->
			</div><!-- END page-wrapper -->
		</div><!-- END wrapper -->
	</div>

<?php $conn->close();?>

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

<?php 
	} 
	else
	{
		header("Location: ../index.html");
	}
	?>
</body>
</html>