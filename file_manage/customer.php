<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Add Customer ::.</title>
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
										<h3 class="panel-title"><span class="fa fa-pencil "></span> &nbsp;&nbsp;  เพิ่มข้อมูลกิจการลูกค้า</h3>
									</div><br><br>
									
									<form class="form-horizontal" action='sc_registercustomer.php' method="POST" enctype="multipart/form-data">
										<!-- ชื่อ - สกุล -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>ชื่อกิจการ : </label>
														<div class="col-md-8">
															<input type="text" id="txtName" name="txtName" class="form-control input-sm" autofocus="autofocus" required/> 
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>สถานะ : </label>
														<div class="col-md-4">
															<select class="form-control input-sm" name="list1">
																<option value=""></option>
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
										</div

										<!-- เลขประจำตัวผู้เสียภาษี -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>เลขประจำตัวผู้เสียภาษี : </label>
														<div class="col-md-7">
															<input type="text" id="txtNumtex" class="form-control input-sm" name="txtNumtex" required/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>เลขทะเบียนการค้า : </label>
														<div class="col-md-7">
															<input type="text" id="txtNumtrade" name="txtNumtrade" class="form-control input-sm" required/>
														</div>
												</div>
											</div>
										</div>

										<!-- ที่อยู่ภาษาไทย -->
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-2 control-label"><span style="color:red"> * </span>ที่อยู่(ภาษาไทย) : </label>
														<div class="col-md-9">
															<input type="text" id="txtAddressth" name="txtAddressth" class="form-control input-sm" required/>
														</div>
												</div>
											</div>
										</div>

										<!-- ที่อยู่ภาษาอังกฤษ -->
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-2 control-label">ที่อยู่(ภาษาอังกฤษ) : </label>
														<div class="col-md-9">
															<input type="text" id="txtAddressen" name="txtAddressen" class="form-control input-sm" />
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
															<input type="text" id="txtTel" name="txtTel" class="form-control input-sm" maxlength="10" onKeyPress="return KeyCode(txtTel)" required/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">โทรสาร : </label>
														<div class="col-md-6">
															<input type="text" id="txtFax" name="txtFax" class="form-control input-sm" maxlength="10" onKeyPress="return KeyCode(txtFax)"/>
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
															<input type="text" id="txtSite" name="txtSite" class="form-control input-sm" />
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>อีเมล์ : </label>
														<div class="col-md-6">
															<input type="email" id="txtEmail" name="txtEmail" class="form-control input-sm" required/>
														</div>
												</div>
											</div>
										</div>

										<!-- ผู้มีอำนาจลงนาม -->
										<div class="row">
											<div id="button_pro">
												<div class="space" id="input_text_1">
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label"><span style="color:red"> * </span>ผู้มีอำนาจลงนาม : </label>
																<div class="col-md-8">
																	<input type="text" id="txtPerson" name="txtPerson[]" class="form-control input-sm" placeholder="ชื่อ - นามสกุล" required/>
																</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group">
															<label class="col-md-4 control-label">สถานะ : </label>
																<div class="col-md-4">
																	<select class="form-control input-sm" name="list2[]">
																		<option value=""></option>
																		<option value="เจ้าของกิจการ">เจ้าของกิจการ</option>
																		<option value="หุ้นส่วนผู้จัดการ">หุ้นส่วนผู้จัดการ</option>
																		<option value="กรรมการผู้จัดการ">กรรมการผู้จัดการ</option>
																	</select>
																</div>
															<img class="add" src="inc/add.png"/>
															<img class="remove" src="inc/remove.png"/>
														</div>
													</div>
												</div>
											</div>
										</div>

										<!-- เงื่อนไขการลงนาม -->
										<div class="row">	
											<div class="col-md-12">
												<div class="form-group">
													<label class="col-md-2 control-label">เงื่อนไขการลงนาม : </label>
														<div class="col-md-9">
															<input type="text" id="txtFunction" name="txtFunction" class="form-control input-sm" />
														</div>
												</div>
											</div>
										</div>
													
										<!-- ชื่อผู้ที่ติดต่องาน -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>ชื่อผู้ที่ติดต่องาน : </label>
														<div class="col-md-7">
															<input type="text" id="txtCommu" name="txtCommu" class="form-control input-sm" required/>
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
															<input type="text" id="txtTelcommu" name="txtTelcommu" class="form-control input-sm" maxlength="10" onKeyPress="return KeyCode(txtTelcommu)" required/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label"><span style="color:red"> * </span>อีเมล์ : </label>
														<div class="col-md-6">
															<input type="email" id="txtEmailcommu" name="txtEmailcommu" class="form-control input-sm" required/>
														</div>
												</div>
											</div>
										</div>

										<!-- รูปถ่าย แผนที่ และพิกัด -->
										<!-- <div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">รูปถ่าย แผนที่และพิกัดกิจการ : </label>
														<div class="col-md-6">
															<label>พิกัด </label>
														</div>
														<div class="col-md-2">
															<input type="text" id="txtLatitude" name="txtLatitude" class="form-control input-sm" placeholder="ละติจูด"/>
														</div>
														<div class="col-md-2">
															<input type="text" id="txtLongitude" name="txtLongitude" class="form-control input-sm" placeholder="ลองติจูด"/>
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<iframe src="map.html"></iframe>
												</div>
											</div>
										</div> -->

										<!-- รูปถ่าย -->
										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">รูปถ่าย : </label>
														<div class="col-md-6">
															<!--<input type="file" id="txtPiccustomer" name="txtPiccustomer" class="form-control input-sm" />-->
															<div style="position:relative;">
											                      <a class='btn btn-primary' href='javascript:;'> Choose File...
											                      <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
											                      -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
											                      color:transparent;' name="txtPiccustomer" size="50"  onchange='$("#upload-file").html($(this).val());'>
											                      </a> &nbsp; <span class='label label-info' id="upload-file"></span></div>
											                      <span style="color:red"> * รูปถาพมีขนาดไม่เกิน 5 MB</span>
														</div>
												</div>
											</div>
										</div>

										<div class="row">	
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">ละติจูด : </label>
														<div class="col-md-6">
															<input class="form-control" name="lat_value" type="text" id="lat_value" />
														</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-4 control-label">ลองจิจูด : </label>
														<div class="col-md-6">
															<input class="form-control" name="lon_value" type="text" id="lon_value" />
														</div>
												</div>
											</div>
										</div>

										<div class="row">
						                	<div id="map_canvas"></div>
						              	</div>

						              	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
							              <script type="text/javascript">
							                var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
							                var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น

							                function initialize() { // ฟังก์ชันแสดงแผนที่
							                  GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
							                  // กำหนดจุดเริ่มต้นของแผนที่
							                  var my_Latlng  = new GGM.LatLng(19.0293178,99.895302);
							                  var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
							                  // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
							                  var my_DivObj=$("#map_canvas")[0]; 
							                  // กำหนด Option ของแผนที่
							                  var myOptions = {
							                    zoom: 15, // กำหนดขนาดการ zoom
							                    center: my_Latlng , // กำหนดจุดกึ่งกลาง
							                    mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่
							                  };
							                  map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map

							                  var my_Marker = new GGM.Marker({ // สร้างตัว marker
							                    position: my_Latlng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
							                    map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
							                    draggable:true, // กำหนดให้สามารถลากตัว marker นี้ได้
							                    title:"คลิกลากเพื่อหาตำแหน่งจุดที่ต้องการ!" // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
							                  });

							                  // กำหนด event ให้กับตัว marker เมื่อสิ้นสุดการลากตัว marker ให้ทำงานอะไร
							                  GGM.event.addListener(my_Marker, 'dragend', function() {
							                    var my_Point = my_Marker.getPosition();  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
							                    map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker   
							                    $("#lat_value").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
							                    $("#lon_value").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value 
							                    $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value
							                  });   

							                  // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
							                  GGM.event.addListener(map, 'zoom_changed', function() {
							                    $("#zoom_value").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value  
							                  });

							                }
							                $(function(){
							                // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
							                // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
							                // v=3.2&sensor=false&language=th&callback=initialize
							                //  v เวอร์ชัน่ 3.2
							                //  sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
							                //  language ภาษา th ,en เป็นต้น
							                //  callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize
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
															<TEXTAREA type="text" rows="5" class="form-control input-sm" name="txtNote" id="txtNote"></TEXTAREA>
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
								<!-- END panel panel-info -->
							</div>
							<!-- END col-lg-12 -->
						</div>
						<!-- END row -->
					</div>
					<!-- END row mbl -->
				</div>
				<!-- END CONTENT -->
                <?php include_once('inc/footer.php'); ?>
			</div>
			<!-- END page-wrapper -->
		</div>
		<!-- END wrapper -->  
	</div> 
	<?php
		}
		else
		{
			header("Location:customerdata.php");
		}       

	$conn->close(); ?>

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

	<script type="text/javascript">
	var id=2,txt_box;
		$('#button_pro').on('click','.add',function(){
			$(this).remove();
			txt_box='<div class="space" id="input_text_'+id+'" ><div class="col-md-6"><div class="form-group"><label class="col-md-4 control-label"><span style="color:red"> * </span>ผู้มีอำนาจลงนาม : </label><div class="col-md-8"><input type="text" id="txtPerson" name="txtPerson[]" class="form-control input-sm" placeholder="ชื่อ - นามสกุล" required/></div></div></div><div class="col-md-6"><div class="form-group"><label class="col-md-4 control-label">สถานะ : </label><div class="col-md-4"><select class="form-control input-sm" name="list2[]"><option value=""></option><option value="เจ้าของกิจการ">เจ้าของกิจการ</option><option value="หุ้นส่วนผู้จัดการ">หุ้นส่วนผู้จัดการ</option><option value="กรรมการผู้จัดการ">กรรมการผู้จัดการ</option></select></div><img class="add" src="inc/add.png"/><img class="remove" src="inc/remove.png"/></div>';
			$("#button_pro").append(txt_box);
			id++;
		});
	</script>

	<script type="text/javascript">
	$('#button_pro').on('click','.remove',function(){
		        var parent=$(this).parent().prev().attr("id");
				var parent_im=$(this).parent().attr("id");
				$("#"+parent_im).slideUp('medium',function(){
					$("#"+parent_im).remove();
					if($('.add').length<1){
						$("#"+parent).append('<center> <img src="inc/add.png" class="add"/> </center>');
					}
		        });
	   });
	</script>

<?php 
	} 
	else
	{
		header("Location: ../index.html");
	}
?>
</body>
</html>

