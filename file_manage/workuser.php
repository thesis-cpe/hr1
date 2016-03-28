<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: WorkUser Data ::.</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Loading bootstrap css-->
    <!-- Custom Fonts -->
    <link type="text/css" rel="stylesheet" href="styles/font-awesome-4.1.0/css/font-awesome.min.css" >
    <link type="text/css" rel="stylesheet" href="styles/jquery-ui-1.10.4.custom.min.css">
    <link type="text/css" rel="stylesheet" href="styles/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="styles/bootstrap.min.css">
    <!--<link type="text/css" rel="stylesheet" href="inc/bootstrap/css/bootstrap.css">-->
    <link type="text/css" rel="stylesheet" href="styles/main.css">
    <link type="text/css" rel="stylesheet" href="styles/style-responsive.css">
    <link type="text/css" rel="stylesheet" href="styles/jquery.news-ticker.css">
    <link rel="stylesheet" type="text/css" href="inc/bootstrap/css/jquery-ui.css">

    <script type="text/javascript" src="script/jquery.min.js"></script>
	<script type="text/javascript" src="script/arrow79.js"></script>

<!--<script language="javascript">
var then,now=new Date();
function stopclk()
{
    then=new Date();
    alert('หน้านี้ใช้เวลาในการ LOAD ทั้งสิ้น '+((then-now)/1000)+' วินาที');
}

window.onload=function()
{
    stopclk();
}
</script>-->

</head>
<body>
<?php
	if(isset($_SESSION['user']) )
	{	
		include_once('inc/config.php');
		include_once('inc/connect.php');	
		
		if(@$_GET['view']==NULL)
		{
			$sqla = ("SELECT * FROM coast_work LEFT OUTER JOIN customer_gen ON coast_work.fk_n_customer_id=customer_gen.n_customer_id LEFT OUTER JOIN customer ON customer.customer_tax_id=customer_gen.fk_customer_tax_id
			 WHERE coast_work.fk_employee_worker_id=$_SESSION[login] AND customer_gen.check_close=0 GROUP BY coast_work_id ORDER BY coast_work.fk_n_customer_id DESC");
			$resulta = $conn->query($sqla);
			$rowa = $resulta->fetch_assoc();
		}
		else
		{
			$sqla = ("SELECT * FROM coast_work LEFT OUTER JOIN customer_gen ON coast_work.fk_n_customer_id=customer_gen.n_customer_id LEFT OUTER JOIN customer ON customer.customer_tax_id=customer_gen.fk_customer_tax_id
			 WHERE coast_work.fk_employee_worker_id=$_SESSION[login] AND customer_gen.check_close=0 GROUP BY coast_work_id ORDER BY $_GET[view]");
			$resulta = $conn->query($sqla);
			$rowa = $resulta->fetch_assoc();
		}
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
								<div class="panel panel-red">
									<div class="panel-heading">
										<h1 class="panel-title"><span style="float:left;" class="fa fa-bar-chart-o">&nbsp;ข้อมูลงานบัญชีและงานภาษี&nbsp;&nbsp;&nbsp;&nbsp;</span></h1><br>
									<!--
										<?php
									    	$cusd = ("coast_work.fk_n_customer_id DESC");
									    	$cusa = ("coast_work.fk_n_customer_id ASC");
									    	$namd = ("customer.customer_company DESC");
									    	$nama = ("customer.customer_company ASC");
									    ?>
										

										<div class="btn-group">
										  <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
										    เรียงตาม... <span class="caret"></span>
										  </button>
										  <ul class="dropdown-menu" role="menu">
										    <li><a href="workuser.php?view=<?php echo $cusd; ?>">รหัสงานบริษัท มากไปน้อย</a></li>
										    <li><a href="workuser.php?view=<?php echo $cusa; ?>">รหัสงานบริษัท น้อยไปมาก</a></li>
										    <li><a href="workuser.php?view=<?php echo $namd; ?>">ชื่อลูกค้า มากไปน้อย</a></li>
										    <li><a href="workuser.php?view=<?php echo $nama; ?>">ชื่อลูกค้า น้อยไปมาก</a></li>
										  </ul>
										</div>-->
									</div>

									<div class="table-responsive">
										<table class="table table-hover-color">
											<thead>
												<tr class="danger">
													<th>รหัสงาน</th>
													<th>ชื่อลูกค้า</th>
													<th>สถานะ</th>
													<th>ความคืบหน้า</th>
													<th>หมายเหตุ</th>
													
												</tr>
											</thead>
										
									<?php 
										do
										
										{
									?>
										<tbody>
											<tr class="active">
												<td><?php  echo("$rowa[fk_n_customer_id]");?></td>
												<td><?php  echo("$rowa[customer_company]");?></td>
												<td><?php if($rowa['coast_work_role']==1){echo "ผู้ปฏิบัติงาน";}else{echo "ผู้ทำบัญชี";} ?></td>
												<td>
													<?php
														$sqlz = ("SELECT SUM(dr_time_hour) AS hour, SUM(dr_time_minute) AS minute 
															FROM daily_record WHERE fk_n_customer_id='$rowa[fk_n_customer_id]' AND dr_em_id=$_SESSION[login]");
														$resultz = $conn->query($sqlz);
														@$rowz = $resultz->fetch_array();
														//print_r($rowz);
														$ohour = $rowz['hour'];
                                                        $ominute = $rowz['minute'];
                                                        $nhour = intval($ominute/60);
                                                        $nminute = fmod($ominute,60);
                                                        //$remainTime_minute = fmod($sumTimeCon,60);
                                                        $thour = $ohour+$nhour;
                                                        $tminute = $nminute;
                                                        $aminute = $thour*60;
                                                        $alluse = $aminute+$tminute;

														$sqlq = ("SELECT coast_work_hour FROM coast_work WHERE fk_n_customer_id='$rowa[fk_n_customer_id]' AND fk_employee_worker_id='$_SESSION[login]'");
														$resultq = $conn->query($sqlq);
														$rowq = $resultq->fetch_assoc();
														$allhour = $rowq['coast_work_hour']*60;
														@$per = ($alluse/$allhour)*100;
														//@number_format($per, 2, '.', '');
														$dif = $allhour-$alluse;
														$dhour = intval($dif/60);
														$dminute = fmod($dif,60);
														//$remainTime_minute = fmod($sumTimeCon,60);

														$sqlc = ("SELECT close_time FROM close_work WHERE customer_gen='$rowa[fk_n_customer_id]'");
														$resultc = $conn->query($sqlc);
														$rowc = $resultc->fetch_array();

														
													?>
													<div class="progress">
														<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($per,2); ?>%">
													    	<span class="sr-only"></span><?php echo round($per,2); echo "%"?>
														</div>
													</div>
												</td>
												<td>
													<a title="ข้อมูลงาน" class="btn btn-info btn-sm" data-toggle="modal" data-target="#pnlDetail<?php echo ("$rowa[fk_n_customer_id]");?>"><span class="fa fa-tasks"></span></a>

													<!-- modal show work -->
													<div id="pnlDetail<?php echo ("$rowa[fk_n_customer_id]");?>" tabindex="-1" role="dialog" aria-labelledby="modal-wide-width-label" aria-hidden="true" class="modal fade" >
														<div class="modal-dialog modal-wide-width">
															<div class="panel panel-violet">
																<div class="modal-content">
																	<div class="modal-header">
																		<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
																		<h3 class="modal-title"><span class="fa fa-search"></span> &nbsp;ข้อมูลงานบัญชีและงานภาษี : <?php echo ("$rowa[fk_n_customer_id]");?> </h3>
																	</div>

																	<div class="modal-body">
																		<div class="form-group row">  <!--แสดงภาพ-->
																			<center> <img src="<?php echo ("$rowa[customer_img]"); ?>"/ width="300px" height="200px"> </center> <br>
																		</div>

																		<!-- ใส่รายละเอียด -->
																		<div class="table-responsive">
																			<table class="table" border="0">
																				<tr>
																					<td><b><span style="color:red"> ข้อมูลกิจการ </span></b></td>
																				</tr>

																				<tr>
																					<td><b> รหัสงาน : </b></td>
																					<td><?php echo ("$rowa[fk_n_customer_id]") ?></td>
																					<td><b> รหัสลูกค้า : </b></td>
																					<td><?php echo ("$rowa[fk_customer_tax_id]") ?></td>
																				</tr>

																				<tr>
																					<td><b> ชื่อลูกค้า : </b></td>
																					<td><?php echo ("$rowa[customer_company]") ?></td>
																					<td></td>
																					<td></td>
																				</tr>

																				<tr>
																					<td><b> ผู้ติดต่องาน : </b></td>
																					<td><?php echo ("$rowa[customer_contact]") ?></td>
																					<td></td>
																					<td></td>
																				</tr>

																				<tr>
																					<td><b> โทรศัพท์ : </b></td>
																					<td><?php echo ("$rowa[customer_contact_tel]") ?></td>
																					<td><b> อีเมล์ : </b></td>
																					<td><?php echo ("$rowa[customer_contact_email]") ?></td>
																				</tr>

																				<tr>
																					<td><b> หมายเหตุ : </b></td>
																					<td><?php echo ("$rowa[customer_gen_comment]") ?></td>
																					<td></td>
																					<td></td>
																				</tr>

																				<tr>
																					<td><b><span style="color:red"> ข้อมูลทีมงาน </span></b></td>
																				</tr>

																				<tr>
																				<?php
																					$sqll = ("SELECT * FROM employee INNER JOIN coast_work ON employee.employee_worker_id=coast_work.fk_employee_worker_id WHERE coast_work.fk_n_customer_id=$rowa[fk_n_customer_id]");
																					$resultl = $conn->query($sqll);
																					$rowl = $resultl->fetch_all();

																					//print_r ($rowl);
																					foreach ($rowl as $rs) 
																					{
																				?>
																					<tr>
																						<td><b> ชื่อ-นามสกุล : </b></td>
																						<td><?php echo ($rs['1']);?> <?php echo ($rs['2']); ?></td>
																						<td><b> สถานะ : </b></td>
																						<td><?php if($rs['24']==0){echo "ผู้ทำบัญชี";}else{echo "ผู้ปฏิบัติงาน";} ?></td>
																					</tr>

																					<tr>
																						<td><b> จำนวน : </b></td>
																						<td><?php echo ($rs['27']); ?> ชั่วโมง</td>
																						<td><b> บาท : </b></td>
																						<td><?php echo ($rs['28']); ?> บาท/ชั่วโมง</td>
																					</tr>
																				<?php
																					}
																				?>
																				</tr>

																				<tr>
																					<td><b><span style="color:red"> ระยะเวลา </span></b></td>
																				</tr>

																				<tr>
																				<?php
																					$sqli = ("SELECT * FROM work_details WHERE fk_n_customer_id='$rowa[fk_n_customer_id]'");
																					$resulti = $conn->query($sqli);
																					$rowi = $resulti->fetch_assoc();
																					//print_r ($rowi);
																				?>

																					<tr>
																						<td><b> วันที่รับทำบัญชี : </b></td>
																						<td><?php echo ("$rowi[work_receip_dat]") ?></td>
																					</tr>

																					<tr>
																						<td><b> รอบบัญชีที่รับทำ : </b></td>
																						<td><?php echo ("$rowi[work_start]") ?></td>
																						<td><b> ถึง : </b></td>
																						<td><?php echo ("$rowi[work_end]") ?></td>
																					</tr>

																					<tr>
																						<td><b> อัตราค่าทำบัญชี : </b></td>
																						<td><?php if($rowi['work_coast_choice']==0){echo "รายเดือน";}else{echo "รายครั้ง";} ?></td>
																					</tr>

																					<tr>
																						<td><b> ราคา : </b></td>
																						<td><?php echo ("$rowi[work_coast_bath]") ?> บาท</td>
																						<td><b> งวดงาน : </b></td>
																						<td><?php echo ("$rowi[work_period]") ?></td>
																					</tr>
																				</tr>

																				<tr>
																					<td><b><span style="color:red"> เงื่อนไขการให้บริการ </span></b></td>
																				</tr>

																				<tr>
																				<?php
																					$sqlx = ("SELECT * FROM conditions WHERE n_customer_id='$rowa[fk_n_customer_id]'");
																					$resultx = $conn->query($sqlx);
																					$rowx = $resultx->fetch_all();
																					//print_r ($rowx);
																					
																					foreach ($rowx as $rx) 
																					{
																				?>
																					<tr>
																						<td width="30%"><b><span style="color:green"><?php echo ($rx['2']) ?></span></b></td>
																						<td><b> ทุกวันที่ : </b></td>
																						<td><?php echo ($rx['3']) ?></td>
																						<td><b> ของ : </b></td>
																						<td><?php echo ($rx['4']) ?></td>
																					</tr>
																				<?php
																					}
																				?>
																				</tr>

																				<tr>
																					<td><b><span style="color:red"> เอกสารที่เกี่ยวข้อง </span></b></td>
																				</tr>

																				<tr>
																				<?php
																					$sqlj = ("SELECT * FROM convention INNER JOIN quotation ON convention.fk_n_customer_id=quotation.fk_n_customer_id  WHERE convention.fk_n_customer_id=$rowa[fk_n_customer_id]");
																					$resultj = $conn->query($sqlj);
																					$rowj = $resultj->fetch_assoc();
																					//print_r ($rowj);
																				?>
																					<tr>
																						<td><b> ใบเสนอราคา : </b></td>
																						<td><a href="<?php echo ("$rowj[quotation_path]"); ?>" target="_blank">
																							<?php if($rowj['quotation_path']==""){echo "ไม่มีเอกสาร";}else{echo "DOWNLOAD";} ?></a></td>
																						<td><b> สัญญาว่าจ้าง : </b></td>
																						<td><a href="<?php echo ("$rowj[convention_path]"); ?>" target="_blank">
																						<?php if($rowj['convention_path']==""){echo "ไม่มีเอกสาร";}else{echo "DOWNLOAD";} ?></a></td>
																					</tr>
																				</tr>
																			</table>
																		</div>

																		<div class="modal-footer">
																			<div class="form-group row">
																				<div class="col-md-offset-4 col-md-8">
																					<button class="btn btn-red" data-dismiss="modal" type="button">ปิด</button>
																				</div>
																			</div>
																		</div><!-- /modal-footer -->

																	</div>
																</div>

															</div><!-- /modal-content -->								
														</div><!-- /modal-custom -->							
													</div><!-- /pnlDetail -->
												
													<a title="สรุปผล" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pnlProgress<?php echo ("$rowa[fk_n_customer_id]");?>"><span class="fa fa-bar-chart-o"></span></a>

													<!-- modalProgress -->
													<div id="pnlProgress<?php echo ("$rowa[fk_n_customer_id]");?>" tabindex="-1" role="dialog" aria-labelledby="modal-wide-width-label" aria-hidden="true" class="modal fade" >
														<div class="modal-dialog modal-wide-width">
															<div class="panel panel-violet">	
																<div class="modal-content">
																	<div class="panel-header">
																		<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
																		<h3 class="modal-title"><span class="fa fa-bar-chart-o"></span> &nbsp;ความคืบหน้า : <?php echo ("$rowa[fk_n_customer_id]");?> </h3>
																	</div>
																		<div class="modal-body">
																			<?php
																				$sqlb = ("SELECT * FROM conditions WHERE n_customer_id='$rowa[fk_n_customer_id]'");
																				$resultb = $conn->query($sqlb);
																				$rowb = $resultb->fetch_array();
																				//print_r ($rowb);

																			?>
																					<div class="table-responsive">
																						<table class="table table-hover">
																							<thead>
																								<tr class="danger">
																									<th>เงื่อนไขการทำบัญชี</th>
																									<th>เวลาที่ใช้</th>
																									<th></th>
																								</tr>
																							</thead>
																					<?php 
																						do
																						
																						{
																					?>	
																						<tbody>
																							<tr>
																								<td><?php echo $rowb['condition_name']; ?></td>
																								<?php 
																									$sqld = ("SELECT SUM(dr_time_hour) AS hourd, SUM(dr_time_minute) AS minuted  
																										FROM daily_record WHERE dr_detail='$rowb[condition_name]' AND dr_em_id=$_SESSION[login] AND fk_n_customer_id='$rowa[fk_n_customer_id]'"); 
																									$resultd = $conn->query($sqld);
																									$rowd = $resultd->fetch_array();

																									$ohourd = $rowd['hourd'];
											                                                        $ominuted = $rowd['minuted'];
											                                                        $nhourd = intval($ominuted/60);
											                                                        $nminuted = fmod($ominuted,60);
											                                                        $thourd = $ohourd+$nhourd;
											                                                        $tminuted = $nminuted;
											                                                        $aminuted = $thourd*60;
											                                                        $allused = $aminuted+$tminuted;

											                                                        $allhourd = $rowq['coast_work_hour']*60;
																									@$perd = ($allused/$allhourd)*100;
																									//@number_format($perd, 2, '.', '');

																									$sqle = ("SELECT SUM(dr_record) AS rec FROM daily_record WHERE dr_em_id=$_SESSION[login] AND fk_n_customer_id='$rowa[fk_n_customer_id]'");
											                                                        $resulte = $conn->query($sqle);
											                                                        $rowe = $resulte->fetch_assoc();
											                                                        //print_r($rowi);
											                                                        $orec = $rowe['rec'];

																								?>
																								<td><?php echo intval($thourd); ?>&nbsp;ชั่วโมง&nbsp;<?php echo intval($tminuted); ?>&nbsp;นาที</td>
																								<td>
																									<div class="progress">
																										<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round($perd,2); ?>%">
																									    	<span class="sr-only"></span><?php echo round($perd,2); echo "%"?>
																										</div> 
																									</div>
																								</td>
																							</tr>
																						</tbody>

																					<?php
																						}while($rowb = $resultb->fetch_array())
																					?>	
																						</table>
																					</div>
																			<form action="#" class="form-horizontal">
																				<div class="row">
																					<div class="col-md-7">
																						<div class="form-group">
																						</div>
																					</div>
																 					<div class="col-md-5">
																						<div class="form-group">
																							<label class="col-md-6 control-label">ชั่วโมงการทำงานทั้งหมด : </label>
																								<div class="col-md-6">
																									<p class="form-control-static"><?php echo $rowq['coast_work_hour']; ?>&nbsp;ชั่วโมง</p>
																								</div>
																						</div>
																					</div>
																				</div>

																				<div class="row">
																					<div class="col-md-7">
																						<div class="form-group">
																						</div>
																					</div>
																 					<div class="col-md-5">
																						<div class="form-group">
																							<label class="col-md-6 control-label">เวลาการทำงานที่ใช้ : </label>
																								<div class="col-md-6">
																									<p class="form-control-static"><?php echo intval($thour); ?>&nbsp;ชั่วโมง&nbsp;<?php echo $tminute; ?>&nbsp;นาที</p>
																								</div>
																						</div>
																					</div>
																				</div>

																				<div class="row">
																					<div class="col-md-7">
																						<div class="form-group">
																						</div>
																					</div>
																 					<div class="col-md-5">
																						<div class="form-group">
																							<label class="col-md-6 control-label">เวลาการทำงานที่เหลือ : </label>
																								<div class="col-md-6">
																									<p class="form-control-static"><?php echo intval($dhour); ?>&nbsp;ชั่วโมง&nbsp;<?php echo $dminute; ?>&nbsp;นาที</p>
																								</div>
																						</div>
																					</div>
																				</div>

																				<div class="row">
																					<div class="col-md-7">
																						<div class="form-group">
																						</div>
																					</div>
																 					<div class="col-md-5">
																						<div class="form-group">
																							<label class="col-md-6 control-label">จำนวน Record : </label>
																								<div class="col-md-6">
																									<p class="form-control-static"><?php if($orec==""){echo ("0"); }else{echo $orec;}?>&nbsp;Record</p>
																								</div>
																						</div>
																					</div>
																				</div>

																				<div class="row">
																					<div class="col-md-7">
																						<div class="form-group">
																						</div>
																					</div>
																 					<div class="col-md-5">
																						<div class="form-group">
																							<label class="col-md-6 control-label">วันสิ้นสุดโครงการ : </label>
																								<div class="col-md-6">
																									<p class="form-control-static"><?php echo $rowc['close_time']; ?></p>
																								</div>
																						</div>
																					</div>
																				</div>
																			</form>
																		</div>

																		<div class="modal-footer">
																			<div class="form-group row">
																				<div class="col-md-offset-4 col-md-8">
																					<button class="btn btn-red" data-dismiss="modal" type="button">ปิด</button>
																				</div>
																			</div>
																		</div><!-- /modal-footer -->
																</div>

															</div><!-- /modal-content -->								
														</div><!-- /modal-dialog -->							
													</div><!-- /pnlProgress -->
												</td>
											</tr>

										</tbody>
									<?php
										}while($rowa = $resulta->fetch_array())
									?>
										</table>
									</div>
									<!-- /table-responsive" -->
								</div>
								<!-- END panal-info -->
							</div>
							<!-- END col-lg-12 -->
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
	$conn->close(); 
?>

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