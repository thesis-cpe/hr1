<?php
  @session_start(); 
include_once('../inc/config.php');
 include_once('../inc/connect.php');

@$txtEmId = $_GET['txtEmId']; //รหัสพนักงาน
@$txtComId = $_GET['selCustomerId']; //รหัสบริษัท ที่รับผิดชอบ
@$txtYearAudit = $_GET['txtYearAudit'];//ปีบัญชี
@$selMonthTax = $_GET['selMonthTax']; //เดือนภาษี
@$selAuditWork = $_GET['selAuditWork'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: ข้อมูลการจัดทำภาษี - ประจำปี  ::.</title>
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
																<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> &nbsp;&nbsp;  ข้อมูลการจัดทำภาษีประจำปี </h3>
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
																	$sql = "SELECT * FROM year_tax";
																	$count = 0; //ไว้นับว่าเป็น if เดียวหรือไม่
																	$keyword = "เรียกดู";
																	if($selAuditWork!=NULL)
																	{
																		$sql = $sql." WHERE yt_tax_name = '$selAuditWork'";
																		$count++;
																		$keyword = $keyword." แบบภาษี = $selAuditWork";
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
																		
																		$keyword = $keyword." รหัสงานบริษัท = $txtComId";
																		$count++;
																	}
																	
																	if($txtYearAudit!=NULL)
																	{ 
																		if($count == 0)
																		{
																		$sql = $sql." WHERE yt_year_tax = '$txtYearAudit'";
																		}
																		else
																		{
																			$sql = $sql." AND yt_year_tax = '$txtYearAudit'";
																		}
																		$keyword = $keyword." ปีบัญชี = $txtYearAudit";
																		$count++;
																	}
																	
																	if($selMonthTax!=NULL)
																	{
																		if($count == 0)
																		{
																			$sql = $sql." WHERE yt_month_tax = ' $selMonthTax'";
																		}
																		else
																		{
																			$sql = $sql." AND yt_month_tax = ' $selMonthTax'";
																		}
																		$keyword = $keyword." เดือนภาษี = $selMonthTax";
																		$count++;
																	}
																	
																	if($txtEmId!=NULL)
																	{
																		if($count == 0)
																		{
																			$sql = $sql." WHERE yt_import_who = '$txtEmId'";
																		}
																		else
																		{
																			$sql = $sql." AND yt_import_who = '$txtEmId'";
																		}
																		$keyword = $keyword." รหัสพนักงาน = $txtEmId";
																		
																	}
																	
																	//echo $sql."<br>";
																	echo $keyword;
																	
														   
															$querysql =  $conn->query($sql);
															while($arrBrowse = $querysql->fetch_array())
															{
																  $taxName = $arrBrowse['yt_tax_name'];
																  $date = $arrBrowse['yt_import_dat'];
																  $payment = $arrBrowse['yt_payment'];
																  $paymentDate = $arrBrowse['yt_payment_dat'];
																  $noBill = $arrBrowse['yt_receip_no'];
																  $pathBill = "../".$arrBrowse['yt_receip_file'];
																  $id =  $arrBrowse['yt_id'];
																  $import_id = $arrBrowse['yt_import_who']; 
																$customerId = $arrBrowse['fk_n_customer_id'];
																$fillingDat = $arrBrowse['yt_filing_dat'];
															?>
															<tr>
																	<td><?php echo $date; ?></td>
																	<td><?php echo $customerId ?></td>
																	<td><?php echo $taxName; ?></td>
																	<td><?php  /*แสดงวันสุดท้ายของระบบ*/
																		
																		if($taxName == "ภงด.1ก" || $taxName == "ภงด.2ก" || $taxName == "ภงด.3ก" || $taxName == "ภงด.53")
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
																			elseif($taxName == "ภงด.51" || $taxName == "ภงด.94")
																			{
																				$sqlSelLimit = "SELECT * FROM conditions WHERE condition_name = 'ปิดงบรายครึ่งปี ยื่น ภงด.51 รายงานทางการเงินที่สำคัญ '  AND n_customer_id = '$customerId'";
																				$qrySelLimit = $conn->query($sqlSelLimit);
																				while($arrSelLimit = $qrySelLimit->fetch_array())
																				{
																					$condition_dat = $arrSelLimit['condition_dat'];
																					$condition_month = $arrSelLimit['condition_month'];
																				}
																				echo "<center><font color='blue'>".$condition_dat.$condition_month."</font></center>";
																			}
																			elseif($taxName == "ภงด.50" || $taxName == "ภงด.90" || $taxName == "ภงด.91")
																			{
																				$sqlSelLimit = "SELECT * FROM conditions WHERE condition_name = 'ปิดงบรายปี ยื่น ภงด.50 รายงานทางการเงินที่สำคัญ'  AND n_customer_id = '$customerId'";
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
																				while($arrSelLimit = $qrySelLimit->fetch_array())
																				{
																					$condition_dat = $arrSelLimit['condition_dat'];
																					$condition_month = $arrSelLimit['condition_month'];
																				}
																				echo "<center><font color='blue'>".$condition_dat.$condition_month."</font></center>";
																				
																			}
																		?>
																	</td>
																	<td><center><?php echo $fillingDat; ?></center></td>
																	<td><center><?php echo $payment; ?></center></td>
																	<td><center><?php echo $paymentDate; ?></center></td>
																	<td><center><?php echo $noBill; ?></center></td>
																	
																	<td>
																		<center>
																			<a target="_blank" href="<?php echo "$pathBill"; ?>"><button class="btn btn-sm btn-success"><span class="glyphicon glyphicon-download-alt"></span></button></a>
																			<?php    if($_SESSION['login'] == $import_id || $_SESSION['status'] == "ADMIN")
																		  {
																	?>
																			<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#btnTrash<?php echo $id; ?>" ><span class="glyphicon glyphicon-trash"></span></a>   
																	<?php }?>
																		</center>
																	</td>
															
																<!--.ส่วนคำแนะนำ-->
															</tr>
															<!--MODAL TRASH-->
																			<div class="modal fade" id="btnTrash<?php echo $id; ?>">
																				<form action="del_report_tax_year.php" method="get">
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
																							<input type="hidden" value="<?php echo $pathBill;?>" name="hdfPath"/>

																						   
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
												<center><a href="../tax_year.php"><button type="button"  class="btn btn-default">กลับไปก่อนหน้า</button></center>
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