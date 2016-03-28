<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Edit Company ::.</title>
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
    <link type="text/css" rel="stylesheet" href="inc/bootstrap/css/jquery-ui.css">

    <script type="text/javascript" src="script/jquery.min.js"></script>
	<script type="text/javascript" src="script/arrow79.js"></script>
	
</head>
<body>
<?php
	if(isset($_SESSION['user']))
	{
		if($_SESSION['status']=="ADMIN")
		{
		include_once('inc/config.php');
		include_once('inc/connect.php');
		$sql = ("SELECT * FROM company INNER JOIN signatory_company ON company.company_tax_id=signatory_company.signatory_company_tax_id WHERE company.company_tax_id='".$_GET["com_tax_id"]."'");
		$result = $conn->query($sql);
		$row = $result->fetch_array();
		//print_r($row);		
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
								<div class="panel panel-violet">
									<div class="panel-heading">
										<h3 class="panel-title"><span class="fa fa-edit"></span> &nbsp;&nbsp;  แก้ไขข้อมูลบริษัท : <?php echo("$row[company_name]") ?></h3>
									</div><br>
												
									<div class="panel-body">
										<form action='sc_updatecompany.php' method="POST" class="form-horizontal" enctype="multipart/form-data">
											<!-- ชื่อ - สกุล -->
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><span style="color:red"> * </span>ชื่อกิจการ : </label>
															<div class="col-md-8">
																<input type="text" id="txtName" name="txtName" class="form-control input-sm" value="<?php echo("$row[company_name]") ?>"/> 
															</div>
													</div>
												</div>
											</div>

											<!-- เลขประจำตัวผู้เสียภาษี -->
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><span style="color:red"> * </span>เลขประจำตัวผู้เสียภาษี : </label>
															<div class="col-md-8">
																<input type="text" id="txtNumtax" class="form-control input-sm" name="txtNumtax" value="<?php echo("$row[company_tax_id]") ?>" />
																<input type="hidden" id="txtTax" class="form-control input-sm" name="txtTax" value="<?php echo("$row[company_tax_id]") ?>" />
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">เลขทะเบียนการค้า : </label>
															<div class="col-md-8">
																<input type="text" id="txtNumtrade" name="txtNumtrade" class="form-control input-sm" value="<?php echo("$row[company_trade_id]") ?>"/>
															</div>
													</div>
												</div>
											</div>

											<div class="row">	
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-2 control-label"><span style="color:red"> * </span>ที่อยู่(ภาษาไทย) : </label>
															<div class="col-md-10">
																<input type="text" id="txtAddressth" name="txtAddressth" class="form-control input-sm" value="<?php echo("$row[company_addr_th]") ?>"/>
															</div>
													</div>
												</div>
											</div>

											<!-- ที่อยู่ภาษาอังกฤษ -->
											<div class="row">	
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-2 control-label">ที่อยู่(ภาษาอังกฤษ) : </label>
															<div class="col-md-10">
																<input type="text" id="txtAddressen" name="txtAddressen" class="form-control input-sm" value="<?php echo("$row[company_addr_en]") ?>"/>
															</div>
													</div>
												</div>
											</div>

											<!-- โทรศัพท์ -->
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><span style="color:red"> * </span>โทรศัพท์ : </label>
															<div class="col-md-8">
																<input type="text" id="txtTel" name="txtTel" class="form-control input-sm" maxlength="10" value="<?php echo("$row[company_tel]") ?>" onKeyPress="return KeyCode(txtTel)"/>
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">โทรสาร : </label>
															<div class="col-md-8">
																<input type="text" id="txtFax" name="txtFax" class="form-control input-sm" maxlength="10" value="<?php echo("$row[company_fax]") ?>" onKeyPress="return KeyCode(txtFax)"/>
															</div>
													</div>
												</div>
											</div>

											<!-- Website -->
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">เว็บไซต์ : </label>
															<div class="col-md-8">
																<input type="text" id="txtSite" name="txtSite" class="form-control input-sm" value="<?php echo("$row[company_web]") ?>"/>
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><span style="color:red"> * </span>อีเมล์ : </label>
															<div class="col-md-8">
																<input type="email" id="txtEmail" name="txtEmail" class="form-control input-sm" value="<?php echo("$row[company_email]") ?>"/>
															</div>
													</div>
												</div>
											</div>

											<!-- ผู้มีอำนาจลงนาม -->
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">ผู้มีอำนาจลงนาม : </label>
															<div class="col-md-8">
																<input type="text" id="txtPerson" name="txtPerson" class="form-control input-sm" />
															</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="col-md-4 control-label">สถานะ : </label>
															<div class="col-md-8">
																<select class="form-control input-sm" name="list2" id="list2">
																	<option value=NULL></option>
																	<option value="เจ้าของกิจการ">เจ้าของกิจการ</option>
																	<option value="หุ้นส่วนผู้จัดการ">หุ้นส่วนผู้จัดการ</option>
																	<option value="กรรมการผู้จัดการ">กรรมการผู้จัดการ</option>
																</select>
															</div>
													</div>
												</div>
														
												<div class="col-md-2">
													<input class="btn btn-success form-control input-sm" onclick="add_signatory_com()" value="เพิ่ม"/>
												</div>
											</div>

											<fieldset>
	                							<div id="list_container">
		                    						<?php 
										                include('config.php');
										                $pdo = connect();
										                include('list_signatory_com.php'); 
										            ?>
									            </div><!-- list_container -->
									            <p align = "center"><span style="color:red"> * <label>หากข้อมูลไม่แสดง โปรด Refresh หน้าจอ</label></span></p>
									        </fieldset>
									        <br>	

									        <!-- ผู้ทำบัญชีและกิจการ -->
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">ผู้ทำบัญชีกิจการ : </label>
															<div class="col-md-8">
																<input type="text" id="txtPer" name="txtPer" class="form-control input-sm" />
															</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label class="col-md-4 control-label"><span style="color:red"> * </span>เลขทะเบียนผู้ทำบัญชี : </label>
															<div class="col-md-8">
																<input type="text" class="form-control input-sm" name="txtAudit" id="txtAudit">
															</div>
													</div>
												</div>
												<div class="col-md-2">
													<input class="btn btn-success form-control input-sm" onclick="add_audit_com()" value="เพิ่ม"/>
												</div>
											</div>

											<fieldset>
	                							<div id="list_container_audit">
	                    							<?php 
									                    $pdo = connect();
									                    include('list_audit_com.php'); 
									                ?>
									            </div><!-- list_container -->
									            	<p align = "center"><span style="color:red"> * <label>หากข้อมูลไม่แสดง โปรด Refresh หน้าจอ</label></span></p>
									        </fieldset>
									        <br>							

									        <!-- รูปภาพ -->
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">รูปภาพ : </label>
															<div class="col-md-8">
																<!--<input type="file" id="txtPiccom" name="txtPiccom" class="form-control input-sm" />-->
																<div style="position:relative;">
											                      <a class='btn btn-primary' href='javascript:;'> Choose File...
											                      <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
											                      -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
											                      color:transparent;' name="txtPiccom" size="50"  onchange='$("#upload-file").html($(this).val());'>
											                      </a> &nbsp; <span class='label label-info' id="upload-file"></span></div>
																<span style="color:red"> *รูปภาพมีขนาดไม่เกิน 5 MB .jpg .png เท่านั้น</span>
															</div>
													</div>
												</div>
											</div>

											<!-- หมายเหตุ -->
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">หมายเหตุ : </label>
															<div class="col-md-8">
																<?php //echo("$row[company_note]") ?>
																<TEXTAREA type="text" class="form-control input-sm" name="txtNote" id="txtNote" ><?php echo("$row[company_note]") ?></TEXTAREA>
															</div>
													</div>
												</div>
											</div>

											<div class="modal-footer">
												<center>
													<p align = "center"><span style="color:red"> * <label>หมายเหตุ!!! : กรุณากรอกข้อมูลให้ครบทุกช่อง ก่อนบันทึก</label></span></p>
													<input type="submit" class="btn btn-green " value="บันทึก" />
													<input type="reset" class="btn btn-yellow " value="ล้างข้อมูล" />
												</center>
											</div>
											
										</form>
									</div>
									<!-- END panel-body -->
								</div>
								<!-- panel-info -->
							</div>
							<!-- END col-lg-12 -->
						</div>
						<!-- END row -->
					</div>
					<!-- END row mbl -->
				</div>
				<!--END CONTENT-->
		    <?php include_once('inc/footer.php');  ?>
			</div>
			<!-- /#page-wrapper -->
		</div>
		<!-- /#wrapper --> 
	</div>  
	<?php
		}
		else
		{
			header("Location: indexv2.php");
		}       

$conn->close();?>

<script type="text/javascript">
	function KeyCode(objId)
	{
		if (event.keyCode >= 48 && event.keyCode<=57) //48-57(ตัวเลข) ,65-90(Eng ตัวพิมพ์ใหญ่ ) ,97-122(Eng ตัวพิมพ์เล็ก)
		{
			return true;
		}
		else
		{
			alert("กรอกได้เฉพาะตัวเลข 0-9 เท่านั้น");
			return false;
		}
    }
</script>

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

