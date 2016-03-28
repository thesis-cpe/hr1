<?php
	@session_start();
	include_once('inc/config.php');
	include_once('inc/connect.php');
	//include('session.php');

$value=$_POST["value"];
$time = date("d/m/Y");
	
	if($value==""){
		$sql = ("SELECT * FROM customer_gen INNER JOIN customer ON customer_gen.fk_customer_tax_id=customer.customer_tax_id 
				ORDER BY customer_gen.n_customer_id DESC");
	}
	else{
		$sql = ("SELECT * FROM customer_gen INNER JOIN customer ON customer_gen.fk_customer_tax_id=customer.customer_tax_id 
				WHERE customer.customer_company LIKE '%".$value."%' || customer_gen.n_customer_id LIKE '%".$value."%'");
	}
	
	$result = $conn->query($sql);
?>
<table class="table table-hover-color">
	<thead>
		<tr class="danger">
			<th>รหัสงานบริษัท</th>
			<th>ชื่อลูกค้า</th>
			<th>หมายเหตุ</th>
		</tr>
	</thead>

<?php 
$i=0;
while($row = $result->fetch_array())
{$i++;
?>	
	<tbody>
		<tr class="active">

			<td><?php  echo("$row[n_customer_id]"); ?></td>
			<td><?php  echo("$row[customer_company]"); ?></td>
			<td>
				<a title="ข้อมูลงาน" class="btn btn-blue btn-sm" data-toggle="modal" data-target="#pnlDetail<?php echo ("$row[n_customer_id]");?>"><span class="fa fa-tasks"></span></a>
				
				<!-- modal show work -->
				<div id="pnlDetail<?php echo ("$row[n_customer_id]");?>" tabindex="-1" role="dialog" aria-labelledby="modal-wide-width-label" aria-hidden="true" class="modal fade" >
					<div class="modal-dialog modal-wide-width">
						<div class="panel panel-violet">	
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
									<h3 class="modal-title"><span class="fa fa-search"></span> &nbsp;ข้อมูลงานบัญชีและงานภาษี : <?php echo ("$row[n_customer_id]");?> </h3>
								</div><br>
								<div class="modal-body">
									<div class="row">  <!--แสดงภาพ-->
										<center> <img src="<?php echo ("$row[customer_img]"); ?>"/ width="300px" height="200px"> </center> <br>
									</div><br>

									<!-- ใส่รายละเอียด -->
									<div class="table-responsive">
										<table class="table table-hover-color" border="0">
											<tr>
												<td><b><span style="color:red"> ข้อมูลกิจการ </span></b></td>
											</tr>

											<tr>
												<td><b> รหัสงาน : </b></td>
												<td><?php echo ("$row[n_customer_id]") ?></td>
												<td><b> รหัสลูกค้า : </b></td>
												<td><?php echo ("$row[fk_customer_tax_id]") ?></td>
											</tr>

											<tr>
												<td><b> ชื่อลูกค้า : </b></td>
												<td><?php echo ("$row[customer_company]") ?></td>
												<td></td>
												<td></td>
											</tr>

											<tr>
												<td><b> ผู้ติดต่องาน : </b></td>
												<td><?php echo ("$row[customer_contact]") ?></td>
												<td></td>
												<td></td>
											</tr>

											<tr>
												<td><b> โทรศัพท์ : </b></td>
												<td><?php echo ("$row[customer_contact_tel]") ?></td>
												<td><b> อีเมล์ : </b></td>
												<td><?php echo ("$row[customer_contact_email]") ?></td>
											</tr>

											<tr>
												<td><b> หมายเหตุ : </b></td>
												<td><?php echo ("$row[customer_gen_comment]") ?></td>
												<td></td>
												<td></td>
											</tr>

											<tr>
												<td><b><span style="color:red"> ข้อมูลทีมงาน </span></b></td>
											</tr>

											<tr>
											<?php
												$sqll = ("SELECT * FROM employee INNER JOIN coast_work ON employee.employee_worker_id=coast_work.fk_employee_worker_id WHERE coast_work.fk_n_customer_id=$row[n_customer_id]");
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
														<td><?php if($rs['24']==0) {echo ("ผู้ทำบัญชี");}else{echo ("ผู้ปฏิบัติงาน");} ?></td>
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
												$sqli = ("SELECT * FROM work_details WHERE fk_n_customer_id=$row[n_customer_id]");
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
													<td><?php if($rowi['work_coast_choice']=="0"){echo "รายเดือน";}else{echo "รายครั้ง";} ?></td>
												</tr>

												<tr>
													<td><b> ราคา : </b></td>
													<td><?php echo ("$rowi[work_coast_bath]") ?>บาท</td>
													<td><b> งวดงาน : </b></td>
													<td><?php echo ("$rowi[work_period]") ?></td>
												</tr>
											</tr>

											<tr>
												<td><b><span style="color:red"> เงื่อนไขการให้บริการ </span></b></td>
											</tr>

											<tr>
											<?php
												$sqlx = ("SELECT * FROM conditions WHERE n_customer_id=$row[n_customer_id]");
												$resultx = $conn->query($sqlx);
												$rowx = $resultx->fetch_all();
												//print_r ($rowx);
													
												foreach ($rowx as $rx) 
												{
											?>
													<tr>
														<td><b><span style="color:green"><?php echo ($rx['2']) ?></span></b></td>
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
												$sqlj = ("SELECT * FROM convention INNER JOIN quotation ON convention.fk_n_customer_id=quotation.fk_n_customer_id  WHERE convention.fk_n_customer_id=$row[n_customer_id]");
												$resultj = $conn->query($sqlj);
												$rowj = $resultj->fetch_assoc();
												//print_r ($rowj);
											?>
												<tr>
													<td><b> ใบเสนอราคา </b></td>
												</tr>

												<tr>
													<td><b> วันที่เสนอราคา : </b></td>
													<td><?php echo ("$rowj[quotation_date]"); ?></td>
													<td><b> ยอดเงินรวม : </b></td>
													<td><?php echo ("$rowj[quotation_price]"); ?></td>
												</tr>

												<tr>
													<td><b> เลขที่ใบเสนอราคา : </b></td>
													<td><?php echo ("$rowj[quotation_no]"); ?></td>
													<td><b> เอกสาร : </b></td>
													<td><a href="<?php echo ("$rowj[quotation_path]"); ?>" target="_blank">DOWNLOAD</a></td>
												</tr>

												<tr>
													<td><b> สัญญาว่าจ้าง </b></td>
												</tr>

												<tr>
													<td><b> วันที่เสนอราคา : </b></td>
													<td><?php echo ("$rowj[convention_date]"); ?></td>
													<td><b> ยอดเงินรวม : </b></td>
													<td><?php echo ("$rowj[convention_price]"); ?></td>
												</tr>

												<tr>
													<td><b> เลขที่สัญญาว่าจ้าง : </b></td>
													<td><?php echo ("$rowj[convention_no]"); ?></td>
													<td><b> สัญญาว่าจ้าง : </b></td>
													<td><a href="<?php echo ("$rowj[convention_path]"); ?>" target="_blank">DOWNLOAD</a></td>
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
								<!-- END modal-body -->
							</div>
							<!-- END panel-info -->
						</div><!-- /modal-content -->								
					</div><!-- /modal-custom -->							
				</div><!-- /pnlDetail -->
			
				<a title="สรุปผล" class="btn btn-green btn-sm" href="conclude.php?cus=<?php echo ("$row[n_customer_id]"); ?>&name=<?php echo ("$row[customer_company]");?>" ><span class="fa fa-bar-chart-o"></span></a>

				<a class="btn btn-yellow btn-sm" href="ed_work.php?cusnew=<?php echo ("$row[n_customer_id]");?>&cusold=<?php echo ("$row[fk_customer_tax_id]");?>" title="แก้ไข" onclick="return confirm('แก้ไขข้อมูลงาน : <?php echo ("$row[n_customer_id]");?>');"><span class="fa fa-edit"></span></a>
				
				<a class="btn btn-red btn-sm" href="de_work.php?cusnew_tax_id=<?php echo ("$row[n_customer_id]");?>" title="ลบ" onclick="return confirm('ข้อมูลที่เกี่ยวข้องกับ : <?php echo ("$row[n_customer_id]");?> จะถูกลบออกทั้งหมด');"><span class="fa fa-trash-o"></span></a>

				<?php
					$sqla = ("SELECT check_close FROM customer_gen WHERE n_customer_id=$row[n_customer_id]");
					$resulta = $conn->query($sqla);
					$rowa = $resulta->fetch_assoc();
					//print_r($rowa);

					if($rowa['check_close']==0)
					{
				?>
						<a title="เปิดโครงการ" class="btn btn-success btn-sm" href="cl_work.php?cusnew_id=<?php echo ("$row[n_customer_id]");?>&cl=1" onclick="return confirm('ทำการปิดโครงการ : <?php echo ("$row[n_customer_id]");?>');"><span class="fa fa-power-off "></span></a>
				<?php 
					}
					else
					{
				?>
						<a title="ปิดโครงการ" class="btn btn-gray btn-sm" href="cl_work.php?cusnew_id=<?php echo ("$row[n_customer_id]");?>&cl=0" onclick="return confirm('ทำการเปิดโครงการ : <?php echo ("$row[n_customer_id]");?>');"><span class="fa fa-power-off "></span></a>
				<?php
					}
				?>

				<a title="รายรับ" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#pnlPayment<?php echo ("$row[n_customer_id]");?>"><span class="fa fa-usd"></span></a>

				<!-- modal payment -->
				<form action="sc_payment.php" method="post" enctype="multipart/form-data">
					<div id="pnlPayment<?php echo ("$row[n_customer_id]");?>" tabindex="-1" role="dialog" aria-labelledby="modal-wide-width-label" aria-hidden="true" class="modal fade" >
						<div class="modal-dialog modal-wide-width">
							<div class="panel panel-violet">	
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
										<h3 class="modal-title"><span class="fa fa-search"></span> &nbsp;เพิ่มรายรับค่าทำบัญชีและภาษี : <?php echo ("$row[n_customer_id]");?> </h3>
									</div><br>
									<div class="modal-body">
										<input type="hidden" name="txtCustomer" value="<?php echo ("$row[n_customer_id]");?>"/>
										<input type="hidden" name="txtTax" value="<?php echo ("$row[customer_tax_id]");?>"/>
										<!-- ใส่รายละเอียด -->
										<div class="row">
											<div class="col-md-3">
												<label>วันที่บันทึก :</label>
											</div>
											<div class="col-md-3">
												<input type="text" id="DateBox" name="DateBox" class="form-control" value="<?php echo $time; ?>" readonly/>
											</div>
											<div class="col-md-3">
												<label>วันที่รับเงิน :</label>
											</div>
											<div class="col-md-3">
												<input type="text" id="datepicker-th" name="txtReceive" class="form-control">
											</div>
										</div><br>

										<div class="row">
											<div class="col-md-3">
												<label>เลขที่ใบเสร็จ :</label>
											</div>
											<div class="col-md-3">
												<input type="text" id="txtBill" name="txtBill" class="form-control" onKeyPress="return KeyCodeTwo(txtBill)">
											</div>
											<div class="col-md-3">
												<label>จำนวนเงิน :</label>
											</div>
											<div class="col-md-3">
												<input type="text" class="form-control" id="txtMoney" name="txtMoney" onKeyPress="return KeyCode(txtMoney)">
											</div>
										</div><br>

										<div class="row">
											<div class="col-md-3">
												<label>แนบเอกสาร :</label>
											</div>
											<div class="col-md-3">
												<!--<input type="file" class="form-control" name="fileoffice" placeholder"<?php  ?>">-->
												<div style="position:relative;">
							                      <a class='btn btn-primary' href='javascript:;'> Choose File...
							                      <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
							                      -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
							                      color:transparent;' name="fileoffice" size="50"  onchange='$("#upload-file").html($(this).val());'>
							                      </a> &nbsp; <span class='label label-info' id="upload-file"></span></div>
											</div>
										</div><br>

										<div class="row">
											<div class="col-md-12">
												<textarea type="text" name="txtDetail" class="form-control" rows="5" placeholder="รายละเอียด"></textarea>
											</div>
										</div><br>

										<div class="row">
											<div class="col-md-6">
												<?php
													$sqlreceive = "SELECT payment_coast, payment_path FROM payment WHERE fk_n_customer='$row[n_customer_id]' ORDER BY payment_id ASC";
													$resultreceive = $conn->query($sqlreceive);
													$rowreceive = $resultreceive->fetch_array();

													if($rowreceive['payment_coast']>=1)
													{
														echo ('<label style="color:RED">หมายเหตุ!!!</label>')."<br>";
														$p=0;
														do  
														{
															$p++;
												?>
															<label style="color:BLUE">งวดที่ <?php echo $p; ?> : <?php echo $rowreceive['payment_coast']; ?> บาท</label>
															<br>
												<?php
															@$total+=$rowreceive['payment_coast'];
														}while($rowreceive = $resultreceive->fetch_array())
												?>
													<label style="color:GREEN">รวม : <?php echo $total; ?> บาท</label>
													<br>
												<?php
														//echo ('<label style="color:BLUE">$rowreceive[payment_coast]</label>');
													}
													else
													{
														echo ('<label style="color:BLUE">หมายเหตุ!!!</label>')."<br>";
														echo ('<label style="color:BLUE">ยังไม่มีการเพิ่มรายรับสำหรับโครงการ</label>');
													}
												?>
											</div>

											<div class="col-md-6">
												<?php
													$o=0;
													if($rowreceive['payment_path']>=1)
													{
														do  
														{
															$o++;
												?>
															<label style="color:BLUE">งวดที่ <?php echo $o; ?> : <a href="<?php echo $rowreceive['payment_path']; ?>">ดาวน์โหลด</a></label>
															<br>
												<?php
														}while($rowreceive = $resultreceive->fetch_array())
												?>
												<?php
													}
													else
													{
														echo ('<label style="color:BLUE">หมายเหตุ!!!</label>')."<br>";
														echo ('<label style="color:BLUE">ยังไม่มีเอกสาร</label>');
													}
												?>
											</div>
										</div><br>

										<div class="modal-footer">
											<div class="form-group row">
												<div class="col-md-offset-4 col-md-8">
													<button class="btn btn-red" data-dismiss="modal" type="button">ปิด</button>
													<button class="btn btn-success" type="submit">บันทึก</button>
												</div>
											</div>
										</div><!-- /modal-footer -->
									</div>
									<!-- END modal-body -->
								</div>
								<!-- END panel-info -->
							</div><!-- /modal-content -->								
						</div><!-- /modal-custom -->							
					</div><!-- /pnlpayment -->
				</form>

			</td>
		</tr>
	</tbody>
<?php
}
?>
</table>
</div>
<!-- /table-responsive" -->