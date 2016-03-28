<?php
  @session_start(); 
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
		$sql = ("SELECT * FROM customer INNER JOIN customer_gen ON customer.customer_tax_id=customer_gen.fk_customer_tax_id WHERE customer.customer_tax_id='".$_GET['cusold']."'");
		$result = $conn->query($sql);
		$row = $result->fetch_array();
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
								<form class="form-horizontal">
									<div class="panel panel-violet">
										<div class="panel-heading">
											<h3 class="panel-title"><span class="fa fa-pencil"></span> &nbsp;&nbsp; ข้อมูลกิจการ</h3>
										</div><br>
											
										<!-- รหัสลูกค้า -->
										<div class="row">	
											<div class="col-md-6">
                                            	<div class="form-group">
                                                	<label class="col-md-4 control-label"><span style="color:red"> * </span>รหัสลูกค้า(เก่า) : </label>
														<div class="col-md-6">
															<input type="text" id="txtNumcusold" name="txtNumcusold" class="form-control input-sm" value="<?php echo ("$_GET[cusold]") ?>" readonly/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
                                            	<div class="form-group">
                                                	<label class="col-md-4 control-label"><span style="color:red"> * </span>รหัสลูกค้า(ใหม่) : </label>
														<div class="col-md-6">
															<input type="text" id="txtNumcusnew" name="txtNumcusnew" class="form-control input-sm" value="<?php echo ("$_GET[cusnew]") ?>" readonly/>
														</div>
												</div>
											</div>
										</div>

										<!-- ชื่อลูกค้า -->
										<div class="row">	
											<div class="col-md-6">
                                            	<div class="form-group">
                                                	<label class="col-md-4 control-label"><span style="color:red"> * </span>ชื่อลูกค้า : </label>
														<div class="col-md-7">
															<input type="text" id="txtName" name="txtName" class="form-control input-sm" value="<?php echo ("$row[customer_company]") ?>" readonly/>
														</div>
												</div>
											</div>
										</div>

										<div class="row">	
											<div class="col-md-6">
                                            	<div class="form-group">
                                                	<label class="col-md-4 control-label">ชื่อผู้ติดต่องาน : </label>
														<div class="col-md-7">
															<input type="text" id="txtNamecontact" name="txtNamecontact" class="form-control input-sm" value="<?php echo ("$row[customer_contact]") ?>" readonly/>
														</div>
												</div>
											</div>
										</div>

										<div class="row">	
											<div class="col-md-6">
                                            	<div class="form-group">
                                                	<label class="col-md-4 control-label">โทรศัพท์ </label>
														<div class="col-md-6">
															<input type="text" id="txtTelcontact" name="txtTelcontact" class="form-control input-sm" value="<?php echo ("$row[customer_contact_tel]") ?>" readonly />
														</div>
												</div>
											</div>
											<div class="col-md-6">
                                            	<div class="form-group">
                                                	<label class="col-md-4 control-label">อีเมล์ :</label>
														<div class="col-md-6">
															<input type="text" id="txtEmailcontact" name="txtEmailcontact" class="form-control input-sm" value="<?php echo ("$row[customer_contact_email]") ?>" readonly/>
														</div>
												</div>
											</div>
										</div>

										<div class="row">	
											<div class="col-md-12">
                                            	<div class="form-group">
                                                	<label class="col-md-2 control-label"><span style="color:red"> * </span>หมายเหตุ : </label>
														<div class="col-md-7">
															<input type="text" id="txtComment" name="txtComment" class="form-control input-sm" value="<?php echo ("$row[customer_gen_comment]") ?>" readonly/>
														</div>
												</div>
											</div>
										</div>
									</div><!-- /panel-info -->
								</form>

								<div class="panel panel-violet">
									<div class="panel-heading">
										<h3 class="panel-title"><span class="fa fa-pencil"></span> &nbsp;&nbsp; ต้นทุนงาน</h3>
									</div><br>

									<!-- เพิ่มทีมงาน -->
									<form>
									<div class="row">	
										<div class="list-inline">
											<div class="col-md-offset-1 col-md-2">
												<label><span style="color:red"> * </span>เพิ่มทีมงาน : </label>
											</div>
											<div class="col-md-2">
												<select class="form-control input-sm" name="list2" id="list2">
													<option value=NULL></option>
													<option value="0">ผู้ทำบัญชี</option>
													<option value="1">ผู้ปฏิบัติงาน</option>
												</select>
											</div>
											<div class="col-sm-2">
												<input type="text" id="txtNumaudit" name="txtNumaudit" class="form-control input-sm" onkeyup="autocomnum()"  placeholder="รหัสพนักงาน" />
												<li id="num_list_id" name="num_list_id"></li>
											</div>
											<!--<div class="col-sm-4">
												<input type="text" id="txtNameaudit" name="txtNameaudit" class="form-control input-sm" onkeyup="autocomname()" placeholder="ชื่อ - สกุล" />
												<li id="name_list_id" name="name_list_id"></li>
											</div> -->
										</div>
									</div><br>

									<div class="row">	
										<div class="list-inline">
											<div class="col-md-offset-3 col-md-1">
												<input type="text" id="txtHour" name="txtHour" class="form-control input-sm" onKeyPress="return KeyCode(txtHour)"/>
											</div>
											<div class="col-md-1">
												<label>ชั่วโมง </label>
											</div>
											<div class="col-md-2">
												<input type="text" id="txtMoney" name="txtMoney" class="form-control input-sm" onKeyPress="return KeyCode(txtMoney)"/> 
											</div>
											<div class="col-md-2">
												<label>บาท/ชั่วโมง </label>
											</div>
											<div class="col-md-2">
												<input class="btn btn-success form-control input-sm" onclick="add_member()" value="เพิ่ม"/>
											</div>
										</div>
									</div><br>
									</form>

									<div class="panel-body">
									<fieldset>
        								<div id="list_container">
            							<?php 
						                        include('config.php');
						                        $pdo = connect();
						                        include('list_members.php'); 
						                    ?>
						                </div><!-- list_container -->
						                <p align = "center"><span style="color:red"> * <label>หมายเหตุ!!! : หากข้อมูลไม่แสดง โปรด Refresh หน้าจอ</label></span></p>
						            </fieldset>
						        	</div>
						            <br>
						        </div> <!-- panel-info -->

							    <form action="sc_registerwork.php" method="post" enctype="multipart/form-data">
							        <div class="panel panel-violet">
										<div class="panel-heading">
											<h3 class="panel-title"><span class="fa fa-pencil"></span> &nbsp;&nbsp; ข้อมูลงาน</h3>
										</div><br>
												
										<!-- บริษัท -->
										<div class="row">	
											<div class="list-inline">
												<div class="col-md-2">
													<input type="hidden" id="txtNewcus" name="txtNewcus" class="form-control input-sm" value="<?php echo ("$_GET[cusnew]"); ?>"/>
													<?php //echo ("$_GET[cusnew]"); ?>
												</div>
												<div class="col-md-2">
													<input type="hidden" id="txtOldcus" name="txtOldcus" class="form-control input-sm" value="<?php echo ("$_GET[cusold]"); ?>"/>
													<?php //echo ("$_GET[cusold]"); ?>
												</div>
											</div>
										</div><br>

										<!-- รอบบัญชี -->
										<div class="row">	
											<div class="list-inline">
												<div class="col-md-offset-1 col-md-2">
													<label><span style="color:red"> * </span>รอบบัญชีที่รับทำ : </label>
												</div>
												<div class="col-md-2">
													<input type="text" id="datepicker-start" name="txtDatestart" class="form-control input-sm" required/>
												</div>
												<div class="col-md-1">
													<label><span style="color:red"> * </span>ถึง </label>
												</div>
												<div class="col-md-2">
													<input type="text" id="datepicker-end" name="txtDateend" class="form-control input-sm" required/>
												</div>
											</div>
										</div><br>

										<!-- วันที่รับทำบัญชี -->
										<div class="row">	
											<div class="list-inline">
												<div class="col-md-offset-1 col-md-2">
													<label><span style="color:red"> * </span>วันที่รับทำบัญชี : </label>
												</div>
												<div class="col-md-2">
													<input type="text" id="datepicker-work" name="txtWorkstart" class="form-control input-sm" required/>
												</div>
											</div>
										</div><br>

										<!-- อัตราค่าทำบัญชี -->
										<div class="row">	
											<div class="list-inline">
												<div class="col-md-offset-1 col-md-2">
													<label><span style="color:red"> * </span>อัตราค่าทำบัญชี : </label>
												</div>
												<div class="col-md-2">
													<select class="form-control input-sm" name="list3" id="list3">
														<option value="NULL"></option>
														<option value="0">รายเดือน</option>
														<option value="1">รายครั้ง</option>
													</select>
												</div>
												<div class="col-md-2">
													<input type="text" id="txtSalary" name="txtSalary" class="form-control input-sm" placeholder="บาท" onKeyPress="return KeyCode(txtSalary)" required/>
												</div>
												<div class="col-md-2">
													<label><span style="color:red"> * </span>งวดงาน : </label>
												</div>
												<div class="col-md-2">
													<input type="text" id="txtTimework" name="txtTimework" class="form-control input-sm" placeholder="งวด" onKeyPress="return KeyCode(txtTimework)" required/>
												</div>
											</div>
										</div><br>

										<!-- วันสิ้นสุดโครงการ -->
										<div class="row">	
											<div class="list-inline">
												<div class="col-md-offset-1 col-md-2">
													<label><span style="color:red"> * </span>วันสิ้นสุดโครงการ : </label>
												</div>
												<div class="col-md-2">
													<input type="text" id="datepicker-close" name="txtClose" class="form-control input-sm" required/>
													<input type="hidden" id="closework" name="closework" value="0"/>
												</div>
											</div>
										</div>
										<br>
									</div>
									<!-- panel-info -->
														
									<div class="panel panel-violet">
										<div class="panel-heading">
											<h3 class="panel-title"><span class="fa fa-pencil"></span> &nbsp;&nbsp; เงื่อนไขการให้บริการ</h3>
										</div>
										<br>
										
										<div class="row">
											<div class="list-inline">
											<!-- เงื่อนไขการให้บริการ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<input type="checkbox" name="chb[]" id="chb1" value="0"/>
													<input type="hidden" name="chk[]" value="0"/>
													<input type="hidden" name="hid[]" value="รายงานทางการเงินที่สำคัญ"/>
												</div>
												
													<label class="col-md-3" for="chb1"> รายงานทางการเงินที่สำคัญ</label>
																						
													<label class="col-md-2">ไม่เกินทุกวันที่</label>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
															<option></option>
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i" ?>"> <?php echo "$i" ?></option>
														<?php } ?>
													</select>
													<!-- <input type="text" id="txtDatefunction[]" name="txtDatefunction[]" class="form-control input-sm"/> -->
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php $mounth = array(" ", "เดือน มกราคม", "เดือน กุมภาพันธ์", "เดือน มีนาคม", "เดือน เมษายน", "เดือน พฤษภาคม", "เดือน มิถุนายน", "เดือน กรกฎาคม", "เดือน สิงหาคม", "เดือน กันยายน", "เดือน ตุลาคม", "เดือน พฤศจิกายน", "เดือน ธันวาคม");
														foreach ($mounth as $value) { ?>
														    <option value=" <?php echo "$value" ?>"> <?php echo "$value" ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- เงื่อนไขการให้บริการ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<input type="checkbox" name="chb[]" id="chb2" value="1"/>
													<input type="hidden" name="chk[]" value="1"/>
													<input type="hidden" name="hid[]" value="ยื่น ภงด. 1, 2, 3, 53"/>
												</div>
												
													<label class="col-md-3" for="chb2"> ยื่น ภงด. 1, 2, 3, 53</label>
																						
													<label class="col-md-2">ไม่เกินทุกวันที่</label>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<option></option>
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i" ?>"> <?php echo "$i" ?></option>
														<?php } ?>
													</select>
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php foreach ($mounth as $value) { ?>
														    <option value=" <?php echo "$value" ?>"> <?php echo "$value" ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- เงื่อนไขการให้บริการ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<input type="checkbox" name="chb[]" id="chb3" value="2"/>
													<input type="hidden" name="chk[]" value="2"/>
													<input type="hidden" name="hid[]" value="ยื่น ภพ.30 ภธ.40"/>
												</div>
												
													<label class="col-md-3" for="chb3"> ยื่น ภพ.30 ภธ.40</label>
																						
													<label class="col-md-2">ไม่เกินทุกวันที่</label>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<option></option>
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i" ?>"> <?php echo "$i" ?></option>
														<?php } ?>
													</select>
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php foreach ($mounth as $value) { ?>
														    <option value=" <?php echo "$value" ?>"> <?php echo "$value" ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- เงื่อนไขการให้บริการ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<input type="checkbox" name="chb[]" id="chb4" value="3"/>
													<input type="hidden" name="chk[]" value="3"/>
													<input type="hidden" name="hid[]" value="ยื่น ประกันสังคม"/>
												</div>
												
													<label class="col-md-3" for="chb4"> ยื่น ประกันสังคม</label>
																						
													<label class="col-md-2">ไม่เกินทุกวันที่</label>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<option></option>
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i" ?>"> <?php echo "$i" ?></option>
														<?php } ?>
													</select>
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php foreach ($mounth as $value) { ?>
														    <option value=" <?php echo "$value" ?>"> <?php echo "$value" ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- เงื่อนไขการให้บริการ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<input type="checkbox" name="chb[]" id="chb5" value="4" />
													<input type="hidden" name="chk[]" value="4"/>
													<input type="hidden" name="hid[]" value="ปิดงบรายครึ่งปี ยื่น ภงด.51 รายงานทางการเงินที่สำคัญ"/>
												</div>
												
													<label class="col-md-3" for="chb5">ปิดงบรายครึ่งปี ยื่น ภงด.51 รายงานทางการเงินที่สำคัญ</label>
																						
													<label class="col-md-2">ไม่เกินวันที่</label>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<option></option>
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i" ?>"> <?php echo "$i" ?></option>
														<?php } ?>
													</select>
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php foreach ($mounth as $value) { ?>
														    <option value=" <?php echo "$value" ?>"> <?php echo "$value" ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- เงื่อนไขการให้บริการ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<input type="checkbox" name="chb[]" id="chb6" value="5"/>
													<input type="hidden" name="chk[]" value="5"/>
													<input type="hidden" name="hid[]" value="รายงานภาษีหัก ณ ที่จ่ายประจำปี"/>
												</div>
												
													<label class="col-md-3" for="chb6">รายงานภาษีหัก ณ ที่จ่ายประจำปี</label>
																						
													<label class="col-md-2">ไม่เกินวันที่</label>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<option></option>
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i" ?>"> <?php echo "$i" ?></option>
														<?php } ?>
													</select>
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php foreach ($mounth as $value) { ?>
														    <option value=" <?php echo "$value" ?>"> <?php echo "$value" ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- เงื่อนไขการให้บริการ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<input type="checkbox" name="chb[]" id="chb7" value="6"/>
													<input type="hidden" name="chk[]" value="6"/>
													<input type="hidden" name="hid[]" value="ปิดงบรายปี ยื่น ภงด.50 รายงานทางการเงินที่สำคัญ"/>
												</div>
												
													<label class="col-md-3" for="chb7">ปิดงบรายปี ยื่น ภงด.50 รายงานทางการเงินที่สำคัญ</label>
																						
													<label class="col-md-2">ไม่เกินวันที่</label>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<option></option>
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i" ?>"> <?php echo "$i" ?></option>
														<?php } ?>
													</select>
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php foreach ($mounth as $value) { ?>
														    <option value=" <?php echo "$value" ?>"> <?php echo "$value" ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- อื่นๆ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<input type="checkbox" name="chb[]" id="chb8" value="7"/>
													<input type="hidden" name="chk[]" value="7"/>
												</div>
												
													<label class="col-md-1" for="chb8"> เงื่อนไข อื่นๆ</label>
												
												<div class="col-md-4">
													<input type="text" id="hid[]" name="hid[]" class="form-control input-sm" />
												</div>
												
													<label class="col-md-1">ไม่เกินทุกวันที่</label>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<option></option>
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i" ?>"> <?php echo "$i" ?></option>
														<?php } ?>
													</select>
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php foreach ($mounth as $value) { ?>
														    <option value=" <?php echo "$value" ?>"> <?php echo "$value" ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- อื่นๆ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<input type="checkbox" name="chb[]" id="chb9" value="8"/>
													<input type="hidden" name="chk[]" value="8"/>
												</div>
												
													<label class="col-md-1" for="chb9"> เงื่อนไข อื่นๆ</label>
												
												<div class="col-md-4">
													<input type="text" id="hid[]" name="hid[]" class="form-control input-sm" />
												</div>
												
													<label class="col-md-1">ไม่เกินทุกวันที่</label>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<option></option>
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i" ?>"> <?php echo "$i" ?></option>
														<?php } ?>
													</select>
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php foreach ($mounth as $value) { ?>
														    <option value=" <?php echo "$value" ?>"> <?php echo "$value" ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div><br>
									</div> <!-- panel-info -->

									<div class="panel panel-violet">
										<div class="panel-heading">
											<h3 class="panel-title"><span class="fa fa-pencil"></span> &nbsp;&nbsp; เอกสาร</h3>
										</div>
										<br>

										<div class="row">
											<div class="list-inline">
												<!-- ใบเสนอราคา -->
												<div class="col-md-offset-1 col-md-2">
													<label><span style="color:red"> * </span>ใบเสนอราคา :</label>
												</div>
												<div class="col-md-2">
													<input type="text" id="datepicker-quotation" name="txtDatequo" class="form-control input-sm" placeholder="วันที่เสนอราคา" /> 
												</div>
												<div class="col-md-2">
													<input type="text" id="txtPricequo" name="txtPricequo" class="form-control input-sm" placeholder="ยอดเงินรวม" onKeyPress="return KeyCode(txtPricequo)"/> 
												</div>
												<div class="col-md-2">
													<input type="text" id="txtDocquo" name="txtDocquo" class="form-control input-sm" placeholder="เลขที่ใบเสนอราคา" /> 
												</div>
												<div class="col-md-3">
													<!--<input type="file" id="txtPathquo" name="txtPathquo" class="form-control input-sm" />-->
													<div style="position:relative;">
								                      <a class='btn btn-primary' href='javascript:;'> Choose File...
								                      <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
								                      -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
								                      color:transparent;' name="txtPathquo" size="50"  onchange='$("#upload-file").html($(this).val());'>
								                      </a> &nbsp; <span class='label label-info' id="upload-file"></span></div> 
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
												<!-- สัญญาจ้าง -->
												<div class="col-md-offset-1 col-md-2">
													<label><span style="color:red"> * </span>สัญญาจ้าง :</label>
												</div>
												<div class="col-md-2">
													<input type="text" id="datepicker-convention" name="txtDatecon" class="form-control input-sm" placeholder="วันที่เสนอราคา" /> 
												</div>
												<div class="col-md-2">
													<input type="text" id="txtPricecon" name="txtPricecon" class="form-control input-sm" placeholder="ยอดเงินรวม" onKeyPress="return KeyCode(txtPricecon)"/> 
												</div>
												<div class="col-md-2">
													<input type="text" id="txtDoccon" name="txtDoccon" class="form-control input-sm" placeholder="เลขที่ใบเสนอราคา" /> 
												</div>
												<div class="col-md-3">
													<!--<input type="file" id="txtPathcon" name="txtPathcon" class="form-control input-sm" />-->
													<div style="position:relative;">
								                      <a class='btn btn-primary' href='javascript:;'> Choose File...
								                      <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
								                      -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
								                      color:transparent;' name="txtPathcon" size="50"  onchange='$("#upload-file1").html($(this).val());'>
								                      </a> &nbsp; <span class='label label-info' id="upload-file1"></span></div> 
												</div>
											</div>
										</div><br>
										
										<div class="modal-footer">
											<center>
												<p align = "center"><span style="color:red"> * <label>หมายเหตุ!!! : กรุณากรอกข้อมูลให้ครบทุกช่อง ก่อนบันทึก</label></span></p>
												<input type="submit" class="btn btn-success" value="บันทึก"/>
												<input type="reset" class="btn btn-warning" value="ล้างข้อมูล"/>
												<a class="btn btn-danger" href="de_customer_gen.php?cusnew=<?php echo ("$_GET[cusnew]") ?>" onclick="return confirm('Are you sure you want to delete? : <?php echo ("$_GET[cusnew]") ?>');"><span class="fa fa-trash-o">ยกเลิก</span></a>
											</center>
										</div>
									</div> <!-- panel-info -->
								</form>
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
			header("Location: workdata.php");
		}

	$conn->close(); ?>

<!-- Autocomplete -->
<script type="text/javascript" src="inc/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="inc/bootstrap/js/script.js"></script>

<!-- Ajax list -->
<script type="text/javascript" src="inc/bootstrap/js/scriptm.js"></script>

	<script src="script/jquery-1.10.2.min.js"></script>
    <script src="script/jquery-migrate-1.2.1.min.js"></script>
    <script src="script/jquery-ui.js"></script>
    <script src="script/bootstrap.min.js"></script>
    <script src="script/jquery.min.js"></script>
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

<!-- Datepicker JavaScript -->
<script type="text/javascript" src="inc/bootstrap/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="inc/bootstrap/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>

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
	
<script type="text/javascript">
$(function () {
	var a = new Date();
	var toDay = a.getDate() + '/' + (a.getMonth() + 1) + '/' + (a.getFullYear() + 543);

	$("#datepicker-start").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
		dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
		monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
		monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

$("#datepicker-end").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
		dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
		monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
		monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

	$("#datepicker-work").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
		dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
		monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
		monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

$("#datepicker-work").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
		dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
		monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
		monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

	$("#datepicker-quotation").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
		dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
		monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
		monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

$("#datepicker-convention").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
		dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
		monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
		monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

$("#datepicker-close").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
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