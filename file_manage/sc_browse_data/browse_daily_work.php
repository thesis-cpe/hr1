﻿<?php
  @session_start(); 
include_once('../inc/config.php');
 include_once('../inc/connect.php');
@$date = $_GET['datepicker-th1'];  //วันนท่ทำงาน  
@$txtEmId = $_GET['txtEmId']; //รหัสพนักงาน
@$txtComId = $_GET['selCustomerId']; //รหัสบริษัทจาก sel
//$selCustomerId =$_GET['selCustomerId']; //รหัสบริษัทที่ user นั้นๆ ดูแล
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: ข้อมูลจัดทำบัญชี - ประจำวัน ::.</title>
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
										<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> &nbsp;&nbsp;  ข้อมูลการปฏิบัติงานประจำวัน </h3>
												</div>
												
												<div class="panel-body"><br>
													<div class="panel-body"> 
							<div class="row">
								<div class="col-xs-12">
									<!--TABLE-->
									<div class="table-responsive">
										<table   class="table table-hover">
											<!--head table-->
											  <tr>
												<th>วันที่ทำงาน</th>
												<th>รหัสงานบริษัท</th>
												<th width="100"><center><p>วันที่ในเอกสาร</p>
												<th width="350"><center>แบบภาษี<center></th>
												<th width="90"><center><p>ดาวโหลด</p>
												<th><center>ปํญหา</center></th>
												<th><center>คำแนะนำ/ลบรายงาน</center></th>
											  </tr>
											<!--.head table-->

											
											<?php 
												
												$sqlDailyWork = "SELECT * FROM daily_record";
												$keyword = "เรียกดู";
												$count = 0;
												if($date!=NULL)
												{
													$sqlDailyWork = $sqlDailyWork." WHERE dr_work_dat = '$date'";
													$count++;
													$keyword  = $keyword."วันที่ทำงาน  = $date";
												}
												if($txtEmId!=NULL)
												{
													if($count == 0)
													{
														$sqlDailyWork = $sqlDailyWork." WHERE dr_em_id = '$txtEmId'";
													}
													else
													{
														$sqlDailyWork = $sqlDailyWork." AND dr_em_id = '$txtEmId'";
													}
													$count++;
													$keyword  = $keyword." รหัสพนักงาน  = $txtEmId";
												}
												if($txtComId!=NULL)
												{
													if($count == 0)
													{
														$sqlDailyWork = $sqlDailyWork." WHERE fk_n_customer_id = '$txtComId'";
													}
													else
													{
														$sqlDailyWork = $sqlDailyWork." AND fk_n_customer_id = '$txtComId'";
													}
													$keyword  = $keyword." รหัสงานบริษัท  = $txtComId";
												}
												//echo $sqlDailyWork;
												echo $keyword;
												
											   
												$querysqlDailyWork =  $conn->query($sqlDailyWork);
												while($arrDailyWork = $querysqlDailyWork->fetch_array())
												{
													$datePrint = $arrDailyWork['dr_work_dat'];
													$titlePrint = $arrDailyWork['dr_detail'];
													$pathDoc = "../".$arrDailyWork['dr_path'];
													$ploblemPrint = $arrDailyWork['dr_problem'];
													$descri = $arrDailyWork['dr_descri'];
													$dr_id = $arrDailyWork['dr_id'];
													$import_id = $arrDailyWork['dr_em_id']; //ใครเป็นคนนำเข้าข้อมูล
													$cusotmer_id = $arrDailyWork['fk_n_customer_id'];
													$importDate = $arrDailyWork['dr_report_dat'];
													$newCustomerId = $arrDailyWork['fk_n_customer_id'];

												   
												?>
												<tr>
													<td><?php echo $importDate; ?></td>
													<td><?php echo $newCustomerId; ?></td>
													<td><center><?php echo $datePrint;  ?></center></td>
													<td><?php echo $titlePrint;  ?></td>
													<td><center><a target="_blank" href="<?php echo "$pathDoc"; ?>"><button class="btn btn-sm btn-success"><span class="glyphicon glyphicon-download-alt"></span></button></a></center></td>
													<td><?php echo $ploblemPrint;  ?></td>
													<!--ส่วนคำแนะนำ-->
													<td><center>
														<?php

													/*ROLE*/
													$sqlCoastWork = "SELECT coast_work_role FROM coast_work WHERE fk_n_customer_id = '$cusotmer_id' AND fk_employee_worker_id = '$session_login'";
													//echo $sqlCoastWork;
														$qryCoastWork = $conn->query($sqlCoastWork);
														while($arrCoastWorkRole = $qryCoastWork->fetch_array())
														{
															//echo $arrCoastWorkRole['coast_work_role'];
													   
															if($_SESSION['status'] == "ADMIN" || $arrCoastWorkRole['coast_work_role'] == 0){ 
															?>
															<a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#btnComment<?php echo $arrDailyWork['dr_id']; ?>"><span class="glyphicon glyphicon-pencil"></span></a>
														
														 <?php }
														 }
													/*.ROLE*/  
																	if($descri!=NULL)
																	{ ?>

																		<a class="btn btn-info btn-sm" data-toggle="modal" data-target="#btnMsn<?php echo $dr_id; ?>"><span class="glyphicon glyphicon-envelope"><span></a>

															  <?php }

															  if($_SESSION['login'] == $import_id || $_SESSION['status'] == "ADMIN")
															  {  ?>
																	<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#btnTrash<?php echo $arrDailyWork['dr_id']; ?>" ><span class="glyphicon glyphicon-trash"></span></a>
													   <?php   }
														?>
														</center>

															<!--MODAL-->
																	<div class="modal fade" id="btnComment<?php echo $arrDailyWork['dr_id']; ?>">
																		  <div class="modal-dialog">
																			<div class="modal-content">
																			  <div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																				<center><h5 class="modal-title">ความคิดเห็น</h5></center>
																			  </div>
																			  <div class="modal-body">
																					<form method="GET" action="sc_comment_daily.php">
																						<div class="row">
																							<input type="hidden" name = "hdfID" value="<?php echo $dr_id;?>"/>
																							<input type="hidden" name = "date2" value="<?php echo $date;?>"/>
																							<input type="hidden" name = "txtEmId2" value="<?php echo $txtEmId;?>"/>
																							<input type="hidden" name = "txtComId2" value="<?php echo $txtComId;?>"/>


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

															<!--.MODAL-->
															<!--MODAL MSN-->
																<div class="modal fade" id="btnMsn<?php echo $dr_id; ?>">
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
																<div class="modal fade" id="btnTrash<?php echo $arrDailyWork['dr_id']; ?>">
																	<form action="del_report_daily_work.php" method="post">
																	  <div class="modal-dialog">
																		<div class="modal-content">
																		  <div class="modal-header">
																			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																			<h5 class="modal-title">ลบรายงาน</h5>
																		  </div>
																		  <div class="modal-body">
																				<p class="text-warning">แน่ใจหรือไม่ว่าจะลบรายงาน <?php echo $titlePrint;?> ประจำวันที่ <?php echo $datePrint;?> </p>
																			   
																				<input type="hidden" name = "hdfTrashId" value="<?php echo $dr_id;?>" />
																				<input type="hidden" name = "txtEmId2" value="<?php echo $txtEmId;?>" />
																				<input type="hidden" name = "txtComId2" value="<?php echo $txtComId;?>" />
																				<input type="hidden" name = "hdfPathDoc" value="<?php echo $pathDoc;?>"/>
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

													</td>
													<!--.ส่วนคำแนะนำ-->
												</tr>
										<?php } ?>

										</table>
									   </div> 
									<!--.TABLE-->
									<hr>
									<center><a href="../daily_work.php"><button type="button"  class="btn btn-default">กลับไปก่อนหน้า</button></center>
								</div>
							</div>
						  </div><!--.Panel Body-->
												</div>
												<!-- /#panel body -->
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