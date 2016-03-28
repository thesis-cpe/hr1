<?php
  @session_start(); 
include_once('../inc/config.php');
 include_once('../inc/connect.php');

@$txtEmId = $_GET['txtEmId']; //รหัสพนักงาน
@$txtComId = $_GET['selCustomerId']; //รหัสบริษัทตามที่รับผิดชอบ
@$txtYearAudit = $_GET['txtYearAudit'];//ปีบัญชี
@$selMonthTax = $_GET['selMonthTax']; //เดือนภาษี
@$selAuditWork = $_GET['selAuditWork'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: ข้อมูลจัดทำภาษี - ประจำเดือน ::.</title>
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
																	<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> &nbsp;&nbsp;  ข้อมูลการจัดทำภาษีประจำเดือน </h3>
																</div>
																
																<div class="panel-body">
																	<div class="panel-body"> 
											<div class="row">
												<div class="col-xs-12">
													<!--TABLE-->
													<div class="table-responsive">
														<table  class="table table-hover">
															<!--head table-->
															  <tr>
																				<th>วันที่นำเข้า</th>
																				<th>รหัสงานบริษัท</th>
																				<th width="100" scope="col"><center>ภาษี</center></th>
																				<th width="143" scope="col"><center>วันสุดท้ายของระบบ</center></th>
																				<th width="143" scope="col"><center>วันที่ยื่น</center></th>
																				<th width="72" scope="col"><center>ยอดชำระ</center></th>
																				<th width="143" scope="col"><center>วันที่ชำระ</center></th>
																				<th width="102" scope="col"><center>เลขที่ใบเสร็จ</center></th>
																				<th width="103" scope="col"><center>ไฟล์</center></th>
																			
															 </tr>
															<!--.head table-->
															<?php 
																		
																		
																		$sql = "SELECT * FROM month_tax";
																		$count = 0;
																		$keyword = "เรียกดู";
																		if($selAuditWork!=NULL)
																		{
																			$sql = $sql." WHERE mt_tax_name = '$selAuditWork'";
																			$count++;
																			$keyword = $keyword." แบบภาษี = $selAuditWork";
																		}
																		if($txtEmId!=NULL)
																		{
																			if($count == 0)
																			{
																				$sql = $sql." WHERE mt_import_who = '$txtEmId'";
																			}
																			else
																			{
																				$sql = $sql." AND mt_import_who = '$txtEmId'";
																			}
																			
																			$count++;
																			$keyword = $keyword." รหัสพนักงาน = $txtEmId";
																		}
																		if($txtComId!=NULL)
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
																		if($txtYearAudit!=NULL)
																		{
																			if($count == 0)
																			{
																				$sql = $sql." WHERE mt_year_tax = '$txtYearAudit'";
																			}
																			else
																			{
																				$sql = $sql." AND mt_year_tax = '$txtYearAudit'";
																			}
																			
																			$count++;
																			$keyword = $keyword." ปีบัญชี = $txtYearAudit";
																		}
																		if($selMonthTax!=NULL)
																		{
																			if($count == 0)
																			{
																				$sql = $sql." WHERE mt_month_tax = '$selMonthTax'";
																			}
																			else
																			{
																				$sql = $sql." AND mt_month_tax = '$selMonthTax'";
																			}
																			
																			$count++;
																			$keyword = $keyword." เดือนภาษี = $selMonthTax";
																		}
																		echo $keyword;
															   
																$querysql =  $conn->query($sql);
																while($arrBrowse = $querysql->fetch_array())
																{
																	  $taxName = $arrBrowse['mt_tax_name'];
																	  $date = $arrBrowse['mt_import_dat'];
																	  $payment = $arrBrowse['mt_payment'];
																	  $paymentDate = $arrBrowse['mt_payment_dat'];
																	  $noBill = $arrBrowse['mt_receip_no'];
																	  $pathBill = "../".$arrBrowse['mt_receip_file'];
																	  $id = $arrBrowse['mt_id'];
																	  $import_id = $arrBrowse['mt_import_who'];
																	  $customerId = $arrBrowse['fk_n_customer_id'];
																	$fillingDate = $arrBrowse['mt_filing_dat'];
																?>
																<tr>
																		<td><?php echo $date;?></td>
																		<td><?php echo $customerId; ?></td>
																		<td><?php echo $taxName; ?></td>
																		<td>
																			<?php 
																			if($taxName == "ภงด.1" || $taxName == "ภงด.2" || $taxName == "ภงด.3" || $taxName == "ภงด.53")
																			{
																				$sqlSelLimit = "SELECT * FROM conditions WHERE condition_name = 'ยื่น ภงด. 1, 2, 3, 53 '  AND n_customer_id = '$customerId'";
																				$qrySelLimit = $conn->query($sqlSelLimit);
																				while($arrSelLimit = $qrySelLimit->fetch_array())
																				{
																					$condition_dat = $arrSelLimit['condition_dat'];
																					$condition_month = $arrSelLimit['condition_month'];
																				}
																				echo "<center><font color='blue'>".$condition_dat.$condition_month."</font></center>";
																			}
																			elseif($taxName == "ภพ.30" || $taxName == "ภธ.40")
																			{
																				$sqlSelLimit = "SELECT * FROM conditions WHERE condition_name = 'ยื่น ภพ.30 ภธ.40 '  AND n_customer_id = '$customerId'";
																				$qrySelLimit = $conn->query($sqlSelLimit);
																				while($arrSelLimit = $qrySelLimit->fetch_array())
																				{
																					$condition_dat = $arrSelLimit['condition_dat'];
																					$condition_month = $arrSelLimit['condition_month'];
																				}
																				echo "<center><font color='blue'>".$condition_dat.$condition_month."</font></center>";
																			}elseif($taxName == "ประกันสังคม")
																			{
																				$sqlSelLimit = "SELECT * FROM conditions WHERE condition_name = 'ยื่น ประกันสังคม'  AND n_customer_id = '$customerId'";
																				$qrySelLimit = $conn->query($sqlSelLimit);
																				$condition_dat = NULL;
																				$condition_month =NULL;
																				while($arrSelLimit = $qrySelLimit->fetch_array())
																				{
																					$condition_dat = $arrSelLimit['condition_dat'];
																					$condition_month = $arrSelLimit['condition_month'];
																				}
																				
																				 echo "<center><font color='blue'>".$condition_dat.$condition_month."</font></center>";	
																				
																			} 
																			?>
																		</td>
																		<td><center><?php echo $fillingDate; ?></center></td>
																		<td><center><?php echo $payment; ?></center></td>
																		<td><center><?php echo $paymentDate; ?></center></td>
																		<td><center><?php echo $noBill; ?></center></td>
																		
																		<td>
																			<center>
																				<a href="<?php echo "$pathBill"; ?>" target="_blank"><button class="btn btn-sm btn-success"><span class="glyphicon glyphicon-download-alt"></span></button></a>
																				<?php    if($_SESSION['login'] == $import_id || $_SESSION['status'] == "ADMIN")
																			  {
																		?>
																				<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#btnTrash<?php echo $id; ?>" ><span class="glyphicon glyphicon-trash"></span></a>
																		<?php } ?>
																			</center>
																		</td>


																		<!--MODAL TRASH-->
																				<div class="modal fade" id="btnTrash<?php echo $id; ?>">
																					<form action="del_report_tax_month.php" method="get">
																					  <div class="modal-dialog">
																						<div class="modal-content">
																						  <div class="modal-header">
																							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																							<h5 class="modal-title">ลบรายงาน</h5>
																						  </div>
																						  <div class="modal-body">
																								<p class="text-warning">แน่ใจหรือไม่ว่าจะลบรายงาน <?php echo $taxName;?> วันที่ยื่น <?php echo $date;?> </p>
																								<input type="hidden" value="<?php echo $txtEmId;?>" name="hdfEmId"/>
																								<input type="hidden" value="<?php echo $txtComId;?>" name="hdfComId"/>
																								<input type="hidden" value="<?php echo $txtYearAudit;?>" name="hdfYearAudit"/>
																								<input type="hidden" value="<?php echo $selMonthTax;?>" name="hdfSelMonthTax"/>
																								<input type="hidden" value="<?php echo $selAuditWork;?>" name="hdfSelAuditWork"/>
																								<input type="hidden" value="<?php echo $id;?>" name="hdfId"/>
																								<input type="hidden" value="<?php echo $pathBill;?>" name="hdfPathDoc"/>

																							   
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
													<hr>
													<center><a href="../tax_month.php"><button type="button"  class="btn btn-default">กลับไปก่อนหน้า</button></center>
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