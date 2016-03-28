<?php
  @session_start(); 
include_once('../inc/config.php');
include_once('../inc/connect.php');
@$txtdate = $_GET['datepicker-th7'];  //วันนท่ทำงาน  
@$txtEmId = $_GET['txtEmId']; //รหัสพนักงาน
@$txtComId = $_GET['selCustomerId']; //รหัสบริษัทที่รับผิดชอบ
@$txtYearAudit = $_GET['txtYearAudit'];//ปีบัญชี
@$selMonthTax = $_GET['selMonthTax']; //เดือนภาษี
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: ข้อมูลจัดทำบัญชี - หลังตรวจสอบแล้วเสร็จประจำปี ::.</title>
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
															<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> &nbsp;&nbsp;  ข้อมูลหลังตรวจสอบแล้วเสร็จประจำปี </h3>
														</div>
														
														<div class="panel-body">
															<div class="panel-body"> 
									<div class="row">
										<div class="col-xs-12">
											<!--TABLE-->
											<div class="table-responsive">
												<table class="table table-hover">
													<!--head table-->
													  <tr>
																	<th width="110"><center>นำเข้าข้อมูล</th>
																	<th>รหัสงานบริษัท</th>
																	<th><center>กิจกรรม</center></th>
																	<th><center>วันสุดท้ายของระบบ</center></th>
																	<th><center>ไฟล์/ลบไฟล์</center></th>
																	
													 </tr>
													<!--.head table-->
													<?php 
																
																
																$sql = "SELECT * FROM audit_final";
																$count = 0;
																$keyword = "เรียกดู";
																
																if($txtdate != NULL)
																{
																	$sql = $sql." WHERE audit_final_imp_dat = '$txtdate'";
																	$count++;
																	$keyword = $keyword." วันที่นำเข้าข้อมูล = $txtdate";
																}
																if($txtEmId != NULL)
																{   
																		if($count == 0)
																		{
																			$sql = $sql." WHERE audit_final_imp_who = '$txtEmId'";
																		}
																		else
																		{
																			$sql = $sql." AND audit_final_imp_who = '$txtEmId'";
																		}
																	
																	$count++;
																	$keyword = $keyword." รหัสพนักงาน = $txtEmId";
																}
																if($txtComId != NULL)
																{   
																		if($count == 0)
																		{
																			$sql = $sql." WHERE fk_n_customer_id = '$txtComId'";
																		}
																		else
																		{
																			$sql = $sql." AND fk_n_customer_id = '$txtComId'";
																		}
																	
																	$count++;
																	$keyword = $keyword." รหัสงานบริษัท = $txtComId";
																}
																if($txtYearAudit !=NULL)
																{   
																		if($count == 0)
																		{
																			$sql = $sql." WHERE audit_final_year = '$txtYearAudit'";
																		}
																		else
																		{
																			$sql = $sql." AND audit_final_year = '$txtYearAudit'";
																		}
																	
																	$count++;
																	$keyword = $keyword." ปีบัญชี = $txtYearAudit";
																}
																if($selMonthTax != NULL)
																{   
																		if($count == 0)
																		{
																			$sql = $sql." WHERE audit_final_month = '$selMonthTax'";
																		}
																		else
																		{
																			$sql = $sql." AND audit_final_month = '$selMonthTax'";
																		}
																	
																	$count++;
																	$keyword = $keyword." เดือนภาษี = $selMonthTax";
																}
															 echo $keyword;
																
													   
														$querysql =  $conn->query($sql);
														while($arrBrowse = $querysql->fetch_array())
														{
															  $id = $arrBrowse['audit_final_id'];
															  $date = $arrBrowse['audit_final_imp_dat'];
															  $activity = $arrBrowse['audit_final_name'];
															  //$deadline = $arrBrowse['audit_rc_m_activity'];
															  $path = $arrBrowse['audit_final_path'];
															  $import_id = $arrBrowse['audit_final_imp_who'];
															  $customerId = $arrBrowse['fk_n_customer_id'];
															  
														   
														?>
														<tr>
																<td><center><?php echo $date; ?></center></td>
																<td><center><?php echo $customerId; ?></center></td>
																<td><?php echo $activity; ?></td>
																<td><?php /*วันสุดท้ายของระบบ*/
																	
																	$sqlSelLimit = "SELECT * FROM conditions WHERE condition_name = 'ปิดงบรายปี ยื่น ภงด.50 รายงานทางการเงินที่สำคัญ'  AND n_customer_id = '$customerId'";
																				$qrySelLimit = $conn->query($sqlSelLimit);
																				while($arrSelLimit = $qrySelLimit->fetch_array())
																				{
																					$condition_dat = $arrSelLimit['condition_dat'];
																					$condition_month = $arrSelLimit['condition_month'];
																				}
																				echo "<center><font color='blue'>".$condition_dat.$condition_month."</font></center>";
																
																
																?>
																
																
																
																
																</td>
																<td><center><a target="_blank" href="<?php echo "../$path"; ?>"><button class="btn btn-sm btn-success"><span class="glyphicon glyphicon-download-alt"></span></button></a>
															 <?php    if($_SESSION['login'] == $import_id || $_SESSION['status'] == "ADMIN")
																	  {
																?>
																		<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#btnTrash<?php echo $id; ?>" ><span class="glyphicon glyphicon-trash"></span></a>

																		<?php   }?>
																	</center>
																</td>
														
															<!--.ส่วนคำแนะนำ-->
														</tr>

														<!--MODAL TRASH-->
																		<div class="modal fade" id="btnTrash<?php echo $id;?>">
																			<form action="del_report_audit_final.php" method="get">
																			  <div class="modal-dialog">
																				<div class="modal-content">
																				  <div class="modal-header">
																					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																					<h5 class="modal-title">ลบรายงาน</h5>
																				  </div>
																				  <div class="modal-body">
																						<p class="text-warning">แน่ใจหรือไม่ว่าจะลบรายงาน <?php echo $activity;?> วันที่นำเข้าข้อมูล <?php echo $date;?> </p>
																					   
																						<input type="hidden" name = "hdfID" value="<?php echo $id;?>"/>
																						<input type="hidden" name = "date2" value="<?php echo $txtdate;?>"/>
																						<input type="hidden" name = "txtEmId2" value="<?php echo $txtEmId;?>"/>
																						<input type="hidden" name = "txtComId2" value="<?php echo $txtComId;?>"/>
																						<input type="hidden" name = "txtYearTax" value="<?php echo $txtYearAudit;?>"/>
																						<input type="hidden" name = "txtMonthAcc" value="<?php echo $selMonthTax;?>"/>
																						<input type="hidden" name = "hdfDoc" value="<?php echo $path;?>"/>
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
												<?php } ?>

												</table>
											   </div> 
												
											<!--.TABLE-->
											<hr>
											<center><a href="../audit_final.php"><button type="button"  class="btn btn-default">กลับไปก่อนหน้า</button></center>
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