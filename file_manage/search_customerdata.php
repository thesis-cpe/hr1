<?php
	@session_start();
	include_once('inc/config.php');
	include_once('inc/connect.php');
	//include('session.php');

$value=$_POST["value"];
	
	if($value==""){
		$sql = "SELECT * FROM customer";
	}
	else{
	$sql = "SELECT * FROM customer WHERE customer_company LIKE '%".$value."%'";
	}
	
	$result = $conn->query($sql);
?>

	<table class="table table-hover-color">
		<thead>
			<tr class="danger">
				<th>เลขประจำตัวผู้เสียภาษีอากร</th>
				<th>ชื่อกิจการ</th>
				<th>อีเมล์</th>
				<th>โทรศัพท์</th>
				<th>หมายเหตุ</th>
			</tr>
		</thead>

		<tbody>
<?php
		while($row = $result->fetch_array())
		{
?>
			<tr class="active">
				<td><?php echo("$row[customer_tax_id]");?></td>
				<td><?php echo("$row[customer_company]");?></td>
				<td><?php echo("$row[customer_email]");?></td>
				<td><?php echo("$row[customer_tel]");?></td>
				<td>
					<a title="ข้อมูลลูกค้า" class="btn btn-success btn-sm" href="#pnlDetail<?php echo("$row[customer_tax_id]");?>" data-toggle="modal"> <span class="fa fa-tasks"></span></a>
														
					<!-- modal show customer -->
					<div id="pnlDetail<?php echo ("$row[customer_tax_id]");?>" tabindex="-1" role="dialog" aria-labelledby="modal-wide-width-label" aria-hidden="true" class="modal fade" >
						<div class="modal-dialog modal-wide-width">
							<div class="panel panel-violet">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" data-dismiss="modal" aria-hidden="true" class="close">&times;</button>
										<h3 class="modal-title"><span class="fa fa-search "></span> &nbsp;ข้อมูลกิจการลูกค้า : <?php echo ("$row[customer_company]");?></h3>
									</div>

									<div class="modal-body">
										<div class="form-group row">  <!--แสดงภาพ-->
											<center> <img src="<?php echo ("$row[customer_img]"); ?>"/ width="400px" height="200px"> </center> <br>
										</div>
																				
										<form action="#" class="form-horizontal">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>ชื่อกิจการ : </b></label>
															<div class="col-md-7">
																<p class="form-control-static"><?php echo ("$row[customer_company]");?></p>
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>สถานะบริษัท : </b></label>
															<div class="col-md-7">
																<p class="form-control-static"><?php echo ("$row[customer_status]");?></p>
															</div>
													</div>
												</div>
											</div>

											<div class="row">
								 				<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>เลขประจำตัวผู้เสียภาษี : </b></label>
															<div class="col-md-7">
																<p class="form-control-static"><?php echo ("$row[customer_tax_id]");?></p>
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>ลขทะเบียนการค้า : </b></label>
															<div class="col-md-7">
																<p class="form-control-static"><?php echo ("$row[customer_trade_id]");?></p>
															</div>
													</div>
												</div>
											</div>

											<div class="row">
								 				<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-2 control-label"><b>ที่อยู่ภาษาไทย : </b></label>
															<div class="col-md-8">
																<p class="form-control-static"><?php echo ("$row[customer_addr_th]");?></p>
															</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-2 control-label"><b>ที่อยู่ภาษาอังกฤษ : </b></label>
															<div class="col-md-8">
																<p class="form-control-static"><?php echo ("$row[customer_addr_en]");?></p>
															</div>
													</div>
												</div>
											</div>
																				
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>โทรศัพท์ : </b></label>
															<div class="col-md-7">
																<p class="form-control-static"><?php echo ("$row[customer_tel]");?></p>
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>โทรสาร : </b></label>
															<div class="col-md-7">
																<p class="form-control-static"><?php echo ("$row[customer_fax]");?></p>
															</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>เว็บไซต์ : </b></label>
															<div class="col-md-7">
																<p class="form-control-static"><?php echo ("$row[customer_web]");?></p>
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>อีเมล์ : </b></label>
															<div class="col-md-7">
																<p class="form-control-static"><?php echo ("$row[customer_email]");?></p>
															</div>
													</div>
												</div>
											</div>
																						
										<?php
											$sqli = ("SELECT * FROM signatory_customer WHERE customer_tax_id = $row[customer_tax_id]");
											//echo $row["customer_tax_id"];
											$resulti = $conn->query($sqli);
											$rowi = $resulti->fetch_all();
											//print_r($rowi);
											foreach ($rowi as $rs) 
											{
										?>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>ผู้มีอำนาจลงนาม : </b></label>
															<div class="col-md-7">
																<p class="form-control-static"><?php echo ($rs['1']);?></p>
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>สถานะ : </b></label>
															<div class="col-md-7">
																<p class="form-control-static"><?php echo ($rs['2']);?></p>
															</div>
													</div>
												</div>
											</div>
										<?php
											}
										?>
																						
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-2 control-label"><b>เงื่อนไขการลงนาม : </b></label>
															<div class="col-md-8">
																<p class="form-control-static"><?php echo ("$row[customer_function]");?></p>
															</div>
													</div>
												</div>
											</div>		

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>ชื่อผู้ติดต่องาน : </b></label>
															<div class="col-md-6">
																<p class="form-control-static"><?php echo ("$row[customer_contact]");?></p>
															</div>
													</div>
												</div>
											</div>		
													

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>โทรศัพท์ : </b></label>
															<div class="col-md-6">
																<p class="form-control-static"><?php echo ("$row[customer_contact_tel]");?></p>
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>อีเมล์ : </b></label>
															<div class="col-md-6">
																<p class="form-control-static"><?php echo ("$row[customer_contact_email]");?></p>
															</div>
													</div>
												</div>
											</div>
																							
											<!--<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>ละติจูด : </b></label>
															<div class="col-md-6">
																<p class="form-control-static"><?php echo ("$row[customer_latitude]");?></p>
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><b>ลองติจูด : </b></label>
															<div class="col-md-6">
																<p class="form-control-static"><?php echo ("$row[customer_longitude]");?></p>
															</div>
													</div>
												</div>
											</div>-->	

										</form>
																	
										<div class="modal-footer">
											<div class="form-group row">
												<div class="col-md-offset-4 col-md-8">
													<button class="btn btn-red" data-dismiss="modal" type="button">ปิด</button>
												</div>
											</div>
										</div><!-- END modal-footer -->
									</div><!-- END panel-info -->
								</div><!-- END model-body -->
							</div><!-- END modal-content -->								
						</div><!-- END modal-dialog -->							
					</div><!-- END pnlDetail -->	
		<?php  
			if(@$_SESSION['status'] == "ADMIN")
			{
		?>
				<a title="แก้ไข" class="btn btn-yellow btn-sm" href="ed_customer.php?cus_tax_id=<?php echo ("$row[customer_tax_id]");?>" onclick="return confirm('ต้องการแก้ไขข้อมูล? : <?php echo ("$row[customer_tax_id]");?>');"><span class="fa fa-edit"></span></a>
				<a title="ลบ" class="btn btn-red btn-sm" href="de_customer.php?cus_tax_id=<?php echo ("$row[customer_tax_id]");?>" onclick="return confirm('ข้อมูลที่เกี่ยวข้องกับ : <?php echo ("$row[customer_tax_id]");?> จะถูกลบออกทั้งหมด');"><span class="fa fa-trash-o"></span></a>
														
				<!--แบงค์เพิ่มส่วน UPLOAD ไฟล์-->
				<a title="แนบไฟล์"class="btn btn-blue btn-sm" data-toggle="modal" data-target="#pnlUploadFile<?php echo ("$row[customer_tax_id]");?>"><span class="fa fa-upload" ></span></a>
				<a title="เรียกดูไฟล์" class="btn btn-info btn-sm" href="sc_upload_customer/list_doc.php?cus_tax_id=<?php echo ("$row[customer_tax_id]");?>&company_name=<?php echo ("$row[customer_company]");?>"><span class="fa fa-folder-open-o"><span></a>
																	
				<!--MODAL UPLOAD-->
				<form action="sc_upload_customer/upload.php" method="post" enctype="multipart/form-data">
					<div class="modal fade" id="pnlUploadFile<?php echo ("$row[customer_tax_id]"); ?>">
						<div class="modal-dialog" >
							<div class="panel panel-violet">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h3 class="modal-title">อัพโหลดเอกสาร รหัสลูกค้า : <font color="blue"><?php echo ("$row[customer_tax_id]");?></font></h3>
									</div>

									<div class="modal-body">
										<input type="hidden" name="hdfCustomerId" value="<?php echo ("$row[customer_tax_id]");?>"/>
											<div class="row">
												<div class="col-md-offset-2 col-md-9 "><input class="form-control" type="text" name="txtName" placeholder="ระบุชื่อไฟล์"/></div>
											</div><br>

											<div class="row">
												<div class="col-md-offset-2 col-md-9 "><!--<input class="form-control" name="txtfile" type="file"/>-->
												<div style="position:relative;">
							                      <a class='btn btn-primary' href='javascript:;'> Choose File...
							                      <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
							                      -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
							                      color:transparent;' name="txtfile" size="50"  onchange='$("#upload-file").html($(this).val());'>
							                      </a> &nbsp; <span class='label label-info' id="upload-file"></span></div></div>
											</div>
									</div>
																					  
								  	<div class="modal-footer">
										<button type="button" class="btn btn-red" data-dismiss="modal">ปิด</button>
										<button type="submit" class="btn btn-green">อัพโหลด</button>
								  	</div>
								</div><!-- /.modal-content -->
							</div><!-- /.modal-dialog -->
						</div>
					</div><!-- /.modal -->
				</form>
				<!--.MODAL UPLOAD-->
			<!--.แบงค์เพิ่มส่วน UPLOAD ไฟล์-->
		<?php
			}
		?>
				</td>
			</tr>
<?php 
	}
?>
		</tbody>
	</table>
</div>