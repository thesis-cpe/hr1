<?php
	@session_start();
	include_once('inc/config.php');
	include_once('inc/connect.php');
	//include('session.php');

$value=$_POST["value"];
	
	if($value==""){
		$sql = "SELECT * FROM employee ORDER BY employee_worker_id ASC";
	}
	else{
	$sql = "SELECT * FROM employee WHERE employee_name LIKE '%".$value."%' || employee_lname LIKE '%".$value."%'";
	}
	
	$result = $conn->query($sql);
?>
	<table class="table table-hover-color">
		<thead>
			<tr class="danger">
				<th>รหัสพนักงาน</th>
				<th>ชื่อ - นามสกุล</th>
				<th>โทรศัพท์</th>
				<th>อีเมล์</th>
				<th>หมายเหตุ</th>
			</tr>
		</thead>
										
	<?php 
		while($row = $result->fetch_array())
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
						<div id="pnlDetail<?php echo ("$row[employee_worker_id]");?>" tabindex="-1" role="dialog" aria-labelledby="modal-wide-width-label" aria-hidden="true" class="modal fade" >
							<div class="modal-dialog modal-wide-width">
								<div class="panel panel-violet">	
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
											<h3 class="modal-title"><span class="fa fa-search"></span> &nbsp;ข้อมูลพนักงาน</h3>
										</div>
											
										<div class="modal-body">
											<div class="form-group row">  <!--แสดงภาพ-->
												<center> <img src="<?php echo ("$row[employee_picture]"); ?>"/ width="300px" height="300px" class="img-responsive img-circle"> </center> <br>
											</div>

											<form action="#" class="form-horizontal">
												<div class="row">
									 				<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>ชื่อ-นามสกุล : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_name] $row[employee_lname]");?></p>
																</div>
														</div>
													</div>
												</div>
												<div class="row">
									 				<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>รหัสพนักงาน : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_worker_id]");?></p>
																</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>รหัสผู้ทำบัญชี : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_audit_id]");?></p>
																</div>
														</div>
													</div>
												</div>
												<div class="row">
									 				<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>เลขประจำตัวประชาชน : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_nation_id]");?></p>
																</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>สถานะสมรส : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_married_status]");?></p>
																</div>
														</div>
													</div>
												</div>
												<div class="row">
									 				<div class="col-md-12">
														<div class="form-group">
															<label class="col-md-2 control-label"><b>ที่อยู่ตามทะเบียนบ้าน : </b></label>
																<div class="col-md-8">
																	<p class="form-control-static"><?php echo ("$row[employee_addr]");?></p>
																</div>
														</div>
													</div>
												</div>
												<div class="row">
									 				<div class="col-md-12">
														<div class="form-group">
															<label class="col-md-2 control-label"><b>ที่อยู่ปัจจุบัน : </b></label>
																<div class="col-md-8">
																	<p class="form-control-static"><?php echo ("$row[employee_addrp]");?></p>
																</div>
														</div>
													</div>
												</div>
												<div class="row">
									 				<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>โทรศัพท์ : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_tel]");?></p>
																</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>อีเมล์ : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_email]");?></p>
																</div>
														</div>
													</div>
												</div>	
												<div class="row">
									 				<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>บุคคลที่ติดต่อได้ : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_contact_name]");?></p>
																</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>โทรศัพท์บุคคลที่ติดต่อได้ : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_contact_tel]");?></p>
																</div>
														</div>
													</div>
												</div>
												<div class="row">
									 				<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>ระดับการศึกษา : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_graduate]");?></p>
																</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>สาขาวิชา : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_major]");?></p>
																</div>
														</div>
													</div>
												</div>
												<div class="row">
									 				<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>เกรดเฉลี่ยรวม : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_grade]");?></p>
																</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>มหาวิทยาลัย : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_academy]");?></p>
																</div>
														</div>
													</div>
												</div>	
												<div class="row">
									 				<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>เริ่มปฏิบัติงาน : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_register_date]");?></p>
																</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>อัตราเงินเดือน : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_salary]");?></p>
																</div>
														</div>
													</div>
												</div>	
												<div class="row">
									 				<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>ค่าแรงต่อวัน : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_coast]");?></p>
																</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><b>จำนวนวันทำงาน : </b></label>
																<div class="col-md-7">
																	<p class="form-control-static"><?php echo ("$row[employee_datework]");?></p>
																</div>
														</div>
													</div>
												</div>	
												<div class="row">
									 				<div class="col-md-12">
														<div class="form-group">
															<label class="col-md-2 control-label"><b>เงื่อนไข : </b></label>
																<div class="col-md-8">
																	<p class="form-control-static"><?php echo ("$row[employee_condition]");?></p>
																</div>
														</div>
													</div>
												</div>			
											</form>

											<div class="modal-footer">
												<div class="form-group row">
													<div class="col-md-offset-4 col-md-8">
														<button class="btn btn-red" data-dismiss="modal" type="button">ปิด</button>
													</div>
												</div>
											</div><!-- /modal-footer -->
										</div><!-- /panel info -->
									</div><!-- /model-body -->

								</div><!-- /modal-content -->								
							</div><!-- /modal-dialog -->							
						</div><!-- /pnlDetail -->

					<a title="แก้ไข" class="btn btn-yellow btn-sm" href="ed_employee.php?em_id=<?php echo ("$row[employee_worker_id]");?>" onclick="return confirm('ต้องการแก้ไขข้อมูล? : <?php echo ("$row[employee_worker_id]");?>');"><span class="fa fa-edit"></span></a>
					<a title="ลบ" class="btn btn-red btn-sm" onclick="return confirm('ช้อมูลที่เกี่ยวข้องกับ? : <?php echo ("$row[employee_worker_id]"); ?> จะถูกลบทั้งหมด');" href="de_employee.php?emp_worker_id=<?php echo ("$row[employee_worker_id]"); ?>"><span class="fa fa-trash-o"></span></a>

					<a title="งานที่รับผิดชอบ" class="btn btn-green btn-sm" data-toggle="modal" data-target="#pnlDetailwork<?php echo ("$row[employee_worker_id]");?>"><span class="fa fa-users"></span></a>
					
					<!--แบงค์ เพิ่ม MSN-->
					<a title="ส่งข้อความ" class="btn btn-blue btn-sm" data-toggle="modal" data-target="#pnlMsn<?php echo ("$row[employee_worker_id]");?>"><span class="fa  fa-envelope-o"></span></a>

						<!--MODAL MSN-->
					 	<form method="POST" action="sc_msn/sent.php">
						  	<div class="modal fade" id="pnlMsn<?php echo ("$row[employee_worker_id]");?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="panel panel-violet">
									    <div class="modal-content">
									      	<div class="modal-header">
									        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									        	<h3 class="modal-title" id="exampleModalLabel">ส่งข้อความ</h3>
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
									        	<button type="button" class="btn btn-red" data-dismiss="modal">ปิด</button>
									        	<button class="btn btn-green" type="submit">ส่ง</button>
									       	</div>
									    </div>
									</div>
								</div>
							</div>
						</form>	
						<!--.MODAL MSN-->
					<!--แบงค์ เพิ่ม MSN-->

					<a title="แก้ไขรหัสผ่าน" class="btn btn-orange btn-sm" data-toggle="modal" data-target="#pnlEditpass<?php echo ("$row[employee_worker_id]");?>"><span class="fa fa-key"></span></a>
						
						<div class="modal fade" id="pnlEditpass<?php echo ("$row[employee_worker_id]");?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<form method="POST" action="sc_updateuseremployee.php">
								<div class="modal-dialog">
									<div class="panel panel-violet">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h3 class="modal-title" id="exampleModalLabel">แก้ไขรหัสผ่าน&nbsp;<?php echo ("$row[employee_worker_id]");?></h3>
											</div>
											<?php
												$sqla = ("SELECT * FROM user WHERE fkey_worker_id=$row[employee_worker_id]");
												$resulta = $conn->query($sqla);
												$rowa = $resulta->fetch_array();
											?>
									
											<div class="modal-body">
												<div class="form-group">
													<label class="control-label">ชื่อผู้ใช้ : </label>
													<input type="text" class="form-control" name="txtUser" value="<?php echo ("$rowa[email]"); ?>" readonly/>
													<label class="control-label">รหัสผ่านใหม่ :</label>
													<input type="password" class="form-control" name="txtPassword"/>
													<label class="control-label">ยืนยันรหัสผ่าน :</label>
													<input type="password" class="form-control" name="txtConpassword"/>
													<input type="hidden" class="form-control" name="txtNumem" value="<?php echo ("$rowa[fkey_worker_id]"); ?>"/>
												</div>
											</div>

											<div class="modal-footer">
												<button type="button" class="btn btn-red" data-dismiss="modal">ปิด</button>
												<button class="btn btn-green" type="submit">บันทึก</button>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
						
						<!-- modal show work -->
						<div id="pnlDetailwork<?php echo ("$row[employee_worker_id]"); ?>" tabindex="-1" role="dialog" aria-labelledby="modal-wide-width-label" aria-hidden="true" class="modal fade" >
							<div class="modal-dialog modal-wide-width">
								<div class="panel panel-violet">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
											<h3 class="modal-title"><span class="fa fa-search"></span> &nbsp;ข้อมูลงานที่รับผิดชอบ</h3>
										</div>
										
										<div class="modal-body">
											<div class="table-responsive">
												<table class="table table-hover-color">
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
												
													$sqli = ("SELECT * FROM coast_work INNER JOIN customer ON coast_work.fk_customer_tax_id=customer.customer_tax_id 
														INNER JOIN daily_record ON daily_record.fk_n_customer_id=coast_work.fk_n_customer_id 
														INNER JOIN customer_gen ON customer_gen.n_customer_id=coast_work.fk_n_customer_id 
														INNER JOIN close_work ON close_work.customer_gen=customer_gen.n_customer_id
														WHERE coast_work.fk_employee_worker_id=$row[employee_worker_id] AND customer_gen.check_close=0 
														GROUP BY daily_record.fk_n_customer_id");
													$resulti = $conn->query($sqli);
													$rowi = $resulti->fetch_array();
													//print_r($rowi);

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
																		FROM daily_record WHERE dr_em_id='$row[employee_worker_id]' 
																		AND fk_n_customer_id='$rowi[fk_n_customer_id]'"); 
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

			                                                        $allhour = $rowi['coast_work_hour']*60;
																	//@$per = ($alluse/$allhour)*100;
																	$dif = $allhour-$allused;
																	$dhour = intval($dif/60);
																	$dminute = fmod($dif,60); 

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
														<button class="btn btn-red" data-dismiss="modal" type="button">ปิด</button>
														<a href="workuserv2.php?worker=<?php echo ("$row[employee_worker_id]"); ?>" class="btn btn-blue">ดูงานส่วนบุคคล</a>
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
		}
	?>
	</table>
</div>
