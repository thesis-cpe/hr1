<?php
  @session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>.:: Daily Work ::.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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

<script language="javascript">
    function fncSubmit()
    {
        if(document.testform.txtMinute.value > 59)
        {
            alert('จำนวนนาทีไม่เกิน 59 นาที');
            document.testform.txtMinute.focus();
            return false;
        }
        if(document.testform.txtHour.value > 23)
        {
            alert('จำนวนชั่วโมงไม่เกิน 23 ชั่วโมง');
            document.testform.txtHour.focus();
            return false;
        }
</script>

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","getcondition.php?cusnew="+str,true);
        xmlhttp.send();
    }
}

function showEmployee(str2) {
    if (str2 == "") {
        document.getElementById("txtHintEmployee").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHintEmployee").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","sc_hide_user/get_txt_user.php?pass_audit="+str2,true);
        xmlhttp.send();
    }
}
</script>

</head>
<body>

<?php
$time = date("d/m/Y");
    if(isset($_SESSION['user']))
    {
        include_once('inc/config.php');
        include_once('config.php');
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
                                <div class="panel panel-red">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><span class="fa fa-pencil"></span> &nbsp;&nbsp; รายงานการปฏิบัติงานประจำวัน : <span id="servertime"></span> </h3>
                                    </div><br>
                                
                                    <div class="panel-body">
                                        <form name="testform" action='sc_registerdaily_work.php' method="POST" enctype="multipart/form-data" onSubmit="JavaScript:return fncSubmit();">
                                            <div class="from-group">
                                                <div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-offset-1 col-md-2">
                                                            <label><span style="color:red"> * </span>วันที่รายงาน : </label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" id="" name="DateBox" class="form-control input-sm" value="<?php echo $time; ?>" readonly/>
                                                        </div>
                                                        <div class="col-md-offset-1 col-md-2">
                                                            <label><span style="color:red"> * </span>วันที่ทำงาน : </label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" id="datepicker-th" name="txtDatework" class="form-control input-sm" required/> 
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-offset-1 col-md-2">
                                                            <label><span style="color:red"> * </span>รหัสพนักงาน : </label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <input type="text" id="txtEm" name="txtEm" class="form-control input-sm" value="<?php echo("$_SESSION[login]") ?>" readonly/> 
                                                        </div>
                                                        
                                                        <!-- <div id="txtCom" class="col-md-2"></div> -->
                                                    </div>
                                                </div><br><br>

                                                
                                                <div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-5">
                                                            <label>รายงานการปฏิบัติงานประจำวัน</label>
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-offset-1 col-md-2">
                                                            <select name="txtCus" class="form-control input-sm" onchange="showUser(this.value)" >
                                                                <option value=''>รหัสงานบริษัท</option>";
                                                                
                                                            <?php   //$sql="SELECT fk_n_customer_id FROM coast_work WHERE fk_employee_worker_id=$_SESSION[login]"; // Query to collect data from table 
                                                               $sql="SELECT * FROM coast_work INNER JOIN customer_gen ON coast_work.fk_n_customer_id=customer_gen.n_customer_id
                                                                WHERE coast_work.fk_employee_worker_id=$_SESSION[login] AND customer_gen.check_close=0 GROUP BY coast_work.fk_n_customer_id";

                                                                foreach ($conn->query($sql) as $row) { ?>
                                                                    <option value="<?php echo $row['fk_n_customer_id']; ?>"><?php echo $row['fk_n_customer_id']; ?></option>
                                                            <?php
                                                                }
                                                            ?>
                                                            </select>
                                                             
                                                        </div>

                                                        <div class="col-md-2">
                                                            <input type="text" id="txtHour" name="txtHour" class="form-control input-sm" placeholder="เวลาที่ใช้/ชั่วโมง" onKeyPress="return KeyCode(txtHour)" required/> 
                                                        </div>

                                                        <div class="col-md-2">
                                                            <input type="text" id="txtMinute" name="txtMinute" class="form-control input-sm" placeholder="เวลาที่ใช้/นาที" onKeyPress="return KeyCode(txtMinute)" required/> 
                                                        </div>
                                                            
                                                        <div class="col-md-2">
                                                            <input type="text" id="txtRecord" name="txtRecord" class="form-control input-sm" placeholder="จำนวนRecord" onKeyPress="return KeyCode(txtRecord)" required/> 
                                                        </div>
                                                        
                                                        <div class="col-md-2">
                                                            <!--<input type="file" id="fileDaily" name="fileDaily" class="form-control input-sm" required/>-->
                                                            <div style="position:relative;">
                                                              <a class='btn btn-primary' href='javascript:;'> Choose File...
                                                              <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);
                                                              -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;
                                                              color:transparent;' name="fileDaily" size="50"  onchange='$("#upload-file").html($(this).val());'>
                                                              </a> &nbsp; <span class='label label-info' id="upload-file"></span></div> 
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-1">
                                                             <label></label>
                                                        </div>
                                                        <div id="txtHint" class="col-md-4"></div>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-offset-1 col-md-2">
                                                             <label>รายงานปัญหา : </label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <textarea type="text" id="txtProb" name="txtProb" class="form-control"></textarea> 
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <center>
                                                    <input type="submit" class="btn btn-success " value="บันทึก" />
                                                    <input type="reset" class="btn btn-warning " value="ล้างข้อมูล" />
                                                </center>
                                            </div>
                                            <!-- /form group -->
                                        </form>
                                    </div>
                                    <!-- /#panel body -->
                                </div>
                                <!-- /#panel panel-info --> 

                                <div class="panel panel-violet">
                                    <div class="panel-heading">
                                        <h3 class="panel-title"><span class="fa fa-search"></span> &nbsp;&nbsp;  เรียกดูข้อมูลการปฏิบัติงานประจำวัน </h3>
                                    </div>
                                    
                                    <div class="panel-body"><br>
                                        <form action="sc_browse_data/browse_daily_work.php" method="GET">
                                            <div class="from-group">
                                                <div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-offset-1 col-md-2">
                                                            <label><span style="color:red"> * </span>เลือกตาม : </label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <input type="text" id="datepicker-th1" name="datepicker-th1" class="form-control input-sm" placeholder="วันที่ทำงาน"/>
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-offset-1 col-md-2">
                                                            <label></label>
                                                        </div>
                                                        <div class="col-md-3" id="txtHintEmployee">
                                                           <input class="form-control input-sm" id="txtEmId" name="txtEmId" placeholder="รหัสพนักงาน" value="<?php echo("$_SESSION[login]") ?>" readonly />
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <div class="row">
                                                    <div class="list-inline">
                                                        <div class="col-md-offset-1 col-md-2">
                                                            <label></label>
                                                        </div>
                                                        <div class="col-md-3">
                                                           <!-- <input type="text" id="txtComId" name="txtComId" class="form-control input-sm" placeholder="รหัสงานบริษัท"/><br> -->
                                                            <!--แบงค์ เพิ่ม-->
                                                            <?php 
																if($_SESSION['status'] == "ADMIN")
																{
																	echo ('<select  name="selCustomerId" class="form-control input-sm" onchange="showEmployee(this.value)" >
                                                                <option></option>');
																}elseif($_SESSION['status'] == "USER")
																{
																	echo ('<select name="selCustomerId" class="form-control input-sm" onchange="showEmployee(this.value)" >
                                                                ');
																}
															?>
                                                                
                                                                <?php
                                                                         $fknEmployeeID = $_SESSION['login'];
                                                                         
                                                                        $sqlCoastWork = "SELECT fk_n_customer_id FROM coast_work WHERE fk_employee_worker_id = '$fknEmployeeID'";
                                                                        $querySqlCoastWork =  $conn->query($sqlCoastWork);
                                                                        while ($arrCoastWork = $querySqlCoastWork->fetch_array()) 
                                                                        {  $custmerID =   $arrCoastWork['fk_n_customer_id'];

                                                                            ?>
                                                                            <!--HTML-->
                                                                            <option value="<?php echo $custmerID; ?>"><?php echo $custmerID; ?></option>
                                                                            <!--.HTML-->

                                                                       <?php } 
                                                                ?>
                                                            </select> 
                                                            <!--แบงค์ เพิ่ม-->
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <div class="modal-footer">
													<div class="col-md-offset-5 col-md-2">
														<center>
															<button class="btn btn-success form-control input-sm" type="submit">เรียกดู</button>
														</center>
													</div>	
                                                </div>
                                            </div>
                                            <!-- /form group -->
                                        </form>
                                    </div>
                                    <!-- /#panel body -->
                                </div>
                                <!-- /#panel panel-success -->

                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- row mbl -->
                </div>
                <!-- content -->
                <?php include_once('inc/footer.php');  ?>
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->
    </div>

<?php $conn->close(); ?>

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

<!--<script type="text/javascript">
    // ฟังก์ชั่นตรวจสอบค่าเกินกำหนด
var maxVal = function( event ) {
  if(parseFloat(GEvent.element(event).value) > 23) {
     alert('ไม่สามารถกรอกข้อมูลเกิน 23 ได้');
  };
  if(parseFloat(GEvent.element(event).value) > 59) {
     alert('ไม่สามารถกรอกข้อมูลเกิน 59 ได้');
  };
};
</script>-->

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

    <!-- Datepicker JavaScript -->
    <script type="text/javascript" src="inc/bootstrap/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="inc/bootstrap/js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>

    <script type="text/javascript">
    $(function () {
        var d = new Date();
        var toDay = d.getDate() + '/' + (d.getMonth() + 1) + '/' + (d.getFullYear() + 543);

        $("#datepicker-th").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});

        $("#datepicker-th1").datepicker({ dateFormat: 'dd/mm/yy', isBuddhist: true, defaultDate: toDay, dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
            dayNamesMin: ['อา.','จ.','อ.','พ.','พฤ.','ศ.','ส.'],
            monthNames: ['มกราคม','กุมภาพันธ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฎาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม'],
            monthNamesShort: ['ม.ค.','ก.พ.','มี.ค.','เม.ย.','พ.ค.','มิ.ย.','ก.ค.','ส.ค.','ก.ย.','ต.ค.','พ.ย.','ธ.ค.']});
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