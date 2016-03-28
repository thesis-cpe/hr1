<?php
  @session_start(); 
include_once('../inc/config.php');
 include_once('../inc/connect.php');

$txtComId = $_GET['selCustomerId']; //ตามที่รับผิดชอบ
$txtEmId = $_GET['txtEmId'];
$datepicker = $_GET['datepicker'];
$datepicker2 = $_GET['datepicker2'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: ข้อมูลรับ - ส่งเอกสาร ::.</title>
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
																<h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span> &nbsp;&nbsp;  ข้อมูลการบันทึกรับ-ส่งบัญชีและเอกสาร </h3>
										</div>
															
															<div class="panel-body"><br>
																<div class="panel-body"> 
										<div class="row">
											<div class="col-xs-12">
												<!--TABLE-->
												<div class="table-responsive">
													<table class="table table-hover">
														<!--head table-->
														  <tr>
															
																<th width="121"><center>นำเข้าข้อมูล</center></th>
																<th width="105"><center>ผู้นำเข้าข้อมูล</center></th>
																<th width="105"><center>รหัสบริษัท</center></th>
																<th width="125"><center>รหัสงานบริษัท</center>
																<th width="105"><center>วันที่ในเอกสาร</center></th>
																<th width="129"><center>เลขที่เอกสาร</center></th>
																<th width="104"><center>หัวเรื่อง</center></th>
																<th width="117"><center>เอกสาร</center></th>
														  </tr>
														<!--.head table-->

														<?php 
															/*if($txtComId!=NULL)
															{
																$sql = "SELECT * FROM receip_return_doc WHERE fk_n_customer_id = $txtComId";
																

															}elseif ($txtEmId!=NULL) 
															{
																$sql = "SELECT * FROM receip_return_doc WHERE receip_return_doc_imp_who = $txtEmId";
																

															}elseif ($datepicker!=NULL) 
															{

																$sql = "SELECT * FROM receip_return_doc WHERE receip_return_doc_imp_dat  = '$datepicker'";
																
															}elseif ($datepicker2!=NULL)
															{
																 $sql = "SELECT * FROM receip_return_doc WHERE receip_return_doc_dat  = '$datepicker2'";
															}else
															{
																$sql = "SELECT * FROM receip_return_doc";
															}*/
															$sql = "SELECT * FROM receip_return_doc";
															$count = 0; //ไว้นับว่าเป็น if เดียวหรือไม่
															$keyword = "เรียกดู";
															
															if($txtComId!=NULL)
															{
																$sql = $sql." WHERE fk_n_customer_id = '$txtComId'";
																$count++;
																$keyword = $keyword." รหัสงานบริษัท = $txtComId";
															}
															
															if($txtEmId!=NULL)
															{
																if($count == 0)
																{
																	$sql = $sql." WHERE receip_return_doc_imp_who = '$txtEmId'";
																			
																}
																else
																{
																	$sql = $sql." AND receip_return_doc_imp_who = '$txtEmId'";
																}
																		
																$keyword = $keyword." รหัสพนักงาน = $txtEmId";
																$count++;
															}
															
															if($datepicker!=NULL)
															{
																if($count == 0)
																{
																	$sql = $sql." WHERE receip_return_doc_imp_dat = '$datepicker'";
																			
																}
																else
																{
																	$sql = $sql." AND receip_return_doc_imp_dat = '$datepicker'";
																}
																		
																$keyword = $keyword." วันที่นำเข้าข้อมูล = $datepicker";
																$count++;
															}
															
															if($datepicker2!=NULL)
															{
																if($count == 0)
																{
																	$sql = $sql." WHERE receip_return_doc_dat = '$datepicker2'";
																			
																}
																else
																{
																	$sql = $sql." AND receip_return_doc_dat = '$datepicker2'";
																}
																		
																$keyword = $keyword." วันที่ในเอกสาร = $datepicker2";
																$count++;
															}
															echo $keyword;
														   
															$querysql =  $conn->query($sql);
															while($arrSql = $querysql->fetch_array())
															{
																$importDate = $arrSql['receip_return_doc_imp_dat'];
																$docDate = $arrSql['receip_return_doc_dat'];
																$docNo = $arrSql['receip_return_doc_no'];
																$docHead = $arrSql['receip_return_doc_head'];
																$docImportWho = $arrSql['receip_return_doc_imp_who'];
																$docCustomerTaxId = $arrSql['customer_tax_id'];
																$docCustomerId = $arrSql['fk_n_customer_id'];
																$pathDoc = "../".$arrSql['receip_return_doc_path'];
																$id = $arrSql['receip_return_doc_id'];
																
															?>
															<tr>
																<td><center><?php echo $importDate; ?><center></td>
																<td><center><?php echo $docImportWho; ?></center></td>
																<td><center><?php echo $docCustomerTaxId; ?></center></td>
																<td><center><?php echo $docCustomerId; ?></center></td>
																<td><center><?php echo $docDate; ?><center></td>
																<td><center><?php echo $docNo; ?></center></td>
																<td><center><?php echo $docHead; ?></center></td>
																
																<td>
																	<center>
																		<a target="_blank" href="<?php echo "$pathDoc"; ?>"><button class="btn btn-sm btn-success"><span class="glyphicon glyphicon-download-alt"></span></button></a>
																		<?php    if($_SESSION['login'] == $docImportWho || $_SESSION['status'] == "ADMIN")
																		  {
																	?>
																		<a class="btn btn-danger btn-sm" data-toggle="modal" data-target="#btnTrash<?php echo $id; ?>" ><span class="glyphicon glyphicon-trash"></span></a>
																	<?php }?>
																	</center>
																</td>

																<!--MODAL TRASH-->
																			<div class="modal fade" id="btnTrash<?php echo $id; ?>">
																				<form action="del_report_courier.php" method="get">
																				  <div class="modal-dialog">
																					<div class="modal-content">
																					  <div class="modal-header">
																						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																						<h5 class="modal-title">ลบรายงาน</h5>
																					  </div>
																					  <div class="modal-body">
																							<p class="text-warning">แน่ใจหรือไม่ว่าจะลบรายงาน <?php echo $docHead;?> เลขที่ <?php echo $docNo; ?> วันที่ยื่น <?php echo $importDate; ?> </p>
																							<input type="hidden" value="<?php echo $id; ?>" name="hdfID"/>
																							<input type="hidden" value="<?php echo $txtComId; ?>" name="hdfComID"/>
																							<input type="hidden" value="<?php echo $txtEmId; ?>" name="hdfEmID"/>
																							<input type="hidden" value="<?php echo $datepicker; ?>" name="hdfDatepicker"/>
																							<input type="hidden" value="<?php echo $datepicker2; ?>" name="hdfDatepicker2"/>
																							<input type="hidden" value="<?php echo "$pathDoc"; ?>" name="hdfPathDoc"/>
																						   
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
															   
															</tr>
													<?php } ?>

													</table>
												   </div> 
												<!--.TABLE-->
												<hr>
												<center><a href="../courier.php"><button type="button"  class="btn btn-default">กลับไปก่อนหน้า</button></center>
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