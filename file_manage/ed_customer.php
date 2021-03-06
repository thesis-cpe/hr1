﻿<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Edit Customer ::.</title>
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
<style type="text/css">
  /* css กำหนดความกว้าง ความสูงของแผนที่ */
  #map_canvas { 
  width:70%;
  height:500px;
  margin:auto;
  /*  margin-top:100px;*/
  }
</style>
	
</head>
<body>
<?php
	if(isset($_SESSION['user']))
	{
		if($_SESSION['status']=="ADMIN")
		{
		include_once('inc/config.php');
		include_once('inc/connect.php');
		$sql = ("SELECT * FROM customer INNER JOIN signatory_customer ON customer.customer_tax_id=signatory_customer.customer_tax_id WHERE customer.customer_tax_id='".$_GET["cus_tax_id"]."'");
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
										<h3 class="panel-title"><span class="fa fa-edit"></span> &nbsp;&nbsp;  แก้ไขกิจการลูกค้า : <?php echo("$row[customer_company]") ?></h3>
									</div><br>
													
									<div class="panel-body">
										<form class="form-horizontal" action='sc_updatecustomer.php' method="POST" enctype="multipart/form-data">						
											<!-- ชื่อ - สกุล -->
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><span style="color:red"> * </span>ชื่อกิจการ : </label>
															<div class="col-md-8">
																<input type="text" id="txtName" name="txtName" class="form-control input-sm" value="<?php echo("$row[customer_company]") ?>"/> 
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">สถานะ : </label>
															<div class="col-md-4">
																<select class="form-control input-sm" name="list1">
																	<option value="<?php echo("$row[customer_status]") ?>"><?php echo("$row[customer_status]") ?></option>
																	<option value="เจ้าของคนเดียว">เจ้าของคนเดียว</option>
																	<option value="หสม">หสม</option>
																	<option value="คณะบุคคล">คณะบุคคล</option>
																	<option value="มูลนิธิ">มูลนิธิ</option>
																	<option value="สมาคม">สมาคม</option>
																	<option value="หจก">หจก</option>
																	<option value="บจก">บจก</option>
																	<option value="บมจ">บมจ</option>
																</select>
															</div>
													</div>
												</div>
											</div>

											<!-- เลขประจำตัวผู้เสียภาษี -->
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><span style="color:red"> * </span>เลขประจำตัวผู้เสียภาษี : </label>
															<div class="col-md-6">
																<input type="text" id="txtNumtax" class="form-control input-sm" name="txtNumtax" value="<?php echo("".$_GET["cus_tax_id"]."") ?>"/>
																<input type="hidden" id="txtID" class="form-control input-sm" name="txtID" value="<?php echo("$row[customer_id]") ?>"/>
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><span style="color:red"> * </span>เลขทะเบียนการค้า : </label>
															<div class="col-md-6">
																<input type="text" id="txtNumtrade" name="txtNumtrade" class="form-control input-sm" value="<?php echo("$row[customer_trade_id]") ?>"/>
															</div>
													</div>
												</div>
											</div>

											<!-- ที่อยู่ภาษาไทย -->
											<div class="row">	
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-2 control-label"><span style="color:red"> * </span>ที่อยู่(ภาษาไทย) : </label>
															<div class="col-md-8">
																<input type="text" id="txtAddressth" name="txtAddressth" class="form-control input-sm" value="<?php echo("$row[customer_addr_th]") ?>"/>
															</div>
													</div>
												</div>
											</div>

											<!-- ที่อยู่ภาษาอังกฤษ -->
											<div class="row">	
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-2 control-label">ที่อยู่(ภาษาอังกฤษ) : </label>
															<div class="col-md-8">
																<input type="text" id="txtAddressen" name="txtAddressen" class="form-control input-sm" value="<?php echo("$row[customer_addr_en]") ?>"/>
															</div>
													</div>
												</div>
											</div>

											<!-- โทรศัพท์ -->
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><span style="color:red"> * </span>โทรศัพท์ : </label>
															<div class="col-md-6">
																<input type="text" id="txtTel" name="txtTel" class="form-control input-sm" maxlength="10" value="<?php echo("$row[customer_tel]") ?>" onKeyPress="return KeyCode(txtTel)"/>
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">โทรสาร : </label>
															<div class="col-md-6">
																<input type="text" id="txtFax" name="txtFax" class="form-control input-sm" maxlength="10" value="<?php echo("$row[customer_fax]") ?>" onKeyPress="return KeyCode(txtFax)"/>
															</div>
													</div>
												</div>
											</div>

											<!-- Website -->
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">เว็บไซต์ : </label>
															<div class="col-md-6">
																<input type="text" id="txtSite" name="txtSite" class="form-control input-sm" value="<?php echo("$row[customer_web]") ?>"/>
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><span style="color:red"> * </span>อีเมล์ : </label>
															<div class="col-md-6">
																<input type="email" id="txtEmail" name="txtEmail" class="form-control input-sm" value="<?php echo("$row[customer_email]") ?>"/>
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
													<input class="btn btn-success form-control input-sm" onclick="add_signatory()" value="เพิ่ม"/>
												</div>
											</div>

											<fieldset>
	                							<div id="list_container">
	                    							<?php 
									                    include('config.php');
									                    $pdo = connect();
									                    include('list_signatory.php'); 
									                ?>
									            </div>
									                <p align = "center"><span style="color:red"> * <label>หมายเหตุ!!! : หากข้อมูลไม่แสดง โปรด Refresh หน้าจอ</label></span></p>
									        </fieldset>
									        <br>								

											<!-- เงื่อนไขการลงนาม -->
											<div class="row">	
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-2 control-label">เงื่อนไขการลงนาม : </label>
															<div class="col-md-8">
																<input type="text" id="txtFunction" name="txtFunction" class="form-control input-sm" value="<?php echo("$row[customer_function]") ?>"/>
															</div>
													</div>
												</div>
											</div>

											<!-- ชื่อผู้ที่ติดต่องาน -->
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><span style="color:red"> * </span>ชื่อผู้ที่ติดต่องาน : </label>
															<div class="col-md-8">
																<input type="text" id="txtCommu" name="txtCommu" class="form-control input-sm" value="<?php echo("$row[customer_contact]") ?>"/>
															</div>
													</div>
												</div>
											</div>

											<!-- เบอร์โทรศัพท์ผู้ที่ติดต่องาน -->
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><span style="color:red"> * </span>โทรศัพท์ : </label>
															<div class="col-md-6">
																<input type="text" id="txtTelcommu" name="txtTelcommu" class="form-control input-sm" maxlength="10" value="<?php echo("$row[customer_contact_tel]") ?>" onKeyPress="return KeyCode(txtTelcommu)"/>
															</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label"><span style="color:red"> * </span>อีเมล์ : </label>
															<div class="col-md-6">
																<input type="email" id="txtEmailcommu" name="txtEmailcommu" class="form-control input-sm" value="<?php echo("$row[customer_contact_email]") ?>"/>
															</div>
													</div>
												</div>
											</div>

											<!-- รูปถ่าย แผนที่ และพิกัด -->
											<!--<div class="row">	
												<div class="list-inline">
													<div class="col-md-offset-1 col-md-2">
														<label>รูปถ่าย แผนที่และพิกัดกิจการ : </label>
													</div>
													<div class="col-md-1">
														<label>พิกัด </label>
													</div>
													<div class="col-md-2">
														<input type="text" id="txtLatitude" name="txtLatitude" class="form-control input-sm" value="<?php //echo("$row[customer_latitude]") ?>"/>
													</div>
													<div class="col-md-2">
														<input type="text" id="txtLongitude" name="txtLongitude" class="form-control input-sm" value="<?php //echo("$row[customer_longitude]") ?>"/>
													</div>
													<div class="col-md-2">
														<iframe src="map.html"></iframe>
													</div>
												</div>
											</div><br> -->

											<!-- รูปถ่าย -->
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">รูปถ่าย กิจการ : </label>
															<div class="col-md-6">
																<!--<input type="file" id="txtPiccustomer" name="txtPiccustomer" class="form-control input-sm" />-->
																<div style="position:relative;">
											                      <a class='btn btn-primary' href='javascript:;'> Choose File...
											                      <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
											                      -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
											                      color:transparent;' name="txtPiccustomer" size="50"  onchange='$("#upload-file").html($(this).val());'>
											                      </a> &nbsp; <span class='label label-info' id="upload-file"></span></div>
																<span style="color:red"> *รูปภาพมีขนาดไม่เกิน 5 MB .jpg .png เท่านั้น</span>
															</div>
													</div>
												</div>
											</div>

											<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">ละติจูด : </label>
														<div class="col-md-6">
															<input class="form-control" name="lat_value" type="text" id="lat_value" value="<?php echo("$row[customer_latitude]") ?>"/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">ลองจิจูด : </label>
														<div class="col-md-6">
															<input class="form-control" name="lon_value" type="text" id="lon_value" value="<?php echo("$row[customer_longitude]") ?>"/>
														</div>
												</div>
											</div>
										</div>

										<div class="row">
						                	<div id="map_canvas"></div>
						              	</div>

						              	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>  
					                      <script type="text/javascript">
					                        var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
					                        var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
					                        var my_Marker;
					                          
					                          function initialize() { // ฟังก์ชันแสดงแผนที่
					                            GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
					                            // กำหนดจุดเริ่มต้นของแผนที่
					                            var my_Latlng  = new GGM.LatLng(<?php echo $row["customer_latitude"]; ?>, <?php echo $row["customer_longitude"]; ?>);
					                            var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
					                            // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
					                            var my_DivObj=$("#map_canvas")[0]; 
					                            // กำหนด Option ของแผนที่
					                            var myOptions = {
					                              zoom: 13, // กำหนดขนาดการ zoom
					                              center: my_Latlng , // กำหนดจุดกึ่งกลาง
					                              mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่
					                            };
					                            map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map

					                            my_Marker = new GGM.Marker({ // สร้างตัว marker
					                              position: my_Latlng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
					                              map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
					                              draggable:true, // กำหนดให้สามารถลากตัว marker นี้ได้
					                              title:"คลิกลากเพื่อหาตำแหน่งจุดที่ต้องการ!" // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
					                            });

					                            // กำหนด event ให้กับตัว marker เมื่อสิ้นสุดการลากตัว marker ให้ทำงานอะไร
					                            GGM.event.addListener(my_Marker, "dragend", function() {
					                              var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
					                              map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker  
					                              $("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
					                              $("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
					                              $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value
					                            });  

					                            // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
					                            GGM.event.addListener(map, "zoom_changed", function() {
					                              $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value  
					                            });

					                            // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
					                            GGM.event.addListener(map, "click", function(e) {
					                              var latClick=e.latLng.lat(); // e.latLng.lat().toFixed(6);
					                              var lonClick=e.latLng.lng();
					                              var latlonClck=new GGM.LatLng(latClick,lonClick);
					                              my_Marker.setPosition(latlonClck);
					                              var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
					                              map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker  
					                              $("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
					                              $("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
					                              $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value  
					                            }); 

					                          }

					                          $(function(){
					                            // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
					                            // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
					                            // v=3.2&sensor=false&language=th&callback=initialize
					                            // v เวอร์ชัน่ 3.2
					                            // sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
					                            // language ภาษา th ,en เป็นต้น
					                            // callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize
					                            $("<script/>", {
					                              "type": "text/javascript",
					                              src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"
					                            }).appendTo("body"); 
					                          });
					                        </script><br>

											<!-- หมายเหตุ -->
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="col-md-4 control-label">หมายเหตุ : </label>
															<div class="col-md-8">
																<TEXTAREA type="text" rows="5" class="form-control input-sm" name="txtNote" id="txtNote" value="<?php echo("$row[customer_note]") ?>"></TEXTAREA>
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
									<!-- /#panel panel-body -->
								</div>
								<!-- /#panel panel-info -->
							</div>
							<!-- /.col-lg-12 -->
						</div>
						<!-- /.row -->
					</div>
					<!-- END row mbl -->
				</div>
				<!-- END CONTENT -->
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
			header("Location: customerdata.php");
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

