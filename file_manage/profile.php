<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Profile ::.</title>
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

    <script type="text/javascript" src="script/jquery.min.js"></script>
	<script type="text/javascript" src="script/arrow79.js"></script>

</head>
<body id="top">
<?php
	if(isset($_SESSION['user']))
	{	
		include_once('inc/config.php');
		include_once('inc/connect.php');
		$sql = ("SELECT * FROM employee INNER JOIN user ON employee.employee_worker_id=user.fkey_worker_id WHERE employee.employee_worker_id= '".$_SESSION['login']."'");
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();

		$sqlSelCustomer = "SELECT `fk_n_customer_id`,customer_company,coast_work_hour FROM `coast_work` JOIN customer ON coast_work.`fk_customer_tax_id`= customer.`customer_tax_id` 
			JOIN customer_gen ON coast_work.fk_n_customer_id=customer_gen.n_customer_id 
			WHERE customer_gen.check_close='0' AND coast_work.fk_employee_worker_id= '".$_SESSION['login']."'";
		$querySqlSelCustomer = $conn->query($sqlSelCustomer);
		$numSqlSelCustomer = $querySqlSelCustomer->num_rows;
?>
	<div>
		<div id="wrapper">
            <?php include_once('inc/topbar.php'); ?>
            <?php include_once('inc/menu.php'); ?>
            <div id="page-wrapper">
                <div class="page-content">
                    <div id="sum_box" class="row mbl">
                		<div class="row">
                			<div class="col-md-12">
                    			<div class="panel panel-red">
                    				<div class="panel-heading">
										<h3 class="panel-title"><span class="fa fa-user"></span> &nbsp;&nbsp; ข้อมูลส่วนบุคคล</h3>
									</div>

									<div class="panel-body">
				                        <div class="row">
				                            <div class="col-md-4">
				                                <div class="form-group">
                                                                    <div class="text-center mbl"><center><img style="height: 200px;"  src="<?php echo("$row[employee_picture]"); ?>" alt="" class="img-responsive img-circle"/></center></div>
				                                    <!--<div class="text-center mbl"><a href="#" class="btn btn-green"><i class="fa fa-upload"></i>&nbsp;
				                                        Upload</a></div>-->
				                                </div>
				                                <table class="table table-striped table-hover-color">
				                                    <tbody>
				                                    <tr>
				                                        <td>ชื่อ</td>
				                                        <td><?php echo("$row[employee_name] $row[employee_lname]"); ?></td>
				                                    </tr>
				                                    <tr>
				                                        <td>อีเมล์</td>
				                                        <td><?php echo("$row[employee_email]"); ?>
				                                    <tr>
				                                        <td>ที่อยู่</td>
				                                        <td><?php echo("$row[employee_addrp]"); ?></td>
				                                    </tr>
				                                    <tr>
				                                        <td>สถานะ</td>
				                                        <td><?php echo ($_SESSION['status']); ?></td>
				                                    </tr>
				                                    <tr>
				                                        <td>รหัสพนักงาน</td>
				                                        <td><?php echo("$row[employee_worker_id]"); ?></td>
				                                    </tr>
				                                    <tr>
				                                        <td>เริ่มปฏิบัติงาน</td>
				                                        <td><?php echo("$row[employee_register_date]"); ?></td>
				                                    </tr>
				                                    </tbody>
				                                </table>
				                            </div>

				                            <div class="col-md-8">
				                            	<div role="tabpanel">
												<?php 
												$receiver = $_SESSION['login'];
												$sendly = $_SESSION['login'];
												//$sqlMsn = "SELECT * FROM message WHERE receiver = '$receiver' ORDER BY time DESC";
												 
												$sqlMsnin ="SELECT * FROM message JOIN employee ON message.sender = employee.employee_worker_id WHERE receiver = '$receiver' AND inbox='0' ORDER BY time DESC ";
												$qryMsnin =  $conn->query($sqlMsnin);
												$numin = $qryMsnin->num_rows;

												$sqlMsnsend ="SELECT * FROM message JOIN employee ON message.receiver = employee.employee_worker_id WHERE sender = '$sendly' AND sendbox='0' ORDER BY time DESC ";
												$qryMsnsend =  $conn->query($sqlMsnsend);
												$numout = $qryMsnsend->num_rows;
												?>

													<!-- Nav tabs -->
													<ul class="nav nav-tabs" role="tablist">
														<li role="presentation" class="active"><a href="#inbox" aria-controls="inbox" role="tab" data-toggle="tab">ข้อความเข้า&nbsp;<span class="badge"><?php echo $numin; ?></span></a></li>
														<li role="presentation"><a href="#sendbox" aria-controls="sendbox" role="tab" data-toggle="tab">ข้อความออก&nbsp;<span class="badge"><?php echo $numout; ?></span></a></li>
														<li role="presentation"><a href="#work" aria-controls="work" role="tab" data-toggle="tab">งานที่รับผิดชอบ&nbsp;<span class="badge"><?php echo $numSqlSelCustomer; ?></a></li>
														<li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">ข้อมูลส่วนตัว</a></li>
													</ul>

											  		<!-- Tab panes -->
											  		<div class="tab-content">
														<!---ส่วน INBOX-->
														<div role="tabpanel" class="tab-pane active" id="inbox">
												   			<!-- ส่งข้อความ -->
															<a title="ส่งข้อความ" class="btn btn-success btn-sm" data-toggle="modal" data-target="#btnSentMsn">สร้างข้อความถึง...</a>
												   				<div class="table-responsive">
																	<table class="table table-striped table-hover-color">
																		<tr class="danger">
																			<th>วันที่ เวลา</th>
																			<th>ผู้ส่ง</th>
																			<th>ข้อความ</th>
																			<th>ตอบกลับ/ลบ</th>
																		</tr>

														 				<?php while($arrMsnin = $qryMsnin->fetch_array()){?>	
																		<tr>
																			<td><?php echo $arrMsnin['time']; ?></td>
																			<td><?php echo $arrMsnin['sender']."(".$arrMsnin['employee_name'].")"; ?></td>
																			<td>
																				<label><font color="blue"><?php echo $arrMsnin['title']; ?></font></label><br>
																				<?php echo $arrMsnin['msn']; ?>
																			</td>
																			<!--ลบข้อความ-->
																			<td>
																				<a title="ตอบกลับ" class="btn btn-info btn-sm" data-toggle="modal" data-target="#btnReply<?php echo $arrMsnin['id']; ?>"><span class="fa fa-mail-reply"></span></a>
																				<a title="ลบข้อความ" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#btnTrash<?php echo $arrMsnin['id']; ?>"><span class="fa fa-trash-o"></span></a>
																				
																				<!--MODAL TRASH-->
																				<div class="modal fade" id="btnTrash<?php echo $arrMsnin['id']; ?>">
																					<form action="sc_msn/delete_msninbox.php" method="post">
																			  			<div class="modal-dialog">
																			  				<div class="panel panel-violet">
																								<div class="modal-content">
																				  					<div class="modal-header">
																										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																										<h3 class="modal-title">ลบข้อความ</h3>
																				  					</div>

																				  					<div class="modal-body">
																										<p class="text-danger">ต้องการลบข้อความจาก : <?php echo $arrMsnin['sender']; ?> ส่งถึงคุณเมื่อ  <?php echo $arrMsnin['time']; ?></p>
																					    				<input type="hidden" name="hdfIdMsnin" value="<?php echo  $arrMsnin['id'];  ?>" />
																									</div>

																				  					<div class="modal-footer">
																										<button type="button" class="btn btn-green" data-dismiss="modal">ปิด</button>
																										<button type="submit" class="btn btn-red">ลบข้อความ</button>
																									</div>
																								</div>
																							</div><!-- /.modal-content -->
																			  			</div><!-- /.modal-dialog -->
																			 		</form>       
																				</div><!-- /.modal -->
																				<!--.MODAL TRASH-->
																	
																				<!--MODAL REPLY-->
																				<div class="modal fade" id="btnReply<?php echo $arrMsnin['id']; ?>">
																					<form action="sc_msn/reply_msn.php" method="post">
																			  			<div class="modal-dialog">
																			  				<div class="panel panel-violet">
																								<div class="modal-content">
																			      					<div class="modal-header">
																			        					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																			        					<h3 class="modal-title" id="exampleModalLabel">ตอบกลับ</h3>
																			      					</div>

																			      					<div class="modal-body">
																			       						<div class="form-group">
																			            					<label class="control-label">ผู้รับ : <?php echo $arrMsnin['employee_name']; echo "&nbsp;".$arrMsnin['employee_lname']  ?></label><br>
																			            					<label class="control-label">เรื่อง : </label>
																			            					<input type="text" class="form-control" name="txtTitle" value="<?php echo "ตอบกลับ:".$arrMsnin['title'];?>"/>
																			          					</div>

																			          					<div class="form-group">
																								            <label class="control-label">ข้อความ : </label>
																								            <textarea class="form-control" name="taText" rows="8"></textarea>
																								      	</div>
																			          					<input type="hidden" name="hdfSender" value="<?php echo $_SESSION['login'];?>">
																			          					<input type="hidden" name="hdfRecive" value="<?php echo $arrMsnin['employee_worker_id'];?>">
																			      					</div>

																			      					<div class="modal-footer">
																			        					<button type="button" class="btn btn-red" data-dismiss="modal">ปิด</button>
																			        					<button class="btn btn-green" type="submit">ตอบกลับ</button>
																			       					</div>
																			       				</div>
																			       			</div>
																			  			</div><!-- /.modal-dialog -->
																		       		</form> 
																				</div><!-- /.modal -->
																				<!--.MODAL REPLY-->
																			</td>
																			<!--.ลบข้อความ-->
																		</tr>
																		<?php }?>

																		<!--MODAL SEND-->
																		<div class="modal fade" id="btnSentMsn">
																			<form action="sc_msn/sent_msn.php" method="post">
																			  	<div class="modal-dialog">
																			  		<div class="panel panel-violet">
																						<div class="modal-content">
																							<div class="modal-header">
																		        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																		        				<h3 class="modal-title" id="exampleModalLabel">ส่งข้อความ</h3>
																		      				</div>

																		      				<div class="modal-body">
																		      					<div class="form-group">
																									<label class="control-label">ผู้รับ : </label>
																									<select name="selEmployeeSentBox" class="form form-control">
																										<option>เลือกผู้รับข้อความ</option>
																										<?php 
																											$selEmployee = "SELECT * FROM employee";
																											$querySelEmpoyee = $conn->query($selEmployee);
																											while($arrSelEmployee = $querySelEmpoyee->fetch_array())
																											{  if($arrSelEmployee['employee_worker_id'] != $_SESSION['login'])
																														{?>
																												<option value="<?php echo $arrSelEmployee['employee_worker_id']; ?>"><?php echo $arrSelEmployee['employee_name']."&nbsp;".$arrSelEmployee['employee_lname']; ?></option>
																										<?php	}
																											}
																										?>
																									</select>
																								</div>

																								<div class="form-group">
																									<label class="control-label">เรื่อง : </label>
																										<input type="text" class="form-control" name="txtTitle"/>
																								</div>

																								<div class="form-group">
																		            				<label class="control-label">ข้อความ : </label>
																		            					<textarea class="form-control" name="taText" rows="8"></textarea>
																		          				</div>

																		          				<input type="hidden" name="hdfSender" value="<?php echo $_SESSION['login'];?>"/>
																		          			
																		          			</div>

																		          			<div class="modal-footer">
																		          				<button type="button" class="btn btn-red" data-dismiss="modal">ปิด</button>
																		        				<button class="btn btn-green" type="submit">ส่งข้อความ</button>
																		       				</div>
																		       			</div>
																		       		</div>
																		       	</div>
																		    </form> 
																		</div><!-- /.modal -->
																		<!--.MODAL SEND-->
																	</table>
																</div>
														</div>
														<!---.ส่วน INBOX-->

														<!---ส่วน sendbox-->
														<div role="tabpanel" class="tab-pane" id="sendbox">
												   			<!-- ส่งข้อความ -->
															<a title="ส่งข้อความ" class="btn btn-success btn-sm" data-toggle="modal" data-target="#btnSentMsn2">สร้างข้อความถึง...</a>
												   				<div class="table-responsive">
																	<table class="table table-striped table-hover-color">
																		<tr class="danger">
																			<th>วันที่ เวลา</th>
																			<th>ผู้รับ</th>
																			<th>ข้อความ</th>
																			<th>ตอบกลับ/ลบ</th>
																		</tr>

														 				<?php while($arrMsnsend = $qryMsnsend->fetch_array()){?>	
																		<tr>
																			<td><?php echo $arrMsnsend['time']; ?></td>
																			<td><?php echo $arrMsnsend['receiver']."(".$arrMsnsend['employee_name'].")"; ?></td>
																			<td>
																				<label><font color="blue"><?php echo $arrMsnsend['title']; ?></font></label><br>
																				<?php echo $arrMsnsend['msn']; ?>
																			</td>
																			<!--ลบข้อความ-->
																			<td>
																				<a title="ตอบกลับ" class="btn btn-info btn-sm" data-toggle="modal" data-target="#btnReply<?php echo $arrMsnsend['id']; ?>"><span class="fa fa-mail-reply"></span></a>
																				<a title="ลบข้อความ" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#btnTrash<?php echo $arrMsnsend['id']; ?>"><span class="fa fa-trash-o"></span></a>
																				
																				<!--MODAL TRASH-->
																				<div class="modal fade" id="btnTrash<?php echo $arrMsnsend['id']; ?>">
																					<form action="sc_msn/delete_msnsendbox.php" method="post">
																			  			<div class="modal-dialog">
																			  				<div class="panel panel-violet">
																								<div class="modal-content">
																				  					<div class="modal-header">
																										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																										<h3 class="modal-title">ลบข้อความ</h3>
																				  					</div>

																				  					<div class="modal-body">
																										<p class="text-danger">ต้องการลบข้อความถึง : <?php echo $arrMsnsend['receiver']; ?> ส่งถึงคุณเมื่อ  <?php echo $arrMsnsend['time']; ?></p>
																					    				<input type="hidden" name="hdfIdMsnsend" value="<?php echo  $arrMsnsend['id'];  ?>" />
																									</div>

																				  					<div class="modal-footer">
																										<button type="button" class="btn btn-green" data-dismiss="modal">ปิด</button>
																										<button type="submit" class="btn btn-red">ลบข้อความ</button>
																									</div>
																								</div>
																							</div><!-- /.modal-content -->
																			  			</div><!-- /.modal-dialog -->
																			 		</form>       
																				</div><!-- /.modal -->
																				<!--.MODAL TRASH-->
																	
																				<!--MODAL REPLY-->
																				<div class="modal fade" id="btnReply<?php echo $arrMsnsend['id']; ?>">
																					<form action="sc_msn/reply_msn.php" method="post">
																			  			<div class="modal-dialog">
																			  				<div class="panel panel-violet">
																								<div class="modal-content">
																			      					<div class="modal-header">
																			        					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																			        					<h3 class="modal-title" id="exampleModalLabel">ตอบกลับ</h3>
																			      					</div>

																			      					<div class="modal-body">
																			       						<div class="form-group">
																			            					<label class="control-label">ผู้รับ : <?php echo $arrMsnsend['employee_name']; echo "&nbsp;".$arrMsnsend['employee_lname']  ?></label><br>
																			            					<label class="control-label">เรื่อง : </label>
																			            					<input type="text" class="form-control" name="txtTitle" value="<?php echo "ตอบกลับ:".$arrMsnsend['title'];?>"/>
																			          					</div>

																			          					<div class="form-group">
																								            <label class="control-label">ข้อความ : </label>
																								            <textarea class="form-control" name="taText" rows="8"></textarea>
																								      	</div>
																			          					<input type="hidden" name="hdfSender" value="<?php echo $_SESSION['login'];?>">
																			          					<input type="hidden" name="hdfRecive" value="<?php echo $arrMsnsend['employee_worker_id'];?>">
																			      					</div>

																			      					<div class="modal-footer">
																			        					<button type="button" class="btn btn-red" data-dismiss="modal">ปิด</button>
																			        					<button class="btn btn-green" type="submit">ตอบกลับ</button>
																			       					</div>
																			       				</div>
																			       			</div>
																			  			</div><!-- /.modal-dialog -->
																		       		</form> 
																				</div><!-- /.modal -->
																				<!--.MODAL REPLY-->
																			</td>
																			<!--.ลบข้อความ-->
																		</tr>
																		<?php }?>

																		<!--MODAL SEND-->
																		<div class="modal fade" id="btnSentMsn2">
																			<form action="sc_msn/sent_msn.php" method="post">
																			  	<div class="modal-dialog">
																			  		<div class="panel panel-violet">
																						<div class="modal-content">
																							<div class="modal-header">
																		        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																		        				<h3 class="modal-title" id="exampleModalLabel">ส่งข้อความ</h3>
																		      				</div>

																		      				<div class="modal-body">
																		      					<div class="form-group">
																									<label class="control-label">ผู้รับ : </label>
																									<select name="selEmployeeSentBox" class="form form-control">
																										<option>เลือกผู้รับข้อความ</option>
																										<?php 
																											$selEmployee = "SELECT * FROM employee";
																											$querySelEmpoyee = $conn->query($selEmployee);
																											while($arrSelEmployee = $querySelEmpoyee->fetch_array())
																											{  if($arrSelEmployee['employee_worker_id'] != $_SESSION['login'])
																														{?>
																												<option value="<?php echo $arrSelEmployee['employee_worker_id']; ?>"><?php echo $arrSelEmployee['employee_name']."&nbsp;".$arrSelEmployee['employee_lname']; ?></option>
																										<?php	}
																											}
																										?>
																									</select>
																								</div>

																								<div class="form-group">
																									<label class="control-label">เรื่อง : </label>
																										<input type="text" class="form-control" name="txtTitle"/>
																								</div>

																								<div class="form-group">
																		            				<label class="control-label">ข้อความ : </label>
																		            					<textarea class="form-control" name="taText" rows="8"></textarea>
																		          				</div>

																		          				<input type="hidden" name="hdfSender" value="<?php echo $_SESSION['login'];?>"/>
																		          			
																		          			</div>

																		          			<div class="modal-footer">
																		          				<button type="button" class="btn btn-red" data-dismiss="modal">ปิด</button>
																		        				<button class="btn btn-green" type="submit">ส่งข้อความ</button>
																		       				</div>
																		       			</div>
																		       		</div>
																		       	</div>
																		    </form> 
																		</div><!-- /.modal -->
																		<!--.MODAL SEND-->
																	</table>
																</div>
														</div>
														<!---.ส่วน sendbox-->
												
														<!---ส่วน WORK-->
														<div role="tabpanel" class="tab-pane" id="work">
														 	<?php
																/*$sqlSelCustomer = "SELECT `fk_n_customer_id`,customer_company,coast_work_hour FROM `coast_work` JOIN customer ON coast_work.`fk_customer_tax_id`= customer.`customer_tax_id` 
																	JOIN customer_gen ON coast_work.fk_n_customer_id=customer_gen.n_customer_id 
																	WHERE customer_gen.check_close='0' AND coast_work.fk_employee_worker_id= '".$_SESSION['login']."'";*/
																	
																//$querySqlSelCustomer = $conn->query($sqlSelCustomer);
																while($arrQuerySqlSelCustomer = $querySqlSelCustomer->fetch_array()) /*วน หา บริษัทที่รับผิดชอบ*/
																{
																	$pass_work_customer = $arrQuerySqlSelCustomer['fk_n_customer_id'];
																	$time_setup = $arrQuerySqlSelCustomer['coast_work_hour'];
															?>	
															<div class="row">
															  	<div class="table-responsive">
																	<table class="table table-striped table-hover-color">
																		<tr>
																			<td width="200"><label>รหัสงาน  :<font color="blue"> <?php echo $pass_work_customer; ?></font></label></td>
																			<td width="200"><label>ชื่อบริษัท :<font color="blue">  <?php echo $arrQuerySqlSelCustomer['customer_company'];?></font></label></td>
																			<td width="200">
																				<label class="control-label">เวลาที่ใช้ :
																				<?php
																					/*$sqlSpendTime = "SELECT SUM(`dr_time_hour`) AS sum_hour,SUM(`dr_time_minute`/60) AS sum_minute_hr, sum(dr_time_minute) AS sum_minute,COUNT(dr_id) AS count_dr_id  
																					FROM `daily_record` WHERE `fk_n_customer_id` = '$pass_work_customer' AND dr_em_id='".$_SESSION['login']."'";*/
																					$sqlSpendTime = "SELECT SUM(`dr_time_hour`) AS sum_hour,SUM(`dr_time_minute`/60) AS sum_minute_hr, sum(dr_time_minute) AS sum_minute,sum(dr_record) AS count_dr_id  
																					FROM `daily_record` WHERE fk_n_customer_id='$pass_work_customer' AND dr_em_id='".$_SESSION['login']."'";
																					$qrySpendTime = $conn->query($sqlSpendTime);
																						while($arrSpendTime = $qrySpendTime->fetch_array())
																						{
																							$spend_hour = $arrSpendTime['sum_hour'];
																							$spend_minute_hr = $arrSpendTime['sum_minute_hr'];
																							$sum_minute = $arrSpendTime['sum_minute'];
																							$recod_dr = $arrSpendTime['count_dr_id'];
																						}
																					$sum_minute_mod = fmod($sum_minute,60);
																					$sum_hour = $spend_hour+intval($spend_minute_hr);
																					/*แสดงเวลาที่ใช้ทั้งหมด*/
																					echo "<font color='blue'>".$sum_hour. "&nbsp;ชั่วโมง&nbsp;" . $sum_minute_mod. "&nbsp;นาที"."</font>";
																					/*แสดงเวลาที่เหลือ*/
																					$convTimeSet = $time_setup*60;
																					$convTimeUseHr = $sum_hour*60+$sum_minute_mod;
																					$sumTimeCon = $convTimeSet - $convTimeUseHr;
																				 	$remainTime_hr = intval($sumTimeCon/60); //แปลงเป็นชัวโมง
																				 	$remainTime_minute = fmod($sumTimeCon,60); //เศษนาที
																				?>
																				</label>
																			</td>
																			<td width="200">
																				<label class="control-label">
																					<?php echo "เวลาที่เหลือ : &nbsp;<font color='blue'>".$remainTime_hr."&nbsp;ชั่วโมง&nbsp;".$remainTime_minute."&nbsp;นาที</font>" ; ?>
																				</label>
																			</td>
																			<td width="100">
																				<?php echo ("record :  <font color='blue'>$recod_dr</font>");?>
																			</td>
																			<td>
																				<a class="btn btn-blue btn-sm" data-toggle="modal" data-target="#panlDetail<?php echo $pass_work_customer; ?>" title="รายละเอียดเพิ่มเติม"><span class="fa fa-list"><span></a>
																			</td>
															   			</tr>
															 		</table>
																</div>
															</div>	
														
															    
															<!--Modal List-->
															<div class="modal fade" id="panlDetail<?php echo $pass_work_customer; ?>">
																<div class="modal-dialog modal-lg">
																	<div class="panel panel-violet">
																		<div class="modal-content">
																		  	<div class="modal-header">
																				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																				<h3 class="modal-title">รายละเอียดงาน รหัสงาน : <font color = "blue"><?php echo $pass_work_customer;?></font>&nbsp;&nbsp;บริษัท :<font color = "blue"> <?php echo $arrQuerySqlSelCustomer['customer_company'];?></font></h3>
																		  	</div>
																		  	
																		  	<div class="modal-body">
																				<!--รายละเอียดงาน-->
																				<div class="table-responsive">
																					<table class="table table-striped table-hover-color">
																					<?php 
																						$sqlSelConditions = "SELECT * FROM conditions WHERE n_customer_id = '".$arrQuerySqlSelCustomer['fk_n_customer_id']."'";
																						$querySqlSelConditions = $conn->query($sqlSelConditions);
																					?>
																						<tr class="danger">
																							<th width="500px">งาน</th>
																							<th>วันสุดท้ายของระบบ</th>
																							<!--<th>เหลือเวลา</th>
																							<th>เวลาที่ใช้</th> -->
																						</tr>
																					<?php 
																						while($arrSelConditions = $querySqlSelConditions->fetch_array()) /*วนหาเงือนไขของบริษัทนั้นๆ ที่พนักงานรับผิดขอบ*/
																						{
																					?>
																						<tr>
																							<td><?php echo $arrSelConditions['condition_name']; ?></td>
																							<td><font clolor="blue">วันที่ <?php echo $arrSelConditions['condition_dat'];?></font>ของ <font color="blue"><?php echo $arrSelConditions['condition_month'];?></font></td>
																							<!--<td>ส่วนนี้</td>
																							<td>กับส่วนนี้</td> -->
																						</tr>
																					<?php 
																						} /*.วนหาเงือนไขของบริษัทนั้นๆ ที่พนักงานรับผิดขอบ*/?>
																					</table>
																				</div>
																			</div>
																			<!--.รายละเอียดงาน-->

																		  	<div class="modal-footer">
																				<button type="button" class="btn btn-red" data-dismiss="modal">ปิด</button>
																			</div>
																		</div><!-- /.modal-content -->
																	</div><!-- /.modal-dialog -->
																</div><!-- /.modal -->
															</div>
															<!--.Modal List-->
													
											  				<?php 
											  					} //.วน หา บริษัทที่รับผิดชอบ
											  				?>
														</div>
														<!---.ส่วน WORK-->
												
														<!---ส่วน PROFILE-->
														<div role="tabpanel" class="tab-pane" id="profile">
													 		<div class="from-body pal">
													 			<form action="ed_profile.php" class="form-horizontal" method="GET">
														 			<div class="row">
														 				<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>ชื่อ-นามสกุล : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_name] $row[employee_lname]"); ?></p>
																					</div>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>สถานะ : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo ($_SESSION['status']); ?></p>
																					</div>
																			</div>
																		</div>
																	</div>
														
																	<div class="row">	
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>รหัสพนักงาน : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_worker_id]"); ?></p>
																					</div>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>รหัสผู้ทำบัญชี : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_audit_id]"); ?></p>
																					</div>
																			</div>
																		</div>
																	</div>

																	<div class="row">	
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>เลขประจำตัวประชาชน : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_nation_id]"); ?></p>
																					</div>
																			</div>
																		</div>

																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>สถานภาพสมรส : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_married_status]"); ?></p>
																					</div>
																			</div>
																		</div>
																	</div>

																	<div class="row">	
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>ที่อยู่ตามทะเบียนบ้าน : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_addr]"); ?></p>
																					</div>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>ที่อยู่ปัจจุบัน : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_addrp]"); ?></p>
																					</div>
																			</div>
																		</div>
																	</div>

																	<div class="row">	
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>โทรศัพท์ : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_tel]"); ?></p>
																					</div>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>อีเมล์ : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_email]"); ?></p>
																					</div>
																			</div>
																		</div>
																	</div>

																	<div class="row">	
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>บุคคลที่ติดต่อได้ : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_contact_name]"); ?></p>
																					</div>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>โทรศัพท์ : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_contact_tel]"); ?></p>
																					</div>
																			</div>
																		</div>
																	</div>

																	<div class="row">	
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>ระดับการศึกษา : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_graduate]"); ?></p>
																					</div>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>สาขาวิชาที่จบ : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_major]"); ?></p>
																					</div>
																			</div>
																		</div>
																	</div>

																	<div class="row">	
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>เกรดเฉลี่ยรวม : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_grade]"); ?></p>
																					</div>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>ชื่อมหาวิทยาลัย : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_academy]"); ?></p>
																					</div>
																			</div>
																		</div>
																	</div>

																	<div class="row">	
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>เริ่มปฏิบัติงาน : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_register_date]"); ?></p>
																					</div>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>อัตราเงินเดือน : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_salary]"); ?> บาท</p>
																					</div>
																			</div>
																		</div>
																	</div>

																	<div class="row">	
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>เงื่อนไขวันหยุดและสวัสดิการ : </b></label>
																					<div class="col-md-7">
																						<p class="form-control-static"><?php echo("$row[employee_condition]"); ?></p>
																					</div>
																			</div>
																		</div>
																		<div class="col-md-6">
																			<div class="form-group">
																				<label class="col-md-5 control-label"><b>เอกสารสัญญาจ้าง : </b></label>
																					<div class="col-md-7">
																					<?php 
																					 	$employee_convention = NULL;
																					 	@$employee_convention = $row[employee_convention];
																					 
																					 	if($employee_convention != "")
																					 	{
																							echo "<p><a href='$row[employee_convention]' target='_blank'>ดาวน์โหลด</a></p>";
																					 	}
																						elseif($employee_convention == "")
																					 	{
																							echo "<p>ไม่พบเอกสาร</p> ";
																					 	}
																						//echo("$row[employee_convention]"); 
																					?>
																					</div>
																			</div>
																		</div>
																	</div>

																	<div class="row">
																		<center>
																			<input type="submit" class="btn btn-green btn-sm" onclick="window.location='ed_profile.php'" value="แก้ไขข้อมูลส่วนตัว"/> 
																		</center>
																	</div>

																</form>
															</div>
														</div>
														<!---ส่วน .PROFILE-->
													</div><!--.div tab-content-->

												</div><!--.div tabpanel-->
				                            </div>

				                        </div>
			                    	</div>
					            </div>
					        </div>
            			</div>
					</div>
				</div>
				<!--BEGIN FOOTER-->
                <?php include_once('inc/footer.php');  ?>
                <!--END FOOTER-->
			</div><!-- END page-wrapper -->
		</div><!-- END wrapper -->
	</div>

	<?php $conn->close(); ?>

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
		header("Location:index.php");
	}
	?>
</body>
</html>