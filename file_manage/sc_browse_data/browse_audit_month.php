<?php
  @session_start(); 
include_once('../inc/config.php');
 include_once('../inc/connect.php');
@$txtdate = $_GET['datepicker-th7'];  //วันนท่ทำงาน  
@$txtEmId = $_GET['txtEmId']; //รหัสพนักงาน
@$txtComId = $_GET['selCustomerId']; //รหัสบริษัทที่รับผืดชอบ
@$txtYearAudit = $_GET['txtYearAudit'];//ปีบัญชี
@$selMonthTax = $_GET['selMonthTax']; //เดือนภาษี
//$selCustomerId = $_GET['selCustomerId'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: ข้อมูลจัดทำบัญชี - ประจำเดือน ::.</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../sb-admin/startbootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="../sb-admin/startbootstrap/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--Loading bootstrap css-->
    <!-- Custom Fonts -->
    <link type="text/css" rel="stylesheet" href="../styles/font-awesome-4.1.0/css/font-awesome.min.css" >
    <link type="text/css" rel="stylesheet" href="../styles/jquery-ui-1.10.4.custom.min.css">
	<link type="text/css" rel="stylesheet" href="../styles/font-awesome.min.css"> 
    <link type="text/css" rel="stylesheet" href="../styles/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="../styles/main.css">
    <link type="text/css" rel="stylesheet" href="../styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="../styles/jquery.news-ticker.css">
    <link rel="stylesheet" type="text/css" href="../inc/bootstrap/css/jquery-ui.css">
	
	

</head>
<body>
<?php
    if(isset($_SESSION['user']))
    {
        include_once('../inc/config.php');
        include_once('../inc/connect.php');
		$session_login = $_SESSION['login'];
?>
    <div> 
        <div id="wrapper">
            <?php include_once('inc/topbar.php'); ?>
            <?php include_once('inc/menu.php'); ?>
            <div id="page-wrapper">
                <div class="page-content">
                    <div id="sum_box" class="row">
                        
                            <div class="col-lg-12">
                                 <!--CODE-->
								<div class="panel panel-success">
											<div class="panel-heading">
												<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> &nbsp;&nbsp;  ข้อมูลการจัดทำบัญชีประจำเดือน </h3>
											</div>
											
											<div class="panel-body">
												<div class="panel-body">

												  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
									  <div class="panel panel-default">
										<div class="panel-heading" role="tab" id="headingOne">
										  <h5 class="panel-title">
											<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
											  ข้อมูลที่เรียกดู
											</a>
										  </h5>
										</div>
										<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
										  <div class="panel-body">
									<!--TABLE-->
								   <div class="table-responsive"> 
									<table  class="table table-hover">
										<!--head table-->
										  <tr>
														<th width="200"><center>นำเข้าข้อมูล</th>
														<th>รหัสงานบริษัท</th>
														<th width="241"><center>กิจกรรม</center></th>
														<!--<th width="135"><center>วันสุดท้ายของระบบ</center></th> -->
														<th width="92"><center>เสร็จ/ไม่เสร็จ</center></th>
														<th width="135"><center>วันที่เสร็จ</center></th>
														<th width="125"><center>ความคืบหน้า%</center></th>
														<th width="141"><center>การสอบทาน</center></th>
														<th width="125"><center>วันที่สอบทาน</center></th>
														<th width="182"><center>ปัญหา</center></th>
														<th width="181"><center>ความเห็น/ลบรายงาน</center></th>
										 </tr>
										<!--.head table-->
										<?php 
													/*if($txtdate!=NULL)
													{
														$sql = "SELECT * FROM audit_rc_mth WHERE audit_rc_m_imp_dat = '$date'";
														

													}elseif ($txtEmId!=NULL) {
														
														$sql = "SELECT * FROM audit_rc_mth WHERE audit_rc_m_import_who = $txtEmId";
														

													}elseif ($txtComId!=NULL) {
														
														$sql = "SELECT * FROM audit_rc_mth WHERE fk_n_customer_id = $txtComId";
														

													}elseif ($txtYearAudit!=NULL) {
														
														$sql = "SELECT * FROM audit_rc_mth WHERE audit_rc_m_yt = $txtYearAudit";
														
														
													}
													elseif ($selMonthTax!=NULL ) {
														
														$sql = "SELECT * FROM audit_rc_mth WHERE audit_rc_m_mt = ' $selMonthTax'";
														
														

													}else
													{
													 //echo "กรุณากรอกข้อมูลเพื่อทำการค้นหา";
													  $sql = "SELECT * FROM  audit_rc_mth";
													} 
													*/
													
													$sql = "SELECT * FROM audit_rc_mth";
													$count = 0;
													$keyword= "เรียกดู";
													if($txtdate!=NULL)
													{
														$sql = $sql." WHERE audit_rc_m_imp_dat = '$txtdate'";
														$count++;
														$keyword = $keyword." วันที่นำเข้าข้อมูล = $txtdate";
													}
													if($txtEmId!=NULL)
													{
														if($count == 0)
														{
															$sql = $sql." WHERE audit_rc_m_import_who = $txtEmId";
														}
														else{
															$sql = $sql." AND audit_rc_m_import_who = $txtEmId";
														}
														$count++;
														$keyword = $keyword." รหัสพนักงาน = $txtEmId";
													}
													if($txtComId!=NULL)
													{
														if($count == 0)
														{
															$sql = $sql." WHERE fk_n_customer_id = $txtComId";
														}
														else
														{
															$sql = $sql." AND fk_n_customer_id = $txtComId";
														}
														$count++;
														$keyword = $keyword." รหัสงานบริษัท = $txtComId";
													}
													if($txtYearAudit!=NULL)
													{
														if($count == 0)
														{
															$sql = $sql." WHERE audit_rc_m_yt = $txtYearAudit";
														}
														else
														{
															$sql = $sql." AND audit_rc_m_yt = $txtYearAudit";
														}
														$count++;
														$keyword = $keyword." ปีบัญชี = $txtYearAudit";
													}
													if($selMonthTax!=NULL)
													{
														if($count == 0)
														{
															$sql = $sql." WHERE audit_rc_m_mt = $selMonthTax";
														}
														else
														{
															$sql = $sql." AND audit_rc_m_mt = $selMonthTax";
														}
														
														$keyword = $keyword." เดือนภาษี = $selMonthTax";
													}
													
													echo $keyword;
												    
										   
											$querysql =  $conn->query($sql);
											
											while($arrBrowse = $querysql->fetch_array())
											{
												  $id = $arrBrowse['audit_rc_m_id'];
												  $date = $arrBrowse['audit_rc_m_imp_dat'];
												  $activity = $arrBrowse['audit_rc_m_activity'];
												  //$deadline = $arrBrowse['audit_rc_m_activity'];
												  $completeDat = $arrBrowse['audit_rc_m_complete_dat'];
												  $progress = $arrBrowse['audit_rc_m_progress'];
												  $valid = $arrBrowse['audit_rc_m_valid'];
												  $validDat = $arrBrowse['audit_rc_m_valid_dat'];
												  //$path = $arrBrowse['audit_rc_m_imp_dat'];
												  $problem = $arrBrowse['audit_rc_m_problem'];
												  $descri = $arrBrowse['audit_rc_mth_descri'];
												  $complete = $arrBrowse['audit_rc_m_complete'];
												  $import_id = $arrBrowse['audit_rc_m_import_who'];
												  $customer_id = $arrBrowse['fk_n_customer_id'];
											   
											?>
											<tr>
													<td><center><?php echo $date; ?></center></td>
													<td><?php echo $customer_id; ?></td>
													<td><center><?php echo $activity; ?></center></td>
													<!--<td>วันสุดท้ายของระบ</td> --> 
													<td><center><?php echo $complete; ?></center></td>
													<td><center><?php echo $completeDat; ?></center></td>
													<td><center><?php echo $progress; ?></center></td>
													<!--การสอบทาน เดี๋ยวทำเป็นลิงค์ MODAL-->
													<td>
														<center>
															<?php 
																if($valid=="สอบทาน"){ ?>
																<a class="btn btn-success btn-sm" title="สอบทานแล้ว" data-toggle="modal" data-target="#btnvalid<?php echo $arrBrowse['audit_rc_m_id']; ?>"><span class="glyphicon glyphicon-ok"></span></a>
															<?php }
															  else{  ?>
																<a class="btn btn-red btn-sm" title="ยังไม่สอบทาน" data-toggle="modal" data-target="#btnvalid<?php echo $arrBrowse['audit_rc_m_id']; ?>"><span class="glyphicon glyphicon-remove"></span></a>
															  <?php }?>
														</center>
													</td>
													<!--MODAL valid-->
														<div class="modal fade" id="btnvalid<?php echo $arrBrowse['audit_rc_m_id']; ?>">
															  <div class="modal-dialog">
																<div class="modal-content">
																  <div class="modal-header">
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																	<center><h5 class="modal-title">การสอบทาน</h5></center>
																  </div>
																  <div class="modal-body">
																		<form method="POST" action="sc_valid.php">
																			<div class="row">
																				<div class="col-md-12">
																					<center>
																						<input type="radio" name="radvalid" id="yes" value="สอบทาน" <?php if($arrBrowse['audit_rc_m_valid']=="สอบทาน")echo"checked"; ?>/>&nbsp;
																						<label for="yes">สอบทานแล้ว</label><br>
																						<br><input type="radio" name="radvalid" id="no" value="ไม่สอบทาน" <?php if($arrBrowse['audit_rc_m_valid']=="ไม่สอบทาน")echo"checked"; ?>/>&nbsp;
																						<label for="no">ไม่ได้สอบทาน</label>
																					</center>
																				</div>
																			</div>
																	</div>
																  <div class="modal-footer">
																	<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
																	<button type="submit" class="btn btn-primary">บันทึก</button>
																  </div>
																</div><!-- /.modal-content -->
																		</form> 
															  </div><!-- /.modal-dialog -->
														</div><!-- /.modal -->

													<!--.MODAL valid-->
													
													<td><center><?php echo $validDat;  ?></center></td>
												   <!-- <td>&nbsp;</td> -->
													<td><center><?php echo $problem;  ?></center></td>
												
												<!--ส่วนคำแนะนำ-->
												<td>
												<?php
													/*ROLE*/
												$sqlCoastWork = "SELECT coast_work_role FROM coast_work WHERE fk_n_customer_id = '$customer_id' AND fk_employee_worker_id = '$session_login'";
												//echo $sqlCoastWork;
													$qryCoastWork = $conn->query($sqlCoastWork);
													while($arrCoastWorkRole = $qryCoastWork->fetch_array())
													{
														//echo $arrCoastWorkRole['coast_work_role'];
												   
														if($_SESSION['status'] == "ADMIN" || $arrCoastWorkRole['coast_work_role'] == 0){ 
													?>
													  <a class="btn btn-warning btn-sm"data-toggle="modal" data-target="#btnComment<?php echo $arrBrowse['audit_rc_m_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>

													 <?php }
													 } /*.ROLE*/ ?>
												
													
															<?php   
																if($descri!=NULL)
																{ ?>

																	<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#btnMsn<?php echo $id; ?>"><span class="glyphicon glyphicon-envelope"><span></a>

														  <?php }

														  if($_SESSION['login'] == $import_id || $_SESSION['status'] == "ADMIN")
														  {
													?>
															  <a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#btnTrash<?php echo $arrBrowse['audit_rc_m_id']; ?>" ><span class="glyphicon glyphicon-trash"></span></a>
													<?php   }
													?>
											  </td>
												 <!--MODAL COMMENT-->
																<div class="modal fade" id="btnComment<?php echo $arrBrowse['audit_rc_m_id']; ?>">
																	  <div class="modal-dialog">
																		<div class="modal-content">
																		  <div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																			<center><h5 class="modal-title">ความคิดเห็น</h5></center>
																		  </div>
																		  <div class="modal-body">
																				<form method="GET" action="sc_comment_month.php">
																					<div class="row">
																						<input type="hidden" name = "hdfID" value="<?php echo $id;?>" />
																						<input type="hidden" name = "date2" value="<?php echo $txtdate;?>" />
																						<input type="hidden" name = "txtEmId2" value="<?php echo $txtEmId;?>" />
																						<input type="hidden" name = "txtComId2" value="<?php echo $txtComId;?>" />
																						<input type="hidden" name = "txtYearTax" value="<?php echo $txtYearAudit;?>" />
																						<input type="hidden" name = "txtMonthAcc" value="<?php echo $selMonthTax;?>" />
																						<div class="col-md-3"><label>แสดงความคิดเห็น</label></div>
																						<div class="col-md-9"><textarea class="form-control" rows="3" id="txtComment" name="txtComment"></textarea></div>
																					</div>
																			</div>
																		  <div class="modal-footer">
																			<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
																			<button type="submit" class="btn btn-primary">ตกลง</button>
																		  </div>
																		</div><!-- /.modal-content -->
																				</form> 
																	  </div><!-- /.modal-dialog -->
																	</div><!-- /.modal -->

														<!--.MODAL COMMENT-->

													   <!--MODAL MSN-->
															<div class="modal fade" id="btnMsn<?php echo $id; ?>">
																	  <div class="modal-dialog">
																		<div class="modal-content">
																		  <div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																			<h5 class="modal-title">คำแนะนำ</h5>
																		  </div>
																		  <div class="modal-body">

																			   
																			  <span style="color:blue"><?php echo $descri.'<br>'; ?> </span> 

																			  <!-- <span style="color:green"><?php  //echo "คำแนะนำโดย:: $txtEmId";?></span> -->
																				
																			</div>
																		  <div class="modal-footer">
																			<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
																			
																		  </div>
																		</div><!-- /.modal-content -->
																				 
																	  </div><!-- /.modal-dialog -->
																	</div><!-- /.modal -->
														<!--.MODAL MSN-->

														<!--MODAL TRASH-->
															<div class="modal fade" id="btnTrash<?php echo $arrBrowse['audit_rc_m_id'];?>">
																<form action="del_report_audit_month.php" method="get">
																  <div class="modal-dialog">
																	<div class="modal-content">
																	  <div class="modal-header">
																		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																		<h5 class="modal-title">ลบรายงาน</h5>
																	  </div>
																	  <div class="modal-body">
																			<p class="text-warning">แน่ใจหรือไม่ว่าจะลบรายงาน <?php echo $activity;?> ประจำวันที่ <?php echo $date;?> </p>
																		   
																			<input type="hidden" name = "hdfID" value="<?php echo $id;?>" />
																			<input type="hidden" name = "date2" value="<?php echo $txtdate;?>" />
																			<input type="hidden" name = "txtEmId2" value="<?php echo $txtEmId;?>" />
																			<input type="hidden" name = "txtComId2" value="<?php echo $txtComId;?>" />
																			<input type="hidden" name = "txtYearTax" value="<?php echo $txtYearAudit;?>" />
																			<input type="hidden" name = "txtMonthAcc" value="<?php echo $selMonthTax;?>" />
																	  </div>
																	  <div class="modal-footer">
																		<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
																		<button type="submit" class="btn btn-danger">ลบรายงาน</button>
																 </form>       
																	  </div>
																	</div><!-- /.modal-content -->
																  </div><!-- /.modal-dialog -->
															</div><!-- /.modal -->
														<!--.MODAL TRASH-->
												<!--.ส่วนคำแนะนำ-->
											</tr>
									<?php } ?>

									</table>
								  </div>
								<!--.TABLE-->
						  </div>
						</div>
					  </div>


					  <div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
						  <h5 class="panel-title">
							<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							  ไฟล์แนบทั้งหมด
							</a>
						  </h5>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
						  <div class="panel-body">
							<div class="table-responsive">  
							  <table  class="table table-hover">
								  <tr>
									<th width="80">วันที่นำเข้า</th>
									<th width="80">รหัสลูกค้า</th>
									<th width="85">วันสุดท้ายของระบบ</th>
									<th width="238">เอกสาร</th>
									<th width="109">ดาวโหลด</th>
								  </tr>
								  <?php 
									  
									  $sqlFile = "SELECT * FROM file_rc_mth JOIN audit_rc_mth ON file_rc_mth.fk_audit_rc_mth_id = audit_rc_mth.audit_rc_m_id";
									  
									  /*ส่วนการค้นหา*/
									  $count2 = 0;
									  $keyword2 = "เรียกดู"; 
									  if($txtdate!=NULL)
													{
														$sqlFile = $sqlFile." WHERE audit_rc_mth.audit_rc_m_imp_dat = '$txtdate'";
														$count2++;
														$keyword2 = $keyword2." วันที่นำเข้าข้อมูล = $txtdate";
													}
													if($txtEmId!=NULL)
													{
														if($count2 == 0)
														{
															$sqlFile = $sqlFile." WHERE audit_rc_mth.audit_rc_m_import_who = $txtEmId";
														}
														else{
															$sqlFile = $sqlFile." AND audit_rc_mth.audit_rc_m_import_who = $txtEmId";
														}
														$count2++;
														$keyword2 = $keyword2." รหัสพนักงาน = $txtEmId";
													}
													if($txtComId!=NULL)
													{
														if($count2 == 0)
														{
															$sqlFile = $sqlFile." WHERE audit_rc_mth.fk_n_customer_id = $txtComId";
														}
														else
														{
															$sqlFile = $sqlFile." AND audit_rc_mth.fk_n_customer_id = $txtComId";
														}
														$count2++;
														$keyword2 = $keyword2." รหัสงานบริษัท = $txtComId";
													}
													if($txtYearAudit!=NULL)
													{
														if($count2 == 0)
														{
															$sqlFile = $sqlFile." WHERE audit_rc_mth.audit_rc_m_yt = $txtYearAudit";
														}
														else
														{
															$sqlFile = $sqlFile." AND audit_rc_mth.audit_rc_m_yt = $txtYearAudit";
														}
														$count2++;
														$keyword2 = $keyword2." ปีบัญชี = $txtYearAudit";
													}
													if($selMonthTax!=NULL)
													{
														if($count2 == 0)
														{
															$sqlFile = $sqlFile." WHERE audit_rc_mth.audit_rc_m_mt = $selMonthTax";
														}
														else
														{
															$sqlFile = $sqlFile." AND audit_rc_mth.audit_rc_m_mt = $selMonthTax";
														}
														
														$keyword2 = $keyword2." เดือนภาษี = $selMonthTax";
													}
												echo $keyword2;
												
										/*.ส่วนการค้นหา*/
									  
									  
									  
									  
									  
									  $querysqlFile = $conn->query($sqlFile);

									  while ($arrFile = $querysqlFile->fetch_array()) 
									  {
										$fileName = $arrFile['file_rc_mth_name'];
										$filePath = $arrFile['file_rc_mth_path'];
										$fileCustomerId = $arrFile['fk_n_customer_id'];
										$fileDocId = $arrFile['file_rc_mth_id'];
										$import_file_time = $arrFile['audit_rc_m_imp_dat'];
										$customerId  = $arrFile['fk_n_customer_id'];
								   ?>
								  <tr>
									<!--แสดงรายการไฟล์-->
											<?php
											if($_SESSION['status'] == "ADMIN")
											{ ?>

											  <td><?php echo $import_file_time;?></td>
											  <td><?php echo $fileCustomerId; ?></td>
											  <td>
											    <?php /*แสดงวันสุดท้ายของระบบ*/
													$sqlSelLimit = "SELECT * FROM conditions WHERE condition_name = 'ปิดงบรายครึ่งปี ยื่น ภงด.51 รายงานทางการเงินที่สำคัญ '  AND n_customer_id = '$customerId'";
													$qrySelLimit = $conn->query($sqlSelLimit);
													while($arrSelLimit = $qrySelLimit->fetch_array())
														{
															$condition_dat = $arrSelLimit['condition_dat'];
															$condition_month = $arrSelLimit['condition_month'];
														}
													echo "<font color='blue'>".$condition_dat.$condition_month."</font>";
													
												?>
											  </td>
											  <td><?php echo $fileName;  ?></td>
											  <td>
												<center>
													<a target="_blank" href="<?php echo "../$filePath"; ?>"><button class="btn btn-sm btn-success"><span class="glyphicon glyphicon-download-alt"></span></button></a>
													<a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#pnlDelFileDoc<?php echo $fileDocId;?>"><span class="glyphicon glyphicon-trash"></span></a>
												</center>
											  </td>

									   <?php }



											  $fknEmployeeID = $_SESSION['login'];
											  $sqlCoastWork = "SELECT fk_n_customer_id FROM coast_work WHERE fk_employee_worker_id = '$fknEmployeeID'";
											  
											  $querySqlCoastWork =  $conn->query($sqlCoastWork);
											  while ($arrCoastWork = $querySqlCoastWork->fetch_array()) 
											  {  $CustomerID =   $arrCoastWork['fk_n_customer_id'];

												  if($fileCustomerId == $CustomerID && $_SESSION['status'] == "USER")
												  { ?>

													  <td><?php echo $import_file_time;?></td>
													  <td><?php echo $fileCustomerId; ?></td>
													  <td><?php echo $fileName;  ?></td>
													  <td>
													  <center>
														 <a target="_blank" href="<?php echo "../$filePath"; ?>"><button class="btn btn-sm btn-success"><span class="glyphicon glyphicon-download-alt"></span></button></a>
														 <a class="btn btn-sm btn-danger" data-toggle="modal" data-target="#pnlDelFileDoc<?php echo $fileDocId;?>"><span class="glyphicon glyphicon-trash"></span></a>
													  </center>
													  </td>
										 <?php    }

											  }
											?>

										<!--MODAL DELETE-->
										<form action="del_file_rc_mth.php" method="get">
												 <div class="modal fade" id="pnlDelFileDoc<?php echo $fileDocId; ?>">
													  <div class="modal-dialog">
														<div class="modal-content">
														  <div class="modal-header">
															<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
															<h4 class="modal-title">ลบไฟล์</h4>
														  </div>
														  <div class="modal-body">
															<font color="red">แน่ใจหรือไม่ว่าจะลบไฟล์</font><font color="blue"> <?php echo $fileName; ?></font>
															
															<input type="hidden" name="hdfFileId" value="<?php echo $fileDocId; ?>"/>
															<input type="hidden" name="hdfDat" value="<?php echo $txtdate; ?>"/>
															<input type="hidden" name="hdfEmId" value="<?php echo $txtEmId; ?>"/>
															<input type="hidden" name="hdfComId" value="<?php echo $txtComId; ?>"/>
															<input type="hidden" name="hdfYearAudit" value="<?php echo $txtYearAudit; ?>"/>
															<input type="hidden" name="hdfMonthTax" value="<?php echo $selMonthTax; ?>"/>
															<input type="hidden" name="hdfCustomerId" value="<?php echo $selCustomerId; ?>"/>
															<input type="hidden" name="hdfPath" value="<?php echo "../$filePath"; ?>"/>
															
														  </div>
														  <div class="modal-footer">
															<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
															<button type="submit" class="btn btn-danger">ลบ</button>
														  </div>
														</div><!-- /.modal-content -->
													  </div><!-- /.modal-dialog -->
													</div><!-- /.modal -->
										</form>
										<!--.MODAL DELETE-->
									
									<!--.แสดงรายการไฟล์-->
								  </tr>

							  <?php } ?> 

							  </table>
							 </div> 
						  </div>
						</div>
					  </div>
					  
					</div>

												</div>

												<hr>
								<center><a href="../audit_month.php"><button type="button"  class="btn btn-default">กลับไปก่อนหน้า</button></center>
						</div>


					 </div>
								 
								 <!--.CODE-->
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
<?php $conn->close(); ?>

    <script src="../script/jquery-1.10.2.min.js"></script>
    <script src="../script/jquery-migrate-1.2.1.min.js"></script>
    <script src="../script/jquery-ui.js"></script>
    <script src="../script/bootstrap.min.js"></script>
    <script src="../script/bootstrap-hover-dropdown.js"></script>
    <script src="../script/html5shiv.js"></script>
    <script src="../script/respond.min.js"></script>
    <script src="../script/jquery.metisMenu.js"></script>
    <script src="../script/jquery.slimscroll.js"></script>
    <script src="../script/jquery.cookie.js"></script>
    <script src="../script/icheck.min.js"></script>
    <script src="../script/custom.min.js"></script>
    <script src="../script/jquery.news-ticker.js"></script>
    <script src="../script/jquery.menu.js"></script>
    <script src="../script/pace.min.js"></script>
    <script src="../script/holder.js"></script>
    <script src="../script/responsive-tabs.js"></script>
    <script src="../script/index.js"></script>
    <!--CORE JAVASCRIPT-->
    <script src="../script/main.js"></script>
    <script type="text/javascript" src="../inc/bootstrap/js/scriptm.js"></script>

    <!-- Datepicker JavaScript -->
    <script type="text/javascript" src="../inc/bootstrap/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="../inc/bootstrap/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>

<?php 
    } 
    else
    {
        header("Location: ../index.html");
    }
?>
    
</body>
</html>