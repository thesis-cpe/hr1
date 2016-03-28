<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Employee Data ::.</title>
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
		if($_SESSION['status']=="ADMIN")
		{
		include_once('inc/config.php');
		include_once('inc/connect.php');
				
		if(@$_GET['view']==NULL)
		{
			$sql = ("SELECT * FROM employee ORDER BY employee_worker_id ASC");
			$result = $conn->query($sql);
			$row = $result->fetch_assoc();
		}
		else
		{
			$sql = ("SELECT * FROM employee ORDER BY $_GET[view]");
			$result = $conn->query($sql);
			$row = $result->fetch_assoc(); 
		}
?>
	<div>
        <div id="wrapper">
            <?php include_once('inc/topbar.php'); ?>
            <?php include_once('inc/menu.php'); ?>
            <div id="page-wrapper">
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title"><h4>ข้อมูลพนักงาน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li class="active">
                        	<input type="button" style="float:right;" class="btn btn-success btn-sm" onclick="window.location='employee.php'" value="เพิ่มพนักงาน"/>
                        </li>
                    </ol><br>

                    <?php
					    	$emd = ("employee_worker_id DESC");
					    	$ema = ("employee_worker_id ASC");
					    	$nad = ("employee_name DESC");
					    	$naa = ("employee_name ASC");
					    ?>
						
						<form action="employeedata.php" method="POST">
						<div class="col-md-2">
							<select type="text" class="form-control input-sm" name="searchtype">
						      	<option value="">ค้นตาม</option>
						      	<option value="employee_worker_id">รหัสพนักงาน</option>
						      	<option value="employee_name">ชื่อขนามสกุล</option>
						      	<option value="employee_tel">โทรศัพท์</option>
						      	<option value="employee_email">Email</option>
						    </select>
						</div><!-- /.col-lg-4 -->

						<div class="col-md-4">
							<div class="input-group">
								<input type="text" class="form-control input-sm" placeholder="Search for..." name="searchword">
								<span class="input-group-btn">
									<button class="btn btn-info btn-sm" type="submit">Go!</button>
								</span>
							</div><!-- /input-group -->
						</div><!-- /.col-lg-4 -->
						</form>

						<div class="btn-group">
						  <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
						    เรียงตาม... <span class="caret"></span>
						  </button>
						  <ul class="dropdown-menu" role="menu">
						    <li><a href="employeedata.php?view=<?php echo $emd; ?>">รหัสพนักงาน มากไปน้อยv</a></li>
						    <li><a href="employeedata.php?view=<?php echo $ema; ?>">รหัสพนักงาน น้อยไปมาก</a></li>
						    <li><a href="employeedata.php?view=<?php echo $nad; ?>">ชื่อ-นามสกุล มากไปน้อย</a></li>
						    <li><a href="employeedata.php?view=<?php echo $naa; ?>">ชื่อ-นามสกุล น้อยไปมาก</a></li>
						  </ul>
						</div>

                    <div class="clearfix"></div>
                </div>

                <div class="page-content">
                    <div id="sum_box" class="row mbl">
						<div class="row">
							<div class="col-lg-12">
								<div class="panel panel-info">
									<div class="panel-heading">
                                        <h1 class="panel-title"><span class="fa fa-users"></span> &nbsp;&nbsp;  ข้อมูลพนักงาน </h1>
                                    </div>
									
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr class="danger">
													<th>รหัสพนักงาน</th>
													<th>ชื่อ - นามสกุล</th>
													<th>โทรศัพท์</th>
													<th>E-mail</th>
													<th>หมายเหตุ</th>
												</tr>
											</thead>
										
										<?php 
											do
											{
										?>
											<tbody>
												<tr class="active">
													<td><?php echo("$row[employee_worker_id]");?></td>
													<td><?php echo("$row[employee_name]  $row[employee_lname]");?></td>
													<td><?php echo("$row[employee_tel]");?></td>
													<td><?php echo("$row[employee_email]");?></td>
													<td>
														<a title="ข้อมูลพนักงาน" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pnlDetail<?php echo ("$row[employee_worker_id]");?>"><span class="fa fa-tasks"></span></a>
													<!-- modal show employee -->
													<div class="modal fade" id="pnlDetail<?php echo ("$row[employee_worker_id]");?>" >
														<div class="modal-custom">
															<div class="modal-cuscontent">

																<div class="modal-body">
																	<div class="panel panel-info">
																		<div class="panel-heading">
																			<h3 class="panel-title"><span class="fa fa-search"></span> &nbsp;ข้อมูลพนักงาน</h3>
																		</div><br>

																		<div class="form-group row">  <!--แสดงภาพ-->
																			<center> <img src="<?php echo ("$row[employee_picture]"); ?>"/ width="200px" height="200px"> </center> <br>
																		</div>

																		<div class="table-responsive">
																			<table class="table" border="0">
																				<tr>
																					<td><b>ชื่อ - นามสกุล : </b></td>
																					<td><?php echo ("$row[employee_name] $row[employee_lname]");?>
																					<td></td>
																					<td></td>
																				</tr>
																												
																				<tr>
																					<td><b>รหัสพนักงาน : </b></td>
																					<td><?php echo ("$row[employee_worker_id]");?></td>
																					<td></td>
																					<td></td>
																				</tr>
																												
																				<tr>
																					<td><b>รหัสผู้ทำบัญชี : </b></td>
																					<td><?php echo ("$row[employee_audit_id]");?></td>
																					<td></td>
																					<td></td>
																				</tr>
																								
																				<tr>
																					<td><b>เลขประจำตัวประชาชน : </b></td>
																					<td><?php echo ("$row[employee_nation_id]");?></td>
																					<td><b>สถานะสมรส : </b></td>
																					<td><?php echo ("$row[employee_married_status]");?></td>
																				</tr>
																												
																				<tr>
																					<td><b>ที่อยู่ตามทะเบียนบ้าน : </b></td>
																					<td><?php echo ("$row[employee_addr]");?></td>
																					<td></td>
																					<td></td>
																				<tr>

																				<tr>
																					<td><b>ที่อยู่ปัจจุบัน</b></td>
																					<td><?php echo ("$row[employee_addrp]");?></td>
																					<td></td>
																					<td></td>
																				</tr>																
																												
																				<tr>
																					<td><b>โทรศัพท์ : </b></td>
																					<td><?php echo ("$row[employee_tel]");?></td>
																					<td><b>E- mail : </b></td>
																					<td><?php echo ("$row[employee_email]");?></td>
																				</tr>
																												
																				<tr>
																					<td><b>บุคคลที่ติดต่อได้ : </b></td>
																					<td><?php echo ("$row[employee_contact_name]");?></td>
																					<td><b>โทรศัพท์บุคคลที่ตติดต่อได้ : </b></td>
																					<td><?php echo ("$row[employee_contact_tel]");?></td>
																				</tr>
																												
																				<tr>
																					<td><b>ระดับการศึกษา : </b></td>
																					<td><?php echo ("$row[employee_graduate]");?></td>
																					<td><b>สาขาวิชา : </b></td>
																					<td><?php echo ("$row[employee_major]");?></td>
																				</tr>
																												
																				<tr>
																					<td><b>เกรดเฉลี่ยรวม : </b></td>
																					<td><?php echo ("$row[employee_grade]");?></td>
																					<td><b>มหาวิทยาลัย : </b></td>
																					<td><?php echo ("$row[employee_academy]");?></td>
																				</tr>
																												
																				<tr>
																					<td><b>เริ่มปฏิบัติงาน : </b></td>
																					<td><?php echo ("$row[employee_register_date]");?></td>
																					<td><b>อัตราเงินเดือน : </b></td>
																					<td><?php echo ("$row[employee_salary]");?></td>
																				</tr>

																				<tr>
																					<td><b>ค่าแรงต่อวัน : </b></td>
																					<td><?php echo ("$row[employee_coast]");?></td>
																					<td><b>จำนวนวันทำงาน : </b></td>
																					<td><?php echo ("$row[employee_datework]");?></td>
																				</tr>

																				<tr>
																					<td><b>เงื่อนไข : </b></td>
																					<td><?php echo ("$row[employee_condition]");?></td>
																					<td></td>
																					<td></td>
																				</tr>
																			</table>
																		</div>

																		<div class="modal-footer">
																			<div class="form-group row">
																				<div class="col-md-offset-4 col-md-8">
																					<button class="btn btn-danger" data-dismiss="modal" type="button">ปิด</button>
																				</div>
																			</div>
																		</div><!-- /modal-footer -->
																	</div><!-- /panel info -->
																</div><!-- /model-body -->

															</div><!-- /modal-content -->								
														</div><!-- /modal-dialog -->							
													</div><!-- /pnlDetail -->

														<a title="แก้ไข" class="btn btn-warning btn-sm" href="ed_employee.php?em_id=<?php echo ("$row[employee_worker_id]");?>" onclick="return confirm('ต้องการแก้ไขข้อมูล? : <?php echo ("$row[employee_worker_id]");?>');"><span class="fa fa-edit"></span></a>
														<a title="ลบ" class="btn btn-danger btn-sm" onclick="return confirm('ช้อมูลที่เกี่ยวข้องกับ? : <?php echo ("$row[employee_worker_id]"); ?> จะถูกลบทั้งหมด');" href="de_employee.php?emp_worker_id=<?php echo ("$row[employee_worker_id]"); ?>"><span class="fa fa-trash-o"></span></a>

														<a title="งานที่รับผิดชอบ" class="btn btn-success btn-sm" data-toggle="modal" data-target="#pnlDetailwork<?php echo ("$row[employee_worker_id]");?>"><span class="fa fa-users"></span></a>
														
														<!--แบงค์ เพิ่ม MSN-->
														<a title="ส่งข้อความ" class="btn btn-info btn-sm" data-toggle="modal" data-target="#pnlMsn<?php echo ("$row[employee_worker_id]");?>"><span class="fa  fa-envelope-o"></span></a>

															<!--MODAL MSN-->
															 	<form method="POST" action="sc_msn/sent.php">
																  <div class="modal fade" id="pnlMsn<?php echo ("$row[employee_worker_id]");?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																			  <div class="modal-dialog">
																			    <div class="modal-content">
																			      <div class="modal-header">
																			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																			        <h5 class="modal-title" id="exampleModalLabel">ส่งข้อความ</h5>
																			      </div>
																			      <div class="modal-body">
																			       
																			          <div class="form-group">
																			            <label class="control-label">ผู้รับ:<?php echo ("$row[employee_name]"); echo ("  $row[employee_lname]");  ?></label><br>
																			            <label class="control-label">เรื่อง:</label>
																			            <input type="text" class="form-control" name="txtTitle"/>
																			          </div>
																			          <div class="form-group">
																			            <label class="control-label">ข้อความ:</label>
																			            <textarea class="form-control" name="taText" rows="8"></textarea>
																			          </div>
																			          <input type="hidden" name="hdfSender" value="<?php echo $_SESSION['login'];?>">
																			          <input type="hidden" name="hdfRecive" value="<?php echo ("$row[employee_worker_id]");?>">
																			        
																			      </div>
																			      <div class="modal-footer">
																			        <button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
																			        <button class="btn btn-primary" type="submit">ส่ง</button>
																			       </div>
																			       
																			    </div>
																			  </div>
																			</div>
																		</form>	
															<!--.MODAL MSN-->
													<!--แบงค์ เพิ่ม MSN-->

														<a title="แก้ไขรหัสผ่าน" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#pnlEditpass<?php echo ("$row[employee_worker_id]");?>"><span class="fa fa-key"></span></a>
															<form method="POST" action="sc_updateuser.php">
																<div class="modal fade" id="pnlEditpass<?php echo ("$row[employee_worker_id]");?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
																	<div class="modal-dialog">
																		<div class="modal-content">
																			<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																				<h5 class="modal-title" id="exampleModalLabel">ส่งข้อความ</h5>
																			</div>
																				<?php
																					$sqla = ("SELECT email, password FROM user WHERE fkey_worker_id=$row[employee_worker_id]");
																					$resulta = $conn->query($sqla);
																					$rowa = $resulta->fetch_array();
																				?>
																			<div class="modal-body">
																				<div class="form-group">
																					<label class="control-label">ชื่อผู้ใช้ : </label>
																					<input type="text" class="form-control" name="txtUser" value="<?php echo ("$row[email]"); ?>"/>
																					<label class="control-label">รหัสผ่านใหม่ :</label>
																					<input type="text" class="form-control" name="txtPassword"/>
																					<label class="control-label">ยืนยันรหัสผ่าน :</label>
																					<input type="text" class="form-control" name="txtConpassword"/>
																					<input type="hidden" class="form-control" name="txtNumem" value="<?php echo ("$row[employee_worker_id]"); ?>"/>
																				</div>
																			</div>

																			<div class="modal-footer">
																				<button type="button" class="btn btn-default" data-dismiss="modal">ปิด</button>
																				<button class="btn btn-primary" type="submit">บันทึก</button>
																			</div>
																		</div>
																	</div>
																</div>
															</form>
													
													<!-- modal show work -->
													<div class="modal fade" id="pnlDetailwork<?php echo ("$row[employee_worker_id]"); ?>" >
														<div class="modal-custom">
															<div class="modal-cuscontent">

																<div class="modal-body">
																	<div class="panel panel-info">
																		<div class="panel-heading">
																			<h3 class="panel-title"><span class="fa fa-search"></span> &nbsp;ข้อมูลพนักงาน</h3>
																		</div><br>
																		
																		<div class="table-responsive">
																			<table class="table table-hover">
																				<thead>
																					<tr class="danger">
																						<th>รหัสงานบริษัท</th>
																						<th>ชื่อกิจการลูกค้า</th>
																						<th>สถานะ</th>
																						<th>เวลาเต็ม</th>
																						<th>เวลาที่ใช้</th>
																						<th>เวลาที่เหลือ</th>
																						<th>วันสิ้นสุดโครงการ</th>
																					</tr>
																				</thead>

																			<?php
																				//$work_id = $row['employee_worker_id'];
																				$sqli = ("SELECT * FROM coast_work LEFT OUTER JOIN customer ON coast_work.fk_customer_tax_id=customer.customer_tax_id 
																					LEFT OUTER JOIN customer_gen ON customer_gen.n_customer_id=coast_work.fk_n_customer_id
																					LEFT OUTER JOIN employee ON employee.employee_worker_id=coast_work.fk_employee_worker_id
																					WHERE coast_work.fk_employee_worker_id=$row[employee_worker_id] AND customer_gen.check_close=0");
																				$resulti = $conn->query($sqli);
																				$rowi = $resulti->fetch_array();
																				//print_r($rowi);


																				/*$sqll = ("SELECT * FROM conditions WHERE n_customer_id=$rowi[fk_n_customer_id]");
																				$resultl = $conn->query($sqll);
																				$rowl = $resultl->fetch_array();*/

																				do 
																				{
																			?>
																				<tbody>
																					<tr>
																						<td><?php echo $rowi['fk_n_customer_id']; ?></td>
																						<td><?php echo $rowi['customer_company']; ?></td>
																						<td><?php if($rowi['coast_work_role']==0){echo "ผู้ทำบัญชี";}else{echo "ผู้ปฏิบัติงาน";} ?></td>
																						<td><?php echo $rowi['coast_work_hour']; ?>&nbsp;ชั่วโมง</td>
																						<td><?php 
																								
																								$sqld = ("SELECT SUM(dr_time_hour) AS hourd, SUM(dr_time_minute) AS minuted 
																									FROM daily_record WHERE dr_em_id=$row[employee_worker_id] 
																									AND fk_n_customer_id=$rowi[fk_n_customer_id]"); 
																								$resultd = $conn->query($sqld);
																								$rowd = $resultd->fetch_array();

																								$ohourd = $rowd['hourd'];
										                                                        $ominuted = $rowd['minuted'];
										                                                        $nhourd = $ominuted/60;
										                                                        $nminuted = $ominuted%60;
										                                                        $thourd = $ohourd+$nhourd;
										                                                        $tminuted = $nminuted;
										                                                        $aminuted = $thourd*60;
										                                                        $allused = $aminuted+$tminuted;

										                                                        $allhour = $rowi['coast_work_hour']*60;
																								//@$per = ($alluse/$allhour)*100;
																								$dif = $allhour-$alluse;
																								$dhour = $dif/60;
																								$dminute = $dif%60; 

																							echo intval($thourd); ?>&nbsp;ชั่วโมง&nbsp;<?php echo $tminuted; ?>&nbsp;นาที</td>
																						<td><?php echo intval($dhour); ?>&nbsp;ชั่วโมง&nbsp;<?php echo $dminute; ?>&nbsp;นาที</td>
																						<td><?php echo $rowi['close_time']; ?></td>
																					</tr>
																				</tbody>
																			<?php
																				}while($rowi = $resulti->fetch_array())
																			?>
																			</table>
																		</div>
																	
																		<div class="modal-footer">
																			<div class="form-group row">
																				<div class="col-md-offset-4 col-md-8">
																					<a href="workuserv2.php?worker=<?php echo ("$row[employee_worker_id]"); ?>" class="btn btn-info">ดูงานส่วนบุคคล</a>
																					<button class="btn btn-danger" data-dismiss="modal" type="button">ปิด</button>
																				</div>
																			</div>
																		</div><!-- /modal-footer -->
																	</div><!-- /panel info -->
																</div><!-- /model-body -->

															</div><!-- /modal-content -->								
														</div><!-- /modal-dialog -->							
													</div><!-- /pnlDetail -->
													</td>
												</tr>
											</tbody>
										<?php
											}while($row = $result->fetch_array())
										?>
										</table>
									</div>

								</div>
								<!-- /#panel panel-info -->	
							</div>
						</div>
						<!-- /.row -->
					</div>
				</div>
				<?php include_once('inc/footer.php'); ?>
			</div><!-- /#page-wrapper -->
		</div><!-- /#wrapper -->
	</div>
	<?php
		}
		else
		{
			header("Location: profile.php");
		}

	$conn->close();?>

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
	
<?php 
	} 
	else
	{
		header("Location: ../index.html");
	}
?>
</body>

</html>
