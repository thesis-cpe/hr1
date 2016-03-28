<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Edit Work ::.</title>
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
								<form action="sc_updatework.php" method="post" enctype="multipart/form-data">
									<div class="panel panel-violet">
										<div class="panel-heading">
											<h3 class="panel-title"><span class="fa fa-edit"></span> &nbsp;&nbsp; ต้นทุนงาน</h3>
										</div><br>
										
										<!-- เพิ่มทีมงาน -->
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

							        <div class="panel panel-violet">
										<div class="panel-heading">
											<h3 class="panel-title"><span class="fa fa-edit"></span> &nbsp;&nbsp; ข้อมูลงาน</h3>
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

										<?php
											$sqli = ("SELECT * FROM work_details WHERE fk_n_customer_id=$_GET[cusnew]");
											$resulti = $conn->query($sqli);
											$rowi = $resulti->fetch_assoc();
										?>
										<!-- รอบบัญชี -->
										<div class="row">	
											<div class="list-inline">
												<div class="col-md-offset-1 col-md-2">
													<label><span style="color:red"> * </span>รอบบัญชีที่รับทำ : </label>
												</div>
												<div class="col-md-2">
													<input type="text" id="datepicker-start" name="txtDatestart" class="form-control input-sm" value="<?php echo $rowi['work_start']; ?>" required/>
												</div>
												<div class="col-md-1">
													<label><span style="color:red"> * </span>ถึง </label>
												</div>
												<div class="col-md-2">
													<input type="text" id="datepicker-end" name="txtDateend" class="form-control input-sm" value="<?php echo $rowi['work_end']; ?>"required/>
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
													<input type="text" id="datepicker-work" name="txtWorkstart" class="form-control input-sm" value="<?php echo $rowi['work_receip_dat']; ?>" required/>
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
													<select class="form-control input-sm" name="list2">
														<option value="<?php if($rowi['work_coast_choice']==0){echo ("รายเดือน");}else{echo ("รายครั้ง");} ?>"><?php if($rowi['work_coast_choice']==0){echo ("รายเดือน");}else{echo ("รายครั้ง");} ?></option>
														<option value="0">รายเดือน</option>
														<option value="1">รายครั้ง</option>
													</select>
												</div>
												<div class="col-md-2">
													<input type="text" id="txtSalary" name="txtSalary" class="form-control input-sm" placeholder="บาท" value="<?php echo $rowi['work_coast_bath']; ?>" onKeyPress="return KeyCode(txtSalary)"required/>
												</div>
												<div class="col-md-2">
													<label><span style="color:red"> * </span>งวดงาน : </label>
												</div>
												<div class="col-md-2">
													<input type="text" id="txtTimework" name="txtTimework" class="form-control input-sm" placeholder="งวด" value="<?php echo $rowi['work_period']; ?>" onKeyPress="return KeyCode(txtTimework)" required/>
												</div>
											</div>
										</div><br>
									</div><!-- panel-info -->

								<?php
									$sql = ("SELECT condition_check FROM conditions WHERE n_customer_id=$_GET[cusnew]");
									$result = $conn->query($sql);
									
									$condion_arr = array();
									$idx_condion_arr = 0;
										while ($arrCheckCondition = $result->fetch_array()) {
											//echo  $arrCheckCondition['condition_check'];
											$condion_arr[$idx_condion_arr] = $arrCheckCondition['condition_check'];
											$idx_condion_arr++;
											//echo $condion_arr['$idx_condion_arr'] ;
										}
									
								?>
															
									<div class="panel panel-violet">
										<div class="panel-heading">
											<h3 class="panel-title"><span class="fa fa-edit"></span> &nbsp;&nbsp; เงื่อนไขการให้บริการ</h3>
										</div>
										<br>
										
										<div class="row">
											<div class="list-inline">
											<!-- เงื่อนไขการให้บริการ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<?php if(in_array(0, $condion_arr)==1){ ?>
															<input type="checkbox" name="chb[]" id="chb1" value="0" checked /> 
													<?php }else{ ?>
															<input type="checkbox" name="chb[]" id="chb1" value="0" /> 
													<?php } ?>
													<input type="hidden" name="chk[]" value="0"/>
													<input type="hidden" name="hid[]" value="รายงานทางการเงินที่สำคัญ"/>
												</div>
																									
													<label class="col-md-3" for="chb1"> รายงานทางการเงินที่สำคัญ</label>
																						
													<label class="col-md-2">ไม่เกินทุกวันที่</label>
													<?php
													$sqlz = ("SELECT condition_dat,condition_month FROM conditions WHERE n_customer_id=$_GET[cusnew] AND condition_check=0");
													$resultz = $conn->query($sqlz);
													$rowz = $resultz->fetch_assoc();
													?>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<?php if(in_array(0, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_dat']; ?>"><?php echo $rowz['condition_dat']; ?></option>
														<?php } ?>
															<option></option>;
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i"; ?>"> <?php echo "$i"; ?></option>
														<?php } ?>

													</select>
													<!-- <input type="text" id="txtDatefunction[]" name="txtDatefunction[]" class="form-control input-sm"/> -->
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php $mounth = array(" ", "เดือน มกราคม", "เดือน กุมภาพันธ์", "เดือน มีนาคม", "เดือน เมษายน", "เดือน พฤษภาคม", "เดือน มิถุนายน", "เดือน กรกฎาคม", "เดือน สิงหาคม", "เดือน กันยายน", "เดือน ตุลาคม", "เดือน พฤศจิกายน", "เดือน ธันวาคม");
														if(in_array(0, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_month']; ?>"><?php echo $rowz['condition_month']; ?></option>
														<?php } 

														foreach ($mounth as $ar) { ?>
														    <option value=" <?php echo "$ar"; ?>"> <?php echo "$ar"; ?></option>
														<?php } ?>

													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- เงื่อนไขการให้บริการ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<?php if(in_array(1, $condion_arr)==1){ ?>
															<input type="checkbox" name="chb[]" id="chb2" value="1" checked /> 
													<?php }else{ ?>
															<input type="checkbox" name="chb[]" id="chb2" value="1" />
													<?php } ?>
													<input type="hidden" name="chk[]" value="1"/>
													<input type="hidden" name="hid[]" value="ยื่น ภงด. 1, 2, 3, 53"/>
												</div>
												
													<label class="col-md-3" for="chb2"> ยื่น ภงด. 1, 2, 3, 53</label>
																						
													<label class="col-md-2">ไม่เกินทุกวันที่</label>
													<?php
													$sqlz = ("SELECT condition_dat,condition_month FROM conditions WHERE n_customer_id=$_GET[cusnew] AND condition_check=1");
													$resultz = $conn->query($sqlz);
													$rowz = $resultz->fetch_assoc();
													?>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<?php if(in_array(1, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_dat']; ?>"><?php echo $rowz['condition_dat']; ?></option>
														<?php } ?>
															<option></option>;
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i"; ?>"> <?php echo "$i"; ?></option>
														<?php } ?>

													</select>
													<!-- <input type="text" id="txtDatefunction[]" name="txtDatefunction[]" class="form-control input-sm"/> -->
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php if(in_array(1, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_month']; ?>"><?php echo $rowz['condition_month']; ?></option>
														<?php } 

														foreach ($mounth as $ar) { ?>
														    <option value=" <?php echo "$ar"; ?>"> <?php echo "$ar"; ?></option>
														<?php } ?>

													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- เงื่อนไขการให้บริการ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<?php if(in_array(2, $condion_arr)==1){ ?>
															<input type="checkbox" name="chb[]" id="chb3" value="2" checked />
													<?php }else{ ?>
															<input type="checkbox" name="chb[]" id="chb3" value="2" />
													<?php } ?>
													<input type="hidden" name="chk[]" value="2"/>
													<input type="hidden" name="hid[]" value="ยื่น ภพ.30 ภธ.40"/>
												</div>
												
													<label class="col-md-3" for="chb3"> ยื่น ภพ.30 ภธ.40</label>
																						
													<label class="col-md-2">ไม่เกินทุกวันที่</label>
												
													<?php
													$sqlz = ("SELECT condition_dat,condition_month FROM conditions WHERE n_customer_id=$_GET[cusnew] AND condition_check=2");
													$resultz = $conn->query($sqlz);
													$rowz = $resultz->fetch_assoc();
													?>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<?php if(in_array(2, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_dat']; ?>"><?php echo $rowz['condition_dat']; ?></option>
														<?php } ?>
															<option></option>;
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i"; ?>"> <?php echo "$i"; ?></option>
														<?php } ?>

													</select>
													<!-- <input type="text" id="txtDatefunction[]" name="txtDatefunction[]" class="form-control input-sm"/> -->
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php if(in_array(2, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_month']; ?>"><?php echo $rowz['condition_month']; ?></option>
														<?php } 

														foreach ($mounth as $ar) { ?>
														    <option value=" <?php echo "$ar"; ?>"> <?php echo "$ar"; ?></option>
														<?php } ?>

													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- เงื่อนไขการให้บริการ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<?php if(in_array(3, $condion_arr)==1){ ?>
															<input type="checkbox" name="chb[]" id="chb4" value="3" checked />
													<?php }else{ ?>
															<input type="checkbox" name="chb[]" id="chb4" value="3" />
													<?php } ?>
													<input type="hidden" name="chk[]" value="3"/>
													<input type="hidden" name="hid[]" value="ยื่น ประกันสังคม"/>
												</div>
												
													<label class="col-md-3" for="chb4"> ยื่น ประกันสังคม</label>
																						
													<label class="col-md-2">ไม่เกินทุกวันที่</label>
												
													<?php
													$sqlz = ("SELECT condition_dat,condition_month FROM conditions WHERE n_customer_id=$_GET[cusnew] AND condition_check=3");
													$resultz = $conn->query($sqlz);
													$rowz = $resultz->fetch_assoc();
													?>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<?php if(in_array(3, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_dat']; ?>"><?php echo $rowz['condition_dat']; ?></option>
														<?php } ?>
															<option></option>;
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i"; ?>"> <?php echo "$i"; ?></option>
														<?php } ?>

													</select>
													<!-- <input type="text" id="txtDatefunction[]" name="txtDatefunction[]" class="form-control input-sm"/> -->
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php if(in_array(3, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_month']; ?>"><?php echo $rowz['condition_month']; ?></option>
														<?php } 

														foreach ($mounth as $ar) { ?>
														    <option value=" <?php echo "$ar"; ?>"> <?php echo "$ar"; ?></option>
														<?php } ?>

													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- เงื่อนไขการให้บริการ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<?php if(in_array(4, $condion_arr)==1){ ?>
															<input type="checkbox" name="chb[]" id="chb5" value="4" checked />
													<?php }else{ ?>
															<input type="checkbox" name="chb[]" id="chb5" value="4" /> 
													<?php } ?>
													<input type="hidden" name="chk[]" value="4" />
													<input type="hidden" name="hid[]" value="ปิดงบรายครึ่งปี ยื่น ภงด.51 รายงานทางการเงินที่สำคัญ"/>
												</div>
												
													<label class="col-md-3" for="chb5">ปิดงบรายครึ่งปี ยื่น ภงด.51 รายงานทางการเงินที่สำคัญ</label>
																						
													<label class="col-md-2">ไม่เกินวันที่</label>
												
													<?php
													$sqlz = ("SELECT condition_dat,condition_month FROM conditions WHERE n_customer_id=$_GET[cusnew] AND condition_check=4");
													$resultz = $conn->query($sqlz);
													$rowz = $resultz->fetch_assoc();
													?>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<?php if(in_array(4, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_dat']; ?>"><?php echo $rowz['condition_dat']; ?></option>
														<?php } ?>
															<option></option>;
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i"; ?>"> <?php echo "$i"; ?></option>
														<?php } ?>

													</select>
													<!-- <input type="text" id="txtDatefunction[]" name="txtDatefunction[]" class="form-control input-sm"/> -->
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php if(in_array(4, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_month']; ?>"><?php echo $rowz['condition_month']; ?></option>
														<?php } 

														foreach ($mounth as $ar) { ?>
														    <option value=" <?php echo "$ar"; ?>"> <?php echo "$ar"; ?></option>
														<?php } ?>

													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- เงื่อนไขการให้บริการ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<?php if(in_array(5, $condion_arr)==1){ ?>
															<input type="checkbox" name="chb[]" id="chb6" value="5" checked />
													<?php }else{ ?>
															<input type="checkbox" name="chb[]" id="chb6" value="5" />
													<?php } ?>
													<input type="hidden" name="chk[]" value="5"/>
													<input type="hidden" name="hid[]" value="รายงานภาษีหัก ณ ที่จ่ายประจำปี"/>
												</div>
												
													<label class="col-md-3" for="chb6">รายงานภาษีหัก ณ ที่จ่ายประจำปี</label>
																						
													<label class="col-md-2">ไม่เกินวันที่</label>
												
													<?php
													$sqlz = ("SELECT condition_dat,condition_month FROM conditions WHERE n_customer_id=$_GET[cusnew] AND condition_check=5");
													$resultz = $conn->query($sqlz);
													$rowz = $resultz->fetch_assoc();
													?>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<?php if(in_array(5, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_dat']; ?>"><?php echo $rowz['condition_dat']; ?></option>
														<?php } ?>
															<option></option>;
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i"; ?>"> <?php echo "$i"; ?></option>
														<?php } ?>

													</select>
													<!-- <input type="text" id="txtDatefunction[]" name="txtDatefunction[]" class="form-control input-sm"/> -->
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php if(in_array(5, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_month']; ?>"><?php echo $rowz['condition_month']; ?></option>
														<?php } 

														foreach ($mounth as $ar) { ?>
														    <option value=" <?php echo "$ar"; ?>"> <?php echo "$ar"; ?></option>
														<?php } ?>

													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- เงื่อนไขการให้บริการ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<?php if(in_array(6, $condion_arr)==1){ ?>
															<input type="checkbox" name="chb[]" id="chb7" value="6" checked />
													<?php }else{ ?>
															<input type="checkbox" name="chb[]" id="chb7" value="6" />
													<?php } ?>
													<input type="hidden" name="chk[]" value="6"/>
													<input type="hidden" name="hid[]" value="ปิดงบรายปี ยื่น ภงด.50 รายงานทางการเงินที่สำคัญ"/>
												</div>
												
													<label class="col-md-3" for="chb7">ปิดงบรายปี ยื่น ภงด.50 รายงานทางการเงินที่สำคัญ</label>
																						
													<label class="col-md-2">ไม่เกินวันที่</label>
												
													<?php
													$sqlz = ("SELECT condition_dat,condition_month FROM conditions WHERE n_customer_id=$_GET[cusnew] AND condition_check=6");
													$resultz = $conn->query($sqlz);
													$rowz = $resultz->fetch_assoc();
													?>
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<?php if(in_array(6, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_dat']; ?>"><?php echo $rowz['condition_dat']; ?></option>
														<?php } ?>
															<option></option>;
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i"; ?>"> <?php echo "$i"; ?></option>
														<?php } ?>

													</select>
													<!-- <input type="text" id="txtDatefunction[]" name="txtDatefunction[]" class="form-control input-sm"/> -->
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php if(in_array(6, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_month']; ?>"><?php echo $rowz['condition_month']; ?></option>
														<?php } 

														foreach ($mounth as $ar) { ?>
														    <option value=" <?php echo "$ar"; ?>"> <?php echo "$ar"; ?></option>
														<?php } ?>

													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- อื่นๆ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<?php if(in_array(7, $condion_arr)==1){ ?>
															<input type="checkbox" name="chb[]" id="chb8" value="7" checked />
													<?php }else{ ?>
															<input type="checkbox" name="chb[]" id="chb8" value="7" />
													<?php } ?>
													<input type="hidden" name="chk[]" value="7"/>
												</div>
												
													<label class="col-md-1" for="chb8"> เงื่อนไข อื่นๆ</label>

													<?php
													$sqlz = ("SELECT condition_name,condition_dat,condition_month FROM conditions WHERE n_customer_id=$_GET[cusnew] AND condition_check=7");
													$resultz = $conn->query($sqlz);
													$rowz = $resultz->fetch_assoc();
													?>
												
												<div class="col-md-4">
													<input type="text" id="hid[]" name="hid[]" class="form-control input-sm" value="<?php echo $rowz['condition_name']; ?>"/>
												</div>
												
													<label class="col-md-1">ไม่เกินทุกวันที่</label>
												
												
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<?php if(in_array(7, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_dat']; ?>"><?php echo $rowz['condition_dat']; ?></option>
														<?php } ?>
															<option></option>;
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i"; ?>"> <?php echo "$i"; ?></option>
														<?php } ?>

													</select>
													<!-- <input type="text" id="txtDatefunction[]" name="txtDatefunction[]" class="form-control input-sm"/> -->
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php if(in_array(7, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_month']; ?>"><?php echo $rowz['condition_month']; ?></option>
														<?php } 

														foreach ($mounth as $ar) { ?>
														    <option value=" <?php echo "$ar"; ?>"> <?php echo "$ar"; ?></option>
														<?php } ?>

													</select>
												</div>
											</div>
										</div><br>
										
										<div class="row">
											<div class="list-inline">
											<!-- อื่นๆ -->
												<div class="col-sm-2 col-md-offset-1 col-md-1">
													<?php if(in_array(8, $condion_arr)==1){ ?>
															<input type="checkbox" name="chb[]" id="chb9" value="8" checked />
													<?php }else{ ?>
															<input type="checkbox" name="chb[]" id="chb9" value="8" /> 
													<?php } ?>
													<input type="hidden" name="chk[]" value="8"/>
												</div>
												
													<label class="col-md-1" for="chb9"> เงื่อนไข อื่นๆ</label>

												<?php
													$sqlz = ("SELECT condition_name,condition_dat,condition_month FROM conditions WHERE n_customer_id=$_GET[cusnew] AND condition_check=8");
													$resultz = $conn->query($sqlz);
													$rowz = $resultz->fetch_assoc();
												?>

												<div class="col-md-4">
													<input type="text" id="hid[]" name="hid[]" class="form-control input-sm" value="<?php echo $rowz['condition_name']; ?>"/>
												</div>
												
													<label class="col-md-1">ไม่เกินทุกวันที่</label>
												
												
												
												<div class="col-md-2">
													<select name="txtDatefunction[]" class="form-control input-sm">
														<?php if(in_array(8, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_dat']; ?>"><?php echo $rowz['condition_dat']; ?></option>
														<?php } ?>
															<option></option>;
														<?php for($i=1;$i<=31;$i++){ ?>
																<option value=" <?php echo "$i"; ?>"> <?php echo "$i"; ?></option>
														<?php } ?>

													</select>
													<!-- <input type="text" id="txtDatefunction[]" name="txtDatefunction[]" class="form-control input-sm"/> -->
												</div>
												
												<div class="col-md-2">
													<select class="form-control input-sm" name="txtMonthfunction[]">
														<?php if(in_array(8, $condion_arr)==1){ ?>
															<option value="<?php echo $rowz['condition_month']; ?>"><?php echo $rowz['condition_month']; ?></option>
														<?php } 

														foreach ($mounth as $ar) { ?>
														    <option value=" <?php echo "$ar"; ?>"> <?php echo "$ar"; ?></option>
														<?php } ?>

													</select>
												</div>
											</div>
										</div><br>
									</div> <!-- panel-info -->

									<div class="panel panel-violet">
										<div class="panel-heading">
											<h3 class="panel-title"><span class="fa fa-edit"></span> &nbsp;&nbsp; เอกสาร</h3>
										</div>
										<br>
										
										<?php
											$sqll = ("SELECT * FROM quotation WHERE fk_n_customer_id=$_GET[cusnew]");
											$resultl = $conn->query($sqll);
											$rowl = $resultl->fetch_assoc();
										?>
										<div class="row">
											<div class="list-inline">
												<!-- ใบเสนอราคา -->
												<div class="col-md-offset-1 col-md-2">
													<label><span style="color:red"> * </span>ใบเสนอราคา :</label>
												</div>
												<div class="col-md-2">
													<input type="text" id="datepicker-quotation" name="txtDatequo" class="form-control input-sm" value="<?php echo $rowl['quotation_date']; ?>" placeholder="วันที่เสนอราคา"/> 
												</div>
												<div class="col-md-2">
													<input type="text" id="txtPricequo" name="txtPricequo" class="form-control input-sm" value="<?php echo $rowl['quotation_price']; ?>" placeholder="ยอดเงินรวม" onKeyPress="return KeyCode(txtPricequo)"/> 
												</div>
												<div class="col-md-2">
													<input type="text" id="txtDocquo" name="txtDocquo" class="form-control input-sm" value="<?php echo $rowl['quotation_no']; ?>" placeholder="เลขที่ใบเสนอราคา" /> 
												</div>
												
												<div class="col-md-3">
													<!--<input type="file" id="txtPathquo" name="txtPathquo" class="form-control input-sm" />-->
													<div style="position:relative;">
								                      <a class='btn btn-primary' href='javascript:;'> Choose File...
								                      <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
								                      -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
								                      color:transparent;' name="txtPathquo" size="50"  onchange='$("#upload-file").html($(this).val());'>
								                      </a> &nbsp; <span class='label label-info' id="upload-file"></span></div>
													<span><a href="<?php echo $rowl['quotation_path']; ?>">download</a><span> 
												</div>
											</div>
										</div><br>
										
										<?php
											$sqlj = ("SELECT * FROM convention WHERE fk_n_customer_id=$_GET[cusnew]");
											$resultj = $conn->query($sqlj);
											$rowj = $resultj->fetch_assoc();
										?>
										<div class="row">
											<div class="list-inline">
												<!-- สัญญาจ้าง -->
												<div class="col-md-offset-1 col-md-2">
													<label><span style="color:red"> * </span>สัญญาจ้าง :</label>
												</div>
												<div class="col-md-2">
													<input type="text" id="datepicker-convention" name="txtDatecon" class="form-control input-sm" value="<?php echo $rowj['convention_date']; ?>" placeholder="วันที่เสนอราคา"/> 
												</div>
												<div class="col-md-2">
													<input type="text" id="txtPricecon" name="txtPricecon" class="form-control input-sm" value="<?php echo $rowj['convention_price']; ?>" placeholder="ยอดเงินรวม" onKeyPress="return KeyCode(txtPricecon)"/> 
												</div>
												<div class="col-md-2">
													<input type="text" id="txtDoccon" name="txtDoccon" class="form-control input-sm" value="<?php echo $rowj['convention_no']; ?>" placeholder="เลขที่ใบเสนอราคา" /> 
													
												</div>
												<div class="col-md-3">
													<!--<input type="file" id="txtPathcon" name="txtPathcon" class="form-control input-sm" />-->
													<div style="position:relative;">
								                      <a class='btn btn-primary' href='javascript:;'> Choose File...
								                      <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
								                      -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
								                      color:transparent;' name="txtPathcon" size="50"  onchange='$("#upload-file").html($(this).val());'>
								                      </a> &nbsp; <span class='label label-info' id="upload-file"></span></div>
													<span><a href="<?php echo $rowj['convention_path']; ?>">download</a></span>
												</div>
											</div>
										</div><br>

										<div class="modal-footer">
											<center>
												<p align = "center"><span style="color:red"> * <label>หมายเหตุ!!! : กรุณากรอกข้อมูลให้ครบทุกช่อง ก่อนบันทึก</label></span></p>
												<button class="btn btn-success " type="submit" >บันทึก</button>
												<button class="btn btn-warning " type="reset" >ล้างข้อมูล</button>
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

<!-- Datepicker JavaScript -->
<script type="text/javascript" src="inc/bootstrap/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="inc/bootstrap/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>

	
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